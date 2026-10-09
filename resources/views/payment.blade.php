@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')

<div class="min-h-screen bg-[#f8f1eb] py-12">

    <div class="max-w-md mx-auto px-6">

        <div class="bg-white rounded-2xl p-7 shadow-sm text-center">

            <p class="text-xs uppercase tracking-widest text-[#986d6d]">
                Lune Attiré
            </p>

            <h1 class="mt-2 text-2xl font-serif font-bold text-[#332326]">
                Pembayaran QRIS
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Silakan lakukan pembayaran melalui QRIS.
            </p>

            // TOTAL
            <div class="mt-6 rounded-xl bg-[#fbf5ef] p-4">

                <p class="text-xs text-gray-500">
                    Total Pembayaran
                </p>

                <p class="mt-1 text-2xl font-bold text-[#8b2947]">
                    Rp {{ number_format($order->total, 0, ',', '.') }}
                </p>

            </div>

            // QRIS DUMMY
            <div class="mt-7 flex justify-center">

                <div class="w-64 h-64 bg-white border border-gray-200 rounded-xl p-4">

                    <div class="w-full h-full flex items-center justify-center">

                        <div class="text-center">

                            <div class="grid grid-cols-7 gap-1">

                                @for ($i = 0; $i < 49; $i++)

                                    <div class="w-5 h-5
                                        {{ ($i * 7 + $order->id) % 3 === 0
                                            ? 'bg-[#332326]'
                                            : 'bg-white border border-gray-100' }}">
                            </div>

                            @endfor

                        </div>

                        <p class="mt-3 text-[9px] font-bold tracking-widest">
                            QRIS DUMMY
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <p class="mt-5 text-xs text-gray-400">
            QRIS ini hanya digunakan untuk simulasi pembayaran.
        </p>

        // NOMOR PESANAN
        <div class="mt-5 border-t border-gray-100 pt-5">

            <p class="text-xs text-gray-400">
                Nomor Pesanan
            </p>

            <p class="mt-1 text-sm font-semibold text-[#332326]">
                {{ $order->order_number }}
            </p>

        </div>

        // TOMBOL
        <form
            action="{{ route('payment.qris.success', $order->id) }}"
            method="POST"
            class="mt-6">
            @csrf

            <button
                type="submit"
                class="w-full rounded-xl bg-[#8b5e5e] py-3
                           text-sm font-semibold text-white
                           hover:bg-[#754b4b]">
                Saya Sudah Bayar
            </button>

        </form>

    </div>

</div>

</div>

@endsection