@php($items = $items ?? [])
<nav aria-label="Breadcrumb" class="mb-2">
    <ol class="flex flex-wrap items-center gap-2 text-sm text-gray-600 dark:text-slate-400">
        @foreach($items as $i => $item)
            @php($isLast = $i === count($items) - 1)
            @if(!empty($item['url']) && !$isLast)
                <li>
                    <a href="{{ $item['url'] }}" class="hover:text-green-700 dark:hover:text-green-400 transition-colors">{{ $item['label'] }}</a>
                </li>
            @else
                <li class="{{ $isLast ? 'text-gray-900 dark:text-slate-100 font-medium' : '' }}">{{ $item['label'] }}</li>
            @endif
            @if(!$isLast)
                <li>
                    <svg class="w-4 h-4 text-gray-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
