@extends('layout.penjual')

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
                    Lune Attiré
                </h2>

                <p class="mt-1 text-xs text-[#a28f8f]">
                    Toko Fashion Wanita
                </p>

                <span class="mt-3 inline-block rounded-full bg-green-50 px-3 py-1 text-[10px] text-green-600">
                    Toko Aktif
                </span>

            </div>

        </div>

    </div>


    {{-- FORM INFORMASI --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-7 shadow-sm">

        <h2 class="font-serif text-lg font-semibold text-[#4d4141]">
            Informasi Toko
        </h2>

        <p class="mt-1 text-xs text-[#a28f8f]">
            Informasi yang akan ditampilkan kepada pelanggan.
        </p>


        <div class="mt-6 grid gap-5 md:grid-cols-2">

            {{-- NAMA TOKO --}}
            <div>

                <label class="mb-2 block text-xs font-semibold text-[#665858]">
                    Nama Toko
                </label>

                <input
                    type="text"
                    value="Lune Attiré"
                    class="h-11 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]"
                >

            </div>


            {{-- EMAIL --}}
            <div>

                <label class="mb-2 block text-xs font-semibold text-[#665858]">
                    Email
                </label>

                <input
                    type="email"
                    value="luneattire@gmail.com"
                    class="h-11 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]"
                >

            </div>


            {{-- TELEPON --}}
            <div>

                <label class="mb-2 block text-xs font-semibold text-[#665858]">
                    Nomor Telepon
                </label>

                <input
                    type="text"
                    value="0812-3456-7890"
                    class="h-11 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]"
                >

            </div>


            {{-- KATEGORI --}}
            <div>

                <label class="mb-2 block text-xs font-semibold text-[#665858]">
                    Kategori Toko
                </label>

                <select
                    class="h-11 w-full rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]"
                >
                    <option>Fashion Wanita</option>
                    <option>Fashion Pria</option>
                    <option>Aksesoris</option>
                </select>

            </div>


            {{-- ALAMAT --}}
            <div class="md:col-span-2">

                <label class="mb-2 block text-xs font-semibold text-[#665858]">
                    Alamat Toko
                </label>

                <textarea
                    rows="4"
                    class="w-full resize-none rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 py-3 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]"
                >Jl. Fashion No. 10, Sumedang, Jawa Barat</textarea>

            </div>


            {{-- DESKRIPSI --}}
            <div class="md:col-span-2">

                <label class="mb-2 block text-xs font-semibold text-[#665858]">
                    Deskripsi Toko
                </label>

                <textarea
                    rows="5"
                    class="w-full resize-none rounded-lg border border-[#eadede] bg-[#fcf9f9] px-4 py-3 text-sm text-[#4d4141] outline-none focus:border-[#986d6d]"
                >Lune Attiré menyediakan berbagai pilihan fashion wanita dengan gaya modern, nyaman, dan elegan.</textarea>

            </div>

        </div>


        {{-- BUTTON --}}
        <div class="mt-7 flex justify-end">

            <button
                type="button"
                class="rounded-lg bg-[#986d6d] px-7 py-3 text-xs font-semibold text-white transition hover:bg-[#805959]"
            >
                Simpan Perubahan
            </button>

        </div>

    </div>


    {{-- AKUN --}}
    <div class="rounded-2xl border border-[#eadede] bg-white p-7 shadow-sm">

        <h2 class="font-serif text-lg font-semibold text-[#4d4141]">
            Keamanan Akun
        </h2>

        <p class="mt-1 text-xs text-[#a28f8f]">
            Kelola informasi login akun penjual.
        </p>


        <div class="mt-6 flex items-center justify-between rounded-xl bg-[#fcf8f8] p-5">

            <div>

                <p class="text-xs font-semibold text-[#4d4141]">
                    Kata Sandi
                </p>

                <p class="mt-1 text-[10px] text-[#a28f8f]">
                    Terakhir diperbarui beberapa waktu lalu
                </p>

            </div>

            <button
                type="button"
                class="rounded-lg border border-[#decaca] px-4 py-2 text-[10px] font-semibold text-[#986d6d] hover:bg-[#f8eeee]"
            >
                Ubah Password
            </button>

        </div>

    </div>

</div>

@endsection