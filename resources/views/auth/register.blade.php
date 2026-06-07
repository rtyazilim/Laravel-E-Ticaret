<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 dark:bg-slate-900 flex h-screen font-sans overflow-hidden">
    
    <!-- Left Form Section -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 overflow-y-auto">
        <div class="w-full max-w-md">
            <div class="mb-10">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2">
                    <svg class="h-8 w-8 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="text-xl font-bold tracking-tight text-slate-900 dark:text-white">StoreFront</span>
                </a>
                <h2 class="mt-6 text-3xl font-extrabold text-slate-900 dark:text-white">Create an account</h2>
                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-medium text-brand-600 hover:text-brand-500">Sign in instead</a>
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" x-data="{ loading: false }" @submit="loading = true">
                @csrf

                <div class="space-y-5">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Full Name</label>
                        <div class="mt-1 relative">
                            <x-input id="name" type="text" name="name" :value="old('name')" required autofocus placeholder="John Doe" />
                        </div>
                        @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Email address</label>
                        <div class="mt-1 relative">
                            <x-input id="email" type="email" name="email" :value="old('email')" required placeholder="you@example.com" />
                        </div>
                        @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Password</label>
                        <div class="mt-1 relative">
                            <x-input id="password" type="password" name="password" required placeholder="••••••••" />
                        </div>
                        @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Confirm Password</label>
                        <div class="mt-1 relative">
                            <x-input id="password_confirmation" type="password" name="password_confirmation" required placeholder="••••••••" />
                        </div>
                    </div>

                    <div class="pt-2">
                        <x-button type="submit" variant="primary" class="w-full flex justify-center py-3 text-base" ::disabled="loading">
                            <span x-show="!loading">Create Account</span>
                            <span x-show="loading" class="flex items-center" style="display: none;">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                Creating...
                            </span>
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Right Image Section -->
    <div class="hidden lg:block lg:w-1/2 relative bg-slate-900">
        <div class="absolute inset-0 bg-gradient-to-t from-brand-900/80 to-slate-900/20 z-10"></div>
        <img src="https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="E-commerce shopping" class="absolute inset-0 w-full h-full object-cover">
        
        <div class="absolute inset-0 z-20 flex flex-col justify-end p-16">
            <h3 class="text-4xl font-bold text-white mb-4">Start selling today.</h3>
            <p class="text-xl text-slate-200 mb-8 max-w-lg">Join thousands of businesses who have successfully launched their online stores with our enterprise platform.</p>
            
            <div class="flex items-center space-x-4">
                <div class="flex -space-x-3">
                    <img class="w-10 h-10 rounded-full border-2 border-slate-900" src="https://i.pravatar.cc/100?img=1" alt="Avatar">
                    <img class="w-10 h-10 rounded-full border-2 border-slate-900" src="https://i.pravatar.cc/100?img=2" alt="Avatar">
                    <img class="w-10 h-10 rounded-full border-2 border-slate-900" src="https://i.pravatar.cc/100?img=3" alt="Avatar">
                </div>
                <p class="text-sm text-slate-300">Trusted by over 10,000+ merchants.</p>
            </div>
        </div>
    </div>
</body>
</html>
