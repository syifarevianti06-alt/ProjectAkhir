
@extends('layouts.penjual')

@section('title', 'Tambah Kategori')

@section('content')
<div class="min-h-screen bg-[#FAF5EE] p-4 md:p-7">

    {{-- HEADER --}}
    <div class="mb-6">
        <a
            href="{{ route('penjual.kategori') }}"
            class="mb-4 inline-flex items-center gap-2 text-sm font-semibold text-[#7B1F3A] hover:underline"
        >
            ← Kembali ke Kategori
        </a>

        <h1 class="text-2xl font-bold text-[#7B1F3A]">
            Tambah Kategori
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Tambahkan kategori baru untuk produk Lune Attiré.
        </p>
    </div>

    {{-- NOTIFIKASI ERROR --}}
    @if($errors->any())
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <p class="mb-2 font-semibold">Terjadi kesalahan:</p>

            <ul class="list-inside list-disc">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <div class="max-w-3xl overflow-hidden rounded-2xl border border-[#ead9dc] bg-white shadow-sm">

        <div class="border-b border-[#ead9dc] bg-[#7B1F3A] px-6 py-5">
            <h2 class="text-lg font-bold text-white">
                Informasi Kategori
            </h2>
            <p class="mt-1 text-sm text-white/80">
                Isi nama dan deskripsi kategori di bawah ini.
            </p>
        </div>

        <form
            action="{{ route('penjual.kategori.store') }}"
            method="POST"
            class="space-y-5 p-6"
        >
            @csrf

            {{-- NAMA KATEGORI --}}
            <div>
                <label
                    for="name"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Nama Kategori <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    maxlength="100"
                    required
                    autofocus
                    placeholder="Contoh: Kaos Oversize"
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition placeholder:text-gray-400 focus:border-[#7B1F3A] focus:ring-2 focus:ring-[#7B1F3A]/10"
                >

                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- DESKRIPSI --}}
            <div>
                <label
                    for="description"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Deskripsi Kategori
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    maxlength="500"
                    placeholder="Masukkan deskripsi kategori (opsional)"
                    class="w-full resize-y rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition placeholder:text-gray-400 focus:border-[#7B1F3A] focus:ring-2 focus:ring-[#7B1F3A]/10"
                >{{ old('description') }}</textarea>

                @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- TOMBOL --}}
            <div class="flex flex-wrap gap-3 border-t border-gray-100 pt-5">
                <button
                    type="submit"
                    class="rounded-xl bg-[#7B1F3A] px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#64182F]"
                >
                    Simpan Kategori
                </button>

                <a
                    href="{{ route('penjual.kategori') }}"
                    class="rounded-xl border border-gray-300 bg-white px-6 py-3 text-sm font-semibold text-gray-600 transition hover:bg-gray-50"
                >
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
