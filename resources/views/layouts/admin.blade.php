<!doctype html>
<html lang="tr" x-data="{ collapsed: localStorage.sidebar === 'collapsed', dark: localStorage.theme === 'dark' }" x-init="$watch('collapsed', v => localStorage.sidebar = v ? 'collapsed' : 'expanded'); $watch('dark', v => localStorage.theme = v ? 'dark' : 'light')" :class="{ 'dark': dark }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} - {{ config('app.name') }}</title>
    @php($manifest = public_path('build/manifest.json'))
    @if(file_exists($manifest))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script>tailwind = { config: { darkMode: 'class', theme: { extend: { boxShadow: { soft: '0 18px 50px rgba(15, 23, 42, .10)', lift: '0 20px 65px rgba(15, 23, 42, .16)' }, colors: { brand: { 500: '#2563eb', 600: '#1d4ed8' }, mint: '#10b981', coral: '#f97316' } } } } };</script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://unpkg.com/lucide@latest"></script>
        <script defer>document.addEventListener('DOMContentLoaded', () => window.lucide?.createIcons())</script>
    @endif
</head>
<body class="min-h-screen bg-slate-100 text-slate-950 dark:bg-slate-950 dark:text-slate-100">
    <x-ui.toast />
    <div class="flex min-h-screen">
        <aside class="fixed inset-y-0 left-0 z-40 flex flex-col border-r border-slate-200 bg-white/90 backdrop-blur-xl transition-all duration-300 dark:border-slate-800 dark:bg-slate-900/90" :class="collapsed ? 'w-20' : 'w-72'">
            <div class="flex h-16 items-center justify-between px-5">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 overflow-hidden">
                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-2xl bg-slate-950 text-sm font-bold text-white dark:bg-white dark:text-slate-950">RT</span>
                    <span class="whitespace-nowrap text-sm font-semibold" x-show="!collapsed">Admin Console</span>
                </a>
                <button type="button" x-on:click="collapsed = !collapsed" class="grid h-9 w-9 place-items-center rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800">
                    <i data-lucide="panel-left-close" class="h-4 w-4"></i>
                </button>
            </div>
            <nav class="flex-1 space-y-2 px-3 py-5 text-sm font-medium">
                @foreach([
                    ['route' => 'admin.dashboard', 'icon' => 'layout-dashboard', 'label' => 'Dashboard'],
                    ['route' => 'admin.products.index', 'icon' => 'package', 'label' => 'Ürünler'],
                    ['route' => 'admin.categories.index', 'icon' => 'folders', 'label' => 'Kategoriler'],
                    ['route' => 'admin.orders.index', 'icon' => 'receipt', 'label' => 'Siparişler'],
                ] as $item)
                    <a href="{{ route($item['route']) }}" class="flex items-center gap-3 rounded-2xl px-3 py-3 text-slate-600 transition hover:bg-slate-100 hover:text-slate-950 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                        <i data-lucide="{{ $item['icon'] }}" class="h-5 w-5 shrink-0"></i>
                        <span x-show="!collapsed" class="whitespace-nowrap">{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </nav>
        </aside>
        <div class="flex min-h-screen flex-1 flex-col transition-all duration-300" :class="collapsed ? 'pl-20' : 'pl-72'">
            <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/80 backdrop-blur-xl dark:border-slate-800 dark:bg-slate-950/80">
                <div class="flex h-16 items-center justify-between px-6">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-slate-500">Enterprise Commerce</p>
                        <h1 class="text-lg font-semibold">{{ $heading ?? 'Dashboard' }}</h1>
                    </div>
                    <div class="flex items-center gap-3">
                        <button type="button" x-on:click="dark = !dark" class="grid h-10 w-10 place-items-center rounded-xl border border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-900">
                            <i data-lucide="moon" class="h-4 w-4"></i>
                        </button>
                        <a href="{{ route('products.index') }}" class="grid h-10 w-10 place-items-center rounded-xl border border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-900">
                            <i data-lucide="store" class="h-4 w-4"></i>
                        </a>
                    </div>
                </div>
            </header>
            <main class="flex-1 px-6 py-8">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
