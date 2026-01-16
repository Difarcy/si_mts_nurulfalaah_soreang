@extends('admin.layouts.admin')

@section('title', 'Pengumuman')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4" id="page-header">
            <div>
                <h1 class="text-lg sm:text-2xl font-bold text-slate-900 dark:text-slate-100">Pengumuman</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola pengumuman yang ditampilkan di website</p>
            </div>
            @if($pengumuman->count() > 0 || request('q') || request('sort') || request('status'))
                <div class="relative flex items-center gap-3">
                    <button type="button" id="header-reset-btn"
                        class="{{ (request('q') || request('sort') || request('status')) ? 'inline-flex' : 'hidden' }} items-center justify-center p-2 sm:px-3 sm:py-1.5 text-base font-semibold text-white bg-gray-500 hover:bg-gray-600 transition-colors rounded">Reset</button>

                    @if($pengumuman->count() > 0)
                        <a href="{{ route('cpanel.pengumuman.create') }}"
                            class="inline-flex items-center justify-center p-2 sm:px-3 sm:py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors rounded">
                            <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span class="hidden sm:inline">Tambah</span>
                        </a>
                    @endif
                </div>
            @endif
        </div>

        {{-- Container untuk search, filter, dan tabel --}}
        <div class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 rounded shadow-sm">
            <!-- Search and Filter Bar -->
            <div class="px-4 py-2 sm:px-6 sm:py-3 border-b border-gray-200 dark:border-slate-700">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <!-- Search Input -->
                    <form action="{{ route('cpanel.pengumuman.index') }}" method="GET" class="flex-1">
                        @if(request('sort'))
                            <input type="hidden" name="sort" value="{{ request('sort') }}">
                        @endif
                        @if(request('status'))
                            <input type="hidden" name="status" value="{{ request('status') }}">
                        @endif
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400 dark:text-slate-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="search-input" name="q" value="{{ request('q') }}"
                                placeholder="Cari pengumuman..."
                                class="w-full pl-10 pr-4 p-2 sm:py-1.5 text-base border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:border-green-600 focus:outline-none rounded">
                        </div>
                    </form>

                    <!-- Filter Status -->
                    <div class="relative">
                        <select id="filter-status" name="status"
                            class="bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-4 p-2 sm:py-1.5 pr-10 text-base font-semibold focus:border-green-600 focus:outline-none appearance-none cursor-pointer min-w-40 rounded">
                            <option value="">Semua Status</option>
                            <option value="publish" {{ request('status') === 'publish' ? 'selected' : '' }}>Publikasi</option>
                            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="nonaktif" {{ request('status') === 'nonaktif' ? 'selected' : '' }}>Nonaktif
                            </option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <!-- Sort Dropdown -->
                    <div class="relative">
                        <select id="sort-select" name="sort"
                            class="bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-4 p-2 sm:py-1.5 pr-10 text-base font-semibold focus:border-green-600 focus:outline-none appearance-none cursor-pointer min-w-40 rounded">
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Announcements List -->
            <div class="p-6" id="announcement-container" data-init-search="true" data-search-input-id="search-input"
                data-search-filters='[{"id":"filter-status","param":"status"}]'
                data-search-sort='{"id":"sort-select","param":"sort"}' data-search-reset-btn="page-header"
                data-route-url="{{ route('cpanel.pengumuman.index') }}">
                @if($pengumuman->count() > 0)
                    <div class="overflow-x-auto">
                        <table
                            class="min-w-full divide-y-2 divide-gray-200 dark:divide-slate-700 border border-gray-300 dark:border-slate-600 text-sm">
                            <thead
                                class="bg-slate-100 dark:bg-slate-700 border-b-2 border-gray-300 dark:border-slate-600 text-center text-xs uppercase tracking-wide text-slate-700 dark:text-slate-300">
                                <tr>
                                    <th class="px-4 py-3 border-r border-gray-300 dark:border-slate-600 font-semibold">Judul
                                    </th>
                                    <th class="px-4 py-3 border-r border-gray-300 dark:border-slate-600 font-semibold">Status
                                    </th>
                                    <th class="px-4 py-3 border-r border-gray-300 dark:border-slate-600 font-semibold">Waktu
                                    </th>
                                    <th class="px-4 py-3 text-center font-semibold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y-2 divide-gray-200 dark:divide-slate-700">
                                @foreach($pengumuman as $item)
                                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-700/50 transition-colors">
                                        <td class="px-4 py-3 border-r border-gray-200 dark:border-slate-600 text-left">
                                            <p class="font-semibold text-slate-900 dark:text-slate-100">{{ $item->judul }}</p>
                                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 line-clamp-1">
                                                {{ strip_tags($item->isi) }}
                                            </p>
                                        </td>
                                        <td class="px-4 py-3 border-r border-gray-200 dark:border-slate-600 text-center">
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full
                                                                                                                            {{ $item->status === 'publish' ? 'bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-300' : ($item->status === 'nonaktif' ? 'bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300' : 'bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300') }}">
                                                {{ $item->status === 'publish' ? 'Publikasi' : ($item->status === 'nonaktif' ? 'Nonaktif' : 'Draft') }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-4 py-3 text-slate-600 dark:text-slate-300 border-r border-gray-200 dark:border-slate-600 text-center">
                                            {{ $item->created_at ? $item->created_at->format('d M Y H:i') : '-' }}
                                        </td>
                                        <td class="px-4 py-3 text-right align-bottom">
                                            <div class="flex flex-col items-center gap-2">
                                                <a href="{{ route('cpanel.pengumuman.edit', $item) }}"
                                                    class="w-20 text-center px-3 py-1.5 text-xs font-bold text-white bg-yellow-500 hover:bg-yellow-600 whitespace-nowrap rounded">
                                                    Ubah
                                                </a>
                                                <button type="button" data-delete-trigger
                                                    data-action="{{ route('cpanel.pengumuman.destroy', $item) }}"
                                                    data-title="{{ $item->judul }}"
                                                    data-message="Yakin ingin menghapus pengumuman ini? Tindakan ini tidak dapat dibatalkan."
                                                    class="w-20 text-center px-3 py-1.5 text-xs font-bold text-white bg-red-700 hover:bg-red-800 whitespace-nowrap rounded">
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        {{ $pengumuman->withQueryString()->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                            </path>
                        </svg>

                        @if(request('q'))
                            <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2">
                                Pengumuman Tidak Ditemukan
                            </h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">
                                Tidak ada pengumuman yang sesuai dengan pencarian "<strong>{{ request('q') }}</strong>"
                            </p>
                        @else
                            <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2">
                                Belum Ada Pengumuman
                            </h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">
                                Mulai dengan menambahkan pengumuman pertama
                            </p>
                            <a href="{{ route('cpanel.pengumuman.create') }}"
                                class="inline-flex items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 rounded">
                                <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span class="hidden sm:inline">Tambah Pengumuman Pertama</span>
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus Pengumuman -->



@endsection
