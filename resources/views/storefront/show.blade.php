<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - {{ config('app.name', 'ERP E-Ticaret') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
    <!-- Tailwind CSS (via CDN for standalone demo/production without build step) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
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
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-rose-600 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Anasayfa
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Product Details -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8 md:p-12">
                
                <!-- Product Image -->
                <div class="flex justify-center items-center bg-gray-50 rounded-xl p-4 overflow-hidden">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="max-w-full h-auto max-h-96 object-contain rounded-lg shadow-sm" onerror="this.onerror=null; this.src='{{ asset('images/placeholder-product.png') }}';">
                </div>
                
                <!-- Product Info -->
                <div class="flex flex-col justify-center">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 tracking-tight mb-2">
                        {{ $product->name }}
                    </h1>
                    
                    <p class="text-2xl font-bold text-rose-600 mb-6">
                        {{ $product->formatted_price }}
                    </p>
                    
                    <div class="prose prose-sm sm:prose text-gray-600 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Ürün Açıklaması</h3>
                        <p class="leading-relaxed">
                            {{ $product->description ?: ($product->short_description ?: 'Bu ürün için detaylı bir açıklama girilmemiştir.') }}
                        </p>
                    </div>
                    
                    <div class="mt-auto pt-6 border-t border-gray-100">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-medium rounded-xl text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 shadow-sm hover:shadow transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Sepete Ekle
                            </button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        
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
