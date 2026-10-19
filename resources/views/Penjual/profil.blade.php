
@extends('layouts.penjual')

@section('title', 'Profil Toko')
@section('page-title', 'Profil Toko')

@section('content')
<div class="mx-auto max-w-5xl space-y-7">

    {{-- HEADER --}}
    <div>
        <h1 class="font-serif text-2xl font-bold text-[#4d4141]">
            Profil Toko
        </h1>
        <p class="mt-1 text-sm text-[#9a8888]">
            Informasi dan identitas toko Anda.
        </p>
    </div>

    {{-- IDENTITAS TOKO --}}
    <div class="overflow-hidden rounded-2xl border border-[#eadede] bg-white shadow-sm">

        <div class="bg-[#7B1F3A] px-7 py-8 sm:px-9">
            <div class="flex flex-col items-center gap-5 sm:flex-row">

               
{{-- FOTO PROFIL TOKO --}}
<div class="flex h-24 w-24 shrink-0 items-center justify-center overflow-hidden rounded-2xl border-4 border-white/30 bg-[#FAF5EE] shadow-md">
    <img
        src="{{ asset('images/logo lune attire.jpeg.jpeg') }}"
        alt="Foto Profil Lune Attiré"
        class="h-full w-full object-cover"
    >
</div>


                {{-- NAMA TOKO --}}
                <div class="text-center sm:text-left">
                    <p class="text-xs uppercase tracking-[0.25em] text-white/70">
                        Identitas Toko
                    </p>

                    <h2 class="mt-2 font-serif text-2xl font-bold text-white">
                        {{ $profile->store_name ?? 'Lune Attire' }}
                    </h2>

                    <p class="mt-2 text-sm text-white/80">
                        {{ $profile->category ?? 'Toko Fashion Wanita Premium' }}
                    </p>

                    <span class="mt-3 inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1 text-xs text-white">
                        <span class="h-2 w-2 rounded-full bg-green-300"></span>
                        Toko Aktif
                    </span>
                </div>

            </div>
        </div>

        {{-- INFORMASI TOKO --}}
        <div class="p-6 sm:p-8">

            <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="font-serif text-lg font-bold text-[#4d4141]">
                        Informasi Toko
                    </h3>
                    <p class="mt-1 text-sm text-[#9a8888]">
                        Informasi kontak dan identitas pemilik toko.
                    </p>
                </div>

                <a href="{{ route('penjual.profil.edit') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#7B1F3A] px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#64182F] focus:outline-none focus:ring-2 focus:ring-[#7B1F3A] focus:ring-offset-2">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">
                        <path d="M12 20h9"/>
                        <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L8 18l-4 1 1-4Z"/>
                    </svg>

                    Edit Profil
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                {{-- NAMA TOKO --}}
                <div class="rounded-xl border border-[#eadede] bg-[#FAF5EE]/70 p-5">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#f2e1e6] text-[#7B1F3A]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                 viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">
                                <path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/>
                                <path d="M9 9v.01M9 12v.01M9 15v.01M9 18v.01"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-medium text-[#9a8888]">Nama Toko</p>
                            <p class="mt-2 break-words font-semibold text-[#4d4141]">
                                {{ $profile->store_name ?? 'Lune Attire' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- NAMA PENJUAL --}}
                <div class="rounded-xl border border-[#eadede] bg-[#FAF5EE]/70 p-5">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#f2e1e6] text-[#7B1F3A]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                 viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="8" r="4"/>
                                <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-medium text-[#9a8888]">Nama Penjual</p>
                            <p class="mt-2 break-words font-semibold text-[#4d4141]">
                                {{ $profile->name ?? 'Amelia Rosyada' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- EMAIL --}}
                <div class="rounded-xl border border-[#eadede] bg-[#FAF5EE]/70 p-5">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#f2e1e6] text-[#7B1F3A]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                 viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="5" width="18" height="14" rx="2"/>
                                <path d="m3 7 9 6 9-6"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-medium text-[#9a8888]">Email</p>
                            <p class="mt-2 break-all font-semibold text-[#4d4141]">
                                {{ $profile->email ?? 'amelia@luneattire.com' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- NOMOR HP --}}
                <div class="rounded-xl border border-[#eadede] bg-[#FAF5EE]/70 p-5">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#f2e1e6] text-[#7B1F3A]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                 viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 11.19 18a19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.09 3.18 2 2 0 0 1 4.08 1h3a2 2 0 0 1 2 1.72c.12.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.11L8.06 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.84.58 2.8.7A2 2 0 0 1 22 16.92Z"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-medium text-[#9a8888]">Nomor HP</p>
                            <p class="mt-2 break-words font-semibold text-[#4d4141]">
                                {{ $profile->phone ?? '081234567890' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- ALAMAT TOKO --}}
                <div class="rounded-xl border border-[#eadede] bg-[#FAF5EE]/70 p-5 md:col-span-2">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#f2e1e6] text-[#7B1F3A]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                 viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">
                                <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/>
                                <circle cx="12" cy="10" r="2.5"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-medium text-[#9a8888]">Alamat Toko</p>
                            <p class="mt-2 break-words text-sm font-semibold leading-6 text-[#4d4141]">
                                {{ $profile->address ?? 'Jl. Batik Lama No. 88, Bandung, Jawa Barat 40115' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- DESKRIPSI --}}
                <div class="rounded-xl border border-[#eadede] bg-[#FAF5EE]/70 p-5 md:col-span-2">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#f2e1e6] text-[#7B1F3A]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                 viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">
                                <path d="M12 20h9"/>
                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L8 18l-4 1 1-4Z"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-medium text-[#9a8888]">Deskripsi Toko</p>
                            <p class="mt-2 text-sm leading-7 text-[#665858]">
                                {{ $profile->description ?? 'Lune Attire adalah toko fashion wanita yang menghadirkan koleksi busana modern berkualitas premium dengan harga terjangkau. Kami berkomitmen menghadirkan pilihan fashion terbaik untuk wanita Indonesia.' }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- FOOTER --}}
    <div class="rounded-xl border border-[#eadede] bg-white px-5 py-4">
        <p class="text-sm leading-6 text-[#9a8888]">
            Pastikan informasi toko selalu diperbarui agar pelanggan dapat
            mengenal dan menghubungi Lune Attire dengan mudah.
        </p>
    </div>

</div>
@endsection
