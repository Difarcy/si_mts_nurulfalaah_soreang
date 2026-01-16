<!-- Generic Action Confirmation Modal -->
<div id="confirm-modal"
    class="hidden fixed inset-0 z-9999 items-center justify-center bg-black/30 dark:bg-black/50 backdrop-blur-sm">
    <div class="bg-white dark:bg-slate-800 shadow-xl max-w-md w-full mx-4 rounded-lg transform transition-all">
        <div class="p-6">
            <h3 id="modal-title" class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-2">Perubahan Belum Disimpan</h3>
            <p id="modal-message" class="text-sm text-slate-600 dark:text-slate-400 mb-6">
                Anda memiliki perubahan yang belum disimpan. Apakah Anda yakin ingin meninggalkan halaman ini?
            </p>
            <div class="flex items-center justify-end gap-3">
                <button type="button" id="modal-cancel-btn"
                    class="px-4 py-1.5 text-sm font-semibold text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors min-w-25 rounded">
                    Batal
                </button>
                <button type="button" id="modal-discard-btn"
                    class="px-4 py-1.5 text-sm font-semibold text-white bg-red-600 hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-700 transition-colors min-w-25 rounded">
                    Buang Perubahan
                </button>
                <button type="button" id="modal-save-btn"
                    class="px-4 py-1.5 text-sm font-semibold text-white bg-green-600 hover:bg-green-700 transition-colors min-w-25 rounded">
                    <span id="modal-save-btn-text">Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>