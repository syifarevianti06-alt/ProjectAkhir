@extends('layouts.penjual')

@section('title', 'Produk')
@section('page-title', 'Produk')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-semibold text-[#4d4141]">
                Produk
            </h1>

            <p class="mt-1 text-sm text-[#9a8888]">
                Kelola semua produk yang tersedia di toko Lune Attiré
            </p>
        </div>

        <a
            href="{{ route('penjual.produk.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#986d6d] px-5 py-3 text-sm font-medium text-white shadow-sm transition hover:bg-[#805959]"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 4v16m8-8H4"
                />
            </svg>

            Tambah Produk
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))

        <div class="flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M5 13l4 4L19 7"
                />
            </svg>

            {{ session('success') }}

        </div>

    @endif


    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">

        {{-- TOTAL PRODUK --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-[#9a8888]">
                        Total Produk
                    </p>

                    <p class="mt-2 text-2xl font-semibold text-[#4d4141]">
                        {{ $products->count() }}
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f5eaea]">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-[#986d6d]"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M20 7l-8-4-8 4m16 0v10l-8 4m8-14l-8 4m0 0L4 7m8 4v10"
                        />
                    </svg>

                </div>

            </div>

        </div>


        {{-- STOK TERSEDIA --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-[#9a8888]">
                        Total Stok
                    </p>

                    <p class="mt-2 text-2xl font-semibold text-[#4d4141]">
                        {{ $products->sum('stock') }}
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#f5eaea]">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-[#986d6d]"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 12h14M5 12a2 2 0 100 4h14a2 2 0 100-4M5 12a2 2 0 110-4h14a2 2 0 110 4"
                        />
                    </svg>

                </div>

            </div>

        </div>


        {{-- STOK MENIPIS --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-[#9a8888]">
                        Stok Menipis
                    </p>

                    <p class="mt-2 text-2xl font-semibold text-[#4d4141]">
                        {{ $products->where('stock', '>', 0)->where('stock', '<=', 10)->count() }}
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-yellow-50">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-yellow-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v4m0 4h.01M10.3 3.5L2.8 17a2 2 0 001.75 3h14.9a2 2 0 001.75-3L13.7 3.5a2 2 0 00-3.4 0z"
                        />
                    </svg>

                </div>

            </div>

        </div>


        {{-- HABIS --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-[#9a8888]">
                        Stok Habis
                    </p>

                    <p class="mt-2 text-2xl font-semibold text-[#4d4141]">
                        {{ $products->where('stock', 0)->count() }}
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-50">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-red-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>

                </div>

            </div>

        </div>

    </div>


    {{-- FILTER --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

        <div class="flex flex-col gap-4 md:flex-row">

            {{-- SEARCH --}}
            <div class="relative flex-1">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#a99595]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.7"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m21 21-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"
                    />
                </svg>

                <input
                    type="text"
                    id="searchProduct"
                    placeholder="Cari nama produk..."
                    class="w-full rounded-xl border border-[#e5dada] py-3 pl-11 pr-4 text-sm text-[#4d4141] outline-none transition focus:border-[#986d6d] focus:ring-2 focus:ring-[#986d6d]/10"
                >

            </div>


            {{-- CATEGORY --}}
            <select
                id="categoryFilter"
                class="rounded-xl border border-[#e5dada] bg-white px-4 py-3 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]"
            >
                <option value="">Semua Kategori</option>
                <option value="Atasan">Atasan</option>
                <option value="Bawahan">Bawahan</option>
                <option value="Aksesoris">Aksesoris</option>
            </select>

        </div>

    </div>


    {{-- TABLE --}}
    <div class="overflow-hidden rounded-2xl border border-[#eadede] bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[850px]">

                <thead class="border-b border-[#eadede] bg-[#fcf9f9]">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#806f6f]">
                            Produk
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#806f6f]">
                            Kategori
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#806f6f]">
                            Harga
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#806f6f]">
                            Stok
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#806f6f]">
                            Status
                        </th>

                    </tr>

                </thead>


                <tbody
                    id="productTable"
                    class="divide-y divide-[#f0e5e5]"
                >

                    @forelse ($products as $product)

                        <tr
                            class="product-row transition hover:bg-[#fcf9f9]"
                            data-name="{{ strtolower($product->name) }}"
                            data-category="{{ strtolower($product->category) }}"
                        >

                            {{-- PRODUK --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-4">

                                    @if ($product->image)

                                        <img
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                            class="h-14 w-14 rounded-xl object-cover"
                                        >

                                    @else

                                        <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-[#f5eaea]">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-[#b99e9e]"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                />
                                            </svg>

                                        </div>

                                    @endif


                                    <div>

                                        <p class="font-medium text-[#4d4141]">
                                            {{ $product->name }}
                                        </p>

                                        <p class="mt-1 text-xs text-[#a99595]">
                                            {{ $product->slug }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- KATEGORI --}}
                            <td class="px-6 py-4">

                                <span class="rounded-lg bg-[#f8eeee] px-3 py-1 text-xs font-medium text-[#805959]">
                                    {{ $product->category }}
                                </span>

                            </td>


                            {{-- HARGA --}}
                            <td class="px-6 py-4 text-sm font-medium text-[#4d4141]">

                                Rp {{ number_format($product->price, 0, ',', '.') }}

                            </td>


                            {{-- STOK --}}
                            <td class="px-6 py-4 text-sm text-[#6f5b5b]">

                                {{ $product->stock }}

                            </td>


                            {{-- STATUS --}}
                            <td class="px-6 py-4">

                                @if ($product->stock > 10)

                                    <span class="inline-flex rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700">
                                        Aktif
                                    </span>

                                @elseif ($product->stock > 0)

                                    <span class="inline-flex rounded-full bg-yellow-50 px-3 py-1 text-xs font-medium text-yellow-700">
                                        Stok Menipis
                                    </span>

                                @else

                                    <span class="inline-flex rounded-full bg-red-50 px-3 py-1 text-xs font-medium text-red-700">
                                        Stok Habis
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-16 text-center"
                            >

                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#f7eeee]">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-7 w-7 text-[#986d6d]"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M20 7l-8-4-8 4m16 0v10l-8 4m8-14l-8 4m0 0L4 7m8 4v10"
                                        />
                                    </svg>

                                </div>

                                <p class="mt-4 font-medium text-[#4d4141]">
                                    Belum ada produk
                                </p>

                                <p class="mt-1 text-sm text-[#9a8888]">
                                    Tambahkan produk pertama ke toko Lune Attiré.
                                </p>

                                <a
                                    href="{{ route('penjual.produk.tambah') }}"
                                    class="mt-4 inline-flex rounded-xl bg-[#986d6d] px-5 py-2.5 text-sm font-medium text-white hover:bg-[#805959]"
                                >
                                    + Tambah Produk
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


{{-- SEARCH & FILTER --}}
<script>

    const searchInput = document.getElementById('searchProduct');
    const categoryFilter = document.getElementById('categoryFilter');
    const productRows = document.querySelectorAll('.product-row');

    function filterProducts() {

        const search = searchInput.value.toLowerCase().trim();
        const category = categoryFilter.value.toLowerCase();

        productRows.forEach(row => {

            const name = row.dataset.name;
            const rowCategory = row.dataset.category;

            const matchName = name.includes(search);
            const matchCategory =
                category === '' || rowCategory === category;

            if (matchName && matchCategory) {
                row.classList.remove('hidden');
            } else {
                row.classList.add('hidden');
            }

        });

    }

    searchInput.addEventListener('input', filterProducts);
    categoryFilter.addEventListener('change', filterProducts);

</script>

@endsection