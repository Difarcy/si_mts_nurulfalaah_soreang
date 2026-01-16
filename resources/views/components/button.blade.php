@props([
    'variant' => 'primary', // primary, secondary, danger, success, warning, outline, ghost
    'size' => 'md', // sm, md, lg
    'type' => 'button',
    'fullWidth' => false,
    'class' => '',
    'disabled' => false,
    'href' => null
])




@php
    $baseClasses = 'inline-flex items-center justify-center font-semibold rounded transition-colors focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed';

    $variants = [
        'primary' => 'bg-green-700 text-white hover:bg-green-800 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-slate-800',
        'secondary' => 'bg-slate-200 text-slate-800 hover:bg-slate-300 dark:bg-slate-700 dark:text-slate-200 dark:hover:bg-slate-600',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-slate-800',
        'success' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-slate-800',
        'warning' => 'bg-amber-500 text-white hover:bg-amber-600 focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 dark:focus:ring-offset-slate-800',
        'outline' => 'border border-slate-300 text-slate-700 hover:bg-slate-50 dark:border-slate-600 dark:text-slate-300 dark:hover:bg-slate-700',
        'ghost' => 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-200',
    ];

    $sizes = [
        'xs' => 'px-2 py-1 text-xs',
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-4 py-1.5 text-sm',
        'lg' => 'px-6 py-3 text-base',
    ];

    $classes = "{$baseClasses} {$variants[$variant]} {$sizes[$size]} " . ($fullWidth ? 'w-full ' : '') . $class;
@endphp
@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }} @disabled($disabled)>
        {{ $slot }}
    </button>
@endif
