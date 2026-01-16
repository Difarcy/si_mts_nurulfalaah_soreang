@extends('web.layouts.website')

@section('title', 'Artikel')

@section('content')
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8 sm:py-12">
        <x-breadcrumb :items="[
            ['label' => 'Informasi'],
            ['label' => 'Artikel']
        ]" />
        <x-page-title title="Artikel" />

        @php
            $fallbackImages = ['img/banner1.jpg', 'img/banner2.jpg', 'img/banner3.jpg'];
        @endphp

        <div class="flex flex-col lg:flex-row gap-4 lg:gap-4 mt-8">
            <div class="w-full lg:w-[70%] space-y-4" id="public-posts-container">
                <form method="GET" class="mb-4" id="public-search-form">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari artikel..." autocomplete="off"
                        class="w-full px-4 py-2 sm:py-2.5 border-2 border-gray-300 dark:border-slate-600 rounded-lg focus:border-green-700 focus:outline-none text-sm sm:text-base bg-white dark:bg-slate-800 text-gray-900 dark:text-slate-100">
                </form>
                <div id="public-posts-list" class="space-y-4">
                    @forelse($posts as $post)
                        @include('web.components.post-card', [
                            'post' => $post,
                            'fallbackImage' => asset($fallbackImages[$loop->index % count($fallbackImages)])
                        ])
                    @empty
                        <div class="bg-white dark:bg-slate-800 rounded-xl p-10 text-center border border-gray-100 dark:border-slate-700">
                            @if(request('q'))
                                <p class="text-sm sm:text-lg font-bold text-gray-900 dark:text-slate-100 mb-2">
                                    Hasil Pencarian Tidak Ditemukan
                                </p>
                                <p class="text-xs sm:text-base text-gray-500 dark:text-slate-400">
                                    Tidak ada artikel yang sesuai dengan pencarian "<strong>{{ request('q') }}</strong>"
                                </p>
                            @else
                                <p class="text-sm sm:text-lg font-semibold text-gray-400 dark:text-slate-500 text-center">
                                    Belum Ada Artikel
                                </p>
                            @endif
                        </div>
                    @endforelse

                    <div>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-[30%] lg:-mt-4">
                @include('web.components.post-sidebar', [
                    'articles' => $sidebarNews,
                    'announcements' => $infoTerkini ?? [],
                    'agenda' => [],
                    'articleTitle' => 'Berita Terbaru',
                    'articleEmptyMessage' => 'Belum ada berita',
                    'articleFirst' => true,
                    'showSocialMedia' => false,
                    'schoolProfile' => null
                ])
            </div>
        </div>
    </div>
@endsection
