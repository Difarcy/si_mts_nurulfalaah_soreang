/**
 * Management Comment Detail
 * Handles logic for the comment detail page (admin/pages/content/comments/show.blade.php)
 * Includes reply box toggling, minimization, and simplified emoji picker.
 */

import 'emoji-picker-element';

window.initCommentDetail = function (options = {}) {
    const {
        hasErrors = false
    } = options;

    let isMinimized = false;

    // Update reply as name text when input changes
    const adminReplyByInput = document.getElementById('admin-reply-by-input');
    const replyAsNameSpan = document.getElementById('reply-as-name');

    if (adminReplyByInput && replyAsNameSpan) {
        adminReplyByInput.addEventListener('input', function () {
            replyAsNameSpan.textContent = this.value || 'admin';
        });
    }

    // Local functions (not global)
    function openReplyBox() {
        const box = document.getElementById('reply-box-container');
        const textarea = document.getElementById('reply-textarea');
        const body = document.getElementById('reply-body');

        if (box) {
            box.classList.remove('translate-y-full');

            // Ensure expanded when opening
            if (body) {
                body.style.display = 'block';
                isMinimized = false;
                // Set icon to chevron down (expanded)
                const icon = document.getElementById('minimize-icon');
                if (icon) icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />';
            }

            if (textarea) {
                // Do not auto-focus textarea to match website behavior
                // setTimeout(() => textarea.focus(), 300);
            }

            // Initialize emoji picker when reply box opens
            setTimeout(initAdminEmojiPicker, 300);
        }
    }

    function closeReplyBox(e) {
        if (e) e.stopPropagation();
        const box = document.getElementById('reply-box-container');
        if (box) {
            box.classList.add('translate-y-full');
        }
    }

    function toggleMinimize() {
        const body = document.getElementById('reply-body');
        const icon = document.getElementById('minimize-icon');
        if (!body || !icon) return;

        if (isMinimized) {
            body.style.display = 'block';
            isMinimized = false;
            // Restore icon (chevron down)
            icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />';
        } else {
            body.style.display = 'none';
            isMinimized = true;
            // Minimize icon (chevron up or minus?)
            icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />';
        }
    }


    // Attach Event Listeners (remove nested DOMContentLoaded since this function is called from DOMContentLoaded)
    const openBtn = document.getElementById('open-reply-btn');
    if (openBtn) openBtn.addEventListener('click', openReplyBox);

    const header = document.getElementById('reply-box-header');
    if (header) header.addEventListener('click', toggleMinimize);

    const minimizeBtn = document.getElementById('reply-minimize-btn');
    if (minimizeBtn) {
        minimizeBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            toggleMinimize();
        });
    }

    const closeBtn = document.getElementById('reply-close-btn');
    if (closeBtn) closeBtn.addEventListener('click', closeReplyBox);

    const clearBtn = document.getElementById('clear-reply-btn');
    if (clearBtn) {
        clearBtn.addEventListener('click', function () {
            const ta = document.getElementById('reply-textarea');
            if (ta) ta.value = '';
        });
    }



    // Store listener functions globally to avoid duplicates
    let emojiPickerListeners = {
        triggerClick: null,
        closeOutside: null
    };

    // Flag to prevent multiple initializations
    let isEmojiPickerInitialized = false;

    // Emoji Picker Handler for Admin Reply Box
    function initAdminEmojiPicker() {
        // Prevent multiple initializations
        if (isEmojiPickerInitialized) {
            return;
        }

        // Get elements directly instead of nested query
        const emojiTrigger = document.getElementById('emoji-trigger-btn');
        const emojiContainer = document.getElementById('emoji-picker-container');
        const replyTextarea = document.getElementById('reply-textarea');

        if (!emojiTrigger || !emojiContainer || !replyTextarea) {
            // Retry if elements not ready yet
            setTimeout(initAdminEmojiPicker, 200);
            return;
        }

        // Mark as initialized
        isEmojiPickerInitialized = true;

        let emojiClickListenerAttached = false;

        // Function to setup emoji picker with proper event listener
        const setupEmojiPickerListener = () => {
            if (emojiClickListenerAttached) return; // Prevent duplicate listeners

            const pickerElement = emojiContainer.querySelector('emoji-picker');
            if (!pickerElement) {
                // Retry if emoji-picker not yet initialized
                setTimeout(setupEmojiPickerListener, 200);
                return;
            }

            emojiClickListenerAttached = true;
            pickerElement.addEventListener('emoji-click', (event) => {
                let emoji = event.detail.emoji || event.detail.unicode;

                // Handle if emoji is an object, extract the native emoji string
                if (emoji && typeof emoji === 'object') {
                    emoji = emoji.native || emoji.unicode || String(emoji);
                }

                if (emoji && replyTextarea) {
                    const start = replyTextarea.selectionStart;
                    const end = replyTextarea.selectionEnd;
                    const text = replyTextarea.value;
                    const before = text.substring(0, start);
                    const after = text.substring(end, text.length);


                    replyTextarea.value = (before + emoji + after);
                    replyTextarea.selectionStart = replyTextarea.selectionEnd = start + emoji.length;
                    replyTextarea.focus({ preventScroll: true });
                }
            }, { once: false });
        };

        // Initialize emoji picker listener
        setTimeout(setupEmojiPickerListener, 100);

        // Emoji trigger button click handler
        const handleEmojiTriggerClick = (e) => {
            e.preventDefault();
            e.stopPropagation();

            const isHidden = emojiContainer.classList.contains('hidden');

            if (isHidden) {
                // Position emoji picker above the emoji trigger button
                const triggerRect = emojiTrigger.getBoundingClientRect();
                const pickerWidth = 340;
                const pickerHeight = 360;

                let top = triggerRect.top - pickerHeight - 40;
                let left = triggerRect.right - pickerWidth - 8;

                if (left < 8) left = 8;
                if (top < 8) top = 8;

                emojiContainer.style.top = top + 'px';
                emojiContainer.style.left = left + 'px';
                emojiContainer.classList.remove('hidden');
            } else {
                emojiContainer.classList.add('hidden');
            }
        };

        // Remove old listener if it exists
        if (emojiPickerListeners.triggerClick) {
            emojiTrigger.removeEventListener('click', emojiPickerListeners.triggerClick);
        }

        // Add new listener and store reference
        emojiTrigger.addEventListener('click', handleEmojiTriggerClick);
        emojiPickerListeners.triggerClick = handleEmojiTriggerClick;

        // Close emoji picker when clicking outside (with proper event delegation)
        const closeEmojiPickerOutside = (e) => {
            // Only process click events that are NOT on the emoji trigger or container
            if (!emojiContainer.contains(e.target) &&
                e.target !== emojiTrigger &&
                !emojiTrigger.contains(e.target) &&
                !emojiContainer.classList.contains('hidden')) {
                emojiContainer.classList.add('hidden');
            }
        };

        // Remove old close listener if it exists
        if (emojiPickerListeners.closeOutside) {
            document.removeEventListener('click', emojiPickerListeners.closeOutside);
        }

        // Add new close listener and store reference
        document.addEventListener('click', closeEmojiPickerOutside, { capture: false });
        emojiPickerListeners.closeOutside = closeEmojiPickerOutside;
    }



    // Auto open if there are errors (after reload)
    if (hasErrors) {
        openReplyBox();
    }

    // Approve button handler
    const approveBtn = document.getElementById('detail-approve-btn');
    if (approveBtn) {
        approveBtn.addEventListener('click', function () {
            const commentId = this.dataset.commentId;
            if (!commentId) return;

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
            const originalContent = this.innerHTML;

            // Show loading state
            this.disabled = true;
            this.innerHTML = '<svg class="animate-spin w-5 h-5 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';

            fetch(`/cpanel/comments/${commentId}/approve`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (window.showPublicNotification) {
                            window.showPublicNotification('Komentar berhasil disetujui', 'success');
                        }

                        // Hide approve button
                        approveBtn.remove();

                        // Enable reply button
                        const replyBtn = document.getElementById('open-reply-btn');
                        if (replyBtn) {
                            replyBtn.disabled = false;
                            replyBtn.classList.remove('bg-slate-400', 'dark:bg-slate-600', 'cursor-not-allowed');
                            replyBtn.classList.add('bg-slate-900', 'dark:bg-blue-600', 'hover:bg-slate-800', 'dark:hover:bg-blue-700');
                            replyBtn.removeAttribute('title');
                        }

                        // Update approval badge
                        const badge = document.querySelector('span[class*="yellow"][class*="yellow-100"]');
                        if (badge) {
                            badge.classList.remove('bg-yellow-100', 'text-yellow-800', 'dark:bg-yellow-900/30', 'dark:text-yellow-400');
                            badge.classList.add('bg-green-100', 'text-green-800', 'dark:bg-green-900/30', 'dark:text-green-400');
                            badge.textContent = 'Disetujui';
                        }
                    } else {
                        if (window.showPublicNotification) {
                            window.showPublicNotification('Gagal menyetujui komentar', 'error');
                        }
                        this.innerHTML = originalContent;
                        this.disabled = false;
                    }
                })
                .catch(error => {
                    if (window.showPublicNotification) {
                        window.showPublicNotification('Terjadi kesalahan koneksi', 'error');
                    }
                    this.innerHTML = originalContent;
                    this.disabled = false;
                });
        });
    }
};

export default window.initCommentDetail;

// Function to toggle reply visibility in Admin
window.toggleAdminReplies = function (btn) {
    // Find the replies wrapper relative to the button
    const parentContainer = btn.closest('.min-w-0');
    const container = parentContainer.querySelector('.replies-wrapper');
    const textSpan = btn.querySelector('.reply-toggle-text');
    const icon = btn.querySelector('svg');

    // Store original text if not stored yet
    if (!btn.dataset.originalLabel) {
        btn.dataset.originalLabel = textSpan.textContent;
    }

    if (container.classList.contains('hidden')) {
        // Show replies
        container.classList.remove('hidden');
        textSpan.textContent = 'Sembunyikan balasan';
        icon.classList.add('rotate-180');
    } else {
        // Hide replies
        container.classList.add('hidden');
        textSpan.textContent = btn.dataset.originalLabel;
        icon.classList.remove('rotate-180');
    }
};

document.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-toggle-admin-replies]');
    if (!btn) return;
    if (typeof window.toggleAdminReplies === 'function') {
        window.toggleAdminReplies(btn);
    }
});
