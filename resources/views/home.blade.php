<x-layouts.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 pb-6 border-b border-slate-200 dark:border-slate-800">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">E-Ticaret Mağazamıza Hoş Geldiniz</h1>
                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">En güncel ve seçkin ürünlerimizi keşfedin.</p>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            <!-- Categories Sidebar -->
            <div class="hidden md:block w-64 shrink-0">
                <div class="space-y-8">
                    <div>
                        <h3 class="text-sm font-semibold text-slate-900 dark:text-white uppercase tracking-wider mb-4">Kategoriler</h3>
                        <div class="space-y-3">
                            @forelse($categories as $category)
                            <div class="flex items-center">
                                <a href="#" class="text-sm text-slate-600 dark:text-slate-400 hover:text-brand-600 dark:hover:text-brand-400 transition">
                                    {{ $category->name ?? 'Kategori ' . $category->id }}
                                </a>
                            </div>
                            @empty
                            <p class="text-sm text-slate-500">Kategori bulunamadı.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="flex-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
                    @forelse($products as $product)
                    <div class="group relative flex flex-col bg-white dark:bg-slate-800 rounded-2xl border border-slate-100 dark:border-slate-700 overflow-hidden shadow-sm hover:shadow-lift transition-all duration-300">
                        <div class="relative aspect-[4/3] bg-slate-100 dark:bg-slate-900 overflow-hidden flex items-center justify-center">
                            @if($product->images && $product->images->count() > 0)
                                <img src="{{ $product->images->first()->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                            @else
                                <span class="text-slate-400">Görsel Yok</span>
                            @endif
                        </div>
                        <div class="p-5 flex flex-col flex-1">
                            <h3 class="text-base font-bold text-slate-900 dark:text-white">
                                <a href="{{ url('/product/'.$product->slug) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400 line-clamp-2">{{ $product->description }}</p>
                            
                            <div class="mt-auto pt-4 flex items-center justify-between z-10 relative">
                                <div class="flex items-center space-x-2">
                                    <span class="text-lg font-extrabold text-slate-900 dark:text-white">{{ number_format($product->price, 2) }} TL</span>
                                </div>
                                <button type="button" @click="$dispatch('notify', {message: 'Sepete eklendi!', type: 'success'})" class="w-10 h-10 rounded-full bg-slate-100 text-slate-900 flex items-center justify-center hover:bg-brand-600 hover:text-white transition-colors dark:bg-slate-700 dark:text-white dark:hover:bg-brand-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-12 text-center">
                        <p class="text-slate-500 dark:text-slate-400">Henüz ürün eklenmemiş.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
