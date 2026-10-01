@extends('layout.penjual')

@section('title', 'Pesanan')

@section('page-title', 'Pesanan')

@section('content')

<div class="space-y-7">

    {{-- HEADER --}}
    <div>
        <h1 class="font-serif text-2xl font-bold text-[#4d4141]">
            Pesanan
        </h1>

        <p class="mt-1 text-sm text-[#9a8888]">
            Kelola pesanan pelanggan di toko Lune Attiré.
        </p>
    </div>


    {{-- STATISTIK PESANAN --}}
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">
                Pesanan Baru
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                8
            </h2>

            <p class="mt-2 text-[10px] text-[#986d6d]">
                Menunggu diproses
            </p>
        </div>


        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">
                Diproses
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                6
            </h2>

            <p class="mt-2 text-[10px] text-[#986d6d]">
                Sedang diproses
            </p>
        </div>


        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">
                Dikirim
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                12
            </h2>

            <p class="mt-2 text-[10px] text-[#986d6d]">
                Dalam perjalanan
            </p>
        </div>


        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">
                Selesai
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                32
            </h2>

            <p class="mt-2 text-[10px] text-[#986d6d]">
                Pesanan selesai
            </p>
        </div>

    </div>


    {{-- FILTER --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            <input
                type="text"
                placeholder="Cari nomor pesanan atau nama pelanggan..."
                class="h-10 w-full max-w-[350px] rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-xs outline-none focus:border-[#986d6d]"
            >

            <select
                class="h-10 rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-xs outline-none focus:border-[#986d6d]"
            >
                <option>Semua Status</option>
                <option>Baru</option>
                <option>Diproses</option>
                <option>Dikirim</option>
                <option>Selesai</option>
                <option>Dibatalkan</option>
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
                            Pesanan
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Pelanggan
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Produk
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Total
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
                        ['#LA-1001', 'Rina Amalia', 'Abelia Blouse Top', 'Rp 162.000', 'Baru'],
                        ['#LA-1002', 'Siti Rahma', 'Kemeja Oversize', 'Rp 145.000', 'Diproses'],
                        ['#LA-1003', 'Alya Putri', 'Rok Plisket', 'Rp 120.000', 'Dikirim'],
                        ['#LA-1004', 'Nabila', 'Cardigan Rajut', 'Rp 110.000', 'Selesai'],
                        ['#LA-1005', 'Dinda', 'Celana Kulot', 'Rp 135.000', 'Selesai'],
                    ] as $order)

                    <tr class="border-b border-[#f1eaea] hover:bg-[#fdfafa]">

                        <td class="px-6 py-5">

                            <p class="font-semibold text-[#986d6d]">
                                {{ $order[0] }}
                            </p>

                            <p class="mt-1 text-[10px] text-[#a28f8f]">
                                01 Okt 2026
                            </p>

                        </td>


                        <td class="px-6 py-5 text-[#665858]">
                            {{ $order[1] }}
                        </td>


                        <td class="px-6 py-5 text-[#665858]">
                            {{ $order[2] }}
                        </td>


                        <td class="px-6 py-5 font-semibold text-[#4d4141]">
                            {{ $order[3] }}
                        </td>


                        <td class="px-6 py-5">

                            @if ($order[4] === 'Baru')

                                <span class="rounded-full bg-blue-50 px-3 py-1 text-[10px] text-blue-600">
                                    Baru
                                </span>

                            @elseif ($order[4] === 'Diproses')

                                <span class="rounded-full bg-orange-50 px-3 py-1 text-[10px] text-orange-600">
                                    Diproses
                                </span>

                            @elseif ($order[4] === 'Dikirim')

                                <span class="rounded-full bg-purple-50 px-3 py-1 text-[10px] text-purple-600">
                                    Dikirim
                                </span>

                            @else

                                <span class="rounded-full bg-green-50 px-3 py-1 text-[10px] text-green-600">
                                    Selesai
                                </span>

                            @endif

                        </td>


                        <td class="px-6 py-5 text-center">

                            <button
                                class="rounded-lg border border-[#decaca] px-3 py-2 text-[10px] text-[#986d6d] hover:bg-[#f8eeee]"
                            >
                                Detail
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