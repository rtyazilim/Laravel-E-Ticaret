@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full rounded-lg border-slate-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 dark:bg-slate-900 dark:border-slate-700 dark:text-slate-100 dark:focus:ring-brand-600 disabled:opacity-50 disabled:bg-slate-50 transition-colors']) !!}>
