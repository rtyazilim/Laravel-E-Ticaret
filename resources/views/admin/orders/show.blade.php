<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sipariş Detayı - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>body { font-family: 'Instrument Sans', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800">
    <nav class="bg-gray-900 text-white p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <span class="text-xl font-bold">Admin Panel</span>
            <a href="{{ route('admin.orders.index') }}" class="text-sm text-gray-300 hover:text-white">&larr; Siparişlere Dön</a>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        
        @if(session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
            <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Sipariş Bilgileri</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">ID: {{ $order->id }}</p>
                </div>
                
                <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="flex items-center space-x-2">
                    @csrf
                    <select name="status" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md border">
                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>Paid</option>
                    </select>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Güncelle
                    </button>
                </form>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Müşteri</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $order->user->name ?? 'Misafir' }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Toplam Tutar</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 font-bold">₺{{ number_format($order->total_price, 2, ',', '.') }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Oluşturulma Tarihi</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $order->created_at->format('d.m.Y H:i:s') }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <h2 class="text-lg font-medium text-gray-900 mb-4">Sipariş İçeriği</h2>
        <div class="bg-white shadow overflow-hidden sm:rounded-md border border-gray-200">
            <ul role="list" class="divide-y divide-gray-200">
                @foreach($order->items as $item)
                    <li>
                        <div class="px-4 py-4 sm:px-6 flex items-center justify-between">
                            <div class="flex items-center">
                                <p class="text-sm font-medium text-indigo-600 truncate">{{ $item->product->name ?? 'Ürün Silinmiş' }}</p>
                                <p class="ml-2 flex-shrink-0 flex">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Adet: {{ $item->quantity }}
                                    </span>
                                </p>
                            </div>
                            <div class="ml-2 flex-shrink-0 flex">
                                <p class="text-sm text-gray-900 font-bold">₺{{ number_format($item->price, 2, ',', '.') }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
