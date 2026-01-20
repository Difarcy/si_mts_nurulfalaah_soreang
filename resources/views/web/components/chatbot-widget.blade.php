{{-- Chatbot Widget Component --}}
<div id="chatbot-container" class="fixed bottom-6 right-6 z-50 font-sans">

    {{-- Chat Button (Floating) --}}
    <button id="chatbot-toggle-btn"
        class="group relative flex items-center justify-center h-8 w-36 bg-green-700 dark:bg-green-700 rounded-full shadow-lg hover:scale-105 transition-transform duration-300 z-50 overflow-hidden"
        aria-label="Buka Chatbot" title="Asisten Virtual">

        <span id="chatbot-text"
            class="text-[14.5px] font-bold text-white whitespace-nowrap tracking-wide leading-none flex items-center pt-[1px]">
            Asisten Virtual
        </span>
    </button>

    {{-- Chat Window --}}
    <div id="chatbot-window"
        class="hidden absolute bottom-10 right-0 w-[calc(100vw-3rem)] h-[440px] sm:w-[360px] bg-white dark:bg-[#111827] rounded-xl shadow-2xl flex-col overflow-hidden border border-gray-100 dark:border-gray-800 origin-bottom-right max-w-[calc(100vw-2rem)] max-h-[calc(100vh-120px)] font-sans">

        {{-- Header --}}
        <div
            class="flex items-center justify-between px-5 py-3 bg-white dark:bg-[#111827] border-b border-gray-100 dark:border-gray-800 z-10">
            <div class="flex items-center gap-3">
                <h3 class="font-bold text-base text-slate-900 dark:text-white">Nafa</h3>
            </div>
            <div class="flex items-center gap-2">
                {{-- Clear Chat Button --}}
                <button id="chatbot-clear-btn" class="hidden text-slate-400 hover:text-red-500 transition-colors p-1"
                    title="Hapus Chat">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
                {{-- Minimize Button --}}
                <button id="chatbot-minimize-btn"
                    class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors p-1"
                    title="Tutup">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Messages Container --}}
        <div id="chatbot-messages"
            class="flex-1 overflow-y-auto px-5 py-4 space-y-5 bg-white dark:bg-[#111827] scrollbar-hide">

            {{-- Welcome Message (Bot) --}}
            <div class="flex flex-col gap-1.5 animate-slide-in" data-message-type="welcome">
                <div class="flex items-center gap-2">
                    <span class="text-base font-bold text-slate-900 dark:text-slate-200">Nafa</span>
                </div>
                <div
                    class="w-full bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-4 rounded-lg rounded-tl-none shadow-sm">
                    <p class="text-sm leading-relaxed text-gray-900 dark:text-gray-100">
                        Halo! 👋 Ada yang bisa saya bantu terkait informasi sekolah atau pendaftaran hari ini?
                    </p>
                </div>

                {{-- Quick Suggestions (Akses Cepat) --}}
                <div class="flex flex-wrap gap-2 mt-2 px-1">
                    <button
                        class="chatbot-suggestion px-3 py-1.5 border border-gray-300 dark:border-gray-600 rounded-lg text-xs font-medium text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors whitespace-nowrap"
                        data-message="Pendaftaran Siswa Baru">SPMB</button>
                    <button
                        class="chatbot-suggestion px-3 py-1.5 border border-gray-300 dark:border-gray-600 rounded-lg text-xs font-medium text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors whitespace-nowrap"
                        data-message="Berapa Biaya Masuk?">Biaya</button>
                    <button
                        class="chatbot-suggestion px-3 py-1.5 border border-gray-300 dark:border-gray-600 rounded-lg text-xs font-medium text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors whitespace-nowrap"
                        data-message="Apa saja Fasilitas Sekolah?">Fasilitas</button>
                    <button
                        class="chatbot-suggestion px-3 py-1.5 border border-gray-300 dark:border-gray-600 rounded-lg text-xs font-medium text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors whitespace-nowrap"
                        data-message="Lokasi Sekolah">Lokasi</button>
                </div>
            </div>
        </div>

        {{-- Typing Indicator --}}
        <div id="chatbot-typing" class="hidden px-5 py-2 bg-white dark:bg-[#111827]">
            <div class="flex items-center gap-2 ml-1">
                <span class="text-xs text-slate-400 dark:text-slate-500 font-medium italic animate-pulse">Sedang
                    berpikir...</span>
            </div>
        </div>



        {{-- Input Area Modern --}}
        <div class="px-5 pb-5 pt-2 bg-white dark:bg-[#111827]">
            <form id="chatbot-form" class="relative">
                <textarea id="chatbot-input" rows="1" placeholder="Tulis pertanyaan Anda"
                    class="w-full bg-slate-50 dark:bg-[#1f2937] border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3.5 text-sm focus:ring-1 focus:ring-green-500 focus:outline-none text-slate-900 dark:text-white placeholder-slate-400 resize-none pr-12 scrollbar-none shadow-sm transition-all"
                    style="min-height: 120px; max-height: 200px;"></textarea>

                <button type="submit" id="chatbot-send-btn"
                    class="absolute x-send-button right-3 bottom-3 w-8 h-8 rounded-full text-slate-400 hover:text-green-600 transition-all flex items-center justify-center disabled:opacity-50 z-10">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                    </svg>
                </button>
            </form>
            <div class="mt-2 text-center">
                <p class="text-[10px] text-slate-500 dark:text-white">Informasi dari AI mungkin tidak akurat</p>
            </div>
        </div>
    </div>


</div>

@push('styles')
@endpush