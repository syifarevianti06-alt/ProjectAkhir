@extends('layouts.penjual')

@section('title', 'Pesanan')

@section('page-title', 'Pesanan')

@section('content')

<div class="space-y-7">

    //HEADER
    <div>
        <h1 class="font-serif text-2xl font-bold text-[#4d4141]">
            Pesanan
        </h1>

        <p class="mt-1 text-sm text-[#9a8888]">
            Kelola pesanan pelanggan di toko Lune Attiré.
        </p>
    </div>


    // SUCCESS MESSAGE
    @if (session('success'))

    <div class="flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">

        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M5 13l4 4L19 7" />
        </svg>

        {{ session('success') }}

    </div>

    @endif


    //STATISTIK
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

        //BARU
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-xs text-[#a28f8f]">
                Pesanan Baru
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                {{ $pesananBaru }}
            </h2>

            <p class="mt-2 text-[10px] text-[#986d6d]">
                Menunggu diproses
            </p>

        </div>


        // DIPROSES
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-xs text-[#a28f8f]">
                Diproses
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                {{ $pesananDiproses }}
            </h2>

            <p class="mt-2 text-[10px] text-[#986d6d]">
                Sedang diproses
            </p>

        </div>


        // DIKIRIM
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-xs text-[#a28f8f]">
                Dikirim
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                {{ $pesananDikirim }}
            </h2>

            <p class="mt-2 text-[10px] text-[#986d6d]">
                Dalam perjalanan
            </p>

        </div>


        // SELESAI
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-xs text-[#a28f8f]">
                Selesai
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                {{ $pesananSelesai }}
            </h2>

            <p class="mt-2 text-[10px] text-[#986d6d]">
                Pesanan selesai
            </p>

        </div>

    </div>


    //FILTER
    <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

        <form
            action="{{ route('penjual.pesanan') }}"
            method="GET"
            class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nomor pesanan atau nama pelanggan..."
                class="h-10 w-full max-w-[350px] rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-xs outline-none focus:border-[#986d6d]">

            <div class="flex gap-2">

                <select
                    name="status"
                    class="h-10 rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-xs outline-none focus:border-[#986d6d]">
                    <option value="">Semua Status</option>

                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>
                        Baru
                    </option>

                    <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>
                        Diproses
                    </option>

                    <option value="shipped" {{ request('status') === 'shipped' ? 'selected' : '' }}>
                        Dikirim
                    </option>

                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>
                        Selesai
                    </option>

                    <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>
                        Dibatalkan
                    </option>

                </select>


                <button
                    type="submit"
                    class="rounded-lg bg-[#986d6d] px-5 py-2 text-xs font-semibold text-white hover:bg-[#805959]">
                    Cari
                </button>

            </div>

        </form>

    </div>


    //TABLE
    <div class="overflow-hidden rounded-2xl border border-[#eadede] bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px] text-left text-xs">

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

                    @forelse ($orders as $order)

                    @php

                    $status = strtolower($order->status ?? '');

                    $statusLabel = match ($status) {

                    'pending',
                    'baru' => 'Baru',

                    'paid' => 'Sudah Dibayar',

                    'processing',
                    'diproses' => 'Diproses',

                    'shipped',
                    'dikirim' => 'Dikirim',

                    'completed',
                    'selesai' => 'Selesai',

                    'cancelled',
                    'dibatalkan' => 'Dibatalkan',

                    default => ucfirst($status),

                    };

                    @endphp


                    <tr class="border-b border-[#f1eaea] hover:bg-[#fdfafa]">


                        // PESANAN
                        <td class="px-6 py-5">

                            <p class="font-semibold text-[#986d6d]">
                                #{{ $order->order_number }}
                            </p>

                            <p class="mt-1 text-[10px] text-[#a28f8f]">
                                {{ $order->created_at?->format('d M Y H:i') }}
                            </p>

                        </td>


                        // PELANGGAN
                        <td class="px-6 py-5">

                            <p class="font-medium text-[#665858]">
                                {{ $order->user?->name ?? $order->address_name ?? 'Pelanggan' }}
                            </p>

                            @if ($order->address_phone)
                            <p class="mt-1 text-[10px] text-[#a28f8f]">
                                {{ $order->address_phone }}
                            </p>
                            @endif

                        </td>


                        // PRODUK
                        <td class="px-6 py-5">

                            @if ($order->items->count())

                            <p class="font-medium text-[#665858]">
                                {{ $order->items->first()->product_name }}
                            </p>

                            @if ($order->items->count() > 1)
                            <p class="mt-1 text-[10px] text-[#a28f8f]">
                                + {{ $order->items->count() - 1 }} produk lainnya
                            </p>
                            @endif

                            @else

                            <span class="text-[#a28f8f]">
                                Tidak ada item
                            </span>

                            @endif

                        </td>


                        // TOTAL
                        <td class="px-6 py-5 font-semibold text-[#4d4141]">

                            Rp {{ number_format($order->total, 0, ',', '.') }}

                        </td>


                        // STATUS
                        <td class="px-6 py-5">

                            @if (in_array($status, ['pending', 'baru']))

                            <span class="rounded-full bg-blue-50 px-3 py-1 text-[10px] text-blue-600">
                                {{ $statusLabel }}
                            </span>

                            @elseif (in_array($status, ['processing', 'diproses']))

                            <span class="rounded-full bg-orange-50 px-3 py-1 text-[10px] text-orange-600">
                                {{ $statusLabel }}
                            </span>

                            @elseif (in_array($status, ['shipped', 'dikirim']))

                            <span class="rounded-full bg-purple-50 px-3 py-1 text-[10px] text-purple-600">
                                {{ $statusLabel }}
                            </span>

                            @elseif (in_array($status, ['completed', 'selesai']))

                            <span class="rounded-full bg-green-50 px-3 py-1 text-[10px] text-green-600">
                                {{ $statusLabel }}
                            </span>

                            @elseif (in_array($status, ['cancelled', 'dibatalkan']))

                            <span class="rounded-full bg-red-50 px-3 py-1 text-[10px] text-red-600">
                                {{ $statusLabel }}
                            </span>

                            @else

                            <span class="rounded-full bg-gray-50 px-3 py-1 text-[10px] text-gray-600">
                                {{ $statusLabel }}
                            </span>

                            @endif

                        </td>


                        // AKSI
                        <td class="px-6 py-5 text-center">

                            <a
                                href="{{ route('penjual.pesanan.show', $order) }}"
                                class="inline-flex rounded-lg border border-[#decaca] px-3 py-2 text-[10px] text-[#986d6d] hover:bg-[#f8eeee]">
                                Detail
                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td
                            colspan="6"
                            class="px-6 py-16 text-center">

                            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#f7eeee]">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-[#986d6d]"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.5">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M20 7l-8-4-8 4m16 0v10l-8 4m8-14l-8 4m0 0L4 7m8 4v10" />
                                </svg>

                            </div>

                            <p class="mt-4 font-medium text-[#4d4141]">
                                Belum ada pesanan
                            </p>

                            <p class="mt-1 text-sm text-[#9a8888]">
                                Belum ada data pesanan di toko Lune Attiré.
                            </p>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        // PAGINATION
        @if ($orders->hasPages())

        <div class="border-t border-[#eadede] px-6 py-4">

            {{ $orders->links() }}

        </div>

        @endif

    </div>

</div>

@endsection