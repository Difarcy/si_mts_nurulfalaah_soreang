@csrf
@php
    use Illuminate\Support\Facades\Auth;
@endphp

<div id="posts-form-config"
     data-is-edit-mode="@json((bool) ($post->id ?? false))"
     data-is-berita="@json((($type ?? $post->type ?? 'berita') === 'berita'))"
     data-existing-images="@json(isset($existingImages) ? $existingImages : [])"
     data-upload-route="{{ route('cpanel.uploads.images') }}"
     data-csrf-token="{{ csrf_token() }}"
     data-tag-suggestions-route="{{ route('api.tags.suggestions') }}"
     class="hidden"></div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        <div>
        <x-input
            name="title"
            id="title-input"
            label="Judul"
            :value="$post->title"
            required
            maxlength="160"
            placeholder="Masukkan judul berita atau artikel"
            autocomplete="off"
            :error="$errors->first('title')"
        />
        </div>

        <div>
        <x-input
            name="slug"
            id="slug-input"
            label="Slug (opsional)"
            :value="$post->slug"
            maxlength="160"
            placeholder="Kosongkan untuk dibuat otomatis dari judul"
            autocomplete="off"
            :error="$errors->first('slug')"
        />
        </div>

        <div>
        <x-textarea
            name="excerpt"
            id="excerpt-input"
            label="Excerpt (opsional)"
            :value="$post->excerpt"
            rows="8"
            maxlength="500"
            placeholder="Ringkasan singkat artikel/berita (kosongkan untuk dibuat otomatis dari konten)"
            :error="$errors->first('excerpt')"
            hint="Ringkasan yang akan ditampilkan di halaman beranda dan daftar berita/artikel. Jika kosong, akan dibuat otomatis dari awal konten."
        />
        </div>

        <div>
            <label for="images-input" class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Gambar
                Konten <span class="text-xs font-normal text-slate-400 dark:text-slate-500">(opsional)</span></label>
            <p class="text-xs text-slate-500 dark:text-slate-400 mb-3">Tambahkan gambar untuk memperkaya konten.
                Maksimal 6 gambar. Jumlah gambar harus 1, 2, 4, atau 6 (tidak boleh ganjil kecuali satu).</p>
            <div id="images-warning"
                class="hidden mb-3 p-3 bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800">
                <p class="text-sm text-amber-800 dark:text-amber-200 font-medium" id="images-warning-text"></p>
            </div>

            @error('images')
                <p class="text-xs text-red-600 dark:text-red-400 mb-3">{{ $message }}</p>
            @enderror
            @error('images.*')
                <p class="text-xs text-red-600 dark:text-red-400 mb-3">{{ $message }}</p>
            @enderror

            <!-- Drag & Drop Card dengan Tombol Upload dan Preview di Dalam -->
            <div class="relative">
                <input type="file" name="images[]" id="images-input" accept="image/*" multiple class="hidden"
                    aria-label="Upload Gambar Konten">
                <div id="images-upload-card"
                    class="border-2 border-dashed border-gray-300 dark:border-slate-600 cursor-pointer hover:border-green-500 dark:hover:border-green-600 transition-colors rounded relative min-h-64 flex flex-col items-center justify-center"
                    role="button" aria-label="Area upload gambar"
                    tabindex="0">
                    <button type="button" id="images-add-btn"
                        class="absolute top-2 left-2 z-20 p-1.5 text-xs font-semibold text-white bg-green-600 hover:bg-green-700 shadow-md transition-all rounded hidden"
                        aria-label="Tambah Gambar">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4"></path>
                        </svg>
                    </button>
                    <div id="images-upload-default" class="text-center space-y-3 w-full h-full flex flex-col items-center justify-center p-8">
                        <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                            </path>
                        </svg>

                        <p class="text-base font-semibold text-slate-700 dark:text-white text-center">Klik atau tarik gambar ke sini</p>
                        <p class="text-sm text-slate-400 dark:text-slate-500 text-center">Format yang didukung: JPG, PNG (Maks. 5MB per gambar)</p>
                    </div>

                    <div id="images-list-wrapper" class="w-full p-2">
                        <div id="images-list" class="grid grid-cols-2 gap-3">
                            @php
                                $existingImagesInline = $post->images ?? [];
                                if (old('existing_images')) {
                                    $oldImagesInline = old('existing_images');
                                    if (is_string($oldImagesInline)) {
                                        $oldImagesInline = json_decode($oldImagesInline, true) ?? [];
                                    }
                                    if (is_array($oldImagesInline) && !empty($oldImagesInline)) {
                                        $existingImagesInline = $oldImagesInline;
                                    }
                                }
                                if (is_string($existingImagesInline)) {
                                    $existingImagesInline = json_decode($existingImagesInline, true) ?? [];
                                }
                                if (!is_array($existingImagesInline)) {
                                    $existingImagesInline = [];
                                }
                                $existingImagesInline = array_filter($existingImagesInline, function ($img) {
                                    return !empty($img) && is_string($img);
                                });
                            @endphp
                            @foreach($existingImagesInline as $index => $image)
                                <div class="image-item relative group draggable-image p-1" draggable="true"
                                    data-type="existing" data-image="{{ $image }}" data-index="{{ $index }}">
                                    <div class="overflow-hidden border border-gray-300 dark:border-slate-700 cursor-move rounded"
                                        data-image-preview data-image-src="{{ asset('storage/' . $image) }}"
                                        data-image-title="Pratinjau">
                                        <img src="{{ asset('storage/' . $image) }}" alt="Gambar {{ $index + 1 }}"
                                            class="w-full aspect-video object-cover hover:opacity-90 transition-opacity pointer-events-none">
                                    </div>
                                    <button type="button"
                                        class="remove-existing-image-btn absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-10"
                                        data-image="{{ $image }}"
                                        aria-label="Hapus Gambar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                            </path>
                                        </svg>
                                    </button>
                                    <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div>
        <x-textarea
            name="body"
            id="body-editor"
            label="Isi Konten"
            :value="$post->body"
            rows="10"
            required
            placeholder="Masukkan isi konten berita atau artikel lengkap"
            :error="$errors->first('body')"
        />
        </div>
    </div>

    <div class="space-y-6">
        <div
            class="bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 p-4 space-y-4 rounded">
            <div>
            <div>
                <x-select
                    name="type"
                    id="type-select"
                    label="Tipe"
                    :selected="old('type', $type ?? $post->type ?? 'berita')"
                    :error="$errors->first('type')"
                    hint="Pilih jenis konten yang akan ditampilkan di menu berita atau artikel."
                >
                    <option value="berita" @selected(old('type', $type ?? $post->type ?? 'berita') === 'berita')>Berita</option>
                    <option value="artikel" @selected(old('type', $type ?? $post->type ?? 'berita') === 'artikel')>Artikel</option>
                </x-select>
            </div>
            </div>

            <div>
            <div>
                <x-select
                    name="status"
                    id="status-select"
                    label="Status"
                    :selected="old('status', $post->status ?? 'published')"
                    :error="$errors->first('status')"
                >
                    <option value="published" @selected(old('status', $post->status ?? 'published') === 'published')>Publikasi</option>
                    <option value="draft" @selected(old('status', $post->status ?? 'published') === 'draft')>Draft</option>
                    @if($post->id)
                        <option value="unpublished" @selected(old('status', $post->status) === 'unpublished')>Nonaktif</option>
                    @endif
                </x-select>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Publikasi: tampil di website. Draft: simpan sementara.@if($post->id) Nonaktif: sembunyikan dari website.@endif</p>
            </div>
            </div>

            <div>
            <div>
                <x-input
                    name="author_name"
                    id="author-name-input"
                    label="Nama Penulis"
                    class="uppercase-label"
                    :value="$post->author_name ?? 'Admin'"
                    required
                    maxlength="100"
                    autocomplete="name"
                    placeholder="Masukkan nama penulis"
                    :error="$errors->first('author_name')"
                    hint="Nama penulis yang akan ditampilkan di website."
                />
            </div>
            </div>

            @if(!$post->id)
                <div id="schedule-section">
                    <p class="block text-base font-bold text-slate-700 dark:text-white mb-1">Pengaturan Publikasi</p>
                    @php
                        $scheduleChecked = old('published_at_date') || old('published_at_time');
                    @endphp
                    <label for="schedule-toggle" class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="schedule-toggle"
                            class="w-4 h-4 border-gray-300 dark:border-slate-600 text-green-700 dark:bg-slate-700" {{ $scheduleChecked ? 'checked' : '' }}>
                        <span class=\"text-base font-semibold text-slate-700 dark:text-slate-400\">Jadwalkan publikasi</span>
                    </label>
                    <div id="schedule-fields" class="mt-2 {{ $scheduleChecked ? '' : 'hidden' }}">
                        <div class="space-y-2">
                            <input type="date" name="published_at_date" id="published-at-date"
                                value="{{ old('published_at_date') }}" autocomplete="off"
                                class="w-full bg-white dark:bg-slate-800 border-2 border-gray-200 dark:border-slate-600 text-slate-900 dark:text-slate-100 px-3 py-1.5 text-base focus:border-green-600 focus:outline-none rounded"
                                aria-label="Tanggal Publikasi">
                            <input type="time" name="published_at_time" id="published-at-time"
                                value="{{ old('published_at_time') }}" autocomplete="off"
                                class="w-full bg-white dark:bg-slate-800 border-2 border-gray-200 dark:border-slate-600 text-slate-900 dark:text-slate-100 px-3 py-1.5 text-base focus:border-green-600 focus:outline-none rounded"
                                aria-label="Waktu Publikasi">
                        </div>
                        @error('published_at_date') <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}
                        </p> @enderror
                        @error('published_at_time') <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}
                        </p> @enderror
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Jika dijadwalkan, konten akan
                            dipublikasikan sesuai tanggal dan waktu yang dipilih. Jika tidak, akan dipublikasikan otomatis
                            saat diset status "Publikasi".</p>
                    </div>
                </div>
            @endif

            @php $currentType = $type ?? $post->type ?? 'berita'; @endphp
            <div id="highlight-checkbox-container"
                class="{{ $currentType === 'berita' ? '' : 'hidden' }} flex items-center gap-2">
                <input type="checkbox" id="is_featured" name="is_featured" value="1"
                    class="w-4 h-4 border-gray-300 dark:border-slate-600 text-green-700 dark:bg-slate-700"
                    @checked(old('is_featured', $post->is_featured))>
                <label for=\"is_featured\" class=\"text-base font-semibold text-slate-700 dark:text-slate-400\">Tampilkan sebagai
                    highlight</label>
            </div>
            @if($currentType !== 'berita')
                <input type="hidden" name="is_featured" id="is_featured_hidden" value="0">
            @endif

            <div>
                <label for="tag-input"
                    class="block text-base font-bold text-slate-700 dark:text-white mb-1">Tag <span
                        class="text-xs font-normal text-slate-400 dark:text-slate-500">(opsional)</span></label>
                <div class="relative tags-input-container">
                    <div id="tags-wrapper"
                        class="border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 min-h-9.5 flex flex-wrap gap-2 items-center bg-white dark:bg-slate-800 focus-within:border-green-600 focus-within:outline-none rounded">
                        <div id="tags-container" class="flex flex-wrap gap-2 tags-container">
                            @php
                                $tags = old('tags', $post->tags ?? []);
                                if (is_string($tags)) {
                                    $tags = json_decode($tags, true) ?? [];
                                }
                                // Pastikan tags selalu array, bukan integer atau tipe lain
                                if (!is_array($tags)) {
                                    $tags = [];
                                }
                            @endphp
                            @if(!empty($tags) && is_array($tags))
                                @foreach($tags as $index => $tag)
                                    <div
                                        class="tag-item inline-flex items-center bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-white pl-2 pr-0.5 py-0.5 rounded-md text-xs font-medium border border-green-200 dark:border-green-700">
                                        <span class="mr-1">{{ $tag }}</span>
                                        <button type="button" data-remove-tag
                                            class="text-green-600 dark:text-white hover:text-green-800 dark:hover:text-white p-0.5 rounded-r-md hover:bg-green-100 dark:hover:bg-green-800/50 flex items-center justify-center"
                                            aria-label="Hapus Tag">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                        <input type="hidden" name="tags[]" id="tag-hidden-{{ $index }}" value="{{ $tag }}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <label for="tag-input" class="sr-only">Masukkan tag</label>
                        <input type="text" id="tag-input" name="tag-input" placeholder="Masukkan tag dan tekan Enter"
                            maxlength="50" autocomplete="off" data-tags-input
                            class="flex-1 min-w-30 border-0 outline-none bg-transparent text-base text-slate-700 dark:text-slate-300 placeholder-slate-400 dark:placeholder-slate-500">
                    </div>
                    <div id="tag-suggestions"
                        class="absolute z-50 w-full mt-1 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-600 shadow-lg max-h-60 overflow-y-auto hidden">
                        <div id="suggestions-list" class="py-1"></div>
                    </div>
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Masukkan tag satu per satu. <strong>Maksimal
                        10 tag.</strong> Sistem akan menampilkan suggestions dari tag yang sudah digunakan.</p>
                @error('tags') <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p> @enderror
                @error('tags.*') <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>


            <!-- Thumbnail Section -->
            <div>
                <label for="thumbnail-input"
                    class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Thumbnail
                    <span class="text-red-600 dark:text-red-500">*</span></label>
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">Upload file thumbnail.</p>
                <div class="relative">
                    <input type="hidden" name="remove_thumbnail" id="remove-thumbnail-flag" value="0">
                    <input type="file" name="thumbnail" id="thumbnail-input" accept="image/*" class="hidden"
                        aria-label="Upload Thumbnail">
                    <div id="thumbnail-upload-card"
                        class="border-2 border-dashed border-gray-300 dark:border-slate-600 p-1.5 text-center cursor-pointer hover:border-green-500 dark:hover:border-green-600 transition-colors rounded aspect-video flex flex-col items-center justify-center relative overflow-hidden"
                        role="button"
                        aria-label="Area upload thumbnail" tabindex="0">
                        <div id="thumbnail-upload-default" class="{{ $post->thumbnail_path ? 'hidden' : '' }} space-y-1 w-full h-full flex flex-col items-center justify-center p-6">
                            <svg class="w-10 h-10 text-gray-400 dark:text-slate-500 mx-auto mb-1.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>

                            <p class="text-xs font-semibold text-slate-700 dark:text-slate-300 text-center">Klik atau tarik gambar ke sini</p>
                            <p class="text-[10px] text-slate-400 dark:text-slate-500 text-center leading-tight">Format: JPG, PNG (Maks. 5MB)</p>
                        </div>
                        <div id="thumbnail-preview" class="{{ $post->thumbnail_path ? '' : 'hidden' }} w-full h-full">
                            <div class="relative group h-full">
                                <div class="relative inline-block w-full h-full aspect-video overflow-hidden border border-gray-300 dark:border-slate-700 cursor-pointer hover:opacity-90 transition-opacity rounded"
                                    data-image-preview
                                    data-image-src="{{ $post->thumbnail_path ? asset('storage/' . $post->thumbnail_path) : '#thumbnail-preview-img' }}"
                                    data-image-title="Pratinjau Thumbnail">
                                    <img id="thumbnail-preview-img"
                                        src="{{ $post->thumbnail_path ? asset('storage/' . $post->thumbnail_path) : '' }}"
                                        alt="Pratinjau Thumbnail" class="w-full h-full object-cover">
                                </div>
                                <button type="button" id="remove-thumbnail-btn"
                                    class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-10"
                                    aria-label="Hapus Thumbnail">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @error('thumbnail') <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Meta Description Section -->
            <div>
                <x-textarea
                    name="meta_description"
                    id="meta-description-input"
                    label="Deskripsi Meta (opsional)"
                    :value="$post->meta_description"
                    rows="8"
                    maxlength="255"
                    placeholder="Deskripsi singkat untuk mesin pencari"
                    hint="Akan muncul di hasil pencarian Google. Jika kosong, menggunakan bagian awal konten."
                />
            </div>
        </div>



        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('cpanel.publikasi.index', request()->query()) }}" id="cancel-btn" class="inline-flex min-w-20 sm:min-w-25 items-center justify-center px-3 py-1.5 sm:px-4 text-base font-semibold text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 transition-colors rounded shadow-sm">Batal</a>
            <x-button type="submit" id="submit-btn" :disabled="!$post->id" class="min-w-20 sm:min-w-25 focus:ring-0! focus:ring-offset-0! px-3! py-1.5! sm:px-4! text-base! shadow-sm">
                <span id="submit-btn-text">{{ $post->id ? 'Simpan' : 'Publish' }}</span>
            </x-button>
        </div>
    </div>
</div>

<!-- Modal Peringatan Tag Maksimal -->
<div id="tag-limit-modal" class="hidden fixed inset-0 bg-black/30 dark:bg-black/50 z-50 items-center justify-center">
    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-2">Maksimal Tag</h3>
            <p class="text-sm text-slate-600 dark:text-slate-400 mb-6">Maksimal 10 tag. Silakan hapus tag yang ada
                terlebih dahulu.</p>
            <div class="flex items-center justify-end gap-3">
                <button type="button" id="tag-limit-modal-ok-btn"
                    class="px-4 py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors min-w-25 rounded">Oke</button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Peringatan Duplikasi Gambar (Slide Down) -->
<div id="duplicate-image-modal" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-300 hidden flex-col items-center transition-all duration-500 ease-out -translate-y-full opacity-0">
    <div class="bg-blue-600 dark:bg-blue-700 border border-blue-700 dark:border-blue-800 rounded-lg shadow-2xl px-6 py-4 max-w-md w-full mx-4 flex items-center gap-4">
        <div class="shrink-0 text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <div class="flex-1">
            <p class="text-sm font-medium text-white" id="duplicate-image-modal-text">
                Gambar ini sudah ada dalam daftar.
            </p>
        </div>
    </div>
</div>

<!-- Toast Peringatan Ukuran File (Slide Down) -->
<div id="size-limit-modal" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-300 hidden flex-col items-center transition-all duration-500 ease-out -translate-y-full opacity-0">
    <div class="bg-red-600 dark:bg-red-700 border border-red-700 dark:border-red-800 rounded-lg shadow-2xl px-6 py-4 max-w-md w-full mx-4 flex items-center gap-4">
        <div class="shrink-0 text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
        </div>
        <div class="flex-1">
            <p class="text-sm font-medium text-white" id="size-limit-modal-text">
                Ukuran file terlalu besar (Maksimal 5MB).
            </p>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus Gambar -->


<!-- Image Preview Modal (Full Screen seperti Banner) -->
<!-- Fungsi openImagePreview dan closeImagePreview sudah didefinisikan secara global di admin.js -->
<div id="imagePreviewModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/30 dark:bg-black/50 backdrop-blur-md"
    data-image-preview-modal>
    <div class="relative w-full h-full flex items-center justify-center p-3" data-image-preview-content>
        <img id="previewImage" src="" alt="Preview" class="max-w-full max-h-[90vh] object-contain pointer-events-none">
        <button type="button"
            class="close-modal-btn fixed top-4 right-4 w-10 h-10 flex items-center justify-center text-white hover:text-slate-200 transition-colors z-10"
            data-image-preview-close aria-label="Tutup Pratinjau">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>
