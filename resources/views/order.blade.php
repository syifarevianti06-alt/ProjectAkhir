@extends('layouts.app')

@section('content')

<div class="min-h-[calc(100vh-80px)] bg-[#f8f1eb]">

    <div class="max-w-6xl mx-auto px-6 py-10">

        {{-- HEADER --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-[#332326]">
                Pesanan Saya
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Lihat riwayat pesanan kamu di Lune Attiré.
            </p>
        </div>


        {{-- SUCCESS --}}
        @if (session('success'))
            <div class="mb-6 rounded-xl bg-green-50 px-5 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif


        {{-- BELUM ADA PESANAN --}}
        @if ($orders->isEmpty())

            <div class="rounded-2xl bg-white p-12 text-center shadow-sm">

                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-[#f5e5e5]">

                    <svg
                        class="h-8 w-8 text-[#8b203d]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 4h13M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"
                        />
                    </svg>

                </div>

                <h2 class="text-lg font-semibold text-[#332326]">
                    Belum ada pesanan
                </h2>

                <p class="mt-2 text-sm text-gray-400">
                    Kamu belum memiliki pesanan.
                </p>

                <a
                    href="{{ route('produk.index') }}"
                    class="mt-6 inline-block rounded-lg bg-[#8b203d] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#741a34]"
                >
                    Belanja Sekarang
                </a>

            </div>

        @else

            {{-- LIST PESANAN --}}
            <div class="space-y-5">

                @foreach ($orders as $order)

                    <div class="rounded-2xl bg-white p-6 shadow-sm">

                        {{-- HEADER PESANAN --}}
                        <div class="flex flex-col gap-3 border-b border-gray-100 pb-5 sm:flex-row sm:items-center sm:justify-between">

                            <div>

                                <p class="text-xs text-gray-400">
                                    Nomor Pesanan
                                </p>

                                <p class="mt-1 text-sm font-semibold text-[#332326]">
                                    {{ $order->order_number ?? 'PS-' . str_pad($order->id, 4, '0', STR_PAD_LEFT) }}
                                </p>

                            </div>


                            <div class="text-left sm:text-right">

                                <p class="text-xs text-gray-400">
                                    {{ $order->created_at?->format('d M Y, H:i') }}
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
                                    class="mt-2 inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $statusClass }}"
                                >
                                    {{ ucfirst(str_replace('_', ' ', $order->status ?? 'Tidak diketahui')) }}
                                </span>

                            </div>

                        </div>


                        {{-- PRODUK --}}
                        <div class="py-5">

                            @foreach ($order->items as $item)

                                <div class="flex items-center gap-4 py-2">

                                    {{-- FOTO PRODUK --}}
                                    <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-xl bg-[#f8f1eb]">

                                        @if ($item->product_image)
                                            <img
                                                src="{{ asset('storage/' . $item->product_image) }}"
                                                alt="{{ $item->product_name }}"
                                                class="h-full w-full object-cover"
                                            >
                                        @else
                                            <div class="flex h-full w-full items-center justify-center text-xs text-gray-400">
                                                No Image
                                            </div>
                                        @endif

                                    </div>


                                    {{-- INFO PRODUK --}}
                                    <div class="min-w-0 flex-1">

                                        <h3 class="truncate text-sm font-semibold text-[#332326]">
                                            {{ $item->product_name }}
                                        </h3>

                                        <p class="mt-1 text-xs text-gray-400">
                                            {{ $item->size ?? '-' }}
                                            ·
                                            {{ $item->color ?? '-' }}
                                            ·
                                            {{ $item->quantity }} pcs
                                        </p>

                                    </div>


                                    {{-- HARGA --}}
                                    <div class="text-right">

                                        <p class="text-sm font-semibold text-[#332326]">
                                            Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                        </p>

                                    </div>

                                </div>

                            @endforeach

                        </div>


                        {{-- FOOTER --}}
                        <div class="flex flex-col gap-4 border-t border-gray-100 pt-5 sm:flex-row sm:items-center sm:justify-between">

                            <div>

                                <p class="text-xs text-gray-400">
                                    Total Pesanan
                                </p>

                                <p class="mt-1 text-lg font-bold text-[#8b203d]">
                                    Rp {{ number_format($order->total, 0, ',', '.') }}
                                </p>

                            </div>


                            <a
                                href="{{ route('order-detail', $order->id) }}"
                                class="inline-flex items-center justify-center rounded-lg border border-[#8b203d] px-5 py-2.5 text-sm font-semibold text-[#8b203d] transition hover:bg-[#8b203d] hover:text-white"
                            >
                                Lihat Detail
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </div>

</div>

@endsection