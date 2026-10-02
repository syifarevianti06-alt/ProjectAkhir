<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin - Lune Attiré')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F7F0EA] text-[#3F3030]">

<div class="min-h-screen flex">

    {{-- =====================================================
        SIDEBAR
    ====================================================== --}}
    <aside class="w-[255px] min-h-screen bg-[#986d6d] text-white flex flex-col">

        {{-- LOGO --}}
        <div class="px-7 pt-8 pb-7">

            <h1 class="text-[25px] font-semibold tracking-wide">
                Lune Attiré
            </h1>

            <p class="text-[11px] text-white/65 mt-1 tracking-[0.15em] uppercase">
                Admin Panel
            </p>

        </div>


        {{-- PROFILE ADMIN --}}
        <div class="px-6 mb-8">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-full
                    bg-white/15
                    flex items-center justify-center
                    font-semibold text-white">

                    A

                </div>

                <div>

                    <p class="text-sm font-semibold">
                        Admin
                    </p>

                    <p class="text-xs text-white/60 mt-0.5">
                        Lune Attiré
                    </p>

                </div>

            </div>

        </div>


        {{-- MENU --}}
        <nav class="px-4 space-y-2">

            <p class="px-4 mb-3 text-[10px]
                uppercase tracking-[0.18em]
                text-white/50">
                Menu Utama
            </p>


            {{-- DASHBOARD --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3
                px-4 py-3 rounded-xl
                text-sm transition

                {{ request()->routeIs('admin.dashboard')
                    ? 'bg-white text-[#7D2942] font-semibold'
                    : 'text-white/90 hover:bg-white/10' }}"
            >

                <span class="w-6 text-center">
                    ⌂
                </span>

                Dashboard

            </a>


            {{-- PENGGUNA --}}
            <a
                href="{{ route('admin.pengguna') }}"
                class="flex items-center gap-3
                px-4 py-3 rounded-xl
                text-sm transition

                {{ request()->routeIs('admin.pengguna*')
                    ? 'bg-white text-[#7D2942] font-semibold'
                    : 'text-white/90 hover:bg-white/10' }}"
            >

                <span class="w-6 text-center">
                    ♙
                </span>

                Pengguna

            </a>


            {{-- PRODUK --}}
            <a
                href="{{ route('admin.produk') }}"
                class="flex items-center gap-3
                px-4 py-3 rounded-xl
                text-sm transition

                {{ request()->routeIs('admin.produk*')
                    ? 'bg-white text-[#7D2942] font-semibold'
                    : 'text-white/90 hover:bg-white/10' }}"
            >

                <span class="w-6 text-center">
                    ▣
                </span>

                Produk

            </a>


            {{-- PESANAN --}}
            <a
    href="{{ route('admin.pesanan') }}"
    class="flex items-center gap-3
    px-4 py-3 rounded-xl
    text-sm transition

    {{ request()->routeIs('admin.pesanan*')
        ? 'bg-white text-[#7D2942] font-semibold'
        : 'text-white/90 hover:bg-white/10' }}"
>
    <span class="w-6 text-center">
        ▤
    </span>

    Pesanan
</a>


            {{-- LAPORAN --}}
            <a
    href="{{ route('admin.laporan') }}"
    class="flex items-center gap-3
    px-4 py-3 rounded-xl
    text-sm transition

    {{ request()->routeIs('admin.laporan*')
        ? 'bg-white text-[#7D2942] font-semibold'
        : 'text-white/90 hover:bg-white/10' }}"
>
    <span class="w-6 text-center">
        ▥
    </span>

    Laporan
</a>

        </nav>


        {{-- BOTTOM SIDEBAR --}}
        <div class="mt-auto px-5 pb-6">

            <div class="border-t border-white/15 pt-5">

                <div class="bg-white/10 rounded-xl p-4 mb-3">

                    <p class="text-[11px] text-white/55">
                        Lune Attiré
                    </p>

                    <p class="text-sm font-medium mt-1">
                        Admin Workspace
                    </p>

                </div>


                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="w-full flex items-center gap-3
                        px-4 py-3 rounded-xl
                        text-sm text-white/85
                        hover:bg-white/10 transition"
                    >

                        <span>
                            🚪🚶
                        </span>

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </aside>


    {{-- =====================================================
        MAIN
    ====================================================== --}}
    <div class="flex-1 min-w-0">


        {{-- TOPBAR --}}
        <header
            class="h-[76px]
            bg-white
            border-b border-[#EDE2DA]
            flex items-center
            justify-between
            px-8"
        >

            {{-- PAGE TITLE --}}
            <div>

                <p class="text-[10px]
                    uppercase
                    tracking-[0.16em]
                    text-[#A28B83]">

                    Lune Attiré

                </p>

                <h2 class="text-lg
                    font-semibold
                    text-[#493535]
                    mt-1">

                    @yield('page-title', 'Dashboard')

                </h2>

            </div>


            {{-- ADMIN --}}
            <div class="flex items-center gap-3">

                <div
                    class="w-9 h-9 rounded-full
                    bg-[#E9D3D8]
                    text-[#7D2942]
                    flex items-center justify-center
                    font-semibold"
                >
                    A
                </div>

                <div>

                    <p class="text-sm font-medium text-[#493535]">
                        Admin
                    </p>

                    <p class="text-[11px] text-[#A28B83]">
                        Administrator
                    </p>

                </div>

            </div>

        </header>


        {{-- CONTENT --}}
        <main class="p-8">

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>