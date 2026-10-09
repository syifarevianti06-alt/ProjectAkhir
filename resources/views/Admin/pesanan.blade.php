@extends('layouts.admin')

@section('title', 'Pesanan - Lune Attiré')
@section('page-title', 'Pesanan')

@section('content')

<div class="space-y-7">

    {{-- HEADER --}}
    <div>

        <p class="text-[11px] uppercase tracking-[0.16em] text-[#A28B83]">
            Order Management
        </p>

        <h1 class="text-2xl font-semibold text-[#493535] mt-1">
            Pesanan
        </h1>

        <p class="text-sm text-[#A28B83] mt-1">
            Kelola seluruh pesanan pelanggan Lune Attiré.
        </p>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="bg-[#F1E8E3]
            border border-[#E1D0C8]
            text-[#70534D]
            rounded-xl px-5 py-4 text-sm">

            {{ session('success') }}

        </div>

    @endif


    {{-- STATISTIK --}}
    <div class="grid grid-cols-4 gap-5">

        {{-- TOTAL --}}
        <div class="bg-white rounded-2xl
            border border-[#EDE2DA]
            p-5">

            <p class="text-xs text-[#A28B83]">
                Total Pesanan
            </p>

            <p class="text-3xl font-semibold
                text-[#493535] mt-3">

                {{ $totalPesanan }}

            </p>

        </div>


        {{-- PENDING --}}
        <div class="bg-white rounded-2xl
            border border-[#EDE2DA]
            p-5">

            <p class="text-xs text-[#A28B83]">
                Pesanan Baru
            </p>

            <p class="text-3xl font-semibold
                text-[#7D2942] mt-3">

                {{ $pesananPending }}

            </p>

        </div>


        {{-- DIPROSES --}}
        <div class="bg-white rounded-2xl
            border border-[#EDE2DA]
            p-5">

            <p class="text-xs text-[#A28B83]">
                Sedang Diproses
            </p>

            <p class="text-3xl font-semibold
                text-[#806044] mt-3">

                {{ $pesananDiproses }}

            </p>

        </div>


        {{-- SELESAI --}}
        <div class="bg-white rounded-2xl
            border border-[#EDE2DA]
            p-5">

            <p class="text-xs text-[#A28B83]">
                Selesai
            </p>

            <p class="text-3xl font-semibold
                text-[#65856B] mt-3">

                {{ $pesananSelesai }}

            </p>

        </div>

    </div>


    {{-- SEARCH & FILTER --}}
    <div class="bg-white
        border border-[#EDE2DA]
        rounded-2xl p-5">

        <form
            action="{{ route('admin.pesanan') }}"
            method="GET"
            class="flex gap-3"
        >

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nomor pesanan, nama, atau nomor HP..."
                class="flex-1
                bg-[#FFFCFA]
                border border-[#E5D8D1]
                rounded-xl
                px-4 py-3
                text-sm
                text-[#493535]
                placeholder:text-[#B5A39D]
                focus:outline-none
                focus:border-[#9D6673]"
            >


            <select
                name="status"
                class="w-48
                bg-[#FFFCFA]
                border border-[#E5D8D1]
                rounded-xl
                px-4 py-3
                text-sm
                text-[#665250]
                focus:outline-none"
            >

                <option value="">
                    Semua Status
                </option>

                <option value="pending"
                    {{ request('status') === 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="processing"
                    {{ request('status') === 'processing' ? 'selected' : '' }}>
                    Diproses
                </option>

                <option value="shipped"
                    {{ request('status') === 'shipped' ? 'selected' : '' }}>
                    Dikirim
                </option>

                <option value="completed"
                    {{ request('status') === 'completed' ? 'selected' : '' }}>
                    Selesai
                </option>

                <option value="cancelled"
                    {{ request('status') === 'cancelled' ? 'selected' : '' }}>
                    Dibatalkan
                </option>

            </select>


            <button
                type="submit"
                class="bg-[#7D2942]
                hover:bg-[#692238]
                text-white
                px-6 py-3
                rounded-xl
                text-sm font-medium
                transition"
            >
                Cari
            </button>

        </form>

    </div>


    {{-- TABLE --}}
    <div class="bg-white
        border border-[#EDE2DA]
        rounded-2xl
        overflow-hidden">

        <div class="px-6 py-5
            border-b border-[#EDE2DA]">

            <h2 class="font-semibold text-[#493535]">
                Daftar Pesanan
            </h2>

            <p class="text-xs text-[#A28B83] mt-1">
                Pesanan pelanggan yang masuk ke sistem.
            </p>

        </div>


        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-[#FBF6F2]">

                    <tr>

                        <th class="text-left px-6 py-4
                            text-xs font-semibold
                            text-[#806D68]">
                            Pesanan
                        </th>

                        <th class="text-left px-6 py-4
                            text-xs font-semibold
                            text-[#806D68]">
                            Pelanggan
                        </th>

                        <th class="text-left px-6 py-4
                            text-xs font-semibold
                            text-[#806D68]">
                            Total
                        </th>

                        <th class="text-left px-6 py-4
                            text-xs font-semibold
                            text-[#806D68]">
                            Status
                        </th>

                        <th class="text-left px-6 py-4
                            text-xs font-semibold
                            text-[#806D68]">
                            Tanggal
                        </th>

                        <th class="text-right px-6 py-4
                            text-xs font-semibold
                            text-[#806D68]">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-[#F0E5DF]">

                    @forelse($orders as $order)

                        <tr class="hover:bg-[#FFFBF8] transition">

                            {{-- ORDER --}}
                            <td class="px-6 py-5">

                                <p class="text-sm font-semibold
                                    text-[#493535]">

                                    {{ $order->order_number }}

                                </p>

                                <p class="text-xs text-[#A28B83] mt-1">
                                    #{{ $order->id }}
                                </p>

                            </td>


                            {{-- USER --}}
                            <td class="px-6 py-5">

                                <p class="text-sm font-medium
                                    text-[#5C4845]">

                                    {{ $order->address_name }}

                                </p>

                                <p class="text-xs text-[#A28B83] mt-1">

                                    {{ $order->address_phone }}

                                </p>

                            </td>


                            {{-- TOTAL --}}
                            <td class="px-6 py-5">

                                <p class="text-sm font-semibold
                                    text-[#493535]">

                                    Rp {{ number_format($order->total, 0, ',', '.') }}

                                </p>

                            </td>


                            {{-- STATUS --}}
                            <td class="px-6 py-5">

                                @if(in_array($order->status, ['completed', 'selesai']))

                                    <span class="inline-flex
                                        px-3 py-1.5 rounded-full
                                        bg-[#E7F1E8]
                                        text-[#64806A]
                                        text-xs font-medium">

                                        Selesai

                                    </span>

                                @elseif(in_array($order->status, ['processing', 'diproses']))

                                    <span class="inline-flex
                                        px-3 py-1.5 rounded-full
                                        bg-[#F3E9DD]
                                        text-[#856B4E]
                                        text-xs font-medium">

                                        Diproses

                                    </span>

                                @elseif(in_array($order->status, ['shipped', 'dikirim']))

                                    <span class="inline-flex
                                        px-3 py-1.5 rounded-full
                                        bg-[#E6EDF3]
                                        text-[#60758A]
                                        text-xs font-medium">

                                        Dikirim

                                    </span>

                                @elseif(in_array($order->status, ['cancelled', 'dibatalkan']))

                                    <span class="inline-flex
                                        px-3 py-1.5 rounded-full
                                        bg-[#F9E7E7]
                                        text-[#A45D63]
                                        text-xs font-medium">

                                        Dibatalkan

                                    </span>

                                @else

                                    <span class="inline-flex
                                        px-3 py-1.5 rounded-full
                                        bg-[#F2E2E4]
                                        text-[#7D2942]
                                        text-xs font-medium">

                                        Pending

                                    </span>

                                @endif

                            </td>


                            {{-- DATE --}}
                            <td class="px-6 py-5">

                                <p class="text-sm text-[#725F5F]">
                                    {{ $order->created_at?->format('d M Y') }}
                                </p>

                                <p class="text-xs text-[#A28B83] mt-1">
                                    {{ $order->created_at?->format('H:i') }}
                                </p>

                            </td>


                            {{-- ACTION --}}
                            <td class="px-6 py-5 text-right">

                                <a
                                    href="{{ route('admin.pesanan.show', $order) }}"
                                    class="inline-flex
                                    px-4 py-2
                                    rounded-lg
                                    bg-[#F2E2E4]
                                    text-[#7D2942]
                                    text-xs font-medium
                                    hover:bg-[#EBD4D8]
                                    transition"
                                >
                                    Detail
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="px-6 py-16 text-center"
                            >

                                <p class="text-sm text-[#8F7B76]">
                                    Belum ada pesanan.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($orders->hasPages())

            <div class="px-6 py-5 border-t border-[#EDE2DA]">

                {{ $orders->links() }}

            </div>

        @endif

    </div>

</div>

@endsection