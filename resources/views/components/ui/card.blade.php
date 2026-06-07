@props(['hover' => false, 'elevated' => true])
<div {{ $attributes->merge(['class' => 'rounded-3xl border border-slate-200 bg-white transition dark:border-slate-800 dark:bg-slate-900 '.($elevated ? 'shadow-soft ' : '').($hover ? 'hover:-translate-y-1 hover:shadow-lift' : '')]) }}>
    {{ $slot }}
</div>
