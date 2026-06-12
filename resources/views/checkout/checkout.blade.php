<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Siparişi Onayla - {{ config('app.name', 'ERP E-Ticaret') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
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
                <div>
                    <span class="text-sm text-gray-500">Güvenli Ödeme Adımı</span>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="mb-8">
            <a href="{{ route('cart.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-800 mb-4 inline-block">&larr; Sepete Dön</a>
            <h1 class="text-3xl font-bold text-gray-900">Siparişi Onayla</h1>
        </div>

        @if(session('error'))
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
            <div class="p-6 sm:p-8">
                <h2 class="text-lg font-medium text-gray-900 mb-6">Sipariş Özeti</h2>
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach($cart as $id => $item)
                        <li class="py-4 flex">
                            <div class="ml-0 flex-1 flex flex-col">
                                <div>
                                    <div class="flex justify-between text-sm font-medium text-gray-900">
                                        <h3>{{ $item['name'] }}</h3>
                                        <p class="ml-4">₺{{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}</p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">Adet: {{ $item['quantity'] }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <div class="border-t border-gray-200 bg-gray-50 p-6 sm:p-8">
                <div class="flex justify-between text-xl font-bold text-gray-900 mb-6">
                    <p>Ödenecek Tutar</p>
                    <p>₺{{ number_format($total, 2, ',', '.') }}</p>
                </div>
                
                <form action="{{ route('checkout.submit') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-rose-600 border border-transparent rounded-xl shadow-sm py-4 px-4 text-base font-medium text-white hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 transition-colors flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Siparişi Tamamla
                    </button>
                </form>
                
                <p class="text-xs text-center text-gray-500 mt-4">Tıkladığınızda demo bir sipariş oluşturulacaktır.</p>
            </div>
        </div>
        
    </main>

</body>
</html>
