@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#fbf5ef]">

    <div class="max-w-6xl mx-auto px-6 py-10">

        {{-- JUDUL --}}
        <h1 class="text-3xl font-bold text-[#332326] mb-8">
            Keranjang Belanja
        </h1>


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- ================= PRODUK ================= --}}
            <div class="lg:col-span-2">

                <div class="bg-white border border-[#eadfe1]
                            rounded-xl px-5 py-4">

                    <div class="flex items-center gap-4">

                        {{-- CHECKBOX --}}
                        <input
                            type="checkbox"
                            id="product-check"
                            checked
                            onchange="hitungTotal()"
                            class="w-4 h-4 accent-[#8b2947]"
                        >


                        {{-- FOTO PRODUK --}}
                        <div class="w-20 h-20 rounded-lg overflow-hidden
                                    bg-gray-100 flex-shrink-0">

                            <img
                                src="{{ asset('images/produk1.jpg') }}"
                                alt="Femes Abelia Blouse"
                                class="w-full h-full object-cover"
                            >

                        </div>


                        {{-- INFORMASI PRODUK --}}
                        <div class="flex-1 min-w-0">

                            <h2 class="font-semibold text-sm text-[#332326]">
                                Femes - Abelia Blouse Top
                            </h2>

                            <p class="text-xs text-[#332326]">
                                Kemeja Wanita Korean Style
                            </p>

                            <p class="text-[11px] text-gray-500 mt-1">
                                Ukuran: S • Warna: Biru Muda
                            </p>

                            <p class="text-sm font-bold text-[#8b2947] mt-1">
                                Rp 162.000
                            </p>

                        </div>


                        {{-- JUMLAH --}}
                        <div class="flex items-center gap-3">

                            <button
                                type="button"
                                onclick="kurang()"
                                class="w-8 h-8 rounded-full
                                       border border-gray-200
                                       flex items-center justify-center
                                       text-gray-600
                                       hover:border-[#8b2947]
                                       hover:text-[#8b2947]"
                            >
                                −
                            </button>


                            <span
                                id="jumlah"
                                class="text-sm w-3 text-center"
                            >
                                1
                            </span>


                            <button
                                type="button"
                                onclick="tambah()"
                                class="w-8 h-8 rounded-full
                                       border border-gray-200
                                       flex items-center justify-center
                                       text-gray-600
                                       hover:border-[#8b2947]
                                       hover:text-[#8b2947]"
                            >
                                +
                            </button>

                        </div>


                        {{-- HARGA --}}
                        <div class="text-right ml-3">

                            <p
                                id="harga"
                                class="text-sm font-bold text-[#332326]"
                            >
                                Rp 162.000
                            </p>

                            <button
                                type="button"
                                onclick="hapusProduk()"
                                class="text-[11px] text-[#c48797]
                                       mt-2 hover:text-[#8b2947]"
                            >
                                Hapus
                            </button>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================= RINGKASAN ================= --}}
            <div>

                <div class="bg-white border border-[#eadfe1]
                            rounded-xl p-5">

                    <h2 class="text-base font-bold text-[#332326] mb-5">
                        Ringkasan Pesanan
                    </h2>


                    {{-- SUBTOTAL --}}
                    <div class="flex justify-between
                                text-xs text-gray-500 mb-4">

                        <span id="subtotal-text">
                            Subtotal (1 produk)
                        </span>

                        <span id="subtotal">
                            Rp 162.000
                        </span>

                    </div>


                    {{-- TOTAL --}}
                    <div class="flex justify-between
                                items-center pt-3
                                border-t border-gray-200">

                        <span class="font-bold text-sm text-[#332326]">
                            Total pembayaran
                        </span>

                        <span
                            id="total"
                            class="font-bold text-sm text-[#8b2947]"
                        >
                            Rp 162.000
                        </span>

                    </div>


                    {{-- CHECKOUT --}}
                    <a
                        id="checkout-button"
                        href="{{ route('checkout') }}?product_id=1&quantity=1&size=S&color=Biru%20Muda"
                        class="block text-center
                               bg-[#8b2947]
                               text-white
                               py-3
                               rounded-lg
                               mt-5
                               text-sm
                               font-medium
                               hover:bg-[#721f39]
                               transition"
                    >
                        Checkout
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ================= JAVASCRIPT ================= --}}

<script>

    let jumlah = 1;

    const hargaProduk = 162000;


    function formatRupiah(angka) {

        return 'Rp ' + angka.toLocaleString('id-ID');

    }


    function updateCheckoutLink() {

        const checkbox = document.getElementById('product-check');

        const button = document.getElementById('checkout-button');

        if (!checkbox.checked) {

            button.classList.add('opacity-50', 'pointer-events-none');

            return;

        }


        button.classList.remove('opacity-50', 'pointer-events-none');


        button.href =
            "{{ route('checkout') }}" +
            "?product_id=1" +
            "&quantity=" + jumlah +
            "&size=S" +
            "&color=Biru%20Muda";
    }


    function hitungTotal() {

        const checkbox =
            document.getElementById('product-check');

        const subtotal =
            document.getElementById('subtotal');

        const total =
            document.getElementById('total');

        const subtotalText =
            document.getElementById('subtotal-text');


        if (!checkbox.checked) {

            subtotal.innerText = 'Rp 0';

            total.innerText = 'Rp 0';

            subtotalText.innerText = 'Subtotal (0 produk)';

            updateCheckoutLink();

            return;
        }


        const hasil = hargaProduk * jumlah;


        subtotal.innerText =
            formatRupiah(hasil);

        total.innerText =
            formatRupiah(hasil);

        subtotalText.innerText =
            'Subtotal (' + jumlah + ' produk)';


        updateCheckoutLink();

    }


    function tambah() {

        jumlah++;

        document.getElementById('jumlah').innerText = jumlah;

        document.getElementById('harga').innerText =
            formatRupiah(hargaProduk * jumlah);

        hitungTotal();

    }


    function kurang() {

        if (jumlah > 1) {

            jumlah--;

            document.getElementById('jumlah').innerText = jumlah;

            document.getElementById('harga').innerText =
                formatRupiah(hargaProduk * jumlah);

            hitungTotal();

        }

    }


    function hapusProduk() {

        const checkbox =
            document.getElementById('product-check');

        checkbox.checked = false;

        hitungTotal();

    }

</script>

@endsection