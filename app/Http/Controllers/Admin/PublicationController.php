<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PostStatus;
use App\Enums\PostType;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Controller untuk halaman Publikasi
 * Menggabungkan tampilan Berita dan Artikel dalam satu halaman
 */
class PublicationController extends Controller
{
    /**
     * Halaman utama publikasi - menampilkan berita dan artikel
     * dengan fitur filter, search, dan view preference (table/grid)
     */
    public function index(Request $request): View
    {
        // Enforce highlight cap before displaying data so badges remain consistent with website
        try {
            $featured = Post::published()
                ->ofType(PostType::BERITA->value)
                ->where('is_featured', true)
                ->latest('published_at')
                ->latest('updated_at')
                ->get();
            if ($featured->count() > 5) {
                foreach ($featured->slice(5) as $item) {
                    $item->update(['is_featured' => false]);
                }
            }
        } catch (\Throwable $e) {
        }

        // Handle view preference (table/grid)
        $viewPreference = session('publikasi_view', 'table');
        if ($request->filled('view') && in_array($request->input('view'), ['table', 'grid'], true)) {
            $viewPreference = $request->input('view');
            session(['publikasi_view' => $viewPreference]);
            // Sinkronkan preferensi tampilan dengan halaman daftar posts (berita/artikel)
            session(['posts_view' => $viewPreference]);
        }

        // Query posts dengan filter
        $query = Post::query();

        // Filter by type if specified
        if ($request->filled('type') && PostType::isValid($request->input('type'))) {
            $query->ofType($request->input('type'));
        }

        // Apply status filter
        if ($request->filled('status')) {
            $status = $request->input('status');
            if ($status === PostStatus::PUBLISHED->value) {
                // Gunakan scope published() untuk konsistensi dengan website
                // Ini memastikan hanya post yang benar-benar published (status = 'published', published_at tidak null, dan published_at <= now())
                $query->published();
            } else {
                // Untuk status lain (draft, unpublished), gunakan filter biasa
                $query->where('status', $status);
            }
        }

        // Apply search
        if ($request->filled('q')) {
            $query->search($request->input('q'));
        }

        // Apply sorting
        $sort = $request->input('sort', 'latest');
        switch ($sort) {
            case 'oldest':
                // Terlama: urutkan berdasarkan waktu publish (ascending)
                $query->orderBy('published_at', 'asc');
                break;
            case 'title_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'latest':
            default:
                // Terbaru: urutkan berdasarkan waktu publish (descending)
                $query->orderBy('published_at', 'desc');
                break;
        }

        // Optimize: Select only needed columns and eager load relationships
        // Dynamic pagination: 15 items for grid view (5 rows × 3 cols), 25 items for table view
        $perPage = $viewPreference === 'grid' ? 15 : 25;
        $posts = $query->select('id', 'title', 'excerpt', 'type', 'status', 'published_at', 'created_at', 'updated_at', 'thumbnail_path', 'is_featured')
            ->paginate($perPage)
            ->withQueryString();

        // Check total posts without any filters to determine if database is empty
        $totalPostsWithoutFilter = Post::count();

        // Jika halaman yang diminta melebihi halaman terakhir yang tersedia,
        // Laravel akan otomatis mengembalikan halaman terakhir yang valid
        // Tapi kita perlu memastikan bahwa jika halaman yang diminta tidak ada,
        // kita tetap mengembalikan hasil yang benar (bisa kosong jika memang tidak ada data)

        return view('admin.pages.publication.index', compact('posts', 'viewPreference', 'totalPostsWithoutFilter'));
    }

    public function redirectBerita(Request $request)
    {
        $params = $request->query();
        $params['type'] = 'berita';

        return redirect()->route('cpanel.publikasi.index', $params);
    }

    public function redirectArtikel(Request $request)
    {
        $params = $request->query();
        $params['type'] = 'artikel';

        return redirect()->route('cpanel.publikasi.index', $params);
    }
}
