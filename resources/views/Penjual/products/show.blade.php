@extends('layouts.penjual')

@section('title', 'Detail Produk')
@section('page-title', 'Detail Produk')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-[#332326]">
                Detail Produk
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Informasi lengkap produk
            </p>
        </div>

        <a href="{{ route('penjual.produk') }}"
            class="px-4 py-2 rounded-lg border border-gray-200 bg-white text-sm text-gray-600 hover:bg-gray-50">
            ← Kembali
        </a>
    </div>


    {{-- DETAIL CARD --}}
    <div class="bg-white rounded-2xl border border-[#eadfe1] shadow-sm overflow-hidden">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-7">

            {{-- FOTO PRODUK --}}
            <div class="bg-white rounded-2xl border border-[#eadfe1] p-5">

                {{-- FOTO UTAMA --}}
                <div class="relative overflow-hidden rounded-2xl bg-[#f8f1eb]">

                    @if ($product->images->count() > 0)

                    <img
                        id="mainProductImage"
                        src="{{ asset('storage/' . $product->images->first()->image) }}"
                        alt="{{ $product->name }}"
                        class="w-full h-[450px] object-cover transition duration-300">

                    {{-- TOMBOL SEBELUMNYA --}}
                    <button
                        type="button"
                        onclick="previousImage()"
                        class="absolute left-4 top-1/2 -translate-y-1/2
                       w-10 h-10 rounded-full
                       bg-white/90 shadow
                       flex items-center justify-center
                       text-[#6f5555] hover:bg-white">
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
                       text-[#6f5555] hover:bg-white">
                        ›
                    </button>

                    @elseif ($product->image)

                    <img
                        id="mainProductImage"
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="w-full h-[450px] object-cover">

                    @else

                    <div class="w-full h-[450px] flex items-center justify-center text-gray-400">
                        Tidak ada gambar
                    </div>

                    @endif

                </div>


                {{-- THUMBNAIL --}}
                @if ($product->images->count() > 0)

                <div class="flex gap-3 mt-4 overflow-x-auto pb-2">

                    @foreach ($product->images as $index => $image)

                    <button
                        type="button"
                        onclick="changeImage({{ $index }})"
                        class="thumbnail flex-shrink-0 rounded-xl overflow-hidden border-2
                           {{ $index === 0 ? 'border-[#966767]' : 'border-transparent' }}">

                        <img
                            src="{{ asset('storage/' . $image->image) }}"
                            alt="Foto {{ $index + 1 }}"
                            class="w-20 h-20 object-cover">

                    </button>

                    @endforeach

                </div>

                @endif

            </div>

            {{-- INFORMASI --}}
            <div class="flex flex-col">

                <span class="text-xs text-[#966767] font-medium uppercase tracking-wide">
                    {{ $product->category ?? 'Tanpa kategori' }}
                </span>

                <h2 class="text-2xl font-semibold text-[#332326] mt-2">
                    {{ $product->name }}
                </h2>

                <p class="text-xl font-bold text-[#8b2947] mt-4">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>


                {{-- STOK --}}
                <div class="mt-6 p-4 rounded-xl bg-[#fbf5ef]">
                    <p class="text-xs text-gray-500">
                        Stok
                    </p>

                    <p class="text-lg font-semibold text-[#332326] mt-1">
                        {{ $product->stock }}
                    </p>
                </div>


                {{-- DESKRIPSI --}}
                <div class="mt-6">
                    <h3 class="text-sm font-semibold text-[#332326]">
                        Deskripsi
                    </h3>

                    <p class="text-sm text-gray-600 leading-6 mt-2">
                        {{ $product->description ?: 'Tidak ada deskripsi produk.' }}
                    </p>
                </div>


                {{-- UKURAN --}}
                @if ($product->sizes)
                <div class="mt-5">
                    <h3 class="text-sm font-semibold text-[#332326]">
                        Ukuran
                    </h3>

                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach ($product->sizes as $size)
                        <span class="px-3 py-1.5 rounded-lg bg-[#f7eeee] text-sm text-[#7f5555]">
                            {{ $size }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif


                {{-- WARNA --}}
                @if ($product->colors)
                <div class="mt-5">
                    <h3 class="text-sm font-semibold text-[#332326]">
                        Warna
                    </h3>

                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach ($product->colors as $color)
                        <span class="px-3 py-1.5 rounded-lg bg-[#f7eeee] text-sm text-[#7f5555]">
                            {{ $color }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif


                {{-- TOMBOL --}}
                <div class="flex gap-3 mt-8">

                    {{-- EDIT --}}
                    <a href="{{ route('penjual.produk.edit', $product->id) }}"
                        class="flex-1 text-center rounded-xl bg-[#966767] px-5 py-3 text-sm font-semibold text-white hover:bg-[#7f5555] transition">
                        Edit Produk
                    </a>


                    {{-- HAPUS --}}
                    <form
                        action="{{ route('penjual.produk.destroy', $product->id) }}"
                        method="POST"
                        class="flex-1"
                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="w-full rounded-xl border border-red-300 bg-red-50 px-5 py-3 text-sm font-semibold text-red-600 hover:bg-red-100 transition">
                            Hapus Produk
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>

</div>

@php
    $productImages = $product->images->map(function ($image) {
        return asset('storage/' . $image->image);
    })->values();
@endphp

<script>
    const productImages = @json($productImages);

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