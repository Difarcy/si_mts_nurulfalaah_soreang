@extends('admin.layouts.admin')

@section('title', 'Edit Agenda')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Edit Agenda</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Ubah informasi agenda</p>
            </div>
            <a href="{{ route('cpanel.agenda.index') }}" id="back-btn" data-href="{{ route('cpanel.agenda.index') }}"
                class="inline-flex items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 transition-colors rounded">
                <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                <span class="hidden sm:inline">Kembali</span>
            </a>
        </div>

        <form action="{{ route('cpanel.agenda.update', $agenda) }}" method="POST" id="agenda-form"
            data-notify="loading" data-unsaved-changes="true"
            class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 p-6 space-y-6 rounded">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content (Left Column) -->
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <label for="judul" class="block text-base font-semibold text-slate-700 dark:text-white mb-2">
                            Judul Agenda <span class="text-red-600 dark:text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $agenda->judul) }}" required
                                maxlength="255" placeholder="Masukan Judul Agenda"
                                class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:border-green-600 focus:outline-none rounded">
                        </div>
                        @error('judul') <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="body-editor" class="block text-base font-semibold text-slate-700 dark:text-white mb-2">
                            Deskripsi <span class="text-red-600 dark:text-red-500">*</span>
                        </label>
                        <textarea name="deskripsi" id="body-editor" rows="10" placeholder="Masukkan deskripsi agenda"
                            required
                            class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-2.5 bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:border-green-600 focus:outline-none rounded">{{ old('deskripsi', $agenda->deskripsi) }}</textarea>
                        @error('deskripsi') <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Sidebar (Right Column) -->
                <div class="space-y-6">
                    <div
                        class="bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 p-4 space-y-4 rounded">

                        <!-- Status -->
                        <div>
                            <label for="status-select"
                                class="block text-base font-semibold text-slate-700 dark:text-white mb-1">
                                Status
                            </label>
                            <select id="status-select" name="status"
                                class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:border-green-600 focus:outline-none appearance-none cursor-pointer rounded">
                                <option value="publish" {{ (old('status', $agenda->status) == 'publish') ? 'selected' : '' }}>
                                    Publish</option>
                                <option value="draft" {{ (old('status', $agenda->status) == 'draft') ? 'selected' : '' }}>
                                    Draft</option>
                                <option value="nonaktif" {{ (old('status', $agenda->status) == 'nonaktif') ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>

                        <!-- Author -->
                        <div>
                            <label for="author_name"
                                class="block text-base font-semibold text-slate-700 dark:text-white mb-1">
                                Nama Penulis <span class="text-red-600 dark:text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" name="author_name" id="author_name"
                                    value="{{ old('author_name', $agenda->author_name ?? 'Admin') }}" required
                                    maxlength="100" placeholder="Masukan Nama Penulis"
                                    class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 pr-16 text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:border-green-600 focus:outline-none rounded">
                                <span
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-xs pointer-events-none text-slate-400 dark:text-slate-500">
                                    <span
                                        id="author_name_count">{{ mb_strlen(old('author_name', $agenda->author_name ?? 'Admin')) }}/100</span>
                                </span>
                            </div>
                            @error('author_name') <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Dates -->
                        <div class="space-y-3 pt-2 border-t border-gray-200 dark:border-slate-700">
                            <div>
                                <label for="tanggal_mulai"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Tanggal
                                    Mulai <span class="text-red-600 dark:text-red-500">*</span></label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                    value="{{ old('tanggal_mulai', $agenda->tanggal_mulai->format('Y-m-d')) }}" required
                                    class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:border-green-600 focus:outline-none rounded">
                                @error('tanggal_mulai') <p class="text-xs text-red-600 dark:text-red-400 mt-1">
                                    {{ $message }}
                                </p> @enderror
                            </div>
                            <div>
                                <label for="tanggal_selesai"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Tanggal
                                    Selesai</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                                    value="{{ old('tanggal_selesai', $agenda->tanggal_selesai?->format('Y-m-d')) }}"
                                    class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:border-green-600 focus:outline-none rounded">
                                @error('tanggal_selesai') <p class="text-xs text-red-600 dark:text-red-400 mt-1">
                                    {{ $message }}
                                </p> @enderror
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label for="waktu_mulai"
                                        class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Jam
                                        Mulai</label>
                                    <input type="time" name="waktu_mulai" id="waktu_mulai"
                                        value="{{ old('waktu_mulai', $agenda->waktu_mulai) }}"
                                        class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:border-green-600 focus:outline-none rounded">
                                </div>
                                <div>
                                    <label for="waktu_selesai"
                                        class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Jam
                                        Selesai</label>
                                    <input type="time" name="waktu_selesai" id="waktu_selesai"
                                        value="{{ old('waktu_selesai', $agenda->waktu_selesai) }}"
                                        class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:border-green-600 focus:outline-none rounded">
                                </div>
                            </div>
                            @error('waktu_mulai') <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                            @error('waktu_selesai') <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}
                            </p> @enderror
                        </div>

                        <!-- Location -->
                        <div class="pt-2 border-t border-gray-200 dark:border-slate-700">
                            <label for="lokasi"
                                class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Detail
                                Lokasi</label>
                            <div class="relative">
                                <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', $agenda->lokasi) }}"
                                    maxlength="255" placeholder="Masukan Detail Lokasi"
                                    class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 pr-16 text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:border-green-600 focus:outline-none rounded">
                                <span
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-xs pointer-events-none text-slate-400 dark:text-slate-500">
                                    <span id="lokasi_count">{{ mb_strlen(old('lokasi', $agenda->lokasi)) }}/255</span>
                                </span>
                            </div>
                            @error('lokasi') <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('cpanel.agenda.index') }}" id="cancel-btn"
                            class="inline-flex min-w-20 sm:min-w-25 items-center justify-center px-3 py-1.5 sm:px-4 text-base font-semibold text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 transition-colors rounded shadow-sm">Batal</a>
                        <button type="submit" id="submit-btn"
                            class="inline-flex min-w-20 sm:min-w-25 items-center justify-center px-3 py-1.5 sm:px-4 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors rounded shadow-sm">
                            Simpan
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </div>



@endsection