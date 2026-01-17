@extends('web.layouts.website')

@section('title', $schedule->judul)

@section('content')
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8 sm:py-12">
        <x-breadcrumb :items="[
            ['label' => 'Informasi', 'url' => null],
            ['label' => 'Agenda', 'url' => route('informasi.agenda')],
            ['label' => str()->limit($schedule->judul, 40)]
        ]" />

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8 mt-6">
            <!-- Main Content (2/3 width) -->
            <div class="lg:col-span-2">
                <article>
                    <div class="space-y-4">
                        <h1 class="text-xl sm:text-[35px] font-bold text-slate-900 dark:text-slate-100 leading-tight">
                            {{ $schedule->judul }}
                        </h1>

                        <div
                            class="flex flex-wrap items-center justify-between gap-3 text-xs text-black dark:text-slate-400 uppercase tracking-wide">
                            <div class="flex flex-wrap items-center gap-3">
                                <span>Agenda |
                                    {{ ($schedule->published_at ?? $schedule->created_at)->translatedFormat('d F Y') }} |
                                    {{ ($schedule->published_at ?? $schedule->created_at)->format('H:i') }}</span>
                                <span class="normal-case">Oleh <strong
                                        class="font-bold text-black dark:text-white">{{ $schedule->author_name ?? 'Admin' }}</strong></span>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-black dark:text-slate-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                    <span class="text-black dark:text-slate-400">{{ $schedule->views_count ?? 0 }}</span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="grid grid-cols-1 md:grid-cols-3 gap-8 text-black dark:text-slate-400 border-b border-gray-200 dark:border-slate-700 pb-8 mb-8">
                            {{-- Tanggal --}}
                            <div class="flex flex-col items-center text-center">
                                <svg class="w-8 h-8 text-green-700 dark:text-green-500 mb-3" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span
                                    class="font-bold text-xl text-slate-900 dark:text-slate-100 block mb-1">Tanggal:</span>
                                <span class="text-base leading-relaxed">
                                    {{ $schedule->tanggal_mulai->translatedFormat('d F Y') }}
                                    @if($schedule->tanggal_selesai && $schedule->tanggal_selesai != $schedule->tanggal_mulai)
                                        - {{ $schedule->tanggal_selesai->translatedFormat('d F Y') }}
                                    @endif
                                </span>
                            </div>

                            {{-- Waktu --}}
                            @if($schedule->waktu_mulai)
                                <div class="flex flex-col items-center text-center">
                                    <svg class="w-8 h-8 text-green-700 dark:text-green-500 mb-3" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="font-bold text-xl text-slate-900 dark:text-slate-100 block mb-1">Waktu:</span>
                                    <span class="text-base leading-relaxed">
                                        @php
                                            $start = \Carbon\Carbon::parse($schedule->waktu_mulai)->format('H.i');
                                            $endTime = $schedule->waktu_selesai ? \Carbon\Carbon::parse($schedule->waktu_selesai)->format('H:i') : null;
                                            $end = ($endTime && $endTime !== '00:00') ? str_replace(':', '.', $endTime) : 'Selesai';
                                            $hasEndTime = $endTime && $endTime !== '00:00';
                                        @endphp
                                        {{ $start }} {{ $hasEndTime ? '– ' . $end . ' WIB' : 'WIB – Selesai' }}
                                    </span>
                                </div>
                            @endif

                            {{-- Lokasi --}}
                            @if($schedule->lokasi)
                                <div class="flex flex-col items-center text-center">
                                    <svg class="w-8 h-8 text-green-700 dark:text-green-500 mb-3" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="font-bold text-xl text-slate-900 dark:text-slate-100 block mb-1">Lokasi:</span>
                                    <span class="text-base leading-relaxed">{{ $schedule->lokasi }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div
                            class="prose prose-base max-w-none prose-slate dark:prose-invert prose-p:text-black dark:prose-p:text-slate-100 prose-headings:font-semibold prose-headings:tracking-tight prose-h1:text-xl sm:prose-h1:text-[35px] prose-h2:text-lg sm:prose-h2:text-2xl prose-h3:text-base sm:prose-h3:text-xl prose-a:text-green-700 dark:prose-a:text-green-400 prose-a:no-underline hover:prose-a:underline prose-img:rounded-lg">
                            {!! $schedule->deskripsi !!}
                        </div>

                        <!-- Share Section -->
                        <div class="pt-4 mt-8 border-t border-gray-200 dark:border-slate-700">
                            <p class="text-base font-semibold text-slate-700 dark:text-slate-300 mb-2">Bagikan Agenda ini:
                            </p>
                            <div class="flex items-center gap-3">
                                @php
                                    $shareUrl = url()->current();
                                    $shareText = $schedule->judul;
                                @endphp
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-blue-600 text-white hover:bg-blue-700 transition-colors duration-300 rounded"
                                    aria-label="Bagikan di Facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                                    </svg>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode($shareUrl) }}&text={{ urlencode($shareText) }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-black text-white hover:bg-gray-800 transition-colors duration-300 rounded"
                                    aria-label="Bagikan di Twitter">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($shareText . ' ' . $shareUrl) }}" target="_blank"
                                    rel="noopener noreferrer"
                                    class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-green-600 text-white hover:bg-green-700 transition-colors duration-300 rounded"
                                    aria-label="Bagikan di WhatsApp">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar (1/3 width) -->
            <div class="lg:col-span-1">
                @include('web.components.post-sidebar', [
                    'articles' => $latestNews ?? [],
                    'articleTitle' => 'Berita Terbaru',
                    'announcements' => [],
                    'agenda' => $agendaItems ?? [],
                    'showSocialMedia' => false,
                    'articleFirst' => true,
                    'schoolProfile' => null
                ])
                                                </div>
@endsection
