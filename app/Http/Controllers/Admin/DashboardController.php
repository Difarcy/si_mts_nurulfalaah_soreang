<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\InboxMessage;
use App\Models\ActivityPhoto;
use App\Models\ActivityVideo;
use App\Models\Announcement;
use App\Models\StudentAchievement;
use App\Models\Schedule;
use App\Models\SpmbSetting;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $spmb_setting = SpmbSetting::first();
        // Statistics
        $stats = [
            'total_posts' => Post::count(),
            'published_posts' => Post::where('status', '=', 'published')->count(),
            'draft_posts' => Post::where('status', '=', 'draft')->count(),
            'total_comments' => Comment::count(),
            'unread_comments' => Comment::where('is_read', '=', false)->count(),
            'pending_comments' => Comment::where('is_approved', '=', false)->count(),
            'total_messages' => InboxMessage::count(),
            'unread_messages' => InboxMessage::where('is_read', '=', false)->count(),
            'total_activities' => ActivityPhoto::count(),
            'total_videos' => ActivityVideo::count(),
            'total_announcements' => Announcement::count(),
            'total_achievements' => StudentAchievement::count(),
            'total_schedules' => Schedule::count(),
        ];

        // Recent activity - Latest 5 posts
        $recent_posts = Post::with('author')
            ->latest()
            ->take(5)
            ->get();

        // Recent comments - Latest 5 unread
        $recent_comments = Comment::with('post')
            ->where('is_read', '=', false)
            ->latest()
            ->take(5)
            ->get();

        // Recent messages - Latest 5 unread
        $recent_messages = InboxMessage::where('is_read', '=', false)
            ->latest()
            ->take(5)
            ->get();

        // Recent announcements - Latest 5
        $recent_announcements = Announcement::latest('created_at')
            ->take(5)
            ->get();

        // Recent schedules - Upcoming 5
        $recent_schedules = Schedule::where('tanggal_mulai', '>=', now()->toDateString())
            ->orderBy('tanggal_mulai', 'asc')
            ->take(5)
            ->get();

        // Content distribution
        $content_by_type = Post::select('type', DB::raw('count(*) as count'))
            ->groupBy('type')
            ->get()
            ->pluck('count', 'type')
            ->toArray();

        return view('admin.pages.dashboard.index', compact(
            'stats',
            'recent_posts',
            'recent_comments',
            'recent_messages',
            'recent_announcements',
            'recent_schedules',
            'content_by_type',
            'spmb_setting'
        ));
    }
}
