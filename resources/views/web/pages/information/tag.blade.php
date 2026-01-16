@extends('web.layouts.website')

@section('title', 'Tag: ' . $decodedTag)

@section('content')
    @php
        $breadcrumbItems = [
            ['label' => 'Informasi']
        ];

        // Jika ada filter type dari query, gunakan itu sebagai konteks utama
        if (!empty($typeFilter)) {
            if ($typeFilter === 'berita') {
                $breadcrumbItems[] = ['label' => 'Berita', 'url' => route('informasi.berita')];
            } elseif ($typeFilter === 'artikel') {
                $breadcrumbItems[] = ['label' => 'Artikel', 'url' => route('informasi.artikel')];
            }
        } else {
            // Tanpa filter eksplisit, tentukan dari hasil posts
            $postTypes = $posts->pluck('type')->unique();
            if ($postTypes->count() === 1) {
                $type = $postTypes->first();
                if ($type === 'berita') {
                    $breadcrumbItems[] = ['label' => 'Berita', 'url' => route('informasi.berita')];
                } elseif ($type === 'artikel') {
                    $breadcrumbItems[] = ['label' => 'Artikel', 'url' => route('informasi.artikel')];
                }
            }
        }

        $breadcrumbItems[] = ['label' => 'Tag: ' . $decodedTag];
    @endphp

    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8 sm:py-12">
        <!-- Breadcrumb -->
        <nav class="mb-2" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm text-gray-600 dark:text-slate-400">
                @foreach($breadcrumbItems as $index => $item)
                    @if($index > 0)
                        <li>
                            <svg class="w-4 h-4 text-gray-400 dark:text-slate-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </li>
                    @endif
                    <li>
                        @if(isset($item['url']) && !$loop->last)
                            <a href="{{ $item['url'] }}"
                                class="hover:text-green-700 dark:hover:text-green-400 transition-colors">{{ $item['label'] }}</a>
                        @else
                            @if($item['label'] === 'Informasi')
                                <span class="text-gray-400 dark:text-slate-500 cursor-default">{{ $item['label'] }}</span>
                            @else
                                <span class="text-gray-900 dark:text-slate-100 font-medium line-clamp-1"
                                    aria-current="page">{{ $item['label'] }}</span>
                            @endif
                        @endif
                    </li>
                @endforeach
            </ol>
        </nav>
        <x-page-title :title="'Tag: ' . $decodedTag" />

        @php
            $fallbackImages = ['img/banner1.jpg', 'img/banner2.jpg', 'img/banner3.jpg'];
        @endphp

        <div class="flex flex-col lg:flex-row gap-6 lg:gap-6 mt-8">
            <div class="w-full lg:w-[70%]">
                @if($posts->count() > 0)
                    <div class="space-y-6">
                        @forelse($posts as $post)
                            @include('web.components.post-card', [
                                'post' => $post,
                                'fallbackImage' => asset($fallbackImages[$loop->index % count($fallbackImages)])
                            ])

                          @empty

                                                          <div class="text-center py-12">
                                                <svg class="w-16 h-16 text-gray-400 dark:text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                                    </path>
                                                </svg>
                                                <h3 class="text-sm sm:text-lg font-semibold text-gray-700 dark:text-slate-300 mb-2">Tidak Ada Konten</h3>
                                                <p class="text-xs sm:text-base text-gray-500 dark:text-slate-400">
                                                    Belum ada berita atau artikel dengan tag "<strong>{{ $decodedTag }}</strong>"
                                                </p>
                                            </div>
                                        @endforelse
                    </div>

                    <div class="mt-8">
                        {{ $posts->links() }}
                    </div>

                 @else

                                               <div class="text-center py-12">
                            <svg class="w-16 h-16 text-gray-400 dark:text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            <h3 class="text-sm sm:text-lg font-semibold text-gray-700 dark:text-slate-300 mb-2">Tidak Ada Konten</h3>
                            <p class="text-xs sm:text-base text-gray-500 dark:text-slate-400">
                                Belum ada berita atau artikel dengan tag "<strong>{{ $decodedTag }}</strong>"
                            </p>
                        </div>
                    @endif
            </div>

            <div class="w-full lg:w-[30%] lg:-mt-4 lg:translate-x-4">
                @if($typeFilter === 'artikel')
                    {{-- Tag Artikel: Show Announcements and Social Media --}}
                    @include('web.components.post-sidebar', [
                        'articles' => [],
                        'announcements' => $infoTerkini ?? [],
                        'agenda' => [],
                        'schoolProfile' => null,
                        'announcementFirst' => true,
                        'showSocialMedia' => true
                    ])
                @else
                    {{-- Tag Berita or Mixed: Show Announcements and Agenda --}}
                    @include('web.components.post-sidebar', [
                        'articles' => [],
                        'announcements' => $infoTerkini ?? [],
                        'agenda' => $agendaItems ?? [],
                        'schoolProfile' => null,
                        'announcementFirst' => true,
                        'agendaLast' => true,
                        'showSocialMedia' => false
                    ])
                @endif
            </div>
        </div>
    </div>
@endsection
