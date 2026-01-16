/**
 * Posts Meta Description Auto-Update
 * Auto-update meta description dari excerpt atau body content
 * Dipakai di: posts-form.js
 */

window.PostsMetaDescription = {
    /**
     * Auto-update meta description
     */
    autoUpdate: function(getBodyContent) {
        const metaDescriptionInput = document.getElementById('meta-description-input');
        if (!metaDescriptionInput) return;

        if (metaDescriptionInput.value.trim() !== '') {
            return;
        }

        const excerptInput = document.getElementById('excerpt-input');
        let textToUse = '';

        if (excerptInput && excerptInput.value.trim() !== '') {
            textToUse = excerptInput.value.trim();
        } else {
            const bodyContent = getBodyContent ? getBodyContent() : '';
            if (bodyContent.trim() !== '') {
                textToUse = bodyContent.trim();
            }
        }

        if (textToUse !== '') {
            const metaText = textToUse.length > 160 ? textToUse.substring(0, 157) + '...' : textToUse;
            metaDescriptionInput.value = metaText;
            if (typeof window.updateCharCountDirect === 'function') {
                window.updateCharCountDirect('meta-description-input', 'meta-description-char-count', 255);
            }
        }
    }
};

