@extends('layouts.penjual')

@section('title', 'Detail Pesanan')
@section('page-title', 'Detail Pesanan')

@section('content')

<div class="space-y-6">

    //HEADER
    <div class="flex items-center justify-between">

        <div>
            <a href="{{ route('penjual.pesanan') }}"
                class="inline-flex items-center gap-2 text-sm text-[#986d6d] hover:text-[#805959] mb-3">
                ← Kembali ke Pesanan
            </a>

            <h1 class="text-2xl font-semibold text-[#4d4141]">
                Detail Pesanan
            </h1>

            <p class="text-sm text-[#9a8888] mt-1">
                Informasi lengkap pesanan pelanggan
            </p>
        </div>

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

        $statusLabel = match ($status) {
        'pending' => 'Menunggu Pembayaran',
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
        default => ucfirst($order->status ?? '-'),
        };
        @endphp

        <span class="px-4 py-2 rounded-full text-sm font-medium {{ $statusClass }}">
            {{ $statusLabel }}
        </span>

    </div>


    // INFORMASI PESANAN
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        // DETAIL PESANAN
        <div class="lg:col-span-2 bg-white rounded-2xl border border-[#eadede] p-6">

            <div class="flex items-center justify-between mb-6">

                <div>
                    <h2 class="text-lg font-semibold text-[#4d4141]">
                        {{ $order->order_number }}
                    </h2>

                    <p class="text-sm text-[#9a8888] mt-1">
                        {{ $order->created_at?->format('d M Y, H:i') ?? '-' }}
                    </p>
                </div>

            </div>


            // PRODUK
            <div class="space-y-4">

                @forelse ($order->items as $item)

                <div class="flex items-center gap-4 p-4 rounded-xl bg-[#fcf9f9] border border-[#eadede]">

                    // GAMBAR
                    <div class="w-20 h-20 rounded-xl overflow-hidden bg-[#f4eeee] flex-shrink-0">

                        @if ($item->product_image)

                        <img
                            src="{{ asset('storage/' . $item->product_image) }}"
                            alt="{{ $item->product_name }}"
                            class="w-full h-full object-cover">

                        @else

                        <div class="w-full h-full flex items-center justify-center text-[#b8a4a4]">
                            Tidak ada gambar
                        </div>

                        @endif

                    </div>


                    // INFORMASI PRODUK
                    <div class="flex-1">

                        <h3 class="font-medium text-[#4d4141]">
                            {{ $item->product_name }}
                        </h3>

                        <div class="flex flex-wrap gap-3 mt-2 text-xs text-[#9a8888]">

                            @if ($item->size)
                            <span>
                                Ukuran: {{ $item->size }}
                            </span>
                            @endif

                            @if ($item->color)
                            <span>
                                Warna: {{ $item->color }}
                            </span>
                            @endif

                            <span>
                                Jumlah: {{ $item->quantity }}
                            </span>

                        </div>

                    </div>


                    // HARGA
                    <div class="text-right">

                        <p class="font-semibold text-[#4d4141]">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </p>

                        <p class="text-xs text-[#9a8888] mt-1">
                            {{ $item->quantity }} ×
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </p>

                    </div>

                </div>

                @empty

                <div class="text-center py-10 text-[#9a8888]">
                    Tidak ada produk dalam pesanan ini.
                </div>

                @endforelse

            </div>


            // TOTAL
            <div class="border-t border-[#eadede] mt-6 pt-5">

                <div class="flex justify-between text-sm text-[#9a8888] mb-2">
                    <span>Subtotal</span>

                    <span>
                        Rp {{ number_format($order->subtotal, 0, ',', '.') }}
                    </span>
                </div>

                <div class="flex justify-between items-center">

                    <span class="font-semibold text-[#4d4141]">
                        Total Pembayaran
                    </span>

                    <span class="text-xl font-bold text-[#986d6d]">
                        Rp {{ number_format($order->total, 0, ',', '.') }}
                    </span>

                </div>

            </div>

        </div>


        // SIDEBAR
        <div class="space-y-6">

            // DATA PELANGGAN
            <div class="bg-white rounded-2xl border border-[#eadede] p-6">

                <h2 class="text-lg font-semibold text-[#4d4141] mb-5">
                    Data Pelanggan
                </h2>

                <div class="space-y-4">

                    <div>
                        <p class="text-xs text-[#9a8888] mb-1">
                            Nama
                        </p>

                        <p class="text-sm font-medium text-[#4d4141]">
                            {{ $order->user?->name ?? $order->address_name ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-[#9a8888] mb-1">
                            Email
                        </p>

                        <p class="text-sm text-[#4d4141] break-all">
                            {{ $order->user?->email ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-[#9a8888] mb-1">
                            Nomor Telepon
                        </p>

                        <p class="text-sm text-[#4d4141]">
                            {{ $order->address_phone ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>


            // ALAMAT
            <div class="bg-white rounded-2xl border border-[#eadede] p-6">

                <h2 class="text-lg font-semibold text-[#4d4141] mb-5">
                    Alamat Pengiriman
                </h2>

                <div class="space-y-2 text-sm text-[#4d4141]">

                    <p class="font-medium">
                        {{ $order->address_name ?? '-' }}
                    </p>

                    <p>
                        {{ $order->address_phone ?? '-' }}
                    </p>

                    <p>
                        {{ $order->address_full ?? '-' }}
                    </p>

                    <p>
                        {{ $order->address_city ?? '-' }}
                    </p>

                    @if ($order->address_postal_code)
                    <p>
                        {{ $order->address_postal_code }}
                    </p>
                    @endif

                </div>

            </div>


            // PEMBAYARAN
            <div class="bg-white rounded-2xl border border-[#eadede] p-6">

                <h2 class="text-lg font-semibold text-[#4d4141] mb-5">
                    Pembayaran
                </h2>

                <div class="flex justify-between text-sm">

                    <span class="text-[#9a8888]">
                        Metode
                    </span>

                    <span class="font-medium text-[#4d4141]">
                        {{ strtoupper($order->payment_method ?? '-') }}
                    </span>

                </div>

                @if ($order->paid_at)

                <div class="flex justify-between text-sm mt-3">

                    <span class="text-[#9a8888]">
                        Dibayar
                    </span>

                    <span class="text-green-600 font-medium">
                        {{ $order->paid_at->format('d M Y, H:i') }}
                    </span>

                </div>

                @endif

            </div>


            // UPDATE STATUS
            <div class="bg-white rounded-2xl border border-[#eadede] p-6">

                <h2 class="text-lg font-semibold text-[#4d4141] mb-5">
                    Update Status
                </h2>

                <form
                    action="{{ route('penjual.pesanan.status', $order) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <select
                        name="status"
                        class="w-full rounded-xl border border-[#eadede] bg-[#fcf9f9] px-4 py-3 text-sm text-[#4d4141] focus:outline-none focus:ring-2 focus:ring-[#986d6d]">

                        <option value="pending"
                            {{ $status === 'pending' ? 'selected' : '' }}>
                            Menunggu Pembayaran
                        </option>

                        <option value="paid"
                            {{ $status === 'paid' ? 'selected' : '' }}>
                            Sudah Dibayar
                        </option>

                        <option value="processing"
                            {{ in_array($status, ['processing', 'diproses']) ? 'selected' : '' }}>
                            Diproses
                        </option>

                        <option value="shipped"
                            {{ in_array($status, ['shipped', 'dikirim']) ? 'selected' : '' }}>
                            Dikirim
                        </option>

                        <option value="completed"
                            {{ in_array($status, ['completed', 'selesai']) ? 'selected' : '' }}>
                            Selesai
                        </option>

                        <option value="cancelled"
                            {{ in_array($status, ['cancelled', 'dibatalkan']) ? 'selected' : '' }}>
                            Dibatalkan
                        </option>

                    </select>


                    <button
                        type="submit"
                        class="w-full mt-4 px-4 py-3 rounded-xl bg-[#986d6d] text-white text-sm font-medium hover:bg-[#805959] transition">
                        Simpan Status
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection