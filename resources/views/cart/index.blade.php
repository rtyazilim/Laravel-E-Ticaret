<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sepetim - {{ config('app.name', 'ERP E-Ticaret') }}</title>
    
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

    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="mb-8 flex items-center justify-between">
            <h1 class="text-3xl font-bold text-gray-900">Alışveriş Sepetim</h1>
            <a href="/" class="text-sm font-medium text-rose-600 hover:text-rose-500">Alışverişe Devam Et &rarr;</a>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(empty($cart))
            <div class="bg-white rounded-2xl shadow-sm p-12 text-center border border-gray-100">
                <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <h3 class="text-lg font-medium text-gray-900">Sepetiniz boş</h3>
                <p class="mt-1 text-sm text-gray-500 mb-6">Sepetinizde henüz ürün bulunmamaktadır.</p>
                <a href="/" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 transition-all">
                    Ürünleri İncele
                </a>
            </div>
        @else
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach($cart as $id => $item)
                        <li class="p-6 flex py-6 sm:py-8">
                            <div class="flex-shrink-0 w-24 h-24 sm:w-32 sm:h-32 rounded-xl overflow-hidden bg-gray-50 border border-gray-100">
                                <img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-center object-contain" onerror="this.onerror=null; this.src='{{ asset('images/placeholder-product.png') }}';">
                            </div>

                            <div class="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                    <div>
                                        <div class="flex justify-between">
                                            <h3 class="text-lg">
                                                <span class="font-medium text-gray-700 hover:text-gray-800">
                                                    {{ $item['name'] }}
                                                </span>
                                            </h3>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">Adet: {{ $item['quantity'] }}</p>
                                    </div>

                                    <div class="mt-4 sm:mt-0 sm:pr-9 text-right">
                                        <p class="text-lg font-bold text-gray-900">₺{{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}</p>
                                        
                                        <div class="absolute top-0 right-0 sm:top-auto sm:right-auto sm:mt-2">
                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="-m-2 p-2 inline-flex text-gray-400 hover:text-rose-500 transition-colors">
                                                    <span class="sr-only">Kaldır</span>
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                
                <div class="border-t border-gray-200 p-6 sm:p-8 bg-gray-50">
                    <div class="flex justify-between text-xl font-bold text-gray-900 mb-6">
                        <p>Ara Toplam</p>
                        <p>₺{{ number_format($total, 2, ',', '.') }}</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('checkout.index') }}" class="w-full inline-flex justify-center items-center bg-gray-900 border border-transparent rounded-xl shadow-sm py-4 px-4 text-base font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors">
                            Ödemeye Geç (Demo)
                        </a>
                    </div>
                </div>
            </div>
        @endif
        
    </main>

</body>
</html>
