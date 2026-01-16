<!-- Generic Delete Confirmation Modal -->
<div id="delete-confirmation-modal"
    class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/30 dark:bg-black/50 backdrop-blur-sm">
    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-2">Konfirmasi Hapus</h3>
            <p class="text-sm text-slate-600 dark:text-slate-400 mb-6">
                <span id="delete-confirmation-message">Apakah Anda yakin ingin menghapus item ini?</span>
                <br>
                <strong id="delete-confirmation-title" class="block mt-1"></strong>
            </p>
            <div class="flex items-center justify-end gap-3">
                <button type="button" id="delete-confirmation-cancel"
                    class="px-4 py-1.5 text-sm font-semibold text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors min-w-25 rounded">
                    Batal
                </button>
                <form id="delete-confirmation-form" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-1.5 text-sm font-semibold text-white bg-red-700 hover:bg-red-800 transition-colors min-w-25 rounded">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
