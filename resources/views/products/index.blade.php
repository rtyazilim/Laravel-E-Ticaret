<x-layouts.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header & Filters -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 pb-6 border-b border-slate-200 dark:border-slate-800">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">All Products</h1>
                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Showing 1-12 of 48 products</p>
            </div>
            
            <div class="mt-6 md:mt-0 flex items-center space-x-4">
                <div class="relative">
                    <select class="block w-full pl-3 pr-10 py-2 text-base border-slate-300 focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm rounded-lg dark:bg-slate-800 dark:border-slate-700 dark:text-slate-200">
                        <option>Sort by: Featured</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest Arrivals</option>
                    </select>
                </div>
                
                <button class="md:hidden inline-flex items-center p-2 border border-slate-300 rounded-lg text-slate-400 hover:text-slate-500 dark:border-slate-700">
                    <span class="sr-only">Filters</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                </button>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sidebar Filters (Desktop) -->
            <div class="hidden md:block w-64 shrink-0">
                <div class="space-y-8">
                    <!-- Categories -->
                    <div>
                        <h3 class="text-sm font-semibold text-slate-900 dark:text-white uppercase tracking-wider mb-4">Categories</h3>
                        <div class="space-y-3">
                            @foreach(['Electronics', 'Clothing', 'Home & Kitchen', 'Sports', 'Books'] as $category)
                            <div class="flex items-center">
                                <input id="cat-{{ $loop->index }}" name="category[]" value="{{ $category }}" type="checkbox" class="h-4 w-4 border-slate-300 rounded text-brand-600 focus:ring-brand-500 dark:bg-slate-800 dark:border-slate-600">
                                <label for="cat-{{ $loop->index }}" class="ml-3 text-sm text-slate-600 dark:text-slate-400">{{ $category }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price Range -->
                    <div>
                        <h3 class="text-sm font-semibold text-slate-900 dark:text-white uppercase tracking-wider mb-4">Price Range</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="min-price" class="sr-only">Min Price</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><span class="text-slate-500 sm:text-sm">$</span></div>
                                    <x-input type="text" id="min-price" placeholder="Min" class="pl-7" />
                                </div>
                            </div>
                            <div>
                                <label for="max-price" class="sr-only">Max Price</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><span class="text-slate-500 sm:text-sm">$</span></div>
                                    <x-input type="text" id="max-price" placeholder="Max" class="pl-7" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="flex-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
                    @foreach([1,2,3,4,5,6,7,8,9] as $i)
                    <div class="group relative flex flex-col bg-white dark:bg-slate-800 rounded-2xl border border-slate-100 dark:border-slate-700 overflow-hidden shadow-sm hover:shadow-lift transition-all duration-300">
                        <div class="relative aspect-[4/3] bg-slate-100 dark:bg-slate-900 overflow-hidden">
                            <img src="https://picsum.photos/seed/product{{$i}}/600/450" alt="Product Image" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                            
                            @if($i % 3 == 0)
                                <div class="absolute top-3 left-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-white text-slate-900 shadow-sm">New</span>
                                </div>
                            @elseif($i % 4 == 0)
                                <div class="absolute top-3 left-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-600 text-white shadow-sm">-20%</span>
                                </div>
                            @endif

                            <div class="absolute inset-0 bg-slate-900/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                                <button class="w-10 h-10 rounded-full bg-white text-slate-900 flex items-center justify-center hover:bg-brand-600 hover:text-white transition-colors shadow-sm transform translate-y-4 group-hover:translate-y-0 duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </button>
                                <button class="w-10 h-10 rounded-full bg-white text-slate-900 flex items-center justify-center hover:bg-brand-600 hover:text-white transition-colors shadow-sm transform translate-y-4 group-hover:translate-y-0 duration-300 delay-75">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-5 flex flex-col flex-1">
                            <h3 class="text-base font-bold text-slate-900 dark:text-white">
                                <a href="{{ url('/product/sample-slug-'.$i) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    Premium Sample Product {{ $i }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400 line-clamp-2">This is a short description of the premium sample product that looks great.</p>
                            
                            <div class="mt-auto pt-4 flex items-center justify-between z-10 relative">
                                <div class="flex items-center space-x-2">
                                    @if($i % 4 == 0)
                                        <span class="text-sm font-medium text-slate-400 line-through">${{ number_format(199.99 * $i * 1.2, 2) }}</span>
                                    @endif
                                    <span class="text-lg font-extrabold text-slate-900 dark:text-white">${{ number_format(199.99 * $i, 2) }}</span>
                                </div>
                                <button type="button" @click="$dispatch('notify', {message: 'Added to cart!', type: 'success'})" class="w-10 h-10 rounded-full bg-slate-100 text-slate-900 flex items-center justify-center hover:bg-brand-600 hover:text-white transition-colors dark:bg-slate-700 dark:text-white dark:hover:bg-brand-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination (Mock) -->
                <div class="mt-12 flex justify-center">
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-slate-300 bg-white text-sm font-medium text-slate-500 hover:bg-slate-50 dark:bg-slate-800 dark:border-slate-700 dark:text-slate-400 dark:hover:bg-slate-700">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                        </a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:bg-slate-50 dark:bg-slate-800 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-700">1</a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-brand-500 bg-brand-50 text-sm font-medium text-brand-600 dark:bg-brand-900/30 dark:border-brand-500 dark:text-brand-400 z-10">2</a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:bg-slate-50 dark:bg-slate-800 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-700">3</a>
                        <span class="relative inline-flex items-center px-4 py-2 border border-slate-300 bg-white text-sm font-medium text-slate-700 dark:bg-slate-800 dark:border-slate-700 dark:text-slate-400">...</span>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:bg-slate-50 dark:bg-slate-800 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-700">8</a>
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-slate-300 bg-white text-sm font-medium text-slate-500 hover:bg-slate-50 dark:bg-slate-800 dark:border-slate-700 dark:text-slate-400 dark:hover:bg-slate-700">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
