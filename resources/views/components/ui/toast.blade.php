<div x-data="{ show: {{ session('status') || session('error') ? 'true' : 'false' }} }" x-show="show" x-transition x-cloak class="fixed right-4 top-4 z-50 max-w-sm rounded-2xl border border-slate-200 bg-white px-5 py-4 text-sm font-medium shadow-lift dark:border-slate-800 dark:bg-slate-900">
    <div class="flex items-center gap-3">
        <span class="grid h-8 w-8 place-items-center rounded-xl {{ session('error') ? 'bg-red-100 text-red-700' : 'bg-emerald-100 text-emerald-700' }}">
            <i data-lucide="{{ session('error') ? 'alert-triangle' : 'check' }}" class="h-4 w-4"></i>
        </span>
        <span>{{ session('status') ?? session('error') }}</span>
        <button type="button" x-on:click="show = false" class="ml-auto text-slate-400 hover:text-slate-700">
            <i data-lucide="x" class="h-4 w-4"></i>
        </button>
    </div>
</div>
