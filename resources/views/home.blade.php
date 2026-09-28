@extends('layouts.app')

@section('content')

{{-- ========================= --}}
{{-- HERO BANNER --}}
{{-- ========================= --}}
<section class="bg-[#faf5ef]">

    <div class="max-w-[1400px] mx-auto px-6 pt-5">

        <div
            class="relative h-[380px] overflow-hidden
                   border border-[#ead8d0]
                   bg-cover bg-center"
            style="background-image: url('{{ asset('images/banner.jpeg') }}');"
        >

            {{-- Overlay tipis --}}
            <div class="absolute inset-0 bg-white/20"></div>


            {{-- Ornamen kiri --}}
            <div class="absolute left-8 top-8 text-[#b98585] text-2xl">
                ✦
            </div>


            {{-- TEXT HERO --}}
            <div
                class="relative z-10 flex h-full
                       max-w-[650px] flex-col
                       justify-center px-12"
            >

                <h1
                    class="font-serif text-4xl
                           font-bold leading-tight
                           text-[#211919] md:text-5xl"
                >
                    Tampil Stylish, Jadi
                    <br>
                    Dirimu Sendiri
                </h1>


                <p
                    class="mt-4 max-w-[500px]
                           font-serif text-base
                           font-semibold leading-7
                           text-[#302727]"
                >
                    Temukan koleksi fashion pilihan untuk
                    melengkapi gaya setiap harimu.
                </p>


                <a
                    href="/produk"
                    class="mt-7 w-fit rounded-md
                           bg-[#955f60]
                           px-6 py-2.5
                           font-serif font-semibold
                           text-white
                           transition hover:bg-[#7d4d4e]"
                >
                    Belanja Sekarang
                </a>

            </div>

        </div>

    </div>

</section>



{{-- ========================= --}}
{{-- PRODUK TERBARU --}}
{{-- ========================= --}}
<section class="bg-[#faf5ef]">

    <div class="max-w-[1400px] mx-auto px-8 py-5">


        {{-- JUDUL --}}
        <div class="mb-3">

            <h2
                class="font-serif text-3xl
                       font-bold text-[#211919]"
            >
                Produk Terbaru
            </h2>

            <p
                class="mt-1 font-serif
                       text-sm font-semibold
                       text-[#302727]"
            >
                5 produk ditemukan
            </p>

        </div>


        {{-- PRODUK --}}
        <div
            class="grid grid-cols-1 gap-6
                   sm:grid-cols-2
                   lg:grid-cols-5"
        >


            {{-- PRODUK 1 --}}
            <div
                class="overflow-hidden rounded-xl
                       bg-[#f0eeeb] shadow-sm"
            >

                <div class="h-[220px] overflow-hidden">

                    <img
                        src="{{ asset('images/produk1.jpg') }}"
                        alt="Femes Abelia Blouse"
                        class="h-full w-full object-cover
                               transition duration-300
                               hover:scale-105"
                    >

                </div>


                <div class="p-3">

                    <p class="text-[10px] font-semibold text-gray-500">
                        Atasan
                    </p>

                    <h3
                        class="mt-1 min-h-[40px]
                               font-serif text-xs
                               font-bold leading-4
                               text-[#292323]"
                    >
                        Femes - Abelia Blouse Top Kemeja
                        Wanita Korean Style
                    </h3>

                    <p
                        class="mt-2 font-serif
                               text-sm font-bold"
                    >
                        Rp 162.000,00
                    </p>

                    <a
                        href="/produk/1"
                        class="mt-2 block rounded-full
                               bg-[#921f45]
                               py-1.5 text-center
                               text-[11px] font-bold
                               text-white
                               hover:bg-[#741735]"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>



            {{-- PRODUK 2 --}}
            <div
                class="overflow-hidden rounded-xl
                       bg-[#f0eeeb] shadow-sm"
            >

                <div class="h-[220px] overflow-hidden">

                    <img
                        src="{{ asset('images/produk2.jpg') }}"
                        alt="Blouse Fashion Wanita"
                        class="h-full w-full object-cover
                               transition duration-300
                               hover:scale-105"
                    >

                </div>


                <div class="p-3">

                    <p class="text-[10px] font-semibold text-gray-500">
                        Atasan
                    </p>

                    <h3
                        class="mt-1 min-h-[40px]
                               font-serif text-xs
                               font-bold leading-4"
                    >
                        Blouse Fashion Wanita Lengan
                        Panjang Korean Looks
                    </h3>

                    <p
                        class="mt-2 font-serif
                               text-sm font-bold"
                    >
                        Rp 109.000,00
                    </p>

                    <a
                        href="/produk/2"
                        class="mt-2 block rounded-full
                               bg-[#921f45]
                               py-1.5 text-center
                               text-[11px] font-bold
                               text-white
                               hover:bg-[#741735]"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>



            {{-- PRODUK 3 --}}
            <div
                class="overflow-hidden rounded-xl
                       bg-[#f0eeeb] shadow-sm"
            >

                <div class="h-[220px] overflow-hidden">

                    <img
                        src="{{ asset('images/produk3.jpg') }}"
                        alt="MYCASSI Sweater"
                        class="h-full w-full object-cover
                               transition duration-300
                               hover:scale-105"
                    >

                </div>


                <div class="p-3">

                    <p class="text-[10px] font-semibold text-gray-500">
                        Atasan
                    </p>

                    <h3
                        class="mt-1 min-h-[40px]
                               font-serif text-xs
                               font-bold leading-4"
                    >
                        MYCASSI Sweater Wanita Plaid
                        Longsleeve Polo Sweatshirt Preppy
                    </h3>

                    <p
                        class="mt-2 font-serif
                               text-sm font-bold"
                    >
                        Rp 182.360,00
                    </p>

                    <a
                        href="/produk/3"
                        class="mt-2 block rounded-full
                               bg-[#921f45]
                               py-1.5 text-center
                               text-[11px] font-bold
                               text-white
                               hover:bg-[#741735]"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>



            {{-- PRODUK 4 --}}
            <div
                class="overflow-hidden rounded-xl
                       bg-[#f0eeeb] shadow-sm"
            >

                <div class="h-[220px] overflow-hidden">

                    <img
                        src="{{ asset('images/produk4.jpg') }}"
                        alt="Namira Blouse"
                        class="h-full w-full object-cover
                               transition duration-300
                               hover:scale-105"
                    >

                </div>


                <div class="p-3">

                    <p class="text-[10px] font-semibold text-gray-500">
                        Atasan
                    </p>

                    <h3
                        class="mt-1 min-h-[40px]
                               font-serif text-xs
                               font-bold leading-4"
                    >
                        Namira Blouse Kemeja Katun Mix
                        Stripe dan Renda
                    </h3>

                    <p
                        class="mt-2 font-serif
                               text-sm font-bold"
                    >
                        Rp 99.900,00
                    </p>

                    <a
                        href="/produk/4"
                        class="mt-2 block rounded-full
                               bg-[#921f45]
                               py-1.5 text-center
                               text-[11px] font-bold
                               text-white
                               hover:bg-[#741735]"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>



            {{-- PRODUK 5 --}}
            <div
                class="overflow-hidden rounded-xl
                       bg-[#f0eeeb] shadow-sm"
            >

                <div class="h-[220px] overflow-hidden">

                    <img
                        src="{{ asset('images/produk5.jpg') }}"
                        alt="Blouse Wanita"
                        class="h-full w-full object-cover
                               transition duration-300
                               hover:scale-105"
                    >

                </div>


                <div class="p-3">

                    <p class="text-[10px] font-semibold text-gray-500">
                        Atasan
                    </p>

                    <h3
                        class="mt-1 min-h-[40px]
                               font-serif text-xs
                               font-bold leading-4"
                    >
                        Blouse Wanita Kemeja Wanita
                        Korean Style Casual
                    </h3>

                    <p
                        class="mt-2 font-serif
                               text-sm font-bold"
                    >
                        Rp 89.000,00
                    </p>

                    <a
                        href="/produk/5"
                        class="mt-2 block rounded-full
                               bg-[#921f45]
                               py-1.5 text-center
                               text-[11px] font-bold
                               text-white
                               hover:bg-[#741735]"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection