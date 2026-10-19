
@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')

<section class="min-h-screen bg-[#faf5ef]">
    <div class="mx-auto max-w-6xl px-5 py-10 md:px-8">

        {{-- HEADER --}}
        <div class="mb-8">
            <p class="mb-2 font-serif text-xs tracking-[3px]
                      text-[#a47b78]">
                LUNE ATTIRÉ
            </p>

            <h1 class="font-serif text-3xl font-bold
                       text-[#392727] md:text-4xl">
                Pesanan Saya
            </h1>

            <p class="mt-2 text-sm text-[#8c7771]">
                Lihat dan pantau riwayat pesananmu di Lune Attiré.
            </p>
        </div>

        {{-- NOTIFIKASI BERHASIL --}}
        @if (session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-2xl
                        border border-green-200 bg-green-50
                        px-5 py-4 text-sm text-green-700">

                <span class="flex h-8 w-8 shrink-0 items-center
                             justify-center rounded-full bg-green-100">
                    ✓
                </span>

                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- NOTIFIKASI ERROR --}}
        @if (session('error'))
            <div class="mb-6 rounded-2xl border border-red-200
                        bg-red-50 px-5 py-4 text-sm text-red-700">
                {{ session('error') }}
            </div>
        @endif

        {{-- JIKA BELUM ADA PESANAN --}}
        @if ($orders->isEmpty())

            <div class="rounded-2xl border border-dashed
                        border-[#dfc9c0] bg-white/70
                        px-6 py-14 text-center">

                <div class="mx-auto flex h-16 w-16
                            items-center justify-center
                            rounded-full bg-[#f8e9e4]">

                    <svg class="h-8 w-8 text-[#955f60]"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.5"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 4h13M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"/>
                    </svg>

                </div>

                <h2 class="mt-4 font-serif text-xl
                           font-bold text-[#392727]">
                    Belum Ada Pesanan
                </h2>

                <p class="mx-auto mt-2 max-w-sm
                          text-sm leading-6 text-[#8c7771]">
                    Kamu belum memiliki pesanan.
                    Yuk, temukan produk favoritmu di Lune Attiré.
                </p>

                <a href="{{ route('produk.index') }}"
                   class="mt-6 inline-flex items-center gap-2
                          rounded-full bg-[#955f60] px-6 py-3
                          text-sm font-semibold text-white
                          shadow-sm transition duration-300
                          hover:-translate-y-0.5
                          hover:bg-[#7d4d4e] hover:shadow-md">

                    Belanja Sekarang
                    <span aria-hidden="true">→</span>
                </a>

            </div>

        @else

            {{-- RINGKASAN PESANAN --}}
            <div class="mb-6 flex items-center justify-between
                        rounded-2xl border border-[#eaded5]
                        bg-white/70 px-5 py-4">

                <div>
                    <p class="font-serif text-sm font-semibold
                              text-[#392727]">
                        Riwayat Pesanan
                    </p>

                    <p class="mt-1 text-xs text-[#9a8888]">
                        Pesanan yang pernah kamu buat.
                    </p>
                </div>

                <div class="rounded-full bg-[#f8e9e4]
                            px-4 py-2 text-xs font-semibold
                            text-[#955f60]">
                    {{ $orders->count() }} pesanan
                </div>

            </div>

            {{-- DAFTAR PESANAN --}}
            <div class="space-y-5">

                @foreach ($orders as $order)

                    <article class="overflow-hidden rounded-2xl
                                    border border-[#eaded5]
                                    bg-white shadow-sm
                                    transition duration-300
                                    hover:shadow-md">

                        {{-- HEADER PESANAN --}}
                        <div class="flex flex-col gap-4
                                    border-b border-[#f0e5de]
                                    bg-[#fffdfb] px-5 py-5
                                    sm:flex-row sm:items-center
                                    sm:justify-between md:px-7">

                            <div>
                                <p class="text-xs text-[#a18b84]">
                                    Nomor Pesanan
                                </p>

                                <h2 class="mt-1 break-all
                                           text-sm font-bold
                                           text-[#392727]">
                                    {{ $order->order_number ?? 'PS-' . str_pad($order->id, 4, '0', STR_PAD_LEFT) }}
                                </h2>

                                <div class="mt-2 flex items-center gap-2
                                            text-xs text-[#9a8888]">

                                    <svg class="h-4 w-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <circle cx="12" cy="12" r="9"
                                                stroke-width="1.5"/>

                                        <path stroke-linecap="round"
                                              stroke-width="1.5"
                                              d="M12 7v5l3 2"/>
                                    </svg>

                                    {{ $order->created_at?->format('d M Y, H:i') }}
                                </div>
                            </div>

                            {{-- STATUS PESANAN --}}
                            @php
                                $status = strtolower($order->status ?? '');

                                $statusClass = match ($status) {
                                    'pending',
                                    'baru',
                                    'menunggu_pembayaran'
                                        => 'bg-amber-50 text-amber-700 ring-amber-200',

                                    'paid',
                                    'processing',
                                    'diproses'
                                        => 'bg-blue-50 text-blue-700 ring-blue-200',

                                    'shipped',
                                    'dikirim'
                                        => 'bg-purple-50 text-purple-700 ring-purple-200',

                                    'completed',
                                    'selesai'
                                        => 'bg-green-50 text-green-700 ring-green-200',

                                    'cancelled',
                                    'dibatalkan'
                                        => 'bg-red-50 text-red-700 ring-red-200',

                                    default
                                        => 'bg-gray-50 text-gray-600 ring-gray-200',
                                };
                            @endphp

                            <span class="inline-flex w-fit items-center
                                         gap-2 rounded-full px-3 py-1.5
                                         text-xs font-semibold ring-1
                                         ring-inset {{ $statusClass }}">

                                <span class="h-1.5 w-1.5 rounded-full
                                    {{ in_array($status, ['pending', 'baru', 'menunggu_pembayaran'])
                                        ? 'bg-amber-500'
                                        : (in_array($status, ['paid', 'processing', 'diproses'])
                                            ? 'bg-blue-500'
                                            : (in_array($status, ['shipped', 'dikirim'])
                                                ? 'bg-purple-500'
                                                : (in_array($status, ['completed', 'selesai'])
                                                    ? 'bg-green-500'
                                                    : (in_array($status, ['cancelled', 'dibatalkan'])
                                                        ? 'bg-red-500'
                                                        : 'bg-gray-400')))) }}">
                                </span>

                                {{ ucfirst(str_replace('_', ' ', $order->status ?? 'Tidak diketahui')) }}
                            </span>

                        </div>

                        {{-- DAFTAR PRODUK --}}
                        <div class="space-y-4 px-5 py-5 md:px-7">

                            @foreach ($order->items as $item)

                                <div class="flex items-center gap-4">

                                    {{-- FOTO PRODUK --}}
                                    <div class="h-20 w-20 shrink-0
                                                overflow-hidden rounded-xl
                                                border border-[#f0e5de]
                                                bg-[#faf5ef]">

                                        @if ($item->product_image)

                                            <img
                                                src="{{ asset('storage/' . $item->product_image) }}"
                                                alt="{{ $item->product_name }}"
                                                loading="lazy"
                                                class="h-full w-full object-contain p-1">

                                        @else

                                            <div class="flex h-full w-full
                                                        items-center justify-center
                                                        font-serif text-2xl
                                                        text-[#b98585]">
                                                ♡
                                            </div>

                                        @endif

                                    </div>

                                    {{-- INFORMASI PRODUK --}}
                                    <div class="min-w-0 flex-1">

                                        <h3 class="font-serif text-sm
                                                   font-bold text-[#392727]">
                                            {{ $item->product_name }}
                                        </h3>

                                        <p class="mt-2 text-xs
                                                  text-[#9a8888]">
                                            Ukuran: {{ $item->size ?? '-' }}
                                            <span class="mx-1">·</span>
                                            Warna: {{ $item->color ?? '-' }}
                                        </p>

                                        <p class="mt-1 text-xs
                                                  text-[#9a8888]">
                                            {{ $item->quantity }} pcs
                                        </p>

                                    </div>

                                    {{-- HARGA PRODUK --}}
                                    <div class="shrink-0 text-right">

                                        <p class="text-sm font-semibold
                                                  text-[#75464a]">
                                            Rp {{ number_format(
                                                $item->price * $item->quantity,
                                                0, ',', '.'
                                            ) }}
                                        </p>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                        {{-- TOTAL PESANAN --}}
                        <div class="flex flex-col gap-4
                                    border-t border-[#f0e5de]
                                    bg-[#fffdfb] px-5 py-5
                                    sm:flex-row sm:items-center
                                    sm:justify-between md:px-7">

                            <div>
                                <p class="text-xs text-[#a18b84]">
                                    Total Pesanan
                                </p>

                                <p class="mt-1 font-serif text-xl
                                          font-bold text-[#8b2947]">
                                    Rp {{ number_format(
                                        $order->total,
                                        0, ',', '.'
                                    ) }}
                                </p>
                            </div>

                            {{-- TOMBOL DETAIL --}}
                            <a
                                href="{{ route('order-detail', $order->id) }}"
                                class="inline-flex items-center
                                       justify-center gap-2
                                       rounded-full border
                                       border-[#955f60] px-5 py-2.5
                                       text-xs font-semibold
                                       text-[#955f60] transition
                                       duration-300
                                       hover:bg-[#955f60]
                                       hover:text-white">

                                Lihat Detail
                                <span aria-hidden="true">→</span>

                            </a>

                        </div>

                    </article>

                @endforeach

            </div>

        @endif

    </div>
</section>

@endsection
