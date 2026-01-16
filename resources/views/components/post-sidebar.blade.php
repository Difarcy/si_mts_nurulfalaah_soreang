@props([
    'announcements' => null,
    'agenda' => null,
    'latestNews' => null,
    'latestArticles' => null,
    'schoolProfile' => null,
    'showCalendar' => false,
    'showSocialMedia' => false,
])

<div class="space-y-8">
    {{-- Kepala Madrasah --}}
    @if ($schoolProfile)
        <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm">
            <h3 class="text-lg font-bold text-gray-900 dark:text-slate-100 mb-4 border-b border-gray-100 dark:border-slate-700 pb-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Kepala Madrasah
            </h3>
            <div class="flex flex-col items-center text-center">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-green-50 dark:border-green-900/30 mb-3">
                    @if($schoolProfile->kepala_sekolah_foto)
                        <img src="{{ asset('storage/' . $schoolProfile->kepala_sekolah_foto) }}" alt="{{ $schoolProfile->kepala_sekolah_nama }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-100 dark:bg-slate-700 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                    @endif
                </div>
                <h4 class="font-bold text-gray-900 dark:text-slate-100">{{ $schoolProfile->kepala_sekolah_nama ?? 'Kepala Madrasah' }}</h4>
                <p class="text-sm text-gray-500 dark:text-slate-400 mb-2">Kepala Madrasah</p>
                <div class="text-sm text-gray-600 dark:text-slate-300 line-clamp-3 mb-4 italic">
                    {!! strip_tags($schoolProfile->kepala_sekolah_sambutan) !!}
                </div>
                <a href="{{ route('profil.kepala-madrasah') }}" class="text-sm font-bold text-green-700 dark:text-green-500 hover:text-green-800 transition-colors">Selengkapnya &rarr;</a>
            </div>
        </div>
    @endif

    {{-- Kalender --}}
    @if ($showCalendar)
        <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm">
            <h3 class="text-lg font-bold text-gray-900 dark:text-slate-100 mb-4 border-b border-gray-100 dark:border-slate-700 pb-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Kalender Kegiatan
            </h3>
            <div id="sidebar-calendar" class="premium-calendar-sidebar">
                {{-- Calendar content will be handled by existing scripts or a simple include --}}
                @php
                    $monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    $now = now();
                    $daysInMonth = $now->daysInMonth;
                    $startOfMonth = $now->copy()->startOfMonth();
                    $firstDayOfWeek = ($startOfMonth->dayOfWeek == 0) ? 6 : $startOfMonth->dayOfWeek - 1; // Adjust for Monday start
                @endphp
                <div class="text-center mb-4">
                    <span class="text-lg font-bold text-gray-800 dark:text-slate-100">{{ $monthNames[$now->month - 1] }} {{ $now->year }}</span>
                </div>
                <div class="grid grid-cols-7 gap-1 text-center text-xs mb-2">
                    @foreach(['Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb', 'Mg'] as $day)
                        <div class="font-bold text-gray-400">{{ $day }}</div>
                    @endforeach
                    @for($i = 0; $i < $firstDayOfWeek; $i++)
                        <div></div>
                    @endfor
                    @for($day = 1; $day <= $daysInMonth; $day++)
                        <div class="py-1.5 rounded-lg {{ $day == $now->day ? 'bg-green-700 text-white font-bold' : 'text-gray-600 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-slate-700' }}">
                            {{ $day }}
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    @endif

    {{-- Pengumuman --}}
    @if ($announcements && $announcements->isNotEmpty())
        <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm">
            <h3 class="text-lg font-bold text-gray-900 dark:text-slate-100 mb-4 border-b border-gray-100 dark:border-slate-700 pb-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                </svg>
                Pengumuman
            </h3>
            <div class="space-y-4">
                @foreach ($announcements as $item)
                    <div class="pb-3 border-b border-gray-50 dark:border-slate-700/50 last:border-0 last:pb-0">
                        <a href="{{ route('informasi.pengumuman.show', $item->id) }}" class="group block">
                            <h4 class="text-sm sm:text-base font-semibold text-gray-800 dark:text-slate-100 line-clamp-2 group-hover:text-green-700 dark:group-hover:text-green-400 transition-colors mb-1">
                                {{ $item->judul }}
                            </h4>
                            <p class="text-xs text-gray-500 dark:text-slate-400">
                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Agenda --}}
    @if ($agenda && $agenda->isNotEmpty())
        <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm">
            <h3 class="text-lg font-bold text-gray-900 dark:text-slate-100 mb-4 border-b border-gray-100 dark:border-slate-700 pb-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Agenda Kegiatan
            </h3>
            <div class="space-y-4">
                @foreach ($agenda as $item)
                    <div class="pb-3 border-b border-gray-50 dark:border-slate-700/50 last:border-0 last:pb-0">
                        <a href="{{ route('informasi.agenda.show', $item->id) }}" class="group block">
                            <h4 class="text-sm sm:text-base font-semibold text-gray-800 dark:text-slate-100 line-clamp-2 group-hover:text-green-700 dark:group-hover:text-green-400 transition-colors mb-1">
                                {{ $item->judul }}
                            </h4>
                            <p class="text-xs text-gray-500 dark:text-slate-400">
                                {{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('d F Y') }}
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Berita Terbaru --}}
    @if ($latestNews && $latestNews->isNotEmpty())
        <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm">
            <h3 class="text-lg font-bold text-gray-900 dark:text-slate-100 mb-4 border-b border-gray-100 dark:border-slate-700 pb-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                Berita Terbaru
            </h3>
            <div class="space-y-4">
                @foreach ($latestNews as $item)
                    <div class="flex gap-3 pb-3 border-b border-gray-50 dark:border-slate-700/50 last:border-0 last:pb-0">
                        <div class="w-20 h-16 shrink-0 rounded-lg overflow-hidden">
                            @if($item->thumbnail_path)
                                <img src="{{ asset('storage/' . $item->thumbnail_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                            @else
                                <img src="{{ asset('img/banner1.jpg') }}" alt="Default" class="w-full h-full object-cover opacity-50">
                            @endif
                        </div>
                        <div class="min-w-0 flex-1">
                            <a href="{{ route('informasi.show', ['type' => $item->type, 'slug' => $item->slug]) }}" class="group block">
                                <h4 class="text-sm font-semibold text-gray-800 dark:text-slate-100 line-clamp-2 group-hover:text-green-700 dark:group-hover:text-green-400 transition-colors mb-1">
                                    {{ $item->title }}
                                </h4>
                                <p class="text-[10px] text-gray-500 dark:text-slate-400">
                                    {{ \Carbon\Carbon::parse($item->published_at ?? $item->created_at)->translatedFormat('d F Y') }}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Media Sosial --}}
    @if ($showSocialMedia)
        <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm">
            <h3 class="text-lg font-bold text-gray-900 dark:text-slate-100 mb-4 border-b border-gray-100 dark:border-slate-700 pb-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
                Media Sosial
            </h3>
            <x-social-media-links />
        </div>
    @endif
</div>
