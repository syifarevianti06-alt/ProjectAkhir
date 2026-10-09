@extends('layouts.penjual')

@section('title', 'Produk')
@section('page-title', 'Produk')

@section('content')

<div class="space-y-6">

    //HEADER
    <div>
        <h1 class="text-2xl font-semibold text-[#4d4141]">
            Produk
        </h1>

        <p class="mt-1 text-sm text-[#9a8888]">
            Lihat dan kelola produk yang tersedia di toko Lune Attiré.
        </p>
    </div>


    //PESAN BERHASIL
    @if (session('success'))

    <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
        {{ session('success') }}
    </div>

    @endif


    //STATISTIK
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

        //TOTAL PRODUK
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-sm text-[#9a8888]">
                Total Produk
            </p>

            <p class="mt-2 text-2xl font-semibold text-[#4d4141]">
                {{ $products->total() }}
            </p>

        </div>


        //TOTAL STOK
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-sm text-[#9a8888]">
                Total Stok
            </p>

            <p class="mt-2 text-2xl font-semibold text-[#4d4141]">
                {{ $products->sum('stock') }}
            </p>

        </div>


        //PRODUK HABIS
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-sm text-[#9a8888]">
                Produk Habis
            </p>

            <p class="mt-2 text-2xl font-semibold text-[#4d4141]">
                {{ $products->where('stock', 0)->count() }}
            </p>

        </div>

    </div>


    //FILTER
    <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

        <div class="flex flex-col gap-4 md:flex-row">

            //SEARCH
            <div class="flex-1">

                <input
                    type="text"
                    id="searchProduct"
                    placeholder="Cari nama produk..."
                    class="w-full rounded-xl border border-[#e5dada] px-4 py-3 text-sm text-[#4d4141] outline-none transition focus:border-[#986d6d] focus:ring-2 focus:ring-[#986d6d]/10">

            </div>


            //KATEGORI
            <select
                id="categoryFilter"
                class="rounded-xl border border-[#e5dada] bg-white px-4 py-3 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]">

                <option value="">
                    Semua Kategori
                </option>

                <option value="Atasan">
                    Atasan
                </option>

                <option value="Bawahan">
                    Bawahan
                </option>

                <option value="Aksesoris">
                    Aksesoris
                </option>

            </select>

        </div>

    </div>


    //TABEL
    <div class="overflow-hidden rounded-2xl border border-[#eadede] bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1500px]">

                //HEADER TABEL
                <thead class="border-b border-[#eadede] bg-[#fcf9f9]">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#806f6f]">
                            No
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#806f6f]">
                            Foto
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#806f6f]">
                            Nama Produk
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
                            Ukuran
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#806f6f]">
                            Warna
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#806f6f]">
                            Status
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#806f6f]">
                            Aksi
                        </th>

                    </tr>

                </thead>


                //DATA PRODUK
                <tbody
                    id="productTable"
                    class="divide-y divide-[#f0e5e5]">

                    @forelse ($products as $product)

                    <tr
                        class="product-row transition hover:bg-[#fcf9f9]"
                        data-name="{{ strtolower($product->name) }}"
                        data-category="{{ strtolower($product->category ?? '') }}">

                        //NO
                        <td class="px-6 py-4 text-sm text-[#6f5b5b]">
                            {{ $products->firstItem() + $loop->index }}
                        </td>


                        //FOTO
                        <td class="px-6 py-4">

                            @if ($product->image)

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                class="h-14 w-14 rounded-xl object-cover">

                            @else

                            <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-[#f5eaea]">
                                <span class="text-xl">
                                    🖼️
                                </span>
                            </div>

                            @endif

                        </td>


                        //NAMA
                        <td class="px-6 py-4">

                            <p class="font-medium text-[#4d4141]">
                                {{ $product->name }}
                            </p>

                            <p class="mt-1 text-xs text-[#a99595]">
                                ID #{{ $product->id }}
                            </p>

                        </td>


                        //KATEGORI
                        <td class="px-6 py-4">

                            <span class="rounded-lg bg-[#f8eeee] px-3 py-1 text-xs font-medium text-[#805959]">
                                {{ $product->category ?? '-' }}
                            </span>

                        </td>


                        //HARGA
                        <td class="px-6 py-4 text-sm font-medium text-[#4d4141]">

                            Rp{{ number_format($product->price, 0, ',', '.') }}

                        </td>


                        //STOK
                        <td class="px-6 py-4">

                            <span class="text-sm font-medium text-[#6f5b5b]">
                                {{ $product->stock }}
                            </span>

                            <span class="ml-1 text-xs text-[#a99595]">
                                stok
                            </span>

                        </td>


                        //UKURAN
                        <td class="px-6 py-4 text-sm text-[#6f5b5b]">

                            @if (is_array($product->sizes ?? null))

                            {{ implode(', ', $product->sizes) }}

                            @elseif (!empty($product->sizes))

                            {{ $product->sizes }}

                            @else

                            -

                            @endif

                        </td>


                        //WARNA
                        <td class="px-6 py-4 text-sm text-[#6f5b5b]">

                            @if (is_array($product->colors ?? null))

                            {{ implode(', ', $product->colors) }}

                            @elseif (!empty($product->colors))

                            {{ $product->colors }}

                            @else

                            -

                            @endif

                        </td>


                        //STATUS
                        <td class="px-6 py-4">

                            @if ($product->stock > 0)

                            <span class="inline-flex rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700">
                                Aktif
                            </span>

                            @else

                            <span class="inline-flex rounded-full bg-red-50 px-3 py-1 text-xs font-medium text-red-700">
                                Habis
                            </span>

                            @endif

                        </td>


                        //AKSI
                        <td class="px-6 py-4">

                            <div class="flex items-center gap-2">

                                //LIHAT DETAIL
                                <a
                                    href="{{ route('penjual.produk.show', $product->id) }}"
                                    class="whitespace-nowrap rounded-lg bg-[#f5eeee] px-3 py-2 text-xs font-medium text-[#805959] transition hover:bg-[#eadede]">
                                    Lihat Detail
                                </a>


                                //EDIT
                                <a
                                    href="{{ route('penjual.produk.edit', $product->id) }}"
                                    class="whitespace-nowrap rounded-lg bg-[#f3f1e9] px-3 py-2 text-xs font-medium text-[#6f634b] transition hover:bg-[#e9e5d8]">
                                    Edit
                                </a>


                                //HAPUS
                                <form
                                    action="{{ route('penjual.produk.destroy', $product->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Apakah kamu yakin ingin menghapus produk ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="whitespace-nowrap rounded-lg bg-[#fceeee] px-3 py-2 text-xs font-medium text-red-600 transition hover:bg-[#f8dddd]">
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
                            class="px-6 py-16 text-center">

                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#f7eeee]">

                                <span class="text-2xl">
                                    🛍️
                                </span>

                            </div>

                            <p class="mt-4 font-medium text-[#4d4141]">
                                Belum ada produk
                            </p>

                            <p class="mt-1 text-sm text-[#9a8888]">
                                Belum ada produk yang tersedia di toko Lune Attiré.
                            </p>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        // PAGINATION
        @if ($products->hasPages())

        <div class="border-t border-[#eadede] px-6 py-4">

            {{ $products->links() }}

        </div>

        @endif

    </div>

</div>


// SEARCH & FILTER
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