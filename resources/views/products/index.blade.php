@extends('layouts.app')

@section('title', 'Produk')

@section('content')

<div class="min-h-screen bg-[#fbf5ef]">

    <div class="max-w-7xl mx-auto px-6 py-10">

        {{-- HEADER --}}
        <div class="mb-8">
            <h1 class="font-serif text-3xl font-bold text-[#332326]">
                Koleksi Produk
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Temukan produk fashion pilihan Lune Attiré.
            </p>
        </div>


        {{-- SEARCH + FILTER --}}
        <form
            action="{{ route('produk.index') }}"
            method="GET"
            class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-4"
        >

            {{-- SEARCH --}}
            <div class="md:col-span-2">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama produk..."
                    class="w-full rounded-xl border border-[#e5dada]
                           bg-white px-4 py-3 text-sm text-[#4d4141]
                           outline-none focus:border-[#966767]"
                >

            </div>


            {{-- KATEGORI --}}
            <div>

                <select
                    name="category"
                    onchange="this.form.submit()"
                    class="w-full rounded-xl border border-[#e5dada]
                           bg-white px-4 py-3 text-sm text-[#4d4141]
                           outline-none focus:border-[#966767]"
                >

                    <option value="">
                        Semua Kategori
                    </option>

                    @foreach ($categories as $category)

                        <option
                            value="{{ $category }}"
                            @selected(request('category') == $category)
                        >
                            {{ $category }}
                        </option>

                    @endforeach

                </select>

            </div>

        </form>


        {{-- JUMLAH PRODUK --}}
        <div class="mb-5">

            <p class="text-sm font-medium text-[#6f5b5b]">
                {{ $products->count() }} produk ditemukan
            </p>

        </div>


        {{-- PRODUK --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @forelse ($products as $product)

                <div
                    class="overflow-hidden rounded-2xl
                           bg-white shadow-sm
                           border border-[#eee3df]
                           transition hover:-translate-y-1 hover:shadow-md"
                >

                    {{-- FOTO --}}
                    <a href="{{ route('produk.show', $product->id) }}">

                        <div class="h-[300px] bg-[#eee8e4] overflow-hidden">

                            @if ($product->image)

                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover
                                           transition duration-300
                                           hover:scale-105"
                                >

                            @else

                                <div class="w-full h-full flex items-center justify-center">

                                    <span class="text-sm text-gray-400">
                                        Tidak ada gambar
                                    </span>

                                </div>

                            @endif

                        </div>

                    </a>


                    {{-- DETAIL --}}
                    <div class="p-5">

                        {{-- KATEGORI --}}
                        <p class="text-[10px] uppercase tracking-wide text-[#986d6d]">
                            {{ $product->category ?? 'Fashion' }}
                        </p>


                        {{-- NAMA --}}
                        <h2 class="mt-1 min-h-[44px] font-serif text-base font-bold text-[#332326]">
                            {{ $product->name }}
                        </h2>


                        {{-- HARGA --}}
                        <p class="mt-3 text-lg font-bold text-[#8b2947]">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>


                        {{-- STOK --}}
                        @if ($product->stock > 0)

                            <p class="mt-1 text-xs text-green-600">
                                Stok tersedia
                            </p>

                        @else

                            <p class="mt-1 text-xs text-red-500">
                                Produk habis
                            </p>

                        @endif


                        {{-- BUTTON --}}
                        <a
                            href="{{ route('produk.show', $product->id) }}"
                            class="mt-4 block w-full rounded-xl
                                   bg-[#8b2947] py-2.5
                                   text-center text-xs font-semibold
                                   text-white transition
                                   hover:bg-[#741f39]"
                        >
                            Lihat Detail
                        </a>

                    </div>

                </div>

            @empty

                {{-- KALAU BELUM ADA PRODUK --}}
                <div class="col-span-full py-20 text-center">

                    <div
                        class="mx-auto flex h-16 w-16 items-center
                               justify-center rounded-full bg-[#f3e8e5]"
                    >
                        🛍️
                    </div>

                    <h2 class="mt-4 font-serif text-xl font-bold text-[#4d4141]">
                        Produk belum tersedia
                    </h2>

                    <p class="mt-2 text-sm text-gray-500">
                        Belum ada produk yang ditambahkan ke toko.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection