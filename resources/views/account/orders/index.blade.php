@extends('layouts.account')

@section('title', 'Siparişlerim')

@section('content')
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="px-5 py-4 border-b border-gray-50">
        <h1 class="text-sm font-bold text-gray-800">Siparişlerim</h1>
    </div>
    <div class="divide-y divide-gray-50">
        @forelse($orders as $order)
        <div class="flex items-center justify-between px-5 py-4">
            <div>
                <p class="text-xs font-mono text-gray-400">{{ substr($order->id, 0, 8) }}…</p>
                <p class="text-sm font-semibold text-gray-900 mt-0.5">₺{{ number_format($order->total_price, 2, ',', '.') }}</p>
                <p class="text-xs text-gray-400 mt-0.5">{{ $order->created_at->format('d.m.Y H:i') }}</p>
            </div>
            <div class="flex items-center gap-3">
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
                <a href="{{ route('account.orders.show', $order->id) }}" class="text-xs text-rose-600 hover:text-rose-700 font-medium">Detay</a>
            </div>
        </div>
        @empty
        <div class="px-5 py-12 text-center text-gray-400 text-sm">Henüz siparişiniz bulunmuyor.</div>
        @endforelse
    </div>
    @if($orders->hasPages())
    <div class="px-5 py-4 border-t border-gray-50">
        {{ $orders->links() }}
    </div>
    @endif
</div>
@endsection
