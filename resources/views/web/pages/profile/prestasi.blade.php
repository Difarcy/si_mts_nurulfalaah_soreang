@extends('web.layouts.website')

@section('title', 'Prestasi Siswa')

@section('content')
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8 sm:py-12">
        <x-breadcrumb :items="[
            ['label' => 'Profil'],
            ['label' => 'Prestasi Siswa']
        ]" />
        <x-page-title title="Prestasi Siswa" />

        @php
            // Data prestasi dari database sudah dikirim dari controller
            $achievements = isset($achievements) ? $achievements : (isset($prestasi) ? $prestasi : collect());
        @endphp

        <div class="flex flex-col lg:flex-row gap-4 lg:gap-4 mt-8">
            <!-- Kiri: Konten (70%) -->
            <div class="w-full lg:w-[70%]">
                @if($achievements->isEmpty())
                    <div class="flex items-center justify-center py-12 min-h-80">
                        <p class="text-sm sm:text-lg md:text-xl font-semibold text-gray-400 dark:text-slate-500 text-center">
                            Belum Ada Prestasi Siswa
                        </p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($achievements as $achievement)
                            <div
                                class="group bg-white dark:bg-slate-800 rounded-xl shadow-lg overflow-hidden border border-gray-100 dark:border-slate-700 hover:shadow-xl transition-all duration-300 animate-on-scroll h-full flex flex-col">
                                <div
                                    class="relative aspect-square overflow-hidden bg-gray-100 dark:bg-slate-700 group-hover:opacity-90 transition-opacity">
                                    <a href="{{ route('galeri.prestasi-siswa.show', $achievement) }}" class="block w-full h-full">
                                        @if($achievement->gambar)
                                            <img src="{{ asset('storage/' . $achievement->gambar) }}" alt="{{ $achievement->judul }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-12 w-12 text-gray-300 dark:text-slate-600" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </a>
                                    <div class="absolute top-3 right-3 pointer-events-none">
                                        <span
                                            class="px-3 py-1 text-[10px] sm:text-xs font-bold text-white bg-green-600/90 backdrop-blur-sm rounded-full shadow-sm">
                                            {{ $achievement->tingkat_prestasi ?? 'Prestasi' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <div class="flex items-center gap-2 mb-3">
                                        <span class="text-[10px] sm:text-xs font-medium text-green-600 dark:text-green-400">
                                            {{ $achievement->jenis_prestasi ?? 'Akademik' }}
                                        </span>
                                        <span class="text-gray-300 dark:text-slate-600">•</span>
                                        <span class="text-[10px] sm:text-xs text-gray-500 dark:text-slate-400">
                                            {{ $achievement->tanggal_prestasi ? \Carbon\Carbon::parse($achievement->tanggal_prestasi)->isoFormat('D MMMM Y') : '-' }}
                                        </span>
                                    </div>
                                    <h3
                                        class="text-base sm:text-lg font-bold text-gray-900 dark:text-slate-100 mb-3 line-clamp-2 h-14 group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">
                                        <a href="{{ route('galeri.prestasi-siswa.show', $achievement) }}">
                                            {{ $achievement->judul }}
                                        </a>
                                    </h3>

                                    <p class="text-xs sm:text-sm text-gray-600 dark:text-slate-400 truncate mb-3">
                                        {{ $achievement->nama_siswa ?? 'Siswa' }}
                                        <span
                                            class="text-gray-400 text-[10px] sm:text-xs ml-1">({{ $achievement->kelas ?? '-' }})</span>
                                    </p>
                                    @if($achievement->deskripsi)
                                        <p class="text-xs sm:text-sm text-gray-500 dark:text-slate-400 line-clamp-3 mb-4">
                                            {{ Str::limit(strip_tags($achievement->deskripsi), 100) }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $achievements->links() }}
                    </div>
                @endif
            </div>

            <!-- Kanan: Sidebar (30%) -->
            <div class="w-full lg:w-[30%] lg:-mt-4 space-y-8">
                @include('web.components.post-sidebar', [
                    'articles' => [],
                    'announcements' => $announcements ?? [],
                    'agenda' => $agenda ?? null,
                    'announcementFirst' => true,
                    'articleTitle' => 'Berita Terbaru',
                    'articleEmptyMessage' => 'Belum ada berita',
                    'schoolProfile' => null
                ])
                                                        </div>
                                                    </div>
                                                </div>

@endsection
