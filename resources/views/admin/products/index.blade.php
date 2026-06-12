@extends('layouts.admin')

@section('title', 'Ürünler')
@section('page_title', 'Ürünler')
@section('page_subtitle', 'Tüm ürünlerin listesi')

@section('content')
<div class="bg-slate-800 border border-slate-700 rounded-2xl overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-700 flex items-center justify-between">
        <h2 class="text-sm font-semibold text-white">Ürün Listesi</h2>
        <span class="text-xs text-slate-500">{{ $products->total() }} ürün</span>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-700">
                    <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Ürün Adı</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Slug</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Fiyat</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Stok</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Tarih</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/50">
                @forelse($products as $product)
                <tr class="hover:bg-slate-700/30 transition-colors">
                    <td class="px-6 py-4 text-white font-medium">{{ $product->name }}</td>
                    <td class="px-6 py-4 text-slate-400 font-mono text-xs">{{ $product->slug }}</td>
                    <td class="px-6 py-4 text-emerald-400 font-semibold">₺{{ number_format($product->price, 2, ',', '.') }}</td>
                    <td class="px-6 py-4 text-slate-300">{{ $product->stock ?? '-' }}</td>
                    <td class="px-6 py-4 text-slate-500 text-xs">{{ $product->created_at->format('d.m.Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-slate-600 text-sm">Henüz ürün bulunmuyor.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($products->hasPages())
    <div class="px-6 py-4 border-t border-slate-700">
        {{ $products->links() }}
    </div>
    @endif
</div>
@endsection
