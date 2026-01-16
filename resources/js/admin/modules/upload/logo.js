/**
 * Upload Logo
 * Digunakan untuk upload dan preview logo dengan drag & drop
 * Dipakai di: admin/pages/web-appearance/web-appearance.blade.php
 */

import { ImageNotificationHandler } from './image-notification-handler.js';

window.handleLogoFileSelect = function (event) {
    const file = event.target.files[0];
    if (!file) return;
    // Use global FileValidation for consistent error messages
    if (window.FileValidation) {
        if (!window.FileValidation.validateImage(file, 5 * 1024 * 1024)) {
            event.target.value = '';
            return;
        }
    } else {
        // Fallback validation
        if (!file.type || !file.type.startsWith('image/')) {
            event.target.value = '';
            return;
        }
        if (file.size > 5 * 1024 * 1024) {
            ImageNotificationHandler.showSizeLimitError(file.name);
            event.target.value = '';
            return;
        }
    }
    const reader = new FileReader();
    reader.onload = function (e) {
        showLogoPreview(e.target.result);
    };
    reader.readAsDataURL(file);
};

window.handleLogoDrop = function (event) {
    event.preventDefault();
    event.stopPropagation();

    const card = document.getElementById('logo-upload-card');
    if (card) {
        card.classList.remove('border-green-500', 'dark:border-green-600');
        card.classList.add('border-gray-300', 'dark:border-slate-600');
    }

    const files = event.dataTransfer.files;
    if (files.length > 0) {
        const file = files[0];

        // Use global FileValidation for consistent error messages
        if (window.FileValidation) {
            if (!window.FileValidation.validateImage(file, 5 * 1024 * 1024)) {
                return;
            }
        } else {
            // Fallback validation
            if (!file.type || !file.type.startsWith('image/')) {
                return;
            }
            if (file.size > 5 * 1024 * 1024) {
                ImageNotificationHandler.showSizeLimitError(file.name);
                return;
            }
        }
        const reader = new FileReader();
        reader.onload = function (e) {
            showLogoPreview(e.target.result);
        };
        reader.readAsDataURL(file);
    }
};

window.handleLogoDragOver = function (event) {
    event.preventDefault();
    event.stopPropagation();

    const card = document.getElementById('logo-upload-card');
    if (card) {
        card.classList.remove('border-gray-300', 'dark:border-slate-600');
        card.classList.add('border-green-500', 'dark:border-green-600');
    }
};

window.handleLogoDragLeave = function (event) {
    event.preventDefault();
    event.stopPropagation();

    const card = document.getElementById('logo-upload-card');
    if (card) {
        card.classList.remove('border-green-500', 'dark:border-green-600');
        card.classList.add('border-gray-300', 'dark:border-slate-600');
    }
};

window.showLogoPreview = function (imageSrc) {
    const defaultEl = document.getElementById('logo-upload-default');
    const previewContainer = document.getElementById('logo-preview-container');
    const previewImg = document.getElementById('logo-preview-img');
    const submitBtn = document.getElementById('logo-submit-btn');

    if (defaultEl) defaultEl.classList.add('hidden');
    if (previewContainer) previewContainer.classList.remove('hidden');
    if (previewImg) previewImg.src = imageSrc;

    if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.classList.remove('disabled:opacity-50', 'disabled:cursor-not-allowed');
        submitBtn.removeAttribute('disabled');
    }
};

window.resetLogoImage = function () {
    const defaultEl = document.getElementById('logo-upload-default');
    const previewContainer = document.getElementById('logo-preview-container');
    const previewImg = document.getElementById('logo-preview-img');
    const logoUpload = document.getElementById('logo-upload');
    const submitBtn = document.getElementById('logo-submit-btn');

    if (defaultEl) defaultEl.classList.remove('hidden');
    if (previewContainer) previewContainer.classList.add('hidden');
    if (previewImg) previewImg.src = '';
    if (logoUpload) logoUpload.value = '';

    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.classList.add('disabled:opacity-50', 'disabled:cursor-not-allowed');
        submitBtn.setAttribute('disabled', 'disabled');
    }
};

// Initialize logo upload handlers
document.addEventListener('DOMContentLoaded', function () {
    function initLogoFormHandlers() {
        const logoUpload = document.getElementById('logo-upload');
        const logoUploadCard = document.getElementById('logo-upload-card');
        const logoUploadTrigger = document.getElementById('logo-upload-trigger');
        const logoResetBtn = document.getElementById('logo-reset-btn');

        if (logoUpload && logoUploadCard) {
            // Change handler untuk file input
            logoUpload.addEventListener('change', window.handleLogoFileSelect);

            // Click handler untuk upload card
            logoUploadCard.addEventListener('click', function (e) {
                if (!e.target.closest('#logo-preview-container') && !e.target.closest('button')) {
                    logoUpload.click();
                }
            });

            // Click handler untuk trigger button
            if (logoUploadTrigger) {
                logoUploadTrigger.addEventListener('click', function (e) {
                    e.stopPropagation();
                    logoUpload.click();
                });
            }

            // Drag & drop handlers
            logoUploadCard.addEventListener('dragover', window.handleLogoDragOver);
            logoUploadCard.addEventListener('dragleave', window.handleLogoDragLeave);
            logoUploadCard.addEventListener('drop', window.handleLogoDrop);
        }

        if (logoResetBtn) {
            logoResetBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                window.resetLogoImage();
            });
        }
    }

    initLogoFormHandlers();
});
