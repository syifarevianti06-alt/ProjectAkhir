@extends('layouts.app')

@section('content')

<div
    class="relative min-h-[calc(100vh-80px)]
           bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('images/bege.jpeg') }}');"
>

    {{-- OVERLAY FOTO --}}
    <div class="absolute inset-0 bg-black/40"></div>


    {{-- REGISTER CONTAINER --}}
    <div
        class="relative z-10 flex min-h-[calc(100vh-80px)]
               items-center justify-center
               px-5 py-10"
    >

        {{-- CARD REGISTER --}}
        <div
            class="w-full max-w-[390px]
                   rounded-[28px]
                   bg-[#f5f5f5]/95
                   px-8 py-8
                   shadow-2xl
                   sm:px-10"
        >

            {{-- JUDUL --}}
            <div class="mb-6 text-center">

                <h1
                    class="font-serif text-2xl
                           font-bold text-[#8f5c5c]"
                >
                    DAFTAR AKUN
                </h1>

                <p
                    class="mt-3 font-serif text-sm
                           text-[#8f5c5c]"
                >
                    Buat akun untuk mulai berbelanja
                </p>

            </div>


            {{-- FORM --}}
            <form action="#" method="POST">

                @csrf


                {{-- NAMA LENGKAP --}}
                <div class="mb-4">

                    <label
                        for="name"
                        class="mb-1.5 block
                               font-serif text-sm
                               font-bold text-[#8f5c5c]"
                    >
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        required
                        class="h-[38px] w-full
                               rounded-md
                               border border-[#ad7b7b]
                               bg-[#fafafa]
                               px-3
                               text-sm
                               outline-none
                               focus:border-[#8f5c5c]
                               focus:ring-1
                               focus:ring-[#8f5c5c]/30"
                    >

                </div>


                {{-- EMAIL --}}
                <div class="mb-4">

                    <label
                        for="email"
                        class="mb-1.5 block
                               font-serif text-sm
                               font-bold text-[#8f5c5c]"
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        class="h-[38px] w-full
                               rounded-md
                               border border-[#ad7b7b]
                               bg-[#fafafa]
                               px-3
                               text-sm
                               outline-none
                               focus:border-[#8f5c5c]
                               focus:ring-1
                               focus:ring-[#8f5c5c]/30"
                    >

                </div>


                {{-- PASSWORD --}}
                <div class="mb-4">

                    <label
                        for="password"
                        class="mb-1.5 block
                               font-serif text-sm
                               font-bold text-[#8f5c5c]"
                    >
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="h-[38px] w-full
                               rounded-md
                               border border-[#ad7b7b]
                               bg-[#fafafa]
                               px-3
                               text-sm
                               outline-none
                               focus:border-[#8f5c5c]
                               focus:ring-1
                               focus:ring-[#8f5c5c]/30"
                    >

                </div>


                {{-- KONFIRMASI PASSWORD --}}
                <div class="mb-5">

                    <label
                        for="password_confirmation"
                        class="mb-1.5 block
                               font-serif text-sm
                               font-bold text-[#8f5c5c]"
                    >
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        class="h-[38px] w-full
                               rounded-md
                               border border-[#ad7b7b]
                               bg-[#fafafa]
                               px-3
                               text-sm
                               outline-none
                               focus:border-[#8f5c5c]
                               focus:ring-1
                               focus:ring-[#8f5c5c]/30"
                    >

                </div>


                {{-- BUTTON DAFTAR --}}
                <button
                    type="submit"
                    class="h-[42px] w-full
                           rounded-md
                           bg-[#a46868]
                           font-serif text-base
                           font-bold text-white
                           transition
                           hover:bg-[#895555]"
                >
                    DAFTAR
                </button>

            </form>


            {{-- LOGIN --}}
            <div
                class="mt-4 text-center
                       font-serif text-xs"
            >

                <span class="font-semibold text-[#252020]">
                    Sudah punya akun?
                </span>

                <a
                    href="/login"
                    class="font-bold text-[#252020]
                           hover:underline"
                >
                    Login
                </a>

            </div>

        </div>

    </div>

</div>

@endsection