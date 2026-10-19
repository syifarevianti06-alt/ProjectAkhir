
@extends('layouts.penjual')

@section('title', 'Edit Profil Toko')

@section('content')
<div class="mx-auto max-w-4xl space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-[#7B1F3A]">
            Edit Profil Toko
        </h1>
        <p class="mt-1 text-sm text-gray-500">
            Perbarui informasi toko Lune Attiré.
        </p>
    </div>

    @if (session('success'))
        <div class="rounded-lg bg-green-100 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="rounded-lg bg-red-50 p-4 text-sm text-red-700">
            <ul class="list-inside list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penjual.profil.update') }}"
          method="POST"
          class="space-y-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        @csrf
        @method('PUT')

        <div>
            <label for="store_name"
                   class="mb-2 block text-sm font-semibold text-gray-700">
                Nama Toko
            </label>
            <input id="store_name"
                   type="text"
                   name="store_name"
                   value="{{ old('store_name', $profile->store_name ?? '') }}"
                   required
                   class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-[#7B1F3A] focus:outline-none">
        </div>

        <div>
            <label for="name"
                   class="mb-2 block text-sm font-semibold text-gray-700">
                Nama Penjual
            </label>
            <input id="name"
                   type="text"
                   name="name"
                   value="{{ old('name', $profile->name ?? '') }}"
                   required
                   class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-[#7B1F3A] focus:outline-none">
        </div>

        <div>
            <label for="email"
                   class="mb-2 block text-sm font-semibold text-gray-700">
                Email
            </label>
            <input id="email"
                   type="email"
                   name="email"
                   value="{{ old('email', $profile->email ?? '') }}"
                   required
                   class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-[#7B1F3A] focus:outline-none">
        </div>

        <div>
            <label for="phone"
                   class="mb-2 block text-sm font-semibold text-gray-700">
                Nomor HP
            </label>
            <input id="phone"
                   type="tel"
                   name="phone"
                   value="{{ old('phone', $profile->phone ?? '') }}"
                   class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-[#7B1F3A] focus:outline-none">
        </div>

        <div>
            <label for="address"
                   class="mb-2 block text-sm font-semibold text-gray-700">
                Alamat Toko
            </label>
            <textarea id="address"
                      name="address"
                      rows="3"
                      class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-[#7B1F3A] focus:outline-none">{{ old('address', $profile->address ?? '') }}</textarea>
        </div>

        <div>
            <label for="description"
                   class="mb-2 block text-sm font-semibold text-gray-700">
                Deskripsi Toko
            </label>
            <textarea id="description"
                      name="description"
                      rows="4"
                      class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-[#7B1F3A] focus:outline-none">{{ old('description', $profile->description ?? '') }}</textarea>
        </div>

        <div class="flex flex-wrap gap-3 border-t border-gray-100 pt-5">
            <button type="submit"
                    class="rounded-lg bg-[#7B1F3A] px-5 py-3 font-semibold text-white hover:bg-[#64172F]">
                Simpan Perubahan
            </button>

            <a href="{{ route('penjual.profil') }}"
               class="rounded-lg border border-gray-300 px-5 py-3 font-semibold text-gray-700 hover:bg-gray-50">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
