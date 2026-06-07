<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 dark:bg-slate-900 flex items-center justify-center min-h-screen font-sans">
    
    <div class="w-full max-w-md px-4 sm:px-0">
        <div class="text-center mb-8">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 justify-center">
                <svg class="h-10 w-10 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">StoreFront</span>
            </a>
            <h2 class="mt-6 text-3xl font-extrabold text-slate-900 dark:text-white">Welcome back</h2>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">
                Don't have an account? 
                <a href="{{ route('register') }}" class="font-medium text-brand-600 hover:text-brand-500 transition-colors">Sign up for free</a>
            </p>
        </div>

        <x-card padding="p-8">
            <form method="POST" action="{{ route('login') }}" x-data="{ loading: false }" @submit="loading = true">
                @csrf

                <div class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Email address</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <x-input id="email" type="email" name="email" :value="old('email')" required autofocus class="pl-10" placeholder="you@example.com" />
                        </div>
                        @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Password</label>
                            <a href="#" class="text-sm font-medium text-brand-600 hover:text-brand-500">Forgot password?</a>
                        </div>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <x-input id="password" type="password" name="password" required class="pl-10" placeholder="••••••••" />
                        </div>
                        @error('password') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-brand-600 focus:ring-brand-500 border-slate-300 rounded dark:bg-slate-800 dark:border-slate-600">
                        <label for="remember_me" class="ml-2 block text-sm text-slate-900 dark:text-slate-300">
                            Remember me
                        </label>
                    </div>

                    <div>
                        <x-button type="submit" variant="primary" class="w-full flex justify-center py-3" ::disabled="loading">
                            <span x-show="!loading">Sign in</span>
                            <span x-show="loading" class="flex items-center" style="display: none;">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Signing in...
                            </span>
                        </x-button>
                    </div>
                </div>
            </form>
        </x-card>
    </div>
</body>
</html>
