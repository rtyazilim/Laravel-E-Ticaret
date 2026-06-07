@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button'
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';
    
    $sizeClasses = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base',
    ];
    
    $variantClasses = [
        'primary' => 'bg-brand-600 text-white hover:bg-brand-700 focus:ring-brand-500 shadow-sm',
        'secondary' => 'bg-white text-slate-700 border border-slate-300 hover:bg-slate-50 focus:ring-brand-500 shadow-sm dark:bg-slate-800 dark:text-slate-200 dark:border-slate-600 dark:hover:bg-slate-700',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500 shadow-sm',
        'ghost' => 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 focus:ring-slate-500 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-slate-50',
    ];
    
    $classes = $baseClasses . ' ' . $sizeClasses[$size] . ' ' . $variantClasses[$variant];
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
