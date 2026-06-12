@extends('layouts.account')

@section('title', 'Profilim')

@section('content')
<div class="max-w-xl">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <h1 class="text-sm font-bold text-gray-800 mb-5">Profil Bilgilerim</h1>

        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-50">
            <div class="w-14 h-14 rounded-full bg-rose-100 flex items-center justify-center text-rose-600 font-bold text-xl">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div>
                <p class="font-semibold text-gray-900">{{ $user->name }}</p>
                <p class="text-sm text-gray-500">{{ $user->email }}</p>
            </div>
        </div>

        <div class="space-y-4 text-sm">
            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">Ad Soyad</label>
                <div class="px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl text-gray-800">{{ $user->name }}</div>
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">E-posta</label>
                <div class="px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl text-gray-800">{{ $user->email }}</div>
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">Üyelik Tarihi</label>
                <div class="px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl text-gray-500">{{ $user->created_at->format('d.m.Y') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
