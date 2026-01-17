@extends('admin.layouts.admin')

@section('title', 'Edit Video Kegiatan')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Edit Video Kegiatan</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Perbarui informasi video kegiatan sekolah.</p>
            </div>
            <div>
                <a href="{{ route('cpanel.activity-videos.index') }}" id="back-btn"
                    data-href="{{ route('cpanel.activity-videos.index') }}"
                    class="inline-flex items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 transition-colors rounded shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700">
            <form action="{{ route('cpanel.activity-videos.update', $activityVideo) }}" method="POST"
                id="activity-video-form" data-notify="loading" data-unsaved-changes="true" class="p-6">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    {{-- Judul --}}
                    <div>
                        <label for="judul" class="block mb-2 text-base font-semibold text-slate-700 dark:text-white">Judul
                            Video
                            <span class="text-red-600 dark:text-red-500">*</span></label>
                        <div class="relative">
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $activityVideo->judul) }}"
                                required maxlength="255" class="w-full border-2 border-gray-200 dark:border-slate-600 px-3
                                    py-1.5 text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-white
                                    focus:border-green-600 focus:outline-none rounded" placeholder="Masukan Judul Video">
                        </div>
                        @error('judul')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Youtube URL --}}
                    <div>
                        <label for="youtube_url"
                            class="block mb-2 text-base font-semibold text-slate-700 dark:text-white">Link
                            Youtube <span class="text-red-600 dark:text-red-500">*</span></label>
                        <div class="relative">
                            <input type="url" name="youtube_url" id="youtube_url"
                                value="{{ old('youtube_url', $activityVideo->youtube_url) }}" required maxlength="255"
                                placeholder="Masukan Link"
                                class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:border-green-600 focus:outline-none rounded">
                        </div>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Pastikan link valid dan video bersifat
                            publik.</p>
                        {{-- Error message handled by Toast --}}
                    </div>

                    {{-- Status (Hidden, always active) --}}
                    <input type="hidden" name="is_active" value="1">

                    <div class="pt-4 border-t border-gray-200 dark:border-slate-700 flex items-center justify-end gap-3">
                        <a href="{{ route('cpanel.activity-videos.index') }}" id="cancel-btn"
                            class="inline-flex min-w-20 sm:min-w-25 items-center justify-center px-3 py-1.5 sm:px-4 text-base font-semibold text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 transition-colors rounded shadow-sm">
                            Batal
                        </a>
                        <button type="submit" id="submit-btn" disabled
                            class="inline-flex min-w-20 sm:min-w-25 items-center justify-center px-3 py-1.5 sm:px-4 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors rounded opacity-50 cursor-not-allowed shadow-sm">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Toast Peringatan Link Youtube Invalid (Slide Down) -->
    <div id="video-error-modal"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 z-300 hidden flex-col items-center transition-all duration-500 ease-out -translate-y-full opacity-0">
        <div
            class="bg-red-600 dark:bg-red-700 border border-red-700 dark:border-red-800 rounded-lg shadow-2xl px-6 py-4 max-w-md w-full mx-4 flex items-center gap-4">
            <div class="shrink-0 text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                    </path>
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-white" id="video-error-modal-text">
                    Link Youtube tidak valid. Harap masukkan link yang benar.
                </p>
            </div>
        </div>
    </div>

    @error('youtube_url')
        <div class="hidden" data-video-error-message="{{ $message }}"></div>
    @enderror
@endsection