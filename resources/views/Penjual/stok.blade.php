@extends('layouts.penjual')

@section('title', 'Stok')

@section('page-title', 'Stok Produk')

@section('content')

<div class="space-y-7">

    {{-- HEADER --}}
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">

        <div>
            <h1 class="font-serif text-2xl font-bold text-[#4d4141]">
                Stok Produk
            </h1>

            <p class="mt-1 text-sm text-[#9a8888]">
                Pantau dan kelola ketersediaan stok produk di toko Lune Attiré.
            </p>
        </div>

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


    {{-- ERROR MESSAGE --}}
    @if ($errors->any())

        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">

            <p class="font-semibold">
                Terjadi kesalahan:
            </p>

            <ul class="mt-1 list-inside list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    {{-- STATISTIK --}}
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

        {{-- TOTAL PRODUK --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-xs text-[#a28f8f]">
                Total Produk
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                {{ $totalProduk }}
            </h2>

            <p class="mt-1 text-[11px] text-[#b09d9d]">
                Produk terdaftar
            </p>

        </div>


        {{-- TOTAL STOK --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-xs text-[#a28f8f]">
                Stok Tersedia
            </p>

            <h2 class="mt-2 text-2xl font-bold text-[#4d4141]">
                {{ $totalStok }}
            </h2>

            <p class="mt-1 text-[11px] text-[#b09d9d]">
                Total seluruh stok
            </p>

        </div>


        {{-- STOK MENIPIS --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-xs text-[#a28f8f]">
                Stok Menipis
            </p>

            <h2 class="mt-2 text-2xl font-bold text-orange-500">
                {{ $stokMenipis }}
            </h2>

            <p class="mt-1 text-[11px] text-[#b09d9d]">
                Stok 1–7 pcs
            </p>

        </div>


        {{-- STOK HABIS --}}
        <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

            <p class="text-xs text-[#a28f8f]">
                Stok Habis
            </p>

            <h2 class="mt-2 text-2xl font-bold text-red-500">
                {{ $stokHabis }}
            </h2>

            <p class="mt-1 text-[11px] text-[#b09d9d]">
                Produk tanpa stok
            </p>

        </div>

    </div>


    {{-- SEARCH & FILTER --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-5 shadow-sm">

        <div class="flex flex-col gap-4 md:flex-row">

            {{-- SEARCH --}}
            <div class="relative w-full max-w-[350px]">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-[#a99595]"
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
                    class="h-10 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] pl-10 pr-4 text-xs text-[#4d4141] outline-none focus:border-[#986d6d] focus:ring-2 focus:ring-[#986d6d]/10"
                >

            </div>


            {{-- STATUS FILTER --}}
            <select
                id="statusFilter"
                class="h-10 rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-xs text-[#4d4141] outline-none focus:border-[#986d6d]"
            >
                <option value="">Semua Status</option>
                <option value="tersedia">Tersedia</option>
                <option value="menipis">Stok Menipis</option>
                <option value="habis">Habis</option>
            </select>

        </div>

    </div>


    {{-- TABLE --}}
    <div class="overflow-hidden rounded-2xl border border-[#eadede] bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[850px] text-left text-xs">

                {{-- TABLE HEADER --}}
                <thead class="bg-[#fcf8f8]">

                    <tr class="border-b border-[#eadede] text-[#8f7b7b]">

                        <th class="px-6 py-4 font-semibold">
                            Produk
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Kategori
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Stok
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Status
                        </th>

                        <th class="px-6 py-4 text-center font-semibold">
                            Aksi
                        </th>

                    </tr>

                </thead>


                {{-- TABLE BODY --}}
                <tbody
                    id="stockTable"
                    class="divide-y divide-[#f1eaea]"
                >

                    @forelse ($products as $product)

                        @php

                            if ($product->stock == 0) {
                                $status = 'habis';
                                $statusText = 'Habis';
                                $statusClass = 'bg-red-50 text-red-600';
                            } elseif ($product->stock <= 7) {
                                $status = 'menipis';
                                $statusText = 'Stok Menipis';
                                $statusClass = 'bg-orange-50 text-orange-600';
                            } else {
                                $status = 'tersedia';
                                $statusText = 'Tersedia';
                                $statusClass = 'bg-green-50 text-green-600';
                            }

                        @endphp


                        <tr
                            class="stock-row hover:bg-[#fdfafa]"
                            data-name="{{ strtolower($product->name) }}"
                            data-status="{{ $status }}"
                        >

                            {{-- PRODUK --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-4">

                                    {{-- GAMBAR PRODUK --}}
                                    @if ($product->image)

                                        <img
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                            class="h-12 w-12 rounded-xl object-cover"
                                        >

                                    @else

                                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#f5eaea]">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-[#b99e9e]"
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


                                    {{-- NAMA --}}
                                    <div>

                                        <p class="font-semibold text-[#4d4141]">
                                            {{ $product->name }}
                                        </p>

                                        <p class="mt-1 text-[10px] text-[#a28f8f]">
                                            {{ $product->slug }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- KATEGORI --}}
                            <td class="px-6 py-5 text-[#665858]">

                                {{ $product->category }}

                            </td>


                            {{-- STOK --}}
                            <td class="px-6 py-5">

                                <span class="font-semibold text-[#4d4141]">
                                    {{ $product->stock }}
                                </span>

                                <span class="text-[#a28f8f]">
                                    pcs
                                </span>

                            </td>


                            {{-- STATUS --}}
                            <td class="px-6 py-5">

                                <span class="rounded-full px-3 py-1 text-[10px] {{ $statusClass }}">
                                    {{ $statusText }}
                                </span>

                            </td>


                            {{-- AKSI --}}
                            <td class="px-6 py-5 text-center">

                                <button
                                    type="button"
                                    onclick="openStockModal({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->stock }})"
                                    class="rounded-lg bg-[#986d6d] px-4 py-2 text-[10px] font-semibold text-white transition hover:bg-[#805959]"
                                >
                                    Update Stok
                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-16 text-center"
                            >

                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#f7eeee]">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 text-[#986d6d]"
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
                                    Belum ada produk yang terdaftar di toko.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


{{-- MODAL UPDATE STOK --}}
<div
    id="stockModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 px-4"
>

    <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-xl">

        {{-- MODAL HEADER --}}
        <div class="flex items-start justify-between">

            <div>

                <h2 class="text-lg font-semibold text-[#4d4141]">
                    Update Stok
                </h2>

                <p
                    id="stockProductName"
                    class="mt-1 text-sm text-[#9a8888]"
                >
                    Produk
                </p>

            </div>

            <button
                type="button"
                onclick="closeStockModal()"
                class="rounded-lg p-2 text-[#9a8888] hover:bg-[#f8eeee]"
            >
                ✕
            </button>

        </div>


        {{-- FORM --}}
        <form
            id="stockForm"
            method="POST"
            class="mt-6"
        >

            @csrf
            @method('PUT')

            <label
                for="stockInput"
                class="text-xs font-semibold text-[#665858]"
            >
                Jumlah Stok
            </label>

            <div class="mt-2 flex items-center gap-3">

                <input
                    type="number"
                    id="stockInput"
                    name="stock"
                    min="0"
                    required
                    class="h-11 w-full rounded-xl border border-[#eadede] bg-[#fcf9f9] px-4 text-sm text-[#4d4141] outline-none focus:border-[#986d6d] focus:ring-2 focus:ring-[#986d6d]/10"
                >

                <span class="text-sm text-[#9a8888]">
                    pcs
                </span>

            </div>


            {{-- MODAL BUTTON --}}
            <div class="mt-6 flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeStockModal()"
                    class="rounded-xl border border-[#eadede] px-5 py-2.5 text-sm font-medium text-[#665858] hover:bg-[#fcf9f9]"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="rounded-xl bg-[#986d6d] px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#805959]"
                >
                    Simpan Stok
                </button>

            </div>

        </form>

    </div>

</div>


{{-- SEARCH, FILTER & MODAL SCRIPT --}}
<script>

    const searchInput = document.getElementById('searchProduct');
    const statusFilter = document.getElementById('statusFilter');
    const stockRows = document.querySelectorAll('.stock-row');

    function filterStock() {

        const search = searchInput.value.toLowerCase().trim();
        const status = statusFilter.value.toLowerCase();

        stockRows.forEach(row => {

            const name = row.dataset.name;
            const rowStatus = row.dataset.status;

            const matchName = name.includes(search);

            const matchStatus =
                status === '' || rowStatus === status;

            if (matchName && matchStatus) {

                row.classList.remove('hidden');

            } else {

                row.classList.add('hidden');

            }

        });

    }


    searchInput.addEventListener('input', filterStock);

    statusFilter.addEventListener('change', filterStock);


    // ==========================================
    // MODAL UPDATE STOK
    // ==========================================

    function openStockModal(id, name, stock) {

        const modal = document.getElementById('stockModal');
        const form = document.getElementById('stockForm');
        const productName = document.getElementById('stockProductName');
        const stockInput = document.getElementById('stockInput');

        form.action = "{{ url('/penjual/stok') }}/" + id;

        productName.textContent = name;

        stockInput.value = stock;

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        stockInput.focus();

    }


    function closeStockModal() {

        const modal = document.getElementById('stockModal');

        modal.classList.add('hidden');
        modal.classList.remove('flex');

    }


    // Tutup modal kalau klik area luar modal
    document.getElementById('stockModal').addEventListener('click', function (event) {

        if (event.target === this) {
            closeStockModal();
        }

    });

</script>

@endsection