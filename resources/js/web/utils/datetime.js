/**
 * DateTime Updater for Info Bar
 * Digunakan untuk update tanggal dan waktu secara real-time
 * Dipakai di: semua halaman website
 */

window.initDateTimeUpdater = function () {
    function updateDate() {
        const dateElement = document.getElementById('current-date');
        if (!dateElement) return;

        const now = new Date();
        const isMobile = window.innerWidth < 640;

        if (isMobile) {
            // Format Mobile: 13/01/2026
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const year = now.getFullYear();
            dateElement.textContent = `${day}/${month}/${year}`;
        } else {
            // Format Desktop: Senin, 13 Januari 2026
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            dateElement.textContent = now.toLocaleDateString('id-ID', options);
        }
    }

    function updateTime() {
        const timeElement = document.getElementById('current-time');
        if (!timeElement) return;

        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const isMobile = window.innerWidth < 640;

        if (isMobile) {
            // Format Mobile: HH:mm
            timeElement.textContent = `${hours}:${minutes}`;
        } else {
            // Format Desktop: HH:mm:ss WIB
            const seconds = String(now.getSeconds()).padStart(2, '0');
            timeElement.textContent = `${hours}:${minutes}:${seconds} WIB`;
        }
    }

    // Update awal
    updateDate();
    updateTime();

    // Store interval IDs untuk cleanup
    let timeInterval = null;
    let dateInterval = null;

    // Update waktu setiap detik
    timeInterval = setInterval(updateTime, 1000);

    // Update tanggal setiap menit (untuk memastikan tanggal berubah jika lewat tengah malam)
    dateInterval = setInterval(updateDate, 60000);

    // Update format saat resize layar
    window.addEventListener('resize', function () {
        updateDate();
        updateTime();
    });

    // Cleanup saat halaman tidak aktif
    document.addEventListener('visibilitychange', function () {
        if (document.hidden) {
            if (timeInterval) {
                clearInterval(timeInterval);
                timeInterval = null;
            }
            if (dateInterval) {
                clearInterval(dateInterval);
                dateInterval = null;
            }
        } else {
            // Restart intervals saat halaman aktif kembali
            if (!timeInterval) {
                timeInterval = setInterval(updateTime, 1000);
            }
            if (!dateInterval) {
                dateInterval = setInterval(updateDate, 60000);
            }
        }
    });

    window.addEventListener('pagehide', function () {
        if (timeInterval) {
            clearInterval(timeInterval);
            timeInterval = null;
        }
        if (dateInterval) {
            clearInterval(dateInterval);
            dateInterval = null;
        }
    });
};

