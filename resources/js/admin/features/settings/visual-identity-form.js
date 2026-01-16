/**
 * Visual Identity Form Handler
 * Menangani validasi file upload dan toast notification untuk:
 * - Logo upload
 * - Banner upload
 * - Promosi upload
 */

document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('visual-identity-container');
    if (!container) return;

    // Array untuk menyimpan input file yang di-monitor untuk validasi server error
    // Note: Event listener handling (drag & drop, change) ditangani oleh modul terpisah:
    // - Logo: modules/upload/logo.js
    // - Banner: modules/upload/banner.js
    // - Promosi: modules/upload/banner.js
    const fileInputs = [
        {
            id: 'logo-upload',
            maxSize: 5 * 1024 * 1024,
            allowedTypes: ['image/png', 'image/jpeg', 'image/svg+xml', 'image/webp']
        },
        {
            id: 'gambar',
            maxSize: 5 * 1024 * 1024,
            allowedTypes: ['image/png', 'image/jpeg', 'image/webp']
        },
        {
            id: 'promosi_banner',
            maxSize: 5 * 1024 * 1024,
            allowedTypes: ['image/png', 'image/jpeg', 'image/webp']
        }
    ];

    /**
     * Check for server validation errors on page load
     */
    function checkServerValidationErrors() {
        fileInputs.forEach(config => {
            const fileInput = document.getElementById(config.id);
            if (!fileInput) return;

            // Find error message near this input
            let errorEl = fileInput.nextElementSibling;
            let errorText = null;

            while (errorEl && !errorText) {
                if (errorEl.classList?.contains('text-red-600') || errorEl.hasAttribute('data-error')) {
                    errorText = errorEl.textContent?.trim();
                    break;
                }
                errorEl = errorEl?.nextElementSibling;
            }

            // Also check data-flash-error
            if (!errorText) {
                const flashError = document.querySelector('[data-flash-error]');
                if (flashError) {
                    const errorMsg = flashError.textContent?.trim();
                    if (errorMsg && (errorMsg.includes('terlalu besar') || errorMsg.includes(config.id))) {
                        errorText = errorMsg;
                    }
                }
            }

            if (errorText && (errorText.includes('terlalu besar') || errorText.includes('format') || errorText.includes('gambar'))) {
                showFileValidationError(errorText);
            }
        });
    }

    /**
     * Display file validation error as toast
     */
    function showFileValidationError(message) {
        if (typeof window.showPublicNotification === 'function') {
            window.showPublicNotification(message, 'error');
        } else if (typeof window.showAdminNotification === 'function') {
            window.showAdminNotification(message, 'error');
        }
    }

    // Check for server validation errors on page load
    setTimeout(checkServerValidationErrors, 100);
});
