/**
 * Agenda (Schedule) Form Page Initialization
 * Entry point untuk halaman form (create/edit) Agenda.
 * Menginisialisasi form controller dan penghitung karakter.
 *
 * Dipanggil di: resources/views/admin/pages/agenda/create.blade.php & edit.blade.php
 */

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('agenda-form');

    if (form) {
        // Initialize Agenda Form Controller
        if (typeof window.initScheduleForm === 'function') {
            window.initScheduleForm({
                formId: 'agenda-form',
                bodyEditorId: 'body-editor',
                tanggalMulaiId: 'tanggal_mulai',
                tanggalSelesaiId: 'tanggal_selesai',
                statusSelectId: 'status-select',
                isActiveInputId: 'is_active',
                submitBtnId: 'submit-btn',
                submitBtnTextId: 'submit-btn-text'
            });
        }


    }
});
