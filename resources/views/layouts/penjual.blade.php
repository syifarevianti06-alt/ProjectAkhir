<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Penjual') - Lune Attiré</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f8f5f5] text-[#4d4141]">

    <div class="flex min-h-screen">

        //SIDEBAR
        <aside class="fixed inset-y-0 left-0 z-40 flex w-[245px] flex-col bg-[#986d6d] text-white">

            //LOGO + PROFILE
            <div class="border-b border-white/15 px-6 py-6">

                <h1 class="font-serif text-2xl font-bold">
                    Lune Attiré
                </h1>

                <div class="mt-4 flex items-center gap-3">

                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-white/20">
                        P
                    </div>

                    <div>
                        <p class="text-sm font-semibold">
                            Penjual
                        </p>

                        <p class="text-[11px] text-white/60">
                            Toko Lune Attiré
                        </p>
                    </div>

                </div>

            </div>


            //MENU
            <nav class="flex-1 space-y-1 px-4 py-5">

                //DASHBOARD
                <a
                    href="{{ route('penjual.dashboard') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm transition
                {{ request()->routeIs('penjual.dashboard')
                    ? 'bg-white font-semibold text-[#986d6d]'
                    : 'text-white hover:bg-white/10' }}">
                    ⌂
                    Dashboard
                </a>


                //PRODUK
                <a
                    href="{{ route('penjual.produk') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm transition
                {{ request()->routeIs('penjual.produk*')
                    ? 'bg-white font-semibold text-[#986d6d]'
                    : 'text-white hover:bg-white/10' }}">
                    ▣
                    Produk
                </a>


                //PESANAN
                <a
                    href="{{ route('penjual.pesanan') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm transition
                {{ request()->routeIs('penjual.pesanan*')
                    ? 'bg-white font-semibold text-[#986d6d]'
                    : 'text-white hover:bg-white/10' }}">
                    □
                    Pesanan
                </a>


                //STOK
                <a
                    href="{{ route('penjual.stok') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm transition
                {{ request()->routeIs('penjual.stok*')
                    ? 'bg-white font-semibold text-[#986d6d]'
                    : 'text-white hover:bg-white/10' }}">
                    ▤
                    Stok
                </a>


                //LAPORAN
                <a
                    href="{{ route('penjual.laporan') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm transition
                {{ request()->routeIs('penjual.laporan*')
                    ? 'bg-white font-semibold text-[#986d6d]'
                    : 'text-white hover:bg-white/10' }}">
                    ◫
                    Laporan Penjualan
                </a>


                //PROFIL TOKO
                <a
                    href="{{ route('penjual.profil') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm transition
                {{ request()->routeIs('penjual.profil')
                    ? 'bg-white font-semibold text-[#986d6d]'
                    : 'text-white hover:bg-white/10' }}">
                    ♙
                    Profil Toko
                </a>

            </nav>


            //LOGOUT
            <div class="border-t border-white/15 p-4">

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-sm text-white transition hover:bg-white/10">
                        🚪🚶
                        Logout
                    </button>

                </form>

            </div>

        </aside>


        //MAIN
        <div class="ml-[245px] flex min-h-screen flex-1 flex-col">

            //HEADER
            <header class="flex h-[72px] items-center justify-between border-b border-[#eadede] bg-white px-8">

                <input
                    type="text"
                    placeholder="Cari pesanan atau produk..."
                    class="h-10 w-[300px] rounded-lg border border-[#eee3e3] bg-[#faf8f8] px-4 text-xs outline-none focus:border-[#b88b8b]">

                <div class="flex items-center gap-5">

                    <span class="text-lg text-[#986d6d]">
                        ♧
                    </span>

                    <div class="flex items-center gap-2">

                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#ead6d6] text-xs text-[#986d6d]">
                            P
                        </div>

                        <span class="text-xs">
                            Penjual
                        </span>

                    </div>

                </div>

            </header>


            //CONTENT
            <main class="flex-1 p-8">

                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>