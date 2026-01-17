@php
    $children = $commentsByParent->get($comment->id, collect());
    $isLiked = in_array($comment->id, $likedCommentIds ?? [], true);
@endphp

<div class="pb-2 last:pb-0" data-comment-id="{{ $comment->id }}">
    <div class="flex flex-col sm:flex-row sm:items-start gap-4">
        <div class="reply-modal-host hidden sm:w-96 shrink-0"></div>

        <div class="min-w-0 flex-1">
            <div class="flex items-start justify-between mb-1">
                <div>
                    <h4
                        class="text-base font-bold {{ $comment->is_admin ? 'text-green-700 dark:text-green-500' : 'text-slate-900 dark:text-slate-100' }}">
                        {{ $comment->name }}
                    </h4>
                    <p class="text-base text-slate-500 dark:text-slate-400">
                        {{ $comment->created_at->format('d M Y, H:i') }}
                    </p>
                </div>
            </div>

            <div class="text-base text-black dark:text-slate-100 leading-relaxed text-left">
                {!! nl2br(e(trim($comment->comment))) !!}
            </div>
            <div class="mt-2 flex items-center gap-4 text-base">
                <button type="button"
                    class="comment-like inline-flex items-center gap-1.5 text-slate-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400 transition-colors"
                    data-comment-id="{{ $comment->id }}" data-liked="{{ $isLiked ? '1' : '0' }}">
                    <span class="comment-like-label">{{ $isLiked ? 'Disukai' : 'Suka' }}</span>
                    <span
                        class="comment-like-count text-slate-500 dark:text-slate-400">({{ $comment->likes_count ?? 0 }})</span>
                </button>

                <button type="button"
                    class="comment-reply inline-flex items-center gap-1.5 text-slate-600 dark:text-slate-400 hover:text-green-700 dark:hover:text-green-400 transition-colors"
                    data-comment-id="{{ $comment->id }}">
                    Balas
                </button>
            </div>

            <div class="reply-modal-host-mobile hidden sm:hidden mt-4"></div>

            @if($children->isNotEmpty())
                @php
                    $replyCount = $children->count();
                    $replyLabel = $replyCount === 1 ? 'Lihat 1 balasan' : "Lihat semua $replyCount balasan";
                    $shouldHide = ($level ?? 0) >= 1;
                @endphp

                @if($shouldHide)
                    <div class="mt-2">
                        <button type="button"
                            class="group flex items-center gap-2 text-sm sm:text-base font-bold text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200 transition-colors py-1"
                            data-toggle-web-replies>
                            <svg class="w-4 h-4 transform transition-transform group-hover:translate-y-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                            <span class="reply-toggle-text">{{ $replyLabel }}</span>
                        </button>
                    </div>
                @endif

                <div class="replies-wrapper {{ $shouldHide ? 'hidden' : '' }} mt-2 pl-4 space-y-2">
                    @foreach($children as $child)
                        @include('web.pages.information._comment_node', [
                            'comment' => $child,
                            'commentsByParent' => $commentsByParent,
                            'likedCommentIds' => $likedCommentIds,
                            'level' => ($level ?? 0) + 1
                        ])
                    @endforeach
                                                                </div>
            @endif
        </div>
    </div>
</div>