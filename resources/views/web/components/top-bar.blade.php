@php
    // Use InfoText for Top Bar settings
    $unavailableRoute = route('social-media-unavailable');

    // Get phone and email with safe navigation, defaulting to null if not found
    $phoneInfo = \App\Models\InfoText::where('key', 'top_bar_phone')->first();
    $phone = $phoneInfo ? $phoneInfo->value : null;

    $emailInfo = \App\Models\InfoText::where('key', 'top_bar_email')->first();
    $email = $emailInfo ? $emailInfo->value : null;

    $facebookUrl = \App\Models\InfoText::where('key', 'top_bar_facebook_url')->first()->value ?? null;
    $facebookUrl = ($facebookUrl && $facebookUrl !== '#') ? $facebookUrl : $unavailableRoute;

    $instagramUrl = \App\Models\InfoText::where('key', 'top_bar_instagram_url')->first()->value ?? null;
    $instagramUrl = ($instagramUrl && $instagramUrl !== '#') ? $instagramUrl : $unavailableRoute;

    $twitterUrl = \App\Models\InfoText::where('key', 'top_bar_twitter_url')->first()->value ?? null;
    $twitterUrl = ($twitterUrl && $twitterUrl !== '#') ? $twitterUrl : $unavailableRoute;

    $youtubeUrl = \App\Models\InfoText::where('key', 'top_bar_youtube_url')->first()->value ?? null;
    $youtubeUrl = ($youtubeUrl && $youtubeUrl !== '#') ? $youtubeUrl : $unavailableRoute;

    $tiktokUrl = \App\Models\InfoText::where('key', 'top_bar_tiktok_url')->first()->value ?? null;
    $tiktokUrl = ($tiktokUrl && $tiktokUrl !== '#') ? $tiktokUrl : $unavailableRoute;
@endphp
<div
    class="bg-green-900 dark:bg-green-900 border-b border-green-800 dark:border-green-800 py-1.5 sm:py-2 text-[10px] sm:text-xs md:text-sm font-sans">
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl">
        <div class="flex items-center justify-between flex-wrap gap-1.5 sm:gap-2">
            <!-- Sebelah Kiri: Telepon dan Email -->
            <div
                class="flex items-center gap-2 sm:gap-3 md:gap-4 flex-wrap text-[10px] sm:text-xs md:text-[13px] text-white">
                @if($phone)
                    @php
                        // Format phone number: ensure it starts with 0 (e.g. 0813...) instead of 62 or +62
                        $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
                        if (str_starts_with($cleanPhone, '62')) {
                            $displayPhone = '0' . substr($cleanPhone, 2);
                        } elseif (str_starts_with($cleanPhone, '8')) {
                            $displayPhone = '0' . $cleanPhone;
                        } else {
                            $displayPhone = $phone; // Fallback or if already has 0
                        }
                    @endphp
                    <div class="flex items-center gap-1 sm:gap-1.5 hover:text-gray-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-3 w-3 sm:h-3.5 sm:w-3.5 md:h-[18px] md:w-[18px] shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="font-medium text-[10px] sm:text-xs md:text-[13px]">{{ $displayPhone }}</span>
                    </div>
                @endif
                @if($email)
                    <div
                        class="flex items-center gap-1 sm:gap-1.5 hover:text-gray-200 transition-colors max-w-[150px] sm:max-w-[200px] md:max-w-none">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-3 w-3 sm:h-3.5 sm:w-3.5 md:h-[18px] md:w-[18px] shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="font-medium truncate text-[10px] sm:text-xs md:text-[13px]">{{ $email }}</span>
                    </div>
                @endif
            </div>

            <!-- Sebelah Kanan: Icon Sosial Media Putih -->
            <div class="flex items-center gap-3 sm:gap-4 md:gap-5">
                <!-- Facebook -->
                <a href="{{ $facebookUrl }}" target="_blank" rel="noopener noreferrer"
                    class="text-white hover:opacity-80 transition-opacity duration-300 transform hover:scale-110"
                    aria-label="Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                </a>
                <!-- Instagram -->
                <a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer"
                    class="text-white hover:opacity-80 transition-opacity duration-300 transform hover:scale-110"
                    aria-label="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                </a>
                <!-- X (Twitter) -->
                <a href="{{ $twitterUrl }}" target="_blank" rel="noopener noreferrer"
                    class="text-white hover:opacity-80 transition-opacity duration-300 transform hover:scale-110"
                    aria-label="X (Twitter)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                    </svg>
                </a>
                <!-- YouTube -->
                <a href="{{ $youtubeUrl }}" target="_blank" rel="noopener noreferrer"
                    class="text-white hover:opacity-80 transition-opacity duration-300 transform hover:scale-110"
                    aria-label="YouTube">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </a>
                <!-- TikTok -->
                <a href="{{ $tiktokUrl }}" target="_blank" rel="noopener noreferrer"
                    class="text-white hover:opacity-80 transition-opacity duration-300 transform hover:scale-110"
                    aria-label="TikTok">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>