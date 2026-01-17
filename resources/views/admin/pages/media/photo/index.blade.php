@extends('admin.layouts.admin')

@section('title', 'Galeri')

@section('content')
    {{-- Halaman Galeri Foto Kegiatan - Upload & Kelola Foto --}}
    <div class="space-y-6">
        {{-- Header dengan title & tombol upload --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-lg sm:text-2xl font-bold text-slate-900 dark:text-slate-100">Galeri Foto Kegiatan</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Upload dan kelola dokumentasi kegiatan sekolah
                </p>
            </div>

            @if($fotos->count() > 0)
                <button type="button"
                    class="js-open-upload-modal inline-flex items-center justify-center p-2 sm:px-3 sm:py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors rounded">
                    <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span class="hidden sm:inline">Upload Foto</span>
                </button>
            @endif
        </div>

        {{-- Tampil Grid 3 kolom jika ada foto --}}
        @if($fotos->count() > 0)
            <div class="p-4 sm:p-6 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 rounded shadow-sm">
                {{-- Grid responsive: 1 kolom mobile, 2 tablet, 3 desktop --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($fotos as $foto)
                        {{-- Card foto dengan hover effect & tombol delete --}}
                        <div class="relative group overflow-hidden rounded border border-gray-300 dark:border-slate-600">
                            {{-- Thumbnail foto, click untuk preview fullscreen --}}
                            <div class="relative w-full overflow-hidden bg-slate-100 dark:bg-slate-700 cursor-pointer hover:opacity-90 transition-opacity"
                                data-image-preview
                                data-image-src="{{ $foto->gambar ? asset('storage/' . $foto->gambar) : asset('images/background/default-backgrounds.png') }}"
                                data-image-title="{{ $foto->judul ?? 'Foto Kegiatan' }}" style="aspect-ratio: 16 / 9;">
                                <img src="{{ $foto->gambar ? asset('storage/' . $foto->gambar) : asset('images/background/default-backgrounds.png') }}"
                                    alt="{{ $foto->judul ?? 'Foto Kegiatan' }}" class="w-full h-full object-cover">
                            </div>

                            {{-- Tombol hapus (muncul saat hover) --}}
                            <button type="button"
                                class="js-delete-photo-btn absolute top-2 right-2 opacity-0 group-hover:opacity-100 p-1.5 bg-red-600 hover:bg-red-700 text-white transition-all z-10 rounded-full shadow-lg"
                                data-delete-url="{{ route('cpanel.foto-kegiatan.destroy', $foto) }}"
                                data-delete-title="Foto Kegiatan" data-delete-message="Apakah Anda yakin ingin menghapus foto ini?"
                                title="Hapus">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $fotos->links() }}
            </div>
        @else
            {{-- Tampil jika galeri kosong --}}
            <div
                class="flex flex-col items-center justify-center p-12 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700">
                <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-full mb-4">
                    <svg class="w-12 h-12 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-slate-100">Galeri Masih Kosong</h3>
                <p class="text-slate-500 dark:text-slate-400 text-center max-w-sm mt-1 mb-6">Belum ada foto kegiatan yang
                    diupload. Silakan upload foto dokumentasi kegiatan sekolah.</p>
                <button type="button"
                    class="js-open-upload-modal inline-flex items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors rounded">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Upload Foto</span>
                </button>
            </div>
        @endif
    </div>
    {{-- Modal Upload dengan Drag & Drop --}}
    <div id="uploadModal" class="fixed inset-0 z-200 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        {{-- Backdrop semi-transparent --}}
        <div class="fixed inset-0 bg-gray-900/20 transition-opacity opacity-0" id="modalBackdrop"></div>

        <div class="fixed inset-0 z-10 overflow-hidden flex items-center justify-center p-4">
            {{-- Modal Panel --}}
            <div class="relative transform bg-white dark:bg-slate-800 text-left shadow-2xl transition-all my-8 w-full max-w-3xl mx-auto opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95 rounded max-h-[90vh] flex flex-col"
                id="modalPanel">

                {{-- Form upload ke server --}}
                <form action="{{ route('cpanel.foto-kegiatan.store') }}" method="POST" enctype="multipart/form-data"
                    id="uploadForm" data-notify="loading">
                    @csrf
                    <div class="bg-white dark:bg-slate-800 px-4 pb-4 pt-5 sm:p-6 sm:pb-4 flex-1 overflow-y-auto">
                        {{-- Header modal --}}
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold leading-6 text-slate-900 dark:text-slate-100" id="modal-title">
                                Upload Foto Kegiatan</h3>
                            {{-- Tombol close --}}
                            <button type="button"
                                class="js-close-upload-modal text-slate-400 hover:text-slate-500 transition-colors">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="mt-4">
                            {{-- Zone untuk drag & drop atau klik file --}}
                            <div id="dropzone"
                                class="relative flex flex-col items-center justify-center w-full min-h-[60vh] border-2 border-dashed border-gray-300 dark:border-slate-600 rounded cursor-pointer bg-slate-50 dark:bg-slate-800/50 hover:border-green-500 dark:hover:border-green-500 transition-all duration-300 group">

                                {{-- Tombol "Tambah Lagi" (muncul saat preview visible) --}}
                                <button type="button" id="addMoreBtn"
                                    class="absolute top-2 left-2 z-20 p-1.5 text-xs font-semibold text-white bg-green-600 hover:bg-green-700 shadow-md transition-all rounded hidden"
                                    title="Tambah Foto">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </button>

                                {{-- Placeholder saat belum ada file --}}
                                <div id="uploadPlaceholder"
                                    class="flex flex-col items-center justify-center w-full h-full p-8 text-center space-y-3">
                                    <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="text-base font-semibold text-slate-700 dark:text-slate-300 text-center">Klik
                                        atau tarik gambar ke sini</p>
                                    <p class="text-sm text-slate-400 dark:text-slate-500 text-center">Format yang didukung:
                                        JPG, PNG (Maks. 5MB per gambar)</p>
                                </div>

                                {{-- Container preview grid (tampil saat ada file) --}}
                                <div id="previewContainer"
                                    class="absolute inset-0 hidden w-full h-full bg-white dark:bg-slate-800 p-1 overflow-y-auto z-30 rounded">
                                    {{-- Grid 3 kolom dibuat oleh JavaScript --}}
                                </div>

                                {{-- Hidden file input (multiple) --}}
                                <input id="fileInput" name="gambar[]" type="file" class="hidden" accept="image/*"
                                    multiple />
                            </div>
                        </div>
                    </div>
                    {{-- Footer modal dengan tombol Batal & Upload --}}
                    <div
                        class="bg-gray-50 dark:bg-slate-800/50 px-6 py-4 border-t border-gray-200 dark:border-slate-700 flex items-center justify-end gap-3">
                        <button type="button"
                            class="js-close-upload-modal inline-flex min-w-20 sm:min-w-25 items-center justify-center px-3 py-1.5 sm:px-4 text-base font-semibold text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 transition-colors rounded shadow-sm">
                            Batal
                        </button>
                        {{-- Submit button (disabled hingga ada file) --}}
                        <button type="submit" id="submitBtn" disabled
                            class="inline-flex min-w-20 sm:min-w-25 items-center justify-center px-3 py-1.5 sm:px-4 text-base font-semibold text-white bg-green-700 hover:bg-green-600 shadow-sm disabled:opacity-50 disabled:cursor-not-allowed transition-colors rounded">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Preview Fullscreen (Zoom Foto) --}}
    <div id="imagePreviewModal"
        class="fixed inset-0 z-250 hidden items-center justify-center bg-black/30 dark:bg-black/50 backdrop-blur-md"
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

    {{-- Modal notif error (file terlalu besar) - ditampilkan oleh ImageNotificationHandler --}}
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

    {{-- Modal notif warning (file duplikat/limit terlampaui) --}}
    <div id="duplicate-image-modal"
        class="hidden fixed top-4 left-1/2 -translate-x-1/2 z-300 bg-blue-700 border border-blue-700 rounded-lg shadow-lg p-4 max-w-sm w-full mx-2 -translate-y-full opacity-0 transition-all duration-500">
        <div class="flex items-start gap-3">
            <svg class="w-6 h-6 text-white shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div class="flex-1">
                <p class="text-sm font-medium text-white" id="duplicate-image-modal-text">Gambar sudah ada</p>
            </div>
        </div>
    </div>

@endsection