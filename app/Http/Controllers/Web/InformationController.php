<?php

namespace App\Http\Controllers\Web;

use App\Enums\PostType;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Post;
use App\Models\Schedule;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function berita(Request $request)
    {
        // Optimize: Select only needed columns
        $posts = Post::published()
            ->ofType(PostType::BERITA->value)
            ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at', 'tags')
            ->search($request->input('q'))
            ->latest('published_at')
            ->paginate(25)
            ->withQueryString();

        $sidebarArticles = Post::published()
            ->ofType(PostType::ARTIKEL->value)
            ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at')
            ->latest('published_at')
            ->take(5)
            ->get();

        $infoTerkini = Announcement::active()
            ->select('id', 'judul as title', 'isi', 'tanggal as published_at')
            ->selectRaw("'pengumuman' as type")
            ->latest('tanggal')
            ->take(5)
            ->get();

        $agendaItems = Schedule::active()
            ->select('id', 'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'waktu_mulai', 'waktu_selesai')
            ->orderBy('tanggal_mulai', 'desc')
            ->take(5)
            ->get();

        return view('web.pages.information.news.index', compact('posts', 'sidebarArticles', 'infoTerkini', 'agendaItems'));
    }

    public function artikel(Request $request)
    {
        // Optimize: Select only needed columns
        $posts = Post::published()
            ->ofType(PostType::ARTIKEL->value)
            ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at', 'tags')
            ->search($request->input('q'))
            ->latest('published_at')
            ->paginate(25)
            ->withQueryString();

        $sidebarNews = Post::published()
            ->ofType(PostType::BERITA->value)
            ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at')
            ->latest('published_at')
            ->take(5)
            ->get();

        $infoTerkini = Announcement::active()
            ->select('id', 'judul as title', 'isi', 'tanggal as published_at')
            ->selectRaw("'pengumuman' as type")
            ->latest('tanggal')
            ->take(5)
            ->get();

        $agendaItems = Schedule::active()
            ->select('id', 'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'waktu_mulai', 'waktu_selesai')
            ->orderBy('tanggal_mulai', 'desc')
            ->take(5)
            ->get();

        return view('web.pages.information.article.index', compact('posts', 'sidebarNews', 'infoTerkini', 'agendaItems'));
    }

    public function byTag(Request $request, string $tag)
    {
        $decodedTag = urldecode($tag);
        $typeFilter = $request->input('type');

        // Optimize: Select only needed columns
        $query = Post::published()
            ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at', 'tags')
            ->byTag($decodedTag);

        if ($typeFilter && PostType::isValid($typeFilter)) {
            $query->ofType($typeFilter);
        }

        $posts = $query
            ->latest('published_at')
            ->paginate(6)
            ->withQueryString();

        $sidebarArticles = Post::published()
            ->ofType(PostType::ARTIKEL->value)
            ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at')
            ->latest('published_at')
            ->take(5)
            ->get();

        $sidebarNews = Post::published()
            ->ofType(PostType::BERITA->value)
            ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at')
            ->latest('published_at')
            ->take(4)
            ->get();

        $infoTerkini = Announcement::active()
            ->select('id', 'judul as title', 'isi', 'tanggal as published_at')
            ->selectRaw("'pengumuman' as type")
            ->latest('tanggal')
            ->take(5)
            ->get();

        $agendaItems = Schedule::active()
            ->select('id', 'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'waktu_mulai', 'waktu_selesai')
            ->orderBy('tanggal_mulai', 'desc')
            ->take(5)
            ->get();

        $schoolProfile = SchoolProfile::first();

        return view('web.pages.information.tag', compact('posts', 'decodedTag', 'sidebarArticles', 'sidebarNews', 'infoTerkini', 'typeFilter', 'agendaItems', 'schoolProfile'));
    }

    public function pengumuman(Request $request)
    {
        $query = Announcement::active()->ordered();

        if ($q = $request->query('q')) {
            $query->where(function ($query) use ($q) {
                $query->where('judul', 'like', "%{$q}%")
                    ->orWhere('isi', 'like', "%{$q}%");
            });
        }

        $pengumuman = $query->paginate(25)->withQueryString();

        // Data untuk sidebar
        $berita = Post::published()
            ->ofType(PostType::BERITA->value)
            ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at')
            ->latest('published_at')
            ->take(5)
            ->get();

        $sidebarArticles = Post::published()
            ->ofType(PostType::ARTIKEL->value)
            ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at')
            ->latest('published_at')
            ->take(5)
            ->get();

        $infoTerkini = Announcement::active()
            ->select('id', 'judul as title', 'isi', 'tanggal as published_at')
            ->selectRaw("'pengumuman' as type")
            ->ordered()
            ->latest('tanggal')
            ->take(5)
            ->get();

        $agendaItems = Schedule::active()
            ->select('id', 'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'waktu_mulai', 'waktu_selesai')
            ->orderBy('tanggal_mulai', 'desc')
            ->take(5)
            ->get();

        return view('web.pages.information.announcement.index', compact('pengumuman', 'berita', 'sidebarArticles', 'infoTerkini', 'agendaItems'));
    }

    public function showAnnouncement(Announcement $announcement)
    {
        if ($announcement->status !== 'publish') {
            abort(404);
        }

        $announcement->increment('views_count');

        // Sidebar: Berita Terbaru & Agenda
        $latestPosts = Post::published()->latest()->take(5)->get();
        $agendaItems = Schedule::active()
            ->select('id', 'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'waktu_mulai', 'waktu_selesai')
            ->orderBy('tanggal_mulai', 'desc')
            ->take(5)
            ->get();

        return view('web.pages.information.announcement.show', compact('announcement', 'latestPosts', 'agendaItems'));
    }

    public function agenda(Request $request)
    {
        $query = Schedule::active()->ordered();

        if ($q = $request->query('q')) {
            $query->where(function ($query) use ($q) {
                $query->where('judul', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%")
                    ->orWhere('lokasi', 'like', "%{$q}%");
            });
        }

        // Use pagination for consistency with search
        $agendas = $query->paginate(10);

        // Data Sidebar
        $sidebarNews = Post::published()
            ->ofType(PostType::BERITA->value)
            ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at')
            ->latest('published_at')
            ->take(5)
            ->get();

        $infoTerkini = Announcement::active()
            ->select('id', 'judul as title', 'isi', 'tanggal as published_at')
            ->selectRaw("'pengumuman' as type")
            ->latest('tanggal')
            ->take(5)
            ->get();

        return view('web.pages.information.agenda.index', compact('agendas', 'sidebarNews', 'infoTerkini'));
    }

    public function showAgenda(Schedule $schedule)
    {
        if ($schedule->status !== 'publish') {
            abort(404);
        }

        $schedule->increment('views_count');

        // Sidebar Data
        $latestNews = Post::published()
            ->ofType(PostType::BERITA->value)
            ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at')
            ->latest('published_at')
            ->take(5)
            ->get();

        $agendaItems = Schedule::active()
            ->where('id', '!=', $schedule->id)
            ->select('id', 'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'waktu_mulai', 'waktu_selesai')
            ->orderBy('tanggal_mulai', 'desc')
            ->take(5)
            ->get();

        return view('web.pages.information.agenda.show', compact('schedule', 'latestNews', 'agendaItems'));
    }

    public function show(string $type, string $slug)
    {
        abort_unless(PostType::isValid($type), 404);

        $post = Post::published()
            ->ofType($type)
            ->where('slug', $slug)
            ->firstOrFail();

        $related = Post::published()
            ->ofType($type)
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        // Tampilkan hanya tag yang tersimpan di post, dibatasi maksimal 10
        $postTags = $post->tags ?? [];
        $normalizedDisplay = [];
        $seen = [];
        foreach ((array) $postTags as $tag) {
            if (!is_string($tag)) {
                continue;
            }
            $t = trim(preg_replace('/\s+/', ' ', $tag));
            if ($t === '') {
                continue;
            }
            $key = mb_strtolower($t);
            if (!isset($seen[$key])) {
                $seen[$key] = true;
                $normalizedDisplay[] = $t;
            }
        }
        $displayTags = array_slice($normalizedDisplay, 0, 10);

        $allComments = Comment::query()
            ->where('post_id', $post->id)
            ->approved()
            ->withCount('likes')
            ->orderBy('created_at')
            ->get();

        $commentsByParent = $allComments->groupBy('parent_id');
        $comments = $commentsByParent->get(null) ?? $commentsByParent->get('') ?? collect();
        $commentsCount = $allComments->count();

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

        // Optimize: Select only needed columns and combine queries where possible
        $baseQuery = Post::published()
            ->ofType($type)
            ->where('id', '!=', $post->id)
            ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at', 'tags');

        // Latest posts for sidebar (5 posts)
        $latestPosts = (clone $baseQuery)
            ->latest('published_at')
            ->take(5)
            ->get();

        // Suggested posts untuk "Berita yang Disarankan" - berdasarkan terbaru
        $suggestedPosts = (clone $baseQuery)
            ->latest('published_at')
            ->take(3)
            ->get();

        // Data for Sidebar (Pengumuman & Agenda)
        $announcements = Announcement::active()
            ->select('id', 'judul as title', 'isi', 'tanggal as published_at')
            ->selectRaw("'pengumuman' as type")
            ->latest('tanggal')
            ->take(5)
            ->get();

        $agendaItems = Schedule::active()
            ->select('id', 'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'waktu_mulai', 'waktu_selesai')
            ->orderBy('tanggal_mulai', 'desc')
            ->take(5)
            ->get();

        // Related posts untuk "Baca Juga:" - berdasarkan tag yang sama (lebih relevan)
        $relatedPostsQuery = clone $baseQuery;

        if (!empty($postTags)) {
            $relatedPostsQuery->where(function ($query) use ($postTags) {
                foreach ($postTags as $tag) {
                    $query->orWhereJsonContains('tags', $tag);
                }
            });
        }

        $relatedPosts = $relatedPostsQuery
            ->latest('published_at')
            ->take(3)
            ->get();

        // Jika related posts kurang dari 3, tambahkan dari suggested posts
        if ($relatedPosts->count() < 3) {
            $remaining = 3 - $relatedPosts->count();
            $additionalPosts = $suggestedPosts->whereNotIn('id', $relatedPosts->pluck('id'))->take($remaining);
            $relatedPosts = $relatedPosts->merge($additionalPosts);
        }

        // Track view: 1 device = 1 viewer (using session_id)
        $sessionId = request()->session()->getId();
        $ipAddress = request()->ip();
        $post->incrementViewCount($sessionId, $ipAddress);

        // Refresh post to get updated view_count
        $post->refresh();

        return view('web.pages.information.detail', compact(
            'post',
            'related',
            'displayTags',
            'comments',
            'commentsByParent',
            'commentsCount',
            'likedCommentIds',
            'latestPosts',
            'suggestedPosts',
            'relatedPosts',
            'announcements',
            'agendaItems'
        ));
    }

    public function globalSearch(Request $request)
    {
        $query = $request->query('q');
        $posts = collect();
        $searchAnnouncements = collect();
        $searchAgenda = collect();

        if ($query) {
            // Berita & Artikel - untuk sebelah kiri
            $postsData = Post::published()
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                        ->orWhere('body', 'like', "%{$query}%");
                })
                ->select('id', 'title', 'excerpt', 'body', 'slug', 'type', 'thumbnail_path', 'published_at')
                ->latest('published_at')
                ->take(20)
                ->get();

            foreach ($postsData as $post) {
                $posts->push((object) [
                    'type_label' => ucfirst($post->type),
                    'type_slug' => $post->type,
                    'title' => $post->title,
                    'desc' => $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->body), 150),
                    'date' => $post->published_at,
                    'image' => $post->thumbnail_path,
                    'url' => route('informasi.show', ['type' => $post->type, 'slug' => $post->slug]),
                    'sort_date' => $post->published_at,
                ]);
            }

            // Pengumuman - untuk sebelah kanan
            $announcementsData = Announcement::active()
                ->where(function ($q) use ($query) {
                    $q->where('judul', 'like', "%{$query}%")
                        ->orWhere('isi', 'like', "%{$query}%");
                })
                ->select('id', 'judul as title', 'isi', 'tanggal as published_at')
                ->selectRaw("'pengumuman' as type")
                ->latest('tanggal')
                ->take(20)
                ->get();

            $searchAnnouncements = $announcementsData;

            // Agenda - untuk sebelah kanan
            $agendasData = Schedule::active()
                ->where(function ($q) use ($query) {
                    $q->where('judul', 'like', "%{$query}%")
                        ->orWhere('deskripsi', 'like', "%{$query}%");
                })
                ->select('id', 'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'waktu_mulai', 'waktu_selesai')
                ->orderBy('tanggal_mulai', 'desc')
                ->take(20)
                ->get();

            $searchAgenda = $agendasData;
        }

        return view('web.pages.search.index', compact('posts', 'searchAnnouncements', 'searchAgenda', 'query'));
    }
}
