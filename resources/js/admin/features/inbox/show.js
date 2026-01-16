document.addEventListener('DOMContentLoaded', function () {
    const inboxDetailContainer = document.querySelector('[data-delete-trigger]'); // Using delete button as marker or page header
    // Or better check for a unique element on the page
    
    // We can rely on the presence of specific elements for this page
    // But let's look at the blade file again.
    // The blade has no specific container ID for the whole page logic, but it calls initInboxDetailManagement.
    
    if (typeof window.initInboxDetailManagement === 'function') {
        window.initInboxDetailManagement();
    }
});
