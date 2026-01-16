<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PostStatus;
use App\Enums\PostType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use App\Domain\Content\Services\PostService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Controller untuk CRUD Berita dan Artikel
 * Menangani create, read, update, delete posts
 */
class PostController extends Controller
{
    public function __construct(
        protected PostService $postService
    ) {
    }

    /**
     * Halaman daftar posts (berita/artikel)
     * Menampilkan dengan filter dan sorting
     */
    public function index(Request $request): View
    {
        // Determine type from route name
        $type = $request->route()->getName() === 'cpanel.artikel.index'
            ? PostType::ARTIKEL->value
            : PostType::BERITA->value;

        // Handle view preference
        if ($request->has('view')) {
            session(['posts_view' => $request->input('view')]);
        }
        $viewPreference = session('posts_view', 'table');

        $query = Post::query();

        // Filter by type
        $query->ofType($type);

        // Filters & Sorting
        $query->applyFilters($request, [
            'published_asc' => ['published_at', 'asc'],
            'published_desc' => ['published_at', 'desc'],
            'latest' => ['published_at', 'desc'], // Override default latest to use published_at
        ]);

        $posts = $query->select('id', 'title', 'excerpt', 'type', 'status', 'published_at', 'created_at', 'updated_at', 'thumbnail_path', 'is_featured')
            ->paginate(10)
            ->withQueryString();

        return view('admin.pages.posts.index', compact('posts', 'viewPreference', 'type'));
    }

    public function create(Request $request): View
    {
        $type = $request->route()->getName() === 'cpanel.artikel.create'
            ? PostType::ARTIKEL->value
            : PostType::BERITA->value;

        $post = new Post([
            'status' => PostStatus::PUBLISHED->value,
            'type' => $type,
            'published_at' => now()->setSeconds(0),
        ]);

        return view('admin.pages.posts.create', compact('post', 'type'));
    }

    public function store(PostRequest $request): RedirectResponse
    {
        $post = $this->postService->createPost($request->validated(), $request);

        $message = $this->postService->getStatusMessage('create', $post);

        return $this->handleRedirect($request, $post, $message);
    }

    public function show(Post $post): RedirectResponse
    {
        return $this->redirectToEdit($post);
    }

    public function edit(Post $post): View
    {
        $post->refresh(); // Ensure fresh data
        $type = $post->type;

        return view('admin.pages.posts.edit', compact('post', 'type'));
    }

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $post = $this->postService->updatePost($post, $request->validated(), $request);

        $message = $this->postService->getStatusMessage('update', $post);

        return $this->handleRedirect($request, $post, $message);
    }

    public function destroy(Request $request, Post $post): RedirectResponse
    {
        $redirectUrl = $request->input('_redirect_after_delete');
        $postTypeLabel = PostType::tryFrom($post->type)?->label() ?? 'Post';
        $routeName = $post->type === PostType::ARTIKEL->value ? 'cpanel.artikel.index' : 'cpanel.berita.index';

        $this->postService->deletePost($post);

        if (!empty($redirectUrl) && is_string($redirectUrl)) {
            return redirect($redirectUrl)
                ->with('status', "{$postTypeLabel} berhasil dihapus.")
                ->with('reload', true);
        }

        $viewPreference = session('posts_view', 'table');

        return redirect()
            ->route($routeName, array_merge(['view' => $viewPreference], $request->query()))
            ->with('status', "{$postTypeLabel} berhasil dihapus.")
            ->with('reload', true);
    }

    /**
     * Handle redirection logic after save/update
     */
    protected function handleRedirect(Request $request, Post $post, string $message): RedirectResponse
    {
        $redirectUrl = $request->input('_redirect_after_save');

        // Priority 1: Custom redirect URL (e.g. from listing page)
        if (!empty($redirectUrl) && is_string($redirectUrl)) {
            $redirectUrl = trim($redirectUrl);

            // Validate internal redirection
            if (
                str_starts_with($redirectUrl, '/') ||
                (filter_var($redirectUrl, FILTER_VALIDATE_URL) && parse_url($redirectUrl, PHP_URL_HOST) === parse_url(config('app.url'), PHP_URL_HOST))
            ) {
                return redirect($redirectUrl)
                    ->with('status', $message)
                    ->with('success', $message)
                    ->with('reload', true);
            }
        }

        // Priority 2: Default redirect to index page
        $routeName = 'cpanel.publikasi.index';
        $viewPreference = session('posts_view', 'table');

        // Remove type parameter to ensure "All" is selected by default,
        // unless explicitly provided in the request query (which is rare for form submissions)
        $queryParams = $request->query();
        unset($queryParams['type']);

        return redirect()
            ->route($routeName, array_merge(['view' => $viewPreference], $queryParams))
            ->with('status', $message)
            ->with('success', $message)
            ->with('reload', true);
    }

    protected function redirectToEdit(Post $post): RedirectResponse
    {
        $routeName = $post->type === PostType::ARTIKEL->value ? 'cpanel.artikel.edit' : 'cpanel.berita.edit';

        return redirect()->route($routeName, array_merge(['post' => $post], request()->query()));
    }
}
