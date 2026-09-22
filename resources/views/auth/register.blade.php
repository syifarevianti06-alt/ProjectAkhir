<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Daftar Akun - Lune Attiré</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

            <!-- LOGO -->
            <div class="text-center mb-8">

                <h1 class="text-3xl font-bold">
                    Lune Attiré
                </h1>

                <h2 class="text-xl font-semibold mt-6">
                    DAFTAR AKUN
                </h2>

                <p class="text-gray-500 mt-2">
                    Buat akun untuk mulai berbelanja
                </p>

            </div>


            <!-- FORM REGISTER -->
            <form action="#" method="POST">

                @csrf

                <!-- NAMA -->
                <div class="mb-5">

                    <label class="block text-sm font-medium mb-2">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="nama"
                        placeholder="Masukkan nama lengkap"
                        class="w-full border border-gray-300 rounded-lg
                               px-4 py-3
                               focus:outline-none
                               focus:ring-2
                               focus:ring-black"
                    >

                </div>


                <!-- EMAIL -->
                <div class="mb-5">

                    <label class="block text-sm font-medium mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="Masukkan email"
                        class="w-full border border-gray-300 rounded-lg
                               px-4 py-3
                               focus:outline-none
                               focus:ring-2
                               focus:ring-black"
                    >

                </div>


                <!-- PASSWORD -->
                <div class="mb-5">

                    <label class="block text-sm font-medium mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        class="w-full border border-gray-300 rounded-lg
                               px-4 py-3
                               focus:outline-none
                               focus:ring-2
                               focus:ring-black"
                    >

                </div>


                <!-- KONFIRMASI PASSWORD -->
                <div class="mb-6">

                    <label class="block text-sm font-medium mb-2">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        class="w-full border border-gray-300 rounded-lg
                               px-4 py-3
                               focus:outline-none
                               focus:ring-2
                               focus:ring-black"
                    >

                </div>


                <!-- TOMBOL -->
                <button
                    type="submit"
                    class="w-full bg-black text-white
                           py-3 rounded-lg
                           font-semibold
                           hover:bg-gray-800
                           transition">

                    DAFTAR

                </button>

            </form>


            <!-- LOGIN -->
            <p class="text-center text-sm text-gray-500 mt-6">

                Sudah punya akun?

                <a href="login.blade.php"
                   class="text-black font-semibold hover:underline">
                    Login
                </a>

            </p>

        </div>

    </div>

</body>
</html>