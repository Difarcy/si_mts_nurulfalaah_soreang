<header
    class="sticky top-0 z-40 bg-white dark:bg-slate-800 border-b border-gray-200 dark:border-slate-700 px-3 sm:px-6 h-18 overflow-hidden">
    <div class="h-full flex flex-nowrap items-center justify-between gap-2">
        <div class="flex items-center gap-2 min-w-0">
            <button type="button" id="sidebar-toggle-btn"
                class="inline-flex items-center justify-center p-2 text-slate-900 dark:text-white shrink-0 lg:hidden focus:outline-none"
                aria-label="Buka menu sidebar" aria-controls="admin-sidebar" aria-expanded="false">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
            <div class="min-w-0 hidden sm:block">
                <p class="text-base font-bold tracking-tight text-slate-900 dark:text-white truncate">
                    @yield('title', 'Control Panel')
                </p>
            </div>
        </div>

        <div
            class="flex flex-nowrap items-center justify-end gap-2 overflow-x-auto whitespace-nowrap [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
            <a href="{{ route('cpanel.help.index') }}"
                class="inline-flex items-center justify-center p-2 sm:px-3 sm:py-1.5 text-base font-semibold text-white bg-slate-500 hover:bg-slate-600 transition-colors rounded shadow-sm">
                <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <span class="hidden sm:inline">Bantuan</span>
            </a>
            <a href="{{ route('cpanel.change-username') }}"
                class="inline-flex items-center justify-center p-2 sm:px-3 sm:py-1.5 text-base font-semibold text-white bg-green-600 hover:bg-green-700 transition-colors rounded shadow-sm">
                <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="hidden sm:inline">Ubah Username</span>
            </a>
            <a href="{{ route('cpanel.change-password') }}"
                class="inline-flex items-center justify-center p-2 sm:px-3 sm:py-1.5 text-base font-semibold text-white bg-green-600 hover:bg-green-700 transition-colors rounded shadow-sm">
                <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                    </path>
                </svg>
                <span class="hidden sm:inline">Ubah Password</span>
            </a>
            <button type="button" id="btn-logout-trigger"
                class="inline-flex items-center justify-center p-2 sm:px-3 sm:py-1.5 text-base font-semibold text-white bg-red-600 hover:bg-red-700 transition-colors rounded">
                <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                <span class="hidden sm:inline">Keluar</span>
            </button>
            <form action="{{ route('cpanel.logout') }}" method="POST" id="logout-form" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</header>
