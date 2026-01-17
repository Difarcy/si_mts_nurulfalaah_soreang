@extends('web.layouts.website')

@section('title', 'Hasil Pencarian')

@section('content')
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8 sm:py-12">
        <x-breadcrumb :items="[
            ['label' => 'Beranda', 'url' => route('web.home')],
            ['label' => 'Pencarian']
        ]" />
        <x-page-title title="Hasil Pencarian" />

        <div class="flex flex-col lg:flex-row gap-4 mt-8">
            <!-- Main Content (Left) - Berita & Artikel -->
            <div class="w-full lg:w-[70%] animate-on-scroll">
                <div class="mb-6 pb-2 border-b border-gray-100 dark:border-slate-700">
                    <h3 class="text-base sm:text-xl font-bold text-gray-900 dark:text-slate-100 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700 dark:text-green-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        Berita & Artikel
                    </h3>
                </div>

                @if($posts->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($posts as $item)
                            @php
                                $badgeClass = $item->type_slug === 'berita'
                                    ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400'
                                    : 'bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-400';
                                $dateObj = \Carbon\Carbon::parse($item->date);
                            @endphp
                            <article
                                class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col h-full">
                                @if($item->image)
                                    <a href="{{ $item->url }}" class="block aspect-video overflow-hidden shrink-0">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                            class="w-full h-full object-cover js-img-fallback" loading="lazy"
                                            data-fallback-src="{{ asset('images/background/default-backgrounds.png') }}">
                                    </a>
                                @else
                                    <a href="{{ $item->url }}"
                                        class="block aspect-video overflow-hidden shrink-0 bg-gray-100 dark:bg-slate-700 flex items-center justify-center">
                                        <img src="{{ asset('img/banner1.jpg') }}" alt="Default"
                                            class="w-full h-full object-cover opacity-50 js-img-fallback"
                                            data-fallback-src="{{ asset('images/background/default-backgrounds.png') }}">
                                    </a>
                                @endif
                                <div class="p-4 flex flex-col flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <span
                                            class="px-2 py-0.5 text-[10px] font-bold rounded {{ $badgeClass }} uppercase tracking-wider">
                                            {{ $item->type_label }}
                                        </span>
                                    </div>
                                    <h3 class="font-bold text-sm sm:text-lg mb-1 line-clamp-2">
                                        <a href="{{ $item->url }}"
                                            class="text-gray-900 dark:text-slate-100 hover:text-green-700 dark:hover:text-green-400 transition-colors duration-300">
                                            {{ $item->title }}
                                        </a>
                                    </h3>
                                    <p class="text-base text-gray-600 dark:text-slate-400 line-clamp-2 mb-3 flex-1 text-justify">
                                        {{ $item->desc }}
                                    </p>
                                    <div class="mt-auto flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                                        <p class="text-[10px] sm:text-sm text-gray-500 dark:text-slate-400">
                                            {{ $dateObj->translatedFormat('d F Y') }} | {{ $dateObj->format('H:i') }}
                                        </p>
                                        <a href="{{ $item->url }}"
                                            class="inline-flex items-center gap-1.5 text-green-700 dark:text-green-500 hover:text-green-800 dark:hover:text-green-400 font-bold text-xs sm:text-base transition-colors duration-300 group focus:outline-none">
                                            {{ $item->type_slug === 'berita' ? 'Baca Berita' : 'Baca Artikel' }}
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4 group-hover:translate-x-1 transition-transform duration-300"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div
                        class="bg-white dark:bg-slate-800 rounded-xl p-10 text-center border border-gray-100 dark:border-slate-700">
                        <p class="text-sm sm:text-lg font-semibold text-gray-400 dark:text-slate-500">
                            Tidak ada berita atau artikel yang ditemukan.
                        </p>
                    </div>
                @endif
            </div>

            <!-- Sidebar (Right) - Pengumuman & Agenda -->
            <aside class="w-full lg:w-[30%] space-y-8 lg:translate-x-4 lg:-mt-4">
                <!-- Pengumuman Results -->
                <div class="p-4">
                    <h3
                        class="text-base sm:text-xl font-bold text-gray-900 dark:text-slate-100 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700 dark:text-green-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                        Pengumuman
                    </h3>
                    <div class="space-y-4">
                        @forelse($searchAnnouncements as $info)
                            <div class="pb-3 border-b border-gray-100 dark:border-slate-700 last:border-0 last:pb-0">
                                <a href="{{ route('informasi.pengumuman.show', $info->id) }}" class="block group">
                                    <h4
                                        class="text-sm sm:text-lg font-semibold text-gray-900 dark:text-slate-100 mb-1 line-clamp-2 hover:text-green-700 dark:hover:text-green-400 transition-colors">
                                        {{ $info->title }}
                                    </h4>
                                    <p class="text-base text-gray-600 dark:text-slate-300 line-clamp-2 mb-1 text-justify">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($info->isi), 100, '...') }}
                                    </p>
                                    <p class="text-[10px] sm:text-sm text-gray-500 dark:text-slate-400">
                                        {{ \Carbon\Carbon::parse($info->published_at)->translatedFormat('d F Y') }} |
                                        {{ \Carbon\Carbon::parse($info->published_at)->format('H.i') }} WIB
                                    </p>
                                </a>
                            </div>
                        @empty
                            <div class="py-8 text-center">
                                <p class="text-sm sm:text-lg font-semibold text-gray-400 dark:text-slate-500">
                                    Tidak ada pengumuman ditemukan
                                </p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Agenda Results -->
                <div class="p-4">
                    <h3
                        class="text-base sm:text-xl font-bold text-gray-900 dark:text-slate-100 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700 dark:text-green-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Agenda
                    </h3>
                    <div class="space-y-4">
                        @forelse($searchAgenda as $item)
                            @php
                                $dateObj = \Carbon\Carbon::parse($item->tanggal_mulai);
                                $waktuMulai = $item->waktu_mulai ?? null;
                                $waktuSelesai = $item->waktu_selesai ?? null;
                            @endphp
                            <div class="pb-3 border-b border-gray-100 dark:border-slate-700 last:border-0 last:pb-0">
                                <a href="{{ route('informasi.agenda') }}" class="block group">
                                    <h4
                                        class="text-sm sm:text-lg font-semibold text-gray-900 dark:text-slate-100 mb-1 line-clamp-2 hover:text-green-700 dark:hover:text-green-400 transition-colors">
                                        {{ $item->judul }}
                                    </h4>
                                    <p class="text-base text-gray-600 dark:text-slate-300 line-clamp-2 mb-1 text-justify">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 100, '...') }}
                                    </p>
                                    <p class="text-[10px] sm:text-sm text-gray-500 dark:text-slate-400">
                                        {{ $dateObj->translatedFormat('d F Y') }}
                                        @if($waktuMulai)
                                            @php
                                                $start = \Carbon\Carbon::parse($waktuMulai)->format('H.i');
                                                $endTime = $waktuSelesai ? \Carbon\Carbon::parse($waktuSelesai)->format('H:i') : null;
                                                $end = ($endTime && $endTime !== '00:00') ? str_replace(':', '.', $endTime) : 'Selesai';
                                                $hasEndTime = $endTime && $endTime !== '00:00';
                                            @endphp
                                            | {{ $start }} {{ $hasEndTime ? '– ' . $end . ' WIB' : 'WIB – Selesai' }}
                                        @endif
                                    </p>
                                </a>
                            </div>
                        @empty
                            <div class="py-8 text-center">
                                <p class="text-sm sm:text-lg font-semibold text-gray-400 dark:text-slate-500">
                                    Tidak ada agenda ditemukan
                                </p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection