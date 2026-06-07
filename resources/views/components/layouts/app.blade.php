<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Commerce') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>
<body class="bg-brand-50 text-ink min-h-screen flex flex-col font-sans transition-colors duration-300 dark:bg-slate-900 dark:text-slate-100">
    <x-toast-notification />
    <x-header />

    <main class="flex-grow w-full">
        {{ $slot }}
    </main>

    <x-footer />
</body>
</html>
