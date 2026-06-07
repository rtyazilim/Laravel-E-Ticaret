@props(['variant' => 'primary', 'size' => 'md', 'href' => null, 'type' => 'button'])
@php
    $base = 'inline-flex items-center justify-center gap-2 rounded-xl font-semibold transition focus:outline-none focus:ring-4 disabled:pointer-events-none disabled:opacity-50';
    $sizes = ['sm' => 'h-9 px-3 text-sm', 'md' => 'h-11 px-5 text-sm', 'lg' => 'h-12 px-6 text-base'];
    $variants = [
        'primary' => 'bg-slate-950 text-white shadow-soft hover:-translate-y-0.5 hover:shadow-lift focus:ring-slate-400/30 dark:bg-white dark:text-slate-950',
        'secondary' => 'border border-slate-200 bg-white text-slate-800 hover:bg-slate-100 focus:ring-slate-300/40 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800',
        'danger' => 'bg-red-600 text-white shadow-soft hover:bg-red-700 focus:ring-red-500/30',
        'ghost' => 'text-slate-700 hover:bg-slate-100 focus:ring-slate-300/30 dark:text-slate-200 dark:hover:bg-slate-800',
    ];
    $class = $base.' '.($sizes[$size] ?? $sizes['md']).' '.($variants[$variant] ?? $variants['primary']);
@endphp
@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</button>
@endif
