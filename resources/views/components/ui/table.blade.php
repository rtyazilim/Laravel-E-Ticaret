<div {{ $attributes->merge(['class' => 'overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-soft dark:border-slate-800 dark:bg-slate-900']) }}>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200 text-sm dark:divide-slate-800">
            {{ $slot }}
        </table>
    </div>
</div>
