@extends('admin.layouts.admin')

@section('title', 'SPMB')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-lg sm:text-2xl font-bold text-slate-900 dark:text-slate-100">SPMB</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola informasi Sistem Penerimaan Murid Baru secara terpusat.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" form="ppdb-form" id="spmb-save-btn-floating"
                    class="px-3 py-1.5 sm:px-4 sm:py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-all duration-200 shadow-sm hover:shadow-md rounded disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-none min-w-20 sm:min-w-25"
                    disabled>
                    Simpan
                </button>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 rounded overflow-hidden shadow-sm">
            <div class="p-4 sm:p-6">
                <div class="grid grid-cols-1 gap-8">
                    <div class="space-y-6">
                        <form id="ppdb-form" action="{{ route('cpanel.settings.spmb.update') }}" method="POST"
                            enctype="multipart/form-data" data-unsaved-changes="true" data-notify="loading">
                            @csrf
                            @method('PUT')

                            <div class="space-y-8">
                                <div>
                                    <h2 class="text-sm sm:text-lg font-bold text-gray-900 dark:text-white">Umum</h2>
                                    <div class="space-y-6 mt-4">
                                        {{-- Status Pendaftaran --}}
                                        <fieldset>
                                            <legend class="block mb-3 text-base font-semibold text-gray-900 dark:text-white">
                                                Status Pendaftaran <span class="text-red-500">*</span>
                                            </legend>
                                            <div class="flex flex-wrap gap-6">
                                                <label class="relative flex items-center cursor-pointer group">
                                                    <input type="radio" name="registration_status" value="open"
                                                        {{ old('registration_status', $setting->registration_status) == 'open' ? 'checked' : '' }}
                                                        class="w-4 h-4 text-green-600 border-gray-300 focus:ring-green-500 cursor-pointer dark:bg-slate-700 dark:border-slate-600">
                                                    <span class="ml-2 text-base font-normal text-gray-700 dark:text-white group-hover:text-green-600 transition-colors">
                                                        Dibuka
                                                    </span>
                                                </label>

                                                <label class="relative flex items-center cursor-pointer group">
                                                    <input type="radio" name="registration_status" value="soon"
                                                        {{ old('registration_status', $setting->registration_status) == 'soon' ? 'checked' : '' }}
                                                        class="w-4 h-4 text-yellow-600 border-gray-300 focus:ring-yellow-500 cursor-pointer dark:bg-slate-700 dark:border-slate-600">
                                                    <span class="ml-2 text-base font-normal text-gray-700 dark:text-white group-hover:text-yellow-600 transition-colors">
                                                        Segera Dibuka
                                                    </span>
                                                </label>

                                                <label class="relative flex items-center cursor-pointer group">
                                                    <input type="radio" name="registration_status" value="closed"
                                                        {{ old('registration_status', $setting->registration_status) == 'closed' ? 'checked' : '' }}
                                                        class="w-4 h-4 text-red-600 border-gray-300 focus:ring-red-500 cursor-pointer dark:bg-slate-700 dark:border-slate-600">
                                                    <span class="ml-2 text-base font-normal text-gray-700 dark:text-white group-hover:text-red-600 transition-colors">
                                                        Ditutup
                                                    </span>
                                                </label>
                                            </div>
                                            @error('registration_status')
                                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                            @enderror
                                        </fieldset>

                                        {{-- Tahun Ajaran --}}
                                        <div>
                                            <label for="academic_year"
                                                class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">Tahun
                                                Ajaran <span class="text-red-500">*</span></label>
                                            <div class="relative">
                                                <input type="text" name="academic_year" id="academic_year"
                                                    value="{{ old('academic_year', $setting->academic_year) }}"
                                                    class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none transition-all"
                                                    placeholder="Masukkan tahun ajaran (Cth: 2025/2026)" data-max-length="20" required>
                                            </div>
                                            @error('academic_year')
                                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Slogan Hero --}}
                                        <div>
                                            <label for="hero_slogan"
                                                class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">Slogan
                                                Halaman SPMB</label>
                                            <div class="relative">
                                                <textarea name="hero_slogan" id="hero_slogan" rows="3"
                                                    class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none transition-all"
                                                    placeholder="Masukkan slogan yang akan tampil di bagian atas halaman SPMB">{{ old('hero_slogan', $setting->hero_slogan) }}</textarea>
                                                <p class="mt-1 text-xs text-gray-500">Teks ini akan tampil di bawah nama madrasah pada bagian hero.</p>
                                            </div>
                                        </div>

                                        {{-- Periode Pendaftaran --}}
                                        <div class="space-y-3">
                                            <div class="block text-base font-semibold text-gray-900 dark:text-white">
                                                Masa Pendaftaran
                                            </div>
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-base">
                                                <div class="relative">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                        <label for="registration_start_date" class="text-gray-700 dark:text-slate-400 border-r border-gray-300 dark:border-slate-600 pr-3 font-semibold text-base cursor-pointer">Dari</label>
                                                    </div>
                                                    <input type="date" name="registration_start_date" id="registration_start_date"
                                                        value="{{ old('registration_start_date', $setting->registration_start_date ? $setting->registration_start_date->format('Y-m-d') : '') }}"
                                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 pl-16 px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none transition-all">
                                                </div>
                                                <div class="relative">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                        <label for="registration_end_date" class="text-gray-700 dark:text-slate-400 border-r border-gray-300 dark:border-slate-600 pr-3 font-semibold text-base cursor-pointer">Sampai</label>
                                                    </div>
                                                    <input type="date" name="registration_end_date" id="registration_end_date"
                                                        value="{{ old('registration_end_date', $setting->registration_end_date ? $setting->registration_end_date->format('Y-m-d') : '') }}"
                                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 pl-24 px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none transition-all">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                            {{-- Kuota --}}
                                            <div>
                                                <label for="quota"
                                                    class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">Kuota
                                                    Pendaftaran</label>
                                                <div class="relative">
                                                    <input type="text" name="quota" id="quota"
                                                        value="{{ old('quota', $setting->quota) }}"
                                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none transition-all"
                                                        placeholder="Cth: 120 Siswa">
                                                </div>
                                            </div>

                                            {{-- Biaya Pendaftaran --}}
                                            <div>
                                                <label for="registration_fee"
                                                    class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">Biaya
                                                    Pendaftaran</label>
                                                <div class="relative">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                        <span class="text-gray-500 dark:text-slate-400 text-sm">Rp</span>
                                                    </div>
                                                    <input type="number" name="registration_fee" id="registration_fee"
                                                        value="{{ old('registration_fee', (int) $setting->registration_fee) }}"
                                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base pl-10 px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none transition-all"
                                                        placeholder="Cth: 200000">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Kontak Panitia --}}
                                        <div class="pt-4 border-t border-gray-100 dark:border-slate-700/50 mt-4">
                                            <h2 class="text-sm sm:text-lg font-bold text-gray-900 dark:text-white mb-4">
                                                Kontak Panitia
                                            </h2>
                                            <div class="space-y-4">
                                                <div>
                                                    <label for="contact_wa"
                                                        class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">Nomor
                                                        WhatsApp <span class="text-red-500">*</span></label>
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                            <span
                                                                class="text-gray-700 dark:text-slate-400 border-r border-gray-300 dark:border-slate-600 pr-3 text-base font-semibold">+62</span>
                                                        </div>
                                                        <input type="text" name="contact_wa" id="contact_wa"
                                                            value="{{ old('contact_wa', $setting->contact_wa) }}" maxlength="50" inputmode="numeric"
                                                            pattern="[0-9]*"
                                                            class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base pl-16 px-3 py-1.5 pr-20 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none transition-all"
                                                            placeholder="Masukkan nomor WhatsApp" data-numeric-only required>
                                                    </div>
                                                    @error('contact_wa')
                                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>





                                        {{-- Alur Pendaftaran --}}
                                        <div class="pt-4 border-t border-gray-100 dark:border-slate-700/50 mt-4">
                                            <h2 class="text-sm sm:text-lg font-bold text-gray-900 dark:text-white mb-4">
                                                Tanggal Alur Pendaftaran
                                            </h2>
                                            <div class="space-y-6">
                                                @php
                                                    $steps = [
                                                        1 => 'Pendaftaran',
                                                        2 => 'Pengembalian Berkas',
                                                        3 => 'Tes Seleksi',
                                                        4 => 'Pengumuman Hasil',
                                                        5 => 'Daftar Ulang'
                                                    ];
                                                @endphp

                                                @foreach($steps as $num => $label)
                                                <div class="group">
                                                    <div class="block mb-2 text-base font-semibold text-slate-700 dark:text-white">Step {{ $num }}: {{ $label }}</div>
                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                        <div class="relative">
                                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                                <label for="step_{{ $num }}_start_date" class="text-gray-700 dark:text-slate-400 border-r border-gray-300 dark:border-slate-600 pr-3 font-semibold text-base cursor-pointer">Mulai</label>
                                                            </div>
                                                            <input type="date" name="step_{{ $num }}_start_date" id="step_{{ $num }}_start_date"
                                                                value="{{ old('step_'.$num.'_start_date', $setting->{'step_'.$num.'_start_date'} ? $setting->{'step_'.$num.'_start_date'}->format('Y-m-d') : '') }}"
                                                                class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 pl-16 px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none transition-all text-base">
                                                        </div>
                                                        <div class="relative">
                                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                                <label for="step_{{ $num }}_end_date" class="text-gray-700 dark:text-slate-400 border-r border-gray-300 dark:border-slate-600 pr-3 font-semibold text-base cursor-pointer">Sampai</label>
                                                            </div>
                                                            <input type="date" name="step_{{ $num }}_end_date" id="step_{{ $num }}_end_date"
                                                                value="{{ old('step_'.$num.'_end_date', $setting->{'step_'.$num.'_end_date'} ? $setting->{'step_'.$num.'_end_date'}->format('Y-m-d') : '') }}"
                                                                class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 pl-20 px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none transition-all text-base">
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <div class="flex justify-end pt-4 border-t border-gray-200 dark:border-slate-700 mt-6">
                                <button type="submit" id="ppdb-save-btn"
                                    class="px-4 py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-all duration-200 shadow-sm hover:shadow-md rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 min-w-20 sm:min-w-25 disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-none"
                                    disabled>
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
