@props(['name'])
<div x-data="{ open: false }" x-on:open-modal.window="if ($event.detail === '{{ $name }}') open = true" x-show="open" x-cloak class="fixed inset-0 z-50 grid place-items-center bg-slate-950/50 p-4 backdrop-blur-sm">
    <div x-show="open" x-transition.scale.origin.center class="w-full max-w-lg rounded-3xl bg-white p-6 shadow-lift dark:bg-slate-900">
        <div class="flex justify-end">
            <button type="button" x-on:click="open = false" class="grid h-9 w-9 place-items-center rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800">
                <i data-lucide="x" class="h-4 w-4"></i>
            </button>
        </div>
        {{ $slot }}
    </div>
</div>
