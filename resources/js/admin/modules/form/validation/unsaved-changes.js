/**
 * Unsaved Changes Modal Handler
 * Digunakan untuk menangani perubahan yang belum disimpan di form
 * Dipakai di: create.blade.php, edit.blade.php
 */

import { FormChangeTracker } from './form-change-detection.js';

try {
    window.FormChangeTracker = FormChangeTracker;
} catch (_) { }

window.initUnsavedChangesModal = function (options = {}) {
    const {
        formId = 'create-form',
        modalId = 'confirm-modal',
        backBtnId = 'back-btn',
        cancelBtnId = 'cancel-btn',
        submitBtnId = null,
        modalCancelBtnId = 'modal-cancel-btn',
        modalDiscardBtnId = 'modal-discard-btn',
        modalSaveBtnId = 'modal-save-btn',
        modalSaveBtnTextId = 'modal-save-btn-text',
        statusSelectId = 'status-select',
        tabButtonSelector = '.tab-button',
        tabContentSelector = '.tab-content',
        onSave = null,
        onDiscard = null,
        extraCheck = null, // Function() -> boolean (Additional check for complex forms)
        disableGenericTracker = false
    } = options;

    const form = document.getElementById(formId);
    const backBtn = document.getElementById(backBtnId);
    const cancelBtn = document.getElementById(cancelBtnId);
    const modal = document.getElementById(modalId);
    const modalCancelBtn = document.getElementById(modalCancelBtnId);
    const modalDiscardBtn = document.getElementById(modalDiscardBtnId);
    const modalSaveBtn = document.getElementById(modalSaveBtnId);
    const modalSaveBtnText = document.getElementById(modalSaveBtnTextId);
    const statusSelect = document.getElementById(statusSelectId);

    if (!modal || !modalCancelBtn || !modalDiscardBtn || !modalSaveBtn) {
        return;
    }

    let isSubmitting = false;
    let mainTracker = null;
    let tabTrackers = {}; // Map<tabId, Tracker[]>
    let pendingNavigationUrl = null;
    const initializedKey = `${formId}::${modalId}`;

    try {
        if (!window.__unsavedChangesModalInitialized) {
            window.__unsavedChangesModalInitialized = new Set();
        }
        if (window.__unsavedChangesModalInitialized.has(initializedKey)) {
            return;
        }
        window.__unsavedChangesModalInitialized.add(initializedKey);
    } catch (_) { }

    function updateModalSaveButtonText() {
        if (modalSaveBtnText) {
            // Cek apakah ini mode edit (biasanya formId = 'edit-form')
            // Atau bisa cek hidden input _method = PUT/PATCH
            const isEditMode = formId === 'edit-form' || (form && form.querySelector('input[name="_method"][value="PUT"]'));

            if (isEditMode) {
                // Jika mode edit, selalu gunakan "Simpan"
                modalSaveBtnText.textContent = 'Simpan';
            } else if (statusSelect) {
                // Jika mode create, ikuti status dropdown
                const status = statusSelect.value;
                modalSaveBtnText.textContent = status === 'draft' ? 'Simpan' : 'Publish';
            } else {
                // Fallback default
                modalSaveBtnText.textContent = 'Simpan';
            }
        }
    }

    if (statusSelect) {
        statusSelect.addEventListener('change', updateModalSaveButtonText);
    }

    // Initialize Trackers
    if (form && !disableGenericTracker) {
        mainTracker = new FormChangeTracker(form);
    }
    const tabs = document.querySelectorAll(tabContentSelector);
    tabs.forEach(tab => {
        const tabId = tab.id || '';
        const tabForms = tab.querySelectorAll('form');
        tabTrackers[tabId] = Array.from(tabForms).map(f => new FormChangeTracker(f));
    });

    setTimeout(() => {
        try {
            if (mainTracker && !mainTracker.hasChanges()) {
                mainTracker.updateSnapshot();
            }

            Object.values(tabTrackers).forEach(trackers => {
                trackers.forEach(t => {
                    if (t && !t.hasChanges()) t.updateSnapshot();
                });
            });
        } catch (_) { }
    }, 2000);

    // Form submit
    if (form) {
        form.addEventListener('submit', () => {
            isSubmitting = true;
        });
    }

    function checkHasChanges() {
        const formChanged = mainTracker && mainTracker.hasChanges();

        let tabsChanged = false;
        Object.values(tabTrackers).forEach(trackers => {
            if (trackers.some(t => t.hasChanges())) tabsChanged = true;
        });

        let customChanged = false;
        if (typeof extraCheck === 'function') {
            customChanged = extraCheck();
        }

        const result = formChanged || tabsChanged || customChanged;
        return result;
    }

    // Intercept browser back/forward navigation
    try {
        history.replaceState({ modalGuard: true }, document.title, window.location.href);
    } catch (_) { }
    window.addEventListener('popstate', (e) => {
        if (!isSubmitting && checkHasChanges()) {
            e.preventDefault();
            const backUrl = backBtn ? (backBtn.href || backBtn.getAttribute('data-href')) : null;
            pendingNavigationUrl = backUrl || document.referrer || null;
            showModal(pendingNavigationUrl);
            try {
                history.pushState({ modalGuard: true }, document.title, window.location.href);
            } catch (_) { }
        }
    });

    // Handle BeforeUnload (Browser Close/Refresh)
    // Disabled by user request: The native "Leave site?" prompt is considered annoying and redundant
    // given the custom modal for internal navigation.
    /*
    window.addEventListener('beforeunload', (e) => {
        if (isSubmitting) return;

        if (checkHasChanges()) {
            e.preventDefault();
            e.returnValue = 'Perubahan belum disimpan. Yakin ingin keluar?';
            return e.returnValue;
        }
    });
    */

    function showModal(url) {
        const backUrl = url || (backBtn ? (backBtn.href || backBtn.getAttribute('data-href')) : null);
        pendingNavigationUrl = backUrl;
        updateModalSaveButtonText();

        // Sync button state
        const mainSubmitBtn = submitBtnId ? document.getElementById(submitBtnId) : null;
        if (mainSubmitBtn) {
            if (mainSubmitBtn.disabled) {
                modalSaveBtn.disabled = true;
                modalSaveBtn.classList.add('opacity-50', 'cursor-not-allowed');
                modalSaveBtn.setAttribute('disabled', 'disabled');
            } else {
                modalSaveBtn.disabled = false;
                modalSaveBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                modalSaveBtn.removeAttribute('disabled');
            }
        }
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function hideModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        pendingNavigationUrl = null;
    }

    // Back button
    if (backBtn) {
        backBtn.onclick = function (e) {
            e.stopImmediatePropagation();
            const backUrl = this.href || this.getAttribute('data-href');
            if (!isSubmitting && checkHasChanges()) {
                e.preventDefault();
                showModal(backUrl);
            } else if (!isSubmitting && backUrl) {
                window.location.href = backUrl;
            }
        };
    }

    // Cancel button
    if (cancelBtn) {
        cancelBtn.addEventListener('click', (e) => {
            const backUrl = backBtn ? (backBtn.href || backBtn.getAttribute('data-href')) : null;
            if (!isSubmitting && checkHasChanges()) {
                e.preventDefault();
                showModal(backUrl);
            } else if (!isSubmitting && backUrl) {
                window.location.href = backUrl;
            }
        });
    }

    modalCancelBtn.addEventListener('click', () => {
        hideModal();
    });

    modalDiscardBtn.addEventListener('click', () => {
        const url = pendingNavigationUrl;
        hideModal();
        if (url) {
            if (typeof onDiscard === 'function') {
                onDiscard(url);
            } else {
                window.location.href = url;
            }
        }
    });

    modalSaveBtn.addEventListener('click', () => {
        const mainSubmitBtn = submitBtnId ? document.getElementById(submitBtnId) : null;
        if (mainSubmitBtn && mainSubmitBtn.disabled) {
            if (window.UINotification) {
                window.UINotification.show('Mohon lengkapi semua field wajib sebelum menyimpan.', 'error');
            }
            return;
        }

        const backUrl = backBtn ? (backBtn.href || backBtn.getAttribute('data-href')) : null;
        const url = pendingNavigationUrl || backUrl;

        if (form) {
            const existingInput = form.querySelector('input[name="_redirect_after_save"]');
            if (existingInput) {
                existingInput.value = url;
            } else if (url) {
                const redirectInput = document.createElement('input');
                redirectInput.type = 'hidden';
                redirectInput.name = '_redirect_after_save';
                redirectInput.value = url;
                form.appendChild(redirectInput);
            }
        }

        hideModal();
        isSubmitting = true;

        if (typeof onSave === 'function') {
            onSave(url);
        } else if (mainSubmitBtn) {
            mainSubmitBtn.click();
        } else {
            if (form) form.submit();
        }
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            hideModal();
        }
    });

    // Global Navigation Guard
    // Intercept all internal link clicks to show custom modal instead of browser native dialog
    document.addEventListener('click', (e) => {
        // Find closest anchor tag
        const link = e.target.closest('a');
        if (!link) return;

        // Skip if target is blank (new tab)
        if (link.target === '_blank') return;

        // Skip if download or special protocols
        const href = link.getAttribute('href');
        if (!href || href.startsWith('#') || href.startsWith('javascript:') || href.startsWith('mailto:') || href.startsWith('tel:')) return;

        // Check change status
        const hasChanges = !isSubmitting && checkHasChanges();

        if (hasChanges) {
            // Check if link is internal/same domain
            // We allow relative paths and full URLs that match current origin
            const targetUrl = link.href;
            const currentOrigin = window.location.origin;

            if (targetUrl.startsWith(currentOrigin) || !targetUrl.startsWith('http')) {
                e.preventDefault();
                e.stopPropagation(); // Stop other listeners

                // Show modal
                showModal(href);
            }
        }
    }, true); // Use capture to ensure we catch it before other listeners might navigate

    const tabButtons = document.querySelectorAll(tabButtonSelector);
    function getActiveTabId() {
        const activeTab = document.querySelector(`${tabContentSelector}:not(.hidden)`);
        return activeTab ? activeTab.id : '';
    }
    function hasTabChanged(tabId) {
        const trackers = tabTrackers[tabId] || [];
        return trackers.some(t => t.hasChanges());
    }
    tabButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            const targetTabKey = btn.getAttribute('data-tab');
            const targetTabId = `tab-${targetTabKey}`;
            const activeTabId = getActiveTabId();
            if (activeTabId && hasTabChanged(activeTabId)) {
                e.preventDefault();
                e.stopPropagation();
                pendingNavigationUrl = `#tab:${targetTabId}`;
                showModal(pendingNavigationUrl);
            } else {
                if (typeof onDiscard === 'function') {
                    onDiscard(`#tab:${targetTabId}`);
                }
            }
        }, true);
    });
};
