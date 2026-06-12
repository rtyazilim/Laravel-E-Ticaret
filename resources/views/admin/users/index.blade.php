@extends('layouts.admin')

@section('title', 'Kullanıcılar')
@section('page_title', 'Kullanıcılar')
@section('page_subtitle', 'Kayıtlı kullanıcıların listesi')

@section('content')
<div class="bg-slate-800 border border-slate-700 rounded-2xl overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-700 flex items-center justify-between">
        <h2 class="text-sm font-semibold text-white">Kullanıcı Listesi</h2>
        <span class="text-xs text-slate-500">{{ $users->total() }} kullanıcı</span>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-700">
                    <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Ad</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">E-posta</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-slate-500 uppercase tracking-wider">Kayıt Tarihi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/50">
                @forelse($users as $user)
                <tr class="hover:bg-slate-700/30 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full bg-indigo-600/30 flex items-center justify-center text-xs font-bold text-indigo-400">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <span class="text-white font-medium">{{ $user->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-slate-400">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-slate-500 text-xs">{{ $user->created_at->format('d.m.Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-12 text-center text-slate-600 text-sm">Henüz kullanıcı bulunmuyor.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($users->hasPages())
    <div class="px-6 py-4 border-t border-slate-700">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection
