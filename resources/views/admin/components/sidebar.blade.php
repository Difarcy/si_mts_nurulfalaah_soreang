@php
    $currentRoute = request()->route()->getName();
    $isActive = function ($route) use ($currentRoute) {
        return str_starts_with($currentRoute, $route);
    };

    // Check which submenus should be open
    $isKontenOpen = $isActive('cpanel.profil-sekolah') || $isActive('cpanel.publikasi') || $isActive('cpanel.berita') || $isActive('cpanel.artikel') || $isActive('cpanel.pengumuman') || $isActive('cpanel.agenda') || $isActive('cpanel.prestasi-siswa');
    $isMediaOpen = $isActive('cpanel.foto-kegiatan') || $isActive('cpanel.activity-videos');
    $isInteraksiOpen = $isActive('cpanel.comments') || $isActive('cpanel.inbox');
    $isPengaturanOpen = $isActive('cpanel.visual-identity') || $isActive('cpanel.site-information') || $isActive('cpanel.settings.spmb');

    // Get unread comments count
    $unreadCount = \App\Models\Comment::query()->where('is_read', '=', false, 'and')->count();
    // Get unread messages count
    $unreadMessagesCount = \App\Models\InboxMessage::query()->where('is_read', '=', false, 'and')->count();
@endphp

<aside id="admin-sidebar"
    class="fixed left-0 top-0 z-50 h-screen w-72 bg-white dark:bg-slate-800 border-r border-gray-200 dark:border-slate-700 overflow-hidden transform -translate-x-full transition-transform duration-200 flex flex-col lg:translate-x-0 lg:w-64">
    <div
        class="h-18 px-4 border-b border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800 flex items-center justify-between shrink-0">
        <div class="flex items-center gap-2 select-none">
            <svg class="w-6 h-6 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                </path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span class="text-xl font-bold text-slate-900 dark:text-white">Control Panel</span>
        </div>
        <!-- Tombol Close (Mobile only) -->
        <button id="close-sidebar-btn" type="button"
            class="lg:hidden p-2 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <div id="admin-sidebar-menu-container"
        class="flex-1 overflow-y-auto [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
        <nav class="py-4 space-y-1 text-base font-semibold select-none">
            <!-- Dashboard -->
            <a href="{{ route('cpanel.dashboard') }}"
                class="flex items-center gap-3 px-4 py-2 w-full transition-colors rounded {{ request()->routeIs('cpanel.dashboard') ? 'bg-green-600 text-white font-semibold dark:bg-white/10 dark:text-white' : 'text-slate-700 hover:bg-green-600 hover:text-white dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span>Dashboard</span>
            </a>

            <!-- Lihat Situs -->
            <a href="{{ route('web.home') }}" target="_blank"
                class="flex items-center gap-3 px-4 py-2 w-full transition-colors rounded text-slate-700 hover:bg-green-600 hover:text-white dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                <span>Lihat Situs</span>
            </a>

            <!-- KONTEN WEBSITE -->
            <div class="space-y-1">
                <button type="button"
                    class="sidebar-menu-toggle w-full flex items-center justify-between gap-2 px-4 py-2 transition-colors rounded {{ $isKontenOpen ? 'bg-green-600 text-white font-semibold dark:bg-white/10 dark:text-white' : 'text-slate-700 hover:bg-green-600 hover:text-white dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white' }}"
                    data-target="konten-submenu">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                        <span>Konten Website</span>
                    </div>
                    <svg class="w-5 h-5 transition-transform duration-200 {{ $isKontenOpen ? 'rotate-90' : '' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div id="konten-submenu" class="space-y-0 pointer-events-auto {{ $isKontenOpen ? '' : 'hidden' }}">
                    <a href="{{ route('cpanel.profil-sekolah.index') }}"
                        class="block pl-12 pr-4 py-1.5 text-base font-medium transition-colors cursor-pointer select-none pointer-events-auto {{ request()->routeIs('cpanel.profil-sekolah.*') ? 'text-slate-950 dark:text-white dark:drop-shadow-md' : 'text-slate-500 hover:text-slate-900 dark:text-slate-500 dark:hover:text-white dark:hover:drop-shadow-md' }}">
                        <span>Profil Sekolah</span>
                    </a>
                    <a href="{{ route('cpanel.publikasi.index') }}"
                        class="block pl-12 pr-4 py-1.5 text-base font-medium transition-colors cursor-pointer select-none pointer-events-auto {{ request()->routeIs('cpanel.publikasi.*') || request()->routeIs('cpanel.berita.*') || request()->routeIs('cpanel.artikel.*') ? 'text-slate-950 dark:text-white dark:drop-shadow-md' : 'text-slate-500 hover:text-slate-900 dark:text-slate-500 dark:hover:text-white dark:hover:drop-shadow-md' }}">
                        <span>Publikasi</span>
                    </a>
                    <a href="{{ route('cpanel.pengumuman.index') }}"
                        class="block pl-12 pr-4 py-1.5 text-base font-medium transition-colors cursor-pointer select-none pointer-events-auto {{ request()->routeIs('cpanel.pengumuman.*') ? 'text-slate-950 dark:text-white dark:drop-shadow-md' : 'text-slate-500 hover:text-slate-900 dark:text-slate-500 dark:hover:text-white dark:hover:drop-shadow-md' }}">
                        <span>Pengumuman</span>
                    </a>
                    <a href="{{ route('cpanel.agenda.index') }}"
                        class="block pl-12 pr-4 py-1.5 text-base font-medium transition-colors cursor-pointer select-none pointer-events-auto {{ request()->routeIs('cpanel.agenda.*') ? 'text-slate-950 dark:text-white dark:drop-shadow-md' : 'text-slate-500 hover:text-slate-900 dark:text-slate-500 dark:hover:text-white dark:hover:drop-shadow-md' }}">
                        <span>Agenda</span>
                    </a>
                    <a href="{{ route('cpanel.prestasi-siswa.index') }}"
                        class="block pl-12 pr-4 py-1.5 text-base font-medium transition-colors cursor-pointer select-none pointer-events-auto {{ request()->routeIs('cpanel.prestasi-siswa.*') ? 'text-slate-950 dark:text-white dark:drop-shadow-md' : 'text-slate-500 hover:text-slate-900 dark:text-slate-500 dark:hover:text-white dark:hover:drop-shadow-md' }}">
                        <span>Prestasi Siswa</span>
                    </a>
                </div>
            </div>

            <!-- MEDIA -->
            <div class="space-y-1">
                <button type="button"
                    class="sidebar-menu-toggle w-full flex items-center justify-between gap-2 px-4 py-2 transition-colors rounded {{ $isMediaOpen ? 'bg-green-600 text-white dark:bg-white/10 dark:text-white' : 'text-slate-700 hover:bg-green-600 hover:text-white dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white' }}"
                    data-target="media-submenu">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span>Media</span>
                    </div>
                    <svg class="w-5 h-5 transition-transform duration-200 {{ $isMediaOpen ? 'rotate-90' : '' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div id="media-submenu" class="space-y-0 pointer-events-auto {{ $isMediaOpen ? '' : 'hidden' }}">
                    <a href="{{ route('cpanel.foto-kegiatan.index') }}"
                        class="block pl-12 pr-4 py-1.5 text-base font-medium transition-colors cursor-pointer select-none pointer-events-auto {{ request()->routeIs('cpanel.foto-kegiatan.*') ? 'text-slate-950 dark:text-white dark:drop-shadow-md' : 'text-slate-500 hover:text-slate-900 dark:text-slate-500 dark:hover:text-white dark:hover:drop-shadow-md' }}">
                        <span>Foto Kegiatan</span>
                    </a>
                    <a href="{{ route('cpanel.activity-videos.index') }}"
                        class="block pl-12 pr-4 py-1.5 text-base font-medium transition-colors cursor-pointer select-none pointer-events-auto {{ request()->routeIs('cpanel.activity-videos.*') ? 'text-slate-950 dark:text-white dark:drop-shadow-md' : 'text-slate-500 hover:text-slate-900 dark:text-slate-500 dark:hover:text-white dark:hover:drop-shadow-md' }}">
                        <span>Video Kegiatan</span>
                    </a>
                </div>
            </div>

            <!-- INTERAKSI -->
            <div class="space-y-1">
                <button type="button"
                    class="sidebar-menu-toggle w-full flex items-center justify-between gap-2 px-4 py-2 transition-colors rounded {{ $isInteraksiOpen ? 'bg-green-600 text-white dark:bg-white/10 dark:text-white' : 'text-slate-700 hover:bg-green-600 hover:text-white dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white' }}"
                    data-target="interaksi-submenu">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        <span>Interaksi</span>
                    </div>
                    <svg class="w-5 h-5 transition-transform duration-200 {{ $isInteraksiOpen ? 'rotate-90' : '' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div id="interaksi-submenu"
                    class="space-y-0 pointer-events-auto {{ $isInteraksiOpen ? '' : 'hidden' }}">
                    <a href="{{ route('cpanel.inbox.index') }}" id="sidebar-inbox-link"
                        class="flex items-center justify-between gap-2 pl-12 pr-4 py-1.5 text-base font-medium transition-colors cursor-pointer select-none pointer-events-auto {{ request()->routeIs('cpanel.inbox.*') ? 'text-slate-950 dark:text-white dark:drop-shadow-md' : 'text-slate-500 hover:text-slate-900 dark:text-slate-500 dark:hover:text-white dark:hover:drop-shadow-md' }}">
                        <span>Pesan</span>
                        @if($unreadMessagesCount > 0)
                            <span id="sidebar-unread-messages-badge"
                                class="inline-flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-bold text-white bg-red-600 rounded-full"
                                title="{{ $unreadMessagesCount }} pesan belum dibaca">
                                {{ $unreadMessagesCount > 99 ? '99+' : $unreadMessagesCount }}
                            </span>
                        @endif
                    </a>
                    <a href="{{ route('cpanel.comments.index') }}" id="sidebar-comments-link"
                        class="flex items-center justify-between gap-2 pl-12 pr-4 py-1.5 text-base font-medium transition-colors cursor-pointer select-none pointer-events-auto {{ request()->routeIs('cpanel.comments.*') ? 'text-slate-950 dark:text-white dark:drop-shadow-md' : 'text-slate-500 hover:text-slate-900 dark:text-slate-500 dark:hover:text-white dark:hover:drop-shadow-md' }}">
                        <span>Komentar</span>
                        @if($unreadCount > 0)
                            <span id="sidebar-unread-comments-badge"
                                class="inline-flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-bold text-white bg-red-600 rounded-full"
                                title="{{ $unreadCount }} komentar belum dibaca">
                                {{ $unreadCount > 99 ? '99+' : $unreadCount }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>

            <!-- PENGATURAN -->
            <div class="space-y-1">
                <button type="button"
                    class="sidebar-menu-toggle w-full flex items-center justify-between gap-2 px-4 py-2 transition-colors rounded {{ $isPengaturanOpen ? 'bg-green-600 text-white dark:bg-white/10 dark:text-white' : 'text-slate-700 hover:bg-green-600 hover:text-white dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white' }}"
                    data-target="pengaturan-submenu">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Pengaturan</span>
                    </div>
                    <svg class="w-5 h-5 transition-transform duration-200 {{ $isPengaturanOpen ? 'rotate-90' : '' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <div id="pengaturan-submenu"
                    class="space-y-0 pointer-events-auto {{ $isPengaturanOpen ? '' : 'hidden' }}">
                    <a href="{{ route('cpanel.visual-identity.index') }}"
                        title="Kelola banner, logo, dan Informasi Banner secara terpusat"
                        class="block pl-12 pr-4 py-1.5 text-base font-medium transition-colors cursor-pointer select-none pointer-events-auto {{ request()->routeIs('cpanel.visual-identity.*') ? 'text-slate-950 dark:text-white dark:drop-shadow-md' : 'text-slate-500 hover:text-slate-900 dark:text-slate-500 dark:hover:text-white dark:hover:drop-shadow-md' }}">
                        <span>Identitas Visual</span>
                    </a>
                    <a href="{{ route('cpanel.site-information.index') }}"
                        class="block pl-12 pr-4 py-1.5 text-base font-medium transition-colors cursor-pointer select-none pointer-events-auto {{ request()->routeIs('cpanel.site-information.*') ? 'text-slate-950 dark:text-white dark:drop-shadow-md' : 'text-slate-500 hover:text-slate-900 dark:text-slate-500 dark:hover:text-white dark:hover:drop-shadow-md' }}">
                        <span>Informasi Situs</span>
                    </a>
                    <a href="{{ route('cpanel.settings.spmb.index') }}"
                        class="block pl-12 pr-4 py-1.5 text-base font-medium transition-colors cursor-pointer select-none pointer-events-auto {{ request()->routeIs('cpanel.settings.spmb.*') ? 'text-slate-950 dark:text-white dark:drop-shadow-md' : 'text-slate-500 hover:text-slate-900 dark:text-slate-500 dark:hover:text-white dark:hover:drop-shadow-md' }}">
                        <span>SPMB</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</aside>

<!-- Sidebar Overlay (untuk mobile) -->
<div id="sidebar-overlay" class="hidden fixed inset-0 bg-black/30 dark:bg-black/50 z-40 lg:hidden"></div>