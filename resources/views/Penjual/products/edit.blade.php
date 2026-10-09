@extends('layouts.penjual')

@section('title', 'Edit Produk')
@section('page-title', 'Edit Produk')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-[#332326]">
                Edit Produk
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Ubah informasi produk yang dipilih.
            </p>
        </div>

        <a href="{{ route('penjual.produk.show', $product->id) }}"
            class="px-4 py-2 rounded-lg border border-gray-200 bg-white text-sm text-gray-600 hover:bg-gray-50">
            ← Kembali
        </a>
    </div>


    {{-- FORM --}}
    <div class="bg-white rounded-2xl border border-[#eadfe1] shadow-sm p-7">

        <form
            action="{{ route('penjual.produk.update', $product->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')


            {{-- NAMA --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-[#332326] mb-2">
                    Nama Produk
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $product->name) }}"
                    class="w-full rounded-xl border border-[#e5dada] px-4 py-3 text-sm focus:border-[#966767] focus:ring-0"
                    required>

                @error('name')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>


            {{-- KATEGORI --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-[#332326] mb-2">
                    Kategori
                </label>

                <input
                    type="text"
                    name="category"
                    value="{{ old('category', $product->category) }}"
                    class="w-full rounded-xl border border-[#e5dada] px-4 py-3 text-sm focus:border-[#966767] focus:ring-0">
            </div>


            {{-- DESKRIPSI --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-[#332326] mb-2">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="w-full rounded-xl border border-[#e5dada] px-4 py-3 text-sm focus:border-[#966767] focus:ring-0">{{ old('description', $product->description) }}</textarea>
            </div>


            {{-- HARGA + STOK --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">

                <div>
                    <label class="block text-sm font-medium text-[#332326] mb-2">
                        Harga
                    </label>

                    <input
                        type="number"
                        name="price"
                        value="{{ old('price', $product->price) }}"
                        min="0"
                        class="w-full rounded-xl border border-[#e5dada] px-4 py-3 text-sm focus:border-[#966767] focus:ring-0"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#332326] mb-2">
                        Stok
                    </label>

                    <input
                        type="number"
                        name="stock"
                        value="{{ old('stock', $product->stock) }}"
                        min="0"
                        class="w-full rounded-xl border border-[#e5dada] px-4 py-3 text-sm focus:border-[#966767] focus:ring-0"
                        required>
                </div>

            </div>


            {{-- UKURAN --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-[#332326] mb-2">
                    Ukuran
                </label>

                <input
                    type="text"
                    name="sizes"
                    value="{{ old('sizes', is_array($product->sizes) ? implode(', ', $product->sizes) : $product->sizes) }}"
                    placeholder="Contoh: S, M, L, XL"
                    class="w-full rounded-xl border border-[#e5dada] px-4 py-3 text-sm focus:border-[#966767] focus:ring-0">

                <p class="text-xs text-gray-400 mt-1">
                    Pisahkan ukuran dengan koma.
                </p>
            </div>


            {{-- WARNA --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-[#332326] mb-2">
                    Warna
                </label>

                <input
                    type="text"
                    name="colors"
                    value="{{ old('colors', is_array($product->colors) ? implode(', ', $product->colors) : $product->colors) }}"
                    placeholder="Contoh: Hitam, Putih, Cream"
                    class="w-full rounded-xl border border-[#e5dada] px-4 py-3 text-sm focus:border-[#966767] focus:ring-0">

                <p class="text-xs text-gray-400 mt-1">
                    Pisahkan warna dengan koma.
                </p>
            </div>


            {{-- GAMBAR --}}
            <div class="mb-7">
                <label class="block text-sm font-medium text-[#332326] mb-2">
                    Gambar Produk
                </label>

                @if ($product->image)
                <div class="mb-3">
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="w-32 h-32 object-cover rounded-xl border border-[#eadfe1]">
                </div>
                @endif

                <input
                    type="file"
                    name="images[]"
                    accept=".jpg,.jpeg,.png,.webp"
                    multiple
                    class="w-full rounded-xl border border-[#e5dada] bg-white px-4 py-3 text-sm">

                <p class="text-xs text-gray-400 mt-1">
                    Kosongkan jika tidak ingin mengganti gambar.
                </p>
            </div>


            {{-- BUTTON --}}
            <div class="flex gap-3">

                <a
                    href="{{ route('penjual.produk.show', $product->id) }}"
                    class="flex-1 text-center rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-semibold text-gray-600 hover:bg-gray-50">
                    Batal
                </a>

                <button
                    type="submit"
                    class="flex-1 rounded-xl bg-[#966767] px-5 py-3 text-sm font-semibold text-white hover:bg-[#7f5555] transition">
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection