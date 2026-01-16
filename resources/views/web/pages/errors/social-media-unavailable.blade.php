@extends('web.layouts.website')

@section('title', 'Media Sosial Tidak Tersedia')

@section('content')
<div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8 sm:py-12">
    <div class="flex flex-col items-center justify-center min-h-[60vh] text-center">
        <svg class="w-24 h-24 text-gray-400 dark:text-slate-600 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
        </svg>
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-slate-100 mb-4">Media Sosial Belum Tersedia</h1>
        <p class="text-lg text-gray-600 dark:text-slate-400 mb-8">Media sosial kami sedang dalam proses pengembangan. Silakan kembali lagi nanti.</p>
        <a href="{{ route('web.home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-green-700 dark:bg-green-600 text-white font-semibold rounded-lg hover:bg-green-800 dark:hover:bg-green-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
