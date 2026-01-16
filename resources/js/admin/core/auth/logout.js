/**
 * Logout Handler
 * Dipakai di: admin layout
 */
document.addEventListener('DOMContentLoaded', function () {
    const logoutBtn = document.getElementById('btn-logout-trigger');
    const logoutModal = document.getElementById('logout-modal');
    const cancelLogoutBtn = document.getElementById('logout-cancel-btn');
    const confirmLogoutBtn = document.getElementById('logout-confirm-btn');

    if (logoutBtn && logoutModal) {
        logoutBtn.addEventListener('click', function (e) {
            e.preventDefault();
            logoutModal.classList.remove('hidden');
            logoutModal.classList.add('flex');
        });
    }

    if (cancelLogoutBtn && logoutModal) {
        cancelLogoutBtn.addEventListener('click', function () {
            logoutModal.classList.add('hidden');
            logoutModal.classList.remove('flex');
        });
    }

    if (confirmLogoutBtn && logoutModal) {
        confirmLogoutBtn.addEventListener('click', function () {
            logoutModal.classList.add('hidden');
            logoutModal.classList.remove('flex');
            // Submit logout form
            const logoutForm = document.getElementById('logout-form');
            if (logoutForm) {
                logoutForm.submit();
            }
        });
    }

    // Close modal on backdrop click
    if (logoutModal) {
        logoutModal.addEventListener('click', function (e) {
            if (e.target === logoutModal) {
                logoutModal.classList.add('hidden');
                logoutModal.classList.remove('flex');
            }
        });
    }
});
