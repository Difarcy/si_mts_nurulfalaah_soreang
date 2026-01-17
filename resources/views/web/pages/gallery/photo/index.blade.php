@extends('web.layouts.website')

@section('title', 'Foto Kegiatan')

@section('content')
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8 sm:py-12">
        <x-breadcrumb :items="[
            ['label' => 'Galeri'],
            ['label' => 'Foto Kegiatan']
        ]" />
        <x-page-title title="Foto Kegiatan" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-8 min-h-100 animate-on-scroll">
            @if(isset($fotos) && $fotos->count() > 0)
                @foreach($fotos as $index => $item)
                    <div class="overflow-hidden border border-gray-200 dark:border-slate-700 rounded-lg group cursor-pointer shadow-sm hover:shadow-md transition-shadow"
                        data-image-preview
                        data-image-src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('images/background/default-backgrounds.png') }}">
                        <div class="w-full aspect-video overflow-hidden">
                            <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('images/background/default-backgrounds.png') }}"
                                alt="{{ $item->judul ?? 'Foto Kegiatan ' . ($index + 1) }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-full flex flex-col items-center justify-center min-h-100 gap-3">
                    <svg class="w-16 h-16 text-gray-300 dark:text-slate-600 mb-2" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <p class="text-base sm:text-lg font-semibold text-gray-400 dark:text-slate-500 text-center">
                        Belum Ada Foto Kegiatan
                    </p>
                </div>
            @endif
        </div>
    </div>

    <!-- Image Preview Modal -->
    <div id="imagePreviewModal"
        class="fixed inset-0 z-250 hidden items-center justify-center bg-black/60 p-4 opacity-0 transition-opacity duration-300"
        data-image-preview-modal>
        <div class="relative w-full h-full flex items-center justify-center" data-image-preview-content>
            <img id="previewImage" src="" alt="Preview"
                class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl transform scale-100 transition-transform duration-300">

            <button type="button"
                class="absolute top-4 right-4 z-50 text-white/70 hover:text-white hover:bg-white/10 rounded-full p-2 transition-all"
                data-image-preview-close>
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

@endsection