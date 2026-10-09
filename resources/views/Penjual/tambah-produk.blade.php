@extends('layouts.penjual')

@section('title', 'Tambah Produk')
@section('page-title', 'Tambah Produk')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div>
        <h1 class="text-2xl font-semibold text-[#4d4141]">
            Tambah Produk
        </h1>

        <p class="mt-1 text-sm text-[#9a8888]">
            Tambahkan produk baru ke toko Lune Attiré
        </p>
    </div>


    {{-- ERROR VALIDATION --}}
    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4">
            <p class="mb-2 font-medium text-red-700">
                Ada data yang belum benar:
            </p>

            <ul class="list-disc space-y-1 pl-5 text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- FORM --}}
    <form
        action="{{ route('penjual.produk.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- KOLOM KIRI --}}
            <div class="space-y-6 lg:col-span-2">

                {{-- INFORMASI PRODUK --}}
                <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm">

                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-[#4d4141]">
                            Informasi Produk
                        </h2>

                        <p class="mt-1 text-sm text-[#9a8888]">
                            Masukkan informasi dasar produk.
                        </p>
                    </div>


                    {{-- NAMA PRODUK --}}
                    <div class="mb-5">
                        <label
                            for="name"
                            class="mb-2 block text-sm font-medium text-[#4d4141]"
                        >
                            Nama Produk
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Abelia Blouse Top"
                            required
                            class="w-full rounded-xl border border-[#e5dada] px-4 py-3 text-sm text-[#4d4141] outline-none transition focus:border-[#986d6d] focus:ring-2 focus:ring-[#986d6d]/10"
                        >
                    </div>


                    {{-- KATEGORI --}}
                    <div class="mb-5">
                        <label
                            for="category"
                            class="mb-2 block text-sm font-medium text-[#4d4141]"
                        >
                            Kategori
                        </label>

                        <select
                            id="category"
                            name="category"
                            required
                            class="w-full rounded-xl border border-[#e5dada] bg-white px-4 py-3 text-sm text-[#4d4141] outline-none transition focus:border-[#986d6d] focus:ring-2 focus:ring-[#986d6d]/10"
                        >
                            <option value="">Pilih kategori</option>

                            <option
                                value="Atasan"
                                {{ old('category') == 'Atasan' ? 'selected' : '' }}
                            >
                                Atasan
                            </option>

                            <option
                                value="Bawahan"
                                {{ old('category') == 'Bawahan' ? 'selected' : '' }}
                            >
                                Bawahan
                            </option>

                            <option
                                value="Aksesoris"
                                {{ old('category') == 'Aksesoris' ? 'selected' : '' }}
                            >
                                Aksesoris
                            </option>
                        </select>
                    </div>


                    {{-- HARGA & STOK --}}
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div>
                            <label
                                for="price"
                                class="mb-2 block text-sm font-medium text-[#4d4141]"
                            >
                                Harga
                            </label>

                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#9a8888]">
                                    Rp
                                </span>

                                <input
                                    type="number"
                                    id="price"
                                    name="price"
                                    value="{{ old('price') }}"
                                    min="0"
                                    placeholder="162000"
                                    required
                                    class="w-full rounded-xl border border-[#e5dada] py-3 pl-11 pr-4 text-sm text-[#4d4141] outline-none transition focus:border-[#986d6d] focus:ring-2 focus:ring-[#986d6d]/10"
                                >
                            </div>
                        </div>


                        <div>
                            <label
                                for="stock"
                                class="mb-2 block text-sm font-medium text-[#4d4141]"
                            >
                                Stok
                            </label>

                            <input
                                type="number"
                                id="stock"
                                name="stock"
                                value="{{ old('stock', 0) }}"
                                min="0"
                                placeholder="20"
                                required
                                class="w-full rounded-xl border border-[#e5dada] px-4 py-3 text-sm text-[#4d4141] outline-none transition focus:border-[#986d6d] focus:ring-2 focus:ring-[#986d6d]/10"
                            >
                        </div>

                    </div>

                </div>


                {{-- VARIASI PRODUK --}}
                <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm">

                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-[#4d4141]">
                            Variasi Produk
                        </h2>

                        <p class="mt-1 text-sm text-[#9a8888]">
                            Masukkan ukuran dan warna yang tersedia.
                        </p>
                    </div>


                    {{-- UKURAN --}}
                    <div class="mb-5">
                        <label
                            for="sizes"
                            class="mb-2 block text-sm font-medium text-[#4d4141]"
                        >
                            Ukuran
                        </label>

                        <input
                            type="text"
                            id="sizes"
                            name="sizes"
                            value="{{ old('sizes') }}"
                            placeholder="Contoh: S, M, L, XL"
                            class="w-full rounded-xl border border-[#e5dada] px-4 py-3 text-sm text-[#4d4141] outline-none transition focus:border-[#986d6d] focus:ring-2 focus:ring-[#986d6d]/10"
                        >

                        <p class="mt-2 text-xs text-[#a99595]">
                            Pisahkan setiap ukuran dengan tanda koma.
                        </p>
                    </div>


                    {{-- WARNA --}}
                    <div>
                        <label
                            for="colors"
                            class="mb-2 block text-sm font-medium text-[#4d4141]"
                        >
                            Warna
                        </label>

                        <input
                            type="text"
                            id="colors"
                            name="colors"
                            value="{{ old('colors') }}"
                            placeholder="Contoh: Navy, Cream, Pink"
                            class="w-full rounded-xl border border-[#e5dada] px-4 py-3 text-sm text-[#4d4141] outline-none transition focus:border-[#986d6d] focus:ring-2 focus:ring-[#986d6d]/10"
                        >

                        <p class="mt-2 text-xs text-[#a99595]">
                            Pisahkan setiap warna dengan tanda koma.
                        </p>
                    </div>

                </div>


                {{-- DESKRIPSI --}}
                <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm">

                    <div class="mb-5">
                        <h2 class="text-lg font-semibold text-[#4d4141]">
                            Deskripsi Produk
                        </h2>
                    </div>

                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        placeholder="Tuliskan deskripsi produk..."
                        class="w-full resize-none rounded-xl border border-[#e5dada] px-4 py-3 text-sm text-[#4d4141] outline-none transition focus:border-[#986d6d] focus:ring-2 focus:ring-[#986d6d]/10"
                    >{{ old('description') }}</textarea>

                </div>

            </div>


            {{-- KOLOM KANAN --}}
            <div class="space-y-6">

                {{-- FOTO PRODUK --}}
                <div class="rounded-2xl border border-[#eadede] bg-white p-6 shadow-sm">

    <div class="mb-5">
        <h2 class="text-lg font-semibold text-[#4d4141]">
            Foto Produk
        </h2>

        <p class="mt-1 text-sm text-[#9a8888]">
            Upload foto produk.
        </p>
    </div>

    <div
        class="rounded-2xl border-2 border-dashed border-[#e5dada] p-6 text-center"
    >

        <label
            for="image"
            class="block cursor-pointer"
        >

            <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-full bg-[#f5eaea]">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-7 w-7 text-[#986d6d]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                    />
                </svg>

            </div>

            <p class="text-sm font-medium text-[#4d4141]">
                Pilih Foto Produk
            </p>

            <p class="mt-1 text-xs text-[#a99595]">
                JPG, JPEG, PNG, WEBP — maksimal 2 MB
            </p>

        </label>

        <input
    type="file"
    name="images[]"
    accept=".jpg,.jpeg,.png,.webp"
    multiple
    class="w-full rounded-xl border border-[#e5dada] bg-white px-4 py-3 text-sm"

    
><p class="text-xs text-gray-400 mt-1">
    Kamu bisa memilih beberapa foto sekaligus.
</p>

    </div>

</div>


                {{-- TIPS --}}
                <div class="rounded-2xl bg-[#faf5f5] p-6">

                    <h3 class="font-semibold text-[#4d4141]">
                        Tips Produk
                    </h3>

                    <ul class="mt-4 space-y-3 text-sm text-[#806f6f]">

                        <li class="flex gap-2">
                            <span class="text-[#986d6d]">•</span>
                            Gunakan nama produk yang jelas.
                        </li>

                        <li class="flex gap-2">
                            <span class="text-[#986d6d]">•</span>
                            Gunakan foto produk yang terang dan jelas.
                        </li>

                        <li class="flex gap-2">
                            <span class="text-[#986d6d]">•</span>
                            Masukkan stok sesuai jumlah produk yang tersedia.
                        </li>

                        <li class="flex gap-2">
                            <span class="text-[#986d6d]">•</span>
                            Pisahkan ukuran dan warna dengan koma.
                        </li>

                    </ul>

                </div>

            </div>

        </div>


        {{-- BUTTON --}}
        <div class="mt-6 flex items-center justify-end gap-3">

            <a
                href="{{ route('penjual.produk') }}"
                class="rounded-xl border border-[#e5dada] bg-white px-6 py-3 text-sm font-medium text-[#6f5b5b] transition hover:bg-[#faf7f7]"
            >
                Batal
            </a>

            <button
                type="submit"
                class="rounded-xl bg-[#986d6d] px-7 py-3 text-sm font-medium text-white shadow-sm transition hover:bg-[#805959]"
            >
                Simpan Produk
            </button>

        </div>

    </form>

</div>

@endsection