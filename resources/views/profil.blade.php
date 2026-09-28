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


            <!-- ========================= -->
            <!-- CARD PROFIL -->
            <!-- ========================= -->

            <div class="lg:col-span-2 bg-white rounded-2xl p-7">

                <!-- FOTO / IDENTITAS -->
                <div class="flex items-center gap-5 mb-8">

                    <!-- AVATAR -->
                    <div class="w-[72px] h-[72px]
                                rounded-full
                                bg-[#8b203d]
                                flex items-center justify-center
                                flex-shrink-0">

                        <span class="text-white text-3xl font-bold">
                            M
                        </span>

                    </div>


                    <!-- NAMA & EMAIL -->
                    <div>

                        <h2 class="text-xl font-bold text-[#332326]">
                            Mira Maulida M
                        </h2>

                        <p class="text-sm text-gray-400 mt-1">
                            miramaulidamulyani123@gmail.com
                        </p>

                    </div>

                </div>


                <!-- DATA NAMA -->
                <div class="border-b border-gray-300 py-3
                            flex justify-between items-center">

                    <span class="text-sm text-gray-400">
                        Nama Lengkap
                    </span>

                    <span class="text-sm font-semibold text-[#332326]">
                        Mira Maulida M
                    </span>

                </div>


                <!-- DATA EMAIL -->
                <div class="border-b border-gray-300 py-3
                            flex justify-between items-center">

                    <span class="text-sm text-gray-400">
                        Email
                    </span>

                    <span class="text-sm font-semibold text-[#332326]">
                        miramaulidamulyani123@gmail.com
                    </span>

                </div>


                <!-- DATA NOMOR HP -->
                <div class="border-b border-gray-300 py-3
                            flex justify-between items-center">

                    <span class="text-sm text-gray-400">
                        Nomor HP
                    </span>

                    <span class="text-sm font-semibold text-[#332326]">
                        08545545667
                    </span>

                </div>


                <!-- BUTTON EDIT -->
                <button
                    type="button"
                    onclick="document.getElementById('edit-profile').scrollIntoView({behavior: 'smooth'})"
                    class="mt-5
                           bg-[#8b203d]
                           text-white
                           px-6 py-2.5
                           rounded-lg
                           text-sm font-semibold
                           hover:bg-[#741a34]
                           transition"
                >
                    Edit Profil
                </button>

            </div>



            <!-- ========================= -->
            <!-- CARD EDIT PROFIL -->
            <!-- ========================= -->

            <div
                id="edit-profile"
                class="bg-white rounded-2xl p-7"
            >

                <h2 class="text-xl font-bold text-[#332326] mb-6">
                    Edit Profil
                </h2>


                <form action="#" method="POST">

                    @csrf


                    <!-- NAMA -->
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
                            value="Mira Maulida M"
                            class="w-full
                                   border border-[#e4d5d5]
                                   rounded-xl
                                   bg-[#fffafa]
                                   px-4 py-3
                                   text-sm
                                   text-gray-700
                                   outline-none
                                   focus:border-[#8b203d]
                                   focus:ring-1
                                   focus:ring-[#8b203d]"
                        >

                    </div>


                    <!-- NOMOR HP -->
                    <div class="mb-5">

                        <label
                            for="phone"
                            class="block text-xs text-gray-400 mb-2"
                        >
                            Nomor HP
                        </label>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            value="08545545667"
                            class="w-full
                                   border border-[#e4d5d5]
                                   rounded-xl
                                   bg-[#fffafa]
                                   px-4 py-3
                                   text-sm
                                   text-gray-700
                                   outline-none
                                   focus:border-[#8b203d]
                                   focus:ring-1
                                   focus:ring-[#8b203d]"
                        >

                    </div>


                    <!-- EMAIL -->
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
                            value="miramaulidamulyani123@gmail.com"
                            class="w-full
                                   border border-[#e4d5d5]
                                   rounded-xl
                                   bg-[#fffafa]
                                   px-4 py-3
                                   text-sm
                                   text-gray-700
                                   outline-none
                                   focus:border-[#8b203d]
                                   focus:ring-1
                                   focus:ring-[#8b203d]"
                        >

                    </div>


                    <!-- BUTTON -->
                    <div class="grid grid-cols-2 gap-4">

                        <a
                            href="/"
                            class="text-center
                                   border border-[#e4d5d5]
                                   bg-white
                                   text-gray-600
                                   py-3
                                   rounded-lg
                                   text-sm font-semibold
                                   hover:bg-gray-50
                                   transition"
                        >
                            Batal
                        </a>


                        <button
                            type="submit"
                            class="bg-[#8b203d]
                                   text-white
                                   py-3
                                   rounded-lg
                                   text-sm font-semibold
                                   hover:bg-[#741a34]
                                   transition"
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