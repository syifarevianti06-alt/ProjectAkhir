<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lune Attiré - Register</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="m-0 min-h-screen">

    <div
        class="relative min-h-screen w-full bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/bege.jpeg') }}');">

        // OVERLAY BACKGROUND
        <div class="absolute inset-0 bg-black/35"></div>


        // Container Register
        <div class="relative z-10 flex min-h-screen items-center justify-center px-5 py-10">

            // Card
            <div
                class="w-full max-w-[460px]
                       rounded-[28px]
                       bg-[#faf8f8]/95
                       px-8 py-9
                       shadow-2xl
                       sm:px-11 sm:py-10">

                // Logo / Judul
                <div class="mb-8 text-center">

                    <h1 class="font-serif text-[30px] font-bold text-[#966767]">
                        Lune Attiré
                    </h1>

                    <p
                        class="mx-auto mt-3 max-w-[270px]
                               font-serif text-sm leading-[1.5]
                               text-[#966767]">
                        Daftar sekarang untuk
                        <br>
                        mulai menemukan style kamu
                    </p>

                </div>


                // Error
                @if ($errors->any())

                <div
                    class="mb-5 rounded-lg
                               bg-red-50
                               px-4 py-3
                               text-xs text-red-600">
                    {{ $errors->first() }}
                </div>

                @endif


                // SUCCESS
                @if (session('success'))

                <div
                    class="mb-5 rounded-lg
                               bg-green-50
                               px-4 py-3
                               text-xs text-green-600">
                    {{ session('success') }}
                </div>

                @endif


                // FORM REGISTER
                <form
                    action="{{ route('register.process') }}"
                    method="POST">

                    @csrf


                    // NAMA
                    <div class="mb-5">

                        <label
                            for="name"
                            class="mb-2 block
                                   font-serif text-[13px]
                                   font-semibold text-[#966767]">
                            Nama
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            autocomplete="name"
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


                    // EMAIL
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


                    // PASSWORD
                    <div class="mb-5">

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
                            autocomplete="new-password"
                            required
                            minlength="8"
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

                        <p
                            class="mt-1.5 font-serif text-[10px]
                                   text-[#a28f8f]">
                            Minimal 8 karakter
                        </p>

                    </div>


                    // KONFIRMASI PADSSWORD
                    <div class="mb-5">

                        <label
                            for="password_confirmation"
                            class="mb-2 block
                                   font-serif text-[13px]
                                   font-semibold text-[#966767]">
                            Konfirmasi Kata Sandi
                        </label>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            autocomplete="new-password"
                            required
                            minlength="8"
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


                    // BUTTON
                    <button
                        type="submit"
                        class="h-[46px] w-full
                               rounded-[7px]
                               bg-[#a66b6b]
                               font-serif text-[13px]
                               font-bold text-white
                               transition
                               hover:bg-[#8e5959]">
                        DAFTAR SEKARANG
                    </button>

                </form>


                // LOGIN
                <div
                    class="mt-6 text-center
                           font-serif text-xs
                           text-[#966767]">

                    <span>
                        Sudah punya akun?
                    </span>

                    <a
                        href="{{ route('login') }}"
                        class="font-bold text-[#966767]
                               hover:underline">
                        Login
                    </a>

                </div>

            </div>

        </div>

    </div>

</body>

</html>