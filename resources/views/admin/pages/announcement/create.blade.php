@extends('admin.layouts.admin')

@section('title', 'Tambah Pengumuman')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Tambah Pengumuman</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Buat pengumuman baru yang akan ditampilkan di
                    website</p>
            </div>
            <a href="{{ route('cpanel.pengumuman.index') }}" id="back-btn"
                data-href="{{ route('cpanel.pengumuman.index') }}"
                class="inline-flex items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 transition-colors rounded shadow-sm">
                <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                <span class="hidden sm:inline">Kembali</span>
            </a>
        </div>

        @php
            $config = [
                "initialData" => null,
                "uploadRoute" => route("cpanel.uploads.images"),
                "csrfToken" => csrf_token()
            ];
        @endphp
        <form action="{{ route('cpanel.pengumuman.store') }}" method="POST" enctype="multipart/form-data"
            id="pengumuman-form" data-notify="loading" data-unsaved-changes="true"
            data-announcement-config="{{ json_encode($config) }}"
            class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 p-6 space-y-6 rounded"> @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Kolom Kiri: Konten Utama -->
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <x-input label="Judul Pengumuman" name="judul" id="judul" required="true"
                            placeholder="Masukan Judul Pengumuman" maxlength="255" />
                    </div>

                    <div>
                        <x-textarea label="Isi / Deskripsi" name="isi" id="isi-editor" required="true"
                            placeholder="Masukkan isi pengumuman" rows="10" />
                    </div>
                </div>

                <!-- Kolom Kanan: Sidebar -->
                <div class="lg:col-span-1 space-y-6">
                    <div
                        class="bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 p-6 space-y-4 rounded">

                        <div>
                            <x-select label="Status" name="status" id="status-select">
                                <option value="publish" {{ old('status') === 'publish' || !old('status') ? 'selected' : '' }}>
                                    Publish</option>
                                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            </x-select>
                        </div>

                        <div>
                            <x-input label="Nama Penulis" name="author_name" id="author_name" required="true"
                                value="{{ old('author_name', 'Admin') }}" placeholder="Masukan Nama Penulis" maxlength="100"
                                class="pr-16">
                                <span
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-xs pointer-events-none text-slate-400 dark:text-slate-500">
                                    <span id="author_name_count">{{ mb_strlen(old('author_name', 'Admin')) }}/100</span>
                                </span>
                            </x-input>
                        </div>

                        <div>
                            <label class="block text-base font-semibold text-slate-700 dark:text-white mb-2">
                                Waktu Publikasi
                            </label>
                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                Akan diatur otomatis saat publikasi (Sekarang)
                            </p>
                        </div>

                        <div>
                        </div>

                        <div class="flex items-center justify-end gap-3 translate-y-2">
                            <a href="{{ route('cpanel.pengumuman.index') }}" id="cancel-btn"
                                class="inline-flex min-w-20 sm:min-w-25 items-center justify-center px-3 py-1.5 sm:px-4 text-base font-semibold text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 transition-colors rounded shadow-sm">Batal</a>
                            <button type="submit" id="submit-btn" disabled
                                class="inline-flex min-w-20 sm:min-w-25 items-center justify-center px-3 py-1.5 sm:px-4 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors disabled:opacity-50 disabled:cursor-not-allowed rounded shadow-sm">
                                Publish
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>



@endsection