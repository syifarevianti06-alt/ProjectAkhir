<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lune Attiré</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

    <!-- NAVBAR -->
    <nav class="border-b bg-white">
        <div class="max-w-7xl mx-auto px-6 py-4">

            <div class="flex items-center justify-between">

                <!-- LOGO -->
                <h1 class="text-2xl font-bold tracking-wide">
                    Lune Attiré
                </h1>

                <!-- MENU -->
                <div class="hidden md:flex gap-8">

                    <a href="/" class="hover:text-gray-500">
                        Beranda
                    </a>

                    <a href="/produk" class="hover:text-gray-500">
                        Produk
                    </a>

                    <a href="/pesanan" class="hover:text-gray-500">
                        Pesanan
                    </a>

                </div>

                <!-- ICON / LOGIN -->
                <div class="flex gap-4">

                    <a href="/keranjang"
                       class="hover:text-gray-500">
                        🛒
                    </a>

                    <a href="/profil"
                       class="hover:text-gray-500">
                        👤
                    </a>

                </div>

            </div>

        </div>
    </nav>


    <!-- HERO -->
    <section class="bg-gray-100">

        <div class="max-w-7xl mx-auto px-6 py-20">

            <div class="grid md:grid-cols-2 items-center gap-10">

                <!-- TEXT -->
                <div>

                    <p class="text-sm uppercase tracking-widest mb-4">
                        Lune Attiré
                    </p>

                    <h2 class="text-5xl font-bold leading-tight mb-6">
                        Tampil Stylish,
                        <br>
                        Jadi Dirimu Sendiri
                    </h2>

                    <p class="text-gray-600 mb-8 max-w-lg">
                        Temukan koleksi fashion pilihan untuk
                        melengkapi gaya setiap harimu.
                    </p>

                    <a href="/produk"
                       class="inline-block bg-black text-white px-7 py-3 rounded-lg hover:bg-gray-800">

                        Belanja Sekarang

                    </a>

                </div>

                <!-- GAMBAR -->
                <div>

                    <img
                        src="https://images.unsplash.com/photo-1496747611176-843222e1e57c"
                        alt="Fashion"
                        class="w-full h-[500px] object-cover rounded-2xl"
                    >

                </div>

            </div>

        </div>

    </section>


    <!-- PRODUK TERBARU -->
    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h2 class="text-3xl font-bold">
                    Produk Terbaru
                </h2>

                <p class="text-gray-500 mt-2">
                    5 produk ditemukan
                </p>

            </div>

            <a href="/produk"
               class="text-sm underline">
                Lihat Semua
            </a>

        </div>


        <!-- PRODUCT GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">


            <!-- PRODUK 1 -->
            <div class="group">

                <div class="bg-gray-100 rounded-xl overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1"
                        alt="Blouse"
                        class="w-full h-64 object-cover group-hover:scale-105 transition"
                    >

                </div>

                <div class="mt-4">

                    <h3 class="font-medium">
                        Femes - Abelia Blouse Top
                    </h3>

                    <p class="text-sm text-gray-500">
                        Kemeja Wanita Korean Style
                    </p>

                    <p class="font-semibold mt-2">
                        Rp 162.000
                    </p>

                    <a href="/produk/1"
                       class="block mt-3 text-sm underline">

                        Lihat Detail

                    </a>

                </div>

            </div>


            <!-- PRODUK 2 -->
            <div class="group">

                <div class="bg-gray-100 rounded-xl overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3"
                        alt="Blouse"
                        class="w-full h-64 object-cover group-hover:scale-105 transition"
                    >

                </div>

                <div class="mt-4">

                    <h3 class="font-medium">
                        Blouse Fashion Wanita
                    </h3>

                    <p class="text-sm text-gray-500">
                        Atasan Lucu Lengan Panjang
                    </p>

                    <p class="font-semibold mt-2">
                        Rp 109.000
                    </p>

                    <a href="/produk/2"
                       class="block mt-3 text-sm underline">

                        Lihat Detail

                    </a>

                </div>

            </div>


            <!-- PRODUK 3 -->
            <div class="group">

                <div class="bg-gray-100 rounded-xl overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1576566588028-4147f3842f27"
                        alt="Sweater"
                        class="w-full h-64 object-cover group-hover:scale-105 transition"
                    >

                </div>

                <div class="mt-4">

                    <h3 class="font-medium">
                        MYCASSI Sweater Wanita
                    </h3>

                    <p class="text-sm text-gray-500">
                        Plaid Longsleeve Polo
                    </p>

                    <p class="font-semibold mt-2">
                        Rp 182.360
                    </p>

                    <a href="/produk/3"
                       class="block mt-3 text-sm underline">

                        Lihat Detail

                    </a>

                </div>

            </div>


            <!-- PRODUK 4 -->
            <div class="group">

                <div class="bg-gray-100 rounded-xl overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1581044777550-4cfa60707c03"
                        alt="Kemeja"
                        class="w-full h-64 object-cover group-hover:scale-105 transition"
                    >

                </div>

                <div class="mt-4">

                    <h3 class="font-medium">
                        Namira Blouse
                    </h3>

                    <p class="text-sm text-gray-500">
                        Kemeja Katun Mix
                    </p>

                    <p class="font-semibold mt-2">
                        Rp 99.900
                    </p>

                    <a href="/produk/4"
                       class="block mt-3 text-sm underline">

                        Lihat Detail

                    </a>

                </div>

            </div>


            <!-- PRODUK 5 -->
            <div class="group">

                <div class="bg-gray-100 rounded-xl overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1564257577054-5e1e6c6b7b4d"
                        alt="Blouse"
                        class="w-full h-64 object-cover group-hover:scale-105 transition"
                    >

                </div>

                <div class="mt-4">

                    <h3 class="font-medium">
                        Blouse Wanita
                    </h3>

                    <p class="text-sm text-gray-500">
                        Korean Style Casual
                    </p>

                    <p class="font-semibold mt-2">
                        Rp 89.000
                    </p>

                    <a href="/produk/5"
                       class="block mt-3 text-sm underline">

                        Lihat Detail

                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- FOOTER -->
    <footer class="border-t">

        <div class="max-w-7xl mx-auto px-6 py-8">

            <h2 class="font-bold text-xl">
                Lune Attiré
            </h2>

            <p class="text-gray-500 mt-2">
                Toko fashion pilihan untuk gaya kamu.
            </p>

        </div>

    </footer>

</body>
</html>