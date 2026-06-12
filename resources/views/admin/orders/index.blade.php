@extends('layouts.admin')

@section('title', 'Siparişler')
@section('page_title', 'Sipariş Yönetimi')
@section('page_subtitle', 'Tüm siparişlerin listesi')

@section('content')
<div class="bg-slate-800 border border-slate-700 rounded-2xl overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-700 flex items-center justify-between">
        <h2 class="text-sm font-semibold text-white">Sipariş Listesi</h2>
        <span class="text-xs text-slate-500">{{ $orders->total() }} sipariş</span>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-700">
                    <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Sipariş ID</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Müşteri</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Toplam Tutar</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Durum</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Tarih</th>
                    <th class="text-right px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">İşlem</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/50">
                @foreach($orders as $order)
                <tr class="hover:bg-slate-700/30 transition-colors">
                    <td class="px-6 py-4 text-slate-400 font-mono text-xs">{{ substr($order->id, 0, 8) }}…</td>
                    <td class="px-6 py-4 text-slate-300">{{ $order->user->name ?? 'Misafir' }}</td>
                    <td class="px-6 py-4 text-white font-semibold">₺{{ number_format($order->total_price, 2, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        @php
                            $badge = match($order->status) {
                                'pending'    => 'bg-amber-500/20 text-amber-400',
                                'paid'       => 'bg-blue-500/20 text-blue-400',
                                'processing' => 'bg-indigo-500/20 text-indigo-400',
                                'shipped'    => 'bg-emerald-500/20 text-emerald-400',
                                'cancelled'  => 'bg-red-500/20 text-red-400',
                                default      => 'bg-slate-500/20 text-slate-400',
                            };
                        @endphp
                        <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $badge }}">{{ ucfirst($order->status) }}</span>
                    </td>
                    <td class="px-6 py-4 text-slate-500 text-xs">{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="text-indigo-400 hover:text-indigo-300 text-xs font-medium">Detay</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if($orders->hasPages())
    <div class="px-6 py-4 border-t border-slate-700">
        {{ $orders->links() }}
    </div>
    @endif
</div>
@endsection
