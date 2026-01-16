/**
 * Comments Toolbar Management
 * Dipakai di: admin comments index page
 */
window.initCommentsToolbarManagement = function () {
    const toolbar = document.getElementById('comments-toolbar');
    if (!toolbar) return;

    const selectAllCheckbox = toolbar.querySelector('#select-all-comments');
    const commentCheckboxes = document.querySelectorAll('.comment-checkbox');
    const bulkActions = toolbar.querySelector('.bulk-actions');
    const approveBtn = toolbar.querySelector('#bulk-approve-btn');
    const rejectBtn = toolbar.querySelector('#bulk-reject-btn');
    const deleteBtn = toolbar.querySelector('#bulk-delete-btn');

    function updateBulkActionsVisibility() {
        const checkedCount = document.querySelectorAll('.comment-checkbox:checked').length;
        if (checkedCount > 0) {
            bulkActions.classList.remove('hidden');
        } else {
            bulkActions.classList.add('hidden');
        }
    }

    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function () {
            commentCheckboxes.forEach(function (checkbox) {
                checkbox.checked = this.checked;
            });
            updateBulkActionsVisibility();
        });
    }

    commentCheckboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', updateBulkActionsVisibility);
    });

    if (approveBtn) {
        approveBtn.addEventListener('click', function () {
            const selectedIds = Array.from(document.querySelectorAll('.comment-checkbox:checked'))
                .map(cb => cb.value);
            if (selectedIds.length > 0) {
                // Handle bulk approve
                window.handleBulkCommentAction('approve', selectedIds);
            }
        });
    }

    if (rejectBtn) {
        rejectBtn.addEventListener('click', function () {
            const selectedIds = Array.from(document.querySelectorAll('.comment-checkbox:checked'))
                .map(cb => cb.value);
            if (selectedIds.length > 0) {
                // Handle bulk reject
                window.handleBulkCommentAction('reject', selectedIds);
            }
        });
    }

    if (deleteBtn) {
        deleteBtn.addEventListener('click', function () {
            const selectedIds = Array.from(document.querySelectorAll('.comment-checkbox:checked'))
                .map(cb => cb.value);
            if (selectedIds.length > 0) {
                // Handle bulk delete
                window.handleBulkCommentAction('delete', selectedIds);
            }
        });
    }
};

window.handleBulkCommentAction = function (action, ids) {
    // Implementation for bulk actions
};

// Note: Initialized by admin.js DOMContentLoaded event
