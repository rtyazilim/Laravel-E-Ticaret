<aside 
    :class="sidebarOpen ? 'translate-x-0 w-64' : '-translate-x-full w-0 md:w-20 md:translate-x-0'"
    class="bg-ink dark:bg-slate-950 text-slate-300 transition-all duration-300 ease-in-out fixed md:relative z-40 h-full flex flex-col border-r border-slate-800"
>
    <div class="h-16 flex items-center justify-center border-b border-slate-800 overflow-hidden px-4 shrink-0">
        <svg class="h-8 w-8 text-brand-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
        <span x-show="sidebarOpen" x-transition.opacity class="ml-3 font-bold text-white text-lg tracking-wide whitespace-nowrap">StoreAdmin</span>
    </div>

    <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1 custom-scrollbar">
        @php
            $navItems = [
                ['name' => 'Dashboard', 'url' => url('/admin'), 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                ['name' => 'Orders', 'url' => url('/admin/orders'), 'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'],
                ['name' => 'Products', 'url' => url('/admin/products'), 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                ['name' => 'Customers', 'url' => url('/admin/users'), 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
            ];
        @endphp

        @foreach($navItems as $item)
            @php $isActive = request()->url() == $item['url']; @endphp
            <a href="{{ $item['url'] }}" 
               class="group flex items-center px-2 py-2.5 rounded-lg transition-colors {{ $isActive ? 'bg-brand-600 text-white' : 'hover:bg-slate-800 hover:text-white' }}"
               :title="!sidebarOpen ? '{{ $item['name'] }}' : ''"
            >
                <svg class="h-5 w-5 shrink-0 {{ $isActive ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                </svg>
                <span x-show="sidebarOpen" x-transition.opacity class="ml-3 font-medium truncate">{{ $item['name'] }}</span>
            </a>
        @endforeach
    </nav>
</aside>

<style>
.custom-scrollbar::-webkit-scrollbar { width: 4px; }
.custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
.custom-scrollbar:hover::-webkit-scrollbar-thumb { background: #475569; }
</style>
