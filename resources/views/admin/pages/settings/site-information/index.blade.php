@extends('admin.layouts.admin')

@section('title', 'Informasi Situs')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-lg sm:text-2xl font-bold text-slate-900 dark:text-slate-100">Informasi Situs</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola informasi kontak utama dan media sosial
                    situs
                </p>
            </div>
            <!-- Floating Save Button Top Right -->
            <button type="button" id="site-information-save-btn-floating"
                class="px-3 py-1.5 sm:px-4 sm:py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-all duration-200 shadow-sm hover:shadow-md rounded disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-none min-w-20 sm:min-w-25"
                disabled>
                Simpan
            </button>
        </div>

        <div class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 shadow-sm rounded">
            <form action="{{ route('cpanel.site-information.update') }}" method="POST" id="site-information-form"
                data-unsaved-changes="true" data-notify="loading">
                @csrf
                @method('PUT')

                <div class="p-4 sm:p-6 space-y-8">
                    <!-- Section 1: Informasi Kontak Utama -->
                    <div>
                        <h2
                            class="text-sm sm:text-lg font-bold text-slate-900 dark:text-slate-100 mb-4 flex items-center gap-2">
                            Informasi Kontak
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Whatsapp -->
                            <div>
                                <label for="site_whatsapp"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-2">WhatsApp</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span
                                            class="text-gray-700 dark:text-slate-400 border-r border-gray-300 dark:border-slate-600 pr-3 text-base font-semibold">+62</span>
                                    </div>
                                    <input type="text" name="site_whatsapp" id="site_whatsapp"
                                        value="{{ $siteWhatsapp->value ?? '' }}" maxlength="50" inputmode="numeric"
                                        pattern="[0-9]*"
                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base pl-16 px-3 p-2 sm:py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none"
                                        placeholder="Masukan Nomor WhatsApp" data-max-length="50" data-numeric-only>
                                </div>
                            </div>

                            <!-- Nomor Telepon -->
                            <div>
                                <label for="site_phone"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-2">Nomor
                                    Telepon</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span
                                            class="text-gray-700 dark:text-slate-400 border-r border-gray-300 dark:border-slate-600 pr-3 text-base font-semibold">+62</span>
                                    </div>
                                    <input type="text" name="site_phone" id="site_phone"
                                        value="{{ $sitePhone->value ?? '' }}" maxlength="50" inputmode="numeric"
                                        pattern="[0-9]*"
                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base pl-16 px-3 p-2 sm:py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none transition-all"
                                        placeholder="Masukan Nomor Telepon" data-max-length="50" data-numeric-only>
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="site_email"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-2">Email</label>
                                <div class="relative">
                                    <input type="email" name="site_email" id="site_email"
                                        value="{{ $siteEmail->value ?? '' }}" maxlength="255"
                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none"
                                        placeholder="Masukan Email" data-max-length="255">
                                </div>
                            </div>

                            <!-- Koordinat Peta -->
                            <div>
                                <label for="site_map_coordinates"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-2">Koordinat
                                    Peta (Latitude, Longitude)</label>
                                <div class="relative">
                                    <input type="text" name="site_map_coordinates" id="site_map_coordinates"
                                        value="{{ $siteCoordinates->value ?? '' }}" maxlength="100"
                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none"
                                        placeholder="Masukan Koordinat" data-max-length="100">
                                </div>
                                <p class="text-xs text-slate-500 mt-1">Digunakan untuk embed Google Maps di halaman kontak.
                                </p>
                            </div>

                            <!-- Alamat -->
                            <div class="md:col-span-2">
                                <label for="site_address"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-2">Alamat
                                    Lengkap</label>
                                <div class="relative">
                                    <textarea name="site_address" id="site_address" rows="3" maxlength="500"
                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base px-3 py-2 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none"
                                        placeholder="Masukkan alamat lengkap sekolah di sini..."
                                        data-max-length="500">{{ $siteAddress->value ?? '' }}</textarea>
                                </div>
                            </div>

                            <!-- Deskripsi Footer -->
                            <div class="md:col-span-2">
                                <label for="site_footer_description"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-2">Deskripsi
                                    Footer</label>
                                <div class="relative">
                                    <textarea name="site_footer_description" id="site_footer_description" rows="3"
                                        maxlength="1000"
                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base px-3 py-2 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none"
                                        placeholder="Masukkan deskripsi singkat tentang sekolah untuk ditampilkan di footer..."
                                        data-max-length="1000">{{ $siteFooterDescription->value ?? '' }}</textarea>
                                </div>
                                <p class="text-xs text-slate-500 mt-1">Deskripsi ini akan muncul di bagian bawah website
                                    (footer) di bawah logo sekolah.</p>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-200 dark:border-slate-700">

                    <!-- Section 2: Media Sosial -->
                    <div>
                        <h2
                            class="text-sm sm:text-lg font-bold text-slate-900 dark:text-slate-100 mb-4 flex items-center gap-2">
                            Media Sosial
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Facebook -->
                            <div>
                                <label for="social_facebook"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-2">Facebook
                                    URL</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span
                                            class="text-gray-500 dark:text-slate-400 border-r border-gray-300 dark:border-slate-600 pr-3">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <input type="text" name="social_facebook" id="social_facebook"
                                        value="{{ $socialFacebook->value ?? '' }}" maxlength="255"
                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base pl-14 px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none"
                                        placeholder="https://facebook.com/..." data-max-length="255">
                                </div>
                            </div>

                            <!-- Instagram -->
                            <div>
                                <label for="social_instagram"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-2">Instagram
                                    URL</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span
                                            class="text-gray-500 dark:text-slate-400 border-r border-gray-300 dark:border-slate-600 pr-3">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <input type="text" name="social_instagram" id="social_instagram"
                                        value="{{ $socialInstagram->value ?? '' }}" maxlength="255"
                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base pl-14 px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none"
                                        placeholder="https://instagram.com/..." data-max-length="255">
                                </div>
                            </div>

                            <!-- Twitter -->
                            <div>
                                <label for="social_twitter"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-2">Twitter
                                    URL</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span
                                            class="text-gray-500 dark:text-slate-400 border-r border-gray-300 dark:border-slate-600 pr-3">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <input type="text" name="social_twitter" id="social_twitter"
                                        value="{{ $socialTwitter->value ?? '' }}" maxlength="255"
                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base pl-14 px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none"
                                        placeholder="https://x.com/..." data-max-length="255">
                                </div>
                            </div>

                            <!-- YouTube -->
                            <div>
                                <label for="social_youtube"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-2">YouTube
                                    URL</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span
                                            class="text-gray-500 dark:text-slate-400 border-r border-gray-300 dark:border-slate-600 pr-3">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <input type="text" name="social_youtube" id="social_youtube"
                                        value="{{ $socialYoutube->value ?? '' }}" maxlength="255"
                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base pl-14 px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none"
                                        placeholder="https://youtube.com/..." data-max-length="255">
                                </div>
                            </div>

                            <!-- TikTok -->
                            <div>
                                <label for="social_tiktok"
                                    class="block text-base font-semibold text-slate-700 dark:text-white mb-2">TikTok
                                    URL</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span
                                            class="text-gray-500 dark:text-slate-400 border-r border-gray-300 dark:border-slate-600 pr-3">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <input type="text" name="social_tiktok" id="social_tiktok"
                                        value="{{ $socialTiktok->value ?? '' }}" maxlength="255"
                                        class="w-full border-2 border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 text-base pl-14 px-3 py-1.5 rounded focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none"
                                        placeholder="https://tiktok.com/..." data-max-length="255">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="flex justify-end pt-4 border-t border-gray-200 dark:border-slate-700">
                        <button type="submit" id="site-information-save-btn"
                            class="px-4 py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-all duration-200 shadow-sm hover:shadow-md rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 min-w-20 sm:min-w-25 disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-none"
                            disabled>
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection