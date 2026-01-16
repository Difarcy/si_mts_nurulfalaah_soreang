@extends('admin.layouts.admin')

@section('title', 'Ubah Berita & Artikel')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Ubah: {{ $post->title }}</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Terakhir diperbarui
                    {{ $post->updated_at?->diffForHumans() }}
                </p>
            </div>
            <a href="{{ route('cpanel.publikasi.index', request()->query()) }}" id="back-btn"
                class="inline-flex items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 transition-colors rounded shadow-sm">
                <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                <span class="hidden sm:inline">Kembali</span>
            </a>
        </div>

        <form action="{{ route($type === 'artikel' ? 'cpanel.artikel.update' : 'cpanel.berita.update', $post) }}"
            method="POST" enctype="multipart/form-data" id="edit-form" data-notify="loading"
            class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 p-6 space-y-6 rounded">
            @method('PUT')
            <input type="hidden" name="_redirect_after_save"
                value="{{ route('cpanel.publikasi.index', request()->query()) }}">
            @include('admin.pages.posts._form', ['post' => $post, 'type' => $type])
        </form>
    </div>
@endsection