document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('activity-video-form');
    if (!form) return;

    const submitBtn = document.getElementById('submit-btn');
    const judulInput = document.getElementById('judul');
    const youtubeUrlInput = document.getElementById('youtube_url');

    // Store initial values
    const initialState = {
        judul: judulInput ? judulInput.value : '',
        youtube_url: youtubeUrlInput ? youtubeUrlInput.value : ''
    };

    // Function to check if form has changes and is valid
    function updateSubmitButtonState() {
        if (!submitBtn || !judulInput || !youtubeUrlInput) return;

        const currentJudul = judulInput.value.trim();
        const currentUrl = youtubeUrlInput.value.trim();

        // Check if there are any changes
        const hasChanges =
            currentJudul !== initialState.judul ||
            currentUrl !== initialState.youtube_url;

        // Check if fields are filled
        const isValid = currentJudul.length > 0 && currentUrl.length > 0;

        // Enable button only if there are changes AND fields are filled
        if (hasChanges && isValid) {
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            submitBtn.classList.add('hover:bg-green-800');
        } else {
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            submitBtn.classList.remove('hover:bg-green-800');
        }
    }

    // Add event listeners to inputs
    if (judulInput) {
        judulInput.addEventListener('input', updateSubmitButtonState);
    }
    if (youtubeUrlInput) {
        youtubeUrlInput.addEventListener('input', updateSubmitButtonState);
    }

    // Initialize button state
    updateSubmitButtonState();

    if (typeof window.initUnsavedChangesModal === 'function') {
        window.initUnsavedChangesModal({
            formId: 'activity-video-form',
            submitBtnId: 'submit-btn',
            modalId: 'confirm-modal',
            backBtnId: 'back-btn',
            cancelBtnId: 'cancel-btn'
        });
    }

    // Validation Logic
    form.addEventListener('submit', function (e) {
        const urlInput = document.getElementById('youtube_url');
        if (!urlInput) return;

        const url = urlInput.value.trim();
        // Regex for YouTube URL (Standard & Short)
        const youtubeRegex = /^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/;

        if (!youtubeRegex.test(url)) {
            e.preventDefault(); // Stop submission

            // Show Toast
            const modal = document.getElementById('video-error-modal');
            const modalText = document.getElementById('video-error-modal-text');

            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');

                requestAnimationFrame(() => {
                    modal.classList.remove('-translate-y-full', 'opacity-0');
                    modal.classList.add('translate-y-0', 'opacity-100');
                });

                // Auto hide
                setTimeout(() => {
                    modal.classList.add('-translate-y-full', 'opacity-0');
                    modal.classList.remove('translate-y-0', 'opacity-100');
                    setTimeout(() => {
                        modal.classList.add('hidden');
                        modal.classList.remove('flex');
                    }, 500);
                }, 3000);
            } else {
                alert('Link Youtube tidak valid. Harap masukkan link yang benar.');
            }
        }
    });

    const serverErrorEl = document.querySelector('[data-video-error-message]');
    const serverMessage = serverErrorEl ? (serverErrorEl.getAttribute('data-video-error-message') || '') : '';
    if (serverMessage) {
        const modal = document.getElementById('video-error-modal');
        const modalText = document.getElementById('video-error-modal-text');
        if (modal && modalText) {
            modalText.textContent = serverMessage;
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            requestAnimationFrame(() => {
                modal.classList.remove('-translate-y-full', 'opacity-0');
                modal.classList.add('translate-y-0', 'opacity-100');
            });

            setTimeout(() => {
                modal.classList.add('-translate-y-full', 'opacity-0');
                modal.classList.remove('translate-y-0', 'opacity-100');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }, 500);
            }, 3000);
        }
    }
});
