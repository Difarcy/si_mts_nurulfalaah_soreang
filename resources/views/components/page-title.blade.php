@php($title = $title ?? '')
@php($subtitle = $subtitle ?? null)
<div class="flex items-center gap-3 mb-4">
    <span class="w-px h-6 sm:h-8 bg-green-700 dark:bg-green-500"></span>
    <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-slate-100">{{ $title }}</h1>
</div>
@if($subtitle)
    <p class="text-xs sm:text-sm text-gray-600 dark:text-slate-400 mb-4">{{ $subtitle }}</p>
@endif