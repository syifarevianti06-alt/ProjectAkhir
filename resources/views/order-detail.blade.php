@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-12">

    <!-- HEADER -->
    <div class="mb-8">

        <a href="/pesanan"
           class="text-sm text-gray-500 hover:text-black">
            ← Kembali ke Pesanan Saya
        </a>

        <h1 class="text-3xl font-bold mt-4">
            Detail Pesanan
        </h1>

        <p class="text-gray-500 mt-2">
            Nomor pesanan: {{ $id }}
        </p>

    </div>


    <!-- STATUS -->
    <div class="border rounded-xl p-6">

        <div class="flex flex-wrap justify-between items-center gap-4">

            <div>
                <p class="text-sm text-gray-500">
                    Status pesanan
                </p>

                <p class="font-bold text-lg mt-1">
                    Dikirim
                </p>
            </div>

            <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                Dikirim
            </span>

        </div>

    </div>


    <!-- PRODUK -->
    <div class="border rounded-xl p-6 mt-6">

        <h2 class="text-xl font-bold mb-6">
            Produk
        </h2>

        <div class="flex flex-col sm:flex-row gap-5">

            <!-- FOTO -->
            <div class="w-full sm:w-32 h-36 bg-gray-100 rounded-lg flex items-center justify-center">

                <span class="text-sm text-gray-400">
                    Foto Produk
                </span>

            </div>


            <!-- INFORMASI -->
            <div class="flex-1">

                <h3 class="font-semibold text-lg">
                    Femes - Abelia Blouse Top
                </h3>

                <p class="text-gray-500 mt-1">
                    Kemeja Wanita Korean Style
                </p>

                <div class="mt-4 space-y-1 text-sm">

                    <p>
                        Ukuran:
                        <span class="font-medium">S</span>
                    </p>

                    <p>
                        Warna:
                        <span class="font-medium">Biru Muda</span>
                    </p>

                    <p>
                        Jumlah:
                        <span class="font-medium">1</span>
                    </p>

                </div>

            </div>


            <!-- HARGA -->
            <div class="sm:text-right">

                <p class="text-sm text-gray-500">
                    Harga
                </p>

                <p class="font-bold text-lg mt-1">
                    Rp162.000
                </p>

            </div>

        </div>

    </div>


    <!-- ALAMAT & PEMBAYARAN -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

        <!-- ALAMAT -->
        <div class="border rounded-xl p-6">

            <h2 class="font-bold text-lg mb-4">
                Alamat Pengiriman
            </h2>

            <p class="font-semibold">
                Rina Amalia
            </p>

            <p class="text-gray-600 mt-2">
                081234567890
            </p>

            <p class="text-gray-600 mt-1">
                Jl. Mawar No. 12 RT 03/RW 01
            </p>

            <p class="text-gray-600">
                Bandung, 40132
            </p>

        </div>


        <!-- PEMBAYARAN -->
        <div class="border rounded-xl p-6">

            <h2 class="font-bold text-lg mb-4">
                Pembayaran
            </h2>

            <p class="text-gray-600">
                Metode pembayaran
            </p>

            <p class="font-semibold mt-1">
                QRIS
            </p>

        </div>

    </div>


    <!-- TOTAL -->
    <div class="border rounded-xl p-6 mt-6">

        <div class="flex justify-between text-gray-600">
            <span>Subtotal</span>
            <span>Rp162.000</span>
        </div>

        <div class="border-t mt-4 pt-4 flex justify-between text-xl font-bold">

            <span>
                Total pembayaran
            </span>

            <span>
                Rp162.000
            </span>

        </div>

    </div>


    <!-- BUTTON -->
    <div class="flex justify-end mt-6">

        <a
            href="/pesanan"
            class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800"
        >
            Kembali ke Pesanan
        </a>

    </div>

</div>

@endsection@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-12">

    <!-- HEADER -->
    <div class="mb-8">

        <a href="/pesanan"
           class="text-sm text-gray-500 hover:text-black">
            ← Kembali ke Pesanan Saya
        </a>

        <h1 class="text-3xl font-bold mt-4">
            Detail Pesanan
        </h1>

        <p class="text-gray-500 mt-2">
            Nomor pesanan: {{ $id }}
        </p>

    </div>


    <!-- STATUS -->
    <div class="border rounded-xl p-6">

        <div class="flex flex-wrap justify-between items-center gap-4">

            <div>
                <p class="text-sm text-gray-500">
                    Status pesanan
                </p>

                <p class="font-bold text-lg mt-1">
                    Dikirim
                </p>
            </div>

            <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                Dikirim
            </span>

        </div>

    </div>


    <!-- PRODUK -->
    <div class="border rounded-xl p-6 mt-6">

        <h2 class="text-xl font-bold mb-6">
            Produk
        </h2>

        <div class="flex flex-col sm:flex-row gap-5">

            <!-- FOTO -->
            <div class="w-full sm:w-32 h-36 bg-gray-100 rounded-lg flex items-center justify-center">

                <span class="text-sm text-gray-400">
                    Foto Produk
                </span>

            </div>


            <!-- INFORMASI -->
            <div class="flex-1">

                <h3 class="font-semibold text-lg">
                    Femes - Abelia Blouse Top
                </h3>

                <p class="text-gray-500 mt-1">
                    Kemeja Wanita Korean Style
                </p>

                <div class="mt-4 space-y-1 text-sm">

                    <p>
                        Ukuran:
                        <span class="font-medium">S</span>
                    </p>

                    <p>
                        Warna:
                        <span class="font-medium">Biru Muda</span>
                    </p>

                    <p>
                        Jumlah:
                        <span class="font-medium">1</span>
                    </p>

                </div>

            </div>


            <!-- HARGA -->
            <div class="sm:text-right">

                <p class="text-sm text-gray-500">
                    Harga
                </p>

                <p class="font-bold text-lg mt-1">
                    Rp162.000
                </p>

            </div>

        </div>

    </div>


    <!-- ALAMAT & PEMBAYARAN -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

        <!-- ALAMAT -->
        <div class="border rounded-xl p-6">

            <h2 class="font-bold text-lg mb-4">
                Alamat Pengiriman
            </h2>

            <p class="font-semibold">
                Rina Amalia
            </p>

            <p class="text-gray-600 mt-2">
                081234567890
            </p>

            <p class="text-gray-600 mt-1">
                Jl. Mawar No. 12 RT 03/RW 01
            </p>

            <p class="text-gray-600">
                Bandung, 40132
            </p>

        </div>


        <!-- PEMBAYARAN -->
        <div class="border rounded-xl p-6">

            <h2 class="font-bold text-lg mb-4">
                Pembayaran
            </h2>

            <p class="text-gray-600">
                Metode pembayaran
            </p>

            <p class="font-semibold mt-1">
                QRIS
            </p>

        </div>

    </div>


    <!-- TOTAL -->
    <div class="border rounded-xl p-6 mt-6">

        <div class="flex justify-between text-gray-600">
            <span>Subtotal</span>
            <span>Rp162.000</span>
        </div>

        <div class="border-t mt-4 pt-4 flex justify-between text-xl font-bold">

            <span>
                Total pembayaran
            </span>

            <span>
                Rp162.000
            </span>

        </div>

    </div>


    <!-- BUTTON -->
    <div class="flex justify-end mt-6">

        <a
            href="/pesanan"
            class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800"
        >
            Kembali ke Pesanan
        </a>

    </div>

</div>

@endsection