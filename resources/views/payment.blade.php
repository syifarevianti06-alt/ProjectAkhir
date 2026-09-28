@extends('layouts.app')

@section('content')

<div class="min-h-[calc(100vh-80px)] bg-[#f8f1eb] py-10 px-6">

    <!-- JUDUL -->
    <div class="text-center mb-6">

        <h1 class="text-3xl font-bold text-[#3f2528]">
            Pembayaran QRIS
        </h1>

        <p class="text-sm text-[#9b8585] mt-3">
            Scan QR code di bawah untuk menyelesaikan pembayaran
        </p>

    </div>


    <!-- CARD PEMBAYARAN -->
    <div class="w-full max-w-[500px] mx-auto bg-white
                rounded-[22px] border border-[#eadede]
                shadow-sm p-7 md:p-9">


        <!-- NOMOR PESANAN & TOTAL -->
        <div class="flex justify-between items-start mb-7">

            <!-- NOMOR PESANAN -->
            <div>
                <p class="text-xs text-[#b29c9c]">
                    Nomor pesanan
                </p>

                <p class="font-bold text-[#8b203d] mt-1">
                    LA-53503679
                </p>
            </div>


            <!-- TOTAL -->
            <div class="text-right">

                <p class="text-xs text-[#b29c9c]">
                    Total pembayaran
                </p>

                <p class="font-bold text-[#8b203d] mt-1">
                    Rp 162.000,00
                </p>

            </div>

        </div>


        <!-- QR CODE -->
        <div class="flex justify-center">

            <div class="p-2 border-2 border-[#8b203d] rounded-[16px]">

                <img
                    src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=LuneAttire-LA-53503679-Rp162000"
                    alt="QR Pembayaran"
                    class="w-[210px] h-[210px] object-contain"
                >

            </div>

        </div>


        <!-- STATUS -->
        <div class="flex justify-center items-center gap-1.5 mt-4">

            <span class="w-2 h-2 bg-green-500 rounded-full"></span>

            <p class="text-sm font-medium text-green-600">
                Berlaku 9:20
            </p>

        </div>


        <!-- CARA PEMBAYARAN -->
        <div class="bg-[#faf5ef] rounded-xl p-4 mt-7">

            <h2 class="font-bold text-sm text-[#3f2528] mb-3">
                Cara pembayaran :
            </h2>


            <div class="space-y-2.5 text-xs text-[#6f5d5d]">

                <!-- 1 -->
                <div class="flex items-start gap-3">

                    <span class="flex-shrink-0 flex items-center justify-center
                                 w-4 h-4 rounded-full bg-[#8b203d]
                                 text-white text-[9px] font-bold">
                        1
                    </span>

                    <p>
                        Buka aplikasi e-wallet atau mobile banking kamu
                    </p>

                </div>


                <!-- 2 -->
                <div class="flex items-start gap-3">

                    <span class="flex-shrink-0 flex items-center justify-center
                                 w-4 h-4 rounded-full bg-[#8b203d]
                                 text-white text-[9px] font-bold">
                        2
                    </span>

                    <p>
                        Pilih menu Scan QR atau QRIS
                    </p>

                </div>


                <!-- 3 -->
                <div class="flex items-start gap-3">

                    <span class="flex-shrink-0 flex items-center justify-center
                                 w-4 h-4 rounded-full bg-[#8b203d]
                                 text-white text-[9px] font-bold">
                        3
                    </span>

                    <p>
                        Arahkan kamera ke QR code di atas
                    </p>

                </div>


                <!-- 4 -->
                <div class="flex items-start gap-3">

                    <span class="flex-shrink-0 flex items-center justify-center
                                 w-4 h-4 rounded-full bg-[#8b203d]
                                 text-white text-[9px] font-bold">
                        4
                    </span>

                    <p>
                        Periksa nominal dan konfirmasi pembayaran
                    </p>

                </div>

            </div>

        </div>


        <!-- BUTTON -->
        <a
            href="/pesanan-berhasil"
            class="block w-full text-center
                   bg-[#8b203d] text-white
                   py-3 rounded-lg mt-6
                   text-sm font-semibold
                   hover:bg-[#741a34] transition"
        >
            Saya Sudah Bayar
        </a>

    </div>

</div>

@endsection