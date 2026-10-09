@extends('layouts.admin')

@section('title', 'Pengguna - Lune Attiré')
@section('page-title', 'Pengguna')

@section('content')

<div class="space-y-7">


    // HEADER

    <div class="flex items-end justify-between">

        <div>
            <p class="text-[11px] uppercase tracking-[0.18em] text-[#B29A9A] mb-2">
                Management
            </p>

            <h1 class="text-[28px] font-semibold text-[#604B4B]">
                Pengguna
            </h1>

            <p class="text-sm text-[#A58E8E] mt-1">
                Kelola seluruh pengguna Lune Attiré.
            </p>
        </div>


        <a
            href="{{ route('admin.pengguna.create') }}"
            class="inline-flex items-center gap-2
            bg-[#986D6D] hover:bg-[#845B5B]
            text-white text-sm font-medium
            px-5 py-3 rounded-xl
            transition duration-200">
            <span class="text-lg leading-none">+</span>
            Tambah Pengguna
        </a>

    </div>


    // SUCCESS MESSAGE
    @if(session('success'))

    <div class="flex items-center gap-3
            bg-[#F2F8F3]
            border border-[#DCEBDD]
            text-[#65856B]
            rounded-xl px-5 py-4 text-sm">

        <div class="w-7 h-7 rounded-full bg-white flex items-center justify-center">
            ✓
        </div>

        <span>
            {{ session('success') }}
        </span>

    </div>

    @endif



    // STATISTICS
    <div class="grid grid-cols-4 gap-5">

        //TOTAL
        <div class="bg-white rounded-2xl border border-[#EDE4E4] p-5">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs text-[#B29A9A]">
                        Total Pengguna
                    </p>

                    <p class="text-[28px] font-semibold text-[#7F5555] mt-3">
                        {{ $totalPengguna }}
                    </p>

                </div>

                <div class="w-10 h-10 rounded-xl bg-[#F8EEEE]
                    flex items-center justify-center text-[#986D6D]">
                    ♙
                </div>

            </div>

        </div>


        //PELANGGAN
        <div class="bg-white rounded-2xl border border-[#EDE4E4] p-5">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs text-[#B29A9A]">
                        Pelanggan
                    </p>

                    <p class="text-[28px] font-semibold text-[#7F5555] mt-3">
                        {{ $totalPelanggan }}
                    </p>

                </div>

                <div class="w-10 h-10 rounded-xl bg-[#F8EEEE]
                    flex items-center justify-center text-[#986D6D]">
                    ♡
                </div>

            </div>

        </div>


        // PENJUAL
        <div class="bg-white rounded-2xl border border-[#EDE4E4] p-5">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs text-[#B29A9A]">
                        Penjual
                    </p>

                    <p class="text-[28px] font-semibold text-[#7F5555] mt-3">
                        {{ $totalPenjual }}
                    </p>

                </div>

                <div class="w-10 h-10 rounded-xl bg-[#F8EEEE]
                    flex items-center justify-center text-[#986D6D]">
                    ◇
                </div>

            </div>

        </div>


        // ADMIN
        <div class="bg-white rounded-2xl border border-[#EDE4E4] p-5">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs text-[#B29A9A]">
                        Admin
                    </p>

                    <p class="text-[28px] font-semibold text-[#7F5555] mt-3">
                        {{ $totalAdmin }}
                    </p>

                </div>

                <div class="w-10 h-10 rounded-xl bg-[#F8EEEE]
                    flex items-center justify-center text-[#986D6D]">
                    ✦
                </div>

            </div>

        </div>

    </div>


    //SEARCH + FILTER
    <div class="bg-white rounded-2xl border border-[#EDE4E4] p-5">

        <form
            action="{{ route('admin.pengguna') }}"
            method="GET"
            class="flex items-center gap-3">

            //SEARCH
            <div class="relative flex-1">

                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#B29A9A]">
                    ⌕
                </span>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama atau email..."
                    class="w-full
                    bg-[#FCFAFA]
                    border border-[#EDE4E4]
                    rounded-xl
                    pl-11 pr-4 py-3
                    text-sm text-[#604B4B]
                    placeholder:text-[#B9A7A7]
                    focus:outline-none
                    focus:border-[#C9AAAA]
                    focus:ring-2
                    focus:ring-[#F3E4E4]">

            </div>


            //ROLE
            <select
                name="role"
                class="w-44
                bg-[#FCFAFA]
                border border-[#EDE4E4]
                rounded-xl
                px-4 py-3
                text-sm text-[#806F6F]
                focus:outline-none
                focus:border-[#C9AAAA]">

                <option value="">
                    Semua Role
                </option>

                <option
                    value="pelanggan"
                    {{ request('role') === 'pelanggan' ? 'selected' : '' }}>
                    Pelanggan
                </option>

                <option
                    value="penjual"
                    {{ request('role') === 'penjual' ? 'selected' : '' }}>
                    Penjual
                </option>

                <option
                    value="admin"
                    {{ request('role') === 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

            </select>


            //BUTTON
            <button
                type="submit"
                class="bg-[#986D6D]
                hover:bg-[#845B5B]
                text-white
                px-5 py-3
                rounded-xl
                text-sm font-medium
                transition">
                Cari
            </button>

        </form>

    </div>


    // TABLE
    <div class="bg-white rounded-2xl border border-[#EDE4E4] overflow-hidden">

        // TABLE HEADER
        <div class="px-6 py-5 border-b border-[#F0E8E8]">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="text-[16px] font-semibold text-[#604B4B]">
                        Daftar Pengguna
                    </h2>

                    <p class="text-xs text-[#B29A9A] mt-1">
                        Data akun yang terdaftar di sistem.
                    </p>

                </div>

                <div class="text-xs text-[#B29A9A]">
                    {{ $users->total() }} pengguna
                </div>

            </div>

        </div>


        // TABLE
        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-[#FCFAFA] border-b border-[#F0E8E8]">

                        <th class="text-left px-6 py-4
                            text-[11px] uppercase tracking-wider
                            font-semibold text-[#A58E8E]">
                            Nama
                        </th>

                        <th class="text-left px-6 py-4
                            text-[11px] uppercase tracking-wider
                            font-semibold text-[#A58E8E]">
                            Email
                        </th>

                        <th class="text-left px-6 py-4
                            text-[11px] uppercase tracking-wider
                            font-semibold text-[#A58E8E]">
                            Role
                        </th>

                        <th class="text-left px-6 py-4
                            text-[11px] uppercase tracking-wider
                            font-semibold text-[#A58E8E]">
                            Terdaftar
                        </th>

                        <th class="text-right px-6 py-4
                            text-[11px] uppercase tracking-wider
                            font-semibold text-[#A58E8E]">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-[#F3EEEE]">

                    @forelse($users as $user)

                    <tr class="hover:bg-[#FFFCFC] transition">


                        // NAMA
                        <td class="px-6 py-5">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-full
                                        bg-[#F3E4E4]
                                        text-[#986D6D]
                                        flex items-center justify-center
                                        text-sm font-semibold">

                                    {{ strtoupper(substr($user->name, 0, 1)) }}

                                </div>

                                <div>

                                    <p class="text-sm font-medium text-[#604B4B]">
                                        {{ $user->name }}
                                    </p>

                                    <p class="text-[11px] text-[#B29A9A]">
                                        ID #{{ $user->id }}
                                    </p>

                                </div>

                            </div>

                        </td>


                        {{-- EMAIL --}}
                        <td class="px-6 py-5">

                            <p class="text-sm text-[#806F6F]">
                                {{ $user->email }}
                            </p>

                        </td>


                        {{-- ROLE --}}
                        <td class="px-6 py-5">

                            @if($user->role === 'admin')

                            <span class="inline-flex items-center
                                        rounded-full
                                        bg-[#F3E4E4]
                                        text-[#986D6D]
                                        px-3 py-1.5
                                        text-xs font-medium">
                                Admin
                            </span>

                            @elseif($user->role === 'penjual')

                            <span class="inline-flex items-center
                                        rounded-full
                                        bg-[#F1ECE8]
                                        text-[#8D7566]
                                        px-3 py-1.5
                                        text-xs font-medium">
                                Penjual
                            </span>

                            @else

                            <span class="inline-flex items-center
                                        rounded-full
                                        bg-[#F4F0F0]
                                        text-[#806F6F]
                                        px-3 py-1.5
                                        text-xs font-medium">
                                Pelanggan
                            </span>

                            @endif

                        </td>


                        // TANGGAL
                        <td class="px-6 py-5">

                            <p class="text-sm text-[#806F6F]">
                                {{ $user->created_at?->format('d M Y') }}
                            </p>

                            <p class="text-[11px] text-[#B29A9A] mt-1">
                                {{ $user->created_at?->format('H:i') }}
                            </p>

                        </td>


                        // AKSI
                        <td class="px-6 py-5">

                            <div class="flex items-center justify-end gap-2">

                                // EDIT
                                <a
                                    href="{{ route('admin.pengguna.edit', $user) }}"
                                    class="w-9 h-9 rounded-lg
                                        bg-[#F7F1F1]
                                        text-[#986D6D]
                                        flex items-center justify-center
                                        hover:bg-[#F0E3E3]
                                        transition"
                                    title="Edit">
                                    ✎
                                </a>


                                // DELETE
                                <form
                                    action="{{ route('admin.pengguna.destroy', $user) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="w-9 h-9 rounded-lg
                                            bg-[#FFF3F3]
                                            text-[#B87878]
                                            flex items-center justify-center
                                            hover:bg-[#FCE5E5]
                                            transition"
                                        title="Hapus">
                                        ×
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td
                            colspan="5"
                            class="px-6 py-16 text-center">

                            <div class="flex flex-col items-center">

                                <div class="w-14 h-14 rounded-full
                                        bg-[#F8EEEE]
                                        text-[#A58E8E]
                                        flex items-center justify-center
                                        text-xl mb-3">
                                    ♙
                                </div>

                                <p class="text-sm font-medium text-[#806F6F]">
                                    Belum ada pengguna
                                </p>

                                <p class="text-xs text-[#B29A9A] mt-1">
                                    Data pengguna akan muncul di sini.
                                </p>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        // PAGINATION

        @if($users->hasPages())

        <div class="px-6 py-5 border-t border-[#F0E8E8]">

            {{ $users->links() }}

        </div>

        @endif

    </div>

</div>

@endsection