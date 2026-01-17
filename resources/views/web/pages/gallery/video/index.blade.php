@extends('web.layouts.website')

@section('title', 'Video Kegiatan')

@section('content')
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8 sm:py-12">
        <x-breadcrumb :items="[
            ['label' => 'Galeri'],
            ['label' => 'Video Kegiatan']
        ]" />
        <x-page-title title="Video Kegiatan" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10 mt-8 min-h-75">
            @if(isset($videos) && $videos->count() > 0)
                @foreach($videos as $index => $item)
                    <div class="group flex flex-col gap-3 h-full">
                        {{-- Aspect Ratio Container (Thumbnail/Video) --}}
                        <div class="w-full aspect-video rounded-xl overflow-hidden relative bg-black shadow-sm group-hover:shadow-md transition-all duration-300 video-hover-container"
                            data-video-hover-preview data-embed-url="{{ $item->embed_url }}">

                            {{-- Thumbnail with Link (Visible when not playing) --}}
                            <a href="{{ $item->youtube_url }}" target="_blank"
                                class="thumbnail-link block w-full h-full relative z-20 transition-opacity duration-300"
                                data-video-thumbnail>
                                {{-- Thumbnail Image --}}
                                <img src="{{ $item->thumbnail_url }}" alt="{{ $item->judul }}"
                                    class="w-full h-full object-cover transition-transform duration-500 thumbnail-img">

                                {{-- Play Icon Overlay --}}
                                <div
                                    class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors flex items-center justify-center play-icon-overlay">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/09/YouTube_full-color_icon_%282017%29.svg"
                                        alt="Play on YouTube"
                                        class="w-12 h-12 transform transition-transform duration-300 drop-shadow-lg">
                                </div>
                            </a>

                            {{-- Iframe Container (Shows on hover, interactive) --}}
                            <div class="iframe-container absolute inset-0 z-30 hidden" data-video-iframe>
                                {{-- Iframe injected via JS --}}
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="flex flex-col px-1">
                            <h3 class="text-base font-bold text-slate-900 dark:text-slate-100 line-clamp-2 leading-snug h-10"
                                title="{{ $item->judul }}">
                                {{ $item->judul }}
                            </h3>

                            <!-- Info Meta (Time) -->
                            <div class="flex items-center gap-3 text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1">
                                <span class="flex items-center gap-1" title="Dipublish">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $item->created_at->translatedFormat('d F Y H:i') }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-full flex flex-col items-center justify-center min-h-75 gap-3">
                    <svg class="w-16 h-16 text-gray-300 dark:text-slate-600 mb-2" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-base sm:text-lg font-semibold text-gray-400 dark:text-slate-500 text-center">
                        Belum Ada Video Kegiatan
                    </p>
                </div>
            @endif
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $videos->links() }}
        </div>
    </div>
@endsection