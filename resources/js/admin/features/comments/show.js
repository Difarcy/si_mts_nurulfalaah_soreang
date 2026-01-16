document.addEventListener('DOMContentLoaded', function () {
    const replyBoxContainer = document.getElementById('reply-box-container');

    if (replyBoxContainer && typeof window.initCommentDetail === 'function') {
        const hasErrors = replyBoxContainer.dataset.hasErrors === 'true';
        window.initCommentDetail({
            hasErrors: hasErrors
        });
    }
});
