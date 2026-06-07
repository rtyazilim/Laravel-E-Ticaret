@props([
    'padding' => 'p-6'
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl shadow-soft border border-slate-100 hover:shadow-lift transition-shadow duration-300 dark:bg-slate-800 dark:border-slate-700 ' . $padding]) }}>
    {{ $slot }}
</div>
