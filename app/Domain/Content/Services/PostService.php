<?php

namespace App\Domain\Content\Services;

use App\Core\Services\FileUploadService;
use App\Enums\PostStatus;
use App\Enums\PostType;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * Service layer untuk logika bisnis Post (Berita/Artikel)
 * Menangani create, update, delete, dan operasi terkait file
 */
class PostService
{
    public function __construct(
        protected FileUploadService $fileUploadService
    ) {
    }

    /**
     * Membuat post baru
     */
    public function createPost(array $data, Request $request): Post
    {
        $postData = $this->prepareData($data, $request);
        $postData['author_id'] = Auth::id();

        $post = Post::create($postData);

        $this->handlePostCreateActions($post);

        return $post->refresh();
    }

    /**
     * Update post existing
     */
    public function updatePost(Post $post, array $data, Request $request): Post
    {
        $postData = $this->prepareData($data, $request, $post);

        $postData['updated_at'] = now();
        $this->handlePublicationTimeLogics($postData, $post, $request);

        $post->update($postData);

        $this->handlePostUpdateActions($post);

        return $post->refresh();
    }

    /**
     * Hapus post dan file terkait
     */
    public function deletePost(Post $post): void
    {
        if ($post->thumbnail_path) {
            $this->fileUploadService->deleteImage($post->thumbnail_path);
        }

        if (is_array($post->images)) {
            foreach ($post->images as $imgPath) {
                $this->fileUploadService->deleteImage($imgPath);
            }
        }

        $post->delete();

        $this->clearHomeCache();
    }

    protected function prepareData(array $validatedData, Request $request, ?Post $post = null): array
    {
        $data = $validatedData;

        if (empty($data['author_name'])) {
            $data['author_name'] = 'Admin';
        }

        $this->handleSlugLogic($data, $post);
        $this->handleThumbnailLogic($data, $request, $post);
        $this->handleContentImagesLogic($data, $request, $post);

        $data['is_featured'] = isset($data['type']) && $data['type'] === PostType::BERITA->value
            ? (bool) $request->boolean('is_featured')
            : false;

        $this->handleScheduledTimeLogic($data, $request, $post);
        $this->handleTagsLogic($data, $request);
        $this->handleBodyAndMetaLogic($data, $post);

        return $data;
    }

    protected function handleSlugLogic(array &$data, ?Post $post): void
    {
        if (!isset($data['title'])) {
            return;
        }

        $newAutoSlug = Str::slug($data['title']);
        $requestedSlug = trim((string) ($data['slug'] ?? ''));

        if (!$post) {
            if ($requestedSlug === '') {
                $data['slug'] = $newAutoSlug;
            }
        } else {
            $oldAutoSlug = Str::slug((string) $post->title);
            $wasAuto = ($post->slug === $oldAutoSlug);

            if ($requestedSlug === '') {
                $data['slug'] = $wasAuto ? $newAutoSlug : ($post->slug ?? $newAutoSlug);
            }
        }
    }

    protected function handleThumbnailLogic(array &$data, Request $request, ?Post $post): void
    {
        if ($post && $request->boolean('remove_thumbnail') && !$request->hasFile('thumbnail')) {
            if ($post->thumbnail_path) {
                $this->fileUploadService->deleteImage($post->thumbnail_path);
            }
            $data['thumbnail_path'] = null;
        }

        if ($request->hasFile('thumbnail')) {
            if ($post?->thumbnail_path) {
                $this->fileUploadService->deleteImage($post->thumbnail_path);
            }

            try {
                $data['thumbnail_path'] = $this->fileUploadService->uploadImage($request->file('thumbnail'), 'posts');
            } catch (\Exception $e) {
                $data['thumbnail_path'] = $request->file('thumbnail')->store('posts', 'public');
            }
        } elseif ($post?->thumbnail_path) {
            $data['thumbnail_path'] = $post->thumbnail_path;
        }
    }

    protected function handleContentImagesLogic(array &$data, Request $request, ?Post $post): void
    {
        $uploadedImages = [];
        $imageMetadata = [];
        $existingMetadata = $post?->image_metadata ?? [];

        $metadataMap = [];
        if (is_array($existingMetadata)) {
            foreach ($existingMetadata as $meta) {
                if (isset($meta['path'])) {
                    $metadataMap[$meta['path']] = $meta;
                }
            }
        }

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            if (!is_array($files)) {
                $files = [$files];
            }

            foreach ($files as $file) {
                if ($file && $file->isValid()) {
                    $path = $file->store('posts/images', 'public');
                    $uploadedImages[] = $path;
                    $imageMetadata[] = [
                        'path' => $path,
                        'source_url' => null,
                        'source_name' => null,
                    ];
                }
            }
        }

        $existingImages = $request->input('existing_images', []);
        if (!is_array($existingImages)) {
            $existingImages = [];
        }
        $existingImages = array_filter($existingImages, fn ($img) => !empty($img) && is_string($img));

        // Support explicit ordering from client: images_order may contain existing image paths
        // or the placeholder '__NEW__' for uploaded files in the sequence the user arranged them.
        $imagesOrder = $request->input('images_order', null);
        if (is_array($imagesOrder) && count($imagesOrder) > 0) {
            $final = [];
            $uploadIdx = 0;
            foreach ($imagesOrder as $entry) {
                if ($entry === '__NEW__') {
                    if (isset($uploadedImages[$uploadIdx])) {
                        $final[] = $uploadedImages[$uploadIdx];
                        $uploadIdx++;
                    }
                } else {
                    // only include non-empty strings
                    if (!empty($entry) && is_string($entry)) {
                        $final[] = $entry;
                    }
                }
            }
            // append any remaining uploaded images
            while (isset($uploadedImages[$uploadIdx])) {
                $final[] = $uploadedImages[$uploadIdx++];
            }

            $allImages = array_values(array_filter($final));
        } else {
            $allImages = array_merge($existingImages, $uploadedImages);
            $allImages = array_values(array_filter($allImages));
        }

        foreach ($existingImages as $existingPath) {
            if (isset($metadataMap[$existingPath])) {
                $imageMetadata[] = $metadataMap[$existingPath];
            } else {
                $imageMetadata[] = [
                    'path' => $existingPath,
                    'source_url' => null,
                    'source_name' => null,
                ];
            }
        }

        if ($post) {
            $oldImages = $post->images ?? [];
            $imagesToDelete = array_diff($oldImages, $existingImages);
            foreach ($imagesToDelete as $imagePath) {
                $this->fileUploadService->deleteImage($imagePath);
            }
        }

        $data['images'] = !empty($allImages) ? $allImages : null;
        $data['image_metadata'] = !empty($imageMetadata) ? $imageMetadata : null;
    }

    protected function handleScheduledTimeLogic(array &$data, Request $request, ?Post $post): void
    {
        if (($data['status'] ?? '') === PostStatus::PUBLISHED->value) {
            $dateInput = $request->input('published_at_date');

            if (!empty($dateInput)) {
                try {
                    $date = \Carbon\Carbon::parse($dateInput);
                    $timeStr = trim((string) $request->input('published_at_time'));

                    if (!empty($timeStr)) {
                        $timeParts = explode(':', $timeStr);
                        $date->setTime((int) ($timeParts[0] ?? 0), (int) ($timeParts[1] ?? 0), (int) ($timeParts[2] ?? 0));
                    } else {
                        $now = now();
                        $date->setTime($now->hour, $now->minute, 0);
                    }
                    $data['published_at'] = $date;
                } catch (\Throwable $e) {
                    $data['published_at'] = now();
                }
            } else {
                if ($post && $post->published_at) {
                    $data['published_at'] = $post->published_at;
                } else {
                    $data['published_at'] = now();
                }
            }
        } else {
            $data['published_at'] = null;
        }

        unset($data['published_at_date'], $data['published_at_time']);
    }

    protected function handleTagsLogic(array &$data, Request $request): void
    {
        $incomingTags = $request->input('tags', null);
        if ($incomingTags !== null) {
            $normalized = [];
            $seen = [];
            foreach ((array) $incomingTags as $tag) {
                if (!is_string($tag)) {
                    continue;
                }
                $t = trim(preg_replace('/\s+/', ' ', $tag));
                if ($t === '') {
                    continue;
                }

                $t = Str::title($t);
                $key = mb_strtolower($t);

                if (!isset($seen[$key])) {
                    $seen[$key] = true;
                    $normalized[] = $t;
                }
            }
            $data['tags'] = !empty($normalized) ? array_slice($normalized, 0, 10) : null;
        } else {
            $data['tags'] = null;
        }
    }

    protected function handleBodyAndMetaLogic(array &$data, ?Post $post): void
    {
        if (!isset($data['body']) || !is_string($data['body'])) {
            return;
        }

        $data['body'] = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $data['body']);

        $bodyText = strip_tags($data['body']);
        $autoExcerptNew = Str::limit($bodyText, 200);
        $hasExcerpt = isset($data['excerpt']) && trim((string) $data['excerpt']) !== '';

        $shouldAutoExcerpt = false;
        if (!$post) {
            $shouldAutoExcerpt = !$hasExcerpt;
        } else {
            $oldAutoExcerpt = Str::limit(strip_tags((string) $post->body), 200);
            $wasAutoExcerpt = ($post->excerpt === $oldAutoExcerpt) || empty($post->excerpt);
            $shouldAutoExcerpt = $wasAutoExcerpt || !$hasExcerpt;
        }

        if ($shouldAutoExcerpt) {
            $data['excerpt'] = $autoExcerptNew;
        }

        $hasMeta = isset($data['meta_description']) && trim((string) $data['meta_description']) !== '';
        $metaSourceText = $hasExcerpt ? strip_tags((string) ($data['excerpt'] ?? '')) : $bodyText;

        if ($metaSourceText) {
            $autoMetaNew = Str::limit($metaSourceText, 160);
            $shouldAutoMeta = false;

            if (!$post) {
                $shouldAutoMeta = !$hasMeta;
            } else {
                $oldMetaSource = $post->excerpt ? strip_tags($post->excerpt) : strip_tags($post->body);
                $oldAutoMeta = Str::limit($oldMetaSource, 160);
                $wasAutoMeta = ($post->meta_description === $oldAutoMeta) || empty($post->meta_description);
                $shouldAutoMeta = $wasAutoMeta || !$hasMeta;
            }

            if ($shouldAutoMeta) {
                $data['meta_description'] = $autoMetaNew;
            }
        }
    }

    protected function handlePublicationTimeLogics(array &$data, Post $post, Request $request): void
    {
        if ($data['status'] === PostStatus::PUBLISHED->value && !$request->has('published_at_date')) {
            $currentPublishedAt = $post->published_at;
            $isScheduled = $currentPublishedAt && $currentPublishedAt->isFuture();

            if ($isScheduled) {
                $data['published_at'] = $currentPublishedAt;
            } else {
                $data['published_at'] = now();
            }
        }
    }

    protected function handlePostCreateActions(Post $post): void
    {
        if ($this->isFeaturedBerita($post)) {
            $this->enforceFeaturedLimit();
            $this->clearHomeCache();
        }
    }

    protected function handlePostUpdateActions(Post $post): void
    {
        if ($this->isFeaturedBerita($post)) {
            $this->enforceFeaturedLimit();
            $this->clearHomeCache();
        }
    }

    protected function isFeaturedBerita(Post $post): bool
    {
        return ($post->type === PostType::BERITA->value)
            && ($post->status === PostStatus::PUBLISHED->value)
            && ($post->is_featured);
    }

    protected function enforceFeaturedLimit(): void
    {
        $featured = Post::published()
            ->select('id', 'title', 'slug', 'is_featured', 'published_at')
            ->ofType(PostType::BERITA->value)
            ->where('is_featured', true)
            ->latest('published_at')
            ->get();

        if ($featured->count() > 5) {
            $toUnfeature = $featured->slice(5);
            foreach ($toUnfeature as $post) {
                $post->update(['is_featured' => false]);
            }
        }
    }

    protected function clearHomeCache(): void
    {
        try {
            app(HomeDataService::class)->clearCacheOnContentUpdate();
        } catch (\Throwable $e) {
        }
    }

    public function getStatusMessage(string $action, Post $post): string
    {
        $status = PostStatus::tryFrom($post->status);
        $publishedAt = $post->published_at;

        $isScheduled = ($status === PostStatus::PUBLISHED) && $publishedAt && $publishedAt->isFuture();
        $isHighlighted = ($post->type === PostType::BERITA->value) && $post->is_featured;

        if ($status === PostStatus::PUBLISHED) {
            if ($isScheduled) {
                $msg = 'Konten berhasil dijadwalkan untuk dipublikasikan pada ' . $publishedAt->translatedFormat('d F Y H:i') . '.';
                return $isHighlighted ? 'Konten berhasil di-highlight dan dijadwalkan untuk dipublikasikan pada ' . $publishedAt->translatedFormat('d F Y H:i') . '.' : $msg;
            }

            $baseMsg = ($action === 'create') ? 'Konten berhasil dipublikasikan.' : 'Konten berhasil diperbarui.';
            if ($action === 'update' && $post->wasChanged('status') && $post->status === 'published') {
                $baseMsg = 'Konten berhasil dipublikasikan.';
            }

            return $isHighlighted ? 'Konten berhasil di-highlight dan dipublikasikan.' : $baseMsg;
        }

        if ($status === PostStatus::UNPUBLISHED) {
            return 'Konten berhasil dinonaktifkan.';
        }

        return 'Konten berhasil disimpan sebagai draf.';
    }
}
