/**
 * Posts Form Helper Functions
 * Helper functions untuk posts form
 * Dipakai di: posts-form.js
 */

window.PostsFormHelpers = {
    /**
     * Get body content as plain text
     */
    getBodyContent: function() {
        let bodyContent = '';
        if (typeof window.TinyMCECommon !== 'undefined' && window.TinyMCECommon.getContentText) {
            bodyContent = window.TinyMCECommon.getContentText('body-editor');
        } else {
        const bodyInput = document.querySelector('textarea[name="body"]');
        if (bodyInput) {
                bodyContent = bodyInput.value || '';
            }
        }
        return bodyContent;
    },

    /**
     * Get body content as HTML
     */
    getBodyHtmlContent: function() {
        const bodyInput = document.querySelector('textarea[name="body"]');
        let content = '';
        
        if (typeof window.TinyMCECommon !== 'undefined' && window.TinyMCECommon.getContent) {
            content = window.TinyMCECommon.getContent('body-editor');
        } else if (bodyInput) {
            content = bodyInput.value;
        }
        
        if (content === undefined || content === null) return '';
        const raw = String(content).trim();
        if (!raw) return '';

        const text = raw
            .replace(/&nbsp;/gi, ' ')
            .replace(/<br\s*\/?>/gi, ' ')
            .replace(/<\/?p[^>]*>/gi, ' ')
            .replace(/<\/?div[^>]*>/gi, ' ')
            .replace(/<\/?span[^>]*>/gi, ' ')
            .replace(/<\/?strong[^>]*>/gi, ' ')
            .replace(/<\/?em[^>]*>/gi, ' ')
            .replace(/<\/?b[^>]*>/gi, ' ')
            .replace(/<\/?i[^>]*>/gi, ' ')
            .replace(/<\/?u[^>]*>/gi, ' ')
            .replace(/<\/?a[^>]*>/gi, ' ')
            .replace(/<\/?ul[^>]*>/gi, ' ')
            .replace(/<\/?ol[^>]*>/gi, ' ')
            .replace(/<\/?li[^>]*>/gi, ' ')
            .replace(/<\/?h[1-6][^>]*>/gi, ' ')
            .replace(/<\/?blockquote[^>]*>/gi, ' ')
            .replace(/<\/?table[^>]*>/gi, ' ')
            .replace(/<\/?thead[^>]*>/gi, ' ')
            .replace(/<\/?tbody[^>]*>/gi, ' ')
            .replace(/<\/?tr[^>]*>/gi, ' ')
            .replace(/<\/?td[^>]*>/gi, ' ')
            .replace(/<\/?th[^>]*>/gi, ' ')
            .replace(/<[^>]+>/g, ' ')
            .replace(/\s+/g, ' ')
            .trim();

        if (!text) return '';
        return raw;
    },

    /**
     * Update submit button text based on status
     */
    updateSubmitButtonText: function(status, isEditMode) {
        const submitBtnText = document.getElementById('submit-btn-text');
        if (submitBtnText) {
            let newText = 'Simpan';

            if (!isEditMode) {
                // Saat tambah (create)
                if (status === 'published') {
                    newText = 'Publish';
                } else {
                    // draft atau lainnya
                    newText = 'Simpan';
                }
            } else {
                // Saat ubah (edit)
                // Selalu 'Simpan' untuk konsistensi update, 
                // tapi jika user ingin mengubah status dari draft -> publish, bisa jadi 'Publish'
                // Namun requestnya: "jika saat ubah berarti simpan, ubah draft/nonaktif berarti tetap simpan"
                // Jadi untuk edit mode, selalu 'Simpan' sudah benar sesuai request.
                newText = 'Simpan';
            }
            
            submitBtnText.textContent = newText;
            
            // Force update dengan innerHTML jika textContent tidak bekerja
            if (submitBtnText.textContent !== newText) {
                submitBtnText.innerHTML = newText;
            }
        }
    }
};
