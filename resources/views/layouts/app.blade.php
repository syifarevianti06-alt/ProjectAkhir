<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Lune Attiré' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- NAVBAR -->
    <nav class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-6 py-4">

            <div class="flex items-center justify-between">

                //Logo
                <a href="/" class="text-2xl font-bold tracking-wide">
                    Lune Attiré
                </a>

                //Menu
                <div class="flex gap-8 text-sm">

                    <a href="/home" class="hover:text-pink-500">
                        Beranda
                    </a>

                    <a href="/produk" class="hover:text-pink-500">
                        Produk
                    </a>

                    <a href="/pesanan" class="hover:text-pink-500">
                        Pesanan
                    </a>

                    <a href="{{ route('cart.index') }}">
                        Keranjang
                    </a>

                </div>

                //Login
                // PROFIL / LOGIN
                @auth
                <a
                    href="{{ route('profil') }}"
                    class="text-sm hover:text-pink-500 transition">
                    Profil
                </a>
                @else
                <a
                    href="{{ route('login') }}"
                    class="text-sm hover:text-pink-500 transition">
                    Login
                </a>
                @endauth

            </div>

        </div>
    </nav>


    //CONTENT
    <main>
        @yield('content')
    </main>


    //FOOTER
    <footer class="bg-black text-white mt-20">
        <div class="max-w-7xl mx-auto px-6 py-8 text-center">

            <h2 class="text-xl font-bold">
                Lune Attiré
            </h2>

            <p class="text-gray-400 mt-2">
                Fashion pilihan untuk gaya setiap harimu.
            </p>

            <p class="text-gray-500 text-sm mt-5">
                © 2026 Lune Attiré Official Store
            </p>

        </div>
    </footer>

</body>

</html>