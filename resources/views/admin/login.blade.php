<!DOCTYPE html>
<html lang="tr" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Girişi - RT Yazılım</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-950 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-md">
    <!-- Logo -->
    <div class="text-center mb-8">
        <div class="w-12 h-12 rounded-2xl bg-indigo-600 flex items-center justify-center mx-auto mb-4 shadow-lg shadow-indigo-600/30">
            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
        </div>
        <h1 class="text-xl font-bold text-white">RT Yazılım Admin</h1>
        <p class="text-sm text-slate-500 mt-1">Yönetim paneline giriş yapın</p>
    </div>

    <!-- Card -->
    <div class="bg-slate-900 rounded-2xl border border-slate-800 p-8 shadow-2xl">
        @if($errors->any())
            <div class="mb-5 flex items-start gap-3 bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl text-sm">
                <svg class="w-4 h-4 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-xs font-medium text-slate-400 mb-1.5">E-posta</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                       class="w-full bg-slate-800 border border-slate-700 text-white text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent placeholder-slate-600 transition-all"
                       placeholder="admin@rtyazilim.com">
            </div>

            <div>
                <label for="password" class="block text-xs font-medium text-slate-400 mb-1.5">Şifre</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       class="w-full bg-slate-800 border border-slate-700 text-white text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent placeholder-slate-600 transition-all"
                       placeholder="••••••••">
            </div>

            <div class="flex items-center gap-2">
                <input id="remember" type="checkbox" name="remember"
                       class="w-4 h-4 rounded border-slate-700 bg-slate-800 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0">
                <label for="remember" class="text-sm text-slate-400">Beni hatırla</label>
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm py-3 rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/20 active:scale-95">
                Giriş Yap
            </button>
        </form>
    </div>

    <p class="text-center text-xs text-slate-600 mt-6">
        &copy; {{ date('Y') }} RT Yazılım. Tüm hakları saklıdır.
    </p>
</div>

</body>
</html>
