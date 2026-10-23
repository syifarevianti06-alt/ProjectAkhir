<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Lune Attiré')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="m-0 bg-[#F7F0EA] text-[#3F3030]">

<div class="flex min-h-screen w-full flex-row">

    {{-- SIDEBAR ADMIN --}}
    <aside class="flex min-h-screen w-[255px] min-w-[255px] shrink-0 flex-col bg-[#986d6d] text-white">

        <div class="px-7 pb-7 pt-8">
            <h1 class="text-[25px] font-semibold tracking-wide">Lune Attiré</h1>
            <p class="mt-1 text-[11px] uppercase tracking-[0.15em] text-white/65">
                Admin Panel
            </p>
        </div>

        <div class="mb-8 px-6">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white/15 font-semibold">
                    A
                </div>
                <div>
                    <p class="text-sm font-semibold">Admin</p>
                    <p class="mt-0.5 text-xs text-white/60">Lune Attiré</p>
                </div>
            </div>
        </div>

        <nav class="space-y-2 px-4">
            <p class="mb-3 px-4 text-[10px] uppercase tracking-[0.18em] text-white/50">
                Menu Utama
            </p>

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm transition
               {{ request()->routeIs('admin.dashboard') ? 'bg-white font-semibold text-[#7D2942]' : 'text-white/90 hover:bg-white/10' }}">
                <span class="w-6 text-center">⌂</span> Dashboard
            </a>

            <a href="{{ route('admin.pengguna') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm transition
               {{ request()->routeIs('admin.pengguna*') ? 'bg-white font-semibold text-[#7D2942]' : 'text-white/90 hover:bg-white/10' }}">
                <span class="w-6 text-center">♙</span> Pengguna
            </a>

            <a href="{{ route('admin.produk') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm transition
               {{ request()->routeIs('admin.produk*') ? 'bg-white font-semibold text-[#7D2942]' : 'text-white/90 hover:bg-white/10' }}">
                <span class="w-6 text-center">▣</span> Produk
            </a>

            <a href="{{ route('admin.pesanan') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm transition
               {{ request()->routeIs('admin.pesanan*') ? 'bg-white font-semibold text-[#7D2942]' : 'text-white/90 hover:bg-white/10' }}">
                <span class="w-6 text-center">▤</span> Pesanan
            </a>

            <a href="{{ route('admin.laporan') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm transition
               {{ request()->routeIs('admin.laporan*') ? 'bg-white font-semibold text-[#7D2942]' : 'text-white/90 hover:bg-white/10' }}">
                <span class="w-6 text-center">▥</span> Laporan
            </a>
        </nav>

        <div class="mt-auto px-5 pb-6 pt-8">
            <div class="border-t border-white/15 pt-5">
                <div class="mb-3 rounded-xl bg-white/10 p-4">
                    <p class="text-[11px] text-white/55">Lune Attiré</p>
                    <p class="mt-1 text-sm font-medium">Admin Workspace</p>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm text-white/85 transition hover:bg-white/10">
                        <span>🚪</span> Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- AREA KONTEN --}}
    <div class="min-w-0 flex-1">

        {{-- TOPBAR --}}
        <header class="flex h-[76px] items-center justify-between border-b border-[#EDE2DA] bg-white px-8">
            <div>
                <p class="text-[10px] uppercase tracking-[0.16em] text-[#A28B83]">
                    Lune Attiré
                </p>
                <h2 class="mt-1 text-lg font-semibold text-[#493535]">
                    @yield('page-title', 'Dashboard')
                </h2>
            </div>

            <div class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#E9D3D8] font-semibold text-[#7D2942]">
                    A
                </div>
                <div>
                    <p class="text-sm font-medium text-[#493535]">Admin</p>
                    <p class="text-[11px] text-[#A28B83]">Administrator</p>
                </div>
            </div>
        </header>

        {{-- HALAMAN --}}
        <main class="min-w-0 p-5 sm:p-8">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>