@props([
    'label' => null,
    'name',
    'id' => null,
    'options' => [], // ['value' => 'Label'] or [['value' => 'v', 'label' => 'l']]
    'selected' => null,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
    'error' => null,
    'hint' => null,
    'class' => ''
])

@php
    $id = $id ?? $name;
    $errorClass = $error ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : 'border-gray-200 dark:border-slate-600 focus:ring-2 focus:ring-green-600 focus:border-transparent focus:outline-none';
    $baseClass = "w-full bg-white dark:bg-slate-900 border-2 rounded p-2 sm:px-3 sm:py-1.5 text-base font-semibold focus:outline-none appearance-none cursor-pointer transition-colors disabled:bg-gray-100 disabled:text-gray-500 dark:disabled:bg-slate-800 dark:disabled:text-slate-500 text-slate-900 dark:text-slate-100 {$errorClass} {$class}";
@endphp

<div class="w-full">
    @if($label)
        <label for="{{ $id }}" class="block text-base font-semibold text-slate-700 dark:text-white mb-1">
            @if(str_contains($label, '(opsional)'))
                {!! str_replace('(opsional)', '<span class="text-xs font-normal text-slate-400 dark:text-slate-500">(opsional)</span>', e($label)) !!}
            @else
                {{ $label }}
            @endif
            @if($required) <span class="text-red-600 dark:text-red-500">*</span> @endif
        </label>
    @endif

    <div class="relative">
        <select
            name="{{ $name }}"
            id="{{ $id }}"
            class="{{ $baseClass }}"
            @if($required) required @endif
            @if($disabled) disabled @endif
            {{ $attributes }}
        >
            @if($placeholder)
                <option value="" disabled @if(is_null($selected)) selected @endif>{{ $placeholder }}</option>
            @endif

            {{ $slot }}
        </select>

        <!-- Chevron Icon -->
        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
            <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
    </div>

    @if($error)
        <p class="text-xs text-red-600 mt-1">{{ $error }}</p>
    @elseif($errors->has($name))
        <p class="text-xs text-red-600 mt-1">{{ $errors->first($name) }}</p>
    @elseif($hint)
        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">{{ $hint }}</p>
    @endif
</div>
