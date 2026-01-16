/**
 * Credentials Settings Handler
 * Handles username and password change logic including validation and UI states
 */

function initChangeUsername() {
    const form = document.getElementById('changeUsernameForm');
    const pwd = document.getElementById('current_password');
    const user = document.getElementById('username');
    const submitBtn = document.getElementById('submitUsernameBtn');
    const usernameCounter = document.getElementById('usernameCounter');

    if (!form || !pwd || !user || !submitBtn) return;

    // Simpan nilai awal username
    const initialUsername = user.value.trim();

    // Fungsi untuk toggle disabled state username input
    const toggleUsernameInput = () => {
        const hasPwd = pwd.value.trim().length > 0;
        user.disabled = !hasPwd;
    };

    // Fungsi untuk toggle disabled state submit button
    const toggleSubmitButton = () => {
        const hasPwd = pwd.value.trim().length > 0;
        const currentUsername = user.value.trim();
        const usernameChanged = currentUsername !== initialUsername;

        // Disable jika password kosong atau username belum diubah/kembali ke nilai awal
        submitBtn.disabled = !hasPwd || !usernameChanged;
    };

    // Check initial state
    toggleUsernameInput();
    toggleSubmitButton();

    // Event Listeners for Password
    const pwdEvents = ['input', 'paste', 'cut'];
    pwdEvents.forEach(event => {
        pwd.addEventListener(event, () => {
            // Use timeout for paste/cut to ensure value is updated
            const delay = event === 'input' ? 0 : 0;
            setTimeout(() => {
                toggleUsernameInput();
                toggleSubmitButton();
                if (event === 'input') pwd.setCustomValidity('');
            }, delay);
        });
    });

    pwd.addEventListener('invalid', function () {
        this.setCustomValidity('Kata sandi saat ini wajib diisi.');
    });

    // Event Listeners for Username
    const userEvents = ['input', 'paste', 'cut'];
    userEvents.forEach(event => {
        user.addEventListener(event, () => {
            const delay = event === 'input' ? 0 : 0;
            setTimeout(() => {
                toggleSubmitButton();
                if (event === 'input') user.setCustomValidity('');
            }, delay);
        });
    });

    user.addEventListener('invalid', function () {
        this.setCustomValidity(this.validity.valueMissing ? 'Username baru wajib diisi.' : 'Username baru hanya boleh menggunakan huruf, angka, underscore (_), dan dash (-).');
    });
}

function initChangePassword() {
    const form = document.getElementById('changePasswordForm');
    const currentPwd = document.getElementById('current_password');
    const newPwd = document.getElementById('password');
    const confirmPwd = document.getElementById('password_confirmation');
    const submitBtn = document.getElementById('submitPasswordBtn');

    if (!form || !currentPwd || !newPwd || !confirmPwd || !submitBtn) return;

    // Fungsi untuk toggle disabled state submit button
    const toggleSubmitButton = () => {
        const hasCurrentPwd = currentPwd.value.trim().length > 0;
        const hasNewPwd = newPwd.value.trim().length > 0;
        const hasConfirmPwd = confirmPwd.value.trim().length > 0;
        const passwordsMatch = newPwd.value.trim() === confirmPwd.value.trim();

        // Disable jika ada field yang kosong atau password tidak match
        submitBtn.disabled = !hasCurrentPwd || !hasNewPwd || !hasConfirmPwd || !passwordsMatch;
    };

    // Check initial state
    toggleSubmitButton();

    // Custom Validity Messages
    currentPwd.addEventListener('invalid', function () {
        this.setCustomValidity('Kata sandi saat ini wajib diisi.');
    });

    newPwd.addEventListener('invalid', function () {
        this.setCustomValidity('Kata sandi baru wajib diisi.');
    });

    confirmPwd.addEventListener('invalid', function () {
        this.setCustomValidity('Konfirmasi kata sandi baru wajib diisi.');
    });

    // Clear validity on input
    [currentPwd, newPwd, confirmPwd].forEach(input => {
        input.addEventListener('input', function () {
            this.setCustomValidity('');
        });
    });

    // Listen to all password input changes (typing, paste, cut)
    const passwordInputs = [currentPwd, newPwd, confirmPwd];
    const events = ['input', 'paste', 'cut'];

    passwordInputs.forEach(input => {
        events.forEach(event => {
            input.addEventListener(event, () => {
                const delay = event === 'input' ? 0 : 0;
                setTimeout(toggleSubmitButton, delay);
            });
        });
    });
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('changeUsernameForm')) {
        initChangeUsername();
    }
    if (document.getElementById('changePasswordForm')) {
        initChangePassword();
    }
});
