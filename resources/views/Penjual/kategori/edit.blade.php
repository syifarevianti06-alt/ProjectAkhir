
@extends('layouts.penjual')

@section('content')
<div class="min-h-screen bg-[#FAF5EE] px-4 py-8 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">

        {{-- HEADER --}}
        <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
            <div>
                <h1 class="text-3xl font-bold text-[#7B1F3A]">
                    Kategori Produk
                </h1>
                <p class="mt-2 text-sm text-gray-500">
                    Kelola kategori produk toko Anda
                </p>
            </div>

            <a href="{{ route('penjual.kategori.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#7B1F3A] px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#64182F]">
                <span class="text-xl">＋</span>
                Tambah Kategori
            </a>
        </div>

        {{-- NOTIFIKASI --}}
        @if(session('success'))
            <div class="mb-5 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                {{ session('error') }}
            </div>
        @endif

        {{-- FORM EDIT: MUNCUL SAAT TOMBOL EDIT DIKLIK --}}
        @if(isset($kategoriEdit) && $kategoriEdit)
            <div class="mb-8 overflow-hidden rounded-2xl border border-[#7B1F3A]/10 bg-white shadow-sm">

                <div class="border-b border-gray-100 px-6 py-5">
                    <h2 class="text-lg font-bold text-[#7B1F3A]">
                        Edit Kategori
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">
                        Lengkapi informasi kategori produk.
                    </p>
                </div>

                <form action="{{ route('penjual.kategori.update', $kategoriEdit->id) }}"
                      method="POST"
                      class="p-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">
                            Nama Kategori <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', $kategoriEdit->name) }}"
                            maxlength="100"
                            required
                            autofocus
                            placeholder="Masukkan nama kategori"
                            class="w-full rounded-xl border border-gray-300 bg-[#FAF5EE]/50 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-[#7B1F3A] focus:ring-4 focus:ring-[#7B1F3A]/10"
                        >

                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6 flex flex-col-reverse gap-3 border-t border-gray-100 pt-5 sm:flex-row sm:justify-end">
                        <a href="{{ route('penjual.kategori') }}"
                           class="inline-flex items-center justify-center rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-600 transition hover:bg-gray-50">
                            Batal
                        </a>

                        <button type="submit"
                                class="inline-flex items-center justify-center rounded-xl bg-[#7B1F3A] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#64182F]">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        @endif

        {{-- RINGKASAN --}}
        <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="rounded-2xl border border-[#7B1F3A]/10 bg-white p-5 shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#7B1F3A]/10 text-xl text-[#7B1F3A]">
                        ▤
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Kategori</p>
                        <p class="mt-1 text-2xl font-bold text-[#7B1F3A]">
                            {{ $kategori->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-[#7B1F3A]/10 bg-white p-5 shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#7B1F3A]/10 text-xl text-[#7B1F3A]">
                        ♧
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Produk</p>
                        <p class="mt-1 text-2xl font-bold text-[#7B1F3A]">
                           {{ \App\Models\Product::count() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- TABEL KATEGORI --}}
        <div class="overflow-hidden rounded-2xl border border-[#7B1F3A]/10 bg-white shadow-sm">

            <div class="flex flex-col justify-between gap-4 border-b border-gray-100 px-6 py-5 sm:flex-row sm:items-center">
                <div>
                    <h2 class="text-lg font-bold text-[#7B1F3A]">
                        Daftar Kategori
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">
                        Semua kategori produk toko Anda
                    </p>
                </div>

                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="m21 21-4.35-4.35m1.35-5.65a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                    </svg>

                    <input type="search"
                           id="cariKategori"
                           placeholder="Cari kategori..."
                           class="w-full rounded-xl border border-gray-200 py-2.5 pl-10 pr-4 text-sm outline-none focus:border-[#7B1F3A] focus:ring-2 focus:ring-[#7B1F3A]/10 sm:w-64">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-[#FAF5EE] text-xs uppercase tracking-wider text-[#7B1F3A]">
                        <tr>
                            <th class="px-6 py-4 font-bold">No</th>
                            <th class="px-6 py-4 font-bold">Nama Kategori</th>
                            <th class="px-6 py-4 text-center font-bold">Jumlah Produk</th>
                            <th class="px-6 py-4 text-center font-bold">Status</th>
                            <th class="px-6 py-4 text-center font-bold">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100" id="daftarKategori">
                        @forelse($kategori as $item)
                            <tr class="barisKategori transition hover:bg-[#FAF5EE]/60">
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#7B1F3A]/10 font-bold text-[#7B1F3A]">
                                            {{ strtoupper(substr($item->name, 0, 1)) }}
                                        </div>

                                        <span class="namaKategori font-semibold text-gray-800">
                                            {{ $item->name }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex rounded-full bg-[#FAF5EE] px-3 py-1.5 text-xs font-semibold text-[#7B1F3A]">
                                        {{ $item->total_produk }} produk
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1.5 text-xs font-semibold text-green-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                        Aktif
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('penjual.kategori.edit', $item->id) }}"
                                           class="rounded-lg border border-[#7B1F3A]/20 px-3 py-2 text-xs font-semibold text-[#7B1F3A] transition hover:bg-[#7B1F3A] hover:text-white">
                                            Edit
                                        </a>

                                        <form action="{{ route('penjual.kategori.destroy', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="rounded-lg border border-red-200 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-600 hover:text-white">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-14 text-center">
                                    <p class="font-semibold text-gray-700">
                                        Belum ada kategori produk
                                    </p>
                                    <p class="mt-1 text-sm text-gray-500">
                                        Klik Tambah Kategori untuk menambahkan kategori.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-gray-100 bg-[#FAF5EE]/50 px-6 py-4">
                <p class="text-xs text-gray-500">
                    Menampilkan {{ $kategori->count() }} kategori produk
                </p>
            </div>
        </div>

    </div>
</div>

{{-- PENCARIAN --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('cariKategori');

    if (!input) return;

    input.addEventListener('input', function () {
        const kataKunci = this.value.toLowerCase().trim();

        document.querySelectorAll('.barisKategori').forEach(function (baris) {
            const nama = baris.querySelector('.namaKategori').textContent.toLowerCase();
            baris.style.display = nama.includes(kataKunci) ? '' : 'none';
        });
    });
});
</script>
@endsection
