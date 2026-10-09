@extends('layouts.penjual')

@section('title', 'Laporan Penjualan')

@section('page-title', 'Laporan Penjualan')

@section('content')

<div class="space-y-7">

    //HEADER
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">

        <div>
            <h1 class="font-serif text-2xl font-bold text-[#4d4141]">
                Laporan Penjualan
            </h1>

            <p class="mt-1 text-sm text-[#9a8888]">
                Pantau performa penjualan toko Lune Attiré.
            </p>
        </div>


        //FILTER BULAN
        <form
            action="{{ route('penjual.laporan') }}"
            method="GET"
            class="flex items-center gap-2">

            <input
                type="month"
                name="bulan"
                value="{{ $bulan }}"
                class="rounded-xl border border-[#eadede] bg-white px-4 py-2.5 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]">

            <button
                type="submit"
                class="rounded-xl bg-[#986d6d] px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#805959]">
                Tampilkan
            </button>

        </form>

    </div>


    //STATISTIK
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

        // PENDAPATAN
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-xs text-[#a28f8f]">
                Total Pendapatan
            </p>

            <h2 class="mt-2 text-xl font-bold text-[#4d4141]">
                Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
            </h2>

            <p class="mt-1 text-[11px] text-[#b09d9d]">
                Bulan {{ \Carbon\Carbon::createFromFormat('Y-m', $bulan)->translatedFormat('F Y') }}
            </p>

        </div>


        // PESANAN
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-xs text-[#a28f8f]">
                Total Pesanan
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                {{ $totalPesanan }}
            </h2>

            <p class="mt-1 text-[11px] text-[#b09d9d]">
                Semua pesanan bulan ini
            </p>

        </div>


        // PRODUK TERJUAL
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-xs text-[#a28f8f]">
                Produk Terjual
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                {{ $totalProdukTerjual }}
            </h2>

            <p class="mt-1 text-[11px] text-[#b09d9d]">
                Total pcs terjual
            </p>

        </div>


        // RATA-RATA
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-xs text-[#a28f8f]">
                Rata-rata Pesanan
            </p>

            <h2 class="mt-2 text-xl font-bold text-[#4d4141]">
                Rp {{ number_format($rataRataPesanan, 0, ',', '.') }}
            </h2>

            <p class="mt-1 text-[11px] text-[#b09d9d]">
                Per transaksi berhasil
            </p>

        </div>

    </div>


    //GRAFIK PENJUALAN
    <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm">

        <div class="mb-6">

            <h2 class="text-base font-semibold text-[#4d4141]">
                Grafik Penjualan
            </h2>

            <p class="mt-1 text-xs text-[#a28f8f]">
                Pendapatan harian pada bulan yang dipilih.
            </p>

        </div>


        @php
        $maxPenjualan = collect($grafikPenjualan)->max('total') ?: 1;
        @endphp


        <div class="space-y-3">

            @foreach ($grafikPenjualan as $data)

            @php
            $persentase = ($data['total'] / $maxPenjualan) * 100;
            @endphp

            <div class="flex items-center gap-3">

                <div class="w-12 text-xs text-[#9a8888]">
                    {{ $data['tanggal'] }}
                </div>

                <div class="flex-1">

                    <div class="h-7 overflow-hidden rounded-lg bg-[#f8eeee]">

                        <div
                            class="h-full rounded-lg bg-[#986d6d] transition-all"
                            style="width: {{ $persentase }}%"></div>

                    </div>

                </div>

                <div class="w-32 text-right text-xs font-medium text-[#5f4c4c]">
                    Rp {{ number_format($data['total'], 0, ',', '.') }}
                </div>

            </div>

            @endforeach

        </div>

    </div>


    // PRODUK TERLARIS + STATUS PESANAN
    <div class="grid gap-6 lg:grid-cols-2">


        // PRODUK TERLARIS
        <div class="rounded-2xl border border-[#eadede] bg-white shadow-sm">

            <div class="border-b border-[#eadede] px-6 py-5">

                <h2 class="text-base font-semibold text-[#4d4141]">
                    Produk Terlaris
                </h2>

                <p class="mt-1 text-xs text-[#a28f8f]">
                    Produk dengan jumlah penjualan terbanyak.
                </p>

            </div>


            <div class="divide-y divide-[#f1eaea]">

                @forelse ($produkTerlaris as $index => $produk)

                <div class="flex items-center justify-between px-6 py-4">

                    <div class="flex items-center gap-4">

                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#f8eeee] text-xs font-semibold text-[#986d6d]">
                            {{ $index + 1 }}
                        </div>

                        <div>

                            <p class="text-sm font-medium text-[#4d4141]">
                                {{ $produk->product_name }}
                            </p>

                            <p class="mt-1 text-[11px] text-[#a28f8f]">
                                {{ $produk->total_terjual }} pcs terjual
                            </p>

                        </div>

                    </div>


                    <div class="text-right">

                        <p class="text-sm font-semibold text-[#4d4141]">
                            Rp {{ number_format($produk->total_pendapatan, 0, ',', '.') }}
                        </p>

                    </div>

                </div>

                @empty

                <div class="px-6 py-12 text-center">

                    <p class="text-sm text-[#9a8888]">
                        Belum ada data penjualan.
                    </p>

                </div>

                @endforelse

            </div>

        </div>


        // STATUS PESANAN
        <div class="rounded-2xl border border-[#eadede] bg-white shadow-sm">

            <div class="border-b border-[#eadede] px-6 py-5">

                <h2 class="text-base font-semibold text-[#4d4141]">
                    Status Pesanan
                </h2>

                <p class="mt-1 text-xs text-[#a28f8f]">
                    Distribusi status pesanan pada bulan ini.
                </p>

            </div>


            <div class="divide-y divide-[#f1eaea]">

                @forelse ($statusPesanan as $status)

                @php

                $namaStatus = match (strtolower($status->status)) {

                'pending',
                'baru' => 'Pesanan Baru',

                'paid' => 'Sudah Dibayar',

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


                <div class="flex items-center justify-between px-6 py-4">

                    <div class="flex items-center gap-3">

                        <div class="h-2.5 w-2.5 rounded-full bg-[#986d6d]"></div>

                        <span class="text-sm text-[#5f4c4c]">
                            {{ $namaStatus }}
                        </span>

                    </div>

                    <span class="text-sm font-semibold text-[#4d4141]">
                        {{ $status->jumlah }}
                    </span>

                </div>

                @empty

                <div class="px-6 py-12 text-center">

                    <p class="text-sm text-[#9a8888]">
                        Belum ada data pesanan.
                    </p>

                </div>

                @endforelse

            </div>

        </div>

    </div>


    // INFO
    <div class="rounded-2xl border border-[#eadede] bg-[#fcf8f8] px-5 py-4">

        <p class="text-xs leading-5 text-[#806f6f]">
            Laporan dihitung berdasarkan data pesanan dan item pesanan
            yang tersimpan di database. Pendapatan hanya menghitung pesanan
            dengan status pembayaran/proses yang dianggap berhasil.
        </p>

    </div>

</div>

@endsection