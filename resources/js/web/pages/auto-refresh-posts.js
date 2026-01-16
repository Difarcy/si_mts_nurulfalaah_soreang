/**
 * Auto-initialize Home Auto Refresh
 * Searches for element with id="auto-refresh-config"
 */

document.addEventListener('DOMContentLoaded', function () {
    const configEl = document.getElementById('auto-refresh-config');
    
    if (configEl && typeof window.initAutoRefreshPosts === 'function') {
        const lastUpdate = parseInt(configEl.dataset.lastUpdate || Math.floor(Date.now() / 1000));
        const routeUrl = configEl.dataset.routeUrl;
        
        if (routeUrl) {
            window.initAutoRefreshPosts(lastUpdate, routeUrl);
        }
    }
});
