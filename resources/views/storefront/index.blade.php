<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'ERP E-Ticaret') }} - Yeni Nesil Alışveriş</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: { primary: '#f43f5e' }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hover-trigger .hover-target { opacity: 0; visibility: hidden; transition: all 0.3s ease; }
        .hover-trigger:hover .hover-target { opacity: 1; visibility: visible; }
        .glass { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255,255,255,0.3); }
        .hide-scroll::-webkit-scrollbar { display: none; }
        .hide-scroll { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#f8f9fa] text-gray-800 antialiased selection:bg-rose-500 selection:text-white">

    <!-- TOP BAR (GLASSMORPHISM & STICKY) -->
    <header class="glass shadow-sm sticky top-0 z-50 transition-all duration-300" id="header">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ route('storefront.index') }}" class="text-3xl font-extrabold tracking-tight text-gray-900 group flex items-center gap-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-rose-500 to-orange-400 rounded-xl flex items-center justify-center text-white shadow-lg shadow-rose-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-gray-900 to-gray-600">ERP<span class="text-rose-600">Store</span></span>
                    </a>
                </div>

                <!-- FULL SEARCH BAR -->
                <div class="hidden sm:block flex-1 max-w-3xl mx-12">
                    <div class="relative group">
                        <input type="text" class="w-full bg-gray-100/80 border border-gray-200 text-gray-900 text-base rounded-2xl focus:ring-4 focus:ring-rose-500/20 focus:border-rose-500 block p-3.5 pl-12 transition-all duration-300 focus:bg-white focus:shadow-lg outline-none" placeholder="Milyonlarca ürün, marka ve kategori ara...">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400 group-focus-within:text-rose-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <button class="absolute inset-y-2 right-2 bg-rose-600 hover:bg-rose-700 text-white px-6 rounded-xl font-medium transition-colors shadow-md">Ara</button>
                    </div>
                </div>

                <!-- Icons & User Actions -->
                <div class="flex items-center space-x-6">
                    <a href="#" class="hidden md:flex flex-col items-center justify-center text-gray-600 hover:text-rose-600 transition-colors group">
                        <svg class="w-6 h-6 mb-1 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="text-[11px] font-semibold tracking-wide">Giriş Yap</span>
                    </a>
                    <a href="#" class="hidden md:flex flex-col items-center justify-center text-gray-600 hover:text-rose-600 transition-colors group">
                        <svg class="w-6 h-6 mb-1 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        <span class="text-[11px] font-semibold tracking-wide">Favorilerim</span>
                    </a>
                    <div class="w-px h-8 bg-gray-200 hidden md:block"></div>
                    <a href="{{ route('cart.index') }}" class="relative flex flex-col items-center justify-center text-gray-600 hover:text-rose-600 transition-colors group">
                        <div class="relative">
                            <svg class="w-7 h-7 mb-1 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            @php $cartCount = is_array(session('cart')) ? array_sum(array_column(session('cart'), 'quantity')) : 0; @endphp
                            @if($cartCount > 0)
                                <span class="absolute -top-2 -right-3 flex h-5 w-5">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-5 w-5 bg-rose-600 text-white text-[10px] font-bold items-center justify-center border-2 border-white">{{ $cartCount }}</span>
                                </span>
                            @endif
                        </div>
                        <span class="text-[11px] font-semibold tracking-wide">Sepetim</span>
                    </a>
                </div>
            </div>
            
            <!-- Mobile Search -->
            <div class="sm:hidden pb-4">
                <div class="relative group">
                    <input type="text" class="w-full bg-gray-100 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-rose-500 focus:border-rose-500 block p-3 pl-10 outline-none" placeholder="Ürün ara...">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="pb-20">
        <!-- HERO SECTION -->
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="relative rounded-[2rem] overflow-hidden shadow-2xl bg-gradient-to-br from-rose-600 via-rose-500 to-orange-500 group">
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-orange-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
                
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
                
                <div class="relative flex flex-col md:flex-row items-center justify-between p-10 md:p-16 lg:p-20 z-10">
                    <div class="max-w-2xl text-center md:text-left">
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/20 backdrop-blur-md border border-white/30 text-white text-sm font-semibold mb-6 shadow-sm">
                            <span class="flex h-2 w-2 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
                            </span>
                            Bahar Fırsatları Başladı
                        </div>
                        <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white leading-tight mb-6 tracking-tight">
                            En Yeni Ürünler,<br/> <span class="text-rose-100 drop-shadow-md">En İyi Fiyatlar</span>
                        </h1>
                        <p class="text-lg md:text-xl text-rose-50 mb-10 opacity-90 max-w-lg leading-relaxed">
                            Milyonlarca ürün ve güvenilir satıcılar ERP Store'da. Şimdi alışverişe başla, ücretsiz kargo ve iade avantajını yakala.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                            <a href="#products" class="bg-white text-rose-600 px-8 py-4 rounded-2xl font-bold text-lg shadow-[0_8px_30px_rgb(0,0,0,0.12)] hover:shadow-[0_8px_30px_rgb(255,255,255,0.3)] transition-all hover:-translate-y-1 flex items-center justify-center gap-2">
                                Şimdi Alışverişe Başla
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                            <a href="#" class="bg-rose-700/50 backdrop-blur-sm border border-rose-400/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-rose-700 transition-all flex items-center justify-center">
                                Kampanyaları Gör
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:block w-1/2 relative">
                        <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Shopping" class="w-full h-[400px] object-cover rounded-3xl shadow-2xl transform rotate-2 group-hover:rotate-0 transition-transform duration-700 border-4 border-white/20">
                    </div>
                </div>
            </div>
        </div>

        <!-- CATEGORY STRIP -->
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 mt-10">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Popüler Kategoriler</h2>
            <div class="flex space-x-4 sm:space-x-6 overflow-x-auto hide-scroll pb-4">
                <a href="#" class="flex flex-col items-center gap-3 group min-w-[100px]">
                    <div class="w-20 h-20 rounded-full bg-white shadow-sm border border-gray-100 flex items-center justify-center group-hover:shadow-md group-hover:scale-110 group-hover:border-rose-200 transition-all duration-300 relative overflow-hidden">
                        <div class="absolute inset-0 bg-rose-50 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="https://cdn-icons-png.flaticon.com/512/3437/3437967.png" class="w-10 h-10 object-contain z-10" alt="Elektronik">
                    </div>
                    <span class="text-sm font-semibold text-gray-700 group-hover:text-rose-600 transition-colors">Elektronik</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-3 group min-w-[100px]">
                    <div class="w-20 h-20 rounded-full bg-white shadow-sm border border-gray-100 flex items-center justify-center group-hover:shadow-md group-hover:scale-110 group-hover:border-rose-200 transition-all duration-300 relative overflow-hidden">
                        <div class="absolute inset-0 bg-rose-50 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="https://cdn-icons-png.flaticon.com/512/3159/3159614.png" class="w-10 h-10 object-contain z-10" alt="Giyim">
                    </div>
                    <span class="text-sm font-semibold text-gray-700 group-hover:text-rose-600 transition-colors">Giyim</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-3 group min-w-[100px]">
                    <div class="w-20 h-20 rounded-full bg-white shadow-sm border border-gray-100 flex items-center justify-center group-hover:shadow-md group-hover:scale-110 group-hover:border-rose-200 transition-all duration-300 relative overflow-hidden">
                        <div class="absolute inset-0 bg-rose-50 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="https://cdn-icons-png.flaticon.com/512/2590/2590514.png" class="w-10 h-10 object-contain z-10" alt="Ev & Yaşam">
                    </div>
                    <span class="text-sm font-semibold text-gray-700 group-hover:text-rose-600 transition-colors">Ev & Yaşam</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-3 group min-w-[100px]">
                    <div class="w-20 h-20 rounded-full bg-white shadow-sm border border-gray-100 flex items-center justify-center group-hover:shadow-md group-hover:scale-110 group-hover:border-rose-200 transition-all duration-300 relative overflow-hidden">
                        <div class="absolute inset-0 bg-rose-50 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="https://cdn-icons-png.flaticon.com/512/857/857418.png" class="w-10 h-10 object-contain z-10" alt="Kozmetik">
                    </div>
                    <span class="text-sm font-semibold text-gray-700 group-hover:text-rose-600 transition-colors">Kozmetik</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-3 group min-w-[100px]">
                    <div class="w-20 h-20 rounded-full bg-white shadow-sm border border-gray-100 flex items-center justify-center group-hover:shadow-md group-hover:scale-110 group-hover:border-rose-200 transition-all duration-300 relative overflow-hidden">
                        <div class="absolute inset-0 bg-rose-50 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="https://cdn-icons-png.flaticon.com/512/2964/2964514.png" class="w-10 h-10 object-contain z-10" alt="Spor">
                    </div>
                    <span class="text-sm font-semibold text-gray-700 group-hover:text-rose-600 transition-colors">Spor Outdoor</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-3 group min-w-[100px]">
                    <div class="w-20 h-20 rounded-full bg-white shadow-sm border border-gray-100 flex items-center justify-center group-hover:shadow-md group-hover:scale-110 group-hover:border-rose-200 transition-all duration-300 relative overflow-hidden">
                        <div class="absolute inset-0 bg-rose-50 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="https://cdn-icons-png.flaticon.com/512/3081/3081840.png" class="w-10 h-10 object-contain z-10" alt="Süpermarket">
                    </div>
                    <span class="text-sm font-semibold text-gray-700 group-hover:text-rose-600 transition-colors">Süpermarket</span>
                </a>
            </div>
        </div>

        <!-- PRODUCT GRID -->
        <div id="products" class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 mt-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-extrabold text-gray-900 flex items-center gap-2">
                    <span class="w-2 h-8 bg-rose-500 rounded-full inline-block"></span>
                    Sizin İçin Seçtiklerimiz
                </h2>
                <a href="#" class="text-sm font-bold text-rose-600 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 px-4 py-2 rounded-xl transition-colors">Tümünü Gör</a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 gap-3 sm:gap-4 lg:gap-5">
                @foreach($products as $product)
                    <div class="group bg-white rounded-2xl p-3 border border-gray-100 hover:border-rose-200 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col hover:-translate-y-1 hover-trigger relative">
                        
                        <!-- Favorite Button (UI only) -->
                        <button class="absolute top-4 right-4 z-20 w-8 h-8 bg-white/90 backdrop-blur rounded-full flex items-center justify-center text-gray-400 hover:text-rose-500 shadow-sm hover:shadow transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </button>

                        <!-- Discount Badge -->
                        <div class="absolute top-4 left-4 z-20">
                            <span class="bg-rose-500 text-white text-[11px] font-bold px-2 py-1 rounded-md shadow-sm">Kargo Bedava</span>
                        </div>

                        <!-- Image -->
                        <div class="relative w-full aspect-[4/5] bg-gray-50 rounded-xl overflow-hidden mb-3">
                            <a href="{{ route('storefront.show', $product->slug) }}" class="block w-full h-full">
                                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/600x600.png?text=Görsel+Yok' }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-center object-cover group-hover:scale-110 transition-transform duration-500"
                                     onerror="this.src='https://via.placeholder.com/600x600.png?text=Görsel+Bulunamadı'">
                            </a>
                            
                            <!-- Quick Add (Sticky on hover) -->
                            <div class="absolute inset-x-2 bottom-2 hover-target">
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="w-full bg-rose-600/95 backdrop-blur-sm text-white text-sm font-bold py-2.5 rounded-xl shadow-lg hover:bg-rose-700 transition-colors flex items-center justify-center gap-2 transform translate-y-4 group-hover:translate-y-0 duration-300">
                                        Sepete Ekle
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex flex-col flex-1">
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider">ERP BRAND</span>
                                <div class="flex items-center gap-0.5">
                                    <svg class="text-orange-400 w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <span class="text-[11px] font-semibold text-gray-600">4.8 (124)</span>
                                </div>
                            </div>

                            <h3 class="text-sm font-medium text-gray-800 line-clamp-2 leading-snug mb-2 hover:text-rose-600 transition-colors">
                                <a href="{{ route('storefront.show', $product->slug) }}">
                                    {{ $product->name }}
                                </a>
                            </h3>

                            <div class="mt-auto">
                                <div class="flex flex-col">
                                    <span class="text-xs text-gray-400 line-through decoration-rose-500/50">₺{{ number_format($product->price * 1.2, 2, ',', '.') }}</span>
                                    <span class="text-lg font-extrabold text-rose-600">₺{{ number_format($product->price, 2, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $products->links() }}
            </div>
        </div>

        <!-- TRUST BADGES SECTION -->
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 mt-20 mb-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-white p-6 sm:p-10 rounded-[2rem] shadow-sm border border-gray-100">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-rose-50 flex items-center justify-center text-rose-600 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm">Güvenli Alışveriş</h4>
                        <p class="text-xs text-gray-500">256-bit SSL sertifikası</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center text-orange-600 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm">Hızlı Kargo</h4>
                        <p class="text-xs text-gray-500">24 saatte kargoda</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm">Kolay İade</h4>
                        <p class="text-xs text-gray-500">14 gün içinde koşulsuz iade</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center text-green-600 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm">7/24 Destek</h4>
                        <p class="text-xs text-gray-500">Her zaman yanınızdayız</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 border-t border-gray-800">
        <div class="max-w-[1400px] mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-1 md:col-span-2">
                    <span class="text-3xl font-extrabold tracking-tight text-white flex items-center gap-2">
                        <div class="w-8 h-8 bg-rose-500 rounded-lg flex items-center justify-center text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                        ERP <span class="text-rose-500">Store</span>
                    </span>
                    <p class="mt-6 text-gray-400 text-sm max-w-sm leading-relaxed">
                        En yeni ürünler, en uygun fiyatlar ve güvenilir alışveriş deneyimi. Modern e-ticaret altyapısı ile milyonlarca ürün tek tık uzağınızda.
                    </p>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-white tracking-wider uppercase mb-6">Kurumsal</h3>
                    <ul class="space-y-4 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-rose-500 transition-colors">Hakkımızda</a></li>
                        <li><a href="#" class="hover:text-rose-500 transition-colors">İletişim</a></li>
                        <li><a href="#" class="hover:text-rose-500 transition-colors">Kariyer</a></li>
                        <li><a href="#" class="hover:text-rose-500 transition-colors">Yatırımcı İlişkileri</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-white tracking-wider uppercase mb-6">Yardım</h3>
                    <ul class="space-y-4 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-rose-500 transition-colors">Kargo ve Teslimat</a></li>
                        <li><a href="#" class="hover:text-rose-500 transition-colors">İade Politikası</a></li>
                        <li><a href="#" class="hover:text-rose-500 transition-colors">Sıkça Sorulan Sorular</a></li>
                        <li><a href="#" class="hover:text-rose-500 transition-colors">Kişisel Verilerin Korunması</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-16 border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-500">
                    &copy; 2026 ERP Store. Tüm hakları saklıdır.
                </p>
                <div class="flex space-x-6">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/200px-Visa_Inc._logo.svg.png" class="h-6 opacity-50 grayscale hover:grayscale-0 transition-all" alt="Visa">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/200px-Mastercard-logo.svg.png" class="h-6 opacity-50 grayscale hover:grayscale-0 transition-all" alt="Mastercard">
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
