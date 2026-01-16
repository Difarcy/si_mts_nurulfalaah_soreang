/**
 * Public Notification System (dipakai di website dan cpanel)
 */
window.showPublicNotification = function (message, type = 'success') {
    const modal = document.getElementById('public-notification-modal');
    const content = document.getElementById('public-notification-content');
    if (!modal || !content) return;

    content.innerHTML = '';

    const notification = document.createElement('div');
    const isLoading = type === 'loading';

    // Determine colors based on type
    let themeClass = 'bg-green-700 border-green-700'; // default success
    if (type === 'error') {
        themeClass = 'bg-red-700 border-red-700';
    } else if (type === 'warning') {
        themeClass = 'bg-amber-600 border-amber-600';
    } else if (type === 'info') {
        themeClass = 'bg-blue-700 border-blue-700';
    }

    const iconHtml = isLoading ?
        '<div class="animate-spin rounded-full h-5 w-5 border-2 border-white border-t-transparent"></div>' :
        (type === 'success' ?
            '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' :
            type === 'error' ?
            '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' :
            type === 'warning' ?
            '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' :
            '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
        );

    notification.className = `mx-auto max-w-md p-4 rounded-lg shadow-lg border font-medium ${themeClass}`;
    notification.innerHTML = `
        <div class="flex items-center gap-3">
            <div class="shrink-0">${iconHtml}</div>
            <div class="flex-1">
                <p class="text-white text-sm font-medium">${message}</p>
            </div>
        </div>
    `;

    content.appendChild(notification);

    modal.classList.remove('hidden');
    modal.classList.add('flex', 'items-start', 'justify-center', 'pt-6', 'px-4', 'pointer-events-none');
    setTimeout(() => {
        content.classList.remove('-translate-y-full');
        content.classList.add('translate-y-0');
    }, 50);

    if (!isLoading) {
        setTimeout(() => {
            hidePublicNotification();
        }, 3000);
    }
};

window.hidePublicNotification = function () {
    const modal = document.getElementById('public-notification-modal');
    const content = document.getElementById('public-notification-content');
    if (!modal || !content) return;

    content.classList.remove('translate-y-0');
    content.classList.add('-translate-y-full');
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex', 'items-start', 'justify-center', 'pt-6', 'px-4', 'pointer-events-none');
        content.innerHTML = '';
    }, 500);
};

// Alias for Admin Context
window.showAdminNotification = window.showPublicNotification;
window.hideAdminNotification = window.hidePublicNotification;
