@extends('admin.layouts.admin')

@section('title', 'Prestasi Siswa')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-lg sm:text-2xl font-bold text-slate-900 dark:text-slate-100">Prestasi Siswa</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola data prestasi siswa agar tampil di
                    website.</p>
            </div>

            <div class="flex items-center gap-3">
                @php
                    $hasFilter = request('q') || request('jenis') || request('tingkat');
                @endphp
                <button type="button" id="header-reset-btn"
                    class="{{ $hasFilter ? 'inline-flex' : 'hidden' }} items-center justify-center p-2 sm:px-3 sm:py-1.5 text-base font-semibold text-white bg-gray-500 hover:bg-gray-600 transition-colors rounded">Reset</button>
                @if($prestasi->count() > 0 || $hasFilter)
                    <a href="{{ route('cpanel.prestasi-siswa.create') }}"
                        class="inline-flex items-center justify-center p-2 sm:px-3 sm:py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors rounded">
                        <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span class="hidden sm:inline">Tambah</span>
                    </a>
                @endif
            </div>
        </div>

        {{-- Container untuk search, filter, dan tabel --}}
        <div class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 rounded shadow-sm">
            <!-- Search & Filters (Static - Outside Ajax Container) -->
            <div class="px-4 py-2 sm:px-6 sm:py-3 border-b border-gray-200 dark:border-slate-700" id="page-header">
                <form action="{{ route('cpanel.prestasi-siswa.index') }}" method="GET"
                    class="flex flex-wrap items-center gap-3">
                    <div class="flex-1 min-w-50 relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400 dark:text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="search" id="search-input" name="q" value="{{ request('q') }}"
                            placeholder="Cari prestasi..."
                            class="w-full pl-10 pr-4 p-2 sm:py-1.5 text-base border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:border-green-600 focus:outline-none rounded">
                    </div>

                    <div class="relative">
                        <select id="filter-jenis" name="jenis"
                            class="bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-4 p-2 sm:py-1.5 pr-10 text-base font-semibold focus:border-green-600 focus:outline-none appearance-none cursor-pointer min-w-35 rounded">
                            <option value="">Semua Jenis</option>
                            <option value="Akademik" {{ request('jenis') === 'Akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="Non-Akademik" {{ request('jenis') === 'Non-Akademik' ? 'selected' : '' }}>
                                Non-Akademik</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>

                    <div class="relative">
                        <select id="filter-tingkat" name="tingkat"
                            class="bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-4 p-2 sm:py-1.5 pr-10 text-base font-semibold focus:border-green-600 focus:outline-none appearance-none cursor-pointer min-w-40 rounded">
                            <option value="">Semua Tingkat</option>
                            @foreach(['Sekolah', 'Kecamatan', 'Kabupaten', 'Provinsi', 'Nasional', 'Internasional'] as $t)
                                <option value="{{ $t }}" {{ request('tingkat') === $t ? 'selected' : '' }}>{{ $t }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>

                    <div class="relative">
                        <select id="sort-select" name="sort"
                            class="bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-4 p-2 sm:py-1.5 pr-10 text-base font-semibold focus:border-green-600 focus:outline-none appearance-none cursor-pointer min-w-35 rounded">
                            <option value="latest" {{ request('sort', 'latest') === 'latest' ? 'selected' : '' }}>Terbaru
                            </option>
                            <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>Terlama</option>
                            <option value="title_asc" {{ request('sort') === 'title_asc' ? 'selected' : '' }}>Judul A-Z
                            </option>
                            <option value="title_desc" {{ request('sort') === 'title_desc' ? 'selected' : '' }}>Judul Z-A
                            </option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Dynamic Content (Replaced by Ajax) -->
            <div id="achievement-container" data-route="{{ route('cpanel.prestasi-siswa.index') }}">
                @if($prestasi->count() > 0)
                    <!-- Grid View (Only) -->
                    <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($prestasi as $item)
                            <div
                                class="bg-white dark:bg-slate-700 border border-gray-300 dark:border-slate-600 overflow-hidden hover:shadow-lg transition-shadow rounded flex flex-col h-full">
                                <div
                                    class="w-full aspect-square overflow-hidden border-b border-gray-300 dark:border-slate-600 rounded">
                                    <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('images/background/default-backgrounds.png') }}"
                                        alt="{{ $item->judul }}" class="w-full h-full object-cover">
                                </div>
                                <div class="p-4 flex flex-col flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <span
                                            class="text-xs font-semibold px-2 py-1 text-white bg-green-600 rounded-full">{{ $item->tingkat_prestasi }}</span>
                                        @php
                                            $badgeColor = match ($item->jenis_prestasi) {
                                                'Akademik' => 'text-blue-700 bg-blue-100 dark:bg-blue-900/30 dark:text-blue-300',
                                                'Non-Akademik' => 'text-orange-700 bg-orange-100 dark:bg-orange-900/30 dark:text-orange-300',
                                                default => 'text-green-700 bg-green-100 dark:bg-green-900/30 dark:text-green-300',
                                            };
                                        @endphp
                                        <span class="text-xs font-semibold px-2 py-1 rounded-full {{ $badgeColor }}">
                                            {{ $item->jenis_prestasi }}
                                        </span>
                                    </div>
                                    <h3 class="font-semibold text-slate-900 dark:text-slate-100 mb-2 line-clamp-2 h-10"
                                        title="{{ $item->judul }}">{{ $item->judul }}</h3>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-3">{{ $item->nama_siswa }}
                                        {{ $item->kelas ? '(' . $item->kelas . ')' : '' }}
                                    </p>

                                    @if($item->deskripsi)
                                        <p class="text-xs text-slate-600 dark:text-slate-400 mb-3 line-clamp-3 leading-relaxed">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 160) }}
                                        </p>
                                    @endif

                                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-4 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $item->tanggal_prestasi ? $item->tanggal_prestasi->format('d M Y') : '-' }}
                                    </p>

                                    <div class="flex items-center gap-2 mt-auto">
                                        <a href="{{ route('cpanel.prestasi-siswa.edit', $item) }}"
                                            class="flex-1 text-center px-3 py-1.5 text-xs font-bold text-white bg-yellow-500 hover:bg-yellow-600 transition-colors rounded">Ubah</a>
                                        <button type="button"
                                            class="flex-1 w-full text-center px-3 py-1.5 text-xs font-bold text-white bg-red-600 hover:bg-red-700 transition-colors rounded"
                                            data-delete-trigger data-action="{{ route('cpanel.prestasi-siswa.destroy', $item) }}"
                                            data-title="{{ $item->judul }}"
                                            data-message="Apakah Anda yakin ingin menghapus prestasi ini?">
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                        @if(request('q'))
                            <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2">Hasil Pencarian Tidak
                                Ditemukan</h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Tidak ada Prestasi Siswa yang sesuai dengan
                                pencarian "{{ request('q') }}"</p>
                        @elseif(request('jenis') || request('tingkat'))
                            <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2">Konten tidak ditemukan</h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Data tidak tersedia untuk kriteria yang
                                dipilih.</p>
                        @else
                            <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2">Belum Ada Prestasi</h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Tambahkan data prestasi siswa agar tampil di
                                website.</p>
                            <a href="{{ route('cpanel.prestasi-siswa.create') }}"
                                class="inline-flex items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 rounded">
                                <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span class="hidden sm:inline">Tambah Prestasi</span>
                            </a>
                        @endif
                    </div>
                @endif

                <div class="px-6 pb-6 mt-6">
                    {{ $prestasi->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection