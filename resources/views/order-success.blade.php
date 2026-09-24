@extends('layouts.app')

@section('content')

<div class="min-h-[calc(100vh-80px)] bg-[#f8f1eb] px-6 py-12">

    <!-- CONTENT -->
    <div class="max-w-xl mx-auto text-center">


       <!-- ICON SUKSES -->
<div class="flex justify-center mb-6">

    <div class="w-[72px] h-[72px]
                rounded-full
                bg-[#8b203d]
                flex items-center justify-center">

        <span class="text-white text-4xl font-bold leading-none">
            ✓
        </span>

    </div>

</div>

        <!-- JUDUL -->
        <h1 class="text-3xl font-bold text-[#3f2528]">
            Pesanan Berhasil!
        </h1>


        <!-- SUBTITLE -->
        <p class="text-sm text-[#a18b8b] mt-3">
            Terima kasih, pesanan kamu telah berhasil dibuat.
        </p>


        <!-- DETAIL PESANAN -->
        <div class="bg-white rounded-xl p-7 mt-8
                    text-left shadow-sm">


            <!-- BARIS ATAS -->
            <div class="grid grid-cols-2 gap-8">

                <!-- NOMOR PESANAN -->
                <div>

                    <p class="text-xs text-[#a18b8b]">
                        Nomor pesanan
                    </p>

                    <p class="font-bold text-sm text-[#3f2528] mt-1">
                        LA-53503679
                    </p>

                </div>


                <!-- TOTAL -->
                <div>

                    <p class="text-xs text-[#a18b8b]">
                        Total pembayaran
                    </p>

                    <p class="font-bold text-sm text-[#3f2528] mt-1">
                        Rp 162.000,00
                    </p>

                </div>

            </div>


            <!-- BARIS KEDUA -->
            <div class="grid grid-cols-2 gap-8 mt-5">

                <!-- METODE -->
                <div>

                    <p class="text-xs text-[#a18b8b]">
                        Metode pembayaran
                    </p>

                    <p class="font-bold text-sm text-[#3f2528] mt-1">
                        QRIS
                    </p>

                </div>


                <!-- ESTIMASI -->
                <div>

                    <p class="text-xs text-[#a18b8b]">
                        Estimasi pengiriman
                    </p>

                    <p class="font-bold text-sm text-[#3f2528] mt-1">
                        2–3 hari kerja
                    </p>

                </div>

            </div>


            <!-- ALAMAT -->
            <div class="mt-5">

                <p class="text-xs text-[#a18b8b]">
                    Alamat pengiriman
                </p>

                <p class="font-bold text-sm text-[#3f2528] mt-1">
                    Rina Amalia • Jl. Mawar No. 12 RT 03/RW 01, Bandung
                </p>

            </div>

        </div>


        <!-- TOMBOL -->
        <div class="grid grid-cols-2 gap-4 mt-8">

            <!-- LIHAT PESANAN -->
            <a
                href="/pesanan"
                class="py-3 rounded-lg
                       border-2 border-[#8b203d]
                       bg-white
                       text-[#8b203d]
                       text-sm font-semibold
                       hover:bg-[#faf0f3]
                       transition"
            >
                Lihat pesanan
            </a>


            <!-- KEMBALI -->
            <a
                href="/"
                class="py-3 rounded-lg
                       bg-[#8b203d]
                       text-white
                       text-sm font-semibold
                       hover:bg-[#741a34]
                       transition"
            >
                Kembali ke Beranda
            </a>

        </div>


    </div>

</div>

@endsection