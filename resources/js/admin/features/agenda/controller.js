/**
 * Schedule (Agenda) Form Handler
 * Enhanced with proper change detection and modal integration
 */

import { FormChangeTracker } from '../../modules/form/validation/form-change-detection.js';

window.initScheduleForm = function (options = {}) {
    const {
        formId = 'agenda-form',
        bodyEditorId = 'body-editor',
        tanggalMulaiId = 'tanggal_mulai',
        tanggalSelesaiId = 'tanggal_selesai',
        statusSelectId = 'status-select',
        isActiveInputId = 'is_active',
        submitBtnId = 'submit-btn',
        submitBtnTextId = 'submit-btn-text'
    } = options;

    const form = document.getElementById(formId);
    if (!form) return;

    // Import FormChangeTracker for change detection
    if (typeof FormChangeTracker === 'undefined') {
        // console.error('FormChangeTracker not loaded');
        return;
    }

    // Initialize change tracking
    const tracker = new FormChangeTracker(form);

    // Initialize submit button state management
    tracker.startMonitoring((hasChanged) => {
        const submitBtn = document.getElementById(submitBtnId);
        if (submitBtn) {
            submitBtn.disabled = !hasChanged;
            if (hasChanged) {
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                submitBtn.removeAttribute('disabled');
            } else {
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                submitBtn.setAttribute('disabled', 'disabled');
            }
        }
    });

    // Sync Status Select to Hidden Input (is_active)
    // Note: This legacy support is kept but improved.
    // Ideally backend should accept 'status' directly like announcement module.
    // For now we assume the view might use a hidden input for status or is_active
    const statusSelect = document.getElementById(statusSelectId);
    // Cek apakah ada input 'status' (string) atau 'is_active' (boolean legacy)
    // Berdasarkan request terakhir, kita ingin konsisten dengan publikasi/pengumuman (Publish, Draft, Nonaktif)
    // Jadi sebaiknya kita pastikan backend menerima 'status' string.
    
    // Namun jika view masih pakai is_active hidden, kita sesuaikan.
    // Tapi view create/edit blade sudah diupdate untuk kirim 'status' (seharusnya, tapi saya cek file blade masih is_active hidden)
    // Mari kita perbaiki logika ini agar view blade dan JS sinkron.
    
    // Logic:
    // Jika ada element hidden dengan name="status", kita update valuenya.
    // Jika ada element hidden dengan name="is_active", kita update valuenya (1/0).
    
    if (statusSelect) {
        statusSelect.addEventListener('change', function() {
            // Trigger change event to notify FormChangeTracker
            statusSelect.dispatchEvent(new Event('input', { bubbles: true }));
        });
    }

    // Initialize Unsaved Changes Modal
    if (typeof window.initUnsavedChangesModal === 'function') {
        window.initUnsavedChangesModal({
            formId: formId,
            submitBtnId: submitBtnId,
            modalId: 'confirm-modal'
        });
    }

    // Custom date validation
    const startEl = document.getElementById(tanggalMulaiId);
    const endEl = document.getElementById(tanggalSelesaiId);

    function validateDates() {
        if (startEl && endEl && startEl.value && endEl.value) {
            const start = new Date(startEl.value);
            const end = new Date(endEl.value);

            if (end < start) {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan Tanggal',
                        text: 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
                        confirmButtonColor: '#15803d', // green-700
                    });
                } else {
                    alert('Tanggal selesai harus setelah atau sama dengan tanggal mulai.');
                }
                return false;
            }
        }
        return true;
    }

    // Validasi saat tombol submit diklik (form submit)
    form.addEventListener('submit', function(e) {
        if (!validateDates()) {
            e.preventDefault();
            e.stopPropagation();
        }
    });

    // TinyMCE integration with onContentChange
    const initializeTinyMCEDetection = () => {
        const textarea = document.getElementById(bodyEditorId);
        if (textarea && typeof window.TinyMCECommon !== 'undefined') {
            window.TinyMCECommon.init(bodyEditorId, {
                height: 400,
                onContentChange: function() {
                    // Sync content to textarea
                    textarea.value = window.TinyMCECommon.getContent(bodyEditorId);
                    // Trigger form change detection
                    textarea.dispatchEvent(new Event('input', { bubbles: true }));
                    textarea.dispatchEvent(new Event('change', { bubbles: true }));
                }
            });
        }
    };

    // Initialize with retry for async loading
    const initWithRetry = (attempts = 0) => {
        try {
            if (typeof window.TinyMCECommon === 'undefined') {
                if (attempts < 3) {
                    setTimeout(() => initWithRetry(attempts + 1), 500);
                    return;
                }
            } else {
                initializeTinyMCEDetection();
            }
        } catch (error) {
            if (attempts < 3) {
                setTimeout(() => initWithRetry(attempts + 1), 500);
            }
        }
    };

    initWithRetry();
};
