<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giriş Yap - ERP Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-md">
    <!-- Logo -->
    <div class="text-center mb-8">
        <a href="{{ route('storefront.index') }}" class="inline-flex items-center gap-2">
            <div class="w-10 h-10 rounded-2xl bg-rose-600 flex items-center justify-center shadow-lg shadow-rose-600/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
            <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-gray-900 to-gray-600">ERP<span class="text-rose-600">Store</span></span>
        </a>
        <p class="text-sm text-gray-500 mt-2">Hesabınıza giriş yapın veya yeni bir hesap oluşturun</p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-3xl border border-gray-100 p-8 shadow-xl shadow-gray-100/40">
        @if($errors->any())
            <div class="mb-5 flex items-start gap-3 bg-rose-50 border border-rose-100 text-rose-600 px-4 py-3 rounded-xl text-sm">
                <svg class="w-4 h-4 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wider">E-posta Adresi</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                       class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-4 focus:ring-rose-500/10 focus:border-rose-500 transition-all placeholder-gray-400"
                       placeholder="ornek@rtyazilim.com">
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wider">Şifre</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-4 focus:ring-rose-500/10 focus:border-rose-500 transition-all placeholder-gray-400"
                       placeholder="••••••••">
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <input id="remember" type="checkbox" name="remember"
                           class="w-4 h-4 rounded border-gray-300 text-rose-600 focus:ring-rose-500 focus:ring-offset-0">
                    <label for="remember" class="text-sm text-gray-500">Beni hatırla</label>
                </div>
            </div>

            <button type="submit"
                    class="w-full bg-rose-600 hover:bg-rose-700 text-white font-semibold text-sm py-3.5 rounded-xl transition-all duration-200 shadow-lg shadow-rose-600/20 active:scale-[0.98]">
                Giriş Yap
            </button>
        </form>
    </div>

    <p class="text-center text-xs text-gray-400 mt-6">
        &copy; {{ date('Y') }} ERP Store. Tüm hakları saklıdır.
    </p>
</div>

</body>
</html>
