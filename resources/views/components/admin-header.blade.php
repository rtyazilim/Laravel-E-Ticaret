<header class="bg-white dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 h-16 flex items-center justify-between px-6 sticky top-0 z-30">
    <div class="flex items-center">
        <button @click="sidebarOpen = !sidebarOpen" class="text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
        </button>
    </div>
    <div class="flex items-center space-x-4">
        <!-- Dark mode toggle -->
        <button onclick="document.documentElement.classList.toggle('dark')" class="text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200">
            <svg class="w-5 h-5 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
            <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        </button>
        
        <!-- Profile dropdown -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                <img class="h-8 w-8 rounded-full border border-slate-200 dark:border-slate-700" src="https://ui-avatars.com/api/?name=Admin&color=2563eb&background=d9ebff" alt="Admin">
            </button>
            <div x-show="open" @click.away="open = false" style="display: none;" class="absolute right-0 mt-2 w-48 bg-white dark:bg-slate-800 rounded-xl shadow-lift border border-slate-100 dark:border-slate-700 py-1">
                <a href="{{ url('/') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 dark:text-slate-300 dark:hover:bg-slate-700">View Store</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-slate-700">Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>
