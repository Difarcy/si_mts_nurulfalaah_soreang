/**
 * Auto-refresh berita terbaru tanpa reload halaman
 * Digunakan untuk auto-refresh konten berita/artikel
 * Dipakai di: home.blade.php, berita.blade.php, artikel.blade.php
 */

window.initAutoRefreshPosts = function(lastUpdateTimestamp, apiUrl) {
    let currentTimestamp = lastUpdateTimestamp;
    let isPageVisible = true;
    let refreshInterval = null;
    let initialCheckTimeout = null;
    let activeControllers = []; // Store all active fetch controllers

    // Cek apakah halaman terlihat (user tidak minimize tab)
    document.addEventListener('visibilitychange', function() {
        isPageVisible = !document.hidden;
        if (isPageVisible) {
            startAutoRefresh();
        } else {
            stopAutoRefresh();
            // Cancel all active fetch requests
            cancelAllActiveRequests();
        }
    });

    function checkForNewPosts() {
        if (!isPageVisible) return;

        // Create AbortController untuk timeout
        const controller = new AbortController();
        activeControllers.push(controller);
        const timeoutId = setTimeout(() => {
            controller.abort();
            removeController(controller);
        }, 5000); // Timeout 5 detik

        fetch(apiUrl, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            cache: 'no-cache',
            signal: controller.signal
        })
        .then(response => {
            clearTimeout(timeoutId);
            removeController(controller);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success && data.last_update > currentTimestamp) {
                currentTimestamp = data.last_update;
                showNewPostsNotification();
                updateLastUpdateDisplay(data.last_update);
            }
        })
        .catch(error => {
            if (error.name !== 'AbortError') {
                // console.error('Auto-refresh error:', error);
            }
        });
    }

    function removeController(controller) {
        const index = activeControllers.indexOf(controller);
        if (index > -1) {
            activeControllers.splice(index, 1);
        }
    }

    function cancelAllActiveRequests() {
        activeControllers.forEach(controller => {
            controller.abort();
        });
        activeControllers = [];
    }

    function showNewPostsNotification() {
        const notification = document.getElementById('new-posts-notification');
        if (notification) {
            notification.classList.remove('hidden');
            notification.classList.add('animate-pulse');

            // Auto-hide setelah 5 detik
            setTimeout(() => {
                notification.classList.add('hidden');
                notification.classList.remove('animate-pulse');
            }, 5000);
        }
    }

    function updateLastUpdateDisplay(timestamp) {
        const lastUpdateEl = document.getElementById('last-update');
        if (lastUpdateEl) {
            const date = new Date(timestamp * 1000);
            lastUpdateEl.textContent = date.toLocaleString('id-ID');
        }
    }

    function startAutoRefresh() {
        if (refreshInterval) return;

        // Cek pertama setelah 2 detik
        initialCheckTimeout = setTimeout(checkForNewPosts, 2000);

        // Kemudian cek setiap 30 detik
        refreshInterval = setInterval(checkForNewPosts, 30000);
    }

    function stopAutoRefresh() {
        if (initialCheckTimeout) {
            clearTimeout(initialCheckTimeout);
            initialCheckTimeout = null;
        }
        if (refreshInterval) {
            clearInterval(refreshInterval);
            refreshInterval = null;
        }
    }

    // Mulai auto-refresh
    startAutoRefresh();

    // Cleanup saat page unload
    window.addEventListener('beforeunload', function() {
        stopAutoRefresh();
        cancelAllActiveRequests();
    });
};
