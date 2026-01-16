import { FormChangeTracker } from '../../modules/form/validation/form-change-detection.js';

// Inisialisasi form profil sekolah
window.initSchoolProfileForm = function () {
    const form = document.getElementById('school-profile-form');
    if (!form) return;

    const saveBtn = document.getElementById('submit-btn');
    // Deteksi perubahan form dan kontrol tombol simpan
    const tracker = new FormChangeTracker(form);

    tracker.startMonitoring((hasChanged) => {
        if (saveBtn) {
            saveBtn.disabled = !hasChanged;
            if (hasChanged) {
                saveBtn.classList.remove('disabled:opacity-50', 'disabled:cursor-not-allowed');
                saveBtn.removeAttribute('disabled');
            } else {
                saveBtn.classList.add('disabled:opacity-50', 'disabled:cursor-not-allowed');
                saveBtn.setAttribute('disabled', 'disabled');
            }
        }

        // Sync floating button
        const floatingBtn = document.getElementById('submit-btn-floating');
        if (floatingBtn && saveBtn) {
            floatingBtn.disabled = saveBtn.disabled;
            if (saveBtn.disabled) {
                floatingBtn.classList.add('opacity-50', 'cursor-not-allowed', 'shadow-none');
            } else {
                floatingBtn.classList.remove('opacity-50', 'cursor-not-allowed', 'shadow-none');
            }
        }
    });

    // Handle floating button click
    const floatingBtn = document.getElementById('submit-btn-floating');
    if (floatingBtn) {
        floatingBtn.addEventListener('click', (e) => {
            if (saveBtn) {
                e.preventDefault();
                saveBtn.click();
            }
        });
    }

    // ... (rest of the content) ...
    // Inisialisasi modal perubahan belum disimpan
    if (typeof window.initUnsavedChangesModal === 'function') {
        window.initUnsavedChangesModal({
            formId: 'school-profile-form',
            submitBtnId: 'submit-btn',
            modalId: 'confirm-modal'
        });
    }

    // Integrasi TinyMCE untuk editor teks
    const editorIds = ['deskripsi_sekolah', 'sejarah', 'visi', 'misi', 'tujuan', 'kepala_sekolah_sambutan'];

    editorIds.forEach(editorId => {
        const textarea = document.getElementById(editorId);
        if (textarea && typeof window.TinyMCECommon !== 'undefined') {
            window.TinyMCECommon.init(editorId, {
                height: 400,
                onContentChange: function () {
                    // Sync content to textarea
                    textarea.value = window.TinyMCECommon.getContent(editorId);
                    // Trigger form change detection
                    textarea.dispatchEvent(new Event('input', { bubbles: true }));
                    textarea.dispatchEvent(new Event('change', { bubbles: true }));
                }
            });

            // Add direct editor change event listener for wordcount
            setTimeout(() => {
                if (typeof window.tinymce === 'undefined') return;

                const editor = window.tinymce.get(editorId);
                if (editor) {
                    editor.on('change keyup input', function () {
                        textarea.dispatchEvent(new Event('input', { bubbles: true }));
                        textarea.dispatchEvent(new Event('change', { bubbles: true }));
                    });
                }
            }, 100);
        }
    });

    // Integrasi upload gambar
    if (typeof window.initGenericImageUpload === 'function') {
        const imageConfigs = [
            { inputId: 'gambar_sekolah', placeholderId: 'upload-placeholder-sekolah', previewContainerId: 'preview-container-sekolah', previewImageId: 'preview-img-sekolah', removeBtnId: 'remove-sekolah-btn', deleteInputId: 'delete_gambar_sekolah', dropZoneId: 'drop-zone-sekolah' },
            { inputId: 'struktur_organisasi', placeholderId: 'upload-placeholder-struktur', previewContainerId: 'preview-container-struktur', previewImageId: 'preview-img-struktur', removeBtnId: 'remove-struktur-btn', deleteInputId: 'delete_struktur_organisasi', dropZoneId: 'drop-zone-struktur' },
            { inputId: 'kepala_sekolah_foto', placeholderId: 'upload-placeholder-kepsek', previewContainerId: 'preview-container-kepsek', previewImageId: 'preview-img-kepsek', removeBtnId: 'remove-kepsek-btn', deleteInputId: 'delete_kepala_sekolah_foto', dropZoneId: 'drop-zone-kepsek' }
        ];

        imageConfigs.forEach(config => {
            window.initGenericImageUpload(config);
        });
    }
};

// Auto-initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('school-profile-form')) {
        window.initSchoolProfileForm();
    }
});
