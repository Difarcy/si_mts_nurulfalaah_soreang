@extends('admin.layouts.admin')

@section('title', 'Ubah Username')

@section('content')
    <div class="max-w-2xl">
        <div class="mb-6">
            <h1 class="text-lg sm:text-2xl font-bold text-slate-900 dark:text-white">Ubah Username</h1>
            <p class="text-slate-600 dark:text-slate-400 mt-1">Ubah username akun admin Anda</p>
        </div>

        @if(session('status'))
            <meta name="session-status" content="{{ session('status') }}">
        @endif
        <div class="bg-white dark:bg-slate-900 border border-gray-300 dark:border-slate-700 p-6 rounded">
            <form action="{{ route('cpanel.change-username.update') }}" method="POST" class="space-y-6"
                id="changeUsernameForm" data-notify="loading" data-unsaved-changes="true">
                @csrf
                @method('PUT')

                <div>
                    <label for="current_password" class="block text-base font-semibold text-slate-700 dark:text-white mb-2">
                        Kata Sandi Saat Ini
                    </label>
                    <input type="password" id="current_password" name="current_password" required
                        autocomplete="current-password"
                        class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 text-base sm:text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none rounded transition-all"
                        placeholder="Masukkan kata sandi saat ini untuk verifikasi">
                    @error('current_password')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="username" class="block text-base font-semibold text-slate-700 dark:text-white mb-2">
                        Username Baru
                    </label>
                    <div class="relative">
                        <input type="text" id="username" name="username"
                            value="{{ old('username', Auth::user()->username) }}" required maxlength="50"
                            pattern="[a-zA-Z0-9_\-]+" autocomplete="username"
                            class="w-full border-2 border-gray-200 dark:border-slate-600 px-3 py-1.5 text-base sm:text-base bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none transition-all disabled:opacity-50 disabled:cursor-not-allowed disabled:pointer-events-none disabled:bg-gray-100 dark:disabled:bg-slate-800 disabled:border-gray-300 dark:disabled:border-slate-600 disabled:text-gray-400 dark:disabled:text-slate-500 disabled:select-none rounded"
                            placeholder="Masukkan username baru (huruf, angka, underscore, dan dash)" disabled>
                    </div>
                    <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Hanya boleh menggunakan huruf, angka,
                        underscore (_), dan dash (-). Maksimal 50 karakter.</p>
                    @error('username')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end pt-4 border-t border-gray-200 dark:border-slate-700">
                    <button type="submit" id="submitUsernameBtn"
                        class="px-3 py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors disabled:opacity-50 disabled:cursor-not-allowed disabled:pointer-events-none disabled:bg-gray-400 dark:disabled:bg-gray-600 rounded"
                        disabled>
                        Ubah Username
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection