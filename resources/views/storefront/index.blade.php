<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'ERP E-Ticaret') }} - Yeni Nesil Alışveriş</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hover-trigger .hover-target { display: none; }
        .hover-trigger:hover .hover-target { display: block; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased selection:bg-rose-500 selection:text-white">

    <!-- TOP BAR -->
    <header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 sm:h-20">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ route('storefront.index') }}" class="text-2xl font-bold tracking-tight text-gray-900 group">
                        ERP <span class="text-rose-600 transition-colors group-hover:text-rose-500">Store</span>
                    </a>
                </div>

                <!-- Search Bar (Desktop) -->
                <div class="hidden sm:block flex-1 max-w-2xl mx-8">
                    <div class="relative">
                        <input type="text" class="w-full bg-gray-100 border-transparent text-gray-900 text-sm rounded-full focus:ring-rose-500 focus:border-rose-500 block p-3 pl-10 transition-all focus:bg-white focus:shadow-md outline-none" placeholder="Ürün ara... (Örn: Kulaklık)">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Icons -->
                <div class="flex items-center space-x-6">
                    <a href="{{ route('cart.index') }}" class="relative text-gray-600 hover:text-rose-600 transition-colors flex items-center group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        @php $cartCount = is_array(session('cart')) ? array_sum(array_column(session('cart'), 'quantity')) : 0; @endphp
                        @if($cartCount > 0)
                            <span class="absolute -top-1 -right-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/4 -translate-y-1/4 bg-rose-600 rounded-full border-2 border-white shadow-sm">{{ $cartCount }}</span>
                        @endif
                    </a>
                </div>
            </div>
            
            <!-- Search Bar (Mobile) -->
            <div class="sm:hidden pb-4">
                <div class="relative">
                    <input type="text" class="w-full bg-gray-100 border-transparent text-gray-900 text-sm rounded-full focus:ring-rose-500 focus:border-rose-500 block p-2.5 pl-10 outline-none" placeholder="Ürün ara...">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- HERO BANNER -->
        <div class="relative bg-gray-900 overflow-hidden">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Hero background" class="w-full h-full object-cover opacity-30">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/80 to-transparent"></div>
            </div>
            <div class="relative max-w-7xl mx-auto py-20 px-4 sm:py-28 sm:px-6 lg:px-8">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl mb-4">
                    Yeni Sezon <br class="hidden sm:block"> <span class="text-rose-500">Büyük İndirim</span>
                </h1>
                <p class="mt-4 max-w-xl text-lg sm:text-xl text-gray-300 mb-8">
                    Seçili ürünlerde %50'ye varan indirimleri kaçırmayın. Hayalinizdeki ürünlere şimdi çok daha yakınsınız.
                </p>
                <a href="#products" class="inline-block bg-rose-600 border border-transparent rounded-full py-3 px-8 text-base font-medium text-white hover:bg-rose-700 shadow-lg hover:shadow-rose-500/30 transition-all hover:-translate-y-1">
                    Alışverişe Başla
                </a>
            </div>
        </div>

        <!-- CATEGORY STRIP -->
        <div class="border-b border-gray-200 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex space-x-8 overflow-x-auto py-4 scrollbar-hide items-center justify-start sm:justify-center">
                    <a href="#" class="text-sm font-medium text-gray-900 border-b-2 border-rose-600 pb-1 whitespace-nowrap px-2">Tüm Ürünler</a>
                    <a href="#" class="text-sm font-medium text-gray-500 hover:text-rose-600 hover:border-b-2 hover:border-rose-300 pb-1 whitespace-nowrap transition-colors px-2">Elektronik</a>
                    <a href="#" class="text-sm font-medium text-gray-500 hover:text-rose-600 hover:border-b-2 hover:border-rose-300 pb-1 whitespace-nowrap transition-colors px-2">Giyim</a>
                    <a href="#" class="text-sm font-medium text-gray-500 hover:text-rose-600 hover:border-b-2 hover:border-rose-300 pb-1 whitespace-nowrap transition-colors px-2">Ev & Yaşam</a>
                    <a href="#" class="text-sm font-medium text-gray-500 hover:text-rose-600 hover:border-b-2 hover:border-rose-300 pb-1 whitespace-nowrap transition-colors px-2">Spor</a>
                </div>
            </div>
        </div>

        <!-- PRODUCT GRID -->
        <div id="products" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
            <div class="flex justify-between items-baseline mb-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Sizin İçin Seçtiklerimiz</h2>
                <a href="#" class="text-sm font-medium text-rose-600 hover:text-rose-500">Hepsini Gör <span aria-hidden="true">&rarr;</span></a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-10 gap-x-6 xl:gap-x-8">
                @foreach($products as $product)
                    <div class="group relative bg-white rounded-2xl shadow-sm border border-gray-100 p-3 hover:shadow-xl transition-all duration-300 flex flex-col hover:-translate-y-1 hover-trigger">
                        
                        <!-- Image Container -->
                        <div class="relative w-full aspect-square bg-gray-50 rounded-xl overflow-hidden mb-4">
                            <a href="{{ route('storefront.show', $product->slug) }}">
                                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/600x600.png?text=Görsel+Yok' }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-center object-cover group-hover:scale-105 transition-transform duration-500"
                                     onerror="this.src='https://via.placeholder.com/600x600.png?text=Görsel+Bulunamadı'">
                            </a>
                            
                            <!-- Badges -->
                            <div class="absolute top-2 left-2 flex flex-col gap-2">
                                <span class="bg-rose-500 text-white text-xs font-bold px-2 py-1 rounded-md shadow-sm">YENİ</span>
                            </div>

                            <!-- Quick Add Button (UI only, trigger hover) -->
                            <div class="absolute inset-x-0 bottom-0 p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover-target">
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="w-full bg-white/90 backdrop-blur text-gray-900 text-sm font-semibold py-2.5 rounded-lg shadow-lg hover:bg-rose-600 hover:text-white transition-colors flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Hızlı Ekle
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Content Container -->
                        <div class="flex-1 flex flex-col px-2 pb-2">
                            <div class="flex justify-between items-start">
                                <h3 class="text-sm font-medium text-gray-900 truncate pr-4">
                                    <a href="{{ route('storefront.show', $product->slug) }}">
                                        <span aria-hidden="true" class="absolute inset-0 z-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <!-- Rating -->
                                <div class="flex items-center space-x-1 shrink-0 z-10 relative">
                                    <svg class="text-yellow-400 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <span class="text-xs font-medium text-gray-500">4.8</span>
                                </div>
                            </div>
                            
                            <!-- Category (Mock) -->
                            <p class="mt-1 text-xs text-gray-500">Elektronik</p>

                            <!-- Price -->
                            <div class="mt-auto pt-3 flex items-center justify-between z-10 relative">
                                <div class="flex items-baseline space-x-2">
                                    <span class="text-lg font-bold text-gray-900">₺{{ number_format($product->price, 2, ',', '.') }}</span>
                                    <span class="text-xs text-gray-400 line-through">₺{{ number_format($product->price * 1.2, 2, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Container -->
            <div class="mt-12">
                {{ $products->links() }}
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 border-t border-gray-800 mt-16">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <span class="text-2xl font-bold tracking-tight text-white">
                        ERP <span class="text-rose-500">Store</span>
                    </span>
                    <p class="mt-4 text-gray-400 text-sm max-w-sm">
                        En yeni ürünler, en uygun fiyatlar ve güvenilir alışveriş deneyimi için doğru adrestesiniz. Modern e-ticaret altyapısı ile hizmetinizdeyiz.
                    </p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase mb-4">Hızlı Menü</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Hakkımızda</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">İletişim</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Sıkça Sorulan Sorular</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase mb-4">Müşteri Hizmetleri</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Kargo ve Teslimat</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">İade Politikası</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Gizlilik Sözleşmesi</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-base text-gray-400 xl:text-center">
                    &copy; 2026 ERP Store. Tüm hakları saklıdır.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>
