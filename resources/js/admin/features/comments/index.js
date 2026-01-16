/**
 * Comments (Komentar) Index Logic
 * Entry point untuk halaman Manajemen Komentar.
 * Menginisialisasi sistem pencarian real-time, filtering status, dan statistik komentar.
 *
 * Dipanggil di: resources/views/admin/pages/comments/index.blade.php
 */

// Initialize Real-time Search & Filters
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('comments-content-container');
    if (!container) return;

    // Get route URL from container data attribute
    const routeUrl = container.getAttribute('data-route-url');

    // Initialize the generic search with proper configuration
    window.initGenericSearch({
        routeUrl: routeUrl || window.location.pathname,
        containerId: 'comments-content-container',
        searchInputId: 'search-input',
        filters: [
            { id: 'filter-status', param: 'status' }
        ],
        sort: { id: 'sort-select', param: 'sort' },
        resetBtnId: 'comments-reset-btn',
        resetClearsSearch: false,
        showResetForSearch: false,
        onSuccess: function (doc) {
            // Re-initialize any event handlers for newly loaded content
            initCommentsActionHandlers();
            initCommentSelectionHandlers();
            // Re-initialize comments management after search
            if (window.initCommentsManagement) {
                window.initCommentsManagement();
            }
        }
    });

    // Initialize comments action handlers (approve, delete, toggle read)
    initCommentsActionHandlers();
    initCommentSelectionHandlers();

    // Initialize comments management (toggle read, approve buttons, etc.)
    if (window.initCommentsManagement) {
        window.initCommentsManagement();
    }

    // Setup approve modal handlers
    const approveModal = document.getElementById('approve-modal');
    const approveCloseBtn = document.getElementById('approve-modal-close-btn');
    const approveConfirmBtn = document.getElementById('confirm-approve-btn');

    if (approveCloseBtn) {
        approveCloseBtn.addEventListener('click', function () {
            if (approveModal) {
                approveModal.classList.add('hidden');
                approveModal.classList.remove('flex');
            }
        });
    }

    if (approveConfirmBtn) {
        approveConfirmBtn.addEventListener('click', function () {
            const ids = window._pendingApprovalIds || [];
            if (ids.length > 0) {
                // Perform bulk approve action
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
                fetch('/cpanel/comments/bulk-approve', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ ids: ids })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Close modal
                        if (approveModal) {
                            approveModal.classList.add('hidden');
                            approveModal.classList.remove('flex');
                        }

                        if (window.showPublicNotification) {
                            window.showPublicNotification('Komentar berhasil disetujui', 'success');
                        }
                        // Mark all approved comments as read
                        const tbody = document.getElementById('comments-container');
                        ids.forEach(id => {
                            const row = tbody?.querySelector(`tr[data-comment-id="${id}"]`);
                            if (row) {
                                // Update status to approved
                                row.dataset.status = 'approved';
                                // Remove pending badge if exists
                                const pendingBadge = row.querySelector('span[class*="yellow"]');
                                if (pendingBadge && pendingBadge.textContent.includes('Pending')) {
                                    pendingBadge.remove();
                                }
                                row.dataset.isRead = '1';
                                // Update UI styles
                                row.classList.remove('font-bold', 'bg-white', 'dark:bg-slate-800');
                                row.classList.add('bg-slate-50', 'dark:bg-slate-800/50', 'text-slate-600', 'dark:text-slate-400');
                            }
                            // Send read request to backend
                            fetch(`/cpanel/comments/${id}/read`, {
                                method: 'PATCH',
                                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
                            }).catch(() => {
                                // Silent fail
                            });
                        });

                        // Count unread that will become read
                        const unreadCount = ids.filter(id => {
                            const row = tbody?.querySelector(`tr[data-comment-id="${id}"]`);
                            return row?.dataset.isRead === '0';
                        }).length;

                        // Update stats and sidebar
                        if (window.updateStatsAndSidebar && unreadCount > 0) {
                            window.updateStatsAndSidebar(-unreadCount);
                        }

                        // Reload the page after notification is visible (2 second delay for better UX)
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }
                })
                .catch(error => {
                    if (window.showPublicNotification) {
                        window.showPublicNotification('Terjadi kesalahan', 'error');
                    }
                });
            }
            if (approveModal) {
                approveModal.classList.add('hidden');
                approveModal.classList.remove('flex');
            }
        });
    }

    // Close modal on outside click
    if (approveModal) {
        approveModal.addEventListener('click', function (e) {
            if (e.target === approveModal) {
                approveModal.classList.add('hidden');
                approveModal.classList.remove('flex');
            }
        });
    }

    // Setup reload button handler
    const reloadBtn = document.getElementById('comments-reload-btn');
    if (reloadBtn) {
        reloadBtn.addEventListener('click', function () {
            location.reload();
        });
    }
});

// Handle comment action buttons (inline handlers)
function initCommentsActionHandlers() {
    const tbody = document.getElementById('comments-container');

    // Add click handler to rows to navigate to comment detail
    if (tbody) {
        tbody.querySelectorAll('tr[data-link-url]').forEach(row => {
            row.addEventListener('click', function (e) {
                // Don't navigate if clicking on checkbox, buttons, or other interactive elements
                if (e.target.closest('input, button, .js-stop-prop')) {
                    return;
                }

                const url = this.getAttribute('data-link-url');
                if (url) {
                    window.location.href = url;
                }
            });

            // Make the row appear clickable with cursor
            row.style.cursor = 'pointer';
        });
    }

    // Toggle read status buttons
    document.querySelectorAll('button[data-toggle-read-id]').forEach(btn => {
        btn.removeEventListener('click', handleToggleRead);
        btn.addEventListener('click', handleToggleRead);
    });

    // Approve buttons
    document.querySelectorAll('button[data-approve-id]').forEach(btn => {
        btn.removeEventListener('click', handleApprove);
        btn.addEventListener('click', handleApprove);
    });

    // Delete buttons are handled by generic delete handler
}

function handleToggleRead(e) {
    e.stopPropagation();
    const commentId = this.getAttribute('data-toggle-read-id');
    if (window.toggleReadStatus) {
        window.toggleReadStatus(commentId);
    }
}

function handleApprove(e) {
    e.stopPropagation();
    const commentId = this.getAttribute('data-approve-id');
    if (window.approveComment) {
        window.approveComment(commentId);
    }
}

// Handle comment selection and bulk actions
function initCommentSelectionHandlers() {
    const selectAllCheckbox = document.getElementById('comments-select-all');
    const commentCheckboxes = document.querySelectorAll('.comment-row-checkbox');
    const approveBtn = document.getElementById('comments-approve-btn');
    const deleteBtn = document.getElementById('comments-delete-btn');
    const toggleBtn = document.getElementById('comments-toggle-read-btn');
    const envIcon = document.getElementById('comments-envelope-icon');

    if (!selectAllCheckbox) return;

    // Select all functionality
    selectAllCheckbox.addEventListener('change', function () {
        commentCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        window.updateBulkActionButtons();
    });

    // Individual checkbox change
    commentCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            // Update select-all checkbox state
            const allChecked = Array.from(commentCheckboxes).every(cb => cb.checked);
            const someChecked = Array.from(commentCheckboxes).some(cb => cb.checked);
            selectAllCheckbox.checked = allChecked;
            selectAllCheckbox.indeterminate = someChecked && !allChecked;
            window.updateBulkActionButtons();
        });
    });

    // Bulk approve
    if (approveBtn) {
        approveBtn.addEventListener('click', function () {
            const selectedIds = Array.from(document.querySelectorAll('.comment-row-checkbox:checked'))
                .map(cb => cb.value);
            if (selectedIds.length > 0) {
                handleBulkApprove(selectedIds);
            }
        });
    }

    // Bulk delete
    if (deleteBtn) {
        deleteBtn.addEventListener('click', function () {
            const selectedIds = Array.from(document.querySelectorAll('.comment-row-checkbox:checked'))
                .map(cb => cb.value);
            if (selectedIds.length > 0) {
                handleBulkDelete(selectedIds);
            }
        });
    }

    // Bulk toggle read
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function () {
            const selectedIds = Array.from(document.querySelectorAll('.comment-row-checkbox:checked'))
                .map(cb => cb.value);
            if (selectedIds.length > 0) {
                handleBulkToggleRead(selectedIds);
            }
        });
    }

    window.updateBulkActionButtons = function updateBulkActionButtons() {
        const selectedCount = document.querySelectorAll('.comment-row-checkbox:checked').length;
        const tbody = document.getElementById('comments-container');

        if (selectedCount > 0) {
            // Check if any selected comments are pending (not approved)
            const selectedIds = Array.from(document.querySelectorAll('.comment-row-checkbox:checked'))
                .map(cb => cb.value);
            const hasPending = selectedIds.some(id => {
                const row = tbody.querySelector(`tr[data-comment-id="${id}"]`);
                return row?.dataset.status === 'pending';
            });

            // Only show approve button if there are pending comments
            if (approveBtn) {
                if (hasPending) {
                    approveBtn.classList.remove('hidden');
                } else {
                    approveBtn.classList.add('hidden');
                }
            }
            if (deleteBtn) deleteBtn.classList.remove('hidden');

            // Show toggle button and update envelope icon
            if (toggleBtn) {
                toggleBtn.classList.remove('hidden');
                toggleBtn.style.opacity = '1';
                toggleBtn.style.cursor = 'pointer';
                toggleBtn.disabled = false;
            }

            // Update envelope icon based on selected items' read status
            if (envIcon && tbody) {
                const selectedIds = Array.from(document.querySelectorAll('.comment-row-checkbox:checked'))
                    .map(cb => cb.value);

                const hasUnread = selectedIds.some(id => {
                    const row = tbody.querySelector(`tr[data-comment-id="${id}"]`);
                    return row?.dataset.isRead === '0';
                });

                if (hasUnread) {
                    toggleBtn.title = 'Tandai Dibaca';
                    // Show Closed Envelope (Matches Unread Rows)
                    envIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />`;
                } else {
                    toggleBtn.title = 'Tandai Belum Dibaca';
                    // Show Open Envelope (Matches Read Rows)
                    envIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />`;
                }
            }
        } else {
            if (approveBtn) approveBtn.classList.add('hidden');
            if (deleteBtn) deleteBtn.classList.add('hidden');

            // Hide toggle button and reset envelope icon
            if (toggleBtn) toggleBtn.classList.add('hidden');
            if (envIcon) {
                // Default icon
                envIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />`;
            }
        }
    };
}

function handleBulkApprove(commentIds) {
    const tbody = document.getElementById('comments-container');
    const modalText = document.getElementById('approve-comment-count');

    // Filter only pending (unapproved) comments
    const pendingIds = commentIds.filter(id => {
        const row = tbody?.querySelector(`tr[data-comment-id="${id}"]`);
        return row?.dataset.status === 'pending';
    });

    if (modalText) {
        modalText.textContent = pendingIds.length;
    }

    // Store only pending IDs for approval
    window._pendingApprovalIds = pendingIds;
    const modal = document.getElementById('approve-modal');
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
}

function handleBulkToggleRead(commentIds) {
    const tbody = document.getElementById('comments-container');
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    // Check if all selected comments are read or unread
    const hasUnread = commentIds.some(id => {
        const row = tbody?.querySelector(`tr[data-comment-id="${id}"]`);
        return row?.dataset.isRead === '0';
    });

    // Count unread BEFORE updating (for delta calculation)
    const unreadBeforeCount = commentIds.filter(id => {
        const row = tbody?.querySelector(`tr[data-comment-id="${id}"]`);
        return row?.dataset.isRead === '0';
    }).length;

    // Determine the target state for all selected comments
    const newState = hasUnread ? 'read' : 'unread';

    // Update all UI immediately (optimistic) - before API calls
    commentIds.forEach(id => {
        const row = tbody?.querySelector(`tr[data-comment-id="${id}"]`);
        if (row) {
            // Update data attribute
            row.dataset.isRead = newState === 'read' ? '1' : '0';
            // Update UI immediately
            updateCommentRowStyles(row, newState === 'read');
            updateCommentRowToggleIcon(row, newState === 'read');
        }
    });

    // Update toolbar icon immediately (optimistic)
    updateToolbarEnvelopeIcon();

    // Update stats and sidebar badge
    // If marking as read: delta is negative (unread count decreases)
    // If marking as unread: delta is positive (unread count increases)
    const delta = newState === 'read' ? -unreadBeforeCount : (commentIds.length - unreadBeforeCount);
    updateStatsAndSidebar(delta);

    // Send requests to backend (fire and forget with error handling)
    commentIds.forEach(id => {
        const url = newState === 'read'
            ? `/cpanel/comments/${id}/read`
            : `/cpanel/comments/${id}/unread`;

        fetch(url, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).catch(() => {
            // Silent fail
        });
    });
}

function updateCommentRowStyles(row, isRead) {
    if (isRead) {
        row.classList.remove('font-bold', 'bg-white', 'dark:bg-slate-800');
        row.classList.add('bg-slate-50', 'dark:bg-slate-800/50', 'text-slate-600', 'dark:text-slate-400');
        row.querySelector('td:nth-child(2) span')?.classList.remove('text-slate-900', 'dark:text-slate-100');
        const commentSpan = row.querySelector('td:nth-child(3) span');
        if (commentSpan) {
            commentSpan.classList.remove('font-bold', 'text-slate-900', 'dark:text-slate-100');
            commentSpan.classList.add('font-normal', 'text-slate-500', 'dark:text-slate-400');
        }
        const timeSpan = row.querySelector('td:nth-child(4) span');
        if (timeSpan) {
            timeSpan.classList.remove('font-bold', 'text-slate-700', 'dark:text-slate-200');
            timeSpan.classList.add('text-slate-500', 'dark:text-slate-400');
        }
    } else {
        row.classList.add('font-bold', 'bg-white', 'dark:bg-slate-800');
        row.classList.remove('bg-slate-50', 'dark:bg-slate-800/50', 'text-slate-600', 'dark:text-slate-400');
        row.querySelector('td:nth-child(2) span')?.classList.add('text-slate-900', 'dark:text-slate-100');
        const commentSpan = row.querySelector('td:nth-child(3) span');
        if (commentSpan) {
            commentSpan.classList.add('font-bold', 'text-slate-900', 'dark:text-slate-100');
            commentSpan.classList.remove('font-normal', 'text-slate-500', 'dark:text-slate-400');
        }
        const timeSpan = row.querySelector('td:nth-child(4) span');
        if (timeSpan) {
            timeSpan.classList.add('font-bold', 'text-slate-700', 'dark:text-slate-200');
            timeSpan.classList.remove('text-slate-500', 'dark:text-slate-400');
        }
    }
}

function updateCommentRowToggleIcon(row, isRead) {
    const toggleBtn = row.querySelector('button[data-toggle-read-id]');
    if (toggleBtn) {
        toggleBtn.title = isRead ? 'Tandai Belum Dibaca' : 'Tandai Dibaca';
        if (isRead) {
            toggleBtn.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" /></svg>`;
        } else {
            toggleBtn.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>`;
        }
    }
}

// Helper function to update stats widget and sidebar badge
function updateStatsAndSidebar(deltaUnread) {
    const elUnread = document.getElementById('stat-unread-comments');
    const elRead = document.getElementById('stat-read-comments');
    const sidebarBadge = document.getElementById('sidebar-unread-comments-badge');
    const sidebarLink = document.getElementById('sidebar-comments-link');

    // Update unread/read counts
    let currentUnread = parseInt(elUnread?.textContent || '0') || 0;
    let currentRead = parseInt(elRead?.textContent || '0') || 0;

    const nextUnread = Math.max(0, currentUnread + deltaUnread);
    const nextRead = Math.max(0, currentRead - deltaUnread);

    if (elUnread) elUnread.textContent = nextUnread;
    if (elRead) elRead.textContent = nextRead;

    // Update sidebar badge
    if (nextUnread <= 0) {
        if (sidebarBadge) sidebarBadge.remove();
    } else {
        if (sidebarBadge) {
            sidebarBadge.textContent = nextUnread > 99 ? '99+' : String(nextUnread);
        } else if (sidebarLink) {
            const badge = document.createElement('span');
            badge.id = 'sidebar-unread-comments-badge';
            badge.className = 'inline-flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-bold text-white bg-red-600 rounded-full';
            badge.textContent = nextUnread > 99 ? '99+' : String(nextUnread);
            sidebarLink.appendChild(badge);
        }
    }
}

function handleBulkDelete(commentIds) {
    const modal = document.getElementById('delete-modal');
    const itemCountEl = document.getElementById('delete-item-count');
    const confirmBtn = document.getElementById('confirm-delete-btn');
    const cancelBtn = document.getElementById('delete-modal-close-btn');

    if (modal && itemCountEl && confirmBtn) {
        // Update modal text
        itemCountEl.textContent = `${commentIds.length}`;

        // Store comment IDs for later use
        window._pendingDeleteIds = commentIds;

        // Show modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');

        // Handle confirm delete
        const handleConfirmDelete = () => {
            confirmBtn.disabled = true;
            const originalText = confirmBtn.textContent;
            confirmBtn.textContent = 'Menghapus...';

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

            const promises = commentIds.map(id =>
                fetch(`/cpanel/comments/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                })
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) {
                            const row = document.querySelector(`tr[data-id="${id}"]`);
                            if (row) row.remove();
                        }
                    })
            );

            Promise.all(promises).then(() => {
                // Close modal
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');

                // Clean up
                window._pendingDeleteIds = [];
                confirmBtn.disabled = false;
                confirmBtn.textContent = originalText;

                // Reload to refresh stats
                window.location.reload();
            }).catch(err => {
                confirmBtn.disabled = false;
                confirmBtn.textContent = originalText;
                alert('Gagal menghapus beberapa komentar.');
            });
        };

        // Handle cancel
        const handleCancelDelete = () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
            window._pendingDeleteIds = [];
            confirmBtn.removeEventListener('click', handleConfirmDelete);
            cancelBtn.removeEventListener('click', handleCancelDelete);
        };

        // Add event listeners
        confirmBtn.addEventListener('click', handleConfirmDelete);
        cancelBtn.addEventListener('click', handleCancelDelete);

        // Close on backdrop click
        modal.addEventListener('click', (e) => {
            if (e.target === modal) handleCancelDelete();
        });

        // Close on Escape key
        const handleEscapeKey = (e) => {
            if (e.key === 'Escape') {
                handleCancelDelete();
                document.removeEventListener('keydown', handleEscapeKey);
            }
        };
        document.addEventListener('keydown', handleEscapeKey);
    }
}
// Helper function to update toolbar envelope icon based on selected items
window.updateToolbarEnvelopeIcon = function() {
    const selectAllCheckbox = document.getElementById('comments-select-all');
    const commentCheckboxes = document.querySelectorAll('.comment-row-checkbox');
    const envIcon = document.getElementById('comments-envelope-icon');
    const toggleBtn = document.getElementById('comments-toggle-read-btn');
    const tbody = document.getElementById('comments-container');

    if (!envIcon || !tbody) return;

    // Check if any items are selected
    const selectedIds = Array.from(commentCheckboxes).filter(cb => cb.checked).map(cb => cb.value);

    // If no items selected, hide the toggle button and show default envelope
    if (selectedIds.length === 0) {
        if (toggleBtn) toggleBtn.classList.add('hidden');
        // Show default closed envelope icon
        envIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />`;
        return;
    }

    // Show toggle button
    if (toggleBtn) toggleBtn.classList.remove('hidden');

    // Check read status of selected items
    const hasUnread = selectedIds.some(id => {
        const row = tbody.querySelector(`tr[data-comment-id="${id}"]`);
        return row?.dataset.isRead === '0';
    });

    if (hasUnread) {
        if (toggleBtn) toggleBtn.title = 'Tandai Dibaca';
        // Show Closed Envelope (Matches Unread Rows)
        envIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />`;
    } else {
        if (toggleBtn) toggleBtn.title = 'Tandai Belum Dibaca';
        // Show Open Envelope (Matches Read Rows)
        envIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />`;
    }
};
