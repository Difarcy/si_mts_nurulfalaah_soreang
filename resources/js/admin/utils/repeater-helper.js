/**
 * Form Repeater Helper
 * Provides generic functionality for removing items in a repeater list.
 * 
 * Usage:
 * Add `data-repeater-item` class/attribute to the item container.
 * Add `data-remove-repeater-item` attribute to the remove button inside the item.
 * Optional: Add `data-confirm="Are you sure?"` to the remove button for confirmation.
 */

document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('click', function (e) {
        // Find removal button
        const removeBtn = e.target.closest('[data-remove-repeater-item]');

        if (removeBtn) {
            e.preventDefault();
            e.stopPropagation();

            // Find closest item container
            const item = removeBtn.closest('[data-repeater-item]') || removeBtn.closest('.repeater-item');

            if (item) {
                const performRemove = () => {
                    // Remove the item
                    item.remove();

                    // Trigger change event on form (for unsaved changes detection)
                    const form = removeBtn.closest('form');
                    if (form) {
                        // Create and dispatch a native change event that bubbles
                        const event = new Event('change', { bubbles: true });
                        form.dispatchEvent(event);
                    }

                    // Optional globally accessible callback hook
                    if (typeof window.onRepeaterItemRemoved === 'function') {
                        window.onRepeaterItemRemoved(item);
                    }
                };

                // Check for confirmation requirement
                const confirmMsg = removeBtn.dataset.confirm;
                if (confirmMsg) {
                    if (typeof window.showDeleteImageModal === 'function') {
                        window.showDeleteImageModal('Konfirmasi Hapus', confirmMsg, performRemove);
                    } else {
                        // Fallback
                        if (confirm(confirmMsg)) {
                            performRemove();
                        }
                    }
                } else {
                    // No confirmation needed
                    performRemove();
                }
            } else {
                // console.warn('Repeater item container not found for button:', removeBtn);
            }
        }
    });
});
