@extends('layout.penjual')

@section('title', 'Laporan Penjualan')

@section('page-title', 'Laporan Penjualan')

@section('content')

<div class="space-y-7">

    {{-- HEADER --}}
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">

        <div>
            <h1 class="font-serif text-2xl font-bold text-[#4d4141]">
                Laporan Penjualan
            </h1>

            <p class="mt-1 text-sm text-[#9a8888]">
                Pantau hasil penjualan toko Lune Attiré.
            </p>
        </div>

        <button
            class="rounded-lg bg-[#986d6d] px-5 py-3 text-xs font-semibold text-white hover:bg-[#805959]"
        >
            ↓ Export Laporan
        </button>

    </div>


    {{-- FILTER --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

        <div class="grid gap-4 md:grid-cols-3">

            <div>
                <label class="mb-2 block text-[10px] font-semibold text-[#806b6b]">
                    Periode
                </label>

                <select
                    class="h-10 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-xs outline-none focus:border-[#986d6d]"
                >
                    <option>7 Hari Terakhir</option>
                    <option>30 Hari Terakhir</option>
                    <option>Bulan Ini</option>
                    <option>Tahun Ini</option>
                </select>
            </div>

            <div>
                <label class="mb-2 block text-[10px] font-semibold text-[#806b6b]">
                    Dari
                </label>

                <input
                    type="date"
                    class="h-10 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-xs outline-none focus:border-[#986d6d]"
                >
            </div>

            <div>
                <label class="mb-2 block text-[10px] font-semibold text-[#806b6b]">
                    Sampai
                </label>

                <input
                    type="date"
                    class="h-10 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-xs outline-none focus:border-[#986d6d]"
                >
            </div>

        </div>

    </div>


    {{-- RINGKASAN --}}
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">
                Total Penjualan
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                Rp 18.420.000
            </h2>

            <p class="mt-2 text-[10px] text-green-600">
                +20% dari periode sebelumnya
            </p>
        </div>


        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">
                Pesanan
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                126
            </h2>

            <p class="mt-2 text-[10px] text-green-600">
                +15% dari sebelumnya
            </p>
        </div>


        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">
                Produk Terjual
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                184
            </h2>

            <p class="mt-2 text-[10px] text-green-600">
                +12% dari sebelumnya
            </p>
        </div>


        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">
                Rata-rata Pesanan
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                Rp 146.000
            </h2>

            <p class="mt-2 text-[10px] text-[#986d6d]">
                Per transaksi
            </p>
        </div>

    </div>


    {{-- GRAFIK --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-7 shadow-sm">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="font-serif text-lg font-semibold text-[#4d4141]">
                    Grafik Penjualan
                </h2>

                <p class="mt-1 text-xs text-[#a28f8f]">
                    Penjualan selama 7 hari terakhir
                </p>
            </div>

            <span class="rounded-lg bg-[#f8eeee] px-3 py-2 text-[10px] text-[#986d6d]">
                7 Hari
            </span>

        </div>


        {{-- BAR CHART SEDERHANA --}}
        <div class="mt-8 flex h-64 items-end justify-between gap-4 border-b border-[#eadede] px-5">

            @foreach ([35, 50, 42, 65, 78, 70, 92] as $height)

                <div class="flex h-full flex-1 items-end justify-center">

                    <div
                        class="w-full max-w-[55px] rounded-t-lg bg-[#b98b8b]"
                        style="height: {{ $height }}%;"
                    ></div>

                </div>

            @endforeach

        </div>


        <div class="mt-3 flex justify-between px-5 text-[10px] text-[#a28f8f]">

            <span>Sen</span>
            <span>Sel</span>
            <span>Rab</span>
            <span>Kam</span>
            <span>Jum</span>
            <span>Sab</span>
            <span>Min</span>

        </div>

    </div>


    {{-- PRODUK TERLARIS --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-7 shadow-sm">

        <h2 class="font-serif text-lg font-semibold text-[#4d4141]">
            Produk Terlaris
        </h2>

        <p class="mt-1 text-xs text-[#a28f8f]">
            Produk dengan jumlah penjualan terbanyak.
        </p>


        <div class="mt-6 space-y-5">

            @foreach ([
                ['Abelia Blouse Top', 48],
                ['Kemeja Oversize', 36],
                ['Rok Plisket', 29],
                ['Cardigan Rajut', 24],
            ] as $product)

                <div>

                    <div class="mb-2 flex items-center justify-between">

                        <span class="text-xs font-medium text-[#665858]">
                            {{ $product[0] }}
                        </span>

                        <span class="text-[10px] text-[#986d6d]">
                            {{ $product[1] }} terjual
                        </span>

                    </div>

                    <div class="h-2 overflow-hidden rounded-full bg-[#f1e7e7]">

                        <div
                            class="h-full rounded-full bg-[#a97878]"
                            style="width: {{ min($product[1] * 2, 100) }}%;"
                        ></div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection