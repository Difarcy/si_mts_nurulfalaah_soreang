/**
 * Visual Identity Management
 * Mengelola logo, banner, dan informasi banner
 * Dipakai di: admin/pages/settings/visual-identity/visual-identity.blade.php
 */

window.initVisualIdentity = function (options = {}) {
    // Read config from data attributes if options are missing
    const container = document.getElementById('visual-identity-container');
    if (container) {
        if (options.currentBannerCount === undefined && container.dataset.currentBannerCount) {
            options.currentBannerCount = parseInt(container.dataset.currentBannerCount);
        }
        if (options.maxBanners === undefined && container.dataset.maxBanners) {
            options.maxBanners = parseInt(container.dataset.maxBanners);
        }
        if (!options.updateOrderRoute && container.dataset.updateOrderRoute) {
            options.updateOrderRoute = container.dataset.updateOrderRoute;
        }
    }

    // Set global variables used by banner.js and this file
    if (options.currentBannerCount !== undefined) {
        window.currentBannerCount = options.currentBannerCount;
    }
    if (options.maxBanners !== undefined) {
        window.maxBanners = options.maxBanners;
    }

    let initialFormsSnapshots = [];
    let initialSettingsSnapshot = {};

    window.resetAllPreviews = function () {
        // Reset logo preview
        if (typeof window.resetLogoImage === 'function') {
            window.resetLogoImage();
        }

        // Reset banner preview
        if (typeof window.resetBannerImage === 'function') {
            window.resetBannerImage();
        }

        // Reset file inputs as fallback
        const logoInput = document.querySelector('input[name="logo"]');
        if (logoInput) logoInput.value = '';
        const bannerInput = document.getElementById('gambar');
        if (bannerInput) bannerInput.value = '';
    };

    // Initialize on DOM ready
    function initializeVisualIdentity() {
        if (window.__viInitialized) { return; }
        window.__viInitialized = true;

        // Initialize pending deletions set
        window.__pendingBannerDeletions = new Map(); // Map id -> url
        window.__pendingDeletePromosi = false;

        // Helper: Mark Banner for Deletion
        function markBannerForDeletion(deleteUrl, id, element) {
            // Hide element
            if (element) {
                const bannerItem = element.closest('.banner-item');
                if (bannerItem) {
                    bannerItem.classList.add('hidden');
                }
            }

            // Add to pending
            if (id && deleteUrl) {
                window.__pendingBannerDeletions.set(id, deleteUrl);
            }

            // Update grid layout to center remaining banners
            if (typeof window.updateBannerGridLayout === 'function') {
                window.updateBannerGridLayout();
            }

            // Update save button
            if (typeof window.updateSaveButtonState === 'function') {
                window.updateSaveButtonState();
            }
        }

        // Helper: Mark Promosi for Deletion
        function markPromosiForDeletion() {
            // Hide preview
            const previewContainer = document.getElementById('promosi-preview-container');
            const defaultView = document.getElementById('promosi-upload-default');

            if (previewContainer) previewContainer.classList.add('hidden');
            if (defaultView) defaultView.classList.remove('hidden');

            // Set pending flag
            window.__pendingDeletePromosi = true;

            // Update save button
            if (typeof window.updateSaveButtonState === 'function') {
                window.updateSaveButtonState();
            }
        }

        // Initialize Deletion Handlers
        function initDeletionHandlers() {
            // Banner Deletion (Event Delegation)
            const bannerList = document.getElementById('banner-list');
            if (bannerList) {
                bannerList.addEventListener('click', function (e) {
                    const btn = e.target.closest('.js-delete-banner-btn');
                    if (btn) {
                        e.stopPropagation();
                        const url = btn.dataset.url;
                        const id = btn.dataset.id;
                        markBannerForDeletion(url, id, btn);
                    }
                });
            }

            // Promosi Deletion
            const resetPromosiBtn = document.getElementById('promosi-reset-btn');
            if (resetPromosiBtn) {
                resetPromosiBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    if (typeof window.resetPromosiImage === 'function') {
                        window.resetPromosiImage();
                    }
                });
            }

            const deletePromosiBtn = document.getElementById('delete-promosi-btn');
            if (deletePromosiBtn) {
                deletePromosiBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    markPromosiForDeletion();
                });
            }
        }

        initDeletionHandlers();

        // Snapshot awal semua form pada halaman untuk deteksi perubahan
        function captureInitialFormsSnapshots() {
            try {
                const forms = Array.from(document.querySelectorAll('form'));
                initialFormsSnapshots = forms.map(f => ({ form: f, snap: window.getFormSnapshot ? window.getFormSnapshot(f) : {} }));

                // Capture Settings Form Specifically
                const settingsForm = document.getElementById('settings-form');
                initialSettingsSnapshot = {};
                if (settingsForm) {
                    const inputs = settingsForm.querySelectorAll('input, textarea, select');
                    inputs.forEach(input => {
                        if (input.name) {
                            if (input.type === 'checkbox' || input.type === 'radio') {
                                initialSettingsSnapshot[input.name] = input.checked;
                            } else {
                                initialSettingsSnapshot[input.name] = input.value;
                            }
                        }
                    });
                }

                updateSaveButtonState(); // Update button state after capture
            } catch (_) {
                initialFormsSnapshots = [];
                initialSettingsSnapshot = {};
            }
        }
        function hasAnyFormChanged() {
            // Check for pending deletions first
            if ((window.__pendingBannerDeletions && window.__pendingBannerDeletions.size > 0) || window.__pendingDeletePromosi) {
                return true;
            }

            // Check if banner order has changed
            if (typeof window.hasBannerOrderChanged === 'function' && window.hasBannerOrderChanged()) {
                return true;
            }

            // Check file inputs and selected files
            const logoInput = document.getElementById('logo-upload');
            const bannerInput = document.getElementById('gambar');
            const promosiInput = document.getElementById('promosi_banner');
            const hasLogoFile = !!(logoInput && logoInput.files && logoInput.files.length > 0);

            // Periksa selectedBannerImages global menggunakan helper function
            // Input file #gambar mungkin masih kosong sampai syncBannerImagesToInput dipanggil
            const hasSelectedBannerImages = (typeof window.hasPendingBannerUploads === 'function' && window.hasPendingBannerUploads());
            const hasBannerFile = !!(bannerInput && bannerInput.files && bannerInput.files.length > 0);

            const hasPromosiFile = !!(promosiInput && promosiInput.files && promosiInput.files.length > 0);
            const hasSelectedPromosi = !!window.selectedPromosiImageKey;

            if (hasLogoFile || hasBannerFile || hasSelectedBannerImages || hasPromosiFile || hasSelectedPromosi) {
                return true;
            }

            // Check Settings Form specifically
            const settingsForm = document.getElementById('settings-form');
            if (settingsForm) {
                const inputs = settingsForm.querySelectorAll('input, textarea, select');
                for (const input of inputs) {
                    if (!input.name) continue;
                    // Skip hidden inputs like _token, _method unless necessary
                    if (input.type === 'hidden' && (input.name === '_token' || input.name === '_method' || input.name === '_redirect_after_save')) continue;

                    const initialVal = initialSettingsSnapshot[input.name];
                    let currentVal;

                    if (input.type === 'checkbox' || input.type === 'radio') {
                        currentVal = input.checked;
                    } else {
                        currentVal = input.value;
                    }

                    // Compare
                    if (initialVal !== undefined && initialVal !== currentVal) {
                        return true;
                    }
                }
            }

            if (!initialFormsSnapshots || initialFormsSnapshots.length === 0) return false;
            try {
                for (const { form, snap } of initialFormsSnapshots) {
                    if (window.hasFormChanged && typeof window.hasFormChanged === 'function') {
                        if (window.hasFormChanged(snap, form)) return true;
                    }
                }
            } catch (_) { }
            return false;
        }

        // Fungsi untuk mengupdate status tombol simpan
        window.updateSaveButtonState = function () {
            const saveBtn = document.getElementById('visual-identity-save-all-btn');
            const floatingBtn = document.getElementById('visual-identity-save-all-btn-floating');

            if (!saveBtn) return;

            const hasChanges = hasAnyFormChanged();

            if (hasChanges) {
                saveBtn.disabled = false;
                saveBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                saveBtn.removeAttribute('disabled');
            } else {
                saveBtn.disabled = true;
                saveBtn.classList.add('opacity-50', 'cursor-not-allowed');
                saveBtn.setAttribute('disabled', 'disabled');
            }

            // Sync floating button
            if (floatingBtn) {
                floatingBtn.disabled = saveBtn.disabled;
                if (saveBtn.disabled) {
                    floatingBtn.classList.add('opacity-50', 'cursor-not-allowed', 'shadow-none');
                } else {
                    floatingBtn.classList.remove('opacity-50', 'cursor-not-allowed', 'shadow-none');
                }
            }
        };

        // Handle floating button click
        const floatingBtn = document.getElementById('visual-identity-save-all-btn-floating');
        if (floatingBtn) {
            floatingBtn.addEventListener('click', (e) => {
                const saveBtn = document.getElementById('visual-identity-save-all-btn');
                if (saveBtn) {
                    e.preventDefault();
                    saveBtn.click();
                }
            });
        }

        // Tambahkan listener perubahan pada semua input form
        function initFormChangeListeners() {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                const inputs = form.querySelectorAll('input, textarea, select');
                inputs.forEach(input => {
                    ['input', 'change', 'blur', 'keyup', 'paste'].forEach(evt => {
                        input.addEventListener(evt, () => {
                            // Beri sedikit delay agar value terupdate
                            setTimeout(updateSaveButtonState, 50);
                        });
                    });
                });
            });

            // Observer untuk memantau perubahan pada DOM yang mungkin mempengaruhi form (seperti preview gambar)
            const observer = new MutationObserver(() => {
                // Beri sedikit delay untuk memastikan state internal (seperti selectedBannerImages) sudah terupdate
                setTimeout(updateSaveButtonState, 100);
            });

            forms.forEach(form => {
                observer.observe(form, { childList: true, subtree: true, attributes: true });
            });

            // Tambahkan listener khusus untuk perubahan pada variabel global banner
            // Karena MutationObserver mungkin tidak menangkap perubahan variabel JS murni
            const originalUpdatePreview = window.updateBannerImagesPreview;
            if (typeof window.updateBannerImagesPreview === 'function') {
                window.updateBannerImagesPreview = function () {
                    if (originalUpdatePreview) originalUpdatePreview.apply(this, arguments);
                    updateSaveButtonState();
                };
            }

            const originalPromosiSelect = window.handlePromosiFileSelect;
            if (typeof window.handlePromosiFileSelect === 'function') {
                window.handlePromosiFileSelect = function (e) {
                    if (originalPromosiSelect) originalPromosiSelect.apply(this, arguments);
                    updateSaveButtonState();
                };
            }
        }

        captureInitialFormsSnapshots();
        initFormChangeListeners();

        // Initialize Global Unsaved Changes Modal
        // Uses the existing hasAnyFormChanged logic as an extra check
        if (typeof window.initUnsavedChangesModal === 'function') {
            window.initUnsavedChangesModal({
                modalId: 'confirm-modal',
                // The layout includes 'unsaved-changes-modal.blade.php' which uses id="confirm-modal"
                // and standard button IDs. We can rely on defaults or specify them if needed.
                // Defaults: modalSaveBtnId='modal-save-btn', modalDiscardBtnId='modal-discard-btn', etc.

                extraCheck: hasAnyFormChanged,

                onSave: function (url) {
                    window.__unsavedPendingUrl = url;
                    const saveBtn = document.getElementById('visual-identity-save-all-btn');
                    if (saveBtn) {
                        saveBtn.click();
                    }
                },

                onDiscard: function (url) {
                    window.location.href = url;
                }
            });
        }

        // Global Save All handler
        const saveAllBtn = document.getElementById('visual-identity-save-all-btn');
        if (saveAllBtn) {
            saveAllBtn.addEventListener('click', async () => {
                let isReloading = false;

                // VALIDASI JUMLAH BANNER SEBELUM SIMPAN
                const currentCount = window.currentBannerCount || 0;
                let pendingDeleteCount = 0;
                if (window.__pendingBannerDeletions) {
                    pendingDeleteCount = window.__pendingBannerDeletions.size;
                }
                const pendingUploads = (window.selectedBannerImages || []).length;
                // Hitung total akhir: (existing - deleted) + new
                const totalBanners = Math.max(0, currentCount - pendingDeleteCount) + pendingUploads;
                const maxBanners = window.maxBanners || 6;

                if (totalBanners > maxBanners) {
                    const message = `Gagal menyimpan: Total banner melebihi batas maksimal (${maxBanners}). Saat ini: ${totalBanners}. Silakan hapus beberapa banner terlebih dahulu.`;
                    if (typeof window.showPublicNotification === 'function') {
                        window.showPublicNotification(message, 'error');
                    } else {
                        alert(message);
                    }
                    return;
                }

                const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                async function submitForm(formEl) {
                    const action = formEl.getAttribute('action');
                    const method = (formEl.getAttribute('method') || 'POST').toUpperCase();
                    const formId = formEl.getAttribute('id') || 'unknown';

                    // Khusus form upload banner: pastikan input files tersinkron dari selectedBannerImages
                    try {
                        if (typeof window.syncBannerImagesToInput === 'function') {
                            window.syncBannerImagesToInput();
                        }
                    } catch (err) {
                        console.error('[Visual Identity] Error syncing banner images for ' + formId, err);
                    }

                    const bannerInput = formEl.querySelector('input[name="gambar[]"]');
                    const isBannerUpload = action && (action.includes('/cpanel/visual-identity/banner') || action.includes('/cpanel/banners/upload'));
                    let fd;
                    if (isBannerUpload) {
                        const hasSelectedBannerImages = (typeof window.hasPendingBannerUploads === 'function' && window.hasPendingBannerUploads());
                        const hasBannerFiles = !!(bannerInput && bannerInput.files && bannerInput.files.length > 0);

                        if (hasSelectedBannerImages && !hasBannerFiles && Array.isArray(window.selectedBannerImages)) {
                            fd = new FormData();
                            window.selectedBannerImages.forEach((file) => {
                                if (file && file instanceof File) {
                                    fd.append('gambar[]', file);
                                }
                            });
                            const redirectInput = formEl.querySelector('input[name="_redirect_after_save"]');
                            if (csrf) fd.append('_token', csrf);
                            if (redirectInput && redirectInput.value) {
                                fd.append('_redirect_after_save', redirectInput.value);
                            }
                        } else {
                            fd = new FormData(formEl);
                        }
                    } else {
                        fd = new FormData(formEl);
                    }
                    if (!fd.has('_token') && csrf) fd.append('_token', csrf);

                    try {
                        const resp = await fetch(action, { method, body: fd });
                        const respStatus = resp.status;
                        const respText = await resp.text();

                        if (respStatus >= 400) {
                            console.error('[Visual Identity] Form submit failed', { status: respStatus });
                            throw new Error(`Gagal menyimpan: ${action}`);
                        }

                        return { status: respStatus, text: respText, ok: true };
                    } catch (error) {
                        console.error('[Visual Identity] Fetch error for ' + formId, error);
                        throw error;
                    }
                }

                saveAllBtn.disabled = true;
                saveAllBtn.classList.add('opacity-50', 'cursor-not-allowed');
                if (typeof window.showAdminNotification === 'function') {
                    window.showAdminNotification('Menyimpan perubahan identitas visual...', 'loading');
                }
                try {
                    // Logo
                    const logoInput = document.getElementById('logo-upload');
                    const logoForm = logoInput ? logoInput.closest('form') : null;
                    if (logoInput && logoInput.files && logoInput.files.length > 0 && logoForm) {
                        await submitForm(logoForm);
                    }

                    // Banner utama
                    const bannerInput = document.getElementById('gambar');
                    const bannerForm = bannerInput ? bannerInput.closest('form') : null;
                    const hasPendingBannerImages = (typeof window.hasPendingBannerUploads === 'function' && window.hasPendingBannerUploads());

                    if (bannerForm && (hasPendingBannerImages || (bannerInput && bannerInput.files && bannerInput.files.length > 0))) {
                        await submitForm(bannerForm);
                    }

                    // Update banner order if changed
                    if (typeof window.hasBannerOrderChanged === 'function' && window.hasBannerOrderChanged()) {
                        const updateOrderUrl = options.updateOrderRoute || '/cpanel/visual-identity/banner/update-order';
                        const bannerList = document.getElementById('banner-list');
                        if (bannerList) {
                            const items = bannerList.querySelectorAll('.banner-item:not(.hidden)');
                            const orderData = [];
                            items.forEach((item, index) => {
                                if (item.dataset.id) {
                                    orderData.push({
                                        id: item.dataset.id,
                                        urutan: index + 1
                                    });
                                }
                            });

                            if (orderData.length > 0) {
                                const orderResp = await fetch(updateOrderUrl, {
                                    method: 'PATCH',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrf
                                    },
                                    body: JSON.stringify({ order: orderData })
                                });
                                if (orderResp.status >= 400) {
                                    throw new Error('Gagal menyimpan urutan banner');
                                }
                            }
                        }
                    }

                    // Banner promosi
                    const promosiInput = document.getElementById('promosi_banner');
                    const promosiForm = promosiInput ? promosiInput.closest('form') : null;
                    if (promosiInput && promosiInput.files && promosiInput.files.length > 0 && promosiForm) {
                        await submitForm(promosiForm);
                    }

                    // Pending deletions
                    const csrfToken = csrf;
                    if (window.__pendingBannerDeletions && window.__pendingBannerDeletions.size > 0) {
                        for (const [id, url] of window.__pendingBannerDeletions.entries()) {
                            const fd = new FormData();
                            if (csrfToken) fd.append('_token', csrfToken);
                            fd.append('_method', 'DELETE');
                            await fetch(url, { method: 'POST', body: fd });
                        }
                        window.__pendingBannerDeletions.clear();
                    }
                    if (window.__pendingDeletePromosi) {
                        const url = (document.getElementById('deletePromosiForm') || {}).action || '/cpanel/visual-identity/promosi';
                        const fd = new FormData();
                        if (csrfToken) fd.append('_token', csrfToken);
                        fd.append('_method', 'DELETE');
                        await fetch(url, { method: 'POST', body: fd });
                        window.__pendingDeletePromosi = false;
                    }

                    // Informasi Banner
                    const settingsForm = document.getElementById('settings-form');
                    if (settingsForm) {
                        await submitForm(settingsForm);
                    }

                    // selesai: tampilkan notifikasi sukses dan perbarui snapshot agar dianggap tersimpan
                    if (typeof window.showAdminNotification === 'function') {
                        window.showAdminNotification('Perubahan identitas visual berhasil disimpan.', 'success');
                    }

                    try {
                        captureInitialFormsSnapshots();
                        // Reinitialize banner order tracking after save
                        if (typeof window.initBannerOrderTracking === 'function') {
                            window.initBannerOrderTracking();
                        }
                    } catch (_) { }

                    const nextUrl = window.__unsavedPendingUrl;
                    window.__unsavedPendingUrl = null;
                    if (nextUrl) {
                        window.location.href = nextUrl;
                    } else {
                        setTimeout(() => {
                            window.location.reload();
                        }, 600);
                    }
                } catch (e) {
                    console.error('[Visual Identity] Save error:', e);
                    if (typeof window.showAdminNotification === 'function') {
                        window.showAdminNotification('Terjadi kesalahan saat menyimpan: ' + e.message, 'error');
                    } else {
                        alert('Terjadi kesalahan saat menyimpan: ' + e.message);
                    }
                } finally {
                    saveAllBtn.disabled = false;
                    saveAllBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                }
            });
        }

        // Toggle button text field based on valid link
        const linkInput = document.getElementById('link');
        const buttonTextInput = document.getElementById('button_text');
        const showButtonCheckbox = document.getElementById('show_button');
        function isValidUrl(value) {
            try {
                const url = new URL(value);
                return url.protocol === 'http:' || url.protocol === 'https:';
            } catch (_) {
                return false;
            }
        }
        function updateButtonTextState() {
            const hasValid = !!linkInput && isValidUrl(linkInput.value.trim());
            if (buttonTextInput) {
                buttonTextInput.disabled = !hasValid;
                if (!hasValid) {
                    buttonTextInput.value = '';
                }
                if (!hasValid) {
                    buttonTextInput.classList.add('text-slate-500', 'dark:text-slate-400', 'bg-gray-100', 'dark:bg-slate-600');
                } else {
                    buttonTextInput.classList.remove('text-slate-500', 'dark:text-slate-400', 'bg-gray-100', 'dark:bg-slate-600');
                    buttonTextInput.classList.add('bg-white', 'dark:bg-slate-700', 'text-slate-900', 'dark:text-slate-100');
                }
            }
            if (showButtonCheckbox) {
                // Jangan nonaktifkan checkbox, biarkan user mengontrol visibilitas tombol
                // meskipun tidak ada link (misal untuk tombol yang memicu scroll atau aksi JS lain)
                showButtonCheckbox.disabled = false;
            }
        }
        if (linkInput) {
            ['input', 'change', 'blur'].forEach(evt => linkInput.addEventListener(evt, updateButtonTextState));
            updateButtonTextState();
        }
    }

    function initBannerSorting() {
        const bannerList = document.getElementById('banner-list');
        // Check provided route or fallback
        const updateUrl = options.updateOrderRoute || '/cpanel/visual-identity/banner/update-order';

        if (bannerList && window.Sortable) {
            new Sortable(bannerList, {
                animation: 150,
                ghostClass: 'bg-green-50',
                draggable: '.banner-item',
                onStart: function () {
                    // Mark that a sortable drag is in progress to avoid interfering with upload handlers
                    try { window.__draggingSortable = true; } catch (_) { }
                    const uploadCard = document.getElementById('banner-upload-card');
                    if (uploadCard) uploadCard.dataset.sortableDrag = 'true';
                },
                onEnd: function (evt) {
                    try { window.__draggingSortable = false; } catch (_) { }
                    const uploadCard = document.getElementById('banner-upload-card');
                    if (uploadCard) uploadCard.dataset.sortableDrag = '';

                    const items = bannerList.querySelectorAll('.banner-item');
                    const orderData = [];

                    items.forEach((item, index) => {
                        const newUrutan = index + 1;
                        // Update display order if element exists
                        const urutanDisplay = item.querySelector('.urutan-display');
                        if (urutanDisplay) urutanDisplay.textContent = newUrutan;

                        // Update dataset
                        item.dataset.urutan = newUrutan;

                        orderData.push({
                            id: item.dataset.id,
                            urutan: newUrutan
                        });
                    });

                    const csrf = document.querySelector('meta[name="csrf-token"]')?.content;

                    fetch(updateUrl, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrf
                        },
                        body: JSON.stringify({
                            order: orderData
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (!data.success) {
                                alert('Gagal memperbarui urutan banner.');
                            }
                        })
                        .catch(error => {
                            // console.error('Error:', error);
                            alert('Terjadi kesalahan saat menyimpan urutan.');
                        });
                }
            });
        } else if (bannerList && !window.Sortable) {
            // Wait for Sortable to load if using CDN async mechanism
            const checkSortable = setInterval(() => {
                if (window.Sortable) {
                    clearInterval(checkSortable);
                    initBannerSorting();
                }
            }, 200);
            setTimeout(() => clearInterval(checkSortable), 5000); // timeout 5s
        }
    }

    initBannerSorting();

    // Expose initialize function untuk dipanggil manual
    return initializeVisualIdentity();
};

// Backward compatibility alias
window.initWebAppearance = window.initVisualIdentity;

// Auto-initialize if container exists
document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('visual-identity-container')) {
        window.initVisualIdentity();
    }
});
