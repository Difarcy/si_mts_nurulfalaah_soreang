/**
 * Inbox (Pesan Masuk) Index Logic
 * Entry point untuk halaman Pesan Masuk.
 * Menginisialisasi sistem pencarian real-time, filtering status, dan manajemen bulk actions.
 *
 * Dipanggil di: resources/views/admin/pages/inbox/index.blade.php
 */

// Initialize Real-time Search & Filters
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('inbox-content-container');
    if (!container) return;

    // Get route URL from container data attribute
    const routeUrl = container.getAttribute('data-route-url');

    // Initialize the generic search with proper configuration
    window.initGenericSearch({
        routeUrl: routeUrl || window.location.pathname,
        containerId: 'inbox-messages-container',
        searchInputId: 'search-input',
        filters: [
            { id: 'filter-status', param: 'status' }
        ],
        sort: { id: 'sort-select', param: 'sort' },
        resetBtnId: 'inbox-reset-btn',
        resetClearsSearch: false,
        showResetForSearch: false,
        onSuccess: function (doc) {
            // Re-initialize any event handlers for newly loaded content
            initInboxMessageHandlers();
            // Re-initialize inbox management after search
            if (window.initInboxManagement) {
                window.initInboxManagement();
            }
        }
    });

    // Initialize inbox management (toolbar, checkboxes, bulk actions)
    if (window.initInboxManagement) {
        window.initInboxManagement();
    }

    // Initialize message action handlers
    initInboxMessageHandlers();
});

// Handle individual message action buttons
function initInboxMessageHandlers() {
    const tbody = document.getElementById('inbox-container');
    if (!tbody) return;

    // Add click handler to rows to navigate to message detail
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

    // Delete buttons are handled by generic delete handler
    // Toggle read buttons are handled by initInboxManagement
}

// Create wrapper function for individual message toggle read
window.toggleInboxMessageReadStatus = function (messageId) {
    if (!messageId) return;

    const row = document.querySelector(`tr[data-id="${messageId}"]`);
    if (!row) return;

    // Find the toggle button
    const btn = row.querySelector('.toggle-read-btn');
    if (!btn) return;

    // Trigger click on the toggle button
    btn.click();
}
