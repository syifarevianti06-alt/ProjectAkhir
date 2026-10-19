```blade
@extends('layouts.admin')

@section('title', 'Laporan Penjualan')

@section('content')

<div class="space-y-7">

    {{-- HEADER --}}
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#986d6d]">
                LUNE ATTIRÉ · REPORT
            </p>

            <h1 class="mt-2 font-serif text-3xl font-bold text-[#4d4141]">
                Laporan Penjualan
            </h1>

            <p class="mt-2 text-sm text-[#9a8888]">
                Ringkasan performa penjualan Lune Attiré.
            </p>
        </div>

        <button
            type="button"
            onclick="window.print()"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#7b1f3a] px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#61172d]"
        >
            <span>↓</span>
            Export PDF
        </button>
    </div>


    {{-- FILTER PERIODE --}}
    <div class="flex flex-col justify-between gap-4 rounded-2xl border border-[#eadede] bg-white p-4 shadow-sm sm:flex-row sm:items-center">
        <div>
            <h2 class="text-sm font-semibold text-[#4d4141]">
                Periode Laporan
            </h2>
            <p class="mt-1 text-xs text-[#a28f8f]">
                Pilih rentang waktu penjualan.
            </p>
        </div>

        <form method="GET"
              action="{{ url()->current() }}"
              class="flex flex-wrap gap-2">

            <button
                type="submit"
                name="periode"
                value="3"
                class="rounded-xl border px-4 py-2.5 text-sm font-medium transition
                {{ request('periode', '6') == '3'
                    ? 'border-[#7b1f3a] bg-[#7b1f3a] text-white'
                    : 'border-[#eadede] bg-white text-[#8f7a7a] hover:bg-[#fcf5f5]' }}"
            >
                3 Bulan Terakhir
            </button>

            <button
                type="submit"
                name="periode"
                value="6"
                class="rounded-xl border px-4 py-2.5 text-sm font-medium transition
                {{ request('periode', '6') == '6'
                    ? 'border-[#7b1f3a] bg-[#7b1f3a] text-white'
                    : 'border-[#eadede] bg-white text-[#8f7a7a] hover:bg-[#fcf5f5]' }}"
            >
                6 Bulan Terakhir
            </button>

        </form>
    </div>


    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">

        {{-- TOTAL PENJUALAN --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#f6e9e9] text-xl text-[#986d6d]">
                    Rp
                </div>

                <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                    {{ $persenPenjualan >= 0 ? '+' : '' }}{{ $persenPenjualan }}%
                </span>
            </div>

            <p class="mt-5 text-sm text-[#9a8888]">
                Total Penjualan
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                Rp {{ number_format($totalPenjualan, 0, ',', '.') }}
            </h2>

            <p class="mt-2 text-xs text-[#a28f8f]">
                Dibandingkan periode sebelumnya
            </p>
        </div>


        {{-- JUMLAH TRANSAKSI --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#f6e9e9] text-xl text-[#986d6d]">
                    ▤
                </div>

                <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                    {{ $persenTransaksi >= 0 ? '+' : '' }}{{ $persenTransaksi }}%
                </span>
            </div>

            <p class="mt-5 text-sm text-[#9a8888]">
                Jumlah Transaksi
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                {{ number_format($jumlahTransaksi, 0, ',', '.') }}
            </h2>

            <p class="mt-2 text-xs text-[#a28f8f]">
                Total pesanan pada periode ini
            </p>
        </div>


        {{-- PRODUK TERJUAL --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md sm:col-span-2 xl:col-span-1">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#f6e9e9] text-xl text-[#986d6d]">
                ♧
            </div>

            <p class="mt-5 text-sm text-[#9a8888]">
                Produk Terjual
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                {{ number_format($produkTerjual, 0, ',', '.') }}
            </h2>

            <p class="mt-2 text-xs text-[#a28f8f]">
                Item terjual dalam periode ini
            </p>
        </div>

    </div>


    {{-- GRAFIK PENJUALAN --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm">

        <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
            <div>
                <h2 class="font-serif text-xl font-bold text-[#4d4141]">
                    Grafik Penjualan Bulanan
                </h2>

                <p class="mt-1 text-xs text-[#a28f8f]">
                    Perbandingan pendapatan setiap bulan.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <span class="h-3 w-3 rounded-sm bg-[#b98282]"></span>
                <span class="text-xs text-[#9a8888]">Total penjualan</span>
            </div>
        </div>

        @php
            $grafik = collect($grafikBulanan ?? []);
            $maksGrafik = max(1, (float) $grafik->max('total'));
        @endphp

        <div class="mt-8 flex h-64 items-end gap-3 rounded-xl bg-[#fcf9f9] px-4 pb-4 pt-6 sm:gap-6 sm:px-8">

            @forelse ($grafik as $data)
                @php
                    $total = (float) ($data['total'] ?? 0);
                    $tinggi = $total > 0
                        ? max(4, ($total / $maksGrafik) * 100)
                        : 2;
                @endphp

                <div class="group relative flex h-full min-w-0 flex-1 flex-col justify-end">

                    <div class="pointer-events-none absolute bottom-full left-1/2 z-10 mb-2 hidden -translate-x-1/2 whitespace-nowrap rounded-lg bg-[#4d4141] px-3 py-2 text-xs text-white shadow-lg group-hover:block">
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </div>

                    <div
                        class="w-full rounded-t-lg bg-[#b98282] transition-all duration-300 group-hover:bg-[#7b1f3a]"
                        style="height: {{ $tinggi }}%;"
                    ></div>

                </div>

            @empty
                <div class="flex w-full items-center justify-center text-sm text-[#a28f8f]">
                    Belum ada data penjualan.
                </div>
            @endforelse

        </div>

        <div class="mt-3 flex gap-3 sm:gap-6">
            @foreach ($grafik as $data)
                <div class="min-w-0 flex-1 truncate text-center text-xs text-[#9a8888]">
                    {{ $data['bulan'] }}
                </div>
            @endforeach
        </div>

    </div>


    {{-- PRODUK TERLARIS --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm">

        <div class="mb-6">
            <h2 class="font-serif text-xl font-bold text-[#4d4141]">
                Produk Terlaris
            </h