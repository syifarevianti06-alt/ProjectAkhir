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
            style="background-image: url('{{ asset('images/banner.jpeg') }}');">

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
                       justify-center px-12">

                <h1
                    class="font-serif text-4xl
                           font-bold leading-tight
                           text-[#211919] md:text-5xl">
                    Tampil Stylish, Jadi
                    <br>
                    Dirimu Sendiri
                </h1>


                <p
                    class="mt-4 max-w-[500px]
                           font-serif text-base
                           font-semibold leading-7
                           text-[#302727]">
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
                           transition hover:bg-[#7d4d4e]">
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

    <div class="mx-auto max-w-[1400px] px-8 py-5">

        {{-- JUDUL --}}
        <div class="mb-3">

            <h2
                class="font-serif text-3xl
                       font-bold text-[#211919]">
                Produk Terbaru
            </h2>

            <p
                class="mt-1 font-serif
                       text-sm font-semibold
                       text-[#302727]">
                {{ $products->count() }} produk ditemukan
            </p>

        </div>


        {{-- PRODUK DARI DATABASE --}}
        <div
            class="grid grid-cols-1 gap-6
                   sm:grid-cols-2
                   lg:grid-cols-5">

            @forelse ($products as $product)

            <div
                class="overflow-hidden rounded-xl
                           bg-[#f0eeeb] shadow-sm">

                {{-- FOTO PRODUK --}}
                <div class="h-[220px] overflow-hidden">

                    @if ($product->image)

                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="h-full w-full object-cover
                                       transition duration-300
                                       hover:scale-105">

                    @else

                    <div
                        class="flex h-full w-full
                                       items-center justify-center
                                       bg-[#e8e3df]">
                        <span class="text-sm text-gray-500">
                            Tidak ada gambar
                        </span>
                    </div>

                    @endif

                </div>


                {{-- INFORMASI PRODUK --}}
                <div class="p-3">

                    {{-- KATEGORI --}}
                    <p class="text-[10px] font-semibold text-gray-500">
                        {{ $product->category ?? 'Fashion' }}
                    </p>


                    {{-- NAMA --}}
                    <h3
                        class="mt-1 min-h-[40px]
                                   font-serif text-xs
                                   font-bold leading-4
                                   text-[#292323]">
                        {{ $product->name }}
                    </h3>


                    {{-- HARGA --}}
                    <p
                        class="mt-2 font-serif
                                   text-sm font-bold">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>


                    {{-- DETAIL --}}
                    <a
                        href="{{ route('produk.show', $product->id) }}"
                        class="mt-2 block rounded-full
                                   bg-[#921f45]
                                   py-1.5 text-center
                                   text-[11px] font-bold
                                   text-white
                                   hover:bg-[#741735]">
                        Lihat Detail
                    </a>

                </div>

            </div>

            @empty

            <div class="col-span-full py-12 text-center">

                <p class="font-serif text-lg text-[#4d4141]">
                    Belum ada produk.
                </p>

                <p class="mt-1 text-sm text-gray-500">
                    Produk yang ditambahkan penjual akan muncul di sini.
                </p>

            </div>

            @endforelse

        </div>

    </div>

</section>
@endsection