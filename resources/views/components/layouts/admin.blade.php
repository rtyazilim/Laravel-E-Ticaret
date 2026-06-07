<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - {{ config('app.name', 'E-Commerce') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen flex font-sans dark:bg-slate-900 dark:text-slate-100 overflow-hidden" x-data="{ sidebarOpen: true }">
    <x-toast-notification />
    
    <x-admin-sidebar />

    <div class="flex-1 flex flex-col h-screen overflow-hidden transition-all duration-300">
        <x-admin-header />

        <main class="flex-1 overflow-y-auto p-6 bg-slate-50 dark:bg-slate-900">
            <div class="max-w-7xl mx-auto">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
