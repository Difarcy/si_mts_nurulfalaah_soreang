<!-- Image Preview Modal -->
<div id="imagePreviewModal"
    class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/30 dark:bg-black/50 backdrop-blur-sm"
    data-image-preview-modal>
    <div class="relative w-full h-full flex items-center justify-center p-3" data-image-preview-content>
        <img id="previewImage" src="" alt="Preview" class="max-w-full max-h-[90vh] object-contain pointer-events-none">
        <button type="button"
            class="close-modal-btn fixed top-4 right-4 w-10 h-10 flex items-center justify-center text-white hover:text-slate-200 transition-colors z-10"
            data-image-preview-close>
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>
    </div>
</div>