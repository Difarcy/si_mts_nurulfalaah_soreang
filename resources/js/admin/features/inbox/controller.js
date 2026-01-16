/**
 * Management Inbox (Pesan)
 * Mengelola toolbar (select all, reload AJAX, toggle read, bulk delete)
 */

window.initInboxManagement = function () {
    const selectAll = document.getElementById('inbox-select-all');
    const tbody = document.getElementById('inbox-container');
    const reloadBtn = document.getElementById('inbox-reload-btn');
    const toggleBtn = document.getElementById('inbox-toggle-read-btn');
    const deleteBtn = document.getElementById('inbox-delete-btn');
    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const envIcon = document.getElementById('inbox-envelope-icon');

    function getBoxes() { return Array.from(tbody?.querySelectorAll('.inbox-row-checkbox') || []); }
    function getSelected() { return getBoxes().filter(cb => cb.checked).map(cb => cb.value); }
    function sync() { const b = getBoxes(); if (!b.length) { if (selectAll) selectAll.checked = false; return; } if (selectAll) selectAll.checked = b.every(cb => cb.checked); }

    if (selectAll && !selectAll.dataset.listenerAttached) {
        selectAll.addEventListener('change', () => { getBoxes().forEach(cb => cb.checked = selectAll.checked); updateEnvelopeIcon(); });
        selectAll.dataset.listenerAttached = 'true';
    }

    if (tbody && !tbody.dataset.listenerAttached) {
        tbody.addEventListener('change', (e) => { if (e.target.classList.contains('inbox-row-checkbox')) { sync(); updateEnvelopeIcon(); } });
        tbody.dataset.listenerAttached = 'true';
    }

    // Update envelope icon based on selected items' status
    function updateEnvelopeIcon(source = 'selection') {
        const ids = getSelected();
        if (!envIcon) return;

        if (!ids.length) {
            // Hide buttons when no items selected
            toggleBtn.classList.add('hidden');
            if (deleteBtn) deleteBtn.classList.add('hidden');

            // Default icon
            envIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />`;
            return;
        }

        // Show buttons
        toggleBtn.classList.remove('hidden');
        toggleBtn.style.opacity = '1';
        toggleBtn.style.cursor = 'pointer';
        toggleBtn.disabled = false;

        if (deleteBtn) {
            deleteBtn.classList.remove('hidden');
            deleteBtn.style.opacity = '1';
            deleteBtn.style.cursor = 'pointer';
            deleteBtn.disabled = false;
        }

        const hasUnread = ids.some(id => {
            const row = tbody?.querySelector(`tr[data-id="${id}"]`);
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

    if (reloadBtn && !reloadBtn.dataset.listenerAttached) {
        reloadBtn.addEventListener('click', () => {
            window.location.reload();
        });
        reloadBtn.dataset.listenerAttached = 'true';
    }

    if (toggleBtn && !toggleBtn.dataset.listenerAttached) {
        toggleBtn.addEventListener('click', () => {
            const ids = getSelected(); if (!ids.length) return;

            // Visual Toggle for Toolbar Icon
            const hasUnread = ids.some(id => {
                const row = tbody?.querySelector(`tr[data-id="${id}"]`);
                return row?.dataset.isRead === '0';
            });

            if (hasUnread) { // Action: Mark as Read -> Show Open Envelope
                envIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />`;
                toggleBtn.title = 'Tandai Belum Dibaca';
            } else { // Action: Mark as Unread -> Show Closed Envelope
                envIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />`;
                toggleBtn.title = 'Tandai Dibaca';
            }

            ids.forEach(id => {
                const row = tbody?.querySelector(`tr[data-id="${id}"]`);
                if (!row) return;

                const currentIsRead = row.dataset.isRead === '1';
                const targetIsRead = hasUnread; // If any unread, target is Read. Else Unread.

                if (currentIsRead === targetIsRead) return; // Skip if already compatible

                // --- Optimistic UI Update ---
                const newStatusRead = targetIsRead;
                row.dataset.isRead = newStatusRead ? '1' : '0';

                // 1. Update Styles
                if (newStatusRead) { // Read Style
                    row.classList.remove('font-bold', 'bg-white', 'dark:bg-slate-800');
                    row.classList.add('bg-slate-50', 'dark:bg-slate-800/50', 'text-slate-600', 'dark:text-slate-400');
                    row.querySelector('td:nth-child(2) span')?.classList.remove('font-bold', 'text-slate-900', 'dark:text-slate-100');
                    const messageSpan = row.querySelector('td:nth-child(3) span');
                    if (messageSpan) {
                        messageSpan.classList.remove('font-bold', 'text-slate-900', 'dark:text-slate-100');
                        messageSpan.classList.add('font-normal', 'text-slate-500', 'dark:text-slate-400');
                    }
                    const timeSpan = row.querySelector('td:nth-child(4) span');
                    if (timeSpan) {
                        timeSpan.classList.remove('font-bold', 'text-slate-700', 'dark:text-slate-200');
                        timeSpan.classList.add('text-slate-500', 'dark:text-slate-400');
                    }
                    // Row Icon -> Open
                    const btn = row.querySelector('.toggle-read-btn');
                    if (btn) {
                        btn.title = 'Tandai Belum Dibaca';
                        btn.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" /></svg>`;
                    }
                } else { // Unread Style
                    row.classList.add('font-bold', 'bg-white', 'dark:bg-slate-800');
                    row.classList.remove('bg-slate-50', 'dark:bg-slate-800/50', 'text-slate-600', 'dark:text-slate-400');
                    row.querySelector('td:nth-child(2) span')?.classList.add('font-bold', 'text-slate-900', 'dark:text-slate-100');
                    const messageSpan = row.querySelector('td:nth-child(3) span');
                    if (messageSpan) {
                        messageSpan.classList.add('font-bold', 'text-slate-900', 'dark:text-slate-100');
                        messageSpan.classList.remove('font-normal', 'text-slate-500', 'dark:text-slate-400');
                    }
                    const timeSpan = row.querySelector('td:nth-child(4) span');
                    if (timeSpan) {
                        timeSpan.classList.add('font-bold', 'text-slate-700', 'dark:text-slate-200');
                        timeSpan.classList.remove('text-slate-500', 'dark:text-slate-400');
                    }
                    // Row Icon -> Closed
                    const btn = row.querySelector('.toggle-read-btn');
                    if (btn) {
                        btn.title = 'Tandai Dibaca';
                        btn.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>`;
                    }
                }

                // 2. Update Sidebar Badge
                const sidebarBadge = document.getElementById('sidebar-unread-messages-badge');
                const sidebarLink = document.getElementById('sidebar-inbox-link');
                let currentCount = 0;
                if (sidebarBadge) { currentCount = parseInt(sidebarBadge.textContent.replace('+', '')) || 0; }

                // If becomes Read -> decrease count. If becomes Unread -> increase count.
                const delta = newStatusRead ? -1 : 1;
                const newCount = Math.max(0, currentCount + delta);

                if (newCount <= 0) {
                    if (sidebarBadge) sidebarBadge.remove();
                } else {
                    if (sidebarBadge) {
                        sidebarBadge.textContent = newCount > 99 ? '99+' : String(newCount);
                    } else if (sidebarLink) {
                        const badge = document.createElement('span');
                        badge.id = 'sidebar-unread-messages-badge';
                        badge.className = 'inline-flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-bold text-white bg-red-600 rounded-full';
                        badge.textContent = '1';
                        sidebarLink.appendChild(badge);
                    }
                }

                const route = newStatusRead ? `/cpanel/inbox/${id}/read` : `/cpanel/inbox/${id}/unread`;
                fetch(route, { method: 'PATCH', headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' } })
                    .catch(err => {});
            });
        });
        toggleBtn.dataset.listenerAttached = 'true';
    }

    if (deleteBtn && !deleteBtn.dataset.listenerAttached) {
        deleteBtn.addEventListener('click', () => {
            const ids = getSelected();
            if (!ids.length) return;

            // Show delete modal
            const modal = document.getElementById('delete-modal');
            const itemCountEl = document.getElementById('delete-item-count');
            const confirmBtn = document.getElementById('confirm-delete-btn');
            const cancelBtn = document.getElementById('delete-modal-close-btn');

            if (modal && itemCountEl && confirmBtn) {
                // Update modal text
                itemCountEl.textContent = `${ids.length}`;

                // Show modal
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('overflow-hidden');

                // Handle confirm delete
                const handleConfirmDelete = () => {
                    confirmBtn.disabled = true;
                    const originalText = confirmBtn.textContent;
                    confirmBtn.textContent = 'Menghapus...';

                    const promises = ids.map(id =>
                        fetch(`/cpanel/inbox/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrf,
                                'Accept': 'application/json'
                            }
                        })
                            .then(r => r.json())
                            .then(data => {
                                if (data.success) {
                                    const row = tbody?.querySelector(`tr[data-id="${id}"]`);
                                    if (row) row.remove();
                                }
                            })
                    );

                    Promise.all(promises).then(() => {
                        // Close modal
                        modal.classList.add('hidden');
                        modal.classList.remove('flex');
                        document.body.classList.remove('overflow-hidden');

                        // Reset
                        sync();
                        updateEnvelopeIcon();
                        selectAll.checked = false;

                        // Reload to refresh stats
                        window.location.reload();
                    }).catch(err => {
                        confirmBtn.disabled = false;
                        confirmBtn.textContent = originalText;
                        alert('Gagal menghapus beberapa pesan.');
                    });
                };

                // Handle cancel
                const handleCancelDelete = () => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.classList.remove('overflow-hidden');
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
        });
        deleteBtn.dataset.listenerAttached = 'true';
    }

    // Individual toggle read listener - Attach directly to buttons
    // We cannot use delegation on tbody because the wrapper div has stopPropagation
    // to prevent row click (navigation).
    // This MUST be re-run whenever rows change, so we don't guard it with listenerAttached on the function.
    const updateToggleListeners = () => {
        const btns = tbody?.querySelectorAll('.toggle-read-btn');
        btns?.forEach(btn => {
            if (btn.dataset.listenerAttached) return;

            btn.addEventListener('click', (e) => {
                e.stopPropagation(); // Stop bubbling to row

                const id = btn.dataset.id;
                if (!id) return;

                const row = tbody.querySelector(`tr[data-id="${id}"]`);
                if (!row) return;

                // OPTIMISTIC UI
                const isCurrentlyRead = row.dataset.isRead === '1';
                const newStatusRead = !isCurrentlyRead;

                // Update DOM State
                row.dataset.isRead = newStatusRead ? '1' : '0';

                // Update Styles
                if (newStatusRead) { // Read
                    row.classList.remove('font-bold', 'bg-white', 'dark:bg-slate-800');
                    row.classList.add('bg-slate-50', 'dark:bg-slate-800/50', 'text-slate-600', 'dark:text-slate-400');
                    row.querySelector('td:nth-child(2) span')?.classList.remove('font-bold', 'text-slate-900', 'dark:text-slate-100');
                    const messageSpan = row.querySelector('td:nth-child(3) span');
                    if (messageSpan) {
                        messageSpan.classList.remove('font-bold', 'text-slate-900', 'dark:text-slate-100');
                        messageSpan.classList.add('font-normal', 'text-slate-500', 'dark:text-slate-400');
                    }
                    const timeSpan = row.querySelector('td:nth-child(4) span');
                    if (timeSpan) {
                        timeSpan.classList.remove('font-bold', 'text-slate-700', 'dark:text-slate-200');
                        timeSpan.classList.add('text-slate-500', 'dark:text-slate-400');
                    }
                    // Icon Open
                    btn.title = 'Tandai Belum Dibaca';
                    btn.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" /></svg>`;
                } else { // Unread
                    row.classList.add('font-bold', 'bg-white', 'dark:bg-slate-800');
                    row.classList.remove('bg-slate-50', 'dark:bg-slate-800/50', 'text-slate-600', 'dark:text-slate-400');
                    row.querySelector('td:nth-child(2) span')?.classList.add('font-bold', 'text-slate-900', 'dark:text-slate-100');
                    const messageSpan = row.querySelector('td:nth-child(3) span');
                    if (messageSpan) {
                        messageSpan.classList.add('font-bold', 'text-slate-900', 'dark:text-slate-100');
                        messageSpan.classList.remove('font-normal', 'text-slate-500', 'dark:text-slate-400');
                    }
                    const timeSpan = row.querySelector('td:nth-child(4) span');
                    if (timeSpan) {
                        timeSpan.classList.add('font-bold', 'text-slate-700', 'dark:text-slate-200');
                        timeSpan.classList.remove('text-slate-500', 'dark:text-slate-400');
                    }
                    // Icon Closed
                    btn.title = 'Tandai Dibaca';
                    btn.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>`;
                }

                // Update Sidebar Badge
                const sidebarBadge = document.getElementById('sidebar-unread-messages-badge');
                const sidebarLink = document.getElementById('sidebar-inbox-link');
                let currentCount = 0;
                if (sidebarBadge) { currentCount = parseInt(sidebarBadge.textContent.replace('+', '')) || 0; }

                // If becomes Read -> decrease count. If becomes Unread -> increase count.
                const delta = newStatusRead ? -1 : 1;
                const newCount = Math.max(0, currentCount + delta);

                if (newCount <= 0) {
                    if (sidebarBadge) sidebarBadge.remove();
                } else {
                    if (sidebarBadge) {
                        sidebarBadge.textContent = newCount > 99 ? '99+' : String(newCount);
                    } else if (sidebarLink) {
                        const badge = document.createElement('span');
                        badge.id = 'sidebar-unread-messages-badge';
                        badge.className = 'inline-flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-bold text-white bg-red-600 rounded-full';
                        badge.textContent = '1';
                        sidebarLink.appendChild(badge);
                    }
                }

                // Sync toolbar icon immediately
                setTimeout(() => updateEnvelopeIcon('status_change'), 0);

                // Background Fetch
                const route = isCurrentlyRead ? `/cpanel/inbox/${id}/unread` : `/cpanel/inbox/${id}/read`;

                fetch(route, { method: 'PATCH', headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' } })
                    .catch(err => {});
            });

            btn.dataset.listenerAttached = 'true';
        });
    };

    // Initialize listeners
    updateToggleListeners();
    updateEnvelopeIcon();
};
