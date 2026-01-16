<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    public function store(Request $request, string $type, string $slug)
    {
        abort_unless(in_array($type, ['berita', 'artikel']), 404);

        $post = Post::published()
            ->ofType($type)
            ->where('slug', $slug)
            ->firstOrFail();

        // Convert anonymous field to proper boolean (checkbox send '1' or missing)
        $anonymousValue = $request->input('anonymous');
        $request->merge([
            'anonymous' => $anonymousValue === '1' || $anonymousValue === 1 || $anonymousValue === true,
        ]);

        // Jika anonymous, email tidak perlu di-validate sebagai email format
        $isAnonymous = $request->boolean('anonymous');

        $validated = $request->validate([
            'parent_id' => ['nullable', 'integer', 'exists:comments,id'],
            'name' => ['required', 'string', 'max:100'],
            'email' => $isAnonymous ? ['nullable', 'string', 'max:120'] : ['required', 'email', 'max:120'],
            'comment' => ['required', 'string', 'max:1000'],
            'anonymous' => ['sometimes', 'boolean'],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama maksimal 100 karakter.',
            'email.required' => 'Email wajib diisi untuk komentar non-anonymous.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 120 karakter.',
            'comment.required' => 'Komentar wajib diisi.',
            'comment.max' => 'Komentar maksimal 1000 karakter.',
        ]);

        // Handle anonymous comment
        $email = $validated['email'];
        if ($request->has('anonymous') && $request->anonymous) {
            // Anonymous comment
            $name = 'Anonymous';
            $email = '-';
        } else {
            // Non-anonymous comment
            $name = $validated['name'];
        }

        $parentId = $validated['parent_id'] ?? null;
        if ($parentId) {
            $parent = Comment::query()
                ->where('id', $parentId)
                ->where('post_id', $post->id)
                ->approved()
                ->first();

            if (! $parent) {
                $parentId = null;
            }
        }

        Comment::create([
            'post_id' => $post->id,
            'parent_id' => $parentId,
            'is_admin' => false,
            'name' => $name,
            'email' => $email,
            'comment' => $validated['comment'],
            'is_approved' => false, // Menunggu persetujuan admin
            'is_read' => false,
        ]);

        // Return JSON for AJAX requests, redirect for normal form submissions
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Komentar berhasil dikirim dan menunggu persetujuan admin.',
            ]);
        }

        return redirect()
            ->route('informasi.show', ['type' => $type, 'slug' => $slug])
            ->with('status', 'Komentar berhasil dikirim.');
    }
}
