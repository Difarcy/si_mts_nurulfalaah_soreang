/**
 * Chatbot Widget - Main Logic
 * Handles chat UI interactions and API communication
 */

class ChatbotWidget {
    constructor() {
        this.sessionId = this.getOrCreateSessionId();
        this.apiUrl = '/api/chatbot';
        this.isOpen = false;
        this.isProcessing = false;

        this.initElements();
        this.initEventListeners();
        this.loadChatHistory();
    }

    /**
     * Initialize DOM elements
     */
    initElements() {
        this.container = document.getElementById('chatbot-container');
        this.toggleBtn = document.getElementById('chatbot-toggle-btn');
        this.chatWindow = document.getElementById('chatbot-window');
        this.messagesContainer = document.getElementById('chatbot-messages');
        this.chatForm = document.getElementById('chatbot-form');
        this.chatInput = document.getElementById('chatbot-input');
        this.sendBtn = document.getElementById('chatbot-send-btn');
        this.minimizeBtn = document.getElementById('chatbot-minimize-btn');
        this.clearBtn = document.getElementById('chatbot-clear-btn');
        this.typingIndicator = document.getElementById('chatbot-typing');
        this.chatIcon = document.getElementById('chatbot-icon');
        this.closeIcon = document.getElementById('chatbot-close-icon');
        this.badge = document.getElementById('chatbot-badge');
    }

    /**
     * Initialize event listeners
     */
    initEventListeners() {
        // Toggle chat window
        this.toggleBtn?.addEventListener('click', () => this.toggleChat());
        this.minimizeBtn?.addEventListener('click', () => this.toggleChat());

        // Clear chat button
        this.clearBtn?.addEventListener('click', () => this.clearChat());

        // Textarea auto-resize and submit
        this.chatInput?.addEventListener('input', () => {
            this.chatInput.style.height = 'auto';
            this.chatInput.style.height = (this.chatInput.scrollHeight) + 'px';

            // Toggle send button color
            if (this.chatInput.value.trim().length > 0) {
                this.sendBtn.classList.add('text-green-600');
                this.sendBtn.classList.remove('text-slate-400');
            } else {
                this.sendBtn.classList.remove('text-green-600');
                this.sendBtn.classList.add('text-slate-400');
            }
        });

        this.chatInput?.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                this.sendMessage();
            }
        });

        // Form submit
        this.chatForm?.addEventListener('submit', (e) => {
            e.preventDefault();
            this.sendMessage();
        });

        // Quick suggestion buttons
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('chatbot-suggestion')) {
                const message = e.target.dataset.message || e.target.textContent?.trim();
                this.chatInput.value = message;
                this.sendMessage();
            }
        });
    }

    /**
     * Get or create session ID
     */
    getOrCreateSessionId() {
        let sessionId = localStorage.getItem('chatbot_session_id');
        if (!sessionId) {
            sessionId = 'session_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
            localStorage.setItem('chatbot_session_id', sessionId);
        }
        return sessionId;
    }

    /**
     * Toggle chat window
     */
    toggleChat() {
        if (this.isOpen) {
            this.closeChatWindow();
        } else {
            this.openChatWindow();
        }
    }

    /**
     * Open chat window
     */
    openChatWindow(shouldFocus = true) {
        this.isOpen = true;
        localStorage.setItem('chatbot_is_open', 'true');

        this.chatWindow.classList.remove('hidden');
        this.chatWindow.classList.add('flex');

        if (this.chatIcon) this.chatIcon.classList.add('hidden');
        if (this.closeIcon) {
            this.closeIcon.classList.remove('hidden');
            this.closeIcon.classList.add('flex');
        }

        if (this.badge) this.badge.classList.add('hidden');
        if (shouldFocus && this.chatInput) this.chatInput.focus();

        // Paksa scroll ke bawah beberapa kali untuk memastikan posisi benar
        this.scrollToBottom();
        setTimeout(() => this.scrollToBottom(), 100);
        setTimeout(() => this.scrollToBottom(), 300);
    }

    /**
     * Close chat window
     */
    closeChatWindow() {
        this.isOpen = false;
        localStorage.setItem('chatbot_is_open', 'false');

        this.chatWindow.classList.add('hidden');
        this.chatWindow.classList.remove('flex');

        if (this.chatIcon) this.chatIcon.classList.remove('hidden');
        if (this.closeIcon) {
            this.closeIcon.classList.add('hidden');
            this.closeIcon.classList.remove('flex');
        }
    }

    /**
     * Clear chat history
     */
    clearChat() {
        // Show modal confirmation
        this.showClearConfirmationModal();
    }

    /**
     * Show clear chat confirmation modal
     */
    showClearConfirmationModal() {
        // Create modal overlay - inside chatbot window
        const modalOverlay = document.createElement('div');
        modalOverlay.className = 'absolute inset-0 bg-black/50 rounded-xl flex items-center justify-center z-[60] flex-col';
        modalOverlay.id = 'chatbot-clear-modal';
        modalOverlay.style.top = '0';
        modalOverlay.style.left = '0';

        // Create modal content
        const modal = document.createElement('div');
        modal.className = 'bg-white dark:bg-[#1f2937] rounded-lg shadow-xl max-w-xs p-5 mx-4';

        // Modal Title
        const title = document.createElement('h3');
        title.className = 'text-base font-bold text-slate-900 dark:text-white mb-2';
        title.textContent = 'Hapus chat';

        // Modal Message
        const message = document.createElement('p');
        message.className = 'text-sm text-slate-500 dark:text-slate-400 mb-6 leading-relaxed';
        message.textContent = 'Histori chat yang telah dihapus tidak dapat diakses kembali.';

        // Buttons container
        const buttonsContainer = document.createElement('div');
        buttonsContainer.className = 'flex gap-3 justify-end';

        // Cancel button
        const cancelBtn = document.createElement('button');
        cancelBtn.className = 'px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400 font-medium hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors';
        cancelBtn.textContent = 'Batal';
        cancelBtn.addEventListener('click', () => {
            modalOverlay.remove();
        });

        // Confirm button
        const confirmBtn = document.createElement('button');
        confirmBtn.className = 'px-3 py-1.5 rounded-lg bg-red-500 hover:bg-red-600 text-sm text-white font-medium transition-colors';
        confirmBtn.textContent = 'Hapus';
        confirmBtn.addEventListener('click', () => {
            this.performClearChat();
            modalOverlay.remove();
        });

        buttonsContainer.appendChild(cancelBtn);
        buttonsContainer.appendChild(confirmBtn);

        modal.appendChild(title);
        modal.appendChild(message);
        modal.appendChild(buttonsContainer);
        modalOverlay.appendChild(modal);

        // Append to chatbot window, not body
        this.chatWindow.appendChild(modalOverlay);

        // Close on overlay click (outside modal)
        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) {
                modalOverlay.remove();
            }
        });
    }

    /**
     * Perform actual clear chat action
     */
    performClearChat() {
        // Remove all messages except welcome message
        const messages = this.messagesContainer?.querySelectorAll('[data-message-type]');
        messages?.forEach((msg) => {
            if (msg.dataset.messageType !== 'welcome') {
                msg.remove();
            }
        });

        // Clear local storage
        localStorage.removeItem('chatbot_messages');
        this.chatInput.value = '';
        this.chatInput.style.height = 'auto';
        this.isProcessing = false;

        // Hide clear button
        this.toggleClearChatButton(false);
    }

    /**
     * Send message
     */
    async sendMessage() {
        const message = this.chatInput.value.trim();
        if (!message || this.isProcessing) return;

        this.isProcessing = true;
        this.addMessage(message, 'user');
        this.chatInput.value = '';
        this.chatInput.style.height = 'auto';
        this.sendBtn.classList.remove('text-green-600');
        this.sendBtn.classList.add('text-slate-400');

        this.showTypingIndicator();

        try {
            const response = await fetch(this.apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                },
                body: JSON.stringify({
                    message: message,
                    session_id: this.sessionId,
                    current_url: window.location.href,
                    page_title: document.title
                })
            });

            const data = await response.json().catch(() => ({}));

            const botMessage = (typeof data.message === 'string' && data.message.trim())
                ? data.message
                : 'Maaf, terjadi kesalahan. Silakan coba lagi.';

            this.addMessage(botMessage, 'bot');

            if (data.session_id) {
                this.sessionId = data.session_id;
                localStorage.setItem('chatbot_session_id', this.sessionId);
            }

            if (Array.isArray(data.suggestions) && data.suggestions.length > 0) {
                this.addSuggestions(data.suggestions);
            }
        } catch (error) {
            // console.error('Chatbot error:', error);
            this.addMessage('Maaf, terjadi kesalahan koneksi. Silakan coba lagi.', 'bot');
        } finally {
            this.isProcessing = false;
            this.hideTypingIndicator();
        }
    }

    /**
     * Add message to chat
     */
    addMessage(text, type, shouldScroll = true) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `flex flex-col gap-1.5 ${type === 'user' ? 'items-end' : 'items-start'} w-full animate-slide-in`;
        messageDiv.setAttribute('data-message-type', type);

        if (type === 'bot') {
            messageDiv.innerHTML = `
                <div class="flex items-center gap-2">
                    <span class="text-base font-bold text-slate-900 dark:text-slate-200">Nafa</span>
                </div>
                <div class="w-full bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-4 rounded-lg rounded-tl-none shadow-sm overflow-hidden box-border">
                    <p class="text-sm leading-relaxed text-gray-900 dark:text-gray-100 break-words whitespace-pre-wrap max-w-full overflow-hidden">${text}</p>
                </div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="max-w-[85%] bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 border border-gray-200 dark:border-gray-700 p-4 rounded-lg rounded-tr-none shadow-sm overflow-hidden box-border">
                    <p class="text-sm leading-relaxed break-words whitespace-pre-wrap max-w-full overflow-hidden">${text}</p>
                </div>
            `;
        }

        this.messagesContainer.appendChild(messageDiv);

        if (shouldScroll) {
            this.saveChatToStorage();
            this.scrollToBottom();
            this.toggleClearChatButton(true);
        }
    }

    addSuggestions(suggestions) {
        const wrapper = document.createElement('div');
        wrapper.className = 'flex flex-wrap gap-2 justify-start mb-4';

        wrapper.innerHTML = suggestions.slice(0, 6).map((s) => {
            const label = String(s ?? '').trim();
            if (!label) return '';
            const safeLabel = label.replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/\"/g, '&quot;')
                .replace(/'/g, '&#039;');
            return `<button class="chatbot-suggestion border border-gray-300 dark:border-gray-600 bg-white dark:bg-slate-800 text-black dark:text-white px-3 py-1.5 rounded-lg text-xs font-medium shadow-sm active:scale-95 transition-transform hover:bg-gray-100 dark:hover:bg-gray-700" data-message="${safeLabel}">${safeLabel}</button>`;
        }).join('');

        if (wrapper.innerHTML.trim().length === 0) return;

        this.messagesContainer.appendChild(wrapper);
        this.scrollToBottom();
    }

    /**
     * Show typing indicator
     */
    showTypingIndicator() {
        this.typingIndicator.classList.remove('hidden');
        this.scrollToBottom();
    }

    /**
     * Hide typing indicator
     */
    hideTypingIndicator() {
        this.typingIndicator.classList.add('hidden');
    }

    /**
     * Save chat history to localStorage
     */
    saveChatToStorage() {
        const messages = [];
        const allMessages = this.messagesContainer.querySelectorAll('[data-message-type]');

        allMessages.forEach(msgEl => {
            const type = msgEl.getAttribute('data-message-type');
            if (type !== 'welcome') {
                const textEl = msgEl.querySelector('p:first-of-type');
                if (textEl) {
                    messages.push({
                        text: textEl.textContent,
                        type: type
                    });
                }
            }
        });

        if (messages.length > 0) {
            localStorage.setItem('chatbot_messages', JSON.stringify(messages));
        }
    }

    /**
     * Scroll to bottom
     */
    scrollToBottom() {
        if (!this.messagesContainer) return;

        // Gunakan requestAnimationFrame untuk memastikan DOM sudah ter-render
        requestAnimationFrame(() => {
            this.messagesContainer.scrollTop = this.messagesContainer.scrollHeight;

            // Fallback scroll behavior
            if (this.messagesContainer.scrollTo) {
                this.messagesContainer.scrollTo({
                    top: this.messagesContainer.scrollHeight,
                    behavior: 'instant'
                });
            }
        });
    }

    /**
     * Load chat history from localStorage
     */
    async loadChatHistory() {
        try {
            const savedMessages = localStorage.getItem('chatbot_messages');
            if (savedMessages) {
                const history = JSON.parse(savedMessages);
                if (Array.isArray(history) && history.length > 0) {
                    const welcomeMsg = this.messagesContainer.querySelector('[data-message-type="welcome"]');
                    this.messagesContainer.innerHTML = '';

                    if (welcomeMsg) {
                        this.messagesContainer.appendChild(welcomeMsg);
                    }

                    // Tambahkan semua pesan tanpa men-trigger scroll/save berulang kali
                    history.forEach(msg => {
                        this.addMessage(msg.text, msg.type, false);
                    });

                    // Selesaikan di akhir
                    this.toggleClearChatButton(true);
                    this.scrollToBottom();
                }
            } else {
                this.toggleClearChatButton(false);
            }
        } catch (error) {
            console.error('Failed to load chat history:', error);
        }
    }

    /**
     * Toggle Clear Chat Button Visibility
     */
    toggleClearChatButton(show) {
        if (this.clearBtn) {
            if (show) {
                this.clearBtn.classList.remove('hidden');
            } else {
                this.clearBtn.classList.add('hidden');
            }
        }
    }
}

// Initialize chatbot when DOM is ready
document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('chatbot-container')) {
        window.chatbotWidget = new ChatbotWidget();
    }
});
