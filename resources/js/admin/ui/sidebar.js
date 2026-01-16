/**
 * Sidebar Toggle & Submenu
 * Dipakai di: admin layout
 */
window.initSidebarToggle = function () {
    const sidebarToggle = document.getElementById('sidebar-toggle-btn');
    const closeSidebarBtn = document.getElementById('close-sidebar-btn');
    const sidebar = document.getElementById('admin-sidebar');
    const sidebarOverlay = document.getElementById('sidebar-overlay');

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function () {
            // Mobile toggle
            if (window.innerWidth < 1024) {
                sidebar.classList.toggle('-translate-x-full');
                sidebar.classList.toggle('translate-x-0');
            }
            // Desktop toggle (if needed)
            else {
                sidebar.classList.toggle('lg:translate-x-0');
            }

            // Show/hide overlay on mobile
            if (sidebarOverlay) {
                if (sidebar.classList.contains('-translate-x-full')) {
                    sidebarOverlay.classList.add('hidden');
                } else {
                    sidebarOverlay.classList.remove('hidden');
                }
            }
        });
    }

    // Handle close button click
    if (closeSidebarBtn && sidebar) {
        closeSidebarBtn.addEventListener('click', function () {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
            if (sidebarOverlay) {
                sidebarOverlay.classList.add('hidden');
            }
        });
    }

    // Handle overlay click
    if (sidebarOverlay && sidebar) {
        sidebarOverlay.addEventListener('click', function () {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
            sidebarOverlay.classList.add('hidden');
        });
    }
};

window.initSidebarSubmenuToggle = function () {
    const submenuToggles = document.querySelectorAll('.sidebar-menu-toggle');

    submenuToggles.forEach(function (toggle) {
        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            const submenuId = this.getAttribute('data-target');
            const submenu = document.getElementById(submenuId);
            const icon = this.querySelector('svg:last-child');

            if (submenu) {
                submenu.classList.toggle('hidden');
                if (icon) {
                    icon.classList.toggle('rotate-90');
                }
            }
        });
    });
};

// Note: Initialized by admin.js DOMContentLoaded event
