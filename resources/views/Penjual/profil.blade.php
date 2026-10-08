@extends('layouts.penjual')

@section('title', 'Profil Toko')
@section('page-title', 'Profil Toko')

@section('content')

<div class="max-w-5xl space-y-7">

    {{-- HEADER --}}
    <div>
        <h1 class="font-serif text-2xl font-bold text-[#4d4141]">
            Profil Toko
        </h1>

        <p class="mt-1 text-sm text-[#9a8888]">
            Kelola informasi toko Lune Attiré.
        </p>
    </div>


    {{-- PESAN BERHASIL --}}
    @if (session('status'))
    <div class="rounded-xl border border-green-100 bg-green-50 px-5 py-4 text-sm text-green-700">
        {{ session('status') }}
    </div>
    @endif


    {{-- ERROR VALIDASI --}}
    @if ($errors->any())
    <div class="rounded-xl border border-red-100 bg-red-50 px-5 py-4 text-sm text-red-700">
        <p class="font-semibold mb-2">
            Ada data yang perlu diperbaiki:
        </p>

        <ul class="list-disc pl-5 space-y-1">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    {{-- INFORMASI TOKO --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-7 shadow-sm">

        <div class="flex flex-col gap-6 sm:flex-row sm:items-center">

            {{-- LOGO --}}
            <div class="flex h-24 w-24 shrink-0 items-center justify-center rounded-2xl bg-[#f4e9e9]">

                <span class="font-serif text-xl font-bold text-[#986d6d]">
                    LA
                </span>

            </div>


            <div>

                <h2 class="font-serif text-xl font-bold text-[#4d4141]">
                    {{ $profile->store_name }}
                </h2>

                <p class="mt-1 text-xs text-[#a28f8f]">
                    {{ $profile->category ?? 'Fashion Wanita' }}
                </p>

                <span class="mt-3 inline-block rounded-full bg-green-50 px-3 py-1 text-[10px] text-green-600">
                    Toko Aktif
                </span>

            </div>

        </div>

    </div>


    {{-- FORM INFORMASI --}}
    <form action="{{ route('penjual.profil.update') }}" method="POST">
        @csrf
        @method('PUT')


        <div class="rounded-2xl border border-[#eadede] bg-white p-7 shadow-sm">

            <h2 class="font-serif text-lg font-semibold text-[#4d4141]">
                Informasi Toko
            </h2>

            <p class="mt-1 text-xs text-[#a28f8f]">
                Informasi yang akan ditampilkan kepada pelanggan.
            </p>


            <div class="mt-6 grid gap-5 md:grid-cols-2">

                {{-- NAMA PEMILIK --}}
                <div>

                    <label class="mb-2 block text-xs font-semibold text-[#665858]">
                        Nama Pemilik
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $profile->name) }}"
                        required
                        class="h-11 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]">

                </div>


                {{-- NAMA TOKO --}}
                <div>

                    <label class="mb-2 block text-xs font-semibold text-[#665858]">
                        Nama Toko
                    </label>

                    <input
                        type="text"
                        name="store_name"
                        value="{{ old('store_name', $profile->store_name) }}"
                        required
                        class="h-11 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]">

                </div>


                {{-- EMAIL --}}
                <div>

                    <label class="mb-2 block text-xs font-semibold text-[#665858]">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $profile->email) }}"
                        required
                        class="h-11 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]">

                </div>


                {{-- TELEPON --}}
                <div>

                    <label class="mb-2 block text-xs font-semibold text-[#665858]">
                        Nomor Telepon
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', $profile->phone) }}"
                        placeholder="Masukkan nomor telepon"
                        class="h-11 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]">

                </div>


                {{-- KATEGORI --}}
                <div>

                    <label class="mb-2 block text-xs font-semibold text-[#665858]">
                        Kategori Toko
                    </label>

                    <select
                        name="category"
                        class="h-11 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]">

                        <option value="Fashion Wanita"
                            {{ old('category', $profile->category) === 'Fashion Wanita' ? 'selected' : '' }}>
                            Fashion Wanita
                        </option>

                        <option value="Fashion Pria"
                            {{ old('category', $profile->category) === 'Fashion Pria' ? 'selected' : '' }}>
                            Fashion Pria
                        </option>

                        <option value="Aksesoris"
                            {{ old('category', $profile->category) === 'Aksesoris' ? 'selected' : '' }}>
                            Aksesoris
                        </option>

                    </select>

                </div>


                {{-- ALAMAT --}}
                <div class="md:col-span-2">

                    <label class="mb-2 block text-xs font-semibold text-[#665858]">
                        Alamat Toko
                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        placeholder="Masukkan alamat toko"
                        class="w-full resize-none rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 py-3 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]">{{ old('address', $profile->address) }}</textarea>

                </div>


                {{-- DESKRIPSI --}}
                <div class="md:col-span-2">

                    <label class="mb-2 block text-xs font-semibold text-[#665858]">
                        Deskripsi Toko
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        placeholder="Tuliskan deskripsi toko"
                        class="w-full resize-none rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 py-3 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]">{{ old('description', $profile->description) }}</textarea>

                </div>

            </div>


            {{-- BUTTON --}}
            <div class="mt-7 flex justify-end">

                <button
                    type="submit"
                    class="rounded-lg bg-[#986d6d] px-7 py-3 text-xs font-semibold text-white transition hover:bg-[#805959]">
                    Simpan Perubahan
                </button>

            </div>

        </div>

    </form>




    {{-- AKUN --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-7 shadow-sm">

        <h2 class="font-serif text-lg font-semibold text-[#4d4141]">
            Keamanan Akun
        </h2>

        <p class="mt-1 text-xs text-[#a28f8f]">
            Kelola informasi login akun penjual.
        </p>

       <form
    action="{{ route('penjual.profil.password') }}"
    method="POST"
    class="mt-6">

    @csrf
    @method('PUT')

            <div class="grid gap-5 md:grid-cols-2">

                {{-- PASSWORD BARU --}}
                <div>

                    <label class="mb-2 block text-xs font-semibold text-[#665858]">
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        minlength="8"
                        placeholder="Minimal 8 karakter"
                        class="h-11 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]">

                </div>

                {{-- KONFIRMASI PASSWORD --}}
                <div>

                    <label class="mb-2 block text-xs font-semibold text-[#665858]">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        required
                        minlength="8"
                        placeholder="Ulangi password baru"
                        class="h-11 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]">

                </div>

            </div>

            <div class="mt-5 flex justify-end">

                <button
                    type="submit"
                    class="rounded-lg bg-[#986d6d] px-7 py-3 text-xs font-semibold text-white transition hover:bg-[#805959]">
                    Ubah Password
                </button>

            </div>

        </form>

    </div>

</div>

@endsection