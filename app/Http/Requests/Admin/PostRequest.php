<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        $postId = $this->route('post')?->id;
        $status = $this->input('status', 'published');
        $isDraft = $status === 'draft';

        return [
            // Field wajib hanya required jika bukan draft
            'title' => [$isDraft ? 'nullable' : 'required', 'string', 'max:160'],
            'slug' => [
                'nullable',
                'string',
                'max:160',
                Rule::unique('posts', 'slug')->ignore($postId),
            ],
            'type' => ['required', Rule::in(['berita', 'artikel'])],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => [$isDraft ? 'nullable' : 'required', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,jpg,png,webp', 'max:5120'], // 5MB per gambar
            'existing_images' => ['nullable', 'array'],
            'existing_images.*' => ['string'],
            'status' => ['required', Rule::in(['draft', 'published', 'unpublished'])],
            'published_at_date' => ['nullable', 'date'],
            'published_at_time' => ['nullable', 'date_format:H:i'],
            'is_featured' => ['nullable', 'boolean'],
            'author_name' => [$isDraft ? 'nullable' : 'required', 'string', 'max:100'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'tags' => ['nullable', 'array', 'max:10'],
            'tags.*' => ['string', 'max:50'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_featured' => (bool) $this->boolean('is_featured'),
        ]);
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $type = $this->input('type', $this->route('post')?->type ?? 'berita');
            $post = $this->route('post');
            $status = $this->input('status', 'published');
            $isDraft = $status === 'draft';

            // Validasi thumbnail wajib untuk berita dan artikel (kecuali draft atau jika sudah ada thumbnail existing)
            if (!$isDraft) {
                $hasThumbnailFile = $this->hasFile('thumbnail');
                $hasExistingThumbnail = $post && $post->thumbnail_path;

                if (!$hasThumbnailFile && !$hasExistingThumbnail) {
                    $validator->errors()->add(
                        'thumbnail',
                        'Thumbnail wajib diisi untuk ' . ($type === 'berita' ? 'berita' : 'artikel') . '.'
                    );
                }
            }

            // Untuk draft mode: minimal ada 1 field yang terisi
            if ($isDraft) {
                $hasTitle = !empty($this->input('title'));
                $hasBody = !empty($this->input('body'));
                $hasAuthorName = !empty($this->input('author_name')) && $this->input('author_name') !== 'Admin';
                $hasThumbnailFile = $this->hasFile('thumbnail');
                $hasExistingThumbnail = $post && $post->thumbnail_path;
                $hasThumbnail = $hasThumbnailFile || $hasExistingThumbnail;
                $hasMetaDescription = !empty($this->input('meta_description'));
                $hasExcerpt = !empty($this->input('excerpt'));
                $hasSlug = !empty($this->input('slug'));

                // Cek gambar konten
                $hasNewImages = $this->hasFile('images');
                $hasExistingImages = !empty($this->input('existing_images')) && is_array($this->input('existing_images')) && count(array_filter($this->input('existing_images'))) > 0;
                $hasContentImages = $hasNewImages || $hasExistingImages;

                // Minimal ada 1 field yang terisi
                if (
                    !$hasTitle && !$hasBody && !$hasAuthorName && !$hasThumbnail && !$hasContentImages &&
                    !$hasMetaDescription && !$hasExcerpt && !$hasSlug
                ) {
                    $validator->errors()->add(
                        'title',
                        'Minimal harus ada 1 field yang terisi untuk menyimpan draft.'
                    );
                }
            }

            // Validasi maksimal 10 tags
            $tags = $this->input('tags', []);
            if (is_array($tags) && count($tags) > 10) {
                $validator->errors()->add(
                    'tags',
                    'Maksimal 10 tag. Saat ini: ' . count($tags) . ' tag.'
                );
            }

            // Hitung total gambar (images baru + existing_images)
            // Untuk file upload dengan name="images[]", Laravel akan mengembalikan array
            $newImagesCount = 0;
            if ($this->hasFile('images')) {
                $newImagesFiles = $this->file('images');
                // Pastikan selalu array (karena name="images[]" dengan multiple)
                if (!is_array($newImagesFiles)) {
                    $newImagesFiles = [$newImagesFiles];
                }
                // Filter hanya file yang valid dan bukan null
                $newImagesCount = count(array_filter($newImagesFiles, function ($file) {
                    return $file !== null && $file->isValid() && $file->getError() === UPLOAD_ERR_OK;
                }));
            }

            $existingImages = $this->input('existing_images', []);
            // Filter null/empty values dan pastikan array
            if (!is_array($existingImages)) {
                $existingImages = [];
            }
            $existingImages = array_filter($existingImages, function ($img) {
                return !empty($img) && is_string($img);
            });
            $existingImagesCount = count($existingImages);

            $totalImages = $newImagesCount + $existingImagesCount;

            // Validasi: maksimal 6 gambar
            if ($totalImages > 6) {
                $validator->errors()->add(
                    'images',
                    'Maksimal 6 gambar konten. Saat ini: ' . $totalImages . ' gambar.'
                );
            }

            // Validasi jumlah ganjil (selain 1)
            if ($totalImages > 1 && ($totalImages % 2) !== 0) {
                $validator->errors()->add(
                    'images',
                    'Jumlah gambar ganjil (selain 1) tidak dapat disimpan! Harus 1, 2, 4, atau 6 gambar.'
                );
            }

            // Validasi penjadwalan tidak mundur
            if ($status === 'published') {
                $dateStr = trim((string) $this->input('published_at_date'));
                $timeStr = trim((string) $this->input('published_at_time'));
                // Jika salah satu diisi, wajib keduanya dan harus >= sekarang
                if ($dateStr !== '' || $timeStr !== '') {
                    if ($dateStr === '' || $timeStr === '') {
                        $validator->errors()->add('published_at_date', 'Jika dijadwalkan, tanggal dan waktu wajib diisi.');
                    } else {
                        try {
                            $date = \Carbon\Carbon::parse($dateStr);
                            [$h, $m] = array_map('intval', explode(':', $timeStr));
                            $scheduled = $date->copy()->setTime($h, $m, 0);
                            if ($scheduled->lt(now())) {
                                $validator->errors()->add('published_at_date', 'Tanggal/waktu publikasi tidak boleh mundur dari waktu saat ini.');
                            }
                        } catch (\Throwable $e) {
                            $validator->errors()->add('published_at_date', 'Format tanggal/waktu tidak valid.');
                        }
                    }
                }
            }
        });
    }
}
