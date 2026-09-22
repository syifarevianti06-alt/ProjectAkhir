<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Katalog Produk - Lune Attiré</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

    <!-- NAVBAR -->
    <nav class="border-b bg-white">

        <div class="max-w-7xl mx-auto px-6 py-4">

            <div class="flex items-center justify-between">

                <h1 class="text-2xl font-bold">
                    Lune Attiré
                </h1>

                <div class="flex gap-8">

                    <a href="/" class="hover:text-gray-500">
                        Beranda
                    </a>

                    <a href="/produk"
                       class="font-semibold">
                        Produk
                    </a>

                    <a href="/pesanan"
                       class="hover:text-gray-500">
                        Pesanan
                    </a>

                </div>

                <div class="flex gap-4">

                    <a href="/keranjang">
                        🛒
                    </a>

                    <a href="/profil">
                        👤
                    </a>

                </div>

            </div>

        </div>

    </nav>


    <!-- HEADER -->

    <section class="max-w-7xl mx-auto px-6 pt-12">

        <h2 class="text-4xl font-bold">
            Katalog Produk
        </h2>

        <p class="text-gray-500 mt-2">
            Temukan produk fashion pilihan Lune Attiré
        </p>

    </section>


    <!-- SEARCH -->

    <section class="max-w-7xl mx-auto px-6 mt-8">

        <div class="flex flex-col md:flex-row gap-4">

            <input
                type="text"
                placeholder="Cari produk...."
                class="flex-1 border border-gray-300
                       rounded-lg px-4 py-3
                       focus:outline-none
                       focus:ring-2
                       focus:ring-black"
            >

            <select
                class="border border-gray-300
                       rounded-lg px-4 py-3">

                <option>Kategori</option>
                <option>Atasan</option>
                <option>Bawahan</option>
                <option>Dress</option>
                <option>Outer</option>
                <option>Setelan</option>

            </select>

        </div>

    </section>


    <!-- CATEGORY -->

    <section class="max-w-7xl mx-auto px-6 mt-8">

        <div class="flex flex-wrap gap-3">

            <button
                class="bg-black text-white
                       px-5 py-2 rounded-full">

                Semua

            </button>

            <button
                class="border px-5 py-2 rounded-full">

                Atasan

            </button>

            <button
                class="border px-5 py-2 rounded-full">

                Bawahan

            </button>

            <button
                class="border px-5 py-2 rounded-full">

                Dress

            </button>

            <button
                class="border px-5 py-2 rounded-full">

                Outer

            </button>

            <button
                class="border px-5 py-2 rounded-full">

                Setelan

            </button>

        </div>

    </section>


    <!-- PRODUCT -->

    <section class="max-w-7xl mx-auto px-6 py-12">

        <div class="flex justify-between items-center mb-8">

            <p class="text-gray-500">
                8 Produk ditemukan
            </p>

            <select
                class="border rounded-lg px-4 py-2">

                <option>Terbaru</option>
                <option>Harga Terendah</option>
                <option>Harga Tertinggi</option>

            </select>

        </div>


        <div class="grid grid-cols-2
                    md:grid-cols-3
                    lg:grid-cols-4
                    gap-6">


            <!-- PRODUCT 1 -->

            <div class="group">

                <div class="bg-gray-100
                            rounded-xl
                            overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1"
                        class="w-full h-72
                               object-cover
                               group-hover:scale-105
                               transition">

                </div>

                <div class="mt-4">

                    <h3 class="font-medium">
                        Blouse Wanita Kemeja Wanita
                    </h3>

                    <p class="text-sm text-gray-500">
                        Korean Style Casual
                    </p>

                    <p class="font-semibold mt-2">
                        Rp 89.000
                    </p>

                    <a
                        href="/produk/1"
                        class="inline-block
                               mt-3
                               text-sm
                               underline">

                        Lihat Detail

                    </a>

                </div>

            </div>


            <!-- PRODUCT 2 -->

            <div class="group">

                <div class="bg-gray-100
                            rounded-xl
                            overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3"
                        class="w-full h-72
                               object-cover
                               group-hover:scale-105
                               transition">

                </div>

                <div class="mt-4">

                    <h3 class="font-medium">
                        Femes Abelia Blouse Top
                    </h3>

                    <p class="text-sm text-gray-500">
                        Kemeja Wanita Korean Style
                    </p>

                    <p class="font-semibold mt-2">
                        Rp 162.000
                    </p>

                    <a
                        href="/produk/2"
                        class="inline-block
                               mt-3
                               text-sm
                               underline">

                        Lihat Detail

                    </a>

                </div>

            </div>


            <!-- PRODUCT 3 -->

            <div class="group">

                <div class="bg-gray-100
                            rounded-xl
                            overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1576566588028-4147f3842f27"
                        class="w-full h-72
                               object-cover
                               group-hover:scale-105
                               transition">

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

                    <a
                        href="/produk/3"
                        class="inline-block
                               mt-3
                               text-sm
                               underline">

                        Lihat Detail

                    </a>

                </div>

            </div>


            <!-- PRODUCT 4 -->

            <div class="group">

                <div class="bg-gray-100
                            rounded-xl
                            overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1581044777550-4cfa60707c03"
                        class="w-full h-72
                               object-cover
                               group-hover:scale-105
                               transition">

                </div>

                <div class="mt-4">

                    <h3 class="font-medium">
                        Namira Blouse
                    </h3>

                    <p class="text-sm text-gray-500">
                        Katun Mix Stripe
                    </p>

                    <p class="font-semibold mt-2">
                        Rp 99.900
                    </p>

                    <a
                        href="/produk/4"
                        class="inline-block
                               mt-3
                               text-sm
                               underline">

                        Lihat Detail

                    </a>

                </div>

            </div>


            <!-- PRODUCT 5 -->

            <div class="group">

                <div class="bg-gray-100
                            rounded-xl
                            overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1564257577054-5e1e6c6b7b4d"
                        class="w-full h-72
                               object-cover
                               group-hover:scale-105
                               transition">

                </div>

                <div class="mt-4">

                    <h3 class="font-medium">
                        Blouse Casual Wanita
                    </h3>

                    <p class="text-sm text-gray-500">
                        Korean Style
                    </p>

                    <p class="font-semibold mt-2">
                        Rp 89.000
                    </p>

                    <a
                        href="/produk/5"
                        class="inline-block
                               mt-3
                               text-sm
                               underline">

                        Lihat Detail

                    </a>

                </div>

            </div>


            <!-- PRODUCT 6 -->

            <div class="group">

                <div class="bg-gray-100
                            rounded-xl
                            overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b"
                        class="w-full h-72
                               object-cover
                               group-hover:scale-105
                               transition">

                </div>

                <div class="mt-4">

                    <h3 class="font-medium">
                        Blouse Fashion Wanita
                    </h3>

                    <p class="text-sm text-gray-500">
                        Korean Looks
                    </p>

                    <p class="font-semibold mt-2">
                        Rp 109.000
                    </p>

                    <a
                        href="/produk/6"
                        class="inline-block
                               mt-3
                               text-sm
                               underline">

                        Lihat Detail

                    </a>

                </div>

            </div>


            <!-- PRODUCT 7 -->

            <div class="group">

                <div class="bg-gray-100
                            rounded-xl
                            overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1551028719-00167b16eac5"
                        class="w-full h-72
                               object-cover
                               group-hover:scale-105
                               transition">

                </div>

                <div class="mt-4">

                    <h3 class="font-medium">
                        Outer Wanita
                    </h3>

                    <p class="text-sm text-gray-500">
                        Casual Fashion
                    </p>

                    <p class="font-semibold mt-2">
                        Rp 135.000
                    </p>

                    <a
                        href="/produk/7"
                        class="inline-block
                               mt-3
                               text-sm
                               underline">

                        Lihat Detail

                    </a>

                </div>

            </div>


            <!-- PRODUCT 8 -->

            <div class="group">

                <div class="bg-gray-100
                            rounded-xl
                            overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f"
                        class="w-full h-72
                               object-cover
                               group-hover:scale-105
                               transition">

                </div>

                <div class="mt-4">

                    <h3 class="font-medium">
                        Dress Wanita
                    </h3>

                    <p class="text-sm text-gray-500">
                        Korean Fashion
                    </p>

                    <p class="font-semibold mt-2">
                        Rp 149.000
                    </p>

                    <a
                        href="/produk/8"
                        class="inline-block
                               mt-3
                               text-sm
                               underline">

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