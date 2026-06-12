<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Hesabım') - RT Yazılım</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .account-link { transition: all 0.15s ease; }
        .account-link.active { color: #e11d48; border-left-color: #e11d48; background-color: #fff1f2; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

<div class="min-h-screen flex flex-col">
    <!-- Top bar -->
    <header class="bg-white border-b border-gray-100 sticky top-0 z-30">
        <div class="max-w-6xl mx-auto px-4 h-14 flex items-center justify-between">
            <a href="{{ route('storefront.index') }}" class="text-base font-bold text-gray-900 tracking-tight">
                RT Yazılım
            </a>
            <div class="flex items-center gap-4 text-sm text-gray-600">
                <span>{{ auth()->user()->name }}</span>
                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-rose-600 hover:text-rose-700 font-medium">Çıkış</button>
                </form>
            </div>
        </div>
    </header>

    <div class="flex-1 max-w-6xl mx-auto w-full px-4 py-8 flex gap-8">
        <!-- Sidebar -->
        <aside class="w-56 shrink-0">
            <nav class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="px-4 py-5 border-b border-gray-50">
                    <div class="w-10 h-10 rounded-full bg-rose-100 flex items-center justify-center text-rose-600 font-bold text-base mb-2">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>
                    <p class="font-semibold text-gray-900 text-sm">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-400">{{ auth()->user()->email }}</p>
                </div>
                <div class="p-2 space-y-0.5">
                    <a href="{{ route('account.dashboard') }}"
                       class="account-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-600 border-l-2 border-transparent {{ request()->routeIs('account.dashboard') ? 'active' : 'hover:bg-gray-50' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Hesabım
                    </a>
                    <a href="{{ route('account.orders') }}"
                       class="account-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-600 border-l-2 border-transparent {{ request()->routeIs('account.orders*') ? 'active' : 'hover:bg-gray-50' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        Siparişlerim
                    </a>
                    <a href="{{ route('account.profile') }}"
                       class="account-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-600 border-l-2 border-transparent {{ request()->routeIs('account.profile') ? 'active' : 'hover:bg-gray-50' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Profilim
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 min-w-0">
            @if(session('success'))
                <div class="mb-4 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-4 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm">
                    {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
