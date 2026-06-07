<header class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 sticky top-0 z-40 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <svg class="h-8 w-8 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="text-xl font-bold tracking-tight text-slate-900 dark:text-white">StoreFront</span>
                </a>
                
                <nav class="hidden md:flex ml-10 space-x-8">
                    <a href="{{ url('/products') }}" class="text-slate-600 hover:text-brand-600 dark:text-slate-300 dark:hover:text-brand-400 font-medium transition-colors">Products</a>
                    <a href="#" class="text-slate-600 hover:text-brand-600 dark:text-slate-300 dark:hover:text-brand-400 font-medium transition-colors">Categories</a>
                </nav>
            </div>

            <div class="flex items-center space-x-6">
                <!-- Cart Icon -->
                <a href="{{ url('/cart') }}" class="relative text-slate-600 hover:text-brand-600 dark:text-slate-300 dark:hover:text-brand-400 transition-colors">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="absolute -top-1 -right-2 bg-brand-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">3</span>
                </a>

                @auth
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                            <div class="h-8 w-8 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center font-bold">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                        </button>
                        
                        <div x-show="open" @click.away="open = false" style="display: none;" class="absolute right-0 mt-2 w-48 bg-white dark:bg-slate-800 rounded-xl shadow-lift border border-slate-100 dark:border-slate-700 py-1">
                            <a href="{{ url('/orders') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 dark:text-slate-300 dark:hover:bg-slate-700">My Orders</a>
                            @if(auth()->user()->is_admin ?? true)
                                <a href="{{ url('/admin') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 dark:text-slate-300 dark:hover:bg-slate-700">Dashboard</a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-slate-700">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-slate-600 hover:text-brand-600 dark:text-slate-300 font-medium">Log in</a>
                    <a href="{{ route('register') }}" class="hidden sm:inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-brand-600 hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500">Sign up</a>
                @endauth
            </div>
        </div>
    </div>
</header>
