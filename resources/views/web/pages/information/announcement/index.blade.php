@extends('web.layouts.website')

@section('title', 'Pengumuman')

@section('content')
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8 sm:py-12">
        <x-breadcrumb :items="[
            ['label' => 'Informasi'],
            ['label' => 'Pengumuman']
        ]" />
        <x-page-title title="Pengumuman" />

        <div class="flex flex-col lg:flex-row gap-4 lg:gap-4 mt-8">
            <!-- Kiri: Pengumuman (70%) -->
            <div class="w-full lg:w-[70%]">
                <form method="GET" class="mb-6" id="announcement-search-form">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari pengumuman..."
                        autocomplete="off"
                        class="w-full px-4 py-2 sm:py-2.5 border-2 border-gray-300 dark:border-slate-600 rounded-lg focus:border-green-700 focus:outline-none text-sm sm:text-base bg-white dark:bg-slate-800 text-gray-900 dark:text-slate-100">
                </form>

                <div id="announcement-list">
                    @if($pengumuman->count() > 0)
                        <div class="space-y-6">
                            @foreach($pengumuman as $item)
                                <article
                                    class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                                    <div class="flex flex-col md:flex-row">
                                        <!-- Foto (Kiri) -->
                                        <!-- Konten (Kanan) -->
                                        <div class="w-full p-5 sm:p-6">
                                            <a href="{{ route('informasi.pengumuman.show', $item->id) }}">
                                                <h3
                                                    class="text-base sm:text-xl font-bold text-gray-900 dark:text-slate-100 mb-2 hover:text-green-700 dark:hover:text-green-400 transition-colors">
                                                    {{ $item->judul }}
                                                </h3>
                                            </a>
                                            <div
                                                class="text-xs sm:text-base text-gray-700 dark:text-slate-300 leading-relaxed mb-3 prose prose-sm max-w-none line-clamp-3">
                                                {{ str()->limit(strip_tags($item->isi), 250) }}
                                            </div>
                                            <div class="flex items-center justify-start">
                                                <div class="flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-3 w-3 sm:h-4 sm:w-4 text-green-700 dark:text-green-400" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    <p class="text-[10px] sm:text-sm text-gray-500 dark:text-slate-400">
                                                        @if($item->tanggal)
                                                            @php
                                                                $dateObj = $item->tanggal;
                                                                $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                                                $monthName = $months[$dateObj->month - 1];
                                                                $date = $dateObj->day . ' ' . $monthName . ', ' . $dateObj->year . ' ' . $dateObj->format('H:i');
                                                            @endphp
                                                            {{ $date }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            {{ $pengumuman->links() }}
                        </div>
                    @else
                        <div
                            class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg p-12 text-center">
                            @if(request('q'))
                                <p class="text-sm sm:text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2">Hasil Pencarian
                                    Tidak
                                    Ditemukan
                                </p>
                                <p class="text-xs sm:text-base text-slate-500 dark:text-slate-400">Tidak ada pengumuman yang sesuai
                                    dengan
                                    pencarian
                                    "<strong>{{ request('q') }}</strong>"</p>
                            @else
                                <p class="text-sm sm:text-lg text-gray-500 dark:text-slate-400">Belum ada pengumuman</p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <!-- Kanan: Sidebar (30%) -->
            <div class="w-full lg:w-[30%] lg:-mt-4">
                @include('web.components.post-sidebar', [
                    'articles' => $sidebarArticles ?? [],
                    'articlesSecondary' => $berita ?? [],
                    'articleTitle' => 'Artikel Terbaru',
                    'articleSecondaryTitle' => 'Berita Terbaru',
                    'announcements' => [],
                    'agenda' => [],
                    'showSocialMedia' => false,
                    'schoolProfile' => null
                ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
@endsection