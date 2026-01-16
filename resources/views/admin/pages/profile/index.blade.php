@extends('admin.layouts.admin')

{{-- Halaman Edit Profil Sekolah --}}
@section('title', 'Profil Sekolah')

{{-- Konten utama halaman --}}
@section('content')
    {{-- Header halaman --}}
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-lg sm:text-2xl font-bold text-slate-900 dark:text-slate-100">Profil Sekolah</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola informasi profil sekolah, sejarah, visi
                    misi,
                    dan struktur organisasi.</p>
            </div>
            <!-- Floating Save Button Top Right -->
            <button type="button" id="submit-btn-floating"
                class="px-3 py-1.5 sm:px-4 sm:py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-all duration-200 shadow-sm hover:shadow-md rounded disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-none min-w-20 sm:min-w-25"
                disabled>
                Simpan
            </button>
        </div>

        {{-- Form edit profil sekolah --}}
        <form action="{{ route('cpanel.profil-sekolah.update') }}" method="POST" enctype="multipart/form-data"
            id="school-profile-form" data-notify="loading" data-unsaved-changes="true">
            @csrf
            @method('PUT')

            {{-- Tampilkan error validasi jika ada --}}
            @if ($errors->any())
                <div data-flash-error class="hidden">
                    @foreach ($errors->all() as $error)
                        @if (str_contains($error, 'terlalu besar') || str_contains($error, 'gambar') || str_contains($error, 'image'))
                            {{ $error }}
                            @break
                        @endif
                    @endforeach
                </div>
            @endif

            <x-card class="bg-white dark:bg-slate-800" bodyClass="space-y-6"
                footerClass="justify-end bg-gray-50 dark:bg-slate-800/50">
                {{-- Section Identitas Sekolah --}}
                <div class="border-b border-gray-200 dark:border-slate-700 pb-6">
                    <h2
                        class="text-sm sm:text-lg font-bold text-slate-900 dark:text-slate-100 mb-4 flex items-center gap-2">
                        Identitas Madrasah
                    </h2>
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <x-input name="nama_sekolah" label="Nama Madrasah" :value="$schoolProfile->nama_sekolah"
                                required maxlength="100" placeholder="Masukan Nama Madrasah" />
                        </div>
                        <div>
                            <label for="gambar_sekolah"
                                class="block text-base font-semibold text-slate-700 dark:text-white mb-2">Foto
                                Madrasah</label>
                            <input type="file" name="gambar_sekolah" id="gambar_sekolah" accept="image/*" class="hidden">
                            <div id="drop-zone-sekolah"
                                class="border-2 border-dashed border-gray-300 dark:border-slate-600 p-8 cursor-pointer hover:border-green-500 dark:hover:border-green-600 transition-colors rounded min-h-96 flex flex-col items-center justify-center overflow-hidden">
                                <div id="upload-placeholder-sekolah"
                                    class="text-center space-y-3 {{ $schoolProfile->gambar_sekolah ? 'hidden' : '' }} flex flex-col items-center justify-center h-full">
                                    <svg class="w-16 h-16 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="text-base font-semibold text-slate-700 dark:text-white">Klik atau tarik
                                        gambar ke sini</p>
                                    <p class="text-sm text-slate-400 dark:text-slate-500">Format yang didukung: JPG, PNG
                                        (Maks. 5MB per gambar)</p>
                                </div>
                                <div id="preview-container-sekolah"
                                    class="{{ $schoolProfile->gambar_sekolah ? '' : 'hidden' }} w-full h-full flex items-center justify-center overflow-hidden">
                                    <div class="relative inline-block max-w-full max-h-full">
                                        <img id="preview-img-sekolah"
                                            src="{{ $schoolProfile->gambar_sekolah ? asset('storage/' . $schoolProfile->gambar_sekolah) : '' }}"
                                            alt="Foto Madrasah"
                                            class="max-w-full max-h-full object-contain cursor-pointer hover:opacity-90 transition-opacity"
                                            data-image-preview data-image-src="#preview-img-sekolah"
                                            data-image-title="Foto Madrasah">
                                        <button type="button" id="remove-sekolah-btn"
                                            class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg transition-all"
                                            aria-label="Hapus Gambar">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                        <input type="hidden" name="delete_gambar_sekolah" id="delete_gambar_sekolah"
                                            value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="deskripsi_sekolah"
                                class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Tentang Sekolah
                                <span class="text-red-600 dark:text-red-500">*</span></label>
                            <textarea name="deskripsi_sekolah" id="deskripsi_sekolah" placeholder="Masukan Tentang Sekolah"
                                class="w-full">{{ old('deskripsi_sekolah', $schoolProfile->deskripsi_sekolah) }}</textarea>
                            @error('deskripsi_sekolah') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Section Sejarah --}}
                <div class="border-b border-gray-200 dark:border-slate-700 pb-6">
                    <h2
                        class="text-sm sm:text-lg font-bold text-slate-900 dark:text-slate-100 mb-4 flex items-center gap-2">
                        Sejarah
                    </h2>
                    <div>
                        <label for="sejarah"
                            class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Sejarah Lengkap
                            <span class="text-red-600 dark:text-red-500">*</span></label>
                        <textarea name="sejarah" id="sejarah" placeholder="Masukan Sejarah Lengkap Madrasah"
                            class="w-full">{{ old('sejarah', $schoolProfile->sejarah) }}</textarea>
                        @error('sejarah') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Section Visi, Misi & Tujuan --}}
                <div class="border-b border-gray-200 dark:border-slate-700 pb-6">
                    <h2
                        class="text-sm sm:text-lg font-bold text-slate-900 dark:text-slate-100 mb-4 flex items-center gap-2">
                        Visi, Misi & Tujuan
                    </h2>
                    <div class="space-y-6">
                        <div>
                            <label for="visi" class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Visi
                                <span class="text-red-600 dark:text-red-500">*</span></label>
                            <textarea name="visi" id="visi" placeholder="Masukan Visi Madrasah"
                                class="w-full">{{ old('visi', $schoolProfile->visi) }}</textarea>
                            @error('visi') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="misi" class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Misi
                                <span class="text-red-600 dark:text-red-500">*</span></label>
                            <textarea name="misi" id="misi" placeholder="Masukan Misi Madrasah"
                                class="w-full">{{ old('misi', $schoolProfile->misi) }}</textarea>
                            <p class="text-xs text-slate-500 mt-1">Gunakan baris baru atau numbering untuk memisahkan poin
                                misi.</p>
                            @error('misi') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="tujuan"
                                class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Tujuan <span
                                    class="text-red-600 dark:text-red-500">*</span></label>
                            <textarea name="tujuan" id="tujuan" placeholder="Masukan Tujuan Madrasah"
                                class="w-full">{{ old('tujuan', $schoolProfile->tujuan) }}</textarea>
                            <p class="text-xs text-slate-500 mt-1">Gunakan baris baru atau numbering untuk memisahkan poin
                                tujuan.</p>
                            @error('tujuan') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Section Struktur Organisasi --}}
                <div class="border-b border-gray-200 dark:border-slate-700 pb-6">
                    <h2
                        class="text-sm sm:text-lg font-bold text-slate-900 dark:text-slate-100 mb-4 flex items-center gap-2">
                        Struktur Organisasi
                    </h2>
                    <div>
                        <label for="struktur_organisasi"
                            class="block text-base font-semibold text-slate-700 dark:text-white mb-2">Bagan
                            Struktur</label>
                        <input type="file" name="struktur_organisasi" id="struktur_organisasi" accept="image/*"
                            class="hidden">
                        <div id="drop-zone-struktur"
                            class="border-2 border-dashed border-gray-300 dark:border-slate-600 p-8 cursor-pointer hover:border-green-500 dark:hover:border-green-600 transition-colors rounded min-h-96 flex flex-col items-center justify-center overflow-hidden">
                            <div id="upload-placeholder-struktur"
                                class="text-center space-y-3 {{ $schoolProfile->struktur_organisasi ? 'hidden' : '' }} flex flex-col items-center justify-center h-full">
                                <svg class="w-16 h-16 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="text-base font-semibold text-slate-700 dark:text-white">Klik atau tarik gambar
                                    ke sini</p>
                                <p class="text-sm text-slate-400 dark:text-slate-500">Format yang didukung: JPG, PNG (Maks.
                                    5MB per gambar)</p>
                            </div>
                            <div id="preview-container-struktur"
                                class="{{ $schoolProfile->struktur_organisasi ? '' : 'hidden' }} w-full h-full flex items-center justify-center overflow-hidden">
                                <div class="relative inline-block max-w-full max-h-full">
                                    <img id="preview-img-struktur"
                                        src="{{ $schoolProfile->struktur_organisasi ? asset('storage/' . $schoolProfile->struktur_organisasi) : '' }}"
                                        alt="Struktur Organisasi"
                                        class="max-w-full max-h-full object-contain cursor-pointer hover:opacity-90 transition-opacity"
                                        data-image-preview data-image-src="#preview-img-struktur"
                                        data-image-title="Struktur Organisasi">
                                    <button type="button" id="remove-struktur-btn"
                                        class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg transition-all"
                                        aria-label="Hapus Gambar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                    <input type="hidden" name="delete_struktur_organisasi" id="delete_struktur_organisasi"
                                        value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Section Kepala Madrasah --}}
                <div class="pb-6">
                    <h2
                        class="text-sm sm:text-lg font-bold text-slate-900 dark:text-slate-100 mb-4 flex items-center gap-2">
                        Kepala Madrasah
                    </h2>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                        <div class="lg:col-span-1">
                            <label for="kepala_sekolah_foto"
                                class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Foto</label>
                            <input type="file" name="kepala_sekolah_foto" id="kepala_sekolah_foto" accept="image/*"
                                class="hidden">
                            <div id="drop-zone-kepsek"
                                class="border-2 border-dashed border-gray-300 dark:border-slate-600 p-6 cursor-pointer hover:border-green-500 dark:hover:border-green-600 transition-colors rounded h-80 flex flex-col items-center justify-center overflow-hidden">
                                <div id="upload-placeholder-kepsek"
                                    class="text-center space-y-3 {{ $schoolProfile->kepala_sekolah_foto ? 'hidden' : '' }} flex flex-col items-center justify-center h-full">
                                    <svg class="w-14 h-14 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="text-base font-semibold text-slate-700 dark:text-white">Klik atau tarik
                                        gambar ke sini</p>
                                    <p class="text-sm text-slate-400 dark:text-slate-500">Format yang didukung: JPG, PNG
                                        (Maks. 5MB per gambar)</p>
                                </div>
                                <div id="preview-container-kepsek"
                                    class="{{ $schoolProfile->kepala_sekolah_foto ? '' : 'hidden' }} w-full h-full flex items-center justify-center overflow-hidden">
                                    <div class="relative inline-block max-w-full max-h-full">
                                        <img id="preview-img-kepsek"
                                            src="{{ $schoolProfile->kepala_sekolah_foto ? asset('storage/' . $schoolProfile->kepala_sekolah_foto) : '' }}"
                                            alt="Kepala Sekolah"
                                            class="max-w-full max-h-full object-contain cursor-pointer hover:opacity-90 transition-opacity"
                                            data-image-preview data-image-src="#preview-img-kepsek"
                                            data-image-title="Foto Kepala Madrasah">
                                        <button type="button" id="remove-kepsek-btn"
                                            class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg transition-all"
                                            aria-label="Hapus Foto">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                        <input type="hidden" name="delete_kepala_sekolah_foto"
                                            id="delete_kepala_sekolah_foto" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lg:col-span-2 space-y-4">
                            <div>
                                <x-input name="kepala_sekolah_nama" label="Nama Lengkap"
                                    :value="$schoolProfile->kepala_sekolah_nama" required maxlength="100"
                                    placeholder="Masukan Nama Lengkap Kepala Madrasah" />
                            </div>
                            <div>
                                <label for="kepala_sekolah_sambutan"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-1">Sambutan
                                    <span class="text-red-600 dark:text-red-500">*</span></label>
                                <textarea name="kepala_sekolah_sambutan" id="kepala_sekolah_sambutan"
                                    placeholder="Masukan Sambutan Kepala Madrasah"
                                    class="w-full">{{ old('kepala_sekolah_sambutan', $schoolProfile->kepala_sekolah_sambutan) }}</textarea>
                                @error('kepala_sekolah_sambutan') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer form dengan tombol simpan --}}
                {{-- Footer form dengan tombol simpan --}}
                <div
                    class="flex justify-end pt-4 border-t border-gray-200 dark:border-slate-700 mt-6 h-auto bg-transparent">
                    <x-button type="submit" id="submit-btn" disabled
                        class="min-w-20 sm:min-w-25 shadow-sm disabled:opacity-50 disabled:cursor-not-allowed px-3! py-1.5! sm:px-4! text-base!">
                        Simpan
                    </x-button>
                </div>
            </x-card>
        </form>
    </div>

@endsection