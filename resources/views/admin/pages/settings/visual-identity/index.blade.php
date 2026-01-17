@extends('admin.layouts.admin')

@section('title', 'Identitas Visual')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-lg sm:text-2xl font-bold text-slate-900 dark:text-slate-100">Identitas Visual</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola banner, logo, dan Informasi Banner secara
                    terpusat</p>
            </div>
            <!-- Floating Save Button Top Right -->
            <button type="button" id="visual-identity-save-all-btn-floating"
                class="px-3 py-1.5 sm:px-4 sm:py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-all duration-200 shadow-sm hover:shadow-md rounded disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-none min-w-20 sm:min-w-25"
                disabled>
                Simpan
            </button>
        </div>


        <div id="visual-identity-container" data-current-banner-count="{{ $currentBannerCount }}"
            data-max-banners="{{ $maxBanners }}"
            data-update-order-route="{{ route('cpanel.visual-identity.banner.update-order') }}"
            class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 space-y-3 tab-content rounded shadow-sm">
            <!-- Tanpa tab: gabungkan Banner dan Logo dalam satu halaman -->

            <!-- Logo -->
            <div class="px-4 pt-4 pb-2 sm:px-6 sm:pt-6">
                <div class="mb-4">
                    <h2 class="text-sm sm:text-lg font-bold text-slate-900 dark:text-slate-100 mb-1">Logo</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Unggah logo baru untuk dipakai di seluruh website
                    </p>
                </div>

                <form action="{{ route('cpanel.visual-identity.update') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6" data-unsaved-changes="true" data-notify="loading">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div data-flash-error class="hidden">
                            @foreach ($errors->all() as $error)
                                @if (str_contains($error, 'terlalu besar') || str_contains($error, 'gambar') || str_contains($error, 'image') || str_contains($error, 'format'))
                                    {{ $error }}
                                    @break
                                @endif
                            @endforeach
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="logo-upload"
                                class="block text-base font-semibold text-slate-700 dark:text-white mb-2">Upload Logo
                                Baru</label>

                            <!-- Drag & Drop Card untuk Logo -->
                            <input type="file" name="logo" id="logo-upload" accept="image/*" class="hidden">

                            <div id="logo-upload-card"
                                class="w-full aspect-square border-2 border-dashed border-gray-300 dark:border-slate-600 p-6 text-center cursor-pointer hover:border-green-500 dark:hover:border-green-600 transition-colors relative flex flex-col items-center justify-center rounded">
                                <!-- Default Content -->
                                <div id="logo-upload-default"
                                    class="space-y-3 w-full h-full flex flex-col items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p class="text-base font-semibold text-slate-700 dark:text-white text-center">Klik
                                        atau tarik logo ke sini</p>
                                    <p class="text-sm text-slate-400 dark:text-slate-500 text-center">Format: PNG, JPG, SVG
                                        (Maks. 5MB)</p>
                                </div>

                                <!-- Preview Image -->
                                <div id="logo-preview-container" class="hidden w-full h-full items-center justify-center">
                                    <div class="relative w-full h-full flex items-center justify-center group">
                                        <div
                                            class="relative w-full h-full flex items-center justify-center max-w-[85%] max-h-[85%]">
                                            <img id="logo-preview-img" src="" alt="Preview Logo"
                                                class="max-w-full max-h-full object-contain pointer-events-none">
                                            <button type="button" id="logo-reset-btn"
                                                class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-20"
                                                aria-label="Hapus Logo">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="block text-base font-semibold text-slate-700 dark:text-white mb-2">Logo Saat Ini
                            </div>
                            <div
                                class="w-full aspect-square border border-gray-300 dark:border-slate-600 flex items-center justify-center bg-slate-50 dark:bg-slate-700 overflow-hidden rounded">
                                @php
                                    $logoPath = optional($visualIdentity)->logo_path ? 'storage/' . $visualIdentity->logo_path : 'images/logo/logo.png';
                                    $logoVersion = $visualIdentity && $visualIdentity->logo_path ? ($visualIdentity->updated_at ? $visualIdentity->updated_at->timestamp : time()) : (file_exists(public_path($logoPath)) ? filemtime(public_path($logoPath)) : null);
                                    $logoSrc = asset($logoPath) . ($logoVersion ? '?v=' . $logoVersion : '');
                                @endphp
                                <img src="{{ $logoSrc }}" alt="Logo saat ini"
                                    class="max-w-[80%] max-h-[80%] object-contain">
                            </div>
                        </div>
                    </div>

                    <!-- Tombol simpan logo dihilangkan: gunakan tombol Simpan global -->
                </form>
            </div>

            <!-- Banner -->
            <div class="px-6 pt-0 pb-6">
                @php
                    // Mapping variabel agar sesuai dengan yang digunakan di partial banners sebelumnya
                    $settings = $bannerSettings;
                    $inline = true;
                @endphp
                <div class="space-y-6">

                    <!-- Pengaturan Banner -->
                    <div class="space-y-6">
                        <h2 class="text-sm sm:text-lg font-bold text-slate-900 dark:text-slate-100 mb-1">Banner</h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mb-4">Upload gambar untuk slide banner. Setiap
                            gambar akan menjadi slide terpisah. <span
                                class="font-semibold text-slate-700 dark:text-slate-300">Maksimal 6 banner slide.</span></p>

                        @php
                            $currentBannerCount = $banners->count();
                            $maxBanners = 6;
                        $canUpload = $currentBannerCount < $maxBanners; @endphp @if($currentBannerCount >= $maxBanners)
        <!-- Peringatan jika sudah mencapai batas maksimal -->
        <div
            class="mb-4 p-4 bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-amber-600 dark:text-amber-400 mt-0.5 shrink-0" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                    </path>
                </svg>
                <div>
                    <p class="text-sm font-semibold text-amber-800 dark:text-amber-200 mb-1">Batas Maksimal
                        Tercapai</p>
                    <p class="text-sm text-amber-700 dark:text-amber-300">Anda sudah memiliki
                        {{ $currentBannerCount }} banner slide (maksimal {{ $maxBanners }}). Hapus banner
                        yang tidak digunakan terlebih dahulu untuk menambah banner baru.
                    </p>
                </div>
            </div>
        </div>
    @endif

                        <!-- Form Upload dengan Drag & Drop Card -->
                        <form action="{{ route('cpanel.visual-identity.banner.upload') }}" method="POST"
                            enctype="multipart/form-data" id="uploadForm" data-unsaved-changes="true" data-notify="loading" @if(!$canUpload)
                            class="opacity-50 pointer-events-none" @endif>
                            @csrf
                            @if ($errors->any())
                                <div data-flash-error class="hidden">
                                    @foreach ($errors->all() as $error)
                                        @if (str_contains($error, 'terlalu besar') || str_contains($error, 'gambar') || str_contains($error, 'image') || str_contains($error, 'format'))
                                            {{ $error }}
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            @if(isset($inline) && $inline)
                                <input type="hidden" name="_redirect_after_save"
                                    value="{{ route('cpanel.visual-identity.index') }}">
                            @endif
                            <label for="gambar" class="sr-only">Pilih gambar banner</label>
                            <input type="file" name="gambar[]" id="gambar" accept="image/*" multiple class="hidden">

                            <!-- Drag & Drop Card dengan Tombol Upload -->
                            <div class="relative">
                                <div id="banner-upload-card"
                                    class="min-h-112 border-2 border-dashed border-gray-300 dark:border-slate-600 p-6 cursor-pointer hover:border-green-500 dark:hover:border-green-600 transition-colors rounded relative">

                                    <!-- Tampilan KOSONG: Upload Default -->
                                    <div id="banner-upload-default"
                                        class="absolute inset-0 text-center space-y-3 w-full h-full flex flex-col items-center justify-center {{ $banners->count() > 0 ? 'hidden' : '' }}">
                                        <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="text-base font-semibold text-slate-700 dark:text-white text-center">
                                            Klik atau tarik gambar ke sini</p>
                                        <p class="text-sm text-slate-400 dark:text-slate-500 text-center">Format yang
                                            didukung: JPG, PNG, WEBP (Maks. 5MB per gambar)</p>
                                    </div>

                                    <!-- Wrapper untuk List Banner (Existing + New) -->
                                    <div id="banner-content-wrapper" class="{{ $banners->count() > 0 ? '' : 'hidden' }}">
                                        <!-- Tombol Tambah di Pojok -->
                                        <!-- Tombol Tambah di Pojok Kiri Atas -->
                                        @if($canUpload)
                                            <button type="button" id="banner-add-btn"
                                                class="absolute top-2 left-2 z-20 p-1.5 text-xs font-semibold text-white bg-green-600 hover:bg-green-700 shadow-md transition-all rounded"
                                                title="Tambah Banner">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4v16m8-8H4"></path>
                                                </svg>
                                            </button>
                                        @endif

                                        <!-- Grid Gabungan -->
                                        <div id="banner-list"
                                            class="grid {{ $banners->count() === 1 ? 'grid-cols-1 max-w-2xl mx-auto' : 'grid-cols-2' }} gap-3"
                                            data-total="{{ $banners->count() }}">
                                            <!-- Existing Banners -->
                                            @foreach($banners as $banner)
                                                <div class="relative group cursor-move banner-item p-1"
                                                    data-id="{{ $banner->id }}" data-urutan="{{ $banner->urutan }}"
                                                    data-delete-url="{{ route('cpanel.visual-identity.banner.destroy', $banner) }}">
                                                    <!-- Tombol Hapus (X) -->
                                                    <button type="button"
                                                        data-url="{{ route('cpanel.visual-identity.banner.destroy', $banner) }}"
                                                        data-id="{{ $banner->id }}"
                                                        class="js-delete-banner-btn absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-20">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>

                                                    <div class="w-full aspect-video overflow-hidden border border-gray-300 dark:border-slate-700 cursor-move rounded"
                                                        data-image-preview
                                                        data-image-src="{{ $banner->gambar ? asset('storage/' . $banner->gambar) : asset('images/background/default-backgrounds.png') }}"
                                                        data-image-title="Banner {{ $banner->urutan }}">
                                                        <img src="{{ $banner->gambar ? asset('storage/' . $banner->gambar) : asset('images/background/default-backgrounds.png') }}?v={{ $banner->updated_at->timestamp ?? time() }}"
                                                            alt="Banner"
                                                            class="w-full h-full object-cover hover:opacity-90 transition-opacity">
                                                    </div>
                                                </div>
                                            @endforeach

                                            <!-- New Banners (Previews) - Display contents agar masuk grid -->
                                            <div id="banner-preview-list" class="contents"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Form Upload Selesai -->

                        <!-- Banner Promosi -->
                        <div>
                            <h2 class="text-sm sm:text-lg font-bold text-slate-900 dark:text-slate-100 mb-1">Banner
                                Promosi</h2>
                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">Upload banner promosi yang akan
                                ditampilkan di beranda antara berita dan artikel.</p>
                            <p class="text-xs text-green-600 dark:text-green-400 font-medium mb-4">Ukuran yang disarankan:
                                1920 × 600 px</p>

                            <form action="{{ route('cpanel.visual-identity.promosi.upload') }}" method="POST"
                                enctype="multipart/form-data" id="promosiForm" data-unsaved-changes="true" data-notify="loading">
                                @csrf
                                @if(isset($inline) && $inline)
                                    <input type="hidden" name="_redirect_after_save"
                                        value="{{ route('cpanel.visual-identity.index') }}">
                                @endif
                                <label for="promosi_banner" class="sr-only">Pilih banner promosi</label>
                                <input type="file" name="promosi_banner" id="promosi_banner" accept="image/*"
                                    class="hidden">

                                <!-- Drag & Drop Card untuk Banner Promosi -->
                                <div id="promosi-upload-card"
                                    class="min-h-64 border-2 border-dashed border-gray-300 dark:border-slate-600 p-8 text-center cursor-pointer hover:border-green-500 dark:hover:border-green-600 transition-colors relative rounded">
                                    <!-- Default Content -->
                                    <div id="promosi-upload-default"
                                        class="absolute inset-0 space-y-3 w-full h-full flex flex-col items-center justify-center {{ ($settings && $settings->promosi_banner_path) ? 'hidden' : '' }}">
                                        <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="text-base font-semibold text-slate-700 dark:text-white text-center">
                                            Klik atau tarik gambar ke sini</p>
                                        <p class="text-sm text-slate-400 dark:text-slate-500 text-center">Format yang
                                            didukung: JPG, PNG, WEBP (Maks. 5MB per gambar)</p>
                                    </div>

                                    <!-- Preview Image -->
                                    <div id="promosi-preview-container"
                                        class="{{ ($settings && $settings->promosi_banner_path) ? '' : 'hidden' }}">
                                        <div class="relative border border-gray-300 dark:border-slate-700 overflow-hidden group rounded aspect-1920/600 cursor-pointer hover:opacity-90 transition-opacity"
                                            data-image-preview data-image-src="#promosi-preview-img"
                                            data-image-title="Banner Promosi">
                                            <img id="promosi-preview-img"
                                                src="{{ $settings && $settings->promosi_banner_path ? asset('storage/' . $settings->promosi_banner_path) : '' }}"
                                                alt="Preview" class="w-full h-full object-cover">
                                            @if($settings && $settings->promosi_banner_path)
                                                <button type="button" id="delete-promosi-btn"
                                                    class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-10"
                                                    aria-label="Hapus Banner Promosi">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            @else
                                                <button type="button" id="promosi-reset-btn"
                                                    class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-10"
                                                    aria-label="Reset Banner Promosi">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- Tombol Upload Promosi di luar kotak -->
                            <!-- Tombol upload dihilangkan: gunakan tombol Simpan global -->

                            <!-- Banner Promosi tersimpan ditampilkan di dalam card di atas -->
                        </div>

                        <!-- Form Pengaturan Informasi Banner -->
                        <div>
                            <h2 class="text-base sm:text-lg font-bold text-slate-900 dark:text-slate-100 mb-1">Informasi
                                Banner</h2>
                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-4">Informasi ini akan digunakan untuk
                                semua slide banner</p>

                            <form action="{{ route('cpanel.visual-identity.settings.update') }}" method="POST"
                                enctype="multipart/form-data" id="settings-form" data-unsaved-changes="true" data-notify="loading">
                                @csrf
                                @method('POST')
                                @if(isset($inline) && $inline)
                                    <input type="hidden" name="_redirect_after_save"
                                        value="{{ route('cpanel.visual-identity.index') }}">
                                @endif

                                <div class="space-y-4">
                                    <!-- Tagline -->
                                    <div>
                                        <label for="tagline"
                                            class="block text-base font-semibold text-slate-700 dark:text-white mb-1">
                                            Tagline
                                            <span
                                                class="text-xs font-normal text-slate-400 dark:text-slate-500">(opsional)</span>
                                        </label>
                                        <div class="relative">
                                            <input type="text" name="tagline" id="tagline"
                                                value="{{ old('tagline', $settings->tagline ?? '') }}" maxlength="150"
                                                placeholder="Masukkan tagline"
                                                class="w-full bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-600 rounded p-2 sm:px-3 sm:py-1.5 text-base text-slate-900 dark:text-slate-100 focus:border-green-600 focus:outline-none"
                                                data-max-length="150">
                                        </div>
                                    </div>

                                    <!-- Judul -->
                                    <div>
                                        <label for="judul"
                                            class="block text-base font-semibold text-slate-700 dark:text-white mb-1">
                                            Judul Banner
                                            <span
                                                class="text-xs font-normal text-slate-400 dark:text-slate-500">(opsional)</span>
                                        </label>
                                        <div class="relative">
                                            <input type="text" name="judul" id="judul"
                                                value="{{ old('judul', $settings->judul ?? '') }}" maxlength="150"
                                                placeholder="Masukkan judul banner"
                                                class="w-full bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-600 rounded p-2 sm:px-3 sm:py-1.5 text-base text-slate-900 dark:text-slate-100 focus:border-green-600 focus:outline-none"
                                                data-max-length="150">
                                        </div>
                                    </div>

                                    <!-- Deskripsi -->
                                    <div>
                                        <label for="deskripsi"
                                            class="block text-base font-semibold text-slate-700 dark:text-white mb-1">
                                            Deskripsi
                                            <span
                                                class="text-xs font-normal text-slate-400 dark:text-slate-500">(opsional)</span>
                                        </label>
                                        <div class="relative">
                                            <textarea name="deskripsi" id="deskripsi" rows="3" maxlength="200"
                                                placeholder="Masukkan deskripsi banner (maksimal 200 karakter)"
                                                class="w-full bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-600 rounded p-2 sm:px-3 sm:py-1.5 text-base text-slate-900 dark:text-slate-100 focus:border-green-600 focus:outline-none"
                                                data-max-length="200">{{ old('deskripsi', $settings->deskripsi ?? '') }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Link -->
                                    <div>
                                        <label for="link"
                                            class="block text-base font-semibold text-slate-700 dark:text-white mb-1">
                                            Link
                                            <span
                                                class="text-xs font-normal text-slate-400 dark:text-slate-500">(opsional)</span>
                                        </label>
                                        <div class="relative">
                                            <input type="url" name="link" id="link"
                                                value="{{ old('link', $settings->link ?? '') }}" maxlength="150"
                                                placeholder="Masukkan URL (contoh: https://example.com)"
                                                class="w-full bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-600 rounded p-2 sm:px-3 sm:py-1.5 text-base text-slate-900 dark:text-slate-100 focus:border-green-600 focus:outline-none"
                                                data-max-length="150" data-toggle-button-text>
                                        </div>
                                    </div>

                                    <!-- Button Text -->
                                    <div>
                                        <label for="button_text"
                                            class="block text-base font-semibold text-slate-700 dark:text-white mb-1">
                                            Teks Tombol
                                            <span
                                                class="text-xs font-normal text-slate-400 dark:text-slate-500">(opsional)</span>
                                        </label>
                                        <div class="relative">
                                            <input type="text" name="button_text" id="button_text"
                                                value="{{ old('button_text', $settings->button_text ?? '') }}"
                                                maxlength="150" placeholder="Masukkan teks tombol"
                                                class="w-full bg-gray-100 dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-600 rounded p-2 sm:px-3 sm:py-1.5 text-base text-slate-500 dark:text-slate-400 focus:border-green-600 focus:outline-none"
                                                data-max-length="150" disabled>
                                        </div>
                                    </div>

                                    <!-- Kontrol Tampilan Elemen -->
                                    <!-- Kontrol Tampilan Elemen -->
                                    <div class="">
                                        <h3 class="text-sm sm:text-lg font-bold text-slate-900 dark:text-slate-100 mb-1">
                                            Kontrol Tampilan Elemen</h3>
                                        <p class="text-[10px] sm:text-xs text-slate-500 dark:text-slate-400 mb-4">Kelola
                                            visibilitas elemen pada banner utama website.</p>
                                        <div class="space-y-3">
                                            <div class="flex items-center gap-2">
                                                <input type="checkbox" id="show_logo" name="show_logo" value="1" {{ old('show_logo', $settings->show_logo ?? true) ? 'checked' : '' }}
                                                    class="w-4 h-4 text-green-600 border-gray-300 rounded ">
                                                <label for="show_logo"
                                                    class="text-base font-normal text-slate-700 dark:text-white cursor-pointer">Tampilkan
                                                    Logo</label>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <input type="checkbox" id="show_tagline" name="show_tagline" value="1" {{ old('show_tagline', $settings->show_tagline ?? true) ? 'checked' : '' }}
                                                    class="w-4 h-4 text-green-600 border-gray-300 rounded ">
                                                <label for="show_tagline"
                                                    class="text-base font-normal text-slate-700 dark:text-white cursor-pointer">Tampilkan
                                                    Tagline</label>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <input type="checkbox" id="show_title" name="show_title" value="1" {{ old('show_title', $settings->show_title ?? true) ? 'checked' : '' }}
                                                    class="w-4 h-4 text-green-600 border-gray-300 rounded ">
                                                <label for="show_title"
                                                    class="text-base font-normal text-slate-700 dark:text-white cursor-pointer">Tampilkan
                                                    Judul</label>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <input type="checkbox" id="show_description" name="show_description"
                                                    value="1" {{ old('show_description', $settings->show_description ?? true) ? 'checked' : '' }}
                                                    class="w-4 h-4 text-green-600 border-gray-300 rounded ">
                                                <label for="show_description"
                                                    class="text-base font-normal text-slate-700 dark:text-white cursor-pointer">Tampilkan
                                                    Deskripsi</label>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <input type="checkbox" id="show_button" name="show_button" value="1" {{ old('show_button', $settings->show_button ?? true) ? 'checked' : '' }}
                                                    class="w-4 h-4 text-green-600 border-gray-300 rounded ">
                                                <label for="show_button"
                                                    class="text-base font-normal text-slate-700 dark:text-white cursor-pointer">Tampilkan
                                                    Tombol</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tombol simpan dihilangkan: gunakan tombol Simpan global di bawah -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Tombol Simpan Semua -->
            <div
                class="mx-4 sm:mx-6 pt-4 pb-6 border-t border-gray-200 dark:border-slate-700 mt-6 flex items-center justify-end gap-3">
                <button type="button" id="visual-identity-save-all-btn"
                    class="px-4 py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-all duration-200 shadow-sm hover:shadow-md rounded disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-none min-w-20 sm:min-w-25"
                    disabled>
                    Simpan
                </button>
            </div>
        </div>
    </div>



    <!-- Image Preview Modal (Full Screen untuk Banner) -->
    <div id="imagePreviewModal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/30 dark:bg-black/50 backdrop-blur-sm"
        data-image-preview-modal>
        <div class="relative w-full h-full flex items-center justify-center p-3" data-image-preview-content>
            <img id="previewImage" src="" alt="Preview" class="max-w-full max-h-[90vh] object-contain pointer-events-none">
            <button type="button"
                class="close-modal-btn fixed top-4 right-4 w-10 h-10 flex items-center justify-center text-white hover:text-slate-200 transition-colors z-10"
                data-image-preview-close>
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Size Limit Error Modal -->
    <div id="size-limit-modal"
        class="hidden fixed top-4 left-1/2 -translate-x-1/2 z-300 bg-red-50 dark:bg-red-900/20 border border-red-300 dark:border-red-700 rounded-lg shadow-lg p-4 max-w-sm w-full mx-2 -translate-y-full opacity-0 transition-all duration-500">
        <div class="flex items-start gap-3">
            <svg class="w-6 h-6 text-red-600 dark:text-red-400 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div class="flex-1">
                <p class="text-sm font-medium text-red-800 dark:text-red-300" id="size-limit-modal-text">File terlalu besar
                </p>
            </div>
        </div>
    </div>

@endsection
