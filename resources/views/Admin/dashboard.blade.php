@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="space-y-7">

    {{-- HEADER --}}
    <div>

        <h1 class="font-serif text-2xl font-bold text-[#4d4141]">
            Dashboard Admin
        </h1>

        <p class="mt-1 text-sm text-[#9a8888]">
            Selamat datang, Admin. Kelola seluruh data dan aktivitas Lune Attiré.
        </p>

    </div>


    {{-- STATISTIC --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

        {{-- CARD --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs text-[#a28f8f]">
                        Total Pengguna
                    </p>

                    <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                        245
                    </h2>

                    <p class="mt-2 text-[11px] text-green-600">
                        ↑ 12% dari bulan lalu
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f3e4e4] text-[#986d6d]">
                    ♙
                </div>

            </div>

        </div>


        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs text-[#a28f8f]">
                        Total Produk
                    </p>

                    <h2 class="mt-2 text-2xl font-bold">
                        128
                    </h2>

                    <p class="mt-2 text-[11px] text-green-600">
                        ↑ 8% dari bulan lalu
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f3e4e4] text-[#986d6d]">
                    ▣
                </div>

            </div>

        </div>


        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs text-[#a28f8f]">
                        Total Pesanan
                    </p>

                    <h2 class="mt-2 text-2xl font-bold">
                        312
                    </h2>

                    <p class="mt-2 text-[11px] text-green-600">
                        ↑ 15% dari bulan lalu
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f3e4e4] text-[#986d6d]">
                    □
                </div>

            </div>

        </div>


        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs text-[#a28f8f]">
                        Total Pendapatan
                    </p>

                    <h2 class="mt-2 text-2xl font-bold">
                        Rp 12.560.000
                    </h2>

                    <p class="mt-2 text-[11px] text-green-600">
                        ↑ 10% dari bulan lalu
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f3e4e4] text-[#986d6d]">
                    Rp
                </div>

            </div>

        </div>

    </div>


    {{-- GRAFIK + PESANAN --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">

        {{-- GRAFIK --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm">

            <div class="mb-5 flex items-center justify-between">

                <div>
                    <h2 class="font-semibold">
                        Grafik Penjualan
                    </h2>

                    <p class="mt-1 text-xs text-[#a28f8f]">
                        Penjualan 7 hari terakhir
                    </p>
                </div>

                <button class="rounded-lg border border-[#eadede] px-3 py-2 text-xs">
                    7 Hari Terakhir
                </button>

            </div>

            {{-- Grafik sederhana --}}
            <div class="flex h-[230px] items-end gap-5 rounded-xl bg-[#fcf9f9] px-6 pb-6 pt-8">

                <div class="h-[35%] flex-1 rounded-t-md bg-[#d5abab]"></div>
                <div class="h-[48%] flex-1 rounded-t-md bg-[#c89595]"></div>
                <div class="h-[42%] flex-1 rounded-t-md bg-[#d5abab]"></div>
                <div class="h-[63%] flex-1 rounded-t-md bg-[#b98282]"></div>
                <div class="h-[76%] flex-1 rounded-t-md bg-[#a96f6f]"></div>
                <div class="h-[68%] flex-1 rounded-t-md bg-[#b98282]"></div>
                <div class="h-[88%] flex-1 rounded-t-md bg-[#986d6d]"></div>

            </div>

            <div class="mt-3 flex justify-between text-[10px] text-[#a28f8f]">
                <span>Sen</span>
                <span>Sel</span>
                <span>Rab</span>
                <span>Kam</span>
                <span>Jum</span>
                <span>Sab</span>
                <span>Min</span>
            </div>

        </div>


        {{-- PESANAN TERBARU --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm">

            <div class="mb-5 flex items-center justify-between">

                <h2 class="font-semibold">
                    Pesanan Terbaru
                </h2>

                <a href="#" class="text-xs text-[#986d6d]">
                    Lihat Semua
                </a>

            </div>

            <div class="space-y-4">

                @foreach ([
                    ['#PS0012', 'Rina Amalia', 'Baru'],
                    ['#PS0011', 'Dinda Putri', 'Diproses'],
                    ['#PS0010', 'Siti Aisyah', 'Dikirim'],
                    ['#PS0009', 'Nabila Zahra', 'Selesai'],
                    ['#PS0008', 'Fitria Lestari', 'Baru'],
                ] as $order)

                    <div class="flex items-center justify-between border-b border-[#f0e8e8] pb-3">

                        <div>
                            <p class="text-xs font-semibold">
                                {{ $order[0] }}
                            </p>

                            <p class="mt-1 text-[11px] text-[#a28f8f]">
                                {{ $order[1] }}
                            </p>
                        </div>

                        <span
                            class="rounded-full bg-[#f5e5e5] px-3 py-1 text-[10px] text-[#986d6d]"
                        >
                            {{ $order[2] }}
                        </span>

                    </div>

                @endforeach

            </div>

        </div>

    </div>


    {{-- PRODUK TERBARU --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm">

        <div class="mb-5 flex items-center justify-between">

            <h2 class="font-semibold">
                Produk Terbaru
            </h2>

            <a href="#" class="text-xs text-[#986d6d]">
                Lihat Semua
            </a>

        </div>

        <div class="grid grid-cols-2 gap-5 md:grid-cols-4">

            @foreach ([
                ['Abelia Blouse Top', 'Rp 162.000'],
                ['Kemeja Oversize', 'Rp 145.000'],
                ['Rok Plisket', 'Rp 120.000'],
                ['Cardigan Rajut', 'Rp 110.000'],
            ] as $product)

                <div class="overflow-hidden rounded-xl border border-[#eee5e5]">

                    <div class="flex h-32 items-center justify-center bg-[#f5eeee]">

                        <span class="text-xs text-[#b59696]">
                            Foto Produk
                        </span>

                    </div>

                    <div class="p-3">

                        <p class="text-xs font-semibold">
                            {{ $product[0] }}
                        </p>

                        <p class="mt-1 text-xs text-[#986d6d]">
                            {{ $product[1] }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection