@extends('admin.layouts.admin')

@section('title', 'Pesan Masuk')

@section('content')
    <div class="space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-lg sm:text-2xl font-bold text-slate-900 dark:text-slate-100">Pesan Masuk</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Daftar pesan yang dikirim melalui halaman kontak
                    website.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('cpanel.inbox.index') }}" id="inbox-reset-btn"
                    class="hidden items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-gray-500 hover:bg-gray-600 transition-colors rounded">
                    Reset
                </a>
            </div>
        </div>

        <!-- Search, Filter, and Cards Container -->
        {{-- Main Container --}}
        <div id="inbox-content-container" data-route-url="{{ route('cpanel.inbox.index') }}"
            class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 rounded shadow-sm">
            <!-- Search and Filter Bar -->
            <div class="px-4 py-2 sm:px-6 sm:py-3 border-b border-gray-200 dark:border-slate-700">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">

                    <!-- Search Input (LEFT) -->
                    <form id="search-form" action="{{ route('cpanel.inbox.index') }}" method="GET" class="flex-1">
                        @if(request('status'))
                            <input type="hidden" name="status" value="{{ request('status') }}">
                        @endif
                        @if(request('sort'))
                            <input type="hidden" name="sort" value="{{ request('sort') }}">
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
                                placeholder="Cari pesan..."
                                class="w-full pl-10 pr-4 p-2 sm:py-1.5 text-base border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:border-green-600 focus:outline-none rounded"
                                autocomplete="off">
                        </div>
                    </form>

                    <!-- Filter Dropdowns (RIGHT) -->
                    <form action="{{ route('cpanel.inbox.index') }}" method="GET"
                        class="flex items-center gap-3 w-full sm:w-auto">
                        @if(request('q'))
                            <input type="hidden" name="q" value="{{ request('q') }}">
                        @endif

                        <!-- Status -->
                        <div class="relative">
                            <select id="filter-status" name="status"
                                class="bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-4 p-2 sm:py-1.5 pr-10 text-base font-semibold focus:border-green-600 focus:outline-none appearance-none cursor-pointer min-w-40 rounded">
                                <option value="">Semua Status</option>
                                <option value="unread" {{ request('status') === 'unread' ? 'selected' : '' }}>Belum Dibaca
                                </option>
                                <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Sudah Dibaca
                                </option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Sort -->
                        <div class="relative">
                            <select id="sort-select" name="sort"
                                class="bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-4 p-2 sm:py-1.5 pr-10 text-base font-semibold focus:border-green-600 focus:outline-none appearance-none cursor-pointer min-w-40 rounded">
                                <option value="latest" {{ request('sort', 'latest') === 'latest' ? 'selected' : '' }}>Terbaru
                                </option>
                                <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>Terlama</option>
                                <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>Nama A-Z
                                </option>
                                <option value="name_desc" {{ request('sort') === 'name_desc' ? 'selected' : '' }}>Nama Z-A
                                </option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Dynamic Content Container -->
            <div id="inbox-messages-container" data-route-url="{{ route('cpanel.inbox.index') }}">
                <!-- Action Buttons (Above Table) -->
                <div class="px-6 pt-3 pb-2 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <label
                            class="flex items-center text-sm text-slate-700 dark:text-slate-300 cursor-pointer gap-2 pl-4">
                            <input type="checkbox" id="inbox-select-all"
                                class="w-4 h-4 rounded border-gray-300 dark:border-slate-600 text-green-700 dark:bg-slate-900 focus:ring-green-600">
                            <span class="font-semibold">Pilih Semua</span>
                        </label>
                        <button type="button" id="inbox-reload-btn" title="Muat ulang"
                            class="p-2 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200 rounded-full transition duration-200"
                            aria-label="Muat ulang">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                        </button>
                        <button type="button" id="inbox-toggle-read-btn" title="Toggle status baca"
                            class="p-2 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200 rounded-full transition duration-200"
                            aria-label="Toggle status baca">
                            <svg id="inbox-envelope-icon" class="w-5 h-5 transition-opacity" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </button>
                        <button type="button" id="inbox-delete-btn" title="Hapus yang dipilih"
                            class="p-2 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200 rounded-full transition duration-200"
                            aria-label="Hapus yang dipilih">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </button>
                    </div>

                    <!-- Custom Pagination -->
                    <div class="flex items-center gap-2 text-sm text-slate-500 font-medium">
                        <span>
                            {{ $messages->firstItem() ?? 0 }}-{{ $messages->lastItem() ?? 0 }} dari {{ $messages->total() }}
                        </span>
                        <div class="flex items-center gap-1 ml-2">
                            @if ($messages->onFirstPage())
                                <button disabled class="p-2 text-slate-300 dark:text-slate-600 cursor-not-allowed rounded-full">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                            @else
                                <a href="{{ $messages->previousPageUrl() }}"
                                    class="p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 dark:text-slate-400 dark:hover:text-slate-200 dark:hover:bg-slate-700 rounded-full transition duration-200">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </a>
                            @endif

                            @if ($messages->hasMorePages())
                                <a href="{{ $messages->nextPageUrl() }}"
                                    class="p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 dark:text-slate-400 dark:hover:text-slate-200 dark:hover:bg-slate-700 rounded-full transition duration-200">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @else
                                <button disabled class="p-2 text-slate-300 dark:text-slate-600 cursor-not-allowed rounded-full">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Messages Table -->
                {{-- Added min-h-125 for consistent height --}}
                <div class="px-6 pb-2 pt-0 overflow-x-auto relative min-h-125">
                    <table class="w-full table-fixed border-collapse border border-gray-200 dark:border-slate-700 text-sm"
                        id="inbox-table">
                        <tbody class="divide-y divide-gray-200 dark:divide-slate-700" id="inbox-container">
                            @forelse($messages as $message)
                                <tr class="group hover:shadow-md cursor-pointer transition-colors border-b border-gray-200 dark:border-slate-700 {{ !$message->is_read ? 'bg-white dark:bg-slate-900 font-bold' : 'bg-slate-50 dark:bg-slate-900/50 text-slate-600 dark:text-slate-400' }}"
                                    data-id="{{ $message->id }}" data-is-read="{{ $message->is_read ? '1' : '0' }}"
                                    data-link-url="{{ route('cpanel.inbox.show', $message) }}">

                                    <!-- Checkbox -->
                                    <td
                                        class="px-4 py-3 border-r border-gray-200 dark:border-slate-700 text-center w-12 js-stop-prop">
                                        <input type="checkbox"
                                            class="inbox-row-checkbox w-4 h-4 rounded border-gray-300 dark:border-slate-600 text-green-700 dark:bg-slate-900 focus:ring-green-600"
                                            value="{{ $message->id }}">
                                    </td>

                                    <!-- Sender -->
                                    <td class="px-4 py-3 border-r border-gray-200 dark:border-slate-700 text-left w-1/5">
                                        <div class="truncate">
                                            <span
                                                class="{{ !$message->is_read ? 'text-slate-900 dark:text-slate-100 font-bold' : '' }}">{{ $message->name }}</span>
                                        </div>
                                    </td>

                                    <!-- Message Preview -->
                                    <td class="px-4 py-3 border-r border-gray-200 dark:border-slate-700 text-left">
                                        <div class="truncate">
                                            <span
                                                class="{{ !$message->is_read ? 'text-slate-900 dark:text-slate-100 font-bold' : 'text-slate-500 dark:text-slate-400 font-normal' }}">
                                                {{ $message->message }}</span>
                                        </div>
                                    </td>

                                    <!-- Time / Actions -->
                                    <td class="px-4 py-3 text-right whitespace-nowrap relative w-32">
                                        <!-- Time (Visible by default) -->
                                        <span
                                            class="group-hover:hidden text-sm {{ !$message->is_read ? 'text-slate-700 dark:text-slate-200 font-bold' : 'text-slate-500 dark:text-slate-400' }}">
                                            @if($message->created_at->isToday())
                                                {{ $message->created_at->format('H:i') }}
                                            @else
                                                {{ $message->created_at->translatedFormat('d M') }}
                                            @endif
                                        </span>

                                        <!-- Actions (Visible on hover) -->
                                        <div
                                            class="hidden group-hover:flex absolute right-4 top-1/2 -translate-y-1/2 items-center gap-2 js-stop-prop">
                                            <button type="button" data-delete-trigger
                                                data-action="{{ route('cpanel.inbox.destroy', $message->id) }}"
                                                data-title="{{ $message->name }}"
                                                data-message="Apakah Anda yakin ingin menghapus pesan dari {{ $message->name }}?"
                                                class="text-slate-400 hover:text-green-600 transition" title="Hapus">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="text-slate-400 hover:text-green-600 transition toggle-read-btn"
                                                data-id="{{ $message->id }}"
                                                title="{{ $message->is_read ? 'Tandai Belum Dibaca' : 'Tandai Dibaca' }}">
                                                @if($message->is_read)
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                                                    </svg>
                                                @else
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"
                                        class="px-6 py-8 text-center text-slate-500 dark:text-slate-400 border border-gray-300 dark:border-slate-600 h-112.5">
                                        <div class="flex flex-col items-center justify-center h-full gap-3">
                                            @if(request('q') || request('status'))
                                                <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                                <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">Pesan Tidak
                                                    Ditemukan</h3>
                                                <p class="text-sm text-slate-500 dark:text-slate-400">
                                                    @if(request('q'))
                                                        Tidak ada pesan yang sesuai dengan pencarian
                                                        "<strong>{{ request('q') }}</strong>"
                                                    @else
                                                        Data tidak tersedia untuk kriteria yang dipilih.
                                                    @endif
                                                </p>
                                            @else
                                                <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">Belum Ada Pesan
                                                </h3>
                                                <p class="text-sm text-slate-500 dark:text-slate-400">Belum ada pesan masuk dari
                                                    formulir kontak.</p>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Footer Pagination Removed (Moved to Header) --}}
            </div>
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    <div id="delete-modal" class="fixed inset-0 bg-black/30 dark:bg-black/50 z-50 hidden items-center justify-center">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-xl max-w-md w-full mx-4">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-2">Konfirmasi Hapus</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400 mb-6">
                    Apakah Anda yakin ingin menghapus <strong id="delete-item-count"></strong> pesan terpilih? Tindakan ini
                    tidak dapat dibatalkan.
                </p>
                <div class="flex items-center justify-end gap-3">
                    <button type="button" id="delete-modal-close-btn"
                        class="px-4 py-1.5 text-base font-semibold text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 transition-colors min-w-25 rounded shadow-sm">
                        Batal
                    </button>
                    <button type="button" id="confirm-delete-btn"
                        class="px-4 py-1.5 text-base font-semibold text-white bg-red-600 hover:bg-red-700 transition-colors min-w-25 rounded">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
