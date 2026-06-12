@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Genel bakış ve istatistikler')

@section('content')
<div class="space-y-6">

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        <div class="bg-slate-800 border border-slate-700 rounded-2xl p-5">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <span class="text-xs text-slate-500 font-medium">Toplam</span>
            </div>
            <p class="text-3xl font-bold text-white">{{ $stats['total_orders'] }}</p>
            <p class="text-sm text-slate-400 mt-1">Sipariş</p>
        </div>

        <div class="bg-slate-800 border border-slate-700 rounded-2xl p-5">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-xs text-slate-500 font-medium">Bekleyen</span>
            </div>
            <p class="text-3xl font-bold text-white">{{ $stats['pending_orders'] }}</p>
            <p class="text-sm text-slate-400 mt-1">Sipariş</p>
        </div>

        <div class="bg-slate-800 border border-slate-700 rounded-2xl p-5">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <span class="text-xs text-slate-500 font-medium">Toplam</span>
            </div>
            <p class="text-3xl font-bold text-white">{{ $stats['total_products'] }}</p>
            <p class="text-sm text-slate-400 mt-1">Ürün</p>
        </div>

        <div class="bg-slate-800 border border-slate-700 rounded-2xl p-5">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-violet-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-violet-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <span class="text-xs text-slate-500 font-medium">Toplam</span>
            </div>
            <p class="text-3xl font-bold text-white">{{ $stats['total_users'] }}</p>
            <p class="text-sm text-slate-400 mt-1">Kullanıcı</p>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="bg-slate-800 border border-slate-700 rounded-2xl overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-700 flex items-center justify-between">
            <h2 class="text-sm font-semibold text-white">Son Siparişler</h2>
            <a href="{{ route('admin.orders.index') }}" class="text-xs text-indigo-400 hover:text-indigo-300 font-medium">Tümünü Gör →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700">
                        <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Sipariş ID</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Müşteri</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Tutar</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Durum</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Tarih</th>
                        <th class="text-right px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">İşlem</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($recent_orders as $order)
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
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-600 text-sm">Henüz sipariş bulunmuyor.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
