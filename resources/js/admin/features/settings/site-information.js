/**
 * Management Site Information
 * Menangani fungsi-fungsi pada halaman Informasi Situs
 */

export function initSiteInformation() {
    // Check if we are on the site information page using ID for better accuracy
    const siteInfoForm = document.getElementById("site-information-form");
    if (!siteInfoForm) return;

    // Enable form change detection for unsaved changes modal
    if (typeof window.initUnsavedChangesModal === "function") {
        window.initUnsavedChangesModal({
            formId: "site-information-form",
            modalId: "confirm-modal",
            modalCancelBtnId: "modal-cancel-btn",
            modalDiscardBtnId: "modal-discard-btn",
            modalSaveBtnId: "modal-save-btn",
            modalSaveBtnTextId: "modal-save-btn-text",
            onSave: async function (redirectUrl) {
                // Handle save from modal
                const saveBtn = document.getElementById("site-information-save-btn");
                if (saveBtn) {
                    // Trigger form submit manually
                    const event = new Event('submit');
                    siteInfoForm.dispatchEvent(event);

                    // If there's a redirect URL, wait for save then redirect
                    // Note: This simple implementation relies on the form submit handler showing notifications
                    // For redirect, we might need to hook into the success of the form submit
                    if (redirectUrl) {
                        // Store pending redirect
                        window.__pendingRedirect = redirectUrl;
                    }
                }
            }
        });
    }

    // Handle save button state
    const saveBtn = document.getElementById("site-information-save-btn");
    const floatingBtn = document.getElementById('site-information-save-btn-floating');

    if (saveBtn) {
        // Sync floating button state with main button if it exists
        if (floatingBtn) {
            const syncButtonState = () => {
                floatingBtn.disabled = saveBtn.disabled;
                if (saveBtn.disabled) {
                    floatingBtn.classList.add("opacity-50", "cursor-not-allowed", "shadow-none");
                } else {
                    floatingBtn.classList.remove("opacity-50", "cursor-not-allowed", "shadow-none");
                }
            };

            // Watch for changes on the main button's disabled attribute
            const observer = new MutationObserver(syncButtonState);
            observer.observe(saveBtn, { attributes: true, attributeFilter: ['disabled'] });

            // Initial sync
            syncButtonState();

            // Make floating button click submit the form
            floatingBtn.addEventListener('click', function (e) {
                e.preventDefault();
                saveBtn.click();
            });
        }

        // Get all relevant inputs
        const inputs = Array.from(
            siteInfoForm.querySelectorAll(
                'input:not([type="hidden"]):not([type="submit"]):not([type="button"]), textarea, select'
            )
        );

        // ... (rest of the inputs logic) ...
        // Initialize initial values for comparison
        inputs.forEach((element) => {
            // Store original value
            element.dataset.originalValue = element.value;
        });

        // Function to check changes
        const checkChanges = () => {
            let isDirty = false;

            inputs.forEach((el) => {
                const original = el.dataset.originalValue;
                // Compare current value with stored original value
                if (original !== undefined && el.value !== original) {
                    isDirty = true;
                }
            });

            if (isDirty) {
                saveBtn.removeAttribute("disabled");
                saveBtn.classList.remove(
                    "opacity-50",
                    "cursor-not-allowed",
                    "shadow-none"
                );
            } else {
                saveBtn.setAttribute("disabled", "true");
                saveBtn.classList.add(
                    "opacity-50",
                    "cursor-not-allowed",
                    "shadow-none"
                );
            }
        };

        // Add event listeners to all inputs
        inputs.forEach((element) => {
            element.addEventListener("input", checkChanges);
            element.addEventListener("change", checkChanges);
            element.addEventListener("keyup", checkChanges);
            element.addEventListener("paste", checkChanges);
        });

        // Filter numeric only inputs
        const numericInputs = siteInfoForm.querySelectorAll('[data-numeric-only]');
        numericInputs.forEach(input => {
            input.addEventListener('input', function (e) {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            input.addEventListener('keypress', function (e) {
                if (!/[0-9]/.test(e.key)) {
                    e.preventDefault();
                }
            });
        });

        // Handle Form Submission via AJAX
        siteInfoForm.addEventListener("submit", async function (e) {
            e.preventDefault();

            // Disable button and show loading
            saveBtn.disabled = true;
            saveBtn.classList.add("opacity-50", "cursor-not-allowed");

            if (typeof window.showPublicNotification === "function") {
                window.showPublicNotification(
                    "Menyimpan informasi situs...",
                    "loading"
                );
            }

            try {
                const formData = new FormData(siteInfoForm);
                const response = await fetch(siteInfoForm.action, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        Accept: "application/json",
                    },
                });

                const result = await response.json();

                if (response.ok) {
                    if (typeof window.showAdminNotification === "function") {
                        // Simpan pesan sukses ke sessionStorage agar bisa ditampilkan setelah reload
                        sessionStorage.setItem('flash_success', result.message || "Informasi situs berhasil disimpan.");

                        // Reload halaman ke URL dasar (tanpa query string/hash)
                        setTimeout(() => {
                            window.location.href = window.location.pathname;
                        }, 500);
                    }

                    // Update original values to current values
                    inputs.forEach((el) => {
                        el.dataset.originalValue = el.value;
                    });

                    // Reset button state (disabled because now it matches "original")
                    saveBtn.setAttribute("disabled", "true");
                    saveBtn.classList.add(
                        "opacity-50",
                        "cursor-not-allowed",
                        "shadow-none"
                    );

                    // Check for pending redirect from modal
                    if (window.__pendingRedirect) {
                        setTimeout(() => {
                            window.location.href = window.__pendingRedirect;
                        }, 1000); // Give user time to read notification
                    }
                } else {
                    throw new Error(
                        result.message || "Terjadi kesalahan saat menyimpan."
                    );
                }
            } catch (error) {
                // console.error(error);
                if (typeof window.showAdminNotification === "function") {
                    window.showAdminNotification(
                        error.message || "Terjadi kesalahan saat menyimpan.",
                        "error"
                    );
                } else {
                    alert(error.message || "Terjadi kesalahan saat menyimpan.");
                }

                // Re-enable button on error
                saveBtn.disabled = false;
                saveBtn.classList.remove("opacity-50", "cursor-not-allowed");
            }
        });
    }
}

// Initialize when DOM is ready
document.addEventListener("DOMContentLoaded", function () {
    initSiteInformation();
});
