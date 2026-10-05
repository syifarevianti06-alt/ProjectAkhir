@extends('layouts.app')

@section('title', 'Produk')

@section('content')

<div class="min-h-screen bg-[#fbf5ef]">

    <div class="max-w-6xl mx-auto px-6 py-10">

        {{-- HEADER --}}
        <div class="mb-8">

            <h1 class="text-3xl font-serif text-[#332326]">
                Katalog Produk
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                Temukan produk fashion pilihan Lune Attiré
            </p>

        </div>


        {{-- SEARCH + KATEGORI --}}
        <div class="flex flex-col md:flex-row gap-4 mb-8">

            {{-- SEARCH --}}
            <form
                action="{{ route('produk.index') }}"
                method="GET"
                class="flex-1"
            >

                @if(request('category'))
                    <input
                        type="hidden"
                        name="category"
                        value="{{ request('category') }}"
                    >
                @endif

                <div class="relative">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari produk..."
                        class="w-full bg-white
                               border border-[#eadfe1]
                               rounded-xl
                               px-5 py-3 pr-12
                               text-sm text-[#332326]
                               outline-none
                               focus:border-[#8b2947]"
                    >

                    <button
                        type="submit"
                        class="absolute
                               right-4
                               top-1/2
                               -translate-y-1/2
                               text-gray-400
                               hover:text-[#8b2947]"
                    >
                        🔍
                    </button>

                </div>

            </form>


            {{-- KATEGORI --}}
            <form
                action="{{ route('produk.index') }}"
                method="GET"
            >

                {{-- Pertahankan pencarian --}}
                @if(request('search'))

                    <input
                        type="hidden"
                        name="search"
                        value="{{ request('search') }}"
                    >

                @endif


                <select
                    name="category"
                    onchange="this.form.submit()"
                    class="w-full md:w-52
                           bg-white
                           border border-[#eadfe1]
                           rounded-xl
                           px-5 py-3
                           text-sm text-[#332326]
                           outline-none
                           focus:border-[#8b2947]"
                >

                    <option value="">
                        Semua Kategori
                    </option>


                    {{-- KATEGORI DARI DATABASE --}}
                    @foreach($categories as $category)

                        <option
                            value="{{ $category }}"
                            {{ request('category') == $category ? 'selected' : '' }}
                        >
                            {{ $category }}
                        </option>

                    @endforeach

                </select>

            </form>

        </div>


        {{-- FILTER AKTIF --}}
        @if(request('search') || request('category'))

            <div class="flex items-center gap-2 mb-6">

                <span class="text-sm text-gray-500">
                    Filter:
                </span>


                @if(request('search'))

                    <span
                        class="inline-flex items-center
                               bg-white
                               border border-[#eadfe1]
                               rounded-full
                               px-3 py-1
                               text-xs
                               text-[#8b2947]"
                    >

                        "{{ request('search') }}"

                    </span>

                @endif


                @if(request('category'))

                    <span
                        class="inline-flex items-center
                               bg-white
                               border border-[#eadfe1]
                               rounded-full
                               px-3 py-1
                               text-xs
                               text-[#8b2947]"
                    >

                        {{ request('category') }}

                    </span>

                @endif


                <a
                    href="{{ route('produk.index') }}"
                    class="ml-auto
                           text-sm
                           text-[#8b2947]
                           hover:underline"
                >
                    Reset Filter
                </a>

            </div>

        @endif


        {{-- JUMLAH PRODUK --}}
        <div class="flex items-center justify-between mb-6">

            <p class="text-sm text-gray-500">

                Menampilkan

                <span class="font-semibold text-[#332326]">
                    {{ $products->count() }}
                </span>

                produk

            </p>

        </div>


        {{-- PRODUK --}}
        @if($products->count() > 0)

            <div
                class="grid
                       grid-cols-2
                       md:grid-cols-3
                       lg:grid-cols-4
                       gap-6"
            >

                @foreach($products as $product)

                    <div
                        class="bg-white
                               rounded-2xl
                               overflow-hidden
                               border border-[#eadfe1]
                               hover:shadow-lg
                               transition duration-300"
                    >

                        {{-- GAMBAR --}}
                        <a
                            href="{{ route('produk.show', $product->id) }}"
                            class="block"
                        >

                            <div
                                class="aspect-[3/4]
                                       bg-[#f3eeee]
                                       overflow-hidden"
                            >

                                @if($product->image)

                                    <img
                                        src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="w-full
                                               h-full
                                               object-cover
                                               hover:scale-105
                                               transition
                                               duration-500"
                                    >

                                @else

                                    <div
                                        class="w-full
                                               h-full
                                               flex
                                               items-center
                                               justify-center
                                               text-gray-400"
                                    >

                                        <div class="text-center">

                                            <div class="text-3xl mb-2">
                                                ♡
                                            </div>

                                            <p class="text-xs">
                                                Tidak ada gambar
                                            </p>

                                        </div>

                                    </div>

                                @endif

                            </div>

                        </a>


                        {{-- INFORMASI --}}
                        <div class="p-4">

                            {{-- KATEGORI --}}
                            @if($product->category)

                                <p
                                    class="text-xs
                                           text-gray-400
                                           mb-1"
                                >
                                    {{ $product->category }}
                                </p>

                            @endif


                            {{-- NAMA --}}
                            <a
                                href="{{ route('produk.show', $product->id) }}"
                                class="block"
                            >

                                <h2
                                    class="font-semibold
                                           text-sm
                                           text-[#332326]
                                           line-clamp-2
                                           hover:text-[#8b2947]
                                           transition"
                                >
                                    {{ $product->name }}
                                </h2>

                            </a>


                            {{-- HARGA --}}
                            <p
                                class="text-[#8b2947]
                                       font-bold
                                       mt-2"
                            >

                                Rp {{ number_format($product->price, 0, ',', '.') }}

                            </p>


                            {{-- STOK --}}
                            @if($product->stock > 0)

                                <p
                                    class="text-xs
                                           text-gray-400
                                           mt-1"
                                >

                                    Stok:
                                    {{ $product->stock }}

                                </p>

                            @else

                                <p
                                    class="text-xs
                                           text-red-500
                                           mt-1"
                                >
                                    Stok habis
                                </p>

                            @endif


                            {{-- DETAIL --}}
                            <a
                                href="{{ route('produk.show', $product->id) }}"
                                class="block
                                       text-center
                                       mt-4
                                       border border-[#8b2947]
                                       text-[#8b2947]
                                       py-2
                                       rounded-lg
                                       text-sm
                                       font-medium
                                       hover:bg-[#8b2947]
                                       hover:text-white
                                       transition"
                            >
                                Lihat Detail
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- TIDAK ADA PRODUK --}}
            <div
                class="bg-white
                       border border-[#eadfe1]
                       rounded-2xl
                       p-12
                       text-center"
            >

                <div
                    class="text-5xl
                           text-[#c48797]
                           mb-4"
                >
                    ♡
                </div>

                <h2
                    class="text-lg
                           font-semibold
                           text-[#332326]"
                >
                    Produk tidak ditemukan
                </h2>

                <p
                    class="text-sm
                           text-gray-400
                           mt-2"
                >
                    Coba gunakan kata pencarian
                    atau kategori yang berbeda.
                </p>

                <a
                    href="{{ route('produk.index') }}"
                    class="inline-block
                           mt-5
                           bg-[#8b2947]
                           text-white
                           px-6
                           py-2.5
                           rounded-lg
                           text-sm
                           hover:bg-[#721f39]
                           transition"
                >
                    Lihat Semua Produk
                </a>

            </div>

        @endif

    </div>

</div>

@endsection