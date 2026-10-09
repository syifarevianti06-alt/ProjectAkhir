@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="space-y-7">
    <div>

        <h1 class="font-serif text-2xl font-bold text-[#4d4141]">
            Dashboard Admin
        </h1>

        <p class="mt-1 text-sm text-[#9a8888]">
            Selamat datang, Admin. Kelola seluruh data dan aktivitas Lune Attiré.
        </p>

    </div>

    //STATISTICS
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">


        //TOTAL PENGGUNA
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs text-[#a28f8f]">
                        Total Pengguna
                    </p>

                    <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                        {{ $totalPengguna }}
                    </h2>

                    <p class="mt-2 text-[11px] text-[#9a8888]">
                        Pengguna terdaftar
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f3e4e4] text-[#986d6d]">
                    ♙
                </div>

            </div>

        </div>


        //TOTAL PRODUK
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs text-[#a28f8f]">
                        Total Produk
                    </p>

                    <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                        {{ $totalProduk }}
                    </h2>

                    <p class="mt-2 text-[11px] text-[#9a8888]">
                        Produk tersedia
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f3e4e4] text-[#986d6d]">
                    ▣
                </div>

            </div>

        </div>


        //TOTAL PESANAN
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs text-[#a28f8f]">
                        Total Pesanan
                    </p>

                    <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                        {{ $totalPesanan }}
                    </h2>

                    <p class="mt-2 text-[11px] text-[#9a8888]">
                        Seluruh pesanan
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f3e4e4] text-[#986d6d]">
                    □
                </div>

            </div>

        </div>


        //TOTAL PENDAPATAN
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs text-[#a28f8f]">
                        Total Pendapatan
                    </p>

                    <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                    </h2>

                    <p class="mt-2 text-[11px] text-[#9a8888]">
                        Dari pesanan yang valid
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f3e4e4] text-[#986d6d]">
                    Rp
                </div>

            </div>

        </div>

    </div>


    //GRAFIK + PESANAN TERBARU
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">


        //GRAFIK PENJUALAN
        <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm">

            <div class="mb-5 flex items-center justify-between">

                <div>

                    <h2 class="font-semibold text-[#4d4141]">
                        Grafik Penjualan
                    </h2>

                    <p class="mt-1 text-xs text-[#a28f8f]">
                        Penjualan 7 hari terakhir
                    </p>

                </div>

                <div class="rounded-lg border border-[#eadede] px-3 py-2 text-xs text-[#8f7a7a]">
                    7 Hari Terakhir
                </div>

            </div>


            @php

            $maksimal = collect($grafikPenjualan)->max('total');

            if ($maksimal <= 0) {
                $maksimal=1;
                }

                @endphp


                //BAR CHART
                <div class="flex h-[230px] items-end gap-3 rounded-xl bg-[#fcf9f9] px-5 pb-6 pt-8 sm:gap-5 sm:px-6">

                @foreach ($grafikPenjualan as $data)

                @php

                $tinggi = ($data['total'] / $maksimal) * 100;

                @endphp


                <div class="group relative flex h-full flex-1 items-end">

                    //TOOLTIP
                    <div class="pointer-events-none absolute bottom-full left-1/2 z-10 mb-2 hidden -translate-x-1/2 whitespace-nowrap rounded-lg bg-[#4d4141] px-3 py-2 text-[10px] text-white shadow-lg group-hover:block">

                        Rp {{ number_format($data['total'], 0, ',', '.') }}

                    </div>


                    //BAR
                    <div
                        class="w-full rounded-t-md bg-[#b98282] transition-all duration-300 hover:bg-[#986d6d]"
                        style="height: {{ max($tinggi, 3) }}%;"></div>

                </div>

                @endforeach

        </div>


        //LABEL HARI
        <div class="mt-3 flex gap-3 px-1 sm:gap-5">

            @foreach ($grafikPenjualan as $data)

            <div class="flex-1 text-center text-[10px] text-[#a28f8f]">

                {{ $data['tanggal'] }}

            </div>

            @endforeach

        </div>

    </div>


    //PESANAN TERBARU
    <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm">

        <div class="mb-5 flex items-center justify-between">

            <div>

                <h2 class="font-semibold text-[#4d4141]">
                    Pesanan Terbaru
                </h2>

                <p class="mt-1 text-xs text-[#a28f8f]">
                    Aktivitas pesanan terbaru
                </p>

            </div>

            <a
                href="{{ route('admin.pesanan') }}"
                class="text-xs text-[#986d6d] transition hover:text-[#765353]">
                Lihat Semua
            </a>

        </div>


        @if ($pesananTerbaru->count() > 0)

        <div class="space-y-4">

            @foreach ($pesananTerbaru as $order)

            @php

            $status = strtolower($order->status ?? '');

            $statusClass = match ($status) {

            'pending',
            'baru'
            => 'bg-yellow-50 text-yellow-700',

            'processing',
            'diproses'
            => 'bg-blue-50 text-blue-700',

            'shipped',
            'dikirim'
            => 'bg-purple-50 text-purple-700',

            'completed',
            'selesai'
            => 'bg-green-50 text-green-700',

            'cancelled',
            'dibatalkan'
            => 'bg-red-50 text-red-700',

            default
            => 'bg-gray-50 text-gray-600',

            };

            @endphp


            <div class="flex items-center justify-between border-b border-[#f0e8e8] pb-3">

                <div class="min-w-0">

                    <p class="text-xs font-semibold text-[#4d4141]">

                        {{ $order->order_number ?? '#PS' . str_pad($order->id, 4, '0', STR_PAD_LEFT) }}

                    </p>

                    <p class="mt-1 truncate text-[11px] text-[#a28f8f]">

                        {{ $order->user->name ?? $order->address_name ?? 'Pelanggan' }}

                    </p>

                </div>


                <div class="ml-3 flex-shrink-0">

                    <span
                        class="rounded-full px-3 py-1 text-[10px] {{ $statusClass }}">

                        {{ ucfirst($order->status ?? 'Tidak diketahui') }}

                    </span>

                </div>

            </div>

            @endforeach

        </div>

        @else

        <div class="flex min-h-[180px] items-center justify-center">

            <p class="text-xs text-[#a28f8f]">
                Belum ada pesanan.
            </p>

        </div>

        @endif

    </div>

</div>


//PRODUK TERBARU
<div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm">

    <div class="mb-5 flex items-center justify-between">

        <div>

            <h2 class="font-semibold text-[#4d4141]">
                Produk Terbaru
            </h2>

            <p class="mt-1 text-xs text-[#a28f8f]">
                Produk yang baru ditambahkan
            </p>

        </div>

        <a
            href="{{ route('admin.produk') }}"
            class="text-xs text-[#986d6d] transition hover:text-[#765353]">
            Lihat Semua
        </a>

    </div>


    @if ($produkTerbaru->count() > 0)

    <div class="grid grid-cols-2 gap-5 md:grid-cols-4">

        @foreach ($produkTerbaru as $product)

        <div class="overflow-hidden rounded-xl border border-[#eee5e5] bg-white">


            //GAMBAR
            <div class="h-32 bg-[#f5eeee]">

                @if ($product->image)

                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                    class="h-full w-full object-cover">

                @else

                <div class="flex h-full items-center justify-center">

                    <span class="text-xs text-[#b59696]">
                        Foto Produk
                    </span>

                </div>

                @endif

            </div>


            //INFORMASI
            <div class="p-3">

                <p class="truncate text-xs font-semibold text-[#4d4141]">

                    {{ $product->name }}

                </p>

                <p class="mt-1 text-xs text-[#986d6d]">

                    Rp {{ number_format($product->price, 0, ',', '.') }}

                </p>

                <p class="mt-1 text-[10px] text-[#a28f8f]">

                    Stok: {{ $product->stock }}

                </p>

            </div>

        </div>

        @endforeach

    </div>

    @else

    <div class="flex min-h-[150px] items-center justify-center">

        <p class="text-xs text-[#a28f8f]">
            Belum ada produk.
        </p>

    </div>

    @endif

</div>


</div>

@endsection