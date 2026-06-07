<div
    x-data="{ toasts: [] }"
    @notify.window="toasts.push({ id: Date.now(), message: $event.detail.message, type: $event.detail.type || 'success' }); setTimeout(() => { toasts.shift() }, 3000)"
    class="fixed bottom-0 right-0 z-50 p-4 space-y-3 w-full sm:w-96"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="flex items-center p-4 rounded-xl shadow-lift text-sm font-medium bg-white dark:bg-slate-800 border dark:border-slate-700"
            :class="{
                'text-green-600 border-green-200 dark:text-green-400': toast.type === 'success',
                'text-red-600 border-red-200 dark:text-red-400': toast.type === 'error',
                'text-brand-600 border-brand-200 dark:text-brand-400': toast.type === 'info',
            }"
        >
            <div class="flex-shrink-0 mr-3">
                <svg x-show="toast.type === 'success'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <svg x-show="toast.type === 'error'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                <svg x-show="toast.type === 'info'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div x-text="toast.message" class="flex-1 text-slate-800 dark:text-slate-200"></div>
            <button @click="toasts = toasts.filter(t => t.id !== toast.id)" class="ml-4 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    </template>
</div>
