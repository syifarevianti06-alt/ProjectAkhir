@extends('layouts.admin')

@section('title', 'Laporan - Lune Attiré')
@section('page-title', 'Laporan')

@section('content')

<div class="space-y-7">

    // HEADER
    <div class="flex items-end justify-between">

        <div>

            <p class="text-[11px] uppercase tracking-[0.16em] text-[#A28B83]">
                Sales Report
            </p>

            <h1 class="text-2xl font-semibold text-[#493535] mt-1">
                Laporan Penjualan
            </h1>

            <p class="text-sm text-[#A28B83] mt-1">
                Pantau performa penjualan Lune Attiré.
            </p>

        </div>


        // FILTER BULAN
        <form
            action="{{ route('admin.laporan') }}"
            method="GET"
            class="flex items-center gap-3">

            <input
                type="month"
                name="bulan"
                value="{{ $bulan }}"
                class="bg-white
                border border-[#E5D8D1]
                rounded-xl
                px-4 py-2.5
                text-sm text-[#665250]
                focus:outline-none
                focus:border-[#9D6673]">

            <button
                type="submit"
                class="bg-[#7D2942]
                hover:bg-[#692238]
                text-white
                px-5 py-2.5
                rounded-xl
                text-sm font-medium
                transition">
                Tampilkan
            </button>

        </form>

    </div>


    // RINGKASAN
    <div class="grid grid-cols-4 gap-5">

        // PESANAN
        <div class="bg-white
            border border-[#EDE2DA]
            rounded-2xl p-5">

            <p class="text-xs text-[#A28B83]">
                Total Pesanan
            </p>

            <p class="text-3xl font-semibold
                text-[#493535] mt-3">

                {{ number_format($totalPesanan, 0, ',', '.') }}

            </p>

            <p class="text-xs text-[#A28B83] mt-2">
                Pada bulan terpilih
            </p>

        </div>


        // PENDAPATAN
        <div class="bg-white
            border border-[#EDE2DA]
            rounded-2xl p-5">

            <p class="text-xs text-[#A28B83]">
                Total Pendapatan
            </p>

            <p class="text-2xl font-semibold
                text-[#7D2942] mt-3">

                Rp {{ number_format($totalPendapatan, 0, ',', '.') }}

            </p>

            <p class="text-xs text-[#A28B83] mt-2">
                Dari pesanan berhasil
            </p>

        </div>


        // PRODUK
        <div class="bg-white
            border border-[#EDE2DA]
            rounded-2xl p-5">

            <p class="text-xs text-[#A28B83]">
                Produk Terjual
            </p>

            <p class="text-3xl font-semibold
                text-[#493535] mt-3">

                {{ number_format($totalProdukTerjual, 0, ',', '.') }}

            </p>

            <p class="text-xs text-[#A28B83] mt-2">
                Total item
            </p>

        </div>


        // RATA-RATA
        <div class="bg-white
            border border-[#EDE2DA]
            rounded-2xl p-5">

            <p class="text-xs text-[#A28B83]">
                Rata-rata Pesanan
            </p>

            <p class="text-2xl font-semibold
                text-[#493535] mt-3">

                Rp {{ number_format($rataRataPesanan, 0, ',', '.') }}

            </p>

            <p class="text-xs text-[#A28B83] mt-2">
                Per transaksi
            </p>

        </div>

    </div>


    // GRAFIK
    <div class="bg-white
        border border-[#EDE2DA]
        rounded-2xl p-6">

        <div class="mb-6">

            <h2 class="font-semibold text-[#493535]">
                Grafik Penjualan
            </h2>

            <p class="text-xs text-[#A28B83] mt-1">
                Pendapatan berdasarkan tanggal.
            </p>

        </div>


        <div class="h-72 flex items-end gap-2 overflow-x-auto">

            @php
            $maxGrafik = collect($grafikPenjualan)->max('total');
            $maxGrafik = $maxGrafik > 0 ? $maxGrafik : 1;
            @endphp

            @foreach($grafikPenjualan as $data)

            @php
            $tinggi = ($data['total'] / $maxGrafik) * 100;
            @endphp

            <div class="min-w-[28px] flex-1 h-full
                    flex flex-col justify-end items-center group">

                <div class="relative w-full flex justify-center">

                    <div
                        class="w-full max-w-[28px]
                            bg-[#7D2942]
                            hover:bg-[#692238]
                            rounded-t-lg
                            transition"
                        style="height: {{ max($tinggi, 3) }}%;"></div>

                    <div
                        class="absolute bottom-full mb-2
                            hidden group-hover:block
                            bg-[#493535]
                            text-white
                            text-[10px]
                            rounded-lg
                            px-2 py-1
                            whitespace-nowrap">
                        Rp {{ number_format($data['total'], 0, ',', '.') }}
                    </div>

                </div>

                <p class="text-[9px] text-[#A28B83] mt-3">
                    {{ $data['tanggal'] }}
                </p>

            </div>

            @endforeach

        </div>

    </div>


    <div class="grid grid-cols-2 gap-6">

        {{-- PRODUK TERLARIS --}}
        <div class="bg-white
            border border-[#EDE2DA]
            rounded-2xl
            overflow-hidden">

            <div class="px-6 py-5
                border-b border-[#EDE2DA]">

                <h2 class="font-semibold text-[#493535]">
                    Produk Terlaris
                </h2>

                <p class="text-xs text-[#A28B83] mt-1">
                    Produk berdasarkan jumlah terjual.
                </p>

            </div>


            <div class="divide-y divide-[#F0E5DF]">

                @forelse($produkTerlaris as $index => $produk)

                <div class="px-6 py-4
                        flex items-center gap-4">

                    <div class="w-8 h-8 rounded-full
                            bg-[#F3E4E5]
                            text-[#7D2942]
                            flex items-center
                            justify-center
                            text-xs font-semibold">

                        {{ $index + 1 }}

                    </div>


                    <div class="flex-1 min-w-0">

                        <p class="text-sm font-medium
                                text-[#493535]
                                truncate">

                            {{ $produk->product_name }}

                        </p>

                        <p class="text-xs text-[#A28B83] mt-1">

                            {{ $produk->total_terjual }} item terjual

                        </p>

                    </div>


                    <p class="text-sm font-semibold
                            text-[#7D2942]">

                        Rp {{ number_format(
                                $produk->total_pendapatan,
                                0,
                                ',',
                                '.'
                            ) }}

                    </p>

                </div>

                @empty

                <div class="px-6 py-12 text-center">

                    <p class="text-sm text-[#A28B83]">
                        Belum ada data penjualan.
                    </p>

                </div>

                @endforelse

            </div>

        </div>


        //STATUS PESANAN
        <div class="bg-white
            border border-[#EDE2DA]
            rounded-2xl
            overflow-hidden">

            <div class="px-6 py-5
                border-b border-[#EDE2DA]">

                <h2 class="font-semibold text-[#493535]">
                    Status Pesanan
                </h2>

                <p class="text-xs text-[#A28B83] mt-1">
                    Distribusi status pesanan bulan ini.
                </p>

            </div>


            <div class="p-6 space-y-4">

                @forelse($statusPesanan as $status)

                @php

                $namaStatus = match($status->status) {

                'pending',
                'baru' => 'Pending',

                'processing',
                'diproses' => 'Diproses',

                'shipped',
                'dikirim' => 'Dikirim',

                'completed',
                'selesai' => 'Selesai',

                'cancelled',
                'dibatalkan' => 'Dibatalkan',

                default => ucfirst($status->status),

                };

                @endphp


                <div>

                    <div class="flex items-center
                            justify-between mb-2">

                        <span class="text-sm text-[#665250]">
                            {{ $namaStatus }}
                        </span>

                        <span class="text-xs
                                text-[#A28B83]">

                            {{ $status->jumlah }}

                        </span>

                    </div>


                    <div class="w-full h-2
                            bg-[#F1E8E3]
                            rounded-full overflow-hidden">

                        <div
                            class="h-full
                                bg-[#7D2942]
                                rounded-full"
                            style="width: {{ $totalPesanan > 0 ? ($status->jumlah / $totalPesanan) * 100 : 0 }}%;"></div>

                    </div>

                </div>

                @empty

                <div class="py-10 text-center">

                    <p class="text-sm text-[#A28B83]">
                        Belum ada data pesanan.
                    </p>

                </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection