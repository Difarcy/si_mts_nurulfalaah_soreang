@extends('admin.layouts.admin')

@section('title', 'Tambah Prestasi Siswa')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Tambah Prestasi Siswa</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Isi formulir berikut untuk menambahkan prestasi
                    siswa ke website.</p>
            </div>
            <button type="button" id="back-btn" data-href="{{ route('cpanel.prestasi-siswa.index') }}"
                class="inline-flex items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 transition-colors rounded"
                aria-label="Kembali">
                <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                <span class="hidden sm:inline">Kembali</span>
            </button>
        </div>

        <form action="{{ route('cpanel.prestasi-siswa.store') }}" method="POST" enctype="multipart/form-data"
            id="student-achievement-form" data-notify="loading" data-unsaved-changes="true"
            data-uc-submit-btn-id="publish-btn">
            @csrf
            <div class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 p-6 rounded">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2 space-y-6">
                        <div>
                            <label for="gambar"
                                class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Upload
                                Gambar <span class="text-red-600">*</span></label>
                            <input type="file" name="gambar" id="gambar" accept="image/*" class="hidden">
                            <input type="hidden" name="delete_gambar" id="delete_gambar" value="0">
                            <div id="drop-zone-gambar-prestasi"
                                class="border-2 border-dashed border-gray-300 dark:border-slate-600 cursor-pointer hover:border-green-500 dark:hover:border-green-600 transition-colors rounded relative min-h-64 flex flex-col items-center justify-center">

                                <div id="upload-placeholder-gambar-prestasi"
                                    class="text-center space-y-3 w-full h-full flex flex-col items-center justify-center p-8">
                                    <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="text-base font-semibold text-slate-700 dark:text-white text-center">Klik atau
                                        tarik gambar ke sini</p>
                                    <p class="text-sm text-slate-400 dark:text-slate-500 text-center">Format yang didukung:
                                        JPG, PNG (Maks. 5MB per gambar)</p>
                                </div>
                                <div id="preview-container-gambar-prestasi" class="hidden w-full h-full p-2">
                                    <div class="relative group h-full">
                                        <div class="overflow-hidden border border-gray-300 dark:border-slate-700 cursor-pointer hover:opacity-90 transition-opacity rounded h-full"
                                            data-image-preview data-image-src="">
                                            <img id="preview-img-gambar-prestasi" src="" alt="Pratinjau"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <button type="button" id="remove-gambar-btn-prestasi"
                                            class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-10"
                                            aria-label="Hapus Gambar">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @error('gambar') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="foto_sertifikat"
                                class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Foto
                                Sertifikat <span
                                    class="text-xs font-normal text-slate-400 dark:text-slate-500">(opsional)</span></label>
                            <input type="file" name="foto_sertifikat" id="foto_sertifikat" accept="image/*" class="hidden">
                            <input type="hidden" name="delete_foto_sertifikat" id="delete_foto_sertifikat" value="0">
                            <div id="drop-zone-sertifikat"
                                class="border-2 border-dashed border-gray-300 dark:border-slate-600 cursor-pointer hover:border-green-500 dark:hover:border-green-600 transition-colors rounded relative min-h-64 flex flex-col items-center justify-center">

                                <div id="upload-placeholder-sertifikat"
                                    class="text-center space-y-3 w-full h-full flex flex-col items-center justify-center p-8">
                                    <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-base font-semibold text-slate-700 dark:text-white text-center">Klik
                                        atau tarik sertifikat ke sini</p>
                                    <p class="text-sm text-slate-400 dark:text-slate-500 text-center">Format yang didukung:
                                        JPG, PNG (Maks. 5MB)</p>
                                </div>
                                <div id="preview-container-sertifikat" class="hidden w-full h-full p-2">
                                    <div class="relative group h-full">
                                        <div class="overflow-hidden border border-gray-300 dark:border-slate-700 cursor-pointer hover:opacity-90 transition-opacity rounded h-full"
                                            data-image-preview data-image-src="">
                                            <img id="preview-img-sertifikat" src="" alt="Pratinjau"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <button type="button" id="remove-sertifikat-btn"
                                            class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-10"
                                            aria-label="Hapus Sertifikat">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @error('foto_sertifikat') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="judul"
                                class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Judul <span
                                    class="text-red-600 dark:text-red-500">*</span></label>
                            <div class="relative">
                                <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                                    maxlength="255" placeholder="Masukan Judul Prestasi"
                                    class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:border-green-600 focus:outline-none rounded">
                            </div>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Judul prestasi yang diraih.</p>
                            @error('judul') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="nama_siswa"
                                class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Nama Siswa <span
                                    class="text-red-600 dark:text-red-500">*</span></label>
                            <div class="relative">
                                <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa') }}"
                                    required maxlength="255" placeholder="Masukan Nama Siswa"
                                    class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:border-green-600 focus:outline-none rounded">
                            </div>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Nama lengkap siswa yang berprestasi.
                            </p>
                            @error('nama_siswa') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="deskripsi"
                                class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Deskripsi <span
                                    class="text-xs font-normal text-slate-400 dark:text-slate-500">(opsional)</span></label>
                            <div class="relative">
                                <textarea name="deskripsi" id="deskripsi" rows="6" maxlength="500"
                                    placeholder="Masukan Deskripsi singkat"
                                    class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-2.5 text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:border-green-600 focus:outline-none rounded">{{ old('deskripsi') }}</textarea>
                            </div>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Tambahkan konteks lomba/kegiatan,
                                penyelenggara, atau pencapaian ringkas.</p>
                            @error('deskripsi') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div
                            class="bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 p-4 space-y-4 rounded">
                            <div>
                                <label for="kelas"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Kelas <span
                                        class="text-red-600">*</span></label>
                                <div class="relative">
                                    <input type="text" name="kelas" id="kelas" value="{{ old('kelas') }}" required
                                        maxlength="50" placeholder="Masukan Kelas"
                                        class="w-full bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-3 py-1.5 text-base focus:border-green-600 focus:outline-none rounded">
                                </div>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Kelas siswa saat meraih prestasi.
                                </p>
                                @error('kelas') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="jenis_prestasi"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Jenis
                                    Prestasi <span class="text-red-600">*</span></label>
                                <select name="jenis_prestasi" id="jenis_prestasi" required
                                    class="w-full bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-3 py-1.5 text-base focus:border-green-600 focus:outline-none rounded">
                                    <option value="">Pilih</option>
                                    <option value="Akademik" @selected(old('jenis_prestasi') === 'Akademik')>Akademik
                                    </option>
                                    <option value="Non-Akademik" @selected(old('jenis_prestasi') === 'Non-Akademik')>
                                        Non-Akademik</option>
                                </select>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Kategori prestasi
                                    (Akademik/Non-Akademik).</p>
                                @error('jenis_prestasi') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="tingkat_prestasi"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Tingkat
                                    Prestasi <span class="text-red-600">*</span></label>
                                <select name="tingkat_prestasi" id="tingkat_prestasi" required
                                    class="w-full bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-3 py-1.5 text-base focus:border-green-600 focus:outline-none rounded">
                                    <option value="">Pilih</option>
                                    @foreach(['Sekolah', 'Kecamatan', 'Kabupaten', 'Provinsi', 'Nasional', 'Internasional'] as $t)
                                        <option value="{{ $t }}" @selected(old('tingkat_prestasi') === $t)>{{ $t }}</option>
                                    @endforeach
                                </select>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Tingkat penyelenggaraan lomba.
                                </p>
                                @error('tingkat_prestasi') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="tanggal_prestasi"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Tanggal
                                    Prestasi <span class="text-red-600">*</span></label>
                                <input type="date" name="tanggal_prestasi" id="tanggal_prestasi"
                                    value="{{ old('tanggal_prestasi') }}" required
                                    class="w-full bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 text-slate-900 dark:text-slate-100 px-3 py-1.5 text-base focus:border-green-600 focus:outline-none rounded">
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Tanggal pelaksanaan atau
                                    penerimaan penghargaan.</p>
                                @error('tanggal_prestasi') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-3 translate-y-2">
                            <a href="{{ route('cpanel.prestasi-siswa.index') }}" id="cancel-btn"
                                class="inline-flex min-w-20 sm:min-w-25 items-center justify-center px-3 py-1.5 sm:px-4 text-base font-semibold text-white bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 transition-colors rounded shadow-sm">Batal</a>
                            <button type="submit" id="publish-btn" disabled
                                class="inline-flex min-w-20 sm:min-w-25 items-center justify-center px-3 py-1.5 sm:px-4 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors disabled:opacity-50 disabled:cursor-not-allowed rounded shadow-sm">Publish</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Toast Peringatan Ukuran File (Slide Down) -->
    <div id="size-limit-modal"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 z-300 hidden flex-col items-center transition-all duration-500 ease-out -translate-y-full opacity-0">
        <div
            class="bg-red-600 dark:bg-red-700 border border-red-700 dark:border-red-800 rounded-lg shadow-2xl px-6 py-4 max-w-md w-full mx-4 flex items-center gap-4">
            <div class="shrink-0 text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                    </path>
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-white" id="size-limit-modal-text">
                    Ukuran file terlalu besar (Maksimal 5MB).
                </p>
            </div>
        </div>
    </div>

@endsection