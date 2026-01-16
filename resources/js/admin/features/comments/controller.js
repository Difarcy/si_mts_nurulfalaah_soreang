/**
 * Management Comments
 * Digunakan untuk mengelola komentar (search, filter, approve, toggle read, dll)
 * Dipakai di: admin/pages/comments/comments.blade.php
 */

window.initCommentsManagement = function (options = {}) {
    const {
        unreadComments = 0,
        totalComments = 0,
        pendingComments = 0,
        readCommentsUrl = null,
        showCommentsUrl = null,
        searchInputId = 'search-input',
        filterStatusId = 'filter-status',
        filterReadId = 'filter-read'
    } = options;

    // Global State
    let searchTimeout;
    let searchInput = document.getElementById(searchInputId);
    let sidebarUnreadCount = unreadComments;
    let statsTotal = totalComments;
    let statsPending = pendingComments;
    let statsUnread = unreadComments;
    let statsRead = totalComments - unreadComments;

    function renderSidebarUnreadBadge() {
        const link = document.getElementById('sidebar-comments-link');
        if (!link) return;

        let badge = document.getElementById('sidebar-unread-comments-badge');

        if (sidebarUnreadCount <= 0) {
            if (badge) badge.remove();
            return;
        }

        if (!badge) {
            badge = document.createElement('span');
            badge.id = 'sidebar-unread-comments-badge';
            badge.className = 'inline-flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-bold text-white bg-red-600 rounded-full';
            link.appendChild(badge);
        }

        badge.textContent = sidebarUnreadCount > 99 ? '99+' : String(sidebarUnreadCount);
        badge.setAttribute('title', `${sidebarUnreadCount} komentar belum dibaca`);
    }

    function adjustSidebarUnreadCount(delta) {
        sidebarUnreadCount = Math.max(0, Number(sidebarUnreadCount || 0) + Number(delta || 0));
        renderSidebarUnreadBadge();
    }

    function updateStatsWidgets(deltaTotal = 0, deltaPending = 0, deltaUnread = 0, deltaRead = 0) {
        statsTotal = Math.max(0, statsTotal + deltaTotal);
        statsPending = Math.max(0, statsPending + deltaPending);
        statsUnread = Math.max(0, statsUnread + deltaUnread);
        statsRead = Math.max(0, statsRead + deltaRead);

        const elTotal = document.getElementById('stat-total-comments');
        const elPending = document.getElementById('stat-pending-comments');
        const elUnread = document.getElementById('stat-unread-comments');
        const elRead = document.getElementById('stat-read-comments');

        if (elTotal) elTotal.textContent = statsTotal;
        if (elPending) elPending.textContent = statsPending;
        if (elUnread) elUnread.textContent = statsUnread;
        if (elRead) elRead.textContent = statsRead;
    }

    function formatDateTime(iso) {
        const d = new Date(iso);
        const now = new Date();
        const sameDay = d.getFullYear() === now.getFullYear() && d.getMonth() === now.getMonth() && d.getDate() === now.getDate();

        if (sameDay) {
            const hh = String(d.getHours()).padStart(2, '0');
            const mm = String(d.getMinutes()).padStart(2, '0');
            return `${hh}:${mm}`;
        }
        return d.toLocaleDateString('id-ID', {
            day: '2-digit',
            month: 'short'
        });
    }

    function updateRelativeTimes() {
        document.querySelectorAll('[data-datetime]').forEach(el => {
            const iso = el.dataset.datetime;
            if (iso) {
                el.textContent = formatDateTime(iso);
            }
        });
    }


    // Search functionality - NOW HANDLED BY search-comments.js
    // This function is kept for backward compatibility but does nothing
    // Search functionality is now handled by search-comments.js

    // Expose functions globally for inline onclick handlers
    window.toggleReadStatus = window.toggleReadStatus || function (commentId) {
        if (!commentId || typeof commentId === 'object') {
            // console.warn('toggleReadStatus called with invalid commentId:', commentId);
            return;
        }

        const row = document.querySelector(`[data-comment-id="${commentId}"]`);
        if (!row) return;

        // OPTIMISTIC UI UPDATE
        const isCurrentlyRead = row.dataset.isRead === '1';
        const newStatusRead = !isCurrentlyRead;

        // Update data attribute
        row.dataset.isRead = newStatusRead ? '1' : '0';

        // Update styling
        const updateRowStyles = (read) => {
            // Shared style logic could be extracted, but keeping inline for stability
            if (read) {
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
        };
        updateRowStyles(newStatusRead);

        // Update Icons
        const toggleBtn = row.querySelector('button[data-toggle-read-id]');
        if (toggleBtn) {
            toggleBtn.title = newStatusRead ? 'Tandai Belum Dibaca' : 'Tandai Dibaca';
            if (newStatusRead) { // Read -> Icon Open
                toggleBtn.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" /></svg>`;
            } else { // Unread -> Icon Closed
                toggleBtn.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>`;
            }
        }

        // Update Stats & Sidebar
        const elUnread = document.getElementById('stat-unread-comments');
        const elRead = document.getElementById('stat-read-comments');
        const sidebarBadge = document.getElementById('sidebar-unread-comments-badge');
        const sidebarLink = document.getElementById('sidebar-comments-link');
        let currentUnread = parseInt(elUnread?.textContent || sidebarBadge?.textContent.replace('+', '') || '0') || 0;
        const delta = newStatusRead ? -1 : 1;
        const nextUnread = Math.max(0, currentUnread + delta);

        if (elUnread) elUnread.textContent = nextUnread;
        if (elRead) elRead.textContent = Math.max(0, (parseInt(elRead.textContent) || 0) - delta);

        if (nextUnread <= 0) {
            if (sidebarBadge) sidebarBadge.remove();
        } else {
            if (sidebarBadge) {
                sidebarBadge.textContent = nextUnread > 99 ? '99+' : String(nextUnread);
            } else if (sidebarLink) {
                const badge = document.createElement('span');
                badge.id = 'sidebar-unread-comments-badge';
                badge.className = 'inline-flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-bold text-white bg-red-600 rounded-full';
                badge.textContent = '1';
                sidebarLink.appendChild(badge);
            }
        }

        // Update toolbar envelope icon to match selected items' status
        updateToolbarEnvelopeIcon();

        document.dispatchEvent(new CustomEvent('comment-status-changed'));

        // Background Fetch
        const url = isCurrentlyRead
            ? `/cpanel/comments/${commentId}/unread`
            : `/cpanel/comments/${commentId}/read`;
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

        fetch(url, {
            method: 'PATCH',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
        }).catch(error => {
            // console.error('Background update failed:', error);
        });
    };

    window.approveComment = window.approveComment || function (commentId) {
        if (!commentId || typeof commentId === 'object') {
            // console.warn('approveComment called with invalid commentId:', commentId);
            return;
        }

        const row = document.querySelector(`[data-comment-id="${commentId}"]`);
        const approveBtn = row?.querySelector('button[data-approve-id]');
        let originalContent = '';

        if (approveBtn) {
            originalContent = approveBtn.innerHTML;
            approveBtn.disabled = true;
            approveBtn.innerHTML = '<svg class="animate-spin w-5 h-5 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
        }

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        const approveUrl = `/cpanel/comments/${commentId}/approve`;

        fetch(approveUrl, {
            method: 'PATCH',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (window.showPublicNotification) window.showPublicNotification('Komentar berhasil disetujui', 'success');
                    if (approveBtn) {
                        approveBtn.remove();
                    }
                    if (row) {
                        // Update status to approved
                        row.dataset.status = 'approved';
                        // Remove pending badge if exists
                        const pendingBadge = row.querySelector('span[class*="yellow"]');
                        if (pendingBadge && pendingBadge.textContent.includes('Pending')) {
                            pendingBadge.remove();
                        }
                        // Mark as read immediately (optimistic update)
                        row.dataset.isRead = '1';
                        // Update row UI styles
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
                        // Update toggle read button icon
                        const toggleBtn = row.querySelector('button[data-toggle-read-id]');
                        if (toggleBtn) {
                            toggleBtn.title = 'Tandai Belum Dibaca';
                            toggleBtn.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" /></svg>`;
                        }
                    }
                    // Send read request to backend (fire and forget)
                    fetch(`/cpanel/comments/${commentId}/read`, {
                        method: 'PATCH',
                        headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
                    }).catch(() => {
                        // Silent fail - don't log to console
                    });

                    // Update stats and sidebar badge
                    if (window.updateStatsAndSidebar) {
                        window.updateStatsAndSidebar(-1);
                    }

                    // Update toolbar button state after individual approve
                    if (window.updateBulkActionButtons) {
                        window.updateBulkActionButtons();
                    }
                } else {
                    if (approveBtn) {
                        approveBtn.innerHTML = originalContent;
                        approveBtn.disabled = false;
                    }
                    if (window.showPublicNotification) window.showPublicNotification('Gagal menyetujui komentar', 'error');
                }
            })
            .catch(error => {
                // console.error('Error:', error);
                if (approveBtn) {
                    approveBtn.innerHTML = originalContent;
                    approveBtn.disabled = false;
                }
                if (window.showPublicNotification) window.showPublicNotification('Terjadi kesalahan koneksi', 'error');
            });
    };

    // Expose markAsReadAndOpenModal and closeCommentDetail globally
    window.markAsReadAndOpenModal = window.markAsReadAndOpenModal || function (commentId) {
        if (!showCommentsUrl || !commentId) return;

        const url = showCommentsUrl.replace(':id', commentId);
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                // Show comment detail modal
                const modal = document.getElementById('comment-detail-modal');
                const content = document.getElementById('comment-detail-content');

                if (modal && content) {
                    // Populate modal content
                    content.innerHTML = `
                    <div class="space-y-4">
                        <div>
                            <strong>Nama:</strong> ${data.name}<br>
                            <strong>Email:</strong> ${data.email}<br>
                            <strong>Waktu:</strong> ${data.created_at_formatted || data.created_at}
                        </div>
                        <div>
                            <strong>Komentar:</strong>
                            <p class="mt-2 text-gray-700 dark:text-gray-300 whitespace-pre-line">${data.comment}</p>
                        </div>
                        ${data.post ? `
                        <div>
                            <strong>Artikel:</strong>
                            <a href="${data.post_url}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">
                                ${data.post.title} (${data.post.type})
                            </a>
                        </div>
                        ` : ''}
                    </div>
                `;

                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    document.body.classList.add('overflow-hidden');

                    // Mark as read if currently displayed as unread in DOM
                    const row = document.querySelector(`[data-comment-id="${commentId}"]`);
                    if (row && row.dataset.isRead === '0') {
                        window.toggleReadStatus(commentId);
                    }
                }
            })
            .catch(error => {
                // console.error('Error:', error);
            });
    };

    window.closeCommentDetail = window.closeCommentDetail || function () {
        const modal = document.getElementById('comment-detail-modal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }
    };

    // Initialize on DOM ready
    document.addEventListener('DOMContentLoaded', function () {
        // Search and Filters are now handled by search-comments.js
        // We do not attach listeners here to avoid conflicts.

        // Row navigation via data-link-url (avoid inline onclick)
        document.querySelectorAll('tr[data-link-url]').forEach((row) => {
            row.addEventListener('click', function (e) {
                const stopEl = e.target.closest('.js-stop-prop');
                if (stopEl) return;
                const url = this.getAttribute('data-link-url');
                if (url) window.location.href = url;
            });
        });

        // Approve buttons are now handled in index.js to avoid duplication
        // See initCommentsActionHandlers() in index.js

        // Toggle read buttons are now handled in index.js to avoid duplication
        // See initCommentsActionHandlers() in index.js

        // Approve modal close button
        const approveClose = document.getElementById('approve-modal-close-btn');
        if (approveClose) {
            approveClose.addEventListener('click', function () {
                const modal = document.getElementById('approve-modal');
                if (modal) modal.classList.add('hidden');
            });
        }

        // Close comment detail modal
        const commentDetailModal = document.getElementById('comment-detail-modal');
        if (commentDetailModal) {
            commentDetailModal.addEventListener('click', function (e) {
                if (e.target === commentDetailModal) {
                    window.closeCommentDetail();
                }
            });
        }

        // Update relative times
        updateRelativeTimes();
        setInterval(updateRelativeTimes, 60000); // Update every minute

        // Initial render
        renderSidebarUnreadBadge();
    });
};
