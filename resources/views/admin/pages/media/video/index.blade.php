@extends('admin.layouts.admin')

@section('title', 'Video Kegiatan')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-lg sm:text-2xl font-bold text-slate-900 dark:text-slate-100">Video Kegiatan</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Daftar video kegiatan sekolah dari YouTube.</p>
            </div>
            @if($videos->count() > 0)
                <div>
                    <a href="{{ route('cpanel.activity-videos.create') }}"
                        class="inline-flex items-center justify-center p-2 sm:px-3 sm:py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors rounded">
                        <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span class="hidden sm:inline">Tambah</span>
                    </a>
                </div>
            @endif
        </div>

        {{-- Old Alert Removed --}}
        {{-- @if(session('success')) ... @endif --}}

        <div class="p-4 sm:p-6 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 rounded shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($videos as $video)
                    <div
                        class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 rounded overflow-hidden flex flex-col">
                        <!-- Thumbnail (Clickable) -->
                        <a href="{{ $video->youtube_url }}" target="_blank"
                            class="relative aspect-video bg-gray-200 dark:bg-slate-700 overflow-hidden group block video-hover-container"
                            data-video-hover-preview data-embed-url="{{ $video->embed_url }}">
                            <img class="w-full h-full object-cover thumbnail-img" src="{{ $video->thumbnail_url }}"
                                alt="{{ $video->judul }}">

                            <!-- Overlay Play Icon -->
                            <div class="absolute inset-0 bg-black/0 hover:bg-black/10 transition-colors duration-300 flex items-center justify-center play-icon-overlay pointer-events-none"
                                data-video-overlay>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/0/09/YouTube_full-color_icon_%282017%29.svg"
                                    alt="Play on YouTube"
                                    class="w-12 h-12 opacity-0 group-hover:opacity-100 transition-opacity duration-300 drop-shadow-lg">
                            </div>

                            <!-- Iframe Container (Initially Empty/Hidden) -->
                            <div class="iframe-container absolute inset-0 z-10 pointer-events-none hidden" data-video-iframe>
                            </div>
                        </a>

                        <!-- Content -->
                        <div class="p-5 flex-1 flex flex-col">
                            <!-- Judul -->
                            <h3 class="font-semibold text-slate-900 dark:text-slate-100 line-clamp-2 mb-2 leading-tight">
                                {{ $video->judul }}
                            </h3>

                            <!-- Info Meta (Views & Time) -->
                            <div class="flex items-center gap-3 text-xs text-slate-500 dark:text-slate-400 mb-3">
                                <span class="flex items-center gap-1" title="Dipublish">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $video->created_at->translatedFormat('d F Y H:i') }}
                                </span>
                            </div>

                            <!-- Deskripsi -->
                            <p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-3 mb-5 flex-1 leading-relaxed">
                                {{ $video->deskripsi ?? '' }}
                            </p>

                            <!-- Footer: Actions Center -->
                            <div class="flex items-center justify-center gap-2 mt-auto w-full">
                                <a href="{{ route('cpanel.activity-videos.edit', $video) }}"
                                    class="flex-1 inline-flex items-center justify-center px-3 py-1.5 text-xs font-semibold text-white bg-yellow-500 hover:bg-yellow-600 transition-colors rounded">
                                    UBAH
                                </a>
                                <button type="button" data-delete-trigger
                                    data-action="{{ route('cpanel.activity-videos.destroy', $video) }}"
                                    data-title="{{ $video->judul }}"
                                    data-message="Yakin ingin menghapus video ini? Video yang dihapus tidak dapat dikembalikan."
                                    class="flex-1 inline-flex items-center justify-center px-3 py-1.5 text-xs font-semibold text-white bg-red-600 hover:bg-red-700 transition-colors rounded">
                                    HAPUS
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Empty State (Span full width) -->
                    <div
                        class="col-span-full flex flex-col items-center justify-center p-12 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 rounded-lg border-dashed min-h-100">
                        <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-full mb-4">
                            <svg class="w-12 h-12 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-slate-100">Belum Ada Video</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-center max-w-sm mt-1 mb-6">Belum ada video kegiatan
                            yang ditambahkan.</p>
                        <a href="{{ route('cpanel.activity-videos.create') }}"
                            class="inline-flex items-center justify-center px-4 py-2 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors rounded">
                            Tambah Video Pertama
                        </a>
                    </div>
                @endforelse
            </div>
        </div>

        @if($videos->hasPages())
            <div class="mt-8">
                {{ $videos->links() }}
            </div>
        @endif
    </div>

@endsection
