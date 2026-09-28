@extends('layouts.app')

@section('content')

<div
    class="relative min-h-[calc(100vh-80px)]
           bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('images/bege.jpeg') }}');"
>

    {{-- OVERLAY BACKGROUND --}}
    <div class="absolute inset-0 bg-black/40"></div>


    {{-- LOGIN --}}
    <div
        class="relative z-10 flex min-h-[calc(100vh-80px)]
               items-center justify-center
               px-5 py-12"
    >

        {{-- CARD LOGIN --}}
        <div
            class="w-full max-w-[430px]
                   rounded-[28px]
                   bg-[#f8f7f7]/95
                   px-8 py-9
                   shadow-2xl
                   sm:px-11 sm:py-10"
        >

            {{-- LOGO / NAMA --}}
            <div class="mb-8 text-center">

                <h1
                    class="font-serif text-2xl
                           font-bold text-[#966767]"
                >
                    Lune Attiré
                </h1>

                <p
                    class="mx-auto mt-3 max-w-[260px]
                           font-serif text-sm
                           leading-5 text-[#966767]"
                >
                    Masuk sekarang untuk
                    <br>
                    mencari style keren kamu
                </p>

            </div>


            {{-- FORM LOGIN --}}
            <form action="#" method="POST">

                @csrf


                {{-- EMAIL --}}
                <div class="mb-5">

                    <label
                        for="email"
                        class="mb-2 block
                               font-serif text-xs
                               font-semibold text-[#966767]"
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder=""
                        required
                        class="h-[43px] w-full
                               rounded-md
                               border border-[#b88787]
                               bg-[#fafafa]
                               px-3
                               text-sm text-[#4d4141]
                               outline-none
                               transition
                               focus:border-[#966767]
                               focus:ring-1
                               focus:ring-[#966767]/30"
                    >

                </div>


                {{-- PASSWORD --}}
                <div class="mb-2">

                    <label
                        for="password"
                        class="mb-2 block
                               font-serif text-xs
                               font-semibold text-[#966767]"
                    >
                        Kata Sandi
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder=""
                        required
                        class="h-[43px] w-full
                               rounded-md
                               border border-[#b88787]
                               bg-[#fafafa]
                               px-3
                               text-sm text-[#4d4141]
                               outline-none
                               transition
                               focus:border-[#966767]
                               focus:ring-1
                               focus:ring-[#966767]/30"
                    >

                </div>


                {{-- LUPA PASSWORD --}}
                <div class="mb-5 text-right">

                    <a
                        href="#"
                        class="font-serif text-[10px]
                               font-semibold text-[#966767]
                               hover:underline"
                    >
                        Lupa password?
                    </a>

                </div>


                {{-- BUTTON --}}
                <button
                    type="submit"
                    class="h-[42px] w-full
                           rounded-md
                           bg-[#a66b6b]
                           font-serif text-xs
                           font-bold text-white
                           transition
                           hover:bg-[#8e5959]"
                >
                    MASUK SEKARANG
                </button>

            </form>


            {{-- REGISTER --}}
            <div
                class="mt-6 text-center
                       font-serif text-[11px]"
            >

                <span class="text-[#966767]">
                    Belum punya akun?
                </span>

                <a
                    href="/register"
                    class="font-bold text-[#966767]
                           hover:underline"
                >
                    Register
                </a>

            </div>

        </div>

    </div>

</div>

@endsection