@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#fbf5ef]">

    <div class="max-w-6xl mx-auto px-6 py-10">

        <h1 class="text-3xl font-bold text-[#332326] mb-8">
            Keranjang Belanja
        </h1>

        @if (session('status'))
        <div class="mb-6 rounded-xl bg-green-50 border border-green-200
                        px-4 py-3 text-sm text-green-700">
            {{ session('status') }}
        </div>
        @endif

        @if ($items->count())

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            //PRODUK
            <div class="lg:col-span-2 space-y-4">

                @foreach ($items as $item)

                <div class="bg-white border border-[#eadfe1]
                                    rounded-xl p-5">

                    <div class="flex gap-4 items-center">

                        //FOTO
                        <div class="w-24 h-24 rounded-lg overflow-hidden
                                            bg-gray-100 flex-shrink-0">

                            @if ($item->product->image)

                            <img
                                src="{{ asset('storage/' . $item->product->image) }}"
                                alt="{{ $item->product->name }}"
                                class="w-full h-full object-cover">

                            @else

                            <div class="w-full h-full flex items-center
                                                    justify-center text-xs text-gray-400">
                                Tidak ada gambar
                            </div>

                            @endif

                        </div>


                        //INFO
                        <div class="flex-1 min-w-0">

                            <h2 class="font-semibold text-sm text-[#332326]">
                                {{ $item->product->name }}
                            </h2>

                            @if ($item->size || $item->color)

                            <p class="text-xs text-gray-500 mt-1">

                                @if ($item->size)
                                Ukuran: {{ $item->size }}
                                @endif

                                @if ($item->size && $item->color)
                                •
                                @endif

                                @if ($item->color)
                                Warna: {{ $item->color }}
                                @endif

                            </p>

                            @endif

                            <p class="text-sm font-bold text-[#8b2947] mt-2">
                                Rp {{ number_format($item->product->price, 0, ',', '.') }}
                            </p>


                            //JUMLAH
                            <div class="flex items-center gap-3 mt-3">

                                <form
                                    action="{{ route('cart.update', $item->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')

                                    <input
                                        type="hidden"
                                        name="quantity"
                                        value="{{ max(1, $item->quantity - 1) }}">

                                    <button
                                        type="submit"
                                        class="w-8 h-8 rounded-full border
                                                       border-gray-200
                                                       text-gray-600"
                                        @disabled($item->quantity <= 1)>
                                            −
                                    </button>

                                </form>


                                <span class="text-sm w-5 text-center">
                                    {{ $item->quantity }}
                                </span>


                                <form
                                    action="{{ route('cart.update', $item->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')

                                    <input
                                        type="hidden"
                                        name="quantity"
                                        value="{{ $item->quantity + 1 }}">

                                    <button
                                        type="submit"
                                        class="w-8 h-8 rounded-full border
                                                       border-gray-200
                                                       text-gray-600">
                                        +
                                    </button>

                                </form>

                            </div>

                        </div>


                        //SUBTOTAL + HAPUS
                        <div class="text-right">

                            <p class="text-sm font-bold text-[#332326]">
                                Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                            </p>

                            <form
                                action="{{ route('cart.destroy', $item->id) }}"
                                method="POST"
                                class="mt-2">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="text-[11px] text-[#c48797]
                                                   hover:text-[#8b2947]">
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>


            //RINGKASAN
            <div>

                <div class="bg-white border border-[#eadfe1]
                                rounded-xl p-5 sticky top-5">

                    <h2 class="text-base font-bold text-[#332326] mb-5">
                        Ringkasan Pesanan
                    </h2>

                    <div class="flex justify-between
                                    text-xs text-gray-500 mb-4">

                        <span>
                            Subtotal ({{ $items->sum('quantity') }} produk)
                        </span>

                        <span>
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </span>

                    </div>


                    <div class="flex justify-between items-center
                                    pt-3 border-t border-gray-200">

                        <span class="font-bold text-sm text-[#332326]">
                            Total pembayaran
                        </span>

                        <span class="font-bold text-sm text-[#8b2947]">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </span>

                    </div>


                    <a
                        href="{{ route('checkout') }}"
                        class="block text-center bg-[#8b2947]
                                   text-white py-3 rounded-lg mt-5
                                   text-sm font-medium
                                   hover:bg-[#721f39] transition">
                        Checkout
                    </a>

                </div>

            </div>

        </div>

        @else

        // KERANJANG KOSONG
        <div class="bg-white border border-[#eadfe1]
                        rounded-xl p-12 text-center">

            <div class="text-5xl mb-4">
                🛍️
            </div>

            <h2 class="text-xl font-semibold text-[#332326]">
                Keranjang masih kosong
            </h2>

            <p class="text-sm text-gray-500 mt-2">
                Yuk, pilih produk favoritmu.
            </p>

            <a
                href="{{ route('produk.index') }}"
                class="inline-block mt-6 px-6 py-3
                           rounded-lg bg-[#8b2947]
                           text-white text-sm">
                Belanja Sekarang
            </a>

        </div>

        @endif

    </div>

</div>

@endsection