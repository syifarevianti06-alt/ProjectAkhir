@extends('layouts.penjual')

@section('title', 'Dashboard Penjual')

@section('content')

<div class="space-y-8">

    {{-- =========================================================
         HEADER
    ========================================================== --}}
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">
            Dashboard
        </h1>

        <p class="mt-1 text-sm text-gray-400">
            Pantau aktivitas toko Lune Attiré hari ini
        </p>
    </div>


    {{-- =========================================================
         STATISTIK
    ========================================================== --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

        {{-- PENJUALAN HARI INI --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-400">
                        Penjualan Hari Ini
                    </p>

                    <h2 class="mt-2 text-2xl font-semibold text-gray-800">
                        Rp {{ number_format($penjualanHariIni, 0, ',', '.') }}
                    </h2>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f8eeee]">
                    <svg
                        class="h-5 w-5 text-[#9b6b6b]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-10V4m0 16v-2m0-14a8 8 0 100 16 8 8 0 000-16z"
                        />
                    </svg>
                </div>

            </div>
        </div>


        {{-- PESANAN BARU --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-400">
                        Pesanan Baru
                    </p>

                    <h2 class="mt-2 text-2xl font-semibold text-gray-800">
                        {{ $pesananBaru }}
                    </h2>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f8eeee]">
                    <svg
                        class="h-5 w-5 text-[#9b6b6b]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7"
                        />
                    </svg>
                </div>

            </div>
        </div>


        {{-- PESANAN DIPROSES --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-400">
                        Pesanan Diproses
                    </p>

                    <h2 class="mt-2 text-2xl font-semibold text-gray-800">
                        {{ $pesananDiproses }}
                    </h2>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f8eeee]">
                    <svg
                        class="h-5 w-5 text-[#9b6b6b]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                </div>

            </div>
        </div>


        {{-- PESANAN SELESAI --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-400">
                        Pesanan Selesai
                    </p>

                    <h2 class="mt-2 text-2xl font-semibold text-gray-800">
                        {{ $pesananSelesai }}
                    </h2>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f8eeee]">
                    <svg
                        class="h-5 w-5 text-[#9b6b6b]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>
                </div>

            </div>
        </div>

    </div>


    {{-- =========================================================
         GRAFIK + KATEGORI
    ========================================================== --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

        {{-- GRAFIK --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm xl:col-span-2">

            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-800">
                    Grafik Penjualan
                </h2>

                <p class="mt-1 text-sm text-gray-400">
                    Penjualan 7 hari terakhir
                </p>
            </div>


            @php
                $nilaiMaksimal = collect($grafikPenjualan)->max('total');

                if ($nilaiMaksimal <= 0) {
                    $nilaiMaksimal = 1;
                }
            @endphp


            <div class="flex h-64 items-end gap-3 border-b border-gray-100 px-2">

                @foreach ($grafikPenjualan as $data)

                    @php
                        $tinggi = ($data['total'] / $nilaiMaksimal) * 100;
                    @endphp

                    <div class="flex h-full flex-1 flex-col justify-end">

                        <div class="group relative flex items-end justify-center">

                            <div
                                class="w-full max-w-[45px] rounded-t-lg bg-[#b98d8d] transition hover:bg-[#9f7070]"
                                style="height: {{ max($tinggi, 3) }}%;"
                            ></div>

                            <div
                                class="pointer-events-none absolute bottom-full left-1/2 mb-2 hidden -translate-x-1/2 whitespace-nowrap rounded-lg bg-gray-800 px-3 py-1.5 text-xs text-white group-hover:block"
                            >
                                Rp {{ number_format($data['total'], 0, ',', '.') }}
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- TANGGAL --}}
            <div class="mt-3 flex gap-3 px-2">

                @foreach ($grafikPenjualan as $data)

                    <div class="flex-1 text-center text-xs text-gray-400">
                        {{ $data['tanggal'] }}
                    </div>

                @endforeach

            </div>

        </div>


        {{-- KATEGORI --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm">

            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-800">
                    Penjualan Kategori
                </h2>

                <p class="mt-1 text-sm text-gray-400">
                    Produk yang paling banyak terjual
                </p>
            </div>


            @if ($kategoriPenjualan->count() > 0)

                <div class="space-y-5">

                    @foreach ($kategoriPenjualan as $kategori)

                        @php
                            $persentase = $totalTerjual > 0
                                ? round(($kategori->jumlah / $totalTerjual) * 100)
                                : 0;
                        @endphp

                        <div>

                            <div class="mb-2 flex items-center justify-between">

                                <span class="text-sm font-medium text-gray-700">
                                    {{ $kategori->category }}
                                </span>

                                <span class="text-sm text-gray-400">
                                    {{ $persentase }}%
                                </span>

                            </div>

                            <div class="h-2 overflow-hidden rounded-full bg-gray-100">

                                <div
                                    class="h-full rounded-full bg-[#b98d8d]"
                                    style="width: {{ $persentase }}%;"
                                ></div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="flex min-h-[180px] items-center justify-center">

                    <p class="text-sm text-gray-400">
                        Belum ada data penjualan.
                    </p>

                </div>

            @endif

        </div>

    </div>


    {{-- =========================================================
         PESANAN TERBARU + STOK MENIPIS
    ========================================================== --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

        {{-- PESANAN TERBARU --}}
        <div class="overflow-hidden rounded-2xl bg-white shadow-sm xl:col-span-2">

            <div class="flex items-center justify-between border-b border-gray-100 px-6 py-5">

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Pesanan Terbaru
                    </h2>

                    <p class="mt-1 text-sm text-gray-400">
                        Pesanan terbaru dari pelanggan
                    </p>
                </div>

                <a
                    href="{{ route('penjual.pesanan') }}"
                    class="text-sm font-medium text-[#9b6b6b] hover:text-[#7f5555]"
                >
                    Lihat semua
                </a>

            </div>


            @if ($pesananTerbaru->count() > 0)

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-gray-50">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-400">
                                    Pesanan
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-400">
                                    Pelanggan
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-400">
                                    Total
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-400">
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            @foreach ($pesananTerbaru as $order)

                                @php
                                    $status = strtolower($order->status ?? '');

                                    $statusClass = match ($status) {
                                        'pending',
                                        'baru' => 'bg-yellow-50 text-yellow-700',

                                        'paid' => 'bg-green-50 text-green-700',

                                        'processing',
                                        'diproses' => 'bg-blue-50 text-blue-700',

                                        'shipped',
                                        'dikirim' => 'bg-purple-50 text-purple-700',

                                        'completed',
                                        'selesai' => 'bg-green-50 text-green-700',

                                        'cancelled',
                                        'dibatalkan' => 'bg-red-50 text-red-700',

                                        default => 'bg-gray-50 text-gray-600',
                                    };
                                @endphp


                                <tr class="hover:bg-gray-50">

                                    {{-- NOMOR PESANAN --}}
                                    <td class="px-6 py-4">

                                        <span class="text-sm font-medium text-gray-800">
                                            {{ $order->order_number ?? 'PS-' . str_pad($order->id, 4, '0', STR_PAD_LEFT) }}
                                        </span>

                                    </td>


                                    {{-- PELANGGAN --}}
                                    <td class="px-6 py-4">

                                        <span class="text-sm text-gray-600">
                                            {{ $order->user?->name ?? $order->address_name ?? 'Pelanggan' }}
                                        </span>

                                    </td>


                                    {{-- TOTAL --}}
                                    <td class="px-6 py-4">

                                        <span class="text-sm font-medium text-gray-800">
                                            Rp {{ number_format($order->total, 0, ',', '.') }}
                                        </span>

                                    </td>


                                    {{-- STATUS --}}
                                    <td class="px-6 py-4">

                                        <span class="inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $statusClass }}">
                                            {{ ucfirst($order->status ?? 'Tidak diketahui') }}
                                        </span>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="flex min-h-[180px] items-center justify-center">

                    <p class="text-sm text-gray-400">
                        Belum ada pesanan.
                    </p>

                </div>

            @endif

        </div>


        {{-- STOK MENIPIS --}}
        <div class="rounded-2xl bg-white shadow-sm">

            <div class="border-b border-gray-100 px-6 py-5">

                <h2 class="text-lg font-semibold text-gray-800">
                    Stok Menipis
                </h2>

                <p class="mt-1 text-sm text-gray-400">
                    Produk dengan stok 10 atau kurang
                </p>

            </div>


            @if ($stokMenipis->count() > 0)

                <div class="divide-y divide-gray-100">

                    @foreach ($stokMenipis as $product)

                        <div class="flex items-center justify-between px-6 py-4">

                            <div class="min-w-0">

                                <p class="truncate text-sm font-medium text-gray-800">
                                    {{ $product->name }}
                                </p>

                                <p class="mt-1 text-xs text-gray-400">
                                    {{ $product->category }}
                                </p>

                            </div>


                            <div class="ml-4 flex-shrink-0 text-right">

                                <p class="text-sm font-semibold
                                    {{ $product->stock <= 5
                                        ? 'text-red-500'
                                        : 'text-orange-500' }}"
                                >
                                    {{ $product->stock }}
                                </p>

                                <p class="text-xs text-gray-400">
                                    stok
                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="flex min-h-[180px] items-center justify-center px-6">

                    <p class="text-center text-sm text-gray-400">
                        Semua stok masih aman.
                    </p>

                </div>

            @endif

        </div>

    </div>


    {{-- =========================================================
         INFORMASI PRODUK
    ========================================================== --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

        {{-- TOTAL PRODUK --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm">

            <p class="text-sm text-gray-400">
                Total Produk
            </p>

            <p class="mt-2 text-2xl font-semibold text-gray-800">
                {{ $totalProduk }}
            </p>

            <p class="mt-1 text-xs text-gray-400">
                Produk tersedia di toko
            </p>

        </div>


        {{-- TOTAL STOK --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm">

            <p class="text-sm text-gray-400">
                Total Stok
            </p>

            <p class="mt-2 text-2xl font-semibold text-gray-800">
                {{ number_format($totalStok, 0, ',', '.') }}
            </p>

            <p class="mt-1 text-xs text-gray-400">
                Jumlah seluruh stok produk
            </p>

        </div>

    </div>

</div>

@endsection