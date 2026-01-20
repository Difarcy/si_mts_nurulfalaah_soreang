{{-- Mobile Sidebar Menu --}}
<div id="mobile-sidebar" class="fixed inset-0 z-50 lg:hidden hidden">
    {{-- Overlay - Fully Transparent (no dark background) --}}
    <div id="sidebar-overlay" class="absolute inset-0 bg-transparent transition-opacity"></div>

    {{-- Sidebar --}}
    <div id="sidebar-content"
        class="absolute top-0 left-0 h-full w-70 max-w-[75vw] bg-white/95 dark:bg-slate-800/95 backdrop-blur-md shadow-2xl transform -translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto scrollbar-hide">
        {{-- Header Sidebar --}}
        <div class="flex items-center justify-between p-3 sm:p-4 border-b border-gray-200 dark:border-slate-700">
            <h2 class="text-base sm:text-lg font-bold text-gray-900 dark:text-slate-100">Menu</h2>
            <button id="close-sidebar"
                class="p-2 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-gray-600 dark:text-slate-300"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Search Bar --}}
        <div class="p-3 sm:p-4 border-b border-gray-200 dark:border-slate-700">
            <form action="{{ route('search.global') }}" method="GET" class="relative">
                <input type="text" name="q" placeholder="Cari..."
                    class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white dark:bg-slate-900 text-gray-900 dark:text-slate-100 placeholder-gray-400 dark:placeholder-slate-500">
                <button type="submit"
                    class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-green-700 dark:hover:text-green-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </div>

        {{-- Menu Items --}}
        <nav class="p-3 sm:p-4">
            <ul class="space-y-1">
                {{-- Beranda --}}
                <li>
                    <a href="{{ route('web.home') }}"
                        class="flex items-center px-3 py-2 sm:px-4 sm:py-2.5 text-sm sm:text-base text-gray-700 dark:text-slate-300 hover:bg-green-50 dark:hover:bg-green-900/20 hover:text-green-700 dark:hover:text-green-400 rounded-lg transition-colors {{ request()->routeIs('web.home') ? 'bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400 font-semibold' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Beranda
                    </a>
                </li>

                {{-- Profil with Submenu --}}
                <li>
                    <button
                        class="sidebar-dropdown-toggle flex items-center justify-between w-full px-3 py-2 sm:px-4 sm:py-2.5 text-sm sm:text-base text-gray-700 dark:text-slate-300 hover:bg-green-50 dark:hover:bg-green-900/20 hover:text-green-700 dark:hover:text-green-400 rounded-lg transition-colors text-left">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Profil
                        </div>
                        <svg class="sidebar-dropdown-icon h-5 w-5 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul class="sidebar-dropdown-menu hidden ml-8 mt-1 space-y-1">
                        <li><a href="{{ route('profil') }}"
                                class="block px-4 py-2 text-sm text-gray-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400">Tentang
                                Sekolah</a></li>
                        <li><a href="{{ route('profil.visi-misi') }}"
                                class="block px-4 py-2 text-sm text-gray-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400">Visi,
                                Misi, Tujuan</a></li>
                        <li><a href="{{ route('profil.kepala-madrasah') }}"
                                class="block px-4 py-2 text-sm text-gray-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400">Kepala
                                Madrasah</a></li>
                        <li><a href="{{ route('profil.struktur-organisasi') }}"
                                class="block px-4 py-2 text-sm text-gray-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400">Struktur
                                Organisasi</a></li>
                        <li><a href="{{ route('profil.prestasi') }}"
                                class="block px-4 py-2 text-sm text-gray-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400">Prestasi
                                Siswa</a></li>
                    </ul>
                </li>

                {{-- Informasi with Submenu --}}
                <li>
                    <button
                        class="sidebar-dropdown-toggle flex items-center justify-between w-full px-3 py-2 sm:px-4 sm:py-2.5 text-sm sm:text-base text-gray-700 dark:text-slate-300 hover:bg-green-50 dark:hover:bg-green-900/20 hover:text-green-700 dark:hover:text-green-400 rounded-lg transition-colors text-left">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Informasi
                        </div>
                        <svg class="sidebar-dropdown-icon h-5 w-5 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul class="sidebar-dropdown-menu hidden ml-8 mt-1 space-y-1">
                        <li><a href="{{ route('informasi.berita') }}"
                                class="block px-4 py-2 text-sm text-gray-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400">Berita</a>
                        </li>
                        <li><a href="{{ route('informasi.artikel') }}"
                                class="block px-4 py-2 text-sm text-gray-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400">Artikel</a>
                        </li>
                        <li><a href="{{ route('informasi.pengumuman') }}"
                                class="block px-4 py-2 text-sm text-gray-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400">Pengumuman</a>
                        </li>
                        <li><a href="{{ route('informasi.agenda') }}"
                                class="block px-4 py-2 text-sm text-gray-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400">Agenda</a>
                        </li>
                    </ul>
                </li>

                {{-- SPMB (Changed from PPDB) --}}
                <li>
                    <a href="{{ route('spmb.index') }}"
                        class="flex items-center px-3 py-2 sm:px-4 sm:py-2.5 text-sm sm:text-base text-gray-700 dark:text-slate-300 hover:bg-green-50 dark:hover:bg-green-900/20 hover:text-green-700 dark:hover:text-green-400 rounded-lg transition-colors {{ request()->routeIs('spmb.*') ? 'bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400 font-semibold' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                        SPMB
                    </a>
                </li>

                {{-- Portal with Submenu (RDM & EMIS) --}}
                <li>
                    <button
                        class="sidebar-dropdown-toggle flex items-center justify-between w-full px-3 py-2 sm:px-4 sm:py-2.5 text-sm sm:text-base text-gray-700 dark:text-slate-300 hover:bg-green-50 dark:hover:bg-green-900/20 hover:text-green-700 dark:hover:text-green-400 rounded-lg transition-colors text-left">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Portal
                        </div>
                        <svg class="sidebar-dropdown-icon h-5 w-5 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul class="sidebar-dropdown-menu hidden ml-8 mt-1 space-y-1">
                        <li><a href="https://rdm.hdmadrasah.id/login/auth" target="_blank"
                                class="block px-4 py-2 text-sm text-gray-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400">RDM
                                (Rapor Digital)</a></li>
                        <li><a href="https://emis.kemenag.go.id/login" target="_blank"
                                class="block px-4 py-2 text-sm text-gray-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400">EMIS
                                Kewenangan</a></li>
                    </ul>
                </li>

                {{-- Galeri with Submenu --}}
                <li>
                    <button
                        class="sidebar-dropdown-toggle flex items-center justify-between w-full px-3 py-2 sm:px-4 sm:py-2.5 text-sm sm:text-base text-gray-700 dark:text-slate-300 hover:bg-green-50 dark:hover:bg-green-900/20 hover:text-green-700 dark:hover:text-green-400 rounded-lg transition-colors text-left">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Galeri
                        </div>
                        <svg class="sidebar-dropdown-icon h-5 w-5 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul class="sidebar-dropdown-menu hidden ml-8 mt-1 space-y-1">
                        <li><a href="{{ route('galeri.foto-kegiatan') }}"
                                class="block px-4 py-2 text-sm text-gray-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400">Foto
                                Kegiatan</a></li>
                        <li><a href="{{ route('galeri.video-kegiatan') }}"
                                class="block px-4 py-2 text-sm text-gray-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400">Video
                                Kegiatan</a></li>
                    </ul>
                </li>

                {{-- Contact --}}
                <li>
                    <a href="{{ route('contact') }}"
                        class="flex items-center px-3 py-2 sm:px-4 sm:py-2.5 text-sm sm:text-base text-gray-700 dark:text-slate-300 hover:bg-green-50 dark:hover:bg-green-900/20 hover:text-green-700 dark:hover:text-green-400 rounded-lg transition-colors {{ request()->routeIs('contact') ? 'bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400 font-semibold' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Kontak
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mobileSidebar = document.getElementById('mobile-sidebar');
        const sidebarContent = document.getElementById('sidebar-content');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const openButton = document.getElementById('open-sidebar');
        const closeButton = document.getElementById('close-sidebar');
        const dropdownToggles = document.querySelectorAll('.sidebar-dropdown-toggle');

        // Open sidebar
        if (openButton) {
            openButton.addEventListener('click', function () {
                mobileSidebar.classList.remove('hidden');
                setTimeout(() => {
                    sidebarContent.classList.remove('-translate-x-full');
                }, 10);
                document.body.style.overflow = 'hidden';
            });
        }

        // Close sidebar
        function closeSidebar() {
            sidebarContent.classList.add('-translate-x-full');
            setTimeout(() => {
                mobileSidebar.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }

        if (closeButton) {
            closeButton.addEventListener('click', closeSidebar);
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', closeSidebar);
        }

        // Dropdown toggles
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function () {
                const menu = this.nextElementSibling;
                const icon = this.querySelector('.sidebar-dropdown-icon');

                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden');
                    icon.style.transform = 'rotate(180deg)';
                } else {
                    menu.classList.add('hidden');
                    icon.style.transform = 'rotate(0deg)';
                }
            });
        });

        // Close sidebar when link is clicked
        const sidebarLinks = mobileSidebar.querySelectorAll('a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', closeSidebar);
        });
    });
</script>