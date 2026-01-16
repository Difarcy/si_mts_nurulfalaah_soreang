<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentLikeController extends Controller
{
    public function toggle(Request $request, Comment $comment)
    {
        $userId = Auth::id();
        $sessionId = $request->session()->getId();

        $query = CommentLike::query()->where('comment_id', $comment->id);

        if ($userId) {
            $query->where('user_id', $userId);
        } else {
            $query->where('session_id', $sessionId);
        }

        $existing = $query->first();

        if ($existing) {
            $existing->delete();
            $liked = false;
        } else {
            CommentLike::create([
                'comment_id' => $comment->id,
                'user_id' => $userId,
                'session_id' => $userId ? null : $sessionId,
                'ip_address' => $request->ip(),
            ]);
            $liked = true;
        }

        $count = $comment->likes()->count();

        return response()->json([
            'liked' => $liked,
            'count' => $count,
        ]);
    }
}
