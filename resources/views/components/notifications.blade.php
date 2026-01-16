{{-- Global Notification System --}}
{{-- Digunakan untuk menampilkan notifikasi sukses/error (Toast) --}}
{{-- Termasuk container Flash Message yang dibaca oleh Javascript --}}

@if(session('success'))
    <div data-flash-status class="hidden">{{ session('success') }}</div>
@endif

@if(session('status'))
    <div data-flash-status class="hidden">{{ session('status') }}</div>
@endif

@if(session('error'))
    <div data-flash-error class="hidden">{{ session('error') }}</div>
@endif

@if(session('login_success'))
    <meta name="login-success" content="true">
@endif

<!-- Public Notification Modal (Toast Container) -->
<div id="public-notification-modal"
    class="fixed inset-0 z-9999 hidden pointer-events-none">
    <div id="public-notification-content"
        class="w-full transition-transform duration-500 -translate-y-full pointer-events-auto">
        {{-- Content akan di-inject oleh notification.js --}}
    </div>
</div>
