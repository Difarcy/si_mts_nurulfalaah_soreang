<!-- Info Bar dengan Tanggal, Waktu, dan Text Berjalan -->
<section class="bg-white dark:bg-slate-900 py-2 sm:py-3 shadow-md">
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl">
        <div class="flex items-stretch">
            <!-- Tanggal (Kiri) -->
            <!-- Tanggal (Kiri) -->
            <!-- Tanggal (Kiri) -->
            <div
                class="flex items-center gap-1 sm:gap-2 shrink-0 bg-green-800 text-white px-1.5 py-0.5 sm:px-3 sm:py-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span id="current-date" class="text-[10px] sm:text-base font-semibold whitespace-nowrap"></span>
            </div>

            <!-- Text Berjalan (Tengah) -->
            <div class="flex-1 overflow-hidden">
                <div
                    class="overflow-hidden whitespace-nowrap relative flex items-center bg-white dark:bg-slate-800 border border-gray-400 dark:border-slate-600 px-1.5 py-0.5 sm:px-3 sm:py-1.5 h-full">
                    @php
                        $hasTicker = isset($tickerItems) && $tickerItems->count() > 0;

                        if ($hasTicker) {
                            // Ticker otomatis dari data terbaru dengan pemisah profesional
                            $tickerText = $tickerItems->map(fn($item) => trim($item))->filter()->implode(' | ');
                            $tickerClass = '';
                            $shouldAnimate = true;
                        } else {
                            // Default: Text di tengah (tidak berjalan)
                            $tickerText = 'Tidak ada informasi terbaru';
                            $tickerClass = 'opacity-80 italic';
                            $shouldAnimate = false;
                        }
                    @endphp
                    <div class="w-full overflow-hidden">
                        @if($shouldAnimate)
                            <div
                                class="inline-flex whitespace-nowrap text-black dark:text-white text-[10px] sm:text-base font-semibold {{ $tickerClass }} animate-[marquee_40s_linear_infinite] will-change-transform transition-colors duration-300">
                                <span class="inline-block pr-1 whitespace-nowrap shrink-0">{{ $tickerText }}</span>
                                <span class="inline-block pr-1 whitespace-nowrap shrink-0"
                                    aria-hidden="true">{{ $tickerText }}</span>
                            </div>
                        @else
                            <div
                                class="flex items-center justify-center text-black dark:text-white text-[10px] sm:text-base font-semibold {{ $tickerClass }}">
                                <span>{{ $tickerText }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Waktu (Kanan) -->
            <!-- Waktu (Kanan) -->
            <!-- Waktu (Kanan) -->
            <div
                class="flex items-center gap-1 sm:gap-2 shrink-0 bg-green-800 text-white px-1.5 py-0.5 sm:px-3 sm:py-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span id="current-time" class="text-[10px] sm:text-base font-semibold whitespace-nowrap"></span>
            </div>
        </div>
    </div>
</section>
