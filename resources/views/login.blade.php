<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lune Attiré - Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="m-0 min-h-screen">

    <div
        class="relative min-h-screen w-full bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/bege.jpeg') }}');">

        {{-- Overlay background --}}
        <div class="absolute inset-0 bg-black/35"></div>


        {{-- Container Login --}}
        <div class="relative z-10 flex min-h-screen items-center justify-center px-5 py-10">

            {{-- Card --}}
            <div
                class="w-full max-w-[460px]
                       rounded-[28px]
                       bg-[#faf8f8]/95
                       px-8 py-9
                       shadow-2xl
                       sm:px-11 sm:py-10">

                {{-- Logo / Judul --}}
                <div class="mb-8 text-center">

                    <h1 class="font-serif text-[30px] font-bold text-[#966767]">
                        Lune Attiré
                    </h1>

                    <p
                        class="mx-auto mt-3 max-w-[270px]
                               font-serif text-sm leading-[1.5]
                               text-[#966767]">
                        Masuk sekarang untuk
                        <br>
                        mencari style keren kamu
                    </p>

                </div>


                {{-- ERROR --}}
                @if ($errors->any())

                <div
                    class="mb-5 rounded-lg
                               bg-red-50
                               px-4 py-3
                               text-xs text-red-600">
                    {{ $errors->first() }}
                </div>

                @endif


                {{-- SUCCESS --}}
                @if (session('success'))

                <div
                    class="mb-5 rounded-lg
                               bg-green-50
                               px-4 py-3
                               text-xs text-green-600">
                    {{ session('success') }}
                </div>

                @endif


                {{-- FORM LOGIN --}}
                <form
                    action="{{ route('login.process') }}"
                    method="POST">

                    @csrf


                    {{-- EMAIL --}}
                    <div class="mb-5">

                        <label
                            for="email"
                            class="mb-2 block
                                   font-serif text-[13px]
                                   font-semibold text-[#966767]">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                            autofocus
                            class="block h-[46px] w-full
                                   rounded-[7px]
                                   border border-[#b88787]
                                   bg-white
                                   px-3.5
                                   text-sm text-[#4d4141]
                                   outline-none
                                   transition
                                   focus:border-[#966767]
                                   focus:ring-2
                                   focus:ring-[#966767]/10">

                    </div>


                    {{-- PASSWORD --}}
                    <div class="mb-2">

                        <label
                            for="password"
                            class="mb-2 block
                                   font-serif text-[13px]
                                   font-semibold text-[#966767]">
                            Kata Sandi
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            autocomplete="current-password"
                            required
                            class="block h-[46px] w-full
                                   rounded-[7px]
                                   border border-[#b88787]
                                   bg-white
                                   px-3.5
                                   text-sm text-[#4d4141]
                                   outline-none
                                   transition
                                   focus:border-[#966767]
                                   focus:ring-2
                                   focus:ring-[#966767]/10">

                    </div>


                    {{-- LUPA PASSWORD --}}
                    <div class="mb-5 text-right">

                        <a
                            href="#"
                            class="font-serif text-[11px]
                                   font-semibold text-[#966767]
                                   hover:underline">
                            Lupa password?
                        </a>

                    </div>


                    {{-- BUTTON LOGIN --}}
                    <button
                        type="submit"
                        class="h-[46px] w-full
                               rounded-[7px]
                               bg-[#a66b6b]
                               font-serif text-[13px]
                               font-bold text-white
                               transition
                               hover:bg-[#8e5959]">
                        MASUK SEKARANG
                    </button>

                </form>


                {{-- REGISTER --}}
                <div
                    class="mt-6 text-center
                           font-serif text-xs
                           text-[#966767]">

                    <span>
                        Belum punya akun?
                    </span>

                    <a
                        href="{{ route('register') }}"
                        class="font-bold text-[#966767]
                               hover:underline">
                        Register
                    </a>

                </div>

            </div>

        </div>

    </div>

</body>

</html>