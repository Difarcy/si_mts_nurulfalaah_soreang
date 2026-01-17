@extends('admin.layouts.admin')

@section('title', 'Detail Komentar')

@section('content')
    <div class="max-w-7xl mx-auto pb-24 relative">
        <!-- Header Navigation -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Detail Komentar</h1>
                <p class="text-base text-slate-500 dark:text-slate-400">Tinjau dan balas komentar pengguna</p>
            </div>
            <div class="flex items-center gap-3">
                @if(!$comment->is_approved)
                    <button type="button" id="detail-approve-btn" data-comment-id="{{ $comment->id }}"
                        class="inline-flex items-center gap-2 px-4 py-1.5 bg-green-600 hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-800 text-white text-base font-semibold transition-colors rounded shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Setujui
                    </button>
                @endif
                <a href="{{ route('cpanel.comments.index', request()->query()) }}"
                    class="inline-flex items-center gap-2 px-4 py-1.5 bg-slate-600 hover:bg-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 text-white text-base font-semibold transition-colors rounded shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18">
                        </path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- LEFT: Main Comment Card (2/3) -->
            <div class="lg:col-span-2">
                <!-- The Card -->
                <div
                    class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded shadow-sm overflow-hidden hover:shadow-md transition-shadow">

                    <!-- Card Header -->
                    <div
                        class="p-6 sm:p-8 border-b border-gray-100 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-start gap-4">
                        <div class="flex gap-5">
                            <div
                                class="w-14 h-14 rounded-full bg-linear-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-xl font-bold shadow-md shrink-0">
                                {{ strtoupper(substr($comment->name, 0, 1)) }}
                            </div>
                            <div class="pt-1">
                                <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100">{{ $comment->name }}</h2>
                                <p class="text-base font-medium text-slate-500 dark:text-slate-400 mb-1">
                                    {{ $comment->email }}
                                </p>
                                @if($comment->is_approved)
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Disetujui
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">
                                        Menunggu Approval
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="sm:text-right pt-2">
                            <span class="block text-base font-bold text-slate-700 dark:text-slate-300">
                                {{ $comment->created_at->isoFormat('D MMMM Y') }}
                            </span>
                            <span class="block text-base font-medium text-slate-500 dark:text-slate-400">
                                Pukul {{ $comment->created_at->format('H:i') }} WIB
                            </span>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 sm:p-8 min-h-50 bg-white dark:bg-slate-800">
                        <div
                            class="prose dark:prose-invert max-w-none text-slate-800 dark:text-slate-200 leading-relaxed text-base font-normal">
                            {!! nl2br(e($comment->comment)) !!}
                        </div>
                    </div>

                    <!-- Card Footer (Actions) -->
                    <div
                        class="px-6 sm:px-8 py-5 bg-gray-50/80 dark:bg-slate-700/50 border-t border-gray-100 dark:border-slate-700 flex justify-end">
                        @if($comment->is_approved)
                            <button type="button" id="open-reply-btn"
                                class="inline-flex items-center gap-2 px-4 py-1.5 bg-blue-600 dark:bg-blue-700 hover:bg-blue-700 dark:hover:bg-blue-800 text-white text-base font-bold rounded transition-all shadow-sm transform hover:-translate-y-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                </svg>
                                Balas Komentar
                            </button>
                        @else
                            <button type="button" id="open-reply-btn" disabled
                                class="inline-flex items-center gap-2 px-4 py-1.5 bg-gray-500 dark:bg-gray-600 text-white text-base font-bold rounded transition-all shadow-sm cursor-not-allowed"
                                title="Setujui komentar terlebih dahulu sebelum membalas">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                </svg>
                                Balas Komentar
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Riwayat Pesan (Optional Accordion) -->
                @if($comment->parent_id || $threadRoot->id !== $comment->id || $commentsByParent->has($comment->id))
                    <div class="mt-8">
                        <h3 class="text-base font-bold text-slate-400 uppercase tracking-wider mb-4 px-2">Konteks Percakapan
                        </h3>
                        <div
                            class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded shadow-sm p-6 opacity-75 hover:opacity-100 transition-opacity">
                                   @include('admin.pages.comments._thread_node', ['comment' => $threadRoot, 'commentsByParent' => $commentsByParent, 'likedCommentIds' => $likedCommentIds, 'level' => 0])
                        </div>
                    </div>
                @endif
            </div>

            <!-- RIGHT: Sidebar Post Details (1/3) -->
            <div class="space-y-6">
                @if($comment->post)
                    <div
                        class="w-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded shadow-sm p-6 sticky top-24">
                        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6">Tentang Postingan</h3>

                        <div class="mb-6">
                            @if($comment->post->type === 'berita')
                                <span
                                    class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 mb-2">BERITA</span>
                            @else
                                <span
                                    class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-purple-50 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 mb-2">ARTIKEL</span>
                            @endif

                            <h4 class="text-lg font-bold text-slate-900 dark:text-slate-100 leading-snug mb-3">
                                {{ $comment->post->title }}
                            </h4>

                            @if(trim(strip_tags($comment->post->body)))
                                <div
                                    class="text-base text-slate-600 dark:text-slate-400 leading-relaxed p-3 bg-slate-100 dark:bg-slate-700/50 rounded mb-4 text-justify">
                                    {{ \Illuminate\Support\Str::limit(trim(strip_tags($comment->post->body)), 115, '...') }}
                                </div>
                            @endif
                        </div>

                        <a href="{{ route('informasi.show', ['type' => $comment->post->type, 'slug' => $comment->post->slug]) }}"
                            target="_blank"
                            class="flex items-center justify-center w-full px-5 py-2 text-base font-semibold text-white bg-green-700 hover:bg-green-800 dark:bg-green-600 dark:hover:bg-green-700 border-none rounded transition-all">
                            Buka Postingan
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>
                @endif
            </div>

        </div>

        <!-- GMAIL STYLE FLOATING REPLY BOX -->
        <div id="reply-box-container"
            class="fixed bottom-0 right-4 sm:right-8 z-50 w-[calc(100%-2rem)] sm:w-137.5 transform translate-y-full transition-transform duration-300 ease-[cubic-bezier(0.2,0,0,1)]">
            <div
                class="bg-white dark:bg-slate-800 rounded shadow-[0_-5px_30px_-5px_rgba(0,0,0,0.1)] border border-gray-200 dark:border-slate-700 flex flex-col max-h-[70vh] sm:max-h-150">

                <!-- Header -->
                <div id="reply-box-header"
                    class="flex items-center justify-between px-5 py-3 bg-slate-900 dark:bg-slate-950 text-white rounded cursor-pointer select-none">
                    <div class="flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-white/10">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                            </svg>
                        </span>
                        <span class="font-bold text-base tracking-wide">Balas ke
                            {{ \Illuminate\Support\Str::limit($comment->name, 20) }}</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <button type="button" id="reply-minimize-btn"
                            class="text-slate-400 hover:text-white transition-colors p-1 rounded-full hover:bg-white/10"
                            title="Minimize">
                            <svg id="minimize-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                            </svg>
                        </button>
                        <button type="button" id="reply-close-btn"
                            class="text-slate-400 hover:text-white transition-colors p-1 rounded-full hover:bg-white/10"
                            title="Tutup">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Body -->
                <div id="reply-body" class="flex-1 overflow-y-auto bg-white dark:bg-slate-800">
                    <form action="{{ route('cpanel.comments.reply', $comment) }}" method="POST" class="flex flex-col h-full"
                        data-notify="loading">
                        @csrf

                        <!-- Meta Inputs -->
                        <div class="px-5 py-3 border-b border-gray-100 dark:border-slate-800 flex items-center gap-3">
                            <div
                                class="w-12 h-12 rounded-full bg-linear-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-md shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <input type="text" id="admin-reply-by-input" name="admin_reply_by"
                                    value="{{ old('admin_reply_by', $defaultReplyBy) }}"
                                    class="w-full text-base font-semibold text-slate-800 dark:text-slate-200 bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-600 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent px-3 py-2 placeholder-slate-400 rounded"
                                    placeholder="Nama Pengirim">
                                <p class="text-sm text-slate-400 px-3 pt-0.5">Membalas sebagai <span
                                        id="reply-as-name">{{ $defaultReplyBy ?? 'admin' }}</span></p>
                            </div>
                        </div>

                        <!-- Textarea Container -->
                        <div class="flex-1 px-5 py-3">
                            <div class="relative group">
                                <textarea name="admin_reply" id="reply-textarea"
                                    class="w-full p-4 pb-10 text-base bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-600 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent resize-none text-slate-800 dark:text-slate-200 leading-relaxed min-h-62.5 rounded"
                                    placeholder="Ketik balasan Anda di sini..."></textarea>

                                <!-- Emoji Trigger -->
                                <button type="button" id="emoji-trigger-btn"
                                    class="absolute bottom-2 right-2 p-2 text-slate-400 hover:text-yellow-500 hover:bg-yellow-100 dark:hover:bg-slate-800 rounded-full transition-colors z-10 cursor-pointer pointer-events-auto"
                                    title="Sisipkan Emoji">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>

                                <!-- Emoji Picker Popover -->
                                <div id="emoji-picker-container"
                                    class="fixed z-[9999] hidden shadow-lg rounded-xl border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden transition-all duration-200 pointer-events-auto">
                                    <emoji-picker class="light dark:dark"></emoji-picker>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Actions -->
                        <div
                            class="p-4 border-t border-gray-100 dark:border-slate-700 flex justify-between items-center bg-gray-50 dark:bg-slate-700/50">
                            <button type="submit"
                                class="px-4 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-base font-bold rounded shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                                Kirim
                            </button>
                            <button type="button" id="clear-reply-btn"
                                class="px-4 py-1.5 bg-slate-500 hover:bg-slate-600 dark:bg-slate-600 dark:hover:bg-slate-700 text-white text-base font-bold rounded shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5"
                                title="Hapus draf">
                                Clear
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection