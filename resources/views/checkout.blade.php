@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#faf5ef]">

    <div class="max-w-[1400px] mx-auto px-8 py-14">

        {{-- JUDUL --}}
        <h1 class="mb-14 font-serif text-4xl font-bold text-[#171414]">
            Checkout
        </h1>


        {{-- CONTENT --}}
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-3">


            {{-- ========================= --}}
            {{-- BAGIAN KIRI --}}
            {{-- ========================= --}}
            <div class="space-y-8 lg:col-span-2">


                {{-- ALAMAT PENGIRIMAN --}}
                <div
                    class="rounded-2xl border border-[#eadfe0]
                           bg-white p-7 shadow-sm"
                >

                    {{-- Header --}}
                    <div class="mb-5 flex items-center justify-between">

                        <h2 class="text-lg font-bold text-[#292323]">
                            Alamat Pengiriman
                        </h2>

                        <div class="flex gap-3">

                            <button
                                type="button"
                                class="rounded-lg border-2 border-[#8b2948]
                                       px-5 py-2 text-sm font-semibold
                                       text-[#8b2948]
                                       transition hover:bg-[#8b2948]
                                       hover:text-white"
                            >
                                Ubah
                            </button>

                            <button
                                type="button"
                                class="rounded-lg bg-[#8b2948]
                                       px-5 py-2 text-sm font-semibold
                                       text-white
                                       transition hover:bg-[#711f39]"
                            >
                                + Tambah
                            </button>

                        </div>

                    </div>


                    {{-- ALAMAT UTAMA --}}
                    <div
                        class="rounded-xl border-2 border-[#8b2948]
                               bg-[#fdf8f4] px-6 py-5"
                    >

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="font-bold text-[#302727]">
                                    Rina Amalia
                                    <span class="font-normal">
                                        • 081234567890
                                    </span>
                                </p>

                                <p class="mt-3 text-sm text-[#665b5b]">
                                    Jl. Mawar No. 12 RT 03/RW 01, Bandung, 40132
                                </p>

                            </div>


                            {{-- LABEL UTAMA --}}
                            <span
                                class="rounded-full bg-[#f2c2cf]
                                       px-4 py-1 text-xs
                                       font-semibold text-[#8b2948]"
                            >
                                Utama
                            </span>

                        </div>

                    </div>

                </div>



                {{-- ========================= --}}
                {{-- METODE PEMBAYARAN --}}
                {{-- ========================= --}}
                <div
                    class="rounded-2xl border border-[#eadfe0]
                           bg-white p-7 shadow-sm"
                >

                    <h2 class="mb-6 text-lg font-bold text-[#292323]">
                        Metode Pembayaran
                    </h2>


                    {{-- QRIS --}}
                    <label
                        class="flex cursor-pointer items-center
                               justify-between rounded-xl
                               border-2 border-[#8b2948]
                               bg-[#fdf8f4]
                               px-5 py-4"
                    >

                        <div class="flex items-center gap-4">

                            {{-- ICON QRIS --}}
                            <div
                                class="flex h-11 w-11 items-center
                                       justify-center rounded-lg
                                       bg-[#f2bfd0]"
                            >
                            </div>


                            <div>

                                <p class="font-bold text-[#302727]">
                                    QRIS
                                </p>

                                <p class="text-sm text-gray-500">
                                    Scan QR dari aplikasi apapun
                                </p>

                            </div>

                        </div>


                        {{-- RADIO --}}
                        <input
                            type="radio"
                            name="payment"
                            value="qris"
                            checked
                            class="h-5 w-5 accent-[#8b2948]"
                        >

                    </label>

                </div>

            </div>



            {{-- ========================= --}}
            {{-- BAGIAN KANAN --}}
            {{-- ========================= --}}
            <div>

                <div
                    class="rounded-2xl border border-[#eadfe0]
                           bg-white p-7 shadow-sm"
                >

                    <h2 class="mb-6 text-lg font-bold text-[#292323]">
                        Ringkasan Pesanan
                    </h2>


                    {{-- PRODUK --}}
                    <div class="flex gap-4">

                        {{-- FOTO PRODUK --}}
                        <div
                            class="h-[118px] w-[118px]
                                   shrink-0 overflow-hidden
                                   rounded-xl bg-[#f1eee9]"
                        >

                            <img
                                src="{{ asset('images/produk.jpg') }}"
                                alt="Produk"
                                class="h-full w-full object-cover"
                            >

                        </div>


                        {{-- DETAIL PRODUK --}}
                        <div class="flex-1">

                            <h3
                                class="font-serif text-sm
                                       font-bold leading-5
                                       text-[#292323]"
                            >
                                Femes - Abelia Blouse Top
                            </h3>

                            <p class="mt-1 text-sm text-[#5f5555]">
                                Kemeja Wanita Korean Style
                            </p>

                            <p class="mt-2 text-sm text-gray-500">
                                x1
                            </p>

                        </div>

                    </div>


                    {{-- SUBTOTAL --}}
                    <div
                        class="mt-6 flex justify-between
                               text-sm text-[#665b5b]"
                    >

                        <span>
                            Subtotal
                        </span>

                        <span class="text-[#8b2948]">
                            Rp 162.000,00
                        </span>

                    </div>


                    {{-- TOTAL --}}
                    <div
                        class="mt-3 flex items-center
                               justify-between"
                    >

                        <span
                            class="text-base font-bold text-[#292323]"
                        >
                            Total pembayaran
                        </span>

                        <span
                            class="text-lg font-bold
                                   text-[#8b2948]"
                        >
                            Rp 162.000,00
                        </span>

                    </div>


                    {{-- BAYAR --}}
                    <a
                        href="/pembayaran"
                        class="mt-6 block w-full rounded-xl
                               bg-[#8b2948]
                               py-4 text-center
                               font-semibold text-white
                               transition hover:bg-[#711f39]"
                    >
                        Bayar sekarang
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection