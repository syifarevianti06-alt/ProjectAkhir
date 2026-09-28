@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f8f1eb]">

    <div class="max-w-[1180px] mx-auto px-6 py-10">

        <!-- JUDUL -->
        <div class="mb-5">

            <h1 class="font-serif text-3xl font-bold text-[#302424]">
                Katalog Produk
            </h1>

            <p class="mt-2 text-sm text-[#9b8585]">
                Temukan produk fashion pilihan Lune Attiré
            </p>

        </div>


        <!-- SEARCH + FILTER -->
        <div class="flex items-center gap-2 mb-5">

            <!-- SEARCH -->
            <div class="w-[215px] shrink-0">

                <input
                    type="text"
                    placeholder="Cari produk...."
                    class="w-full h-[35px]
                           rounded-lg
                           border border-[#e2d5d2]
                           bg-white
                           px-4
                           text-xs
                           text-[#555]
                           outline-none
                           placeholder:text-[#9b9090]
                           focus:border-[#8d1f42]"
                >

            </div>


            <!-- LABEL KATEGORI -->
            <span class="text-xs text-[#8e7b7b] whitespace-nowrap">
                Kategori:
            </span>


            <!-- FILTER -->
            <button
                class="h-[35px] px-5
                       rounded-full
                       bg-[#8d1f42]
                       text-white
                       text-xs
                       font-medium">
                Semua
            </button>

            <button
                class="h-[35px] px-5
                       rounded-full
                       border border-[#dfd1cf]
                       bg-white
                       text-[#655858]
                       text-xs
                       hover:bg-[#f4e9e6]">
                Atasan
            </button>

            <button
                class="h-[35px] px-5
                       rounded-full
                       border border-[#dfd1cf]
                       bg-white
                       text-[#655858]
                       text-xs
                       hover:bg-[#f4e9e6]">
                Bawahan
            </button>

            <button
                class="h-[35px] px-5
                       rounded-full
                       border border-[#dfd1cf]
                       bg-white
                       text-[#655858]
                       text-xs
                       hover:bg-[#f4e9e6]">
                Dress
            </button>

            <button
                class="h-[35px] px-5
                       rounded-full
                       border border-[#dfd1cf]
                       bg-white
                       text-[#655858]
                       text-xs
                       hover:bg-[#f4e9e6]">
                Outer
            </button>

            <button
                class="h-[35px] px-5
                       rounded-full
                       border border-[#dfd1cf]
                       bg-white
                       text-[#655858]
                       text-xs
                       hover:bg-[#f4e9e6]">
                Setelan
            </button>


            <!-- SORTING -->
            <select
                class="ml-auto h-[35px]
                       w-[145px]
                       rounded-lg
                       border border-[#dfd5d2]
                       bg-white
                       px-3
                       text-xs
                       text-[#655858]
                       outline-none">

                <option>Semua</option>
                <option>Termurah</option>
                <option>Termahal</option>
                <option>Terbaru</option>

            </select>


            <select
                class="h-[35px]
                       w-[145px]
                       rounded-lg
                       border border-[#dfd5d2]
                       bg-white
                       px-3
                       text-xs
                       text-[#655858]
                       outline-none">

                <option>Terbaru</option>
                <option>Terlama</option>

            </select>

        </div>


        <!-- JUMLAH PRODUK -->
        <p class="mb-4 ml-2 text-xs text-[#8f7d7d]">
            8 Produk ditemukan
        </p>


        <!-- GRID PRODUK -->
        <div class="grid grid-cols-5 gap-5">


            <!-- PRODUK 1 -->
            <div class="overflow-hidden rounded-xl bg-[#dcdcdc]">

                <div class="h-[180px] bg-[#e6e6e6] flex items-center justify-center overflow-hidden">

                    <img
                        src="{{ asset('images/produk1.jpg') }}"
                        alt="Blouse Wanita"
                        class="h-full w-full object-cover"
                    >

                </div>

                <div class="px-3 pt-2 pb-3">

                    <h2 class="font-serif text-[11px] font-bold leading-4 text-[#302424]">
                        Blouse Wanita Kemeja Wanita
                    </h2>

                    <p class="font-serif text-[10px] leading-4 text-[#302424]">
                        Korean Style Casual
                    </p>

                    <p class="mt-2 font-serif text-xs font-bold text-[#302424]">
                        Rp 89.000.00
                    </p>

                    <a
                        href="/produk/1"
                        class="mt-2 block rounded-full
                               bg-[#8d1f42]
                               py-1.5
                               text-center
                               font-serif
                               text-[10px]
                               font-bold
                               text-white
                               hover:bg-[#741835]"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>


            <!-- PRODUK 2 -->
            <div class="overflow-hidden rounded-xl bg-[#dcdcdc]">

                <div class="h-[180px] bg-[#e6e6e6] flex items-center justify-center overflow-hidden">

                    <img
                        src="{{ asset('images/produk2.jpg') }}"
                        alt="Blouse Wanita"
                        class="h-full w-full object-cover"
                    >

                </div>

                <div class="px-3 pt-2 pb-3">

                    <h2 class="font-serif text-[11px] font-bold leading-4">
                        Blouse Wanita Kemeja Wanita
                    </h2>

                    <p class="font-serif text-[10px] leading-4">
                        Korean Style Casual
                    </p>

                    <p class="mt-2 font-serif text-xs font-bold">
                        Rp 89.000.00
                    </p>

                    <a
                        href="/produk/2"
                        class="mt-2 block rounded-full bg-[#8d1f42]
                               py-1.5 text-center font-serif
                               text-[10px] font-bold text-white
                               hover:bg-[#741835]"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>


            <!-- PRODUK 3 -->
            <div class="overflow-hidden rounded-xl bg-[#dcdcdc]">

                <div class="h-[180px] bg-[#e6e6e6] flex items-center justify-center overflow-hidden">

                    <img
                        src="{{ asset('images/produk3.jpg') }}"
                        alt="Blouse Wanita"
                        class="h-full w-full object-cover"
                    >

                </div>

                <div class="px-3 pt-2 pb-3">

                    <h2 class="font-serif text-[11px] font-bold leading-4">
                        Blouse Wanita Kemeja Wanita
                    </h2>

                    <p class="font-serif text-[10px] leading-4">
                        Korean Style Casual
                    </p>

                    <p class="mt-2 font-serif text-xs font-bold">
                        Rp 89.000.00
                    </p>

                    <a
                        href="/produk/3"
                        class="mt-2 block rounded-full bg-[#8d1f42]
                               py-1.5 text-center font-serif
                               text-[10px] font-bold text-white"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>


            <!-- PRODUK 4 -->
            <div class="overflow-hidden rounded-xl bg-[#dcdcdc]">

                <div class="h-[180px] bg-[#e6e6e6] flex items-center justify-center overflow-hidden">

                    <img
                        src="{{ asset('images/produk4.jpg') }}"
                        alt="Blouse Wanita"
                        class="h-full w-full object-cover"
                    >

                </div>

                <div class="px-3 pt-2 pb-3">

                    <h2 class="font-serif text-[11px] font-bold leading-4">
                        Blouse Wanita Kemeja Wanita
                    </h2>

                    <p class="font-serif text-[10px] leading-4">
                        Korean Style Casual
                    </p>

                    <p class="mt-2 font-serif text-xs font-bold">
                        Rp 89.000.00
                    </p>

                    <a
                        href="/produk/4"
                        class="mt-2 block rounded-full bg-[#8d1f42]
                               py-1.5 text-center font-serif
                               text-[10px] font-bold text-white"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>


            <!-- PRODUK 5 -->
            <div class="overflow-hidden rounded-xl bg-[#dcdcdc]">

                <div class="h-[180px] bg-[#e6e6e6] flex items-center justify-center overflow-hidden">

                    <img
                        src="{{ asset('images/produk5.jpg') }}"
                        alt="Blouse Wanita"
                        class="h-full w-full object-cover"
                    >

                </div>

                <div class="px-3 pt-2 pb-3">

                    <h2 class="font-serif text-[11px] font-bold leading-4">
                        Blouse Wanita Kemeja Wanita
                    </h2>

                    <p class="font-serif text-[10px] leading-4">
                        Korean Style Casual
                    </p>

                    <p class="mt-2 font-serif text-xs font-bold">
                        Rp 89.000.00
                    </p>

                    <a
                        href="/produk/5"
                        class="mt-2 block rounded-full bg-[#8d1f42]
                               py-1.5 text-center font-serif
                               text-[10px] font-bold text-white"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>


            <!-- PRODUK 6 -->
            <div class="overflow-hidden rounded-xl bg-[#dcdcdc]">

                <div class="h-[180px] bg-[#e6e6e6] flex items-center justify-center overflow-hidden">

                    <img
                        src="{{ asset('images/produk6.jpg') }}"
                        alt="Blouse Wanita"
                        class="h-full w-full object-cover"
                    >

                </div>

                <div class="px-3 pt-2 pb-3">

                    <h2 class="font-serif text-[11px] font-bold leading-4">
                        Blouse Wanita Kemeja Wanita
                    </h2>

                    <p class="font-serif text-[10px]">
                        Korean Style Casual
                    </p>

                    <p class="mt-2 font-serif text-xs font-bold">
                        Rp 89.000.00
                    </p>

                    <a
                        href="/produk/6"
                        class="mt-2 block rounded-full bg-[#8d1f42]
                               py-1.5 text-center font-serif
                               text-[10px] font-bold text-white"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>


            <!-- PRODUK 7 -->
            <div class="overflow-hidden rounded-xl bg-[#dcdcdc]">

                <div class="h-[180px] bg-[#e6e6e6] flex items-center justify-center overflow-hidden">

                    <img
                        src="{{ asset('images/produk7.jpg') }}"
                        alt="Blouse Wanita"
                        class="h-full w-full object-cover"
                    >

                </div>

                <div class="px-3 pt-2 pb-3">

                    <h2 class="font-serif text-[11px] font-bold leading-4">
                        Blouse Wanita Kemeja Wanita
                    </h2>

                    <p class="font-serif text-[10px]">
                        Korean Style Casual
                    </p>

                    <p class="mt-2 font-serif text-xs font-bold">
                        Rp 89.000.00
                    </p>

                    <a
                        href="/produk/7"
                        class="mt-2 block rounded-full bg-[#8d1f42]
                               py-1.5 text-center font-serif
                               text-[10px] font-bold text-white"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>


            <!-- PRODUK 8 -->
            <div class="overflow-hidden rounded-xl bg-[#dcdcdc]">

                <div class="h-[180px] bg-[#e6e6e6] flex items-center justify-center overflow-hidden">

                    <img
                        src="{{ asset('images/produk8.jpg') }}"
                        alt="Blouse Wanita"
                        class="h-full w-full object-cover"
                    >

                </div>

                <div class="px-3 pt-2 pb-3">

                    <h2 class="font-serif text-[11px] font-bold leading-4">
                        Blouse Wanita Kemeja Wanita
                    </h2>

                    <p class="font-serif text-[10px]">
                        Korean Style Casual
                    </p>

                    <p class="mt-2 font-serif text-xs font-bold">
                        Rp 89.000.00
                    </p>

                    <a
                        href="/produk/8"
                        class="mt-2 block rounded-full bg-[#8d1f42]
                               py-1.5 text-center font-serif
                               text-[10px] font-bold text-white"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection