<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - Lune Attiré</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-100 min-h-screen">


    <div class="min-h-screen flex items-center justify-center px-4">


        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">


            <!-- LOGO -->

            <div class="text-center mb-8">

                <h1 class="text-4xl font-bold">
                    Lune Attiré
                </h1>

                <p class="text-gray-500 mt-3">
                    Masuk sekarang untuk
                    <br>
                    mencari style keren kamu
                </p>

            </div>


            <!-- FORM LOGIN -->

            <form action="#" method="POST">

                @csrf


                <!-- EMAIL -->

                <div class="mb-5">

                    <label class="block text-sm font-medium mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="Masukkan email"
                        class="w-full border border-gray-300
                               rounded-lg px-4 py-3
                               focus:outline-none
                               focus:ring-2
                               focus:ring-black"
                    >

                </div>


                <!-- PASSWORD -->

                <div class="mb-3">

                    <label class="block text-sm font-medium mb-2">
                        Kata Sandi
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan kata sandi"
                        class="w-full border border-gray-300
                               rounded-lg px-4 py-3
                               focus:outline-none
                               focus:ring-2
                               focus:ring-black"
                    >

                </div>


                <!-- LUPA PASSWORD -->

                <div class="text-right mb-6">

                    <a href="#"
                       class="text-sm text-gray-600 hover:text-black">

                        Lupa password?

                    </a>

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="w-full bg-black
                           text-white
                           py-3
                           rounded-lg
                           font-semibold
                           hover:bg-gray-800
                           transition">

                    MASUK SEKARANG

                </button>


            </form>


            <!-- REGISTER -->

            <p class="text-center text-sm text-gray-500 mt-6">

                Belum punya akun?

                <a href="/register"
                   class="font-semibold text-black hover:underline">

                    Register

                </a>

            </p>


        </div>

    </div>


</body>

</html>