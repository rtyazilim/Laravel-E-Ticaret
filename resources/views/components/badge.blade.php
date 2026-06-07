@props([
    'variant' => 'default',
])

@php
    $baseClasses = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium';
    
    $variants = [
        'default' => 'bg-slate-100 text-slate-800 dark:bg-slate-700 dark:text-slate-300',
        'success' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400',
        'warning' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400',
        'danger' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400',
        'brand' => 'bg-brand-100 text-brand-800 dark:bg-brand-900/30 dark:text-brand-400',
    ];
    
    $classes = $baseClasses . ' ' . $variants[$variant];
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
