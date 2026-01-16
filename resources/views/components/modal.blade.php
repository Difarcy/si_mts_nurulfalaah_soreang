@props([
    'name',
    'id' => null,
    'show' => false,
    'maxWidth' => 'md', // sm, md, lg, xl, 2xl
    'title' => null
])

@php
    $id = $id ?? $name;
    
    $maxWidths = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
    ];
    
    $widthClass = $maxWidths[$maxWidth] ?? $maxWidths['md'];
@endphp

<div 
    x-data="{ show: @js($show) }"
    x-modelable="show"
    x-on:open-{{ $name }}.window="show = true"
    x-on:close-{{ $name }}.window="show = false"
    x-on:keydown.escape.window="show = false"
    x-cloak
    x-show="show"
    id="{{ $id }}"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 dark:bg-black/50 backdrop-blur-sm p-4 overflow-y-auto"
>
    <div 
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="bg-white dark:bg-slate-800 rounded shadow-xl w-full {{ $widthClass }} transform transition-all"
        @click.away="show = false"
    >
        @if($title)
        <div class="px-6 py-4 border-b border-gray-200 dark:border-slate-700">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">
                {{ $title }}
            </h3>
        </div>
        @endif

        <div class="p-6">
            {{ $slot }}
        </div>

        @if(isset($footer))
        <div class="px-6 py-4 bg-gray-50 dark:bg-slate-800/50 border-t border-gray-200 dark:border-slate-700 flex justify-end gap-3">
            {{ $footer }}
        </div>
        @endif
    </div>
</div>
