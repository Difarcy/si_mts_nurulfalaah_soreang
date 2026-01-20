@extends('admin.layouts.admin')

@section('title', 'Dashboard Control Panel')

@section('content')
    <div class="space-y-4 pb-4">
        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-lg sm:text-2xl font-bold text-slate-900 dark:text-slate-100">Dashboard</h1>
                <p class="text-base text-slate-500 dark:text-slate-400 mt-1">Selamat datang di Control Panel MTs Nurul Falaah
                </p>
            </div>
            <a href="{{ route('web.home') }}" target="_blank"
                class="inline-flex items-center gap-2 p-2 sm:px-4 sm:py-2 bg-green-600 hover:bg-green-700 text-white text-base font-semibold transition-colors rounded">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                <span class="hidden sm:inline">Lihat Website</span>
            </a>
        </div>

        {{-- Statistics Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            {{-- Total Publikasi --}}
            <a href="{{ route('cpanel.publikasi.index') }}" class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm hover:border-green-500 transition-colors group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-base font-semibold text-slate-500 dark:text-slate-400">Publikasi</p>
                        <p class="text-3xl font-bold text-slate-900 dark:text-slate-100 mt-2">
                            {{ $stats['total_posts'] }}
                        </p>
                    </div>
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-xl group-hover:bg-blue-200 dark:group-hover:bg-blue-900/50 transition-colors text-blue-600 dark:text-blue-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-3 text-sm">
                    <span class="text-green-600 dark:text-green-400 font-medium">{{ $stats['published_posts'] }}
                        Terbit</span>
                    <span class="text-slate-300 dark:text-slate-600">|</span>
                    <span class="text-slate-500 dark:text-slate-400">{{ $stats['draft_posts'] }} Draft</span>
                </div>
            </a>

            {{-- Komentar --}}
            <a href="{{ route('cpanel.comments.index') }}" class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm hover:border-green-500 transition-colors group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-base font-semibold text-slate-500 dark:text-slate-400">Komentar</p>
                        <p class="text-3xl font-bold text-slate-900 dark:text-slate-100 mt-2">
                            {{ $stats['total_comments'] }}
                        </p>
                    </div>
                    <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-xl group-hover:bg-green-200 dark:group-hover:bg-green-900/50 transition-colors text-green-600 dark:text-green-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-3 text-sm">
                    @if($stats['unread_comments'] > 0)
                        <span class="text-red-600 dark:text-red-400 font-bold">{{ $stats['unread_comments'] }} Baru</span>
                    @else
                        <span class="text-green-600 dark:text-green-400 font-medium font-sans">Selesai</span>
                    @endif
                    @if($stats['pending_comments'] > 0)
                        <span class="text-slate-300 dark:text-slate-600">|</span>
                        <span class="text-yellow-600 dark:text-yellow-400">{{ $stats['pending_comments'] }} Pending</span>
                    @endif
                </div>
            </a>

            {{-- Pesan --}}
            <a href="{{ route('cpanel.inbox.index') }}" class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm hover:border-green-500 transition-colors group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-base font-semibold text-slate-500 dark:text-slate-400">Pesan</p>
                        <p class="text-3xl font-bold text-slate-900 dark:text-slate-100 mt-2">
                            {{ $stats['total_messages'] }}
                        </p>
                    </div>
                    <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-xl group-hover:bg-purple-200 dark:group-hover:bg-purple-900/50 transition-colors text-purple-600 dark:text-purple-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 text-sm">
                    @if($stats['unread_messages'] > 0)
                        <span class="text-red-600 dark:text-red-400 font-bold">{{ $stats['unread_messages'] }} Belum
                            Dibaca</span>
                    @else
                        <span class="text-green-600 dark:text-green-400 font-medium">Semua Terbaca</span>
                    @endif
                </div>
            </a>

            {{-- Foto Kegiatan --}}
            <a href="{{ route('cpanel.foto-kegiatan.index') }}" class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm hover:border-green-500 transition-colors group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-base font-semibold text-slate-500 dark:text-slate-400">Foto Kegiatan</p>
                        <p class="text-3xl font-bold text-slate-900 dark:text-slate-100 mt-2">
                            {{ $stats['total_activities'] }}
                        </p>
                    </div>
                    <div class="p-3 bg-pink-100 dark:bg-pink-900/30 rounded-xl group-hover:bg-pink-200 dark:group-hover:bg-pink-900/50 transition-colors text-pink-600 dark:text-pink-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-3 text-sm">
                    <span class="text-slate-600 dark:text-slate-400 font-medium">Kelola Galeri Foto</span>
                </div>
            </a>
        </div>

        {{-- Quick Actions --}}
        <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm">
            <h2 class="text-base sm:text-lg font-bold text-slate-900 dark:text-slate-100 mb-3">Aksi Cepat</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">
                <a href="{{ route('cpanel.berita.create') }}"
                    class="group flex flex-col items-center gap-2 p-4 border-2 border-gray-200 dark:border-slate-700 hover:border-green-500 dark:hover:border-green-500 transition-colors rounded">
                    <div
                        class="p-3 bg-blue-50 dark:bg-blue-900/20 group-hover:bg-blue-100 dark:group-hover:bg-blue-900/40 transition-colors rounded-lg">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <span class="text-base font-semibold text-slate-700 dark:text-white text-center">Buat Berita</span>
                </a>

                <a href="{{ route('cpanel.artikel.create') }}"
                    class="group flex flex-col items-center gap-2 p-4 border-2 border-gray-200 dark:border-slate-700 hover:border-green-500 dark:hover:border-green-500 transition-colors rounded">
                    <div
                        class="p-3 bg-green-50 dark:bg-green-900/20 group-hover:bg-green-100 dark:group-hover:bg-green-900/40 transition-colors rounded-lg">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-base font-semibold text-slate-700 dark:text-white text-center">Buat Artikel</span>
                </a>

                <a href="{{ route('cpanel.pengumuman.create') }}"
                    class="group flex flex-col items-center gap-2 p-4 border-2 border-gray-200 dark:border-slate-700 hover:border-green-500 dark:hover:border-green-500 transition-colors rounded">
                    <div
                        class="p-3 bg-yellow-50 dark:bg-yellow-900/20 group-hover:bg-yellow-100 dark:group-hover:bg-yellow-900/40 transition-colors rounded-lg">
                        <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-base font-semibold text-slate-700 dark:text-white text-center">Buat Pengumuman</span>
                </a>

                <a href="{{ route('cpanel.agenda.create') }}"
                    class="group flex flex-col items-center gap-2 p-4 border-2 border-gray-200 dark:border-slate-700 hover:border-green-500 dark:hover:border-green-500 transition-colors rounded">
                    <div
                        class="p-3 bg-purple-50 dark:bg-purple-900/20 group-hover:bg-purple-100 dark:group-hover:bg-purple-900/40 transition-colors rounded-lg">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-base font-semibold text-slate-700 dark:text-white text-center">Buat Agenda</span>
                </a>

                <a href="{{ route('cpanel.activity-videos.create') }}"
                    class="group flex flex-col items-center gap-2 p-4 border-2 border-gray-200 dark:border-slate-700 hover:border-green-500 dark:hover:border-green-500 transition-colors rounded">
                    <div
                        class="p-3 bg-pink-50 dark:bg-pink-900/20 group-hover:bg-pink-100 dark:group-hover:bg-pink-900/40 transition-colors rounded-lg">
                        <svg class="w-6 h-6 text-pink-600 dark:text-pink-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-base font-semibold text-slate-700 dark:text-white text-center">Upload Video</span>
                </a>

                <a href="{{ route('cpanel.help.index') }}"
                    class="group flex flex-col items-center gap-2 p-4 border-2 border-gray-200 dark:border-slate-700 hover:border-green-500 dark:hover:border-green-500 transition-colors rounded">
                    <div
                        class="p-3 bg-slate-50 dark:bg-slate-700/20 group-hover:bg-slate-100 dark:group-hover:bg-slate-700/40 transition-colors rounded-lg">
                        <svg class="w-6 h-6 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-base font-semibold text-slate-700 dark:text-white text-center">Bantuan</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            {{-- Recent Posts --}}
            <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 dark:text-slate-100">Publikasi Terbaru</h2>
                    <a href="{{ route('cpanel.publikasi.index') }}"
                        class="text-sm text-green-600 dark:text-green-400 hover:underline">Lihat Semua</a>
                </div>
                @if($recent_posts->count() > 0)
                    <div class="space-y-3">
                        @foreach($recent_posts as $post)
                            <a href="{{ route('cpanel.' . $post->type . '.edit', $post) }}"
                                class="block p-3 border border-gray-200 dark:border-slate-700 hover:border-green-500 dark:hover:border-green-500 transition-colors rounded">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-medium text-slate-900 dark:text-slate-100 truncate">{{ $post->title }}</h3>
                                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                                            <span class="capitalize">{{ $post->type }}</span> •
                                            @if($post->author)
                                                {{ $post->author->name }} •
                                            @endif
                                            {{ $post->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                    <span
                                        class="px-2 py-1 text-xs font-semibold {{ $post->status === 'published' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 'bg-slate-100 text-slate-700 dark:bg-slate-700/30 dark:text-slate-400' }} rounded-full">
                                        {{ $post->status === 'published' ? 'Dipublikasi' : 'Draft' }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-slate-500 dark:text-slate-400 text-center py-8">Belum ada publikasi</p>
                @endif
            </div>

            {{-- Recent Comments --}}
            <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 dark:text-slate-100">Komentar Belum Dibaca</h2>
                    <a href="{{ route('cpanel.comments.index') }}"
                        class="text-sm text-green-600 dark:text-green-400 hover:underline">Lihat Semua</a>
                </div>
                @if($recent_comments->count() > 0)
                    <div class="space-y-3">
                        @foreach($recent_comments as $comment)
                            <a href="{{ route('cpanel.comments.show', $comment) }}"
                                class="block p-3 border border-gray-200 dark:border-slate-700 hover:border-green-500 dark:hover:border-green-500 transition-colors rounded">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                        <span
                                            class="text-xs font-bold text-blue-600 dark:text-blue-400">{{ substr($comment->name, 0, 1) }}</span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-medium text-slate-900 dark:text-slate-100">{{ $comment->name }}</p>
                                        <p class="text-sm text-slate-600 dark:text-slate-400 truncate">
                                            {{ Str::limit($comment->comment, 60) }}
                                        </p>
                                        <p class="text-xs text-slate-500 dark:text-slate-500 mt-1">
                                            @if($comment->post)
                                                pada: {{ Str::limit($comment->post->title, 30) }} •
                                            @endif
                                            {{ $comment->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-slate-500 dark:text-slate-400 text-center py-8">Semua komentar sudah dibaca</p>
                @endif
            </div>
        </div>

        {{-- Recent Messages --}}
        <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-base sm:text-lg font-bold text-slate-900 dark:text-slate-100">Pesan Belum Dibaca</h2>
                <a href="{{ route('cpanel.inbox.index') }}"
                    class="text-sm text-green-600 dark:text-green-400 hover:underline">Lihat Semua</a>
            </div>
            @if($recent_messages->count() > 0)
                <div class="space-y-3">
                    @foreach($recent_messages as $message)
                        <a href="{{ route('cpanel.inbox.show', $message) }}"
                            class="block p-3 border border-gray-200 dark:border-slate-700 hover:border-green-500 dark:hover:border-green-500 transition-colors rounded">
                            <div class="flex items-start gap-3">
                                <div class="shrink-0 text-purple-600 dark:text-purple-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between gap-3">
                                        <p class="font-medium text-slate-900 dark:text-slate-100">{{ $message->name }}</p>
                                        <span
                                            class="text-xs text-slate-500 dark:text-slate-400">{{ $message->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-sm text-slate-600 dark:text-slate-400">{{ $message->email }}</p>
                                    <p class="text-sm text-slate-600 dark:text-slate-400 truncate mt-1">
                                        {{ Str::limit($message->message, 100) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-slate-500 dark:text-slate-400 text-center py-8">Semua pesan sudah dibaca</p>
            @endif
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            {{-- Recent Announcements --}}
            <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 dark:text-slate-100">Pengumuman Terbaru</h2>
                    <a href="{{ route('cpanel.pengumuman.index') }}"
                        class="text-sm text-green-600 dark:text-green-400 hover:underline">Lihat Semua</a>
                </div>
                @if($recent_announcements->count() > 0)
                    <div class="space-y-3">
                        @foreach($recent_announcements as $ann)
                            <a href="{{ route('cpanel.pengumuman.edit', $ann) }}"
                                class="block p-3 border border-gray-200 dark:border-slate-700 hover:border-green-500 dark:hover:border-green-500 transition-colors rounded">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-medium text-slate-900 dark:text-slate-100 truncate">{{ $ann->judul }}</h3>
                                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                                            {{ $ann->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                    <span
                                        class="px-2 py-1 text-xs font-semibold {{ $ann->status === 'publish' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 'bg-slate-100 text-slate-700 dark:bg-slate-700/30 dark:text-slate-400' }} rounded-full">
                                        {{ $ann->status === 'publish' ? 'Aktif' : 'Draft' }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-slate-500 dark:text-slate-400 text-center py-8">Belum ada pengumuman</p>
                @endif
            </div>

            {{-- Recent Agendas --}}
            <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-4 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 dark:text-slate-100">Agenda Mendatang</h2>
                    <a href="{{ route('cpanel.agenda.index') }}"
                        class="text-sm text-green-600 dark:text-green-400 hover:underline">Lihat Semua</a>
                </div>
                @if($recent_schedules->count() > 0)
                    <div class="space-y-3">
                        @foreach($recent_schedules as $agenda)
                            <a href="{{ route('cpanel.agenda.edit', $agenda) }}"
                                class="block p-3 border border-gray-200 dark:border-slate-700 hover:border-green-500 dark:hover:border-green-500 transition-colors rounded">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-medium text-slate-900 dark:text-slate-100 truncate">{{ $agenda->judul }}</h3>
                                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                                            <span class="font-medium">{{ $agenda->tanggal_mulai->format('d M Y') }}</span>
                                            @if($agenda->lokasi)
                                                • {{ $agenda->lokasi }}
                                            @endif
                                        </p>
                                    </div>
                                    <span
                                        class="px-2 py-1 text-xs font-semibold {{ $agenda->status === 'publish' ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'bg-slate-100 text-slate-700 dark:bg-slate-700/30 dark:text-slate-400' }} rounded-full">
                                        {{ $agenda->status === 'publish' ? 'Aktif' : 'Draft' }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-slate-500 dark:text-slate-400 text-center py-8">Tidak ada agenda mendatang</p>
                @endif
            </div>
        </div>
    </div>
@endsection
