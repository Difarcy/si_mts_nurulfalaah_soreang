/**
 * Comment Reply Modal Component
 * Dipakai di: admin comments management
 */
window.initCommentReplyModalComponent = function () {
    const modal = document.getElementById('comment-reply-modal');
    const closeBtn = document.getElementById('comment-reply-close');
    const submitBtn = document.getElementById('comment-reply-submit');

    if (closeBtn && modal) {
        closeBtn.addEventListener('click', function () {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
    }

    if (submitBtn && modal) {
        submitBtn.addEventListener('click', function () {
            // Handle comment reply submission
            const form = document.getElementById('comment-reply-form');
            if (form) {
                form.submit();
            }
        });
    }

    // Close on backdrop click
    if (modal) {
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        });
    }
};

// Auto-initialize
document.addEventListener('DOMContentLoaded', function () {
    window.initCommentReplyModalComponent();
});
