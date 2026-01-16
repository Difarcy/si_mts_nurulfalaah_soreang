@extends('admin.layouts.admin')

@section('title', 'Publikasi')

@section('content')
    {{-- Halaman utama Publikasi - menggabungkan Berita dan Artikel --}}
    <div class="space-y-6">
        {{-- Header dengan tombol tambah --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-lg sm:text-2xl font-bold text-slate-900 dark:text-slate-100">Publikasi</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola berita dan artikel publikasi sekolah Anda
                </p>
            </div>
            @if(($totalPostsWithoutFilter ?? 0) > 0)
                <div class="relative flex items-center gap-3">
                    <button type="button" id="header-reset-btn"
                        class="hidden items-center justify-center p-2 sm:px-3 sm:py-1.5 text-base font-semibold text-white bg-gray-500 hover:bg-gray-600 transition-colors rounded">Reset</button>
                    @php
                        $currentType = request('type', 'berita');
                        $createRoute = $currentType === 'artikel' ? 'cpanel.artikel.create' : 'cpanel.berita.create';
                    @endphp
                    <a href="{{ route($createRoute, request()->query()) }}"
                        class="inline-flex items-center justify-center p-2 sm:px-3 sm:py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors rounded">
                        <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span class="hidden sm:inline">Tambah</span>
                    </a>
                </div>
            @endif
        </div>

        {{-- Container untuk search, filter, dan tabel --}}
        <div class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 rounded shadow-sm">
            {{-- Search and Filter Bar --}}
            <div class="px-4 py-2 sm:px-6 sm:py-3 border-b border-gray-200 dark:border-slate-700">
                <div class="flex flex-wrap items-center gap-3">
                    {{-- Search Input --}}
                    <form id="search-form" class="flex-1 min-w-50 relative">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400 dark:text-slate-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="search-input" name="q" value="{{ request('q') }}"
                                placeholder="Cari konten..."
                                class="w-full pl-10 pr-4 p-2 sm:py-1.5 text-base border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:border-green-600 focus:outline-none rounded"
                                autocomplete="off">
                        </div>
                    </form>

                    <!-- Filter Dropdowns -->
                    <div class="relative">
                        <select id="filter-type" name="type"
                            class="bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-4 p-2 sm:py-1.5 pr-10 text-base font-semibold focus:border-green-600 focus:outline-none appearance-none cursor-pointer min-w-30 rounded">
                            <option value="">Semua Tipe</option>
                            <option value="berita" {{ request('type') === 'berita' ? 'selected' : '' }}>Berita</option>
                            <option value="artikel" {{ request('type') === 'artikel' ? 'selected' : '' }}>Artikel</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <div class="relative">
                        <select id="filter-status" name="status"
                            class="bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-4 p-2 sm:py-1.5 pr-10 text-base font-semibold focus:border-green-600 focus:outline-none appearance-none cursor-pointer min-w-35 rounded">
                            <option value="">Semua Status</option>
                            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Terpublikasi
                            </option>
                            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="unpublished" {{ request('status') === 'unpublished' ? 'selected' : '' }}>Nonaktif
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

                    <!-- View Toggle -->
                    @php
                        $currentView = request('view', $viewPreference);
                    @endphp
                    <div
                        class="flex items-center border border-gray-300 dark:border-slate-700 p-0.5 bg-gray-50 dark:bg-slate-900">
                        <button type="button" id="view-table"
                            class="p-1.5 {{ $currentView === 'table' ? 'bg-white dark:bg-slate-800 text-green-600 dark:text-green-400 shadow-sm' : 'text-gray-500 dark:text-gray-400' }}"
                            title="Tabel">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 01-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                        </button>
                        <button type="button" id="view-grid"
                            class="p-1.5 {{ $currentView === 'grid' ? 'bg-white dark:bg-slate-800 text-green-600 dark:text-green-400 shadow-sm' : 'text-gray-500 dark:text-gray-400' }}"
                            title="Grid">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Posts Container -->
            <div id="posts-container">
                @include('admin.pages.publication._posts_content', ['posts' => $posts, 'viewPreference' => $viewPreference, 'totalPostsWithoutFilter' => $totalPostsWithoutFilter ?? 0])
            </div>
        </div>
    </div>

    {{-- JavaScript untuk search, filter, dan pagination sudah dipindahkan ke
    resources/js/admin/search/search-publication.js --}}

    {{-- JavaScript untuk search, filter, dan pagination sudah dipindahkan ke
    resources/js/admin/search/search-publication.js --}}


@endsection
