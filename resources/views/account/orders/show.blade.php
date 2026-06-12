@extends('layouts.account')

@section('title', 'Sipariş Detayı')

@section('content')
<div class="space-y-5 max-w-2xl">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-50 flex items-center justify-between">
            <div>
                <h1 class="text-sm font-bold text-gray-800">Sipariş Detayı</h1>
                <p class="text-xs text-gray-400 font-mono mt-0.5">{{ $order->id }}</p>
            </div>
            <a href="{{ route('account.orders') }}" class="text-xs text-gray-400 hover:text-gray-600">← Geri</a>
        </div>
        <div class="divide-y divide-gray-50 text-sm">
            <div class="grid grid-cols-3 gap-4 px-5 py-3.5">
                <span class="text-gray-500">Durum</span>
                <span class="col-span-2">
                    @php
                        $badge = match($order->status) {
                            'pending'    => 'bg-amber-100 text-amber-700',
                            'paid'       => 'bg-blue-100 text-blue-700',
                            'processing' => 'bg-indigo-100 text-indigo-700',
                            'shipped'    => 'bg-emerald-100 text-emerald-700',
                            'cancelled'  => 'bg-red-100 text-red-700',
                            default      => 'bg-gray-100 text-gray-600',
                        };
                    @endphp
                    <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $badge }}">{{ ucfirst($order->status) }}</span>
                </span>
            </div>
            <div class="grid grid-cols-3 gap-4 px-5 py-3.5">
                <span class="text-gray-500">Toplam Tutar</span>
                <span class="col-span-2 font-bold text-gray-900">₺{{ number_format($order->total_price, 2, ',', '.') }}</span>
            </div>
            <div class="grid grid-cols-3 gap-4 px-5 py-3.5">
                <span class="text-gray-500">Tarih</span>
                <span class="col-span-2 text-gray-700">{{ $order->created_at->format('d.m.Y H:i') }}</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-50">
            <h2 class="text-sm font-semibold text-gray-800">Sipariş İçeriği</h2>
        </div>
        <div class="divide-y divide-gray-50">
            @foreach($order->items as $item)
            <div class="flex items-center justify-between px-5 py-4">
                <div>
                    <p class="text-sm font-medium text-gray-900">{{ $item->product->name ?? 'Ürün Silinmiş' }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">Adet: {{ $item->quantity }}</p>
                </div>
                <p class="text-sm font-bold text-gray-900">₺{{ number_format($item->price, 2, ',', '.') }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
