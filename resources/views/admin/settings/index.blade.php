@extends('layouts.admin')

@section('title', 'Ayarlar')
@section('page_title', 'Sistem Ayarları')
@section('page_subtitle', 'Uygulama yapılandırması')

@section('content')
<div class="max-w-2xl">
    <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6">
        <h2 class="text-sm font-semibold text-white mb-6">Genel Ayarlar</h2>
        <div class="space-y-4 text-sm text-slate-400">
            <div class="flex items-center justify-between py-3 border-b border-slate-700">
                <div>
                    <p class="text-white font-medium">Uygulama Adı</p>
                    <p class="text-xs text-slate-500 mt-0.5">{{ config('app.name') }}</p>
                </div>
                <span class="text-xs text-slate-500">{{ config('app.env') }}</span>
            </div>
            <div class="flex items-center justify-between py-3 border-b border-slate-700">
                <div>
                    <p class="text-white font-medium">Laravel Sürümü</p>
                </div>
                <span class="text-xs text-indigo-400 font-mono">{{ app()->version() }}</span>
            </div>
            <div class="flex items-center justify-between py-3 border-b border-slate-700">
                <div>
                    <p class="text-white font-medium">PHP Sürümü</p>
                </div>
                <span class="text-xs text-indigo-400 font-mono">{{ PHP_VERSION }}</span>
            </div>
            <div class="flex items-center justify-between py-3">
                <div>
                    <p class="text-white font-medium">Sunucu Saati</p>
                </div>
                <span class="text-xs text-slate-400">{{ now()->format('d.m.Y H:i:s') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
