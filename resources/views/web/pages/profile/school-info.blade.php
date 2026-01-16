@extends('web.layouts.website')

@section('title', 'Informasi Sekolah')

@section('content')
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8 sm:py-12">
        <x-breadcrumb :items="[
            ['label' => 'Beranda', 'url' => route('web.home')],
            ['label' => 'Profil', 'url' => route('profil')],
            ['label' => 'Informasi Sekolah']
        ]" />
        <!-- Header Section -->
        <div class="mb-8">
            <x-page-title title="Informasi Sekolah" />
        </div>

        <!-- Content Section -->
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-12">
                <!-- Kolom Kiri -->
                <div class="space-y-4">
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Nama Sekolah</h3>
                        <p class="text-sm sm:text-base text-gray-900 dark:text-slate-100 font-semibold">MTs Nurul Falaah Soreang</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">NPSN</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">20278189</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Alamat Lengkap</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">Jl. Soreang–Banjaran, Kp. Ciwaru RT 01/RW 16, Desa Soreang, Kecamatan Soreang, Kabupaten Bandung, Provinsi Jawa Barat</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Kode Pos</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">40911</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Desa / Kelurahan</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">Soreang</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Kecamatan</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">Soreang</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Kabupaten / Kota</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">Bandung</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Provinsi</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">Jawa Barat</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Status Sekolah</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">Swasta</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Waktu Penyelenggaraan</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">Pagi</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Jenjang Pendidikan</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">Madrasah Tsanawiyah (MTs)</p>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="space-y-4">
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Yayasan Pengelola</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">Yayasan Nurul Falaah Soreang</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Naungan</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">Kementerian Agama Republik Indonesia</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Nomor SK Pendirian</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">WI/PP.00.5/1242/2002</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Tanggal SK Pendirian</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">13 Mei 2002</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Nomor SK Operasional</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">Kd.104/04/pp.00.5351/2010</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Tanggal SK Operasional</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">23 Juni 2010</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Akreditasi</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300 font-semibold text-green-700 dark:text-green-500">B</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Nomor SK Akreditasi</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">1442/BAN-SM/SK/2019</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Tanggal SK Akreditasi</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">12 Desember 2019</p>
                    </div>
                    <div>
                        <h3 class="text-xs sm:text-sm font-semibold text-gray-500 dark:text-slate-400 uppercase mb-1">Nomor Sertifikasi ISO</h3>
                        <p class="text-sm sm:text-base text-gray-700 dark:text-slate-300">–</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
