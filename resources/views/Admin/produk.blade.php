@extends('layouts.admin')

@section('title', 'Produk Admin')

@section('content')

<div class="space-y-7">

    {{-- HEADER --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="font-serif text-2xl font-bold text-[#4d4141]">
                Produk
            </h1>

            <p class="mt-1 text-sm text-[#9a8888]">
                Kelola seluruh produk Lune Attiré.
            </p>
        </div>

        <a
            href="{{ route('admin.produk.create') }}"
            class="inline-flex items-center justify-center rounded-xl bg-[#7D2942] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#682238]"
        >
            + Tambah Produk
        </a>

    </div>


    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">

        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">
                Total Produk
            </p>

            <p class="mt-2 text-2xl font-bold text-[#4d4141]">
                {{ $totalProduk }}
            </p>

            <p class="mt-1 text-[11px] text-[#9a8888]">
                Produk terdaftar
            </p>
        </div>


        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">
                Total Stok
            </p>

            <p class="mt-2 text-2xl font-bold text-[#4d4141]">
                {{ $totalStok }}
            </p>

            <p class="mt-1 text-[11px] text-[#9a8888]">
                Semua stok produk
            </p>
        </div>


        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">
            <p class="text-xs text-[#a28f8f]">
                Stok Menipis
            </p>

            <p class="mt-2 text-2xl font-bold text-[#7D2942]">
                {{ $stokMenipis }}
            </p>

            <p class="mt-1 text-[11px] text-[#9a8888]">
                Stok ≤ 10
            </p>
        </div>

    </div>


    {{-- FILTER --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

        <form
            action="{{ route('admin.produk') }}"
            method="GET"
            class="grid grid-cols-1 gap-3 md:grid-cols-3"
        >

            {{-- SEARCH --}}
            <div>
                <label class="mb-2 block text-xs font-medium text-[#6f5b5b]">
                    Cari Produk
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Nama produk..."
                    class="w-full rounded-xl border border-[#eadede] bg-[#fffcfa] px-4 py-3 text-sm text-[#4d4141] outline-none focus:border-[#7D2942] focus:ring-1 focus:ring-[#7D2942]"
                >
            </div>


            {{-- KATEGORI --}}
            <div>
                <label class="mb-2 block text-xs font-medium text-[#6f5b5b]">
                    Kategori
                </label>

                <select
                    name="category"
                    class="w-full rounded-xl border border-[#eadede] bg-[#fffcfa] px-4 py-3 text-sm text-[#4d4141] outline-none focus:border-[#7D2942] focus:ring-1 focus:ring-[#7D2942]"
                >

                    <option value="">
                        Semua kategori
                    </option>

                    @foreach ($kategori as $item)

                        <option
                            value="{{ $item }}"
                            {{ request('category') == $item ? 'selected' : '' }}
                        >
                            {{ $item }}
                        </option>

                    @endforeach

                </select>
            </div>


            {{-- BUTTON --}}
            <div class="flex items-end gap-2">

                <button
                    type="submit"
                    class="rounded-xl bg-[#7D2942] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#682238]"
                >
                    Cari
                </button>

                <a
                    href="{{ route('admin.produk') }}"
                    class="rounded-xl border border-[#eadede] bg-white px-5 py-3 text-sm text-[#6f5b5b] transition hover:bg-[#fcf9f9]"
                >
                    Reset
                </a>

            </div>

        </form>

    </div>


    {{-- TABEL PRODUK --}}
    <div class="overflow-hidden rounded-2xl border border-[#eadede] bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px] text-left">

                <thead class="border-b border-[#eadede] bg-[#fcf9f9]">

                    <tr>

                        <th class="px-5 py-4 text-xs font-semibold text-[#806d6d]">
                            Produk
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold text-[#806d6d]">
                            Kategori
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold text-[#806d6d]">
                            Harga
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold text-[#806d6d]">
                            Stok
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold text-[#806d6d]">
                            Ukuran
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold text-[#806d6d]">
                            Warna
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold text-[#806d6d]">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-[#f0e8e8]">

                    @forelse ($products as $product)

                        <tr class="transition hover:bg-[#fffcfa]">

                            {{-- PRODUK --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="h-14 w-14 flex-shrink-0 overflow-hidden rounded-xl bg-[#f5eeee]">

                                        @if ($product->image)

                                            <img
                                                src="{{ asset('storage/' . $product->image) }}"
                                                alt="{{ $product->name }}"
                                                class="h-full w-full object-cover"
                                            >

                                        @else

                                            <div class="flex h-full w-full items-center justify-center text-[10px] text-[#b59696]">
                                                No Image
                                            </div>

                                        @endif

                                    </div>


                                    <div class="min-w-0">

                                        <p class="max-w-[200px] truncate text-sm font-semibold text-[#4d4141]">
                                            {{ $product->name }}
                                        </p>

                                        <p class="mt-1 text-[11px] text-[#a28f8f]">
                                            ID #{{ $product->id }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- KATEGORI --}}
                            <td class="px-5 py-4">

                                <span class="rounded-full bg-[#f6ebeb] px-3 py-1 text-[10px] font-medium text-[#7D2942]">
                                    {{ $product->category }}
                                </span>

                            </td>


                            {{-- HARGA --}}
                            <td class="px-5 py-4 text-sm font-medium text-[#4d4141]">

                                Rp {{ number_format($product->price, 0, ',', '.') }}

                            </td>


                            {{-- STOK --}}
                            <td class="px-5 py-4">

                                @if ($product->stock <= 10)

                                    <span class="rounded-full bg-red-50 px-3 py-1 text-[10px] font-medium text-red-600">
                                        {{ $product->stock }} stok
                                    </span>

                                @else

                                    <span class="rounded-full bg-green-50 px-3 py-1 text-[10px] font-medium text-green-600">
                                        {{ $product->stock }} stok
                                    </span>

                                @endif

                            </td>


                            {{-- UKURAN --}}
                            <td class="px-5 py-4 text-xs text-[#806d6d]">

                                {{ is_array($product->sizes) ? implode(', ', $product->sizes) : ($product->sizes ?? '-') }}

                            </td>


                            {{-- WARNA --}}
                            <td class="px-5 py-4 text-xs text-[#806d6d]">

                                {{ is_array($product->colors) ? implode(', ', $product->colors) : ($product->colors ?? '-') }}

                            </td>


                            {{-- AKSI --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center gap-2">

                                    <a
                                        href="{{ route('admin.produk.edit', $product) }}"
                                        class="rounded-lg bg-[#f6ebeb] px-3 py-2 text-[11px] font-medium text-[#7D2942] transition hover:bg-[#eadada]"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('admin.produk.destroy', $product) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg bg-red-50 px-3 py-2 text-[11px] font-medium text-red-600 transition hover:bg-red-100"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="px-5 py-16 text-center">

                                <p class="text-sm font-medium text-[#806d6d]">
                                    Belum ada produk.
                                </p>

                                <p class="mt-1 text-xs text-[#a28f8f]">
                                    Tambahkan produk pertama kamu.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if ($products->hasPages())

            <div class="border-t border-[#eadede] px-5 py-4">

                {{ $products->links() }}

            </div>

        @endif

    </div>

</div>

@endsection