@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#fbf5ef]">

    <div class="max-w-6xl mx-auto px-6 py-12">

        {{-- KEMBALI --}}
        <a
            href="{{ route('home') }}"
            class="inline-block mb-6 text-xs text-[#8b2947] hover:underline"
        >
            ← Kembali ke Produk
        </a>

        <!-- PRODUK -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
<!-- ================= FOTO PRODUK ================= -->
<div>

    <div class="w-full bg-gray-200 rounded-lg">

        {{-- FOTO PRODUK --}}
        <div class="bg-white rounded-2xl border border-[#eadfe1] p-5">

            {{-- FOTO UTAMA --}}
            <div class="relative overflow-hidden rounded-2xl bg-[#f8f1eb]">

                @if ($product->images->count() > 0)

                    <img
                        id="mainProductImage"
                        src="{{ asset('storage/' . $product->images->first()->image) }}"
                        alt="{{ $product->name }}"
                        class="w-full h-[450px] object-cover transition duration-300"
                    >

                    {{-- TOMBOL SEBELUMNYA --}}
                    <button
                        type="button"
                        onclick="previousImage()"
                        class="absolute left-4 top-1/2 -translate-y-1/2
                               w-10 h-10 rounded-full
                               bg-white/90 shadow
                               flex items-center justify-center
                               text-[#6f5555] hover:bg-white"
                    >
                        ‹
                    </button>

                    {{-- TOMBOL BERIKUTNYA --}}
                    <button
                        type="button"
                        onclick="nextImage()"
                        class="absolute right-4 top-1/2 -translate-y-1/2
                               w-10 h-10 rounded-full
                               bg-white/90 shadow
                               flex items-center justify-center
                               text-[#6f5555] hover:bg-white"
                    >
                        ›
                    </button>

                @elseif ($product->image)

                    <img
                        id="mainProductImage"
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="w-full h-[450px] object-cover"
                    >

                @else

                    <div class="w-full h-[450px] flex items-center justify-center text-gray-400">
                        Tidak ada gambar
                    </div>

                @endif

            </div>


            {{-- THUMBNAIL --}}
            @if ($product->images->count() > 0)

                <div class="flex gap-3 mt-4 overflow-x-auto pb-3">

                    @foreach ($product->images as $index => $image)

                        <button
                            type="button"
                            onclick="changeImage({{ $index }})"
                            class="thumbnail flex-shrink-0 w-20 h-20 rounded-xl
                                   overflow-hidden border-2
                                   {{ $index === 0
                                        ? 'border-[#966767]'
                                        : 'border-transparent' }}"
                        >

                            <img
                                src="{{ asset('storage/' . $image->image) }}"
                                alt="Foto {{ $index + 1 }}"
                                class="w-full h-full object-cover"
                            >

                        </button>

                    @endforeach

                </div>

            @endif

        </div>

    </div>

</div>


            <!-- ================= DETAIL PRODUK ================= -->
            <div class="pt-2">

                <!-- KATEGORI -->
                <p class="text-[10px] uppercase tracking-wide text-[#986d6d]">
                    {{ $product->category ?? 'Fashion' }}
                </p>

                <!-- NAMA -->
                <h1 class="text-2xl font-bold leading-snug text-[#332326] mt-1">
                    {{ $product->name }}
                </h1>


                <!-- HARGA -->
                <p class="text-xl font-bold text-[#8b2947] mt-5">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>


                <!-- DESKRIPSI -->
                <div class="mt-3">

                    <p class="text-[11px] leading-relaxed text-gray-600">
                        {{ $product->description ?? 'Tidak ada deskripsi produk.' }}
                    </p>

                </div>


                <!-- UKURAN -->
                <div class="mt-5">

                    <h2 class="text-xs font-semibold text-[#332326]">
                        Ukuran
                    </h2>

                    <div class="flex flex-wrap gap-2 mt-2">

                        @php
                            $sizes = $product->sizes;

                            if (is_string($sizes)) {
                                $sizes = json_decode($sizes, true);

                                if (!is_array($sizes)) {
                                    $sizes = array_filter(
                                        array_map('trim', explode(',', $product->sizes))
                                    );
                                }
                            }
                        @endphp

                        @forelse ($sizes ?? [] as $size)

                            <button
                                type="button"
                                class="size-btn w-10 h-8 border border-gray-300
                                       rounded-md text-xs bg-pink
                                       hover:border-[#8b2947]
                                       hover:text-[#fcfafb]"
                            >
                                {{ $size }}
                            </button>

                        @empty

                            <span class="text-xs text-gray-400">
                                Ukuran tidak tersedia
                            </span>

                        @endforelse

                    </div>

                </div>


                <!-- WARNA -->
                <div class="mt-4">

                    <h2 class="text-xs font-semibold text-[#332326]">
                        Warna
                    </h2>

                    <div class="flex flex-wrap gap-2 mt-2">

                        @php
                            $colors = $product->colors;

                            if (is_string($colors)) {
                                $colors = json_decode($colors, true);

                                if (!is_array($colors)) {
                                    $colors = array_filter(
                                        array_map('trim', explode(',', $product->colors))
                                    );
                                }
                            }
                        @endphp

                        @forelse ($colors ?? [] as $color)

                            <button
                                type="button"
                                class="color-btn px-4 py-2 border border-gray-300
                                       rounded-md bg-pink text-[10px]
                                       hover:border-[#8b2947]
                                       hover:text-[#fcf6f7]"
                            >
                                {{ $color }}
                            </button>

                        @empty

                            <span class="text-xs text-gray-400">
                                Warna tidak tersedia
                            </span>

                        @endforelse

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
                                   rounded-l-md bg-white text-sm"
                        >
                            −
                        </button>

                        <div
                            id="jumlah"
                            class="w-10 h-7 border-t border-b
                                   border-gray-300 bg-white
                                   flex items-center justify-center text-xs"
                        >
                            1
                        </div>

                        <button
                            type="button"
                            onclick="tambah()"
                            class="w-8 h-7 border border-gray-300
                                   rounded-r-md bg-white text-sm"
                        >
                            +
                        </button>

                    </div>

                </div>


                <!-- STOK -->
                <p class="text-[10px] text-gray-500 mt-2">
                    Stok:
                    <span class="font-semibold">
                        {{ $product->stock }}
                    </span>
                </p>


                <!-- TOMBOL -->
                @if ($product->stock > 0)

                    <div class="grid grid-cols-2 gap-5 mt-5">

                       <form action="{{ route('cart.store') }}" method="POST">
    @csrf

    <input type="hidden" name="product_id" value="{{ $product->id }}">

    <input type="hidden" name="size" id="selected-size" value="">

    <input type="hidden" name="color" id="selected-color" value="">

    <input
        type="hidden"
        name="quantity"
        id="cart-quantity"
        value="1"
    >

    <button
        type="submit"
        class="w-full rounded-xl bg-[#8b2947] py-3 text-sm font-semibold text-white transition hover:bg-[#721f39]"
    >
        Tambah ke Keranjang
    </button>
</form>
                      <a
    href="{{ route('checkout', ['product_id' => $product->id, 'quantity' => 1]) }}"
    class="text-center bg-[#c48797]
           text-white py-2.5 rounded-md
           text-xs font-medium
           hover:bg-[#8b2947] transition"
>
    Beli sekarang
</a>

                    </div>

                @else

                    <button
                        type="button"
                        disabled
                        class="w-full mt-5 bg-gray-300
                               text-gray-500 py-2.5 rounded-md
                               text-xs font-medium"
                    >
                        Produk Habis
                    </button>

                @endif


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

        const stok = {{ $product->stock }};

        if (jumlah < stok) {
            jumlah++;
            document.getElementById('jumlah').innerText = jumlah;
        }

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
<script>
    const productImages = @json(
        $product->images->map(function ($image) {
            return asset('storage/' . $image->image);
        })->values()
    );

    let currentImage = 0;

    function changeImage(index) {

        if (productImages.length === 0) {
            return;
        }

        currentImage = index;

        document.getElementById('mainProductImage').src =
            productImages[currentImage];

        updateThumbnail();
    }

    function nextImage() {

        if (productImages.length === 0) {
            return;
        }

        currentImage++;

        if (currentImage >= productImages.length) {
            currentImage = 0;
        }

        changeImage(currentImage);
    }

    function previousImage() {

        if (productImages.length === 0) {
            return;
        }

        currentImage--;

        if (currentImage < 0) {
            currentImage = productImages.length - 1;
        }

        changeImage(currentImage);
    }

    function updateThumbnail() {

        const thumbnails = document.querySelectorAll('.thumbnail');

        thumbnails.forEach((thumbnail, index) => {

            if (index === currentImage) {
                thumbnail.classList.remove('border-transparent');
                thumbnail.classList.add('border-[#966767]');
            } else {
                thumbnail.classList.remove('border-[#966767]');
                thumbnail.classList.add('border-transparent');
            }

        });
    }
</script>
@endsection