/**
 * User Menu Dropdown
 * Dipakai di: admin layout
 */
window.initUserMenuDropdown = function () {
    const userMenuToggle = document.getElementById('user-menu-toggle');
    const userMenu = document.getElementById('user-menu');

    if (userMenuToggle && userMenu) {
        userMenuToggle.addEventListener('click', function (e) {
            e.preventDefault();
            userMenu.classList.toggle('hidden');
        });

        // Close on outside click
        document.addEventListener('click', function (e) {
            if (!userMenuToggle.contains(e.target) && !userMenu.contains(e.target)) {
                userMenu.classList.add('hidden');
            }
        });
    } else {
        // Fallback: Convert individual buttons to dropdown behavior if user-menu elements don't exist
        // This is for compatibility with the current header design
        const buttons = document.querySelectorAll('a[href*="change-username"], a[href*="change-password"]');
        const logoutBtn = document.getElementById('logout-btn');

        // Add click handlers for individual buttons if needed
        buttons.forEach(button => {
            if (button) {
                button.addEventListener('click', function(e) {
                    // Individual buttons work as-is, no dropdown needed
                    // This maintains current functionality
                });
            }
        });

        if (logoutBtn) {
            logoutBtn.addEventListener('click', function(e) {
                // Handle logout button click
                const logoutForm = document.getElementById('logout-form');
                if (logoutForm) {
                    logoutForm.submit();
                }
            });
        }
    }
};

// Note: Initialized by admin.js DOMContentLoaded event
