@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')

<div class="min-h-[calc(100vh-80px)] bg-[#f8f1eb]">

    <div class="max-w-5xl mx-auto px-6 py-10">

        {{-- KEMBALI --}}
        <a
            href="{{ route('orders') }}"
            class="inline-flex items-center text-sm text-[#8b203d] hover:underline mb-6">
            ← Kembali ke Pesanan Saya
        </a>


        {{-- HEADER --}}
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-[#332326]">
                Detail Pesanan
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                {{ $order->order_number ?: 'PS-' . str_pad($order->id, 4, '0', STR_PAD_LEFT) }}
            </p>

        </div>


        {{-- STATUS PESANAN --}}
        <div class="bg-white rounded-2xl p-6 shadow-sm mb-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <p class="text-xs text-gray-400">
                        Status Pesanan
                    </p>

                    @php
                    $status = strtolower($order->status ?? '');

                    $statusClass = match ($status) {
                    'pending',
                    'baru',
                    'menunggu_pembayaran'
                    => 'bg-yellow-50 text-yellow-700',

                    'paid',
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

                    <span
                        class="inline-flex mt-2 rounded-full px-3 py-1
                               text-xs font-medium {{ $statusClass }}">
                        {{ ucfirst(str_replace('_', ' ', $order->status ?? 'Tidak diketahui')) }}
                    </span>

                </div>


                <div>

                    <p class="text-xs text-gray-400">
                        Tanggal Pesanan
                    </p>

                    <p class="mt-2 text-sm font-medium text-[#332326]">
                        {{ $order->created_at?->format('d M Y, H:i') ?? '-' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- INFORMASI PENGIRIMAN --}}
        <div class="bg-white rounded-2xl p-6 shadow-sm mb-6">

            <h2 class="text-lg font-semibold text-[#332326] mb-5">
                Informasi Pengiriman
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">

                <div>
                    <p class="text-xs text-gray-400">
                        Nama Penerima
                    </p>

                    <p class="mt-1 text-[#332326]">
                        {{ $order->address_name ?: '-' }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-400">
                        Nomor Telepon
                    </p>

                    <p class="mt-1 text-[#332326]">
                        {{ $order->address_phone ?: '-' }}
                    </p>
                </div>


                <div class="md:col-span-2">

                    <p class="text-xs text-gray-400">
                        Alamat
                    </p>

                    <p class="mt-1 text-[#332326]">
                        {{ $order->address_full ?: '-' }}
                    </p>

                </div>


                <div>
                    <p class="text-xs text-gray-400">
                        Kota / Kabupaten
                    </p>

                    <p class="mt-1 text-[#332326]">
                        {{ $order->address_city ?: '-' }}
                    </p>
                </div>


                <div>
                    <p class="text-xs text-gray-400">
                        Kode Pos
                    </p>

                    <p class="mt-1 text-[#332326]">
                        {{ $order->address_postal_code ?: '-' }}
                    </p>
                </div>

            </div>

        </div>


        {{-- PRODUK --}}
        <div class="bg-white rounded-2xl p-6 shadow-sm mb-6">

            <h2 class="text-lg font-semibold text-[#332326] mb-5">
                Produk Pesanan
            </h2>

            @if ($order->items->count())

            <div class="divide-y divide-gray-100">

                @foreach ($order->items as $item)

                <div class="flex gap-4 py-5 first:pt-0 last:pb-0">

                    {{-- FOTO --}}
                    <div class="h-20 w-20 flex-shrink-0 overflow-hidden
                                        rounded-xl bg-[#f8f1eb]">

                        @if ($item->product_image)

                        <img
                            src="{{ asset('storage/' . $item->product_image) }}"
                            alt="{{ $item->product_name }}"
                            class="h-full w-full object-cover">

                        @else

                        <div class="flex h-full w-full items-center
                                                justify-center">
                            <span class="text-xs text-gray-400">
                                No Image
                            </span>
                        </div>

                        @endif

                    </div>


                    {{-- DETAIL PRODUK --}}
                    <div class="flex-1 min-w-0">

                        <h3 class="font-semibold text-[#332326]">
                            {{ $item->product_name }}
                        </h3>

                        <div class="mt-2 space-y-1 text-xs text-gray-400">

                            <p>
                                Ukuran:
                                {{ $item->size ?: '-' }}
                            </p>

                            <p>
                                Warna:
                                {{ $item->color ?: '-' }}
                            </p>

                            <p>
                                Jumlah:
                                {{ $item->quantity }} pcs
                            </p>

                        </div>

                    </div>


                    {{-- HARGA --}}
                    <div class="text-right flex-shrink-0">

                        <p class="text-sm font-semibold text-[#332326]">
                            Rp {{ number_format(
                                        $item->price * $item->quantity,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                        </p>

                        <p class="mt-1 text-xs text-gray-400">
                            Rp {{ number_format(
                                        $item->price,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                            / pcs
                        </p>

                    </div>

                </div>

                @endforeach

            </div>

            @else

            <div class="py-8 text-center text-sm text-gray-400">
                Tidak ada produk dalam pesanan ini.
            </div>

            @endif

        </div>


        {{-- RINGKASAN PEMBAYARAN --}}
        <div class="bg-white rounded-2xl p-6 shadow-sm">

            <h2 class="text-lg font-semibold text-[#332326] mb-5">
                Ringkasan Pembayaran
            </h2>

            <div class="space-y-3 text-sm">

                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Subtotal
                    </span>

                    <span class="font-medium text-[#332326]">
                        Rp {{ number_format(
                            $order->subtotal,
                            0,
                            ',',
                            '.'
                        ) }}
                    </span>

                </div>


                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Ongkir
                    </span>

                    <span class="font-medium text-green-600">
                        Gratis
                    </span>

                </div>


                <div class="border-t border-gray-100 pt-4
                            flex justify-between items-center">

                    <span class="font-semibold text-[#332326]">
                        Total
                    </span>

                    <span class="text-xl font-bold text-[#8b203d]">
                        Rp {{ number_format(
                            $order->total,
                            0,
                            ',',
                            '.'
                        ) }}
                    </span>

                </div>


                <div class="flex justify-between pt-2">

                    <span class="text-gray-500">
                        Metode Pembayaran
                    </span>

                    <span class="font-medium text-[#332326]">
                        {{ strtoupper($order->payment_method ?: '-') }}
                    </span>

                </div>

            </div>


            {{-- BAYAR QRIS --}}
            @if (
            strtolower($order->payment_method ?? '') === 'qris' &&
            in_array(strtolower($order->status ?? ''), [
            'pending',
            'baru',
            'menunggu_pembayaran'
            ])
            )

            <a
                href="{{ route('payment.qris', $order->id) }}"
                class="block mt-6 w-full rounded-xl
                           bg-[#8b2947] py-3 text-center
                           text-sm font-semibold text-white
                           hover:bg-[#721f39] transition">
                Bayar dengan QRIS
            </a>

            @endif

        </div>

    </div>

</div>

@endsection