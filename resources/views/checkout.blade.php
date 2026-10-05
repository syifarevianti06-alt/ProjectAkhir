@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div class="min-h-screen bg-[#f8f5f2] py-10">
    <div class="max-w-6xl mx-auto px-5">

        {{-- HEADER --}}
        <div class="mb-8">
            <h1 class="text-3xl font-serif text-[#5d4545]">
                Checkout
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                Lengkapi informasi pengiriman dan lakukan pembayaran.
            </p>
        </div>


        {{-- ERROR --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-600 rounded-xl p-4">
                <p class="font-semibold mb-2">
                    Terjadi kesalahan:
                </p>

                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- SUCCESS --}}
        @if (session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-600 rounded-xl p-4">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- ================================================= --}}
                {{-- INFORMASI PENGIRIMAN --}}
                {{-- ================================================= --}}
                <div class="lg:col-span-2">

                    <div class="bg-white rounded-2xl p-7 shadow-sm">

                        <h2 class="text-xl font-semibold text-[#4b3838] mb-6">
                            Informasi Pengiriman
                        </h2>


                        {{-- NAMA --}}
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-600 mb-2">
                                Nama Penerima
                            </label>

                            <input
                                type="text"
                                name="address_name"
                                value="{{ old('address_name', auth()->user()->name ?? '') }}"
                                required
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 outline-none focus:border-[#966767]"
                                placeholder="Masukkan nama penerima"
                            >
                        </div>


                        {{-- NOMOR TELEPON --}}
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-600 mb-2">
                                Nomor Telepon
                            </label>

                            <input
                                type="text"
                                name="address_phone"
                                value="{{ old('address_phone') }}"
                                required
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 outline-none focus:border-[#966767]"
                                placeholder="08xxxxxxxxxx"
                            >
                        </div>


                        {{-- ALAMAT --}}
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-600 mb-2">
                                Alamat Lengkap
                            </label>

                            <textarea
                                name="address_full"
                                rows="4"
                                required
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 outline-none focus:border-[#966767] resize-none"
                                placeholder="Nama jalan, nomor rumah, RT/RW, kelurahan, kecamatan">{{ old('address_full') }}</textarea>
                        </div>


                        {{-- KOTA + KODE POS --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">

                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-2">
                                    Kota / Kabupaten
                                </label>

                                <input
                                    type="text"
                                    name="address_city"
                                    value="{{ old('address_city') }}"
                                    required
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 outline-none focus:border-[#966767]"
                                    placeholder="Contoh: Bandung"
                                >
                            </div>


                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-2">
                                    Kode Pos
                                </label>

                                <input
                                    type="text"
                                    name="address_postal_code"
                                    value="{{ old('address_postal_code') }}"
                                    required
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 outline-none focus:border-[#966767]"
                                    placeholder="401xx"
                                >
                            </div>

                        </div>


                        {{-- METODE PEMBAYARAN --}}
                        <div class="mt-8">

                            <h2 class="text-xl font-semibold text-[#4b3838] mb-5">
                                Metode Pembayaran
                            </h2>

                            <label class="flex items-center gap-4 border border-[#966767] bg-[#faf6f4] rounded-xl p-5 cursor-pointer">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="qris"
                                    checked
                                    class="accent-[#966767]"
                                >

                                <div>
                                    <p class="font-semibold text-[#4b3838]">
                                        QRIS
                                    </p>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Bayar menggunakan QRIS.
                                    </p>
                                </div>

                            </label>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- RINGKASAN PESANAN --}}
                {{-- ================================================= --}}
                <div>

                    <div class="bg-white rounded-2xl p-6 shadow-sm sticky top-5">

                        <h2 class="text-xl font-semibold text-[#4b3838] mb-6">
                            Ringkasan Pesanan
                        </h2>


                        {{-- PRODUK --}}
                        <div class="space-y-5">

                            <div class="flex gap-4">

                                {{-- GAMBAR --}}
                                @if (!empty($product->image))
                                    <img
                                        src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="w-20 h-24 object-cover rounded-xl bg-gray-100"
                                    >
                                @else
                                    <div class="w-20 h-24 rounded-xl bg-gray-100 flex items-center justify-center">
                                        <span class="text-xs text-gray-400">
                                            No Image
                                        </span>
                                    </div>
                                @endif


                                <div class="flex-1">

                                    {{-- NAMA PRODUK --}}
                                    <h3 class="font-medium text-[#4b3838]">
                                        {{ $product->name }}
                                    </h3>


                                    {{-- UKURAN --}}
                                    @if (!empty($size))
                                        <p class="text-sm text-gray-400 mt-1">
                                            Ukuran: {{ $size }}
                                        </p>
                                    @endif


                                    {{-- WARNA --}}
                                    @if (!empty($color))
                                        <p class="text-sm text-gray-400">
                                            Warna: {{ $color }}
                                        </p>
                                    @endif


                                    {{-- QTY --}}
                                    <p class="text-sm text-gray-500 mt-2">
                                        {{ $quantity }} ×
                                        Rp{{ number_format($product->price, 0, ',', '.') }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- PEMISAH --}}
                        <div class="border-t border-gray-200 my-6"></div>


                        {{-- TOTAL --}}
                        <div class="space-y-3">

                            {{-- SUBTOTAL --}}
                            <div class="flex justify-between text-sm">

                                <span class="text-gray-500">
                                    Subtotal
                                </span>

                                <span class="font-medium text-gray-700">
                                    Rp{{ number_format($subtotal, 0, ',', '.') }}
                                </span>

                            </div>


                            {{-- ONGKIR --}}
                            <div class="flex justify-between text-sm">

                                <span class="text-gray-500">
                                    Ongkir
                                </span>

                                <span class="font-medium text-gray-700">
                                    Gratis
                                </span>

                            </div>


                            {{-- TOTAL --}}
                            <div class="border-t border-gray-200 pt-4 flex justify-between">

                                <span class="font-semibold text-[#4b3838]">
                                    Total
                                </span>

                                <span class="font-bold text-lg text-[#8b5e5e]">
                                    Rp{{ number_format($subtotal, 0, ',', '.') }}
                                </span>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- DATA PRODUK YANG DIKIRIM KE CONTROLLER --}}
                        {{-- ================================================= --}}

                        <input
                            type="hidden"
                            name="products[0][product_id]"
                            value="{{ $product->id }}"
                        >

                        <input
                            type="hidden"
                            name="products[0][quantity]"
                            value="{{ $quantity }}"
                        >

                        <input
                            type="hidden"
                            name="products[0][size]"
                            value="{{ $size ?? '' }}"
                        >

                        <input
                            type="hidden"
                            name="products[0][color]"
                            value="{{ $color ?? '' }}"
                        >


                        {{-- BUTTON --}}
                        <button
                            type="submit"
                            class="w-full mt-7 bg-[#8b5e5e] hover:bg-[#754b4b] text-white py-3.5 rounded-xl font-semibold transition"
                        >
                            Buat Pesanan
                        </button>


                        <p class="text-xs text-gray-400 text-center mt-4">
                            Dengan membuat pesanan, kamu menyetujui proses pembelian.
                        </p>

                    </div>

                </div>

            </div>

        </form>

    </div>
</div>

@endsection