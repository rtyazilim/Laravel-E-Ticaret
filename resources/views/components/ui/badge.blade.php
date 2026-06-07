@props(['status' => 'default'])
@php
    $classes = [
        'active' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300',
        'pending' => 'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300',
        'paid' => 'bg-blue-100 text-blue-700 dark:bg-blue-500/15 dark:text-blue-300',
        'shipped' => 'bg-indigo-100 text-indigo-700 dark:bg-indigo-500/15 dark:text-indigo-300',
        'cancelled' => 'bg-red-100 text-red-700 dark:bg-red-500/15 dark:text-red-300',
        'passive' => 'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-300',
        'default' => 'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-300',
    ];
@endphp
<span {{ $attributes->merge(['class' => 'inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold '.($classes[$status] ?? $classes['default'])]) }}>
    {{ $slot }}
</span>
