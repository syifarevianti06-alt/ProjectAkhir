
@extends('layouts.app')

@section('content')

{{-- ================================================== --}}
{{-- HERO BANNER LUNE ATTIRÉ --}}
{{-- ================================================== --}}
<section class="bg-[#faf5ef]">
    <div class="mx-auto max-w-[1400px] px-5 pt-6 md:px-8">

        <div
            class="group relative h-[320px] overflow-hidden rounded-2xl
                   border border-[#ead8d0] bg-cover bg-center shadow-sm
                   sm:h-[360px] md:h-[420px]"
            style="background-image: url('{{ asset('images/bgy.jpeg') }}');">

            {{-- OVERLAY --}}
            <div class="absolute inset-0
                        from-[#faf5ef]/95 via-[#faf5ef]/75
                        to-[#faf5ef]/10">
            </div>

            {{-- ORNAMEN --}}
            <div class="absolute right-8 top-7 text-3xl text-[#b98585]/70">
                ✦
            </div>

            <div class="absolute bottom-8 right-10 hidden text-2xl
                        text-[#b98585]/70 md:block">
                ✧
            </div>

            {{-- TEKS HERO --}}
            <div class="relative z-10 flex h-full max-w-[650px]
                        flex-col justify-center px-6 py-6
                        sm:px-10 md:px-14">

                <span class="mb-4 w-fit rounded-full
                             border border-[#b98585]/50
                             bg-white/60 px-4 py-1.5
                             font-serif text-[10px] tracking-[2px]
                             text-[#8b5e5e] sm:text-xs">
                    LUNE ATTIRÉ COLLECTION
                </span>

                <h1 class="font-serif text-2xl font-bold
                           leading-tight text-[#392727]
                           sm:text-4xl md:text-5xl">
                    Tampil Stylish,
                    <br>
                    <span class="italic text-[#955f60]">
                        Jadi Dirimu Sendiri
                    </span>
                </h1>

                <p class="mt-4 max-w-[430px]
                          font-serif text-xs leading-6
                          text-[#514343] sm:text-sm md:text-base">
                    Temukan koleksi fashion pilihan untuk
                    melengkapi gaya setiap harimu dengan
                    sentuhan elegan dan penuh percaya diri.
                </p>

                <a
                    href="/produk"
                    class="mt-5 flex w-fit items-center gap-3
                           rounded-full bg-[#7d263d]
                           px-6 py-3 font-serif text-xs
                           font-semibold text-white shadow-md
                           transition duration-300
                           hover:-translate-y-1 hover:bg-[#612033]
                           hover:shadow-lg sm:text-sm">

                    Belanja Sekarang
                    <span aria-hidden="true">→</span>
                </a>

            </div>
        </div>
    </div>
</section>


{{-- ================================================== --}}
{{-- PRODUK TERBARU --}}
{{-- ================================================== --}}
<section class="bg-[#faf5ef]">
    <div class="mx-auto max-w-[1400px] px-5 py-10 md:px-8">

        {{-- JUDUL SECTION --}}
        <div class="mb-7 flex flex-wrap items-end
                    justify-between gap-4">

            <div>
                <p class="mb-2 font-serif text-[10px]
                          tracking-[2px] text-[#a47b78]
                          sm:text-xs sm:tracking-[3px]">
                    PILIHAN UNTUKMU
                </p>

                <h2 class="font-serif text-2xl font-bold
                           text-[#392727] sm:text-3xl md:text-4xl">
                    Produk Terbaru
                </h2>

                <p class="mt-2 font-serif text-xs
                          text-[#8c7771] sm:text-sm">
                    Temukan gaya yang cocok untukmu.
                </p>
            </div>

            {{-- JUMLAH PRODUK --}}
            <div class="rounded-full border border-[#e6d5cc]
                        bg-white/80 px-4 py-2">
                <span class="text-xs text-[#8b5e5e]">
                    {{ $products->count() }} produk ditemukan
                </span>
            </div>

        </div>


        {{-- ================================================== --}}
        {{-- GRID KARTU PRODUK --}}
        {{-- ================================================== --}}
        <div class="grid grid-cols-2 gap-4
                    sm:grid-cols-3 lg:grid-cols-4
                    xl:grid-cols-5">

            @forelse ($products as $product)

                <article
                    class="group flex min-w-0 flex-col overflow-hidden
                           rounded-2xl border border-[#ead8d0]
                           bg-white shadow-sm transition duration-300
                           hover:-translate-y-1 hover:shadow-xl">

                    {{-- FOTO PRODUK --}}
                    <div class="relative aspect-[4/5]
                                overflow-hidden bg-[#fcfaf7] p-3">

                        @if ($product->image)

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                loading="lazy"
                                class="h-full w-full object-contain
                                       transition duration-500
                                       group-hover:scale-105">

                        @else

                            <div class="flex h-full w-full
                                        flex-col items-center
                                        justify-center text-[#b98585]">

                                <span class="text-5xl">♡</span>

                                <p class="mt-2 text-xs">
                                    Foto belum tersedia
                                </p>

                            </div>

                        @endif


                        {{-- TOMBOL WISHLIST VISUAL --}}
                        <div class="absolute right-3 top-3">

                            <input
                                type="checkbox"
                                id="wishlist-{{ $product->id }}"
                                class="peer sr-only">

                            <label
                                for="wishlist-{{ $product->id }}"
                                title="Tandai sebagai favorit"
                                class="flex h-10 w-10 cursor-pointer
                                       items-center justify-center
                                       rounded-full border border-[#ead8d0]
                                       bg-white/95 text-[#7d263d]
                                       shadow-md transition
                                       hover:scale-110
                                       peer-checked:bg-[#7d263d]
                                       peer-checked:text-white">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    class="h-5 w-5">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8l1.1 1.1L12 21l7.8-7.5 1.1-1.1a5.5 5.5 0 0 0-.1-7.8Z">
                                    </path>

                                </svg>

                            </label>
                        </div>


                        {{-- LABEL STOK HABIS --}}
                        @if ($product->stock <= 0)

                            <span class="absolute left-3 top-3
                                         rounded-full bg-[#7d263d]
                                         px-3 py-1 text-[10px]
                                         font-semibold text-white">
                                Stok Habis
                            </span>

                        @endif

                    </div>


                    {{-- INFORMASI PRODUK --}}
                    <div class="flex flex-1 flex-col p-3 sm:p-4">

                        {{-- KATEGORI --}}
                        <span class="mb-2 w-fit rounded-full
                                     bg-[#f8e9e4] px-3 py-1
                                     text-[9px] font-semibold
                                     uppercase tracking-wider
                                     text-[#87434c]">

                            {{ $product->category ?? 'Fashion' }}

                        </span>


                        {{-- NAMA PRODUK --}}
                        <h3 class="line-clamp-2 min-h-10
                                   font-serif text-sm font-bold
                                   leading-5 text-[#392727] sm:text-base">

                            {{ $product->name }}

                        </h3>


                        {{-- HARGA --}}
                        <p class="mt-3 font-serif text-base
                                  font-bold text-[#87243d] sm:text-lg">

                            Rp {{ number_format($product->price, 0, ',', '.') }}

                        </p>


                        {{-- STATUS DAN JUMLAH STOK --}}
                        <div class="mt-2 flex flex-wrap items-center
                                    gap-x-2 gap-y-1 text-[10px] sm:text-xs">

                            @if ($product->stock > 10)

                                <span class="inline-flex items-center gap-1.5
                                             font-semibold text-green-700">

                                    <span class="h-2 w-2 rounded-full
                                                 bg-green-600">
                                    </span>

                                    Stok tersedia

                                </span>

                            @elseif ($product->stock > 0)

                                <span class="inline-flex items-center gap-1.5
                                             font-semibold text-amber-700">

                                    <span class="h-2 w-2 rounded-full
                                                 bg-amber-500">
                                    </span>

                                    Stok terbatas

                                </span>

                            @else

                                <span class="inline-flex items-center gap-1.5
                                             font-semibold text-red-700">

                                    <span class="h-2 w-2 rounded-full
                                                 bg-red-600">
                                    </span>

                                    Stok habis

                                </span>

                            @endif

                            <span class="text-[#b8a39c]">|</span>

                            <span class="text-[#796660]">
                                Tersisa {{ max(0, $product->stock) }} unit
                            </span>

                        </div>


                        {{-- PEMISAH DEKORATIF --}}
                        <div class="my-4 flex items-center gap-2">

                            <div class="h-px flex-1 bg-[#ead8d0]"></div>

                            <span class="text-xs text-[#b98585]">
                                ✦
                            </span>

                            <div class="h-px flex-1 bg-[#ead8d0]"></div>

                        </div>


                        {{-- TOMBOL LIHAT DETAIL --}}
                        @if ($product->stock > 0)

                            <a
                                href="{{ route('produk.show', $product->id) }}"
                                class="mt-auto flex w-full items-center
                                       justify-center gap-2 rounded-full
                                       bg-[#7d263d] px-3 py-3
                                       text-xs font-semibold text-white
                                       shadow-sm transition duration-300
                                       hover:bg-[#612033] hover:shadow-md
                                       focus:outline-none focus:ring-2
                                       focus:ring-[#b98585] focus:ring-offset-2">

                                Lihat Detail

                                <span aria-hidden="true">→</span>

                            </a>

                        @else

                            <button
                                type="button"
                                disabled
                                class="mt-auto w-full cursor-not-allowed
                                       rounded-full bg-gray-200 px-3 py-3
                                       text-xs font-semibold text-gray-500">

                                Stok Habis

                            </button>

                        @endif

                    </div>

                </article>

            @empty

                {{-- JIKA BELUM ADA PRODUK --}}
                <div class="col-span-full rounded-2xl
                            border border-dashed border-[#dfc9c0]
                            bg-white/70 px-6 py-12 text-center">

                    <div class="text-5xl text-[#b98585]">
                        ♡
                    </div>

                    <h3 class="mt-3 font-serif text-lg
                               font-bold text-[#392727]">
                        Belum Ada Produk
                    </h3>

                    <p class="mx-auto mt-2 max-w-md
                              text-xs leading-6 text-[#8c7771] sm:text-sm">
                        Produk yang ditambahkan penjual akan muncul
                        di sini. Silakan kunjungi kembali untuk
                        melihat koleksi terbaru Lune Attiré.
                    </p>

                </div>

            @endforelse

        </div>

    </div>
</section>

@endsection
