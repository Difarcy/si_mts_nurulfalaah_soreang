/**
 * Comment Form Handler
 * Digunakan untuk menangani form komentar dan reply
 * Dipakai di: detail.blade.php
 */

window.initCommentForm = function () {
    // Helper function to wait for element
    const waitForElement = (selector, timeout = 5000) => {
        return new Promise((resolve) => {
            if (document.querySelector(selector)) {
                return resolve(document.querySelector(selector));
            }

            const observer = new MutationObserver(() => {
                const element = document.querySelector(selector);
                if (element) {
                    observer.disconnect();
                    resolve(element);
                }
            });

            observer.observe(document.body, { childList: true, subtree: true });

            setTimeout(() => {
                observer.disconnect();
                resolve(null);
            }, timeout);
        });
    };

    const anonymousCheckbox = document.getElementById('anonymous');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const emailRequired = document.getElementById('email-required');
    const commentForm = document.getElementById('comment-form');

    if (!anonymousCheckbox || !nameInput || !emailInput || !commentForm) return;

    function toggleNameField() {
        if (anonymousCheckbox.checked) {
            nameInput.value = 'Anonymous';
            nameInput.disabled = true;
            nameInput.classList.add('bg-gray-100', 'dark:bg-slate-700', 'cursor-not-allowed');
            nameInput.removeAttribute('required');

            emailInput.value = '-';
            emailInput.disabled = true;
            emailInput.classList.add('bg-gray-100', 'dark:bg-slate-700', 'cursor-not-allowed');
            emailInput.removeAttribute('required');
            if (emailRequired) emailRequired.classList.add('hidden');
        } else {
            nameInput.disabled = false;
            nameInput.classList.remove('bg-gray-100', 'dark:bg-slate-700', 'cursor-not-allowed');
            nameInput.setAttribute('required', 'required');
            if (nameInput.value === 'Anonymous') {
                nameInput.value = '';
            }

            emailInput.disabled = false;
            emailInput.classList.remove('bg-gray-100', 'dark:bg-slate-700', 'cursor-not-allowed');
            emailInput.setAttribute('required', 'required');
            if (emailRequired) emailRequired.classList.remove('hidden');
            if (emailInput.value === '-') {
                emailInput.value = '';
            }
        }
    }

    anonymousCheckbox.addEventListener('change', toggleNameField);

    commentForm.addEventListener('submit', function (e) {
        if (anonymousCheckbox.checked) {
            // Jika anonymous, pastikan email field kosong atau '-'
            emailInput.value = '-';
            nameInput.disabled = false;
            emailInput.disabled = false;
        }
    });

    // Initialize state
    toggleNameField();

    // Emoji Picker Handler for Main Comment Form
    const initPublicEmojiPicker = () => {
        const publicTrigger = document.getElementById('public-emoji-trigger-btn');
        const publicContainer = document.getElementById('public-emoji-picker-container');
        const publicTextarea = document.getElementById('comment');

        if (!publicTrigger || !publicContainer || !publicTextarea) return;

        let publicEmojiClickListenerAttached = false;

        // Setup emoji click listener only once
        const setupPublicEmojiListener = () => {
            if (publicEmojiClickListenerAttached) return;

            const publicPickerElement = publicContainer.querySelector('emoji-picker');
            if (!publicPickerElement) {
                setTimeout(setupPublicEmojiListener, 200);
                return;
            }

            publicEmojiClickListenerAttached = true;
            publicPickerElement.addEventListener('emoji-click', (event) => {
                let emoji = event.detail.emoji || event.detail.unicode;

                // Handle if emoji is an object, extract the native emoji string
                if (emoji && typeof emoji === 'object') {
                    emoji = emoji.native || emoji.unicode || String(emoji);
                }

                if (emoji) {
                    const start = publicTextarea.selectionStart;
                    const end = publicTextarea.selectionEnd;
                    const text = publicTextarea.value;
                    const before = text.substring(0, start);
                    const after = text.substring(end, text.length);

                    publicTextarea.value = (before + emoji + after);
                    publicTextarea.selectionStart = publicTextarea.selectionEnd = start + emoji.length;
                    publicTextarea.focus({ preventScroll: true });
                }
            }, { once: false });
        };

        // Setup listener
        setTimeout(setupPublicEmojiListener, 100);

        // Trigger button click handler
        publicTrigger.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            publicContainer.classList.toggle('hidden');
        });

        // Close picker when clicking outside
        const closePublicEmojiOutside = (e) => {
            if (!publicContainer.contains(e.target) &&
                e.target !== publicTrigger &&
                !publicTrigger.contains(e.target) &&
                !publicContainer.classList.contains('hidden')) {
                publicContainer.classList.add('hidden');
            }
        };

        document.addEventListener('click', closePublicEmojiOutside, { capture: false });
    };

    setTimeout(initPublicEmojiPicker, 300);

    // Emoji Picker Handler for Inline Reply Form
    const initInlineEmojiPicker = () => {
        const inlineReplyForm = document.querySelector('.inline-reply-form');
        if (!inlineReplyForm) return;

        const inlineTrigger = inlineReplyForm.querySelector('.inline-reply-emoji-trigger');
        const inlineContainer = inlineReplyForm.querySelector('.emoji-picker-container');
        const inlineTextarea = inlineReplyForm.querySelector('.inline-reply-text');

        if (inlineTrigger && inlineContainer && inlineTextarea) {
            let inlineEmojiClickListenerAttached = false;

            // Setup emoji click listener
            const setupInlineEmojiListener = () => {
                if (inlineEmojiClickListenerAttached) return;

                const inlinePickerElement = inlineContainer.querySelector('emoji-picker');
                if (!inlinePickerElement) {
                    setTimeout(setupInlineEmojiListener, 200);
                    return;
                }

                inlineEmojiClickListenerAttached = true;
                inlinePickerElement.addEventListener('emoji-click', (event) => {
                    let emoji = event.detail.emoji || event.detail.unicode;

                    // Handle if emoji is an object, extract the native emoji string
                    if (emoji && typeof emoji === 'object') {
                        emoji = emoji.native || emoji.unicode || String(emoji);
                    }

                    if (emoji) {
                        const start = inlineTextarea.selectionStart;
                        const end = inlineTextarea.selectionEnd;
                        const text = inlineTextarea.value;
                        const before = text.substring(0, start);
                        const after = text.substring(end, text.length);

                        inlineTextarea.value = (before + emoji + after);
                        inlineTextarea.selectionStart = inlineTextarea.selectionEnd = start + emoji.length;
                        inlineTextarea.focus({ preventScroll: true });
                    }
                }, { once: false });
            };

            setupInlineEmojiListener();

            // Trigger button click handler
            inlineTrigger.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                inlineContainer.classList.toggle('hidden');
            });

            // Close picker when clicking outside
            const closeInlineEmojiOutside = (e) => {
                if (!inlineContainer.contains(e.target) &&
                    e.target !== inlineTrigger &&
                    !inlineTrigger.contains(e.target) &&
                    !inlineContainer.classList.contains('hidden')) {
                    inlineContainer.classList.add('hidden');
                }
            };

            document.addEventListener('click', closeInlineEmojiOutside, { capture: false });
        }
    };

    setTimeout(initInlineEmojiPicker, 100);
};

// Initialize comment reply handlers on DOM ready
document.addEventListener('DOMContentLoaded', function () {
    // Initialize comment like handlers
    initCommentLikeHandlers();
});

// Handle comment like button clicks
function initCommentLikeHandlers() {
    document.addEventListener('click', function (e) {
        const likeBtn = e.target.closest('.comment-like');
        if (!likeBtn) return;

        const commentId = likeBtn.dataset.commentId;
        if (!commentId) return;

        e.preventDefault();
        e.stopPropagation();

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        const likeLabel = likeBtn.querySelector('.comment-like-label');
        const likeCount = likeBtn.querySelector('.comment-like-count');
        const isLiked = likeBtn.dataset.liked === '1';

        // Show loading state
        likeBtn.disabled = true;

        fetch(`/comments/${commentId}/like`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                // Update UI
                likeBtn.dataset.liked = data.liked ? '1' : '0';
                likeLabel.textContent = data.liked ? 'Disukai' : 'Suka';
                likeCount.textContent = `(${data.count})`;

                // Update visual state
                if (data.liked) {
                    likeBtn.classList.add('text-green-700', 'dark:text-green-400');
                    likeBtn.classList.remove('text-slate-600', 'dark:text-slate-400');
                } else {
                    likeBtn.classList.remove('text-green-700', 'dark:text-green-400');
                    likeBtn.classList.add('text-slate-600', 'dark:text-slate-400');
                }

                likeBtn.disabled = false;
            })
            .catch(error => {
                if (window.showPublicNotification) {
                    window.showPublicNotification('Gagal memproses suka komentar', 'error');
                }
                likeBtn.disabled = false;
            });
    });
}

// Handle comment reply button clicks
window.initCommentReplyHandlers = function initCommentReplyHandlers() {
    document.addEventListener('click', function (e) {
        const replyBtn = e.target.closest('.comment-reply');
        if (!replyBtn) return;

        const commentId = replyBtn.dataset.commentId;
        if (!commentId) return;

        e.preventDefault();
        e.stopPropagation();

        // Find the parent comment div (data-comment-id)
        // The button has data-comment-id too, so we need to skip it and find the parent container div
        let commentDiv = replyBtn.parentElement.closest('div[data-comment-id]');
        if (!commentDiv) {
            // Try alternative path - go up to parent and search for container
            commentDiv = replyBtn.closest('div').parentElement?.closest('div[data-comment-id]');
        }
        if (!commentDiv) {
            return;
        }

        // Determine if we're on mobile or desktop
        const isMobile = window.innerWidth < 640; // sm breakpoint

        // Close any existing floating modal
        const existingModals = document.querySelectorAll('.reply-modal-float');
        existingModals.forEach(modal => {
            const modalContent = modal.querySelector('.reply-modal-content');
            if (modalContent) {
                modalContent.classList.add('translate-y-full');
                setTimeout(() => modal.remove(), 300);
            } else {
                modal.remove();
            }
        });

        // Close any existing bottom sheet
        const bottomSheet = document.getElementById('public-reply-bottom-sheet');
        if (bottomSheet && !bottomSheet.classList.contains('hidden')) {
            bottomSheet.classList.add('hidden');
        }

        // Create new reply form with a small delay to ensure the old one is removed
        setTimeout(() => {
            if (isMobile) {
                createBottomSheetReplyForm(commentId);
            } else {
                createReplyForm(null, commentId);
            }
        }, (existingModals.length > 0 || (bottomSheet && !bottomSheet.classList.contains('hidden'))) ? 350 : 0);
    });
};

// Create reply form dynamically as floating modal
function createReplyForm(container, parentCommentId) {
    // Generate unique ID for this reply modal
    const modalId = 'reply-modal-float-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
    const modalContentId = 'reply-modal-content-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
    const emojiContainerId = 'reply-emoji-picker-fixed-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
    const formId = 'reply-form-float-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
    const closeBtnId = 'reply-modal-close-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
    const clearBtnId = 'reply-clear-btn-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
    const cancelBtnId = 'reply-modal-cancel-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);

    // Create floating modal container
    const modalContainer = document.createElement('div');
    modalContainer.id = modalId;
    modalContainer.className = 'reply-modal-float fixed bottom-0 right-4 sm:right-8 z-50 w-full sm:w-137.5 transform translate-y-full transition-transform duration-300 ease-[cubic-bezier(0.2,0,0,1)]';

    modalContainer.innerHTML = `
        <div class="reply-modal-content bg-white dark:bg-slate-800 rounded shadow-[0_-5px_30px_-5px_rgba(0,0,0,0.1)] border border-gray-200 dark:border-slate-700 flex flex-col max-h-[70vh] sm:max-h-150" id="${modalContentId}">
            <!-- Header -->
            <div id="reply-box-header" class="flex items-center justify-between px-5 py-3 bg-slate-900 dark:bg-slate-950 text-white rounded cursor-pointer select-none">
                <div class="flex items-center gap-2">
                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-white/10">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                        </svg>
                    </span>
                    <span class="font-bold text-sm tracking-wide">Balas Komentar</span>
                </div>
                <div class="flex items-center gap-1">
                    <button type="button" id="${closeBtnId}"
                        class="text-slate-400 hover:text-white transition-colors p-1 rounded-full hover:bg-white/10"
                        title="Tutup">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Form -->
            <form id="${formId}" class="flex flex-col flex-1 overflow-hidden">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''}">

                <!-- Content -->
                <div id="reply-body" class="flex-1 overflow-y-auto bg-white dark:bg-slate-800">
                    <div class="px-5 py-4 space-y-3">
                        <div>
                            <input type="text" name="name" placeholder="Nama Anda" required
                                class="w-full border border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 rounded px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                autocomplete="name">
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Email Anda" required
                                class="w-full border border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 rounded px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                autocomplete="email">
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" id="anonymous-checkbox" name="anonymous" value="1"
                                class="rounded border-gray-300 dark:border-slate-600 text-green-700 focus:ring-green-600 cursor-pointer">
                            <label for="anonymous-checkbox" class="text-sm text-slate-700 dark:text-slate-300 cursor-pointer">
                                Komentar sebagai Anonymous
                            </label>
                        </div>
                        <div class="relative group">
                            <textarea name="comment" placeholder="Balas komentar..." required rows="3"
                                class="w-full border border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 rounded px-4 py-2 text-sm pb-10 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent resize-none"
                                maxlength="1000"></textarea>

                            <button type="button" class="reply-emoji-trigger absolute bottom-2 right-2 p-2 text-slate-400 hover:text-yellow-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-full transition-colors z-40"
                                title="Sisipkan Emoji">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="p-4 border-t border-gray-100 dark:border-slate-700 flex justify-between items-center bg-gray-50 dark:bg-slate-700/50">
                    <button type="submit" class="px-4 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                        Kirim
                    </button>
                    <div class="flex gap-2">
                        <button type="button" id="${clearBtnId}" class="px-4 py-1.5 bg-slate-500 hover:bg-slate-600 dark:bg-slate-600 dark:hover:bg-slate-700 text-white text-sm font-bold rounded shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5" title="Hapus draf">
                            Clear
                        </button>
                        <button type="button" id="${cancelBtnId}" class="px-4 py-1.5 bg-red-600 hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800 text-white text-sm font-bold rounded shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                            Batal
                        </button>
                    </div>
                </div>
            </form>
        </div>
    `;

    document.body.appendChild(modalContainer);

    // Create fixed emoji picker container (outside modal, will be positioned dynamically)
    const fixedEmojiContainer = document.createElement('div');
    fixedEmojiContainer.id = emojiContainerId;
    fixedEmojiContainer.className = 'fixed hidden z-[9999] shadow-lg rounded-xl border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden transition-all duration-200 pointer-events-auto';
    fixedEmojiContainer.innerHTML = '<emoji-picker class="light dark:dark"></emoji-picker>';
    document.body.appendChild(fixedEmojiContainer);

    // Trigger animation
    setTimeout(() => {
        const modalContent = document.getElementById(modalContentId);
        if (modalContent?.parentElement?.id === modalId) {
            modalContent.parentElement.classList.remove('translate-y-full');
        }
    }, 10);

    const form = document.getElementById(formId);
    const textarea = form.querySelector('textarea[name="comment"]');
    const emojiTrigger = form.querySelector('.reply-emoji-trigger');
    const emojiContainer = form.querySelector('.reply-emoji-picker');
    const closeBtn = document.getElementById(closeBtnId);
    const cancelBtn = document.getElementById(cancelBtnId);
    const clearBtn = document.getElementById(clearBtnId);

    // Handle modal close
    const closeModal = () => {
        const modalContainer = document.getElementById(modalId);
        if (modalContainer) {
            modalContainer.classList.add('translate-y-full');
            setTimeout(() => {
                if (document.getElementById(modalId)) {
                    modalContainer.remove();
                }
                // Also remove emoji picker
                const emojiPicker = document.getElementById(emojiContainerId);
                if (emojiPicker) {
                    emojiPicker.remove();
                }
            }, 300);
        }
    };

    closeBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);

    // Get anonymous checkbox (it's defined later, but we need to check it in the clear handler)
    const anonymousCheckboxForClear = document.getElementById('anonymous-checkbox');

    // Handle clear button
    if (clearBtn) {
        clearBtn.addEventListener('click', function () {
            textarea.value = '';
            // Only clear name and email if anonymous checkbox is NOT checked
            if (!anonymousCheckboxForClear || !anonymousCheckboxForClear.checked) {
                form.querySelector('input[name="name"]').value = '';
                form.querySelector('input[name="email"]').value = '';
            }
            textarea.focus();
        });
    }

    // Handle anonymous checkbox
    const anonymousCheckbox = document.getElementById('anonymous-checkbox');
    const nameInput = form.querySelector('input[name="name"]');
    const emailInput = form.querySelector('input[name="email"]');
    const mainAnonymousCheckbox = document.getElementById('anonymous');

    if (anonymousCheckbox) {
        anonymousCheckbox.addEventListener('change', function () {
            if (this.checked) {
                nameInput.value = 'Anonymous';
                nameInput.disabled = true;
                nameInput.classList.add('opacity-50', 'cursor-not-allowed');
                emailInput.value = '-';
                emailInput.disabled = true;
                emailInput.classList.add('opacity-50', 'cursor-not-allowed');

                // Sync with main form if it exists
                if (mainAnonymousCheckbox) {
                    mainAnonymousCheckbox.checked = true;
                    mainAnonymousCheckbox.dispatchEvent(new Event('change', { bubbles: true }));
                }
            } else {
                nameInput.value = '';
                nameInput.disabled = false;
                nameInput.classList.remove('opacity-50', 'cursor-not-allowed');
                emailInput.value = '';
                emailInput.disabled = false;
                emailInput.classList.remove('opacity-50', 'cursor-not-allowed');

                // Sync with main form if it exists
                if (mainAnonymousCheckbox) {
                    mainAnonymousCheckbox.checked = false;
                    mainAnonymousCheckbox.dispatchEvent(new Event('change', { bubbles: true }));
                }
            }
        });

        // Also sync when main form checkbox changes
        if (mainAnonymousCheckbox) {
            mainAnonymousCheckbox.addEventListener('change', function () {
                if (this.checked && !anonymousCheckbox.checked) {
                    anonymousCheckbox.checked = true;
                    anonymousCheckbox.dispatchEvent(new Event('change', { bubbles: true }));
                } else if (!this.checked && anonymousCheckbox.checked) {
                    anonymousCheckbox.checked = false;
                    anonymousCheckbox.dispatchEvent(new Event('change', { bubbles: true }));
                }
            });
        }
    }

    // Handle emoji picker with fixed positioning (outside modal)
    if (emojiTrigger) {
        let fixedEmojiClickListenerAttached = false;

        // Setup emoji picker listener
        const setupFixedEmojiListener = () => {
            if (fixedEmojiClickListenerAttached) return;

            const fixedEmojiPickerContainer = document.getElementById(emojiContainerId);
            const fixedEmojiPicker = fixedEmojiPickerContainer?.querySelector('emoji-picker');

            if (!fixedEmojiPicker) {
                setTimeout(setupFixedEmojiListener, 200);
                return;
            }

            fixedEmojiClickListenerAttached = true;
            fixedEmojiPicker.addEventListener('emoji-click', (event) => {
                let emoji = event.detail.emoji || event.detail.unicode;

                // Handle if emoji is an object, extract the native emoji string
                if (emoji && typeof emoji === 'object') {
                    emoji = emoji.native || emoji.unicode || String(emoji);
                }

                if (emoji && textarea) {
                    const start = textarea.selectionStart;
                    const end = textarea.selectionEnd;
                    const text = textarea.value;
                    const before = text.substring(0, start);
                    const after = text.substring(end, text.length);

                    textarea.value = (before + emoji + after);
                    textarea.selectionStart = textarea.selectionEnd = start + emoji.length;
                    textarea.focus({ preventScroll: true });
                }
            }, { once: false });
        };

        setTimeout(setupFixedEmojiListener, 100);

        emojiTrigger.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();

            const fixedEmojiPickerContainer = document.getElementById(emojiContainerId);
            if (!fixedEmojiPickerContainer) return;

            const isHidden = fixedEmojiPickerContainer.classList.contains('hidden');

            if (isHidden) {
                // Show emoji picker above the emoji trigger button
                const triggerRect = emojiTrigger.getBoundingClientRect();
                const pickerWidth = 340;
                const pickerHeight = 360;

                let top = triggerRect.top - pickerHeight - 40;
                let left = triggerRect.right - pickerWidth - 8;

                if (left < 8) left = 8;
                if (top < 8) top = 8;

                fixedEmojiPickerContainer.style.top = top + 'px';
                fixedEmojiPickerContainer.style.left = left + 'px';
                fixedEmojiPickerContainer.classList.remove('hidden');
            } else {
                fixedEmojiPickerContainer.classList.add('hidden');
            }
        });

        // Close picker when clicking outside
        const closeFixedEmojiOutside = (e) => {
            const fixedEmojiPickerContainer = document.getElementById(emojiContainerId);
            if (!fixedEmojiPickerContainer) return;

            const clickedOutside = !fixedEmojiPickerContainer.contains(e.target) &&
                e.target !== emojiTrigger &&
                !emojiTrigger.contains(e.target) &&
                !fixedEmojiPickerContainer.classList.contains('hidden');

            if (clickedOutside) {
                fixedEmojiPickerContainer.classList.add('hidden');
            }
        };

        document.addEventListener('click', closeFixedEmojiOutside, { capture: false });
    }

    // Handle form submission
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Enable disabled fields sebelum submit jika anonymous
        const anonymousCheckboxInForm = form.querySelector('input[name="anonymous"]');
        const nameInputInForm = form.querySelector('input[name="name"]');
        const emailInputInForm = form.querySelector('input[name="email"]');

        if (anonymousCheckboxInForm && anonymousCheckboxInForm.checked) {
            nameInputInForm.disabled = false;
            emailInputInForm.disabled = false;
            emailInputInForm.value = '-';
        }

        const formData = new FormData(form);
        formData.append('parent_id', parentCommentId);

        // Get post info from detail page
        const postDetail = document.getElementById('post-detail-container');
        const postType = postDetail?.dataset.postType || new URLSearchParams(window.location.search).get('type');
        const postSlug = postDetail?.dataset.postSlug || window.location.pathname.split('/').pop();

        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Mengirim...';

        fetch(`/informasi/${postType}/${postSlug}/comment`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (window.showPublicNotification) {
                        window.showPublicNotification('Balas komentar berhasil dikirim dan menunggu persetujuan admin', 'success');
                    }
                    closeModal();
                    // Reload page to show new reply
                    setTimeout(() => location.reload(), 1500);
                } else {
                    if (window.showPublicNotification) {
                        window.showPublicNotification(data.message || 'Gagal mengirim balas komentar', 'error');
                    }
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                }
            })
            .catch(error => {
                if (window.showPublicNotification) {
                    window.showPublicNotification('Terjadi kesalahan', 'error');
                }
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            });
    });
}

// Create bottom sheet reply form for mobile
function createBottomSheetReplyForm(parentCommentId) {
    const bottomSheet = document.getElementById('public-reply-bottom-sheet');
    const contentDiv = document.getElementById('public-reply-bottom-sheet-content');

    if (!bottomSheet || !contentDiv) return;

    // Generate unique IDs
    const formId = 'bottom-sheet-reply-form-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
    const emojiContainerId = 'bottom-sheet-emoji-picker-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);

    contentDiv.innerHTML = `
        <div class="space-y-4">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Balas Komentar</h3>
                <button type="button" id="bottom-sheet-close-btn" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Form -->
            <form id="${formId}" class="space-y-4">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''}">

                <div>
                    <input type="text" name="name" placeholder="Nama Anda" required
                        class="w-full border border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent"
                        autocomplete="name">
                </div>
                <div>
                    <input type="email" name="email" placeholder="Email Anda" required
                        class="w-full border border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent"
                        autocomplete="email">
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="bottom-sheet-anonymous" name="anonymous" value="1"
                        class="rounded border-gray-300 dark:border-slate-600 text-green-700 focus:ring-green-600 cursor-pointer">
                    <label for="bottom-sheet-anonymous" class="text-sm text-slate-700 dark:text-slate-300 cursor-pointer">
                        Komentar sebagai Anonymous
                    </label>
                </div>
                <div class="relative">
                    <textarea name="comment" placeholder="Balas komentar..." required rows="4"
                        class="w-full border border-gray-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 rounded px-4 py-2 pb-10 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent resize-none"
                        maxlength="1000"></textarea>

                    <button type="button" class="bottom-sheet-emoji-trigger absolute bottom-2 right-2 p-2 text-slate-400 hover:text-yellow-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-full transition-colors z-40"
                        title="Sisipkan Emoji">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="flex-1 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded shadow-md hover:shadow-lg transition-all">
                        Kirim
                    </button>
                    <button type="button" id="bottom-sheet-cancel-btn" class="px-4 py-2 bg-red-600 hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800 text-white font-bold rounded shadow-md hover:shadow-lg transition-all">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    `;

    // Show bottom sheet
    bottomSheet.classList.remove('hidden');

    // Create fixed emoji picker container
    const fixedEmojiContainer = document.createElement('div');
    fixedEmojiContainer.id = emojiContainerId;
    fixedEmojiContainer.className = 'fixed hidden z-[9999] shadow-lg rounded-xl border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden transition-all duration-200 pointer-events-auto';
    fixedEmojiContainer.innerHTML = '<emoji-picker class="light dark:dark"></emoji-picker>';
    document.body.appendChild(fixedEmojiContainer);

    const form = document.getElementById(formId);
    const textarea = form.querySelector('textarea[name="comment"]');
    const emojiTrigger = form.querySelector('.bottom-sheet-emoji-trigger');
    const closeBtn = document.getElementById('bottom-sheet-close-btn');
    const cancelBtn = document.getElementById('bottom-sheet-cancel-btn');
    const anonymousCheckbox = document.getElementById('bottom-sheet-anonymous');
    const nameInput = form.querySelector('input[name="name"]');
    const emailInput = form.querySelector('input[name="email"]');

    // Handle anonymous checkbox
    if (anonymousCheckbox) {
        anonymousCheckbox.addEventListener('change', function () {
            if (this.checked) {
                nameInput.value = 'Anonymous';
                nameInput.disabled = true;
                nameInput.classList.add('opacity-50', 'cursor-not-allowed');
                emailInput.value = '-';
                emailInput.disabled = true;
                emailInput.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                nameInput.value = '';
                nameInput.disabled = false;
                nameInput.classList.remove('opacity-50', 'cursor-not-allowed');
                emailInput.value = '';
                emailInput.disabled = false;
                emailInput.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        });
    }

    // Handle close and cancel
    const closeBottomSheet = () => {
        bottomSheet.classList.add('hidden');
        contentDiv.innerHTML = '';
        const emojiPicker = document.getElementById(emojiContainerId);
        if (emojiPicker) emojiPicker.remove();
    };

    closeBtn.addEventListener('click', closeBottomSheet);
    cancelBtn.addEventListener('click', closeBottomSheet);

    // Handle emoji picker
    if (emojiTrigger) {
        let emojiListenerAttached = false;

        const setupEmojiListener = () => {
            if (emojiListenerAttached) return;

            const emojiPicker = document.getElementById(emojiContainerId)?.querySelector('emoji-picker');
            if (!emojiPicker) {
                setTimeout(setupEmojiListener, 200);
                return;
            }

            emojiListenerAttached = true;
            emojiPicker.addEventListener('emoji-click', (event) => {
                let emoji = event.detail.emoji || event.detail.unicode;
                if (emoji && typeof emoji === 'object') {
                    emoji = emoji.native || emoji.unicode || String(emoji);
                }
                if (emoji && textarea) {
                    const start = textarea.selectionStart;
                    const end = textarea.selectionEnd;
                    const text = textarea.value;
                    const before = text.substring(0, start);
                    const after = text.substring(end, text.length);
                    textarea.value = before + emoji + after;
                    textarea.selectionStart = textarea.selectionEnd = start + emoji.length;
                    textarea.focus({ preventScroll: true });
                }
            });
        };

        setTimeout(setupEmojiListener, 100);

        emojiTrigger.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();

            const emojiPickerContainer = document.getElementById(emojiContainerId);
            if (!emojiPickerContainer) return;

            const isHidden = emojiPickerContainer.classList.contains('hidden');
            if (isHidden) {
                // Position emoji picker
                const rect = emojiTrigger.getBoundingClientRect();
                emojiPickerContainer.style.top = (rect.top - 320) + 'px';
                emojiPickerContainer.style.left = Math.max(10, rect.left - 200) + 'px';
                emojiPickerContainer.classList.remove('hidden');
            } else {
                emojiPickerContainer.classList.add('hidden');
            }
        });
    }

    // Handle form submission
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Enable disabled fields sebelum submit jika anonymous
        const anonymousCheckboxInForm = form.querySelector('input[name="anonymous"]');
        const nameInputInForm = form.querySelector('input[name="name"]');
        const emailInputInForm = form.querySelector('input[name="email"]');

        if (anonymousCheckboxInForm && anonymousCheckboxInForm.checked) {
            nameInputInForm.disabled = false;
            emailInputInForm.disabled = false;
            emailInputInForm.value = '-';
        }

        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Mengirim...';

        const formData = new FormData(form);
        formData.append('parent_id', parentCommentId);

        // Get current URL to extract type and slug
        const urlParts = window.location.pathname.split('/');
        const type = urlParts[2]; // informasi/berita/slug
        const slug = urlParts[3];

        fetch(`/informasi/${type}/${slug}/comment`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeBottomSheet();
                    if (window.showPublicNotification) {
                        window.showPublicNotification('Komentar berhasil dikirim.', 'success');
                    }
                    // Reload comments or update UI
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    if (window.showPublicNotification) {
                        window.showPublicNotification('Gagal mengirim komentar.', 'error');
                    }
                }
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            })
            .catch(error => {
                if (window.showPublicNotification) {
                    window.showPublicNotification('Terjadi kesalahan', 'error');
                }
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            });
    });
}

// Function to toggle reply visibility
window.toggleWebReplies = function (btn) {
    // Find the replies wrapper relative to the button
    // The structure is: <div><button></div> then <div class="replies-wrapper">
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
    const btn = e.target.closest('[data-toggle-web-replies]');
    if (!btn) return;
    if (typeof window.toggleWebReplies === 'function') {
        window.toggleWebReplies(btn);
    }
});
