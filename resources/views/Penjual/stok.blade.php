@extends('layout.penjual')

@section('title', 'Stok')

@section('page-title', 'Stok Produk')

@section('content')

<div class="space-y-7">

    {{-- HEADER --}}
    <div>
        <h1 class="font-serif text-2xl font-bold text-[#4d4141]">
            Stok Produk
        </h1>

        <p class="mt-1 text-sm text-[#9a8888]">
            Pantau ketersediaan stok produk di toko Lune Attiré.
        </p>
    </div>


    {{-- STATISTIK --}}
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">Total Produk</p>
            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">24</h2>
        </div>

        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">Stok Tersedia</p>
            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">186</h2>
        </div>

        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">Stok Menipis</p>
            <h2 class="mt-2 text-2xl font-bold text-orange-500">5</h2>
        </div>

        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">Stok Habis</p>
            <h2 class="mt-2 text-2xl font-bold text-red-500">2</h2>
        </div>

    </div>


    {{-- SEARCH --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

        <div class="flex flex-col gap-4 md:flex-row">

            <input
                type="text"
                placeholder="Cari nama produk..."
                class="h-10 w-full max-w-[350px] rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-xs outline-none focus:border-[#986d6d]"
            >

            <select
                class="h-10 rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-xs outline-none focus:border-[#986d6d]"
            >
                <option>Semua Status</option>
                <option>Tersedia</option>
                <option>Stok Menipis</option>
                <option>Habis</option>
            </select>

        </div>

    </div>


    {{-- TABLE --}}
    <div class="overflow-hidden rounded-2xl border border-[#eadede] bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full text-left text-xs">

                <thead class="bg-[#fcf8f8]">

                    <tr class="border-b border-[#eadede] text-[#8f7b7b]">

                        <th class="px-6 py-4 font-semibold">
                            Produk
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Kategori
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Stok
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Status
                        </th>

                        <th class="px-6 py-4 text-center font-semibold">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ([
                        ['Abelia Blouse Top', 'Atasan', 24],
                        ['Kemeja Oversize', 'Atasan', 18],
                        ['Rok Plisket', 'Bawahan', 7],
                        ['Cardigan Rajut', 'Atasan', 5],
                        ['Celana Kulot', 'Bawahan', 16],
                        ['Mini Shoulder Bag', 'Aksesoris', 0],
                    ] as $product)

                    <tr class="border-b border-[#f1eaea] hover:bg-[#fdfafa]">

                        <td class="px-6 py-5">

                            <p class="font-semibold text-[#4d4141]">
                                {{ $product[0] }}
                            </p>

                            <p class="mt-1 text-[10px] text-[#a28f8f]">
                                SKU-LA-001
                            </p>

                        </td>

                        <td class="px-6 py-5 text-[#665858]">
                            {{ $product[1] }}
                        </td>

                        <td class="px-6 py-5">

                            <span class="font-semibold text-[#4d4141]">
                                {{ $product[2] }}
                            </span>

                            <span class="text-[#a28f8f]">
                                pcs
                            </span>

                        </td>

                        <td class="px-6 py-5">

                            @if ($product[2] == 0)

                                <span class="rounded-full bg-red-50 px-3 py-1 text-[10px] text-red-600">
                                    Habis
                                </span>

                            @elseif ($product[2] <= 7)

                                <span class="rounded-full bg-orange-50 px-3 py-1 text-[10px] text-orange-600">
                                    Stok Menipis
                                </span>

                            @else

                                <span class="rounded-full bg-green-50 px-3 py-1 text-[10px] text-green-600">
                                    Tersedia
                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-5 text-center">

                            <button
                                class="rounded-lg bg-[#986d6d] px-4 py-2 text-[10px] font-semibold text-white hover:bg-[#805959]"
                            >
                                Update Stok
                            </button>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection