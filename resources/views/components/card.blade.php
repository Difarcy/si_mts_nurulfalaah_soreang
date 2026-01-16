@props([
    'title' => null,
    'class' => '',
    'headerClass' => '',
    'bodyClass' => '',
    'footerClass' => ''
])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 rounded shadow-sm ' . $class]) }}>
    @if($title || isset($header))
        <div class="px-4 py-3 sm:px-6 sm:py-4 border-b border-gray-200 dark:border-slate-700 flex items-center justify-between {{ $headerClass }}">
            @if(isset($header))
                {{ $header }}
            @else
                <h3 class="text-base sm:text-lg font-bold text-slate-900 dark:text-slate-100">{{ $title }}</h3>
            @endif
            
            @if(isset($actions))
                <div class="flex items-center gap-2">
                    {{ $actions }}
                </div>
            @endif
        </div>
    @endif

    <div class="p-4 sm:p-6 {{ $bodyClass }}">
        {{ $slot }}
    </div>

    @if(isset($footer))
        <div class="px-4 py-3 sm:px-6 sm:py-4 bg-gray-50 dark:bg-slate-800/50 border-t border-gray-200 dark:border-slate-700 flex items-center {{ $footerClass }}">
            {{ $footer }}
        </div>
    @endif
</div>
