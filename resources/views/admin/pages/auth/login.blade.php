<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Control Panel</title>

    <!-- Favicon Admin - Selalu menggunakan icon default, tidak mengikuti logo yang diupload -->
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23ffffff' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'/%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z'/%3E%3C/svg%3E">
    <link rel="icon" type="image/svg+xml" media="(prefers-color-scheme: light)"
        href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23000000' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'/%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z'/%3E%3C/svg%3E">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js', 'resources/js/admin/admin.js'])
</head>

<body
    class="min-h-screen bg-slate-100 dark:bg-slate-900 flex items-center justify-center px-4 font-sans text-base font-semibold">
    <div class="w-full max-w-md bg-white dark:bg-slate-800 rounded-2xl shadow-sm p-8 space-y-6">
        <div class="text-center space-y-3">
            <!-- Icon Control Panel - Icon tetap terlihat, card pembungkus di-hidden -->
            <div class="flex items-center justify-center">
                <!-- Card pembungkus di-hidden -->
                <div class="hidden">
                    <div
                        class="flex items-center justify-center w-32 h-32 bg-linear-to-br from-slate-50 to-slate-100 rounded-xl border-2 border-slate-200 shadow-sm">
                        <svg class="w-20 h-20 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                </div>
                <!-- Icon tetap terlihat -->
                <svg class="w-24 h-24 text-slate-900 dark:text-white" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>

            <div>
                <h1 class="text-4xl font-bold text-slate-900 dark:text-white tracking-tight">Control Panel</h1>
                <p class="text-base text-slate-500 dark:text-slate-300 mt-1 font-medium text-center">Masuk untuk
                    mengelola konten website</p>
            </div>
        </div>

        <form action="{{ route('cpanel.login.attempt') }}" method="POST" class="space-y-4" data-notify="loading">
            @csrf
            <div class="space-y-1">
                <label for="admin-login"
                    class="text-base font-semibold text-slate-700 dark:text-slate-200">Username</label>
                <input id="admin-login" type="text" name="username" value="{{ old('username') }}" required autofocus
                    class="w-full border border-gray-500 dark:border-slate-600 px-3 py-1.5 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 placeholder:text-slate-400 placeholder:font-normal focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none rounded transition-all"
                    placeholder="Masukkan Username" autocomplete="username">
            </div>

            <div class="space-y-1">
                <label for="admin-password"
                    class="text-base font-semibold text-slate-700 dark:text-slate-200">Password</label>
                <input id="admin-password" type="password" name="password" required
                    class="w-full border border-gray-500 dark:border-slate-600 px-3 py-1.5 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 placeholder:text-slate-400 placeholder:font-normal focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none rounded transition-all"
                    placeholder="Masukkan Password">
            </div>

            <button type="submit"
                class="w-full bg-green-700 dark:bg-green-700 hover:bg-green-800 dark:hover:bg-green-800 text-white font-semibold py-2 text-base transition-colors rounded shadow-sm">
                Masuk
            </button>
        </form>
    </div>

    <x-notifications />
</body>

</html>