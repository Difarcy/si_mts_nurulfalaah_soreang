@php
    $children = $commentsByParent->get($comment->id, collect());
    $isLiked = in_array($comment->id, $likedCommentIds ?? [], true);
@endphp

<div class="pb-2 last:pb-0" data-comment-id="{{ $comment->id }}">
    <div class="flex flex-col sm:flex-row sm:items-start gap-4">
        <div class="min-w-0 flex-1">
            <div class="flex items-start justify-between mb-1">
                <div>
                    <div class="flex items-center gap-2 flex-wrap">
                        <h4 class="font-semibold text-slate-900 dark:text-slate-100">{{ $comment->name }}</h4>
                        @if(!$comment->is_admin && $comment->email)
                            <span
                                class="text-xs text-slate-500 dark:text-slate-400 hidden sm:inline">&lt;{{ $comment->email }}&gt;</span>
                        @endif
                        @if($comment->is_admin)
                            <span
                                class="px-2 py-0.5 text-xs font-semibold text-green-800 bg-green-100 dark:bg-green-900/30 dark:text-green-400 rounded-full">Admin</span>
                        @endif
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                        {{ $comment->created_at->format('d M Y, H:i') }}
                    </p>
                </div>
            </div>

            <div class="text-slate-700 dark:text-slate-200 leading-snug whitespace-pre-wrap">{{ $comment->comment }}
            </div>

            <div class="-mt-5 flex items-center gap-4 text-sm">
                <button type="button"
                    class="admin-comment-like inline-flex items-center gap-1.5 text-slate-600 dark:text-slate-300 hover:text-green-700 dark:hover:text-green-400 transition-colors"
                    data-comment-id="{{ $comment->id }}" data-liked="{{ $isLiked ? '1' : '0' }}">
                    <span class="admin-comment-like-label">{{ $isLiked ? 'Disukai' : 'Suka' }}</span>
                    <span
                        class="admin-comment-like-count text-slate-500 dark:text-slate-400">({{ $comment->likes_count ?? 0 }})</span>
                </button>

                <button type="button"
                    class="admin-thread-reply inline-flex items-center gap-1.5 text-slate-600 dark:text-slate-300 hover:text-green-700 dark:hover:text-green-400 transition-colors"
                    data-comment-id="{{ $comment->id }}">
                    Balas
                </button>
            </div>

            @if($children->isNotEmpty())
                @php
                    $replyCount = $children->count();
                    $replyLabel = $replyCount === 1 ? 'Lihat 1 balasan' : "Lihat semua $replyCount balasan";
                @endphp

                <div class="mt-2">
                    <button type="button"
                        class="group flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200 transition-colors py-1"
                        data-toggle-admin-replies>
                        <svg class="w-4 h-4 transform transition-transform group-hover:translate-y-0.5" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                        <span class="reply-toggle-text">{{ $replyLabel }}</span>
                    </button>
                </div>

                <div class="replies-wrapper hidden mt-2 pl-4 space-y-2">
                    @foreach($children as $child)
                        @include('admin.pages.comments._thread_node', ['comment' => $child, 'commentsByParent' => $commentsByParent, 'likedCommentIds' => $likedCommentIds])
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
