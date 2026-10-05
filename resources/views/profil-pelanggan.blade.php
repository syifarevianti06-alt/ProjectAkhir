@extends('layouts.app')

@section('content')

<div class="min-h-[calc(100vh-80px)] bg-[#f8f1eb]">

    <div class="max-w-6xl mx-auto px-6 py-12">

        <!-- JUDUL -->
        <h1 class="text-3xl font-bold text-[#332326] mb-8">
            Profil Saya
        </h1>


        <!-- CONTENT -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">


            {{-- ========================= --}}
{{-- CARD PROFIL --}}
{{-- ========================= --}}

<div class="lg:col-span-2 bg-white rounded-2xl p-7">

    {{-- FOTO / IDENTITAS --}}
    <div class="flex items-center gap-5 mb-8">

        {{-- AVATAR --}}
        <div
            class="w-[72px] h-[72px]
                   rounded-full
                   bg-[#8b203d]
                   flex items-center justify-center
                   flex-shrink-0"
        >
            <span class="text-white text-3xl font-bold">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </span>
        </div>

        {{-- NAMA & EMAIL ASLI --}}
        <div>
            <h2 class="text-xl font-bold text-[#332326]">
                {{ $user->name }}
            </h2>

            <p class="text-sm text-gray-400 mt-1">
                {{ $user->email }}
            </p>
        </div>

    </div>


    {{-- NAMA LENGKAP --}}
    <div
        class="border-b border-gray-300 py-4
               flex justify-between items-center"
    >
        <span class="text-sm text-gray-400">
            Nama Lengkap
        </span>

        <span class="text-sm font-semibold text-[#332326]">
            {{ $user->name }}
        </span>
    </div>


    {{-- EMAIL --}}
    <div
        class="border-b border-gray-300 py-4
               flex justify-between items-center"
    >
        <span class="text-sm text-gray-400">
            Email
        </span>

        <span class="text-sm font-semibold text-[#332326]">
            {{ $user->email }}
        </span>
    </div>


    {{-- ROLE --}}
    <div
        class="border-b border-gray-300 py-4
               flex justify-between items-center"
    >
        <span class="text-sm text-gray-400">
            Role
        </span>

        <span class="text-sm font-semibold text-[#332326] capitalize">
            {{ $user->role }}
        </span>
    </div>




</div>

            <!-- ========================= -->
            <!-- CARD EDIT PROFIL -->
            <!-- ========================= -->

            <div
                id="edit-profile"
                class="bg-white rounded-2xl p-7">

                <h2 class="text-xl font-bold text-[#332326] mb-6">
                    Edit Profil
                </h2>


                <form action="{{ route('profil.update') }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-5">
        <label
            for="name"
            class="block text-xs text-gray-400 mb-2"
        >
            Nama Lengkap
        </label>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $user->name) }}"
            required
            class="w-full border border-[#e4d5d5]
                   rounded-xl bg-[#fffafa]
                   px-4 py-3 text-sm text-gray-700
                   outline-none focus:border-[#8b203d]"
        >
    </div>

    <div class="mb-6">
        <label
            for="email"
            class="block text-xs text-gray-400 mb-2"
        >
            Email
        </label>

        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            required
            class="w-full border border-[#e4d5d5]
                   rounded-xl bg-[#fffafa]
                   px-4 py-3 text-sm text-gray-700
                   outline-none focus:border-[#8b203d]"
        >
    </div>

    <div class="grid grid-cols-2 gap-4">

        <a
            href="{{ route('home') }}"
            class="text-center border border-[#e4d5d5]
                   bg-white text-gray-600 py-3 rounded-lg
                   text-sm font-semibold"
        >
            Batal
        </a>

        <button
            type="submit"
            class="bg-[#8b203d] text-white py-3
                   rounded-lg text-sm font-semibold
                   hover:bg-[#741a34]"
        >
            Simpan
        </button>

    </div>

</form>

            </div>

        </div>

    </div>

</div>

@endsection