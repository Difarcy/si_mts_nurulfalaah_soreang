@extends('admin.layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
    <div class="space-y-4">
        {{-- Header Page --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Detail Pesan</h1>
                <p class="text-base text-slate-500 dark:text-slate-400 mt-1">Detail pesan dari {{ $message->name }}</p>
            </div>
            <a href="{{ route('cpanel.inbox.index') }}"
                class="inline-flex items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 transition-colors rounded shadow-sm">
                <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                <span class="hidden sm:inline">Kembali</span>
            </a>
        </div>

        {{-- Content Card --}}
        <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded shadow-sm">
            {{-- Sender Info Header --}}
            <div class="p-6 border-b border-gray-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div class="flex items-center gap-4">
                        {{-- Avatar --}}
                        <div
                            class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 flex items-center justify-center text-xl font-bold border border-green-200 dark:border-green-800">
                            {{ strtoupper(substr($message->name ?? 'A', 0, 1)) }}
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-slate-100">{{ $message->name }}</h3>
                            <div
                                class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-1 text-base text-slate-600 dark:text-slate-400">
                                {{-- Email with Copy --}}
                                <button class="js-copy-clipboard flex items-center gap-1.5 hover:text-green-600 transition group"
                                    data-copy-text="{{ $message->email }}"
                                    title="Klik untuk menyalin email">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ $message->email }}</span>
                                    <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </button>

                                @if($message->phone)
                                    <span class="hidden sm:inline text-slate-300 dark:text-slate-600">|</span>
                                    {{-- Phone with Copy --}}
                                    <button class="js-copy-clipboard flex items-center gap-1.5 hover:text-green-600 transition group"
                                        data-copy-text="{{ $message->phone }}"
                                        title="Klik untuk menyalin nomor">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        <span>{{ $message->phone }}</span>
                                        <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Date --}}
                    <div class="text-right text-base text-slate-500 dark:text-slate-400">
                        <div class="font-medium text-slate-900 dark:text-slate-200">
                            {{ $message->created_at->format('d F Y') }}</div>
                        <div>{{ $message->created_at->format('H:i') }} WIB</div>
                    </div>
                </div>
            </div>
            {{-- Message Body --}}
            <div class="p-6 bg-white dark:bg-slate-800 min-h-75">
                {{-- Using trim() to remove any DB-stored whitespace and ensuring no blade indentation --}}
                {{-- Removed prose class to avoid unwanted default styling margins --}}
                <div
                    class="max-w-none text-left text-slate-800 dark:text-slate-200 leading-relaxed text-base">
                    {{ trim($message->message) }}</div>
            </div>

            {{-- Footer Actions --}}
            <div
                class="bg-gray-50 dark:bg-slate-700/50 px-6 py-4 border-t border-gray-200 dark:border-slate-700 flex justify-end">
                <button type="button"
                    data-delete-trigger
                    data-action="{{ route('cpanel.inbox.destroy', $message) }}"
                    data-title="{{ $message->name }}"
                    data-message="Apakah Anda yakin ingin menghapus pesan dari {{ $message->name }}?"
                    class="inline-flex items-center gap-2 px-4 py-1.5 text-base font-semibold text-white bg-red-600 hover:bg-red-700 transition-colors rounded shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus Pesan
                </button>
            </div>
        </div>
    </div>



    {{-- Toast Notification --}}
    <div id="toast-notification"
        class="fixed bottom-10 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-4 py-2 rounded-lg shadow-lg transform translate-y-20 opacity-0 transition-all duration-300 z-50">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span id="toast-message">Teks disalin!</span>
        </div>
    </div>


@endsection
