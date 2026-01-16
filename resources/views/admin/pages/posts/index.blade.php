@extends('admin.layouts.admin')

@section('title', ucfirst($type ?? 'Berita'))

@section('content')
    <div class="flex flex-col gap-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-lg sm:text-2xl font-bold text-slate-900 dark:text-slate-100">
                    {{ ucfirst($type ?? 'Berita') }}
                </h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Tambah, ubah, dan kelola
                    {{ strtolower($type ?? 'berita') }} di website.
                </p>
            </div>
            <div class="flex items-center gap-3">
                @if($posts->total() > 0)
                    <button type="button" id="reset-filters-btn"
                        class="inline-flex items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-gray-500 hover:bg-gray-600 rounded">
                        Reset
                    </button>
                    <a href="{{ route(($type ?? 'berita') === 'artikel' ? 'cpanel.artikel.create' : 'cpanel.berita.create') }}"
                        class="inline-flex items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 rounded">
                        + Tambah {{ ucfirst($type ?? 'Berita') }}
                    </a>
                @endif
            </div>
        </div>

        <!-- Toolbar: Pencarian, Filter Tipe, Filter Status, Clear, Sort, View -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div class="flex items-center gap-3 flex-1 flex-wrap">
                <!-- Pencarian -->
                <form method="GET"
                    action="{{ route(($type ?? 'berita') === 'artikel' ? 'cpanel.artikel.index' : 'cpanel.berita.index') }}"
                    id="search-form" class="flex-1">
                    <div class="relative">
                        <input type="text" name="q" id="search-input" value="{{ request('q') }}"
                            placeholder="Cari judul atau ringkasan..."
                            class="w-full bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-3 py-1.5 pl-10 pr-4 text-base focus:ring-2 focus:ring-green-600 focus:border-transparent rounded"
                            aria-label="Cari judul atau ringkasan">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        @if(request('sort'))
                            <input type="hidden" name="sort" id="sort" value="{{ request('sort') }}">
                        @endif
                        @if(request('view'))
                            <input type="hidden" name="view" id="view" value="{{ request('view') }}">
                        @endif
                        @if(request('status'))
                            <input type="hidden" name="status" id="status" value="{{ request('status') }}">
                        @endif
                    </div>
                </form>

                <!-- Filter Status -->
                <div class="relative">
                    <select id="filter-status"
                        class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-3 py-1.5 pr-8 text-base font-semibold focus:ring-2 focus:ring-green-600 focus:border-transparent appearance-none cursor-pointer min-w-40 rounded"
                        aria-label="Filter Status">
                        <option value="">Semua Status</option>
                        <option value="published" @selected(request('status') === 'published')>Terpublikasi</option>
                        <option value="draft" @selected(request('status') === 'draft')>Draft</option>
                        <option value="unpublished" @selected(request('status') === 'unpublished')>Nonaktif</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <!-- Sort Dropdown -->
                <div class="relative">
                    <select id="sort-select"
                        class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-3 py-1.5 pr-8 text-sm font-semibold focus:ring-2 focus:ring-green-600 focus:border-transparent appearance-none cursor-pointer rounded"
                        aria-label="Urutkan Berdasarkan">
                        <option value="latest" @selected(request('sort', 'latest') === 'latest')>Terbaru</option>
                        <option value="oldest" @selected(request('sort') === 'oldest')>Terlama</option>
                        <option value="title_asc" @selected(request('sort') === 'title_asc')>Judul A-Z</option>
                        <option value="title_desc" @selected(request('sort') === 'title_desc')>Judul Z-A</option>
                        <option value="published_asc" @selected(request('sort') === 'published_asc')>Tanggal Publikasi (Awal)
                        </option>
                        <option value="published_desc" @selected(request('sort') === 'published_desc')>Tanggal Publikasi
                            (Akhir)</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                <!-- View Toggle -->
                <div
                    class="flex items-center gap-1 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 p-0.5 rounded">
                    @php
                        $currentView = request('view', $viewPreference);
                    @endphp
                    <button id="view-table"
                        class="p-1.5 rounded {{ $currentView === 'table' ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300' : 'text-slate-600 dark:text-slate-400 hover:bg-gray-50 dark:hover:bg-slate-700' }} transition-colors"
                        title="Tampilan Tabel" aria-label="Tampilan Tabel">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                            </path>
                        </svg>
                    </button>
                    <button id="view-grid"
                        class="p-1.5 rounded {{ $currentView === 'grid' ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300' : 'text-slate-600 dark:text-slate-400 hover:bg-gray-50 dark:hover:bg-slate-700' }} transition-colors"
                        title="Tampilan Grid" aria-label="Tampilan Grid">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 overflow-hidden rounded"
            id="posts-container" data-init-search="true" data-search-input-id="search-input"
            data-search-filters='[{"id":"filter-status","param":"status"},{"id":"filter-type","param":"type"}]'
            data-search-sort='{"id":"sort-select","param":"sort"}'
            data-search-view='{"toggleIdTable":"view-table","toggleIdGrid":"view-grid","storageKey":"posts_view_preference","param":"view"}'
            data-route-url="{{ route(($type ?? 'berita') === 'artikel' ? 'cpanel.artikel.index' : 'cpanel.berita.index') }}">
            @php
                $currentView = request('view', $viewPreference);
            @endphp
            @if($currentView === 'grid')
                <!-- Grid View -->
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($posts as $post)
                        <div
                            class="bg-white dark:bg-slate-700 border border-gray-300 dark:border-slate-600 overflow-hidden hover:shadow-lg transition-shadow rounded">
                            @if($post->thumbnail_path)
                                <div class="w-full aspect-video overflow-hidden">
                                    <img src="{{ asset('storage/' . $post->thumbnail_path) }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover">
                                </div>
                            @endif
                            <div class="p-4">
                                <div class="flex items-center gap-2 mb-2">
                                    <span
                                        class="text-xs font-semibold px-2 py-1 rounded-full {{ $post->status === 'published' ? 'bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-300' : ($post->status === 'unpublished' ? 'bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300' : 'bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300') }}">
                                        {{ $post->status === 'published' ? 'Publikasi' : ($post->status === 'unpublished' ? 'Nonaktif' : 'Draft') }}
                                    </span>
                                </div>
                                <h3 class="font-semibold text-slate-900 dark:text-slate-100 mb-2 line-clamp-2">{{ $post->title }}
                                </h3>
                                @if($post->excerpt)
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-3 line-clamp-2">{{ $post->excerpt }}</p>
                                @endif
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-4">
                                    {{ $post->published_at ? $post->published_at->format('d M Y H:i') : 'Belum dijadwalkan' }}
                                </p>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route(($post->type === 'artikel' ? 'cpanel.artikel.edit' : 'cpanel.berita.edit'), $post) }}"
                                        class="flex-1 text-center px-3.5 py-2.5 text-xs font-bold text-white bg-green-700 hover:bg-green-800 whitespace-nowrap rounded">Ubah</a>
                                    <button type="button"
                                        class="flex-1 text-center px-3.5 py-2.5 text-xs font-bold text-white bg-red-700 hover:bg-red-800 whitespace-nowrap rounded"
                                        data-delete-trigger
                                        data-action="{{ route(($post->type === 'artikel' ? 'cpanel.artikel.destroy' : 'cpanel.berita.destroy'), $post) }}"
                                        data-title="{{ $post->title }}"
                                        data-message="Anda yakin ingin menghapus {{ ($post->type === 'artikel' ? 'artikel' : 'berita') }} ini?">Hapus</button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full">
                            <div class="text-center py-12">
                                @if(request('q'))
                                    {{-- Jika ada pencarian (q) --}}
                                    <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto mb-4" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2 text-center">Hasil
                                        Pencarian Tidak Ditemukan</h3>
                                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 text-center">
                                        Tidak ada konten yang sesuai dengan pencarian "<strong>{{ request('q') }}</strong>"
                                    </p>
                                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 text-center">Tidak ada konten yang sesuai
                                        dengan pencarian "<strong>{{ request('q') }}</strong>"</p>
                                @elseif(request()->hasAny(['type', 'status']))
                                    {{-- Jika hanya filter tipe atau status (tanpa pencarian) --}}
                                    <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto mb-4" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2 text-center">Tidak
                                        Ditemukan {{ ucfirst($type ?? 'Berita') }}</h3>
                                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 text-center">
                                        @if(request('status'))
                                            @if(request('status') === 'published')
                                                Belum ada {{ ($type ?? 'berita') === 'artikel' ? 'artikel' : 'berita' }} dengan status
                                                "<strong>Terpublikasi</strong>"
                                            @elseif(request('status') === 'draft')
                                                Belum ada {{ ($type ?? 'berita') === 'artikel' ? 'artikel' : 'berita' }} dengan status
                                                "<strong>Draft</strong>"
                                            @elseif(request('status') === 'unpublished')
                                                Belum ada {{ ($type ?? 'berita') === 'artikel' ? 'artikel' : 'berita' }} dengan status
                                                "<strong>Nonaktif</strong>"
                                            @endif
                                        @endif
                                    </p>
                                    @if(!request('status'))
                                        {{-- Hanya tampilkan tombol jika tidak ada filter status --}}
                                        <a href="{{ route(($type ?? 'berita') === 'artikel' ? 'cpanel.artikel.create' : 'cpanel.berita.create') }}"
                                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-green-700 text-white font-bold hover:bg-green-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                                                </path>
                                            </svg>
                                            Tambah Konten
                                        </a>
                                    @endif
                                @else
                                    {{-- Jika tidak ada filter sama sekali --}}
                                    <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto mb-4" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2 text-center">Tidak
                                        Ditemukan {{ ucfirst($type ?? 'Berita') }}</h3>
                                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 text-center">Mulai dengan menambahkan
                                        {{ ($type ?? 'berita') === 'artikel' ? 'artikel' : 'berita' }} baru
                                    </p>
                                    <a href="{{ route(($type ?? 'berita') === 'artikel' ? 'cpanel.artikel.create' : 'cpanel.berita.create') }}"
                                        class="inline-flex items-center gap-2 px-6 py-3 bg-green-700 text-white font-bold rounded-lg hover:bg-green-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                                            </path>
                                        </svg>
                                        Tambah Konten Pertama
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforelse
                </div>
            @else
                <!-- Table View -->
                <div class="overflow-x-auto">
                    <table
                        class="min-w-full divide-y-2 divide-gray-200 dark:divide-slate-700 border border-gray-300 dark:border-slate-600 text-sm">
                        <thead
                            class="bg-slate-100 dark:bg-slate-700 border-b-2 border-gray-300 dark:border-slate-600 text-left text-xs uppercase tracking-wide text-slate-700 dark:text-slate-300">
                            <tr>
                                <th class="px-4 py-3 border-r border-gray-300 dark:border-slate-600 font-semibold">Judul</th>
                                <th class="px-4 py-3 border-r border-gray-300 dark:border-slate-600 font-semibold">Status</th>
                                <th class="px-4 py-3 border-r border-gray-300 dark:border-slate-600 font-semibold">Dijadwalkan
                                </th>
                                <th class="px-4 py-3 text-right font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y-2 divide-gray-200 dark:divide-slate-700">
                            @forelse($posts as $post)
                                <tr class="hover:bg-slate-100 dark:hover:bg-slate-700/50 transition-colors">
                                    <td class="px-4 py-3 border-r border-gray-200 dark:border-slate-600">
                                        <p class="font-semibold text-slate-900 dark:text-slate-100">{{ $post->title }}</p>
                                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 line-clamp-1">{{ $post->excerpt }}
                                        </p>
                                    </td>
                                    <td class="px-4 py-3 border-r border-gray-200 dark:border-slate-600">
                                        <span
                                            class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full
                                                                                                                {{ $post->status === 'published' ? 'bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-300' : ($post->status === 'unpublished' ? 'bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300' : 'bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300') }}">
                                            {{ $post->status === 'published' ? 'Publikasi' : ($post->status === 'unpublished' ? 'Nonaktif' : 'Draft') }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-slate-600 dark:text-slate-300 border-r border-gray-200 dark:border-slate-600">
                                        {{ $post->published_at ? $post->published_at->format('d M Y H:i') : 'Belum dijadwalkan' }}
                                    </td>
                                    <td class="px-4 py-3 text-right align-bottom">
                                        <div class="flex flex-col items-end gap-2">
                                            <a href="{{ route(($post->type === 'artikel' ? 'cpanel.artikel.edit' : 'cpanel.berita.edit'), $post) }}"
                                                class="w-20 text-center px-3.5 py-2.5 text-xs font-bold text-white bg-green-700 hover:bg-green-800 whitespace-nowrap rounded">Ubah</a>
                                            <button type="button"
                                                class="w-20 text-center px-3.5 py-2.5 text-xs font-bold text-white bg-red-700 hover:bg-red-800 whitespace-nowrap rounded"
                                                data-delete-trigger
                                                data-action="{{ route(($post->type === 'artikel' ? 'cpanel.artikel.destroy' : 'cpanel.berita.destroy'), $post) }}"
                                                data-title="{{ $post->title }}"
                                                data-message="Anda yakin ingin menghapus {{ ($post->type === 'artikel' ? 'artikel' : 'berita') }} ini?">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-12">
                                        <div class="text-center">
                                            @if(request('q'))
                                                {{-- Jika ada pencarian (q) --}}
                                                <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto mb-4" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                                <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2 text-center">
                                                    Hasil Pencarian Tidak Ditemukan</h3>
                                                <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 text-center">
                                                    Tidak ada konten yang sesuai dengan pencarian "<strong>{{ request('q') }}</strong>"
                                                </p>
                                                <div class="text-center">
                                                    <a href="{{ route(($type ?? 'berita') === 'artikel' ? 'cpanel.artikel.index' : 'cpanel.berita.index') }}"
                                                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-slate-900 dark:bg-slate-700 text-white font-bold hover:bg-slate-800 dark:hover:bg-slate-600">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                        Kosongkan Pencarian
                                                    </a>
                                                </div>
                                            @elseif(request()->hasAny(['type', 'status']))
                                                {{-- Jika hanya filter tipe atau status (tanpa pencarian) --}}
                                                <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto mb-4" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2 text-center">
                                                    Tidak Ditemukan {{ ucfirst($type ?? 'Berita') }}</h3>
                                                <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 text-center">
                                                    @if(request('status'))
                                                        @if(request('status') === 'published')
                                                            Belum ada {{ ($type ?? 'berita') === 'artikel' ? 'artikel' : 'berita' }} dengan
                                                            status "<strong>Terpublikasi</strong>"
                                                        @elseif(request('status') === 'draft')
                                                            Belum ada {{ ($type ?? 'berita') === 'artikel' ? 'artikel' : 'berita' }} dengan
                                                            status "<strong>Draft</strong>"
                                                        @elseif(request('status') === 'unpublished')
                                                            Belum ada {{ ($type ?? 'berita') === 'artikel' ? 'artikel' : 'berita' }} dengan
                                                            status "<strong>Nonaktif</strong>"
                                                        @endif
                                                    @endif
                                                </p>
                                                @if(!request('status'))
                                                    {{-- Hanya tampilkan tombol jika tidak ada filter status --}}
                                                    <a href="{{ route(($type ?? 'berita') === 'artikel' ? 'cpanel.artikel.create' : 'cpanel.berita.create') }}"
                                                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-green-700 text-white font-bold hover:bg-green-800">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 4v16m8-8H4"></path>
                                                        </svg>
                                                        Tambah Konten
                                                    </a>
                                                @endif
                                            @else
                                                {{-- Jika tidak ada filter sama sekali --}}
                                                <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto mb-4" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2 text-center">
                                                    Tidak Ditemukan {{ ucfirst($type ?? 'Berita') }}</h3>
                                                <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 text-center">Mulai dengan
                                                    menambahkan {{ ($type ?? 'berita') === 'artikel' ? 'artikel' : 'berita' }} baru</p>
                                                <a href="{{ route(($type ?? 'berita') === 'artikel' ? 'cpanel.artikel.create' : 'cpanel.berita.create') }}"
                                                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-green-700 text-white font-bold hover:bg-green-800">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 4v16m8-8H4"></path>
                                                    </svg>
                                                    Tambah Konten Pertama
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
            <div class="px-4 py-3 border-t border-gray-100 dark:border-slate-700">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection
