@extends('layouts.admin')

@section('title', 'Produk Admin')

@section('content')

<div class="space-y-6">

    //HEADER
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Produk
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Kelola seluruh produk Lune Attiré.
            </p>
        </div>

        <a href="{{ route('admin.produk.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#7B1F3A] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#64182f]">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 4v16m8-8H4" />

            </svg>

            Tambah Produk
        </a>
    </div>


    // STATISTIK
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

        // TOTAL PRODUK
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Total Produk
                    </p>

                    <h2 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ $totalProduk }}
                    </h2>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-50 text-purple-600">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M20 7l-8-4-8 4m16 0v10l-8 4m8-14l-8 4m0 0L4 7m8 4v10" />

                    </svg>

                </div>

            </div>

        </div>


        // TOTAL STOK
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Total Stok
                    </p>

                    <h2 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ $totalStok }}
                    </h2>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M20 7l-8-4-8 4m16 0v10l-8 4m8-14l-8 4m0 0L4 7m8 4v10" />

                    </svg>

                </div>

            </div>

        </div>


        // STOK MENIPIS
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Stok Menipis
                    </p>

                    <h2 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ $stokMenipis }}
                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        Stok ≤ 10
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-50 text-orange-600">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z" />

                    </svg>

                </div>

            </div>

        </div>

    </div>


    // FILTER
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

        <form action="{{ route('admin.produk') }}"
            method="GET"
            class="grid grid-cols-1 gap-4 md:grid-cols-3">

            // SEARCH
            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Cari Produk
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama produk..."
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-[#7B1F3A] focus:ring-2 focus:ring-[#7B1F3A]/10">

            </div>


            // KATEGORI
            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Kategori
                </label>

                <select
                    name="category"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-[#7B1F3A] focus:ring-2 focus:ring-[#7B1F3A]/10">

                    <option value="">
                        Semua Kategori
                    </option>

                    @foreach($kategori as $item)

                    <option
                        value="{{ $item }}"
                        {{ request('category') == $item ? 'selected' : '' }}>

                        {{ $item }}

                    </option>

                    @endforeach

                </select>

            </div>


            // BUTTON
            <div class="flex items-end gap-2">

                <button
                    type="submit"
                    class="rounded-xl bg-[#7B1F3A] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#64182f]">

                    Cari

                </button>

                <a
                    href="{{ route('admin.produk') }}"
                    class="rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">

                    Reset

                </a>

            </div>

        </form>

    </div>


    // TABLE
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1200px] text-left">

                // TABLE HEADER
                <thead class="border-b border-slate-200 bg-slate-50">

                    <tr>

                        <th class="px-4 py-4 text-center text-xs font-semibold uppercase tracking-wide text-slate-500">
                            No
                        </th>

                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                            Foto
                        </th>

                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                            Nama Produk
                        </th>

                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                            Kategori
                        </th>

                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                            Harga
                        </th>

                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                            Stok
                        </th>

                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                            Ukuran
                        </th>

                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                            Warna
                        </th>

                        <th class="px-4 py-4 text-center text-xs font-semibold uppercase tracking-wide text-slate-500">
                            Status
                        </th>

                        <th class="px-4 py-4 text-center text-xs font-semibold uppercase tracking-wide text-slate-500">
                            Aksi
                        </th>

                    </tr>

                </thead>


                // TABLE BODY
                <tbody class="divide-y divide-slate-100">

                    @forelse($products as $product)

                    <tr class="transition hover:bg-slate-50">

                        // NO
                        <td class="px-4 py-4 text-center text-sm font-medium text-slate-600">

                            {{ $loop->iteration }}

                        </td>


                        // FOTO
                        <td class="px-4 py-4">

                            <div class="flex items-center">

                                @if($product->image)

                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    class="h-16 w-16 rounded-xl object-cover border border-slate-200">

                                @else

                                <div class="flex h-16 w-16 items-center justify-center rounded-xl bg-slate-100 text-xs text-slate-400">

                                    No Image

                                </div>

                                @endif

                            </div>

                        </td>


                        // NAMA PRODUK
                        <td class="px-4 py-4">

                            <div>

                                <p class="font-semibold text-slate-800">
                                    {{ $product->name }}
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    ID #{{ $product->id }}
                                </p>

                            </div>

                        </td>


                        // KATEGORI
                        <td class="px-4 py-4">

                            <span class="text-sm text-slate-600">
                                {{ $product->category }}
                            </span>

                        </td>


                        // HARGA
                        <td class="px-4 py-4">

                            <span class="text-sm font-semibold text-slate-700">

                                Rp {{ number_format($product->price, 0, ',', '.') }}

                            </span>

                        </td>


                        // STOK
                        <td class="px-4 py-4">

                            @if($product->stock <= 10)

                                <div>

                                <span class="text-sm font-semibold text-red-600">
                                    {{ $product->stock }} stok
                                </span>

                                @if($product->stock > 0)

                                <p class="mt-1 text-[10px] text-orange-500">
                                    Stok menipis
                                </p>

                                @else

                                <p class="mt-1 text-[10px] text-red-500">
                                    Produk habis
                                </p>

                                @endif

        </div>

        @else

        <span class="text-sm font-semibold text-slate-700">
            {{ $product->stock }} stok
        </span>

        @endif

        </td>


        // UKURAN
        <td class="px-4 py-4">

            <span class="text-sm text-slate-600">

                {{ is_array($product->sizes)
                                        ? implode(', ', $product->sizes)
                                        : ($product->sizes ?? '-') }}

            </span>

        </td>


        // WARNA
        <td class="px-4 py-4">

            <span class="text-sm text-slate-600">

                {{ is_array($product->colors)
                                        ? implode(', ', $product->colors)
                                        : ($product->colors ?? '-') }}

            </span>

        </td>


        // STATUS
        <td class="px-4 py-4 text-center">

            @if($product->stock > 0)

            <span class="inline-flex rounded-full bg-green-50 px-3 py-1 text-[10px] font-medium text-green-600">

                Aktif

            </span>

            @else

            <span class="inline-flex rounded-full bg-red-50 px-3 py-1 text-[10px] font-medium text-red-600">

                Habis

            </span>

            @endif

        </td>


        // AKSI
        <td class="px-4 py-4">

            <div class="flex items-center justify-center gap-2">

                // EDIT
                <a
                    href="{{ route('admin.produk.edit', $product->id) }}"
                    class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-100">

                    Edit

                </a>


                // HAPUS
                <form
                    action="{{ route('admin.produk.destroy', $product->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100">

                        Hapus

                    </button>

                </form>

            </div>

        </td>

        </tr>

        @empty

        <tr>

            <td
                colspan="10"
                class="px-6 py-12 text-center">

                <div class="flex flex-col items-center justify-center">

                    <div class="mb-3 flex h-14 w-14 items-center justify-center rounded-full bg-slate-100">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-7 w-7 text-slate-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M20 7l-8-4-8 4m16 0v10l-8 4m8-14l-8 4m0 0L4 7m8 4v10" />

                        </svg>

                    </div>

                    <p class="font-semibold text-slate-700">
                        Belum ada produk
                    </p>

                    <p class="mt-1 text-sm text-slate-400">
                        Silakan tambahkan produk terlebih dahulu.
                    </p>

                </div>

            </td>

        </tr>

        @endforelse

        </tbody>

        </table>

    </div>


    //PAGINATION
    @if($products->hasPages())

    <div class="border-t border-slate-200 px-5 py-4">

        {{ $products->links() }}

    </div>

    @endif

</div>

</div>

@endsection