@extends('layouts.admin')

@section('title', 'Tambah Pengguna')
@section('page-title', 'Tambah Pengguna')

@section('content')

<div class="max-w-3xl">

    <div class="bg-white rounded-2xl border border-[#eee5e5] p-8">

        <div class="mb-6">

            <h1 class="text-2xl font-semibold">
                Tambah Pengguna
            </h1>

            <p class="text-sm text-gray-400 mt-1">
                Tambahkan akun baru ke sistem.
            </p>

        </div>


        @if($errors->any())

            <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4">

                <ul class="list-disc list-inside text-sm text-red-600">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('admin.pengguna.store') }}"
            method="POST"
            class="space-y-5"
        >

            @csrf

            <div>

                <label class="block text-sm font-medium mb-2">
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3"
                    required
                >

            </div>


            <div>

                <label class="block text-sm font-medium mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3"
                    required
                >

            </div>


            <div>

                <label class="block text-sm font-medium mb-2">
                    Role
                </label>

                <select
                    name="role"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3"
                    required
                >

                    <option value="">Pilih Role</option>

                    <option value="pelanggan">
                        Pelanggan
                    </option>

                    <option value="penjual">
                        Penjual
                    </option>

                    <option value="admin">
                        Admin
                    </option>

                </select>

            </div>


            <div>

                <label class="block text-sm font-medium mb-2">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3"
                    required
                >

            </div>


            <div>

                <label class="block text-sm font-medium mb-2">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3"
                    required
                >

            </div>


            <div class="flex gap-3 pt-4">

                <a
                    href="{{ route('admin.pengguna') }}"
                    class="rounded-xl bg-gray-100 px-5 py-3 text-sm"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-[#986d6d] px-5 py-3 text-sm text-white"
                >
                    Simpan Pengguna
                </button>

            </div>

        </form>

    </div>

</div>

@endsection