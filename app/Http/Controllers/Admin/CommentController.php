<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\InfoText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $query = Comment::with('post');

        // Filter berdasarkan status (approval dan read status digabung)
        if ($request->has('status') && $request->status) {
            if ($request->status === 'approved') {
                $query->where('is_approved', true);
            } elseif ($request->status === 'pending') {
                $query->where('is_approved', false);
            } elseif ($request->status === 'unread') {
                $query->where('is_read', false);
            } elseif ($request->status === 'read') {
                $query->where('is_read', true);
            }
        }

        // Backward compatibility: jika masih menggunakan parameter 'read' (untuk URL lama)
        if ($request->has('read') && !$request->has('status')) {
            if ($request->read === 'unread') {
                $query->where('is_read', false);
            } elseif ($request->read === 'read') {
                $query->where('is_read', true);
            }
        }

        // Search
        if ($request->has('q') && $request->q) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('comment', 'like', "%{$search}%");
            });
        }

        // Sort
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'oldest':
                    $query->oldest('created_at');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'latest':
                default:
                    $query->latest('created_at');
                    break;
            }
        } else {
            $query->latest('created_at');
        }

        // Pagination 30 comments per page
        $comments = $query->paginate(30)->withQueryString();

        // Optimize: Count statistics in single query using conditional aggregation (PostgreSQL booleans)
        $stats = Comment::selectRaw('
            COUNT(*) as total,
            SUM(CASE WHEN is_approved = false THEN 1 ELSE 0 END) as pending,
            SUM(CASE WHEN is_read = false THEN 1 ELSE 0 END) as unread
        ')->first();

        $totalComments = (int) ($stats->total ?? 0);
        $pendingComments = (int) ($stats->pending ?? 0);
        $unreadComments = (int) ($stats->unread ?? 0);

        return view('admin.pages.comments.index', compact('comments', 'totalComments', 'pendingComments', 'unreadComments'));
    }

    public function show(Comment $comment)
    {
        $comment->load('post');

        // Check if AJAX request
        if (request()->ajax() || request()->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json([
                'id' => $comment->id,
                'name' => $comment->name,
                'email' => $comment->email,
                'comment' => $comment->comment,
                'admin_reply_by' => $comment->admin_reply_by,
                'admin_reply' => $comment->admin_reply,
                'admin_replied_at' => $comment->admin_replied_at ? $comment->admin_replied_at->format('d M Y, H:i') : null,
                'created_at' => $comment->created_at->format('d M Y, H:i'),
                'is_approved' => $comment->is_approved,
                'is_read' => $comment->is_read,
                'post_title' => $comment->post ? $comment->post->title : null,
                'post_type' => $comment->post ? ucfirst($comment->post->type) : null,
                'post_url' => $comment->post ? route('informasi.show', ['type' => $comment->post->type, 'slug' => $comment->post->slug]) : null,
            ]);
        }

        if (!$comment->is_read) {
            $comment->update(['is_read' => true]);
        }

        $allComments = Comment::query()
            ->where('post_id', $comment->post_id)
            ->withCount('likes')
            ->orderBy('created_at')
            ->get();

        $commentsByParent = $allComments->groupBy('parent_id');

        $commentMap = $allComments->keyBy('id');
        $threadRoot = $commentMap->get($comment->id, $comment);
        while ($threadRoot->parent_id && $commentMap->has($threadRoot->parent_id)) {
            $threadRoot = $commentMap->get($threadRoot->parent_id);
        }

        $likedCommentIds = [];
        if ($allComments->isNotEmpty()) {
            $likesQuery = CommentLike::query()->whereIn('comment_id', $allComments->pluck('id'));

            if (Auth::check()) {
                $likesQuery->where('user_id', Auth::id());
            } else {
                $likesQuery->where('session_id', request()->session()->getId());
            }

            $likedCommentIds = $likesQuery->pluck('comment_id')->all();
        }

        $defaultReplyBy = 'Admin';

        return view('admin.pages.comments.show', compact('comment', 'threadRoot', 'commentsByParent', 'likedCommentIds', 'defaultReplyBy'));
    }

    public function reply(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'admin_reply_by' => ['required', 'string', 'max:100'],
            'admin_reply' => ['required', 'string'],
        ]);

        $replyToId = $request->query('reply_to');
        $parentId = $comment->id;
        if ($replyToId) {
            $replyTo = Comment::query()
                ->where('id', $replyToId)
                ->where('post_id', $comment->post_id)
                ->first();

            if ($replyTo) {
                $parentId = $replyTo->id;
            }
        }

        $adminEmail = InfoText::where('key', 'site_email')->value('value') ?: 'admin@local';

        Comment::create([
            'post_id' => $comment->post_id,
            'parent_id' => $parentId,
            'is_admin' => true,
            'name' => $validated['admin_reply_by'],
            'email' => $adminEmail,
            'comment' => $validated['admin_reply'],
            'is_approved' => true,
            'is_read' => true,
        ]);

        return redirect()
            ->route('cpanel.comments.show', $comment)
            ->with('success', 'Komentar berhasil dikirim.');
    }

    public function approve(Comment $comment)
    {
        $comment->update([
            'is_approved' => true,
            'is_read' => true,
        ]);

        // Check if AJAX request
        if (request()->ajax() || request()->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json(['success' => true]);
        }

        return redirect()
            ->route('cpanel.comments.index')
            ->with('success', 'Komentar berhasil disetujui.');
    }

    public function reject(Comment $comment)
    {
        $comment->update([
            'is_approved' => false,
            'is_read' => true,
        ]);

        return redirect()
            ->route('cpanel.comments.index')
            ->with('success', 'Komentar ditolak.');
    }

    public function markAsRead(Comment $comment)
    {
        $comment->update(['is_read' => true]);

        // Check if AJAX request
        if (request()->ajax() || request()->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json(['success' => true]);
        }

        return redirect()
            ->route('cpanel.comments.index')
            ->with('success', 'Komentar ditandai sebagai sudah dibaca.');
    }

    public function markAsUnread(Comment $comment)
    {
        $comment->update(['is_read' => false]);

        // Check if AJAX request
        if (request()->ajax() || request()->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json(['success' => true]);
        }

        return redirect()
            ->route('cpanel.comments.index')
            ->with('success', 'Komentar ditandai sebagai belum dibaca.');
    }

    public function markAllAsRead()
    {
        Comment::where('is_read', false)->update(['is_read' => true]);

        return redirect()
            ->route('cpanel.comments.index')
            ->with('success', 'Semua komentar ditandai sebagai sudah dibaca.');
    }

    public function bulkApprove(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:comments,id',
        ]);

        Comment::whereIn('id', $request->ids)->update([
            'is_approved' => true,
            'is_read' => true,
        ]);

        if ($request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json(['success' => true]);
        }

        return redirect()
            ->route('cpanel.comments.index')
            ->with('success', 'Komentar terpilih berhasil disetujui.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        // Check if AJAX request
        if (request()->ajax() || request()->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json(['success' => true]);
        }

        return redirect()
            ->route('cpanel.comments.index')
            ->with('success', 'Komentar berhasil dihapus.');
    }
}
