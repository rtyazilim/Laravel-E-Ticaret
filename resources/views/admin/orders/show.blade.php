@extends('layouts.admin')

@section('title', 'Sipariş Detayı')
@section('page_title', 'Sipariş Detayı')
@section('page_subtitle', 'ID: ' . $order->id)

@section('content')
<div class="space-y-6 max-w-4xl">

    <!-- Info Card -->
    <div class="bg-slate-800 border border-slate-700 rounded-2xl overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-700 flex items-center justify-between">
            <div>
                <h2 class="text-sm font-semibold text-white">Sipariş Bilgileri</h2>
                <p class="text-xs text-slate-500 mt-0.5 font-mono">{{ $order->id }}</p>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="text-xs text-slate-400 hover:text-white transition-colors">← Geri</a>
        </div>

        <div class="divide-y divide-slate-700/50 text-sm">
            <div class="grid grid-cols-3 gap-4 px-6 py-4">
                <span class="text-slate-500">Müşteri</span>
                <span class="col-span-2 text-white">{{ $order->user->name ?? 'Misafir' }}</span>
            </div>
            <div class="grid grid-cols-3 gap-4 px-6 py-4">
                <span class="text-slate-500">Toplam Tutar</span>
                <span class="col-span-2 text-emerald-400 font-bold">₺{{ number_format($order->total_price, 2, ',', '.') }}</span>
            </div>
            <div class="grid grid-cols-3 gap-4 px-6 py-4">
                <span class="text-slate-500">Tarih</span>
                <span class="col-span-2 text-slate-300">{{ $order->created_at->format('d.m.Y H:i:s') }}</span>
            </div>
        </div>

        <!-- Status Form -->
        <div class="px-6 py-4 border-t border-slate-700 bg-slate-900/50">
            <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="flex items-center gap-3">
                @csrf
                <label class="text-xs text-slate-500 font-medium">Durum Güncelle:</label>
                <select name="status"
                        class="bg-slate-700 border border-slate-600 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="pending"    {{ $order->status === 'pending'    ? 'selected' : '' }}>Pending</option>
                    <option value="paid"       {{ $order->status === 'paid'       ? 'selected' : '' }}>Paid</option>
                    <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="shipped"    {{ $order->status === 'shipped'    ? 'selected' : '' }}>Shipped</option>
                    <option value="cancelled"  {{ $order->status === 'cancelled'  ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-semibold rounded-lg transition-colors">
                    Güncelle
                </button>
            </form>
        </div>
    </div>

    <!-- Items -->
    <div class="bg-slate-800 border border-slate-700 rounded-2xl overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-700">
            <h2 class="text-sm font-semibold text-white">Sipariş İçeriği</h2>
        </div>
        <div class="divide-y divide-slate-700/50">
            @foreach($order->items as $item)
            <div class="flex items-center justify-between px-6 py-4">
                <div>
                    <p class="text-sm font-medium text-white">{{ $item->product->name ?? 'Ürün Silinmiş' }}</p>
                    <p class="text-xs text-slate-500 mt-0.5">Adet: {{ $item->quantity }}</p>
                </div>
                <p class="text-sm font-bold text-emerald-400">₺{{ number_format($item->price, 2, ',', '.') }}</p>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
