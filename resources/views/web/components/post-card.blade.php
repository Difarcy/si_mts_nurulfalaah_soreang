@php
    // Fallback defaults logic if included manually
    $fallbackImage = $fallbackImage ?? asset('images/background/default-backgrounds.png');

    // Determine image source
    $image = $post->thumbnail_path
        ? asset('storage/' . $post->thumbnail_path)
        : $fallbackImage;

    // Format dates
    $dateObj = $post->published_at ?? $post->created_at;
    $formattedDate = [
        'date' => $dateObj->translatedFormat('d F Y'),
        'time' => $dateObj->format('H:i')
    ];

    // Determine Type label if needed or link route
    $route = route('informasi.show', ['type' => $post->type, 'slug' => $post->slug]);
@endphp

<article
    class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-xl transition-all duration-300">
    <div class="flex flex-col sm:flex-row h-full">
        <div class="w-full sm:w-[38%] shrink-0">
            <div class="w-full aspect-video bg-gray-100 dark:bg-slate-700 overflow-hidden relative">
                <img src="{{ $image }}" alt="{{ $post->title }}" class="w-full h-full object-cover js-img-fallback"
                    loading="lazy" data-fallback-src="{{ asset('images/background/default-backgrounds.png') }}">
            </div>
        </div>
        <div class="w-full sm:w-[62%] p-2 sm:p-2.5 flex flex-col justify-between">
            <div>
                <h3
                    class="text-sm sm:text-lg font-bold text-gray-900 dark:text-slate-100 mb-0.5 line-clamp-2 hover:text-green-700 dark:hover:text-green-400 transition-colors">
                    <a href="{{ $route }}"
                        class="hover:text-green-700 dark:hover:text-green-400 transition-colors focus:outline-none">
                        {{ $post->title }}
                    </a>
                </h3>
                @if($post->excerpt)
                    <p class="text-base text-gray-600 dark:text-slate-400 line-clamp-2 mb-1 text-justify">
                        {{ $post->excerpt }}
                    </p>
                @endif
            </div>
            <div class="flex items-center justify-between mt-auto pt-2">
                <p class="text-[10px] sm:text-sm text-gray-500 dark:text-slate-400 flex items-center gap-1">
                    {{ $formattedDate['date'] }} | {{ $formattedDate['time'] }}
                </p>
                <a href="{{ $route }}"
                    class="inline-flex items-center gap-1.5 text-green-700 dark:text-green-500 hover:text-green-800 dark:hover:text-green-400 font-bold text-xs sm:text-base transition-colors duration-300 group focus:outline-none">
                    {{ $post->type === 'berita' ? 'Baca Berita' : 'Baca Artikel' }}
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-3 w-3 sm:h-4 sm:w-4 group-hover:translate-x-1 transition-transform duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</article>