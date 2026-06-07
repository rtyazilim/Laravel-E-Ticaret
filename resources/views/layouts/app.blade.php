<!doctype html>
<html lang="tr" x-data="{ dark: localStorage.theme === 'dark' }" x-init="$watch('dark', v => localStorage.theme = v ? 'dark' : 'light')" :class="{ 'dark': dark }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name') }}</title>
    @php($manifest = public_path('build/manifest.json'))
    @if(file_exists($manifest))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script>
            tailwind = { config: { darkMode: 'class', theme: { extend: { boxShadow: { soft: '0 18px 50px rgba(15, 23, 42, .10)', lift: '0 20px 65px rgba(15, 23, 42, .16)' }, colors: { brand: { 500: '#2563eb', 600: '#1d4ed8', 700: '#1e40af' }, mint: '#10b981', coral: '#f97316' } } } } };
        </script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://unpkg.com/lucide@latest"></script>
        <script defer>document.addEventListener('DOMContentLoaded', () => window.lucide?.createIcons())</script>
    @endif
</head>
<body class="min-h-screen bg-slate-50 text-slate-950 dark:bg-slate-950 dark:text-slate-100">
    <x-ui.toast />
    <header class="sticky top-0 z-40 border-b border-slate-200/70 bg-white/85 backdrop-blur-xl dark:border-slate-800 dark:bg-slate-950/80">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('products.index') }}" class="flex items-center gap-3">
                <span class="grid h-10 w-10 place-items-center rounded-2xl bg-slate-950 text-white shadow-soft dark:bg-white dark:text-slate-950">RT</span>
                <span class="text-sm font-semibold tracking-wide">Commerce</span>
            </a>
            <nav class="hidden items-center gap-6 text-sm font-medium text-slate-600 dark:text-slate-300 md:flex">
                <a class="transition hover:text-slate-950 dark:hover:text-white" href="{{ route('products.index') }}">Ürünler</a>
                <a class="transition hover:text-slate-950 dark:hover:text-white" href="{{ route('cart.show') }}">Sepet</a>
                @auth
                    <a class="transition hover:text-slate-950 dark:hover:text-white" href="{{ route('orders.index') }}">Siparişler</a>
                    @if(in_array(auth()->user()->role instanceof UnitEnum ? auth()->user()->role->value : auth()->user()->role, ['admin', 'manager'], true))
                        <a class="transition hover:text-slate-950 dark:hover:text-white" href="{{ route('admin.dashboard') }}">Admin</a>
                    @endif
                @endauth
            </nav>
            <div class="flex items-center gap-2">
                <button type="button" x-on:click="dark = !dark" class="grid h-10 w-10 place-items-center rounded-xl border border-slate-200 bg-white transition hover:bg-slate-100 dark:border-slate-800 dark:bg-slate-900 dark:hover:bg-slate-800">
                    <i data-lucide="moon" class="h-4 w-4"></i>
                </button>
                @guest
                    <x-ui.button href="{{ route('login') }}" variant="ghost">Giriş</x-ui.button>
                    <x-ui.button href="{{ route('register') }}">Kayıt</x-ui.button>
                @else
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-ui.button type="submit" variant="secondary">Çıkış</x-ui.button>
                    </form>
                @endguest
            </div>
        </div>
    </header>
    <main>
        {{ $slot }}
    </main>
</body>
</html>
