<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vitrin - {{ config('app.name', 'ERP E-Ticaret') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
    <!-- Tailwind CSS (via CDN for standalone demo/production without build step) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased selection:bg-rose-500 selection:text-white">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold tracking-tight text-gray-900">
                        ERP <span class="text-rose-600">Store</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Ürünlerimiz</h1>
            <p class="mt-2 text-sm text-gray-600">En yeni ve kaliteli ürünleri keşfedin.</p>
        </div>

        @if($products->isEmpty())
            <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Ürün Bulunamadı</h3>
                <p class="mt-1 text-sm text-gray-500">Şu anda listelenecek aktif ürünümüz bulunmuyor.</p>
            </div>
        @else
            <!-- Responsive Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="product-card bg-white rounded-xl border border-gray-100 overflow-hidden transition-all duration-300 ease-in-out flex flex-col h-full group">
                        
                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden bg-gray-100 xl:aspect-w-7 xl:aspect-h-8 relative">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover object-center group-hover:opacity-90 transition-opacity" onerror="this.onerror=null; this.src='{{ asset('images/placeholder-product.png') }}';">
                        </div>
                        
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-sm text-gray-700 font-medium line-clamp-1 mb-1" title="{{ $product->name }}">
                                {{ $product->name }}
                            </h3>
                            
                            <p class="text-sm text-gray-500 line-clamp-2 flex-grow mb-4">
                                {{ $product->short_description ?: 'Ürün açıklaması bulunmuyor.' }}
                            </p>
                            
                            <div class="mt-auto flex items-center justify-between">
                                <p class="text-lg font-bold text-gray-900">{{ $product->formatted_price }}</p>
                                <button class="p-2 rounded-full bg-rose-50 text-rose-600 hover:bg-rose-100 hover:text-rose-700 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10 flex justify-center">
                {{ $products->links('pagination::tailwind') }}
            </div>
        @endif
        
    </main>

    <footer class="bg-white border-t border-gray-200 mt-12 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm text-gray-500">
                &copy; {{ date('Y') }} ERP E-Ticaret. Tüm hakları saklıdır.
            </p>
        </div>
    </footer>

</body>
</html>
