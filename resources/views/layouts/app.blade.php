<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Lune Attiré' }}</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

    <nav class="border-b bg-white">

    <div class="max-w-7xl mx-auto px-6 py-5">

        <div class="flex items-center justify-between">

            <!-- LOGO -->
            <a href="/" class="text-2xl font-bold tracking-wide">
                Lune Attiré
            </a>


            <!-- MENU -->
            <div class="hidden md:flex items-center gap-8">

                <a
                    href="/"
                    class="text-sm hover:text-pink-500"
                >
                    Beranda
                </a>

                <a
                    href="/produk"
                    class="text-sm hover:text-pink-500"
                >
                    Produk
                </a>

                <a
                    href="/pesanan"
                    class="text-sm hover:text-pink-500"
                >
                    Pesanan
                </a>

            </div>


            <!-- MENU KANAN -->
            <div class="flex items-center gap-3">

                <a
                    href="/keranjang"
                    class="border px-4 py-2 rounded-lg text-sm hover:bg-gray-100"
                >
                    Keranjang
                </a>

                <a
                    href="/profil"
                    class="border border-gray-800 px-4 py-2 rounded-lg text-sm hover:bg-gray-800 hover:text-white"
                >
                    Profil
                </a>

            </div>

        </div>

    </div>

</nav>

    <!-- ISI HALAMAN -->
    @yield('content')


    <!-- FOOTER -->
    <footer class="border-t mt-20">
        <div class="max-w-7xl mx-auto px-6 py-10 text-center">

            <h2 class="font-bold text-xl">
                Lune Attiré
            </h2>

            <p class="text-gray-500 text-sm mt-2">
                Tampil Stylish, Jadi Dirimu Sendiri
            </p>

            <p class="text-gray-400 text-xs mt-5">
                © 2026 Lune Attiré Official Store
            </p>

        </div>
    </footer>

</body>
</html>