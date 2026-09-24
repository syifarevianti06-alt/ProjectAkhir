@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#fbf5ef]">

    <div class="max-w-6xl mx-auto px-6 py-12">

        <!-- PRODUK -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">

            <!-- ================= FOTO PRODUK ================= -->
            <div>

                <div class="w-full h-[500px] bg-gray-200 rounded-lg overflow-hidden">

                    <img
                        src="{{ asset('images/produk1.jpg') }}"
                        alt="Femes Abelia Blouse"
                        class="w-full h-full object-cover"
                    >

                </div>

            </div>


            <!-- ================= DETAIL PRODUK ================= -->
            <div class="pt-2">

                <!-- NAMA -->
                <h1 class="text-2xl font-bold leading-snug text-[#332326]">
                    Femes - Abelia Blouse Top Kemeja Wanita
                    Korean Style
                </h1>


                <!-- HARGA -->
                <p class="text-xl font-bold text-[#8b2947] mt-5">
                    Rp 162.000.00
                </p>


                <!-- DESKRIPSI -->
                <div class="mt-3">

                    <p class="text-[11px] leading-relaxed text-gray-600">
                        Blouse bergaya imut dan manis dengan bahan katun salur
                        mix polos crepe premium. Memiliki kerah, motif bergaris,
                        serta jahitan rapi dan nyaman digunakan. Cocok untuk
                        berbagai acara dan dipadukan dengan berbagai gaya outfit.
                    </p>

                </div>


                <!-- UKURAN -->
                <div class="mt-5">

                    <h2 class="text-xs font-semibold text-[#332326]">
                        Ukuran
                    </h2>

                    <div class="flex gap-2 mt-2">

                        <button
                            class="size-btn w-10 h-8 border border-gray-300
                                   rounded-md text-xs bg-white
                                   hover:border-[#8b2947]
                                   hover:text-[#8b2947]">
                            S
                        </button>

                        <button
                            class="size-btn w-10 h-8 border border-gray-300
                                   rounded-md text-xs bg-white
                                   hover:border-[#8b2947]
                                   hover:text-[#8b2947]">
                            M
                        </button>

                        <button
                            class="size-btn w-10 h-8 border border-gray-300
                                   rounded-md text-xs bg-white
                                   hover:border-[#8b2947]
                                   hover:text-[#8b2947]">
                            L
                        </button>

                        <button
                            class="size-btn w-10 h-8 border border-gray-300
                                   rounded-md text-xs bg-white
                                   hover:border-[#8b2947]
                                   hover:text-[#8b2947]">
                            XL
                        </button>

                    </div>

                </div>


                <!-- WARNA -->
                <div class="mt-4">

                    <h2 class="text-xs font-semibold text-[#332326]">
                        Warna
                    </h2>

                    <div class="flex gap-2 mt-2">

                        <button
                            class="color-btn px-4 py-2 border border-gray-300
                                   rounded-md bg-white text-[10px]
                                   hover:border-[#8b2947]
                                   hover:text-[#8b2947]">
                            Biru Muda
                        </button>

                        <button
                            class="color-btn px-4 py-2 border border-gray-300
                                   rounded-md bg-white text-[10px]
                                   hover:border-[#8b2947]
                                   hover:text-[#8b2947]">
                            Coklat
                        </button>

                        <button
                            class="color-btn px-4 py-2 border border-gray-300
                                   rounded-md bg-white text-[10px]
                                   hover:border-[#8b2947]
                                   hover:text-[#8b2947]">
                            Hitam
                        </button>

                    </div>

                </div>


                <!-- JUMLAH -->
                <div class="mt-4">

                    <h2 class="text-xs font-semibold text-[#332326]">
                        Jumlah
                    </h2>

                    <div class="flex items-center mt-2">

                        <button
                            type="button"
                            onclick="kurang()"
                            class="w-8 h-7 border border-gray-300
                                   rounded-l-md bg-white text-sm">
                            −
                        </button>

                        <div
                            id="jumlah"
                            class="w-10 h-7 border-t border-b
                                   border-gray-300 bg-white
                                   flex items-center justify-center text-xs">
                            1
                        </div>

                        <button
                            type="button"
                            onclick="tambah()"
                            class="w-8 h-7 border border-gray-300
                                   rounded-r-md bg-white text-sm">
                            +
                        </button>

                    </div>

                </div>


                <!-- STOK -->
                <p class="text-[10px] text-gray-500 mt-2">
                    Stok: 25
                </p>


                <!-- TOMBOL -->
                <div class="grid grid-cols-2 gap-5 mt-5">

                    <a
                        href="/keranjang"
                        class="text-center border border-[#8b2947]
                               text-[#8b2947] py-2.5 rounded-md
                               text-xs font-medium
                               hover:bg-[#8b2947]
                               hover:text-white transition">
                        Tambah Keranjang
                    </a>

                    <a
                        href="/checkout"
                        class="text-center bg-[#c48797]
                               text-white py-2.5 rounded-md
                               text-xs font-medium
                               hover:bg-[#8b2947] transition">
                        Beli sekarang
                    </a>

                </div>


                <!-- TOKO -->
                <div class="bg-white rounded-xl mt-5 px-5 py-4 shadow-sm">

                    <p class="text-[10px] font-bold text-[#332326]">
                        Lune Attiré Official Store
                    </p>

                    <p class="text-[9px] text-gray-500 mt-1">
                        Toko resmi • Sumedang, Jawa Barat
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- ================= JAVASCRIPT ================= -->

<script>

    let jumlah = 1;

    function tambah() {
        jumlah++;
        document.getElementById('jumlah').innerText = jumlah;
    }

    function kurang() {
        if (jumlah > 1) {
            jumlah--;
            document.getElementById('jumlah').innerText = jumlah;
        }
    }


    // PILIH UKURAN
    document.querySelectorAll('.size-btn').forEach(button => {

        button.addEventListener('click', function () {

            document.querySelectorAll('.size-btn').forEach(btn => {
                btn.classList.remove(
                    'bg-[#8b2947]',
                    'text-white',
                    'border-[#8b2947]'
                );
            });

            this.classList.add(
                'bg-[#8b2947]',
                'text-white',
                'border-[#8b2947]'
            );

        });

    });


    // PILIH WARNA
    document.querySelectorAll('.color-btn').forEach(button => {

        button.addEventListener('click', function () {

            document.querySelectorAll('.color-btn').forEach(btn => {
                btn.classList.remove(
                    'bg-[#8b2947]',
                    'text-white',
                    'border-[#8b2947]'
                );
            });

            this.classList.add(
                'bg-[#8b2947]',
                'text-white',
                'border-[#8b2947]'
            );

        });

    });

</script>

@endsection