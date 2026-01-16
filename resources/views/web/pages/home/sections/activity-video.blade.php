<!-- Galeri Video Kegiatan -->
<div class="mt-8 animate-on-scroll">
    <h2
        class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-slate-100 mb-6 flex items-center gap-3">
        <span class="w-px h-6 sm:h-8 bg-green-700 dark:bg-green-500"></span>
        Video Kegiatan
    </h2>

    @if(isset($videoKegiatan) && $videoKegiatan->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($videoKegiatan->take(6) as $video)
                <div class="rounded-lg overflow-hidden relative group aspect-video shadow-sm hover:shadow-md transition-all video-hover-container"
                    data-video-hover-preview data-embed-url="{{ $video->embed_url }}">
                    @if($video->youtube_id)
                        <!-- Thumbnail with Link (Visible when not playing) -->
                        <a href="{{ $video->youtube_url }}" target="_blank"
                            class="thumbnail-link block w-full h-full relative z-20 transition-opacity duration-300"
                            data-video-thumbnail>
                            <img src="{{ $video->thumbnail_url }}" alt="{{ $video->judul }}"
                                class="w-full h-full object-cover thumbnail-img">

                            <!-- Play Icon Overlay -->
                            <div
                                class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-colors flex items-center justify-center play-icon-overlay">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/0/09/YouTube_full-color_icon_%282017%29.svg"
                                    alt="Play on YouTube"
                                    class="w-12 h-12 transform group-hover:scale-110 transition-transform duration-300 drop-shadow-lg">
                            </div>
                        </a>

                        <!-- Iframe Container (Shows on hover, interactive) -->
                        <div class="iframe-container absolute inset-0 z-30 hidden" data-video-iframe></div>
                    @else
                        <div class="flex items-center justify-center h-full bg-gray-100 dark:bg-slate-700 text-gray-400 text-xs">
                            Video Invalid</div>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <div class="flex items-center justify-center py-12 min-h-80">
            <p class="text-base md:text-lg font-semibold text-gray-400 dark:text-slate-500 text-center">
                Belum Ada Video Kegiatan
            </p>
        </div>
    @endif

    <div class="mt-4 text-center">
        <a href="{{ route('galeri.video-kegiatan') }}"
            class="inline-flex items-center gap-2 text-green-700 dark:text-green-500 hover:text-green-800 dark:hover:text-green-400 font-semibold text-sm md:text-base transition-colors duration-300 group">
            Lihat Semua Video
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 group-hover:translate-x-1 transition-transform duration-300" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>
</div>