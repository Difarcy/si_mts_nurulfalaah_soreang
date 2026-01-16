@extends('web.layouts.website')

@section('title', 'Sedang Dalam Perbaikan')

@section('content')
<div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8 sm:py-12">
    <div class="flex flex-col items-center justify-center min-h-[60vh] text-center">
        <svg class="w-24 h-24 text-gray-400 dark:text-slate-600 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
        </svg>
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-slate-100 mb-4">Halaman Sedang Dibangun</h1>
        <p class="text-lg text-gray-600 dark:text-slate-400 mb-8">Halaman ini sedang dalam proses pengembangan. Silakan kembali lagi nanti.</p>
        <a href="{{ route('web.home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-green-700 dark:bg-green-600 text-white font-semibold rounded-lg hover:bg-green-800 dark:hover:bg-green-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
