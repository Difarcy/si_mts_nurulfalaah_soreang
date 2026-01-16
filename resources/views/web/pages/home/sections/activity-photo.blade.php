<!-- Galeri Foto Kegiatan -->
<div class="mt-6 animate-on-scroll">
    <h2
        class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-slate-100 mb-6 flex items-center gap-3">
        <span class="w-px h-6 sm:h-8 bg-green-700 dark:bg-green-500"></span>
        Kegiatan Sekolah
    </h2>

    @if(isset($fotoKegiatan) && $fotoKegiatan->count() > 0)
        @php
            $totalFotos = $fotoKegiatan->count();

            // Split photos into 2 rows
            if ($totalFotos >= 12) {
                // Jika 12+, ambil 6 untuk tiap baris
                $firstRow = $fotoKegiatan->take(6);
                $secondRow = $fotoKegiatan->slice(6, 6);
            } elseif ($totalFotos >= 6) {
                // Jika 6-11, split separuh
                $half = ceil($totalFotos / 2);
                $firstRow = $fotoKegiatan->take($half);
                $secondRow = $fotoKegiatan->slice($half);
            } else {
                // Jika kurang dari 6, duplicate untuk 2 baris
                $firstRow = $fotoKegiatan;
                $secondRow = $fotoKegiatan;
            }

            // Triple untuk infinite scroll
            $firstRowItems = $firstRow->concat($firstRow)->concat($firstRow);
            $secondRowItems = $secondRow->concat($secondRow)->concat($secondRow);
        @endphp

        <div class="space-y-3 overflow-hidden">
            <!-- First Row - Scroll Right -->
            <div class="relative w-full overflow-hidden">
                <div class="flex w-fit gap-3 animate-scroll-right">
                    @foreach($firstRowItems as $item)
                        <div class="w-75 h-50 shrink-0 overflow-hidden border border-gray-300/50 dark:border-slate-700/50">
                            <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('images/background/default-backgrounds.png') }}"
                                alt="{{ $item->judul ?? 'Foto Kegiatan' }}" class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Second Row - Scroll Left -->
            <div class="relative w-full overflow-hidden">
                <div class="flex w-fit gap-3 animate-scroll-left">
                    @foreach($secondRowItems as $item)
                        <div class="w-75 h-50 shrink-0 overflow-hidden border border-gray-300/50 dark:border-slate-700/50">
                            <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('images/background/default-backgrounds.png') }}"
                                alt="{{ $item->judul ?? 'Foto Kegiatan' }}" class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="flex items-center justify-center py-12 min-h-80">
            <p class="text-base md:text-lg font-semibold text-gray-500 dark:text-slate-500 text-center">
                Belum Ada Foto Kegiatan
            </p>
        </div>
    @endif

    <div class="mt-4 text-center">
        <a href="{{ route('galeri.foto-kegiatan') }}"
            class="inline-flex items-center gap-2 text-green-700 dark:text-green-500 hover:text-green-800 dark:hover:text-green-400 font-semibold text-sm md:text-base transition-colors duration-300 group">
            Lihat Semua
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 group-hover:translate-x-1 transition-transform duration-300" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>
</div>