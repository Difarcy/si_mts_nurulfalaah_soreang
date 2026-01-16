/**
 * Header Mobile Dropdown
 * Digunakan untuk toggle dropdown menu di mobile
 * Dipakai di: semua halaman website
 */

window.initHeaderDropdowns = function() {
    // Helper function untuk toggle dropdown
    function toggleDropdown(toggle, menu) {
        if (!toggle || !menu) return;
        const isOpen = menu.classList.contains('opacity-100') && menu.classList.contains('visible');
        if (isOpen) {
            menu.classList.remove('opacity-100', 'visible');
            menu.classList.add('opacity-0', 'invisible');
        } else {
            menu.classList.remove('opacity-0', 'invisible');
            menu.classList.add('opacity-100', 'visible');
        }
    }

    // Helper function untuk close dropdown saat klik di luar
    function setupOutsideClick(dropdown, menu) {
        if (!dropdown || !menu) return;
        document.addEventListener('click', function(e) {
            if (window.innerWidth < 768 && !dropdown.contains(e.target)) {
                menu.classList.remove('opacity-100', 'visible');
                menu.classList.add('opacity-0', 'invisible');
            }
        });
    }

    // Dropdown PROFIL untuk mobile
    const profilDropdown = document.getElementById('profil-dropdown');
    const profilToggle = document.getElementById('profil-toggle');
    const profilDropdownMenu = document.getElementById('profil-dropdown-menu');

    if (profilToggle && profilDropdownMenu) {
        profilToggle.addEventListener('click', function(e) {
            if (window.innerWidth < 768) {
                e.preventDefault();
                e.stopPropagation();
                toggleDropdown(profilToggle, profilDropdownMenu);
            }
        });
    }
    setupOutsideClick(profilDropdown, profilDropdownMenu);

    // Dropdown PROGRAM untuk mobile
    const programDropdown = document.getElementById('program-dropdown');
    const programToggle = document.getElementById('program-toggle');
    const programDropdownMenu = document.getElementById('program-dropdown-menu');

    if (programToggle && programDropdownMenu) {
        programToggle.addEventListener('click', function(e) {
            if (window.innerWidth < 768) {
                e.preventDefault();
                e.stopPropagation();
                toggleDropdown(programToggle, programDropdownMenu);
            }
        });
    }
    setupOutsideClick(programDropdown, programDropdownMenu);

    // Dropdown GALERI untuk mobile
    const galeriDropdown = document.getElementById('galeri-dropdown');
    const galeriToggle = document.getElementById('galeri-toggle');
    const galeriDropdownMenu = document.getElementById('galeri-dropdown-menu');

    if (galeriToggle && galeriDropdownMenu) {
        galeriToggle.addEventListener('click', function(e) {
            if (window.innerWidth < 768) {
                e.preventDefault();
                e.stopPropagation();
                toggleDropdown(galeriToggle, galeriDropdownMenu);
            }
        });
    }
    setupOutsideClick(galeriDropdown, galeriDropdownMenu);

    // Dropdown INFORMASI untuk mobile
    const informasiDropdown = document.getElementById('informasi-dropdown');
    const informasiToggle = document.getElementById('informasi-toggle');
    const informasiDropdownMenu = document.getElementById('informasi-dropdown-menu');

    if (informasiToggle && informasiDropdownMenu) {
        informasiToggle.addEventListener('click', function(e) {
            if (window.innerWidth < 768) {
                e.preventDefault();
                e.stopPropagation();
                toggleDropdown(informasiToggle, informasiDropdownMenu);
            }
        });
    }
    setupOutsideClick(informasiDropdown, informasiDropdownMenu);
};

