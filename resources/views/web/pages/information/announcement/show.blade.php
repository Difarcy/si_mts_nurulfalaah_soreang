@extends('web.layouts.website')

@section('title', $announcement->judul)

@section('content')
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8 sm:py-12">
        <x-breadcrumb :items="[
            ['label' => 'Informasi', 'url' => null],
            ['label' => 'Pengumuman', 'url' => route('informasi.pengumuman')],
            ['label' => str()->limit($announcement->judul, 40)]
        ]" />

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8 mt-6">
            <!-- Main Content (2/3 width) -->
            <div class="lg:col-span-2">
                <article>
                    <div class="space-y-4">
                        <h1 class="text-xl sm:text-[35px] font-bold text-slate-900 dark:text-slate-100 leading-tight">
                            {{ $announcement->judul }}
                        </h1>

                        <div
                            class="flex flex-wrap items-center justify-between gap-3 text-xs text-black dark:text-slate-400 uppercase tracking-wide">
                            <div class="flex flex-wrap items-center gap-3">
                                <span>Pengumuman |
                                    {{ $announcement->tanggal ? $announcement->tanggal->translatedFormat('d F Y') : '-' }} |
                                    {{ $announcement->tanggal ? $announcement->tanggal->format('H:i') : '-' }}</span>
                                <span class="normal-case">Oleh <strong
                                        class="font-bold text-black dark:text-white">{{ $announcement->author_name }}</strong></span>
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
                                    <span
                                        class="text-black dark:text-slate-400">{{ $announcement->views_count ?? 0 }}</span>
                                </div>
                            </div>
                        </div>

                        @php
                            // Use InfoText for Top Bar settings (social links)
                            $facebookUrl = \App\Models\InfoText::where('key', '=', 'top_bar_facebook_url', 'and')->value('value');
                            $instagramUrl = \App\Models\InfoText::where('key', '=', 'top_bar_instagram_url', 'and')->value('value');
                            $youtubeUrl = \App\Models\InfoText::where('key', '=', 'top_bar_youtube_url', 'and')->value('value');
                            $tiktokUrl = \App\Models\InfoText::where('key', '=', 'top_bar_tiktok_url', 'and')->value('value');

                            // Fallback
                            $facebookUrl = !empty($facebookUrl) ? $facebookUrl : route('social-media-unavailable');
                            $instagramUrl = !empty($instagramUrl) ? $instagramUrl : route('social-media-unavailable');
                            $youtubeUrl = !empty($youtubeUrl) ? $youtubeUrl : route('social-media-unavailable');
                            $tiktokUrl = !empty($tiktokUrl) ? $tiktokUrl : route('social-media-unavailable');
                        @endphp

                        <!-- Social Media Icons (Follow) -->
                        <div class="flex items-center gap-3">
                            <a href="{{ $facebookUrl }}" target="_blank" rel="noopener noreferrer"
                                class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-blue-600 text-white hover:bg-blue-700 transition-colors duration-300 rounded"
                                aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                                </svg>
                            </a>
                            <a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer"
                                class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-pink-600 text-white hover:bg-pink-700 transition-colors duration-300 rounded"
                                aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>
                            </a>
                            <a href="{{ $youtubeUrl }}" target="_blank" rel="noopener noreferrer"
                                class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-red-600 text-white hover:bg-red-700 transition-colors duration-300 rounded"
                                aria-label="YouTube">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                </svg>
                            </a>
                            <a href="{{ $tiktokUrl }}" target="_blank" rel="noopener noreferrer"
                                class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-black text-white hover:bg-gray-900 transition-colors duration-300 rounded"
                                aria-label="TikTok">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z" />
                                </svg>
                            </a>
                        </div>

                        <!-- Share Buttons (Optional, kept for consistency) -->


                        <div
                            class="prose prose-base max-w-none prose-slate dark:prose-invert prose-p:text-black dark:prose-p:text-slate-100 prose-headings:font-semibold prose-headings:tracking-tight prose-h1:text-xl sm:prose-h1:text-[35px] prose-h2:text-lg sm:prose-h2:text-2xl prose-h3:text-base sm:prose-h3:text-xl prose-a:text-green-700 dark:prose-a:text-green-400 prose-a:no-underline hover:prose-a:underline prose-img:rounded-lg prose-pre:bg-slate-900 dark:prose-pre:bg-slate-800 prose-code:bg-slate-100 dark:prose-code:bg-slate-800 prose-table:w-full prose-th:border prose-td:border prose-th:border-slate-300 dark:prose-th:border-slate-700 prose-td:border-slate-300 dark:prose-td:border-slate-700 mt-6">
                            <div class="editor-content overflow-x-auto">
                                {!! $announcement->isi !!}
                            </div>
                        </div>

                        <!-- Share Section -->
                        <div class="pt-4 mt-8 border-t border-gray-200 dark:border-slate-700">
                            <p class="text-base font-semibold text-slate-700 dark:text-slate-300 mb-2">Bagikan Pengumuman
                                ini:
                            </p>
                            <div class="flex items-center gap-3">
                                @php
                                    $shareUrl = url()->current();
                                    $shareTitle = $announcement->judul;
                                    $shareText = $announcement->judul;
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
                                    <!-- X Logo -->
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
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($shareUrl) }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-blue-700 text-white hover:bg-blue-800 transition-colors duration-300 rounded"
                                    aria-label="Bagikan di LinkedIn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
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
                    'articles' => $latestPosts ?? [],
                    'announcements' => [],
                    'agenda' => $agendaItems ?? [],
                    'showSocialMedia' => false,
                    'articleFirst' => true,
                    'schoolProfile' => null
                ])
                                                        </div>
                                                    </div>
                                                </div>
@endsection
