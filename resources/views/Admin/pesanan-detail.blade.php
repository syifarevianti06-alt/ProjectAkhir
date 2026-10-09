@extends('layouts.admin')

@section('title', 'Detail Pesanan - Lune Attiré')
@section('page-title', 'Detail Pesanan')

@section('content')

<div class="max-w-6xl mx-auto space-y-6">

    //HEADER
    <div>

        <a
            href="{{ route('admin.pesanan') }}"
            class="inline-flex items-center gap-2
            text-sm text-[#8D716D]
            hover:text-[#7D2942] mb-4">
            ← Kembali ke Pesanan
        </a>

        <div class="flex items-center justify-between">

            <div>

                <h1 class="text-2xl font-semibold text-[#493535]">
                    {{ $order->order_number }}
                </h1>

                <p class="text-sm text-[#A28B83] mt-1">
                    Pesanan dibuat
                    {{ $order->created_at?->format('d M Y, H:i') }}
                </p>

            </div>


            // STATUS
            <div>

                @if(in_array($order->status, ['completed', 'selesai']))

                <span class="px-4 py-2 rounded-full
                        bg-[#E7F1E8] text-[#64806A]
                        text-sm font-medium">
                    Selesai
                </span>

                @elseif(in_array($order->status, ['processing', 'diproses']))

                <span class="px-4 py-2 rounded-full
                        bg-[#F3E9DD] text-[#856B4E]
                        text-sm font-medium">
                    Diproses
                </span>

                @elseif(in_array($order->status, ['shipped', 'dikirim']))

                <span class="px-4 py-2 rounded-full
                        bg-[#E6EDF3] text-[#60758A]
                        text-sm font-medium">
                    Dikirim
                </span>

                @elseif(in_array($order->status, ['cancelled', 'dibatalkan']))

                <span class="px-4 py-2 rounded-full
                        bg-[#F9E7E7] text-[#A45D63]
                        text-sm font-medium">
                    Dibatalkan
                </span>

                @else

                <span class="px-4 py-2 rounded-full
                        bg-[#F2E2E4] text-[#7D2942]
                        text-sm font-medium">
                    Pending
                </span>

                @endif

            </div>

        </div>

    </div>


    @if(session('success'))

    <div class="bg-[#F1E8E3]
            border border-[#E1D0C8]
            text-[#70534D]
            rounded-xl px-5 py-4 text-sm">

        {{ session('success') }}

    </div>

    @endif


    <div class="grid grid-cols-3 gap-6">

        // DETAIL PESANAN
        <div class="col-span-2
            bg-white
            border border-[#EDE2DA]
            rounded-2xl
            overflow-hidden">

            <div class="px-6 py-5
                border-b border-[#EDE2DA]">

                <h2 class="font-semibold text-[#493535]">
                    Produk Pesanan
                </h2>

            </div>


            <div class="divide-y divide-[#F0E5DF]">

                @forelse($order->items as $item)

                <div class="p-6 flex items-center gap-5">

                    {{-- IMAGE --}}
                    <div class="w-20 h-20 rounded-xl
                            bg-[#F8F2EE]
                            overflow-hidden
                            flex-shrink-0">

                        @if($item->product_image)

                        <img
                            src="{{ asset('storage/' . $item->product_image) }}"
                            class="w-full h-full object-cover"
                            alt="{{ $item->product_name }}">

                        @else

                        <div class="w-full h-full
                                    flex items-center justify-center
                                    text-[#B5A39D]">
                            —
                        </div>

                        @endif

                    </div>


                    // INFO
                    <div class="flex-1">

                        <p class="font-medium text-[#493535]">
                            {{ $item->product_name }}
                        </p>

                        <p class="text-xs text-[#A28B83] mt-1">

                            {{ $item->size ? 'Ukuran: ' . $item->size : '' }}

                            @if($item->size && $item->color)
                            ·
                            @endif

                            {{ $item->color ? 'Warna: ' . $item->color : '' }}

                        </p>

                        <p class="text-xs text-[#A28B83] mt-2">
                            {{ $item->quantity }} ×
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </p>

                    </div>


                    // SUBTOTAL
                    <div class="text-right">

                        <p class="text-sm font-semibold text-[#493535]">

                            Rp
                            {{ number_format(
                                    $item->price * $item->quantity,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                        </p>

                    </div>

                </div>

                @empty

                <div class="p-10 text-center">

                    <p class="text-sm text-[#A28B83]">
                        Tidak ada item pesanan.
                    </p>

                </div>

                @endforelse

            </div>


            {{-- TOTAL --}}
            <div class="border-t border-[#EDE2DA]
                bg-[#FBF6F2]
                p-6">

                <div class="flex justify-between
                    text-sm text-[#806D68]">

                    <span>
                        Subtotal
                    </span>

                    <span>
                        Rp {{ number_format($order->subtotal, 0, ',', '.') }}
                    </span>

                </div>


                <div class="flex justify-between
                    mt-3">

                    <span class="font-semibold text-[#493535]">
                        Total
                    </span>

                    <span class="text-lg font-semibold text-[#7D2942]">
                        Rp {{ number_format($order->total, 0, ',', '.') }}
                    </span>

                </div>

            </div>

        </div>


        // SISI KANAN
        <div class="space-y-6">

            // CUSTOMER
            <div class="bg-white
                border border-[#EDE2DA]
                rounded-2xl p-6">

                <h2 class="font-semibold text-[#493535]">
                    Pelanggan
                </h2>

                <div class="mt-5">

                    <p class="text-sm font-medium text-[#493535]">
                        {{ $order->address_name }}
                    </p>

                    <p class="text-sm text-[#806D68] mt-2">
                        {{ $order->address_phone }}
                    </p>

                </div>

            </div>


            // ALAMAT
            <div class="bg-white
                border border-[#EDE2DA]
                rounded-2xl p-6">

                <h2 class="font-semibold text-[#493535]">
                    Alamat Pengiriman
                </h2>

                <div class="mt-5 text-sm
                    text-[#806D68]
                    leading-6">

                    {{ $order->address_full }}

                    @if($order->address_city)
                    <br>
                    {{ $order->address_city }}
                    @endif

                    @if($order->address_postal_code)
                    <br>
                    {{ $order->address_postal_code }}
                    @endif

                </div>

            </div>


            // PEMBAYARAN
            <div class="bg-white
                border border-[#EDE2DA]
                rounded-2xl p-6">

                <h2 class="font-semibold text-[#493535]">
                    Pembayaran
                </h2>

                <p class="text-sm text-[#806D68] mt-4">
                    {{ $order->payment_method ?? '—' }}
                </p>

                @if($order->paid_at)

                <p class="text-xs text-[#A28B83] mt-2">
                    Dibayar {{ $order->paid_at->format('d M Y, H:i') }}
                </p>

                @endif

            </div>


            // UPDATE STATUS
            <div class="bg-white
                border border-[#EDE2DA]
                rounded-2xl p-6">

                <h2 class="font-semibold text-[#493535]">
                    Update Status
                </h2>

                <form
                    action="{{ route('admin.pesanan.status', $order) }}"
                    method="POST"
                    class="mt-5">

                    @csrf
                    @method('PUT')

                    <select
                        name="status"
                        class="w-full
                        bg-[#FFFCFA]
                        border border-[#E5D8D1]
                        rounded-xl
                        px-4 py-3
                        text-sm text-[#665250]
                        focus:outline-none
                        focus:border-[#9D6673]">

                        <option value="pending"
                            {{ in_array($order->status, ['pending', 'baru']) ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="processing"
                            {{ in_array($order->status, ['processing', 'diproses']) ? 'selected' : '' }}>
                            Diproses
                        </option>

                        <option value="shipped"
                            {{ in_array($order->status, ['shipped', 'dikirim']) ? 'selected' : '' }}>
                            Dikirim
                        </option>

                        <option value="completed"
                            {{ in_array($order->status, ['completed', 'selesai']) ? 'selected' : '' }}>
                            Selesai
                        </option>

                        <option value="cancelled"
                            {{ in_array($order->status, ['cancelled', 'dibatalkan']) ? 'selected' : '' }}>
                            Dibatalkan
                        </option>

                    </select>


                    <button
                        type="submit"
                        class="w-full mt-3
                        bg-[#7D2942]
                        hover:bg-[#692238]
                        text-white
                        rounded-xl
                        py-3
                        text-sm font-medium
                        transition">
                        Simpan Status
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection