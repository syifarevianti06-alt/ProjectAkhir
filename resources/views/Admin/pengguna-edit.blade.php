@extends('layouts.admin')

@section('title', 'Edit Pengguna')
@section('page-title', 'Edit Pengguna')

@section('content')

<div class="max-w-3xl">

    <div class="bg-white rounded-2xl border border-[#eee5e5] p-8">

        <div class="mb-6">

            <h1 class="text-2xl font-semibold">
                Edit Pengguna
            </h1>

            <p class="text-sm text-gray-400 mt-1">
                Perbarui data pengguna.
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
            action="{{ route('admin.pengguna.update', $user) }}"
            method="POST"
            class="space-y-5"
        >

            @csrf
            @method('PUT')

            <div>

                <label class="block text-sm font-medium mb-2">
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
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
                    value="{{ old('email', $user->email) }}"
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

                    <option
                        value="pelanggan"
                        {{ old('role', $user->role) == 'pelanggan' ? 'selected' : '' }}
                    >
                        Pelanggan
                    </option>

                    <option
                        value="penjual"
                        {{ old('role', $user->role) == 'penjual' ? 'selected' : '' }}
                    >
                        Penjual
                    </option>

                    <option
                        value="admin"
                        {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}
                    >
                        Admin
                    </option>

                </select>

            </div>


            <div>

                <label class="block text-sm font-medium mb-2">
                    Password Baru
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3"
                >

                <p class="text-xs text-gray-400 mt-1">
                    Kosongkan jika tidak ingin mengubah password.
                </p>

            </div>


            <div>

                <label class="block text-sm font-medium mb-2">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3"
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
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection