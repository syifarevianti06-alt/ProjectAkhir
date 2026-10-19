
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Penjual') - Lune Attiré</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f8f5f5] text-[#4d4141]">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="fixed inset-y-0 left-0 z-40 flex w-[245px] flex-col bg-[#986d6d] text-white">

        {{-- LOGO DAN PROFIL --}}
        <div class="border-b border-white/15 px-6 py-6">
            <h1 class="font-serif text-2xl font-bold">
                Lune Attiré
            </h1>

            <p class="mt-1 text-xs text-white/70">
                Seller Panel
            </p>

            <div class="mt-5 flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-white/20 font-semibold">
                    P
                </div>

                <div>
                    <p class="text-sm font-semibold">Penjual</p>
                    <p class="text-xs text-white/70">Toko Lune Attiré</p>
                </div>
            </div>
        </div>

        {{-- MENU NAVIGASI --}}
        <nav class="flex-1 space-y-1 overflow-y-auto px-4 py-5">

            {{-- DASHBOARD --}}
            <a href="{{ route('penjual.dashboard') }}"
               class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm transition
               {{ request()->routeIs('penjual.dashboard')
                    ? 'bg-white font-semibold text-[#986d6d] shadow-sm'
                    : 'text-white hover:bg-white/10' }}">
                <span class="w-5 text-center">⌂</span>
                Dashboard
            </a>

            {{-- PRODUK --}}
            <a href="{{ route('penjual.produk') }}"
               class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm transition
               {{ request()->routeIs('penjual.produk*')
                    ? 'bg-white font-semibold text-[#986d6d] shadow-sm'
                    : 'text-white hover:bg-white/10' }}">
                <span class="w-5 text-center">▣</span>
                Produk
            </a>

            {{-- KATEGORI --}}
            <a href="{{ route('penjual.kategori') }}"
               class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm transition
               {{ request()->routeIs('penjual.kategori*')
                    ? 'bg-white font-semibold text-[#986d6d] shadow-sm'
                    : 'text-white hover:bg-white/10' }}">
                <span class="w-5 text-center">▤</span>
                Kategori
            </a>

            {{-- STOK --}}
            <a href="{{ route('penjual.stok') }}"
               class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm transition
               {{ request()->routeIs('penjual.stok*')
                    ? 'bg-white font-semibold text-[#986d6d] shadow-sm'
                    : 'text-white hover:bg-white/10' }}">
                <span class="w-5 text-center">▦</span>
                Stok
            </a>

            {{-- PESANAN --}}
            <a href="{{ route('penjual.pesanan') }}"
               class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm transition
               {{ request()->routeIs('penjual.pesanan*')
                    ? 'bg-white font-semibold text-[#986d6d] shadow-sm'
                    : 'text-white hover:bg-white/10' }}">
                <span class="w-5 text-center">□</span>
                Pesanan
            </a>

            {{-- TRANSAKSI --}}
            <a href="{{ route('penjual.transaksi') }}"
               class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm transition
               {{ request()->routeIs('penjual.transaksi*')
                    ? 'bg-white font-semibold text-[#986d6d] shadow-sm'
                    : 'text-white hover:bg-white/10' }}">
                <span class="w-5 text-center">◫</span>
                Transaksi
            </a>

            {{-- PROFIL --}}
            <a href="{{ route('penjual.profil') }}"
               class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm transition
               {{ request()->routeIs('penjual.profil*')
                    ? 'bg-white font-semibold text-[#986d6d] shadow-sm'
                    : 'text-white hover:bg-white/10' }}">
                <span class="w-5 text-center">♙</span>
                Profil
            </a>

        </nav>

        {{-- LOGOUT --}}
        <div class="border-t border-white/15 p-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit"
                        class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-sm transition hover:bg-white/10">
                    <span class="w-5 text-center">↪</span>
                    Logout
                </button>
            </form>
        </div>

    </aside>

    {{-- AREA KONTEN --}}
    <div class="ml-[245px] flex min-h-screen min-w-0 flex-1 flex-col">

        {{-- HEADER --}}
        <header class="sticky top-0 z-30 flex min-h-[72px] items-center justify-between gap-4 border-b border-[#eadede] bg-white px-8">

            <div>
                <p class="text-xs text-[#9b8585]">
                    Lune Attiré / Penjual
                </p>

                <h2 class="mt-1 text-lg font-semibold">
                    @yield('page-heading', 'Dashboard Penjual')
                </h2>
            </div>

            <div class="flex items-center gap-4">
                <span class="hidden text-xs text-[#9b8585] sm:block">
                    Panel Penjual
                </span>

                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#ead6d6] text-sm font-semibold text-[#986d6d]">
                    P
                </div>
            </div>

        </header>

        {{-- KONTEN HALAMAN --}}
        <main class="min-w-0 flex-1 p-6 md:p-8">

            @yield('content')

        </main>

        {{-- FOOTER --}}
        <footer class="border-t border-[#eadede] bg-white px-8 py-4 text-center text-xs text-[#9b8585]">
            &copy; {{ date('Y') }} Lune Attiré. Panel Pengelolaan Toko.
        </footer>

    </div>

</div>

</body>
</html>
