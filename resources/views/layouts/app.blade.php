
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Lune Attiré' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#faf5ef] text-[#392727]">

    {{-- NAVBAR LUNE ATTIRÉ --}}
    <nav class="sticky top-0 z-50 border-t-[3px] border-[#8b5e5e]
                border-b border-[#eadbd2] bg-[#fffdfb]/95
                shadow-sm backdrop-blur-md">

        <div class="mx-auto max-w-[1400px] px-5 md:px-8">

            <div class="flex min-h-[82px] items-center
                        justify-between gap-5">

                {{-- LOGO --}}
                <a href="/"
                   class="group shrink-0">

                    <span class="block font-serif text-2xl
                                 font-bold tracking-wide
                                 text-[#75464a] transition duration-300
                                 group-hover:text-[#a66f70]">
                        Lune Attiré
                    </span>

                    <span class="mt-1 block text-[9px]
                                 tracking-[3px] text-[#a58b83]">
                        TIMELESS FASHION
                    </span>

                </a>

                {{-- MENU DESKTOP --}}
                <div class="hidden items-center gap-8
                            md:flex lg:gap-10">

                    <a href="/home"
                       class="group relative py-2 text-sm
                              font-medium text-[#655251]
                              transition duration-300
                              hover:text-[#955f60]">
                        Beranda

                        <span class="absolute bottom-0 left-0
                                     h-[2px] w-0 rounded-full
                                     bg-[#955f60] transition-all
                                     duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="/produk"
                       class="group relative py-2 text-sm
                              font-medium text-[#655251]
                              transition duration-300
                              hover:text-[#955f60]">
                        Produk

                        <span class="absolute bottom-0 left-0
                                     h-[2px] w-0 rounded-full
                                     bg-[#955f60] transition-all
                                     duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="/pesanan"
                       class="group relative py-2 text-sm
                              font-medium text-[#655251]
                              transition duration-300
                              hover:text-[#955f60]">
                        Pesanan

                        <span class="absolute bottom-0 left-0
                                     h-[2px] w-0 rounded-full
                                     bg-[#955f60] transition-all
                                     duration-300 group-hover:w-full"></span>
                    </a>

                </div>

                {{-- KERANJANG DAN PROFIL --}}
                <div class="flex shrink-0 items-center gap-5">

                    {{-- KERANJANG --}}
                    <a href="{{ route('cart.index') }}"
                       class="flex items-center gap-2 text-sm
                              font-medium text-[#655251]
                              transition duration-300
                              hover:text-[#955f60]">
                              

                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="20" height="20"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.7"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"/>
                            <circle cx="20" cy="21" r="1"/>
                            <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/>
                        </svg>

                        <span>Keranjang</span>
                    </a>

                    {{-- PROFIL JIKA SUDAH LOGIN --}}
                    @auth

                        <a href="{{ route('profil') }}"
                           class="inline-flex items-center gap-2
                                  rounded-full bg-[#955f60]
                                  px-5 py-2.5 text-sm font-semibold
                                  text-white shadow-sm
                                  transition duration-300
                                  hover:-translate-y-0.5
                                  hover:bg-[#7d4d4e] hover:shadow-md">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="17" height="17"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="1.7"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">
                                <circle cx="12" cy="8" r="4"/>
                                <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                            </svg>

                            Profil
                        </a>

                    @else

                        {{-- BELUM LOGIN: TETAP TAMPIL LOGIN --}}
                        <a href="{{ route('login') }}"
                           class="rounded-full bg-[#955f60]
                                  px-5 py-2.5 text-sm font-semibold
                                  text-white shadow-sm
                                  transition duration-300
                                  hover:-translate-y-0.5
                                  hover:bg-[#7d4d4e] hover:shadow-md">
                            Login
                        </a>

                    @endauth

                </div>

            </div>

            {{-- MENU MOBILE --}}
            <div class="flex items-center justify-center
                        gap-5 overflow-x-auto border-t
                        border-[#f0e5de] py-3 md:hidden">

                <a href="/home"
                   class="whitespace-nowrap text-xs font-medium
                          text-[#75464a] hover:text-[#a66f70]">
                    Beranda
                </a>

                <a href="/produk"
                   class="whitespace-nowrap text-xs font-medium
                          text-[#655251] hover:text-[#a66f70]">
                    Produk
                </a>

                <a href="/pesanan"
                   class="whitespace-nowrap text-xs font-medium
                          text-[#655251] hover:text-[#a66f70]">
                    Pesanan
                </a>

                <a href="{{ route('cart.index') }}"
                   class="whitespace-nowrap text-xs font-medium
                          text-[#655251] hover:text-[#a66f70]">
                    Keranjang
                </a>

                @auth
                    <a href="{{ route('profil') }}"
                       class="whitespace-nowrap text-xs font-medium
                              text-[#75464a] hover:text-[#a66f70]">
                        Profil
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="whitespace-nowrap text-xs font-medium
                              text-[#75464a] hover:text-[#a66f70]">
                        Login
                    </a>
                @endauth

            </div>

        </div>

    </nav>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="mt-16 border-t border-[#eadbd2]
                   bg-[#f1e7df]">

        <div class="mx-auto max-w-[1400px] px-6 py-10
                    text-center">

            <h2 class="font-serif text-2xl font-bold
                       tracking-wide text-[#75464a]">
                Lune Attiré
            </h2>

            <div class="mx-auto my-4 flex items-center
                        justify-center gap-3">
                <span class="h-px w-10 bg-[#c9a6a0]"></span>
                <span class="text-sm text-[#a47b78]">✦</span>
                <span class="h-px w-10 bg-[#c9a6a0]"></span>
            </div>

            <p class="font-serif text-sm text-[#806b65]">
                Fashion pilihan untuk gaya setiap harimu.
            </p>

            <p class="mt-6 text-xs tracking-wide
                      text-[#9b8580]">
                © 2026 Lune Attiré Official Store
            </p>

        </div>

    </footer>

</body>
</html>
