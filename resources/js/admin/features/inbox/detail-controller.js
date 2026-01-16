/**
 * Inbox Detail Interactions
 * Handles delete modal, copy to clipboard, and toast notifications.
 * Used in: resources/views/admin/pages/interaction/inbox/show.blade.php
 */

window.initInboxDetailManagement = function () {

    function showInboxToast(message) {
        const toast = document.getElementById('toast-notification');
        const msg = document.getElementById('toast-message');

        if (toast && msg) {
            msg.textContent = message;
            toast.classList.remove('translate-y-20', 'opacity-0');

            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 3000);
        }
    }

    function copyToClipboard(text) {
        if (!navigator.clipboard) {
            // Fallback for older browsers
            const textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                document.execCommand('copy');
                showInboxToast('Disalin ke clipboard: ' + text);
            } catch (err) {
                // console.error('Gagal menyalin', err);
            }
            document.body.removeChild(textArea);
            return;
        }

        navigator.clipboard.writeText(text).then(function () {
            showInboxToast('Disalin: ' + text);
        }, function (err) {
            // console.error('Gagal menyalin: ', err);
        });
    }

    // Attach listeners
    const copyButtons = document.querySelectorAll('.js-copy-clipboard');
    copyButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const text = this.getAttribute('data-copy-text');
            if (text) {
                copyToClipboard(text);
            }
        });
    });
};
