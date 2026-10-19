
    @extends('layouts.penjual')

    @section('title', 'Dashboard Penjual')

    @section('content')

    <div class="space-y-8">

        {{-- HEADER DASHBOARD --}}
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
            <div>

                <h1 class="mt-2 font-serif text-3xl font-semibold text-[#4d4141]">
                    Dashboard
                </h1>

                <p class="mt-2 text-sm text-[#9a8989]">
                    Pantau aktivitas dan perkembangan toko Lune Attiré.
                </p>
            </div>

           
</div>


        {{-- STATISTIK UTAMA --}}
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

            {{-- PENJUALAN --}}
            <div class="relative overflow-hidden rounded-2xl border border-[#eee3e3] bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">
                <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-[#fbf1f1]"></div>

                <div class="relative flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm text-[#9a8989]">Penjualan Hari Ini</p>

                        <h2 class="mt-3 break-words text-2xl font-semibold text-[#563f3f]">
                            Rp {{ number_format($penjualanHariIni, 0, ',', '.') }}
                        </h2>

                        <p class="mt-3 text-xs text-[#a47b7b]">
                            Total penjualan hari ini
                        </p>
                    </div>

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#f6e8e8] text-[#986d6d]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-10V4m0 16v-2m0-14a8 8 0 100 16 8 8 0 000-16z"/>
                        </svg>
                    </div>
                </div>
            </div>


            {{-- PESANAN BARU --}}
            <div class="relative overflow-hidden rounded-2xl border border-[#eee3e3] bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">
                <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-[#f7f0e5]"></div>

                <div class="relative flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm text-[#9a8989]">Pesanan Baru</p>

                        <h2 class="mt-3 text-3xl font-semibold text-[#563f3f]">
                            {{ $pesananBaru }}
                        </h2>

                        <p class="mt-3 text-xs text-[#a47b7b]">
                            Menunggu tindak lanjut
                        </p>
                    </div>

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#f7f0e5] text-[#a17e49]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7"/>
                        </svg>
                    </div>
                </div>
            </div>


            {{-- PESANAN DIPROSES --}}
            <div class="relative overflow-hidden rounded-2xl border border-[#eee3e3] bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">
                <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-[#edf2f8]"></div>

                <div class="relative flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm text-[#9a8989]">Pesanan Diproses</p>

                        <h2 class="mt-3 text-3xl font-semibold text-[#563f3f]">
                            {{ $pesananDiproses }}
                        </h2>

                        <p class="mt-3 text-xs text-[#a47b7b]">
                            Sedang ditangani
                        </p>
                    </div>

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#edf2f8] text-[#6985a5]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>


            {{-- PESANAN SELESAI --}}
            <div class="relative overflow-hidden rounded-2xl border border-[#eee3e3] bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">
                <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-[#edf5ee]"></div>

                <div class="relative flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm text-[#9a8989]">Pesanan Selesai</p>

                        <h2 class="mt-3 text-3xl font-semibold text-[#563f3f]">
                            {{ $pesananSelesai }}
                        </h2>

                        <p class="mt-3 text-xs text-[#a47b7b]">
                            Pesanan telah diselesaikan
                        </p>
                    </div>

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#edf5ee] text-[#62866b]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                </div>
            </div>

        </div>


        {{-- GRAFIK DAN KATEGORI --}}
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

            {{-- GRAFIK PENJUALAN --}}
            <div class="rounded-2xl border border-[#eee3e3] bg-white p-6 shadow-sm xl:col-span-2">

                <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
                    <div>
                        <h2 class="font-serif text-xl font-semibold text-[#563f3f]">
                            Grafik Penjualan
                        </h2>

                        <p class="mt-1 text-sm text-[#a39494]">
                            Ringkasan penjualan selama 7 hari terakhir
                        </p>
                    </div>

                    <span class="w-fit rounded-full bg-[#f8eeee] px-3 py-1.5 text-xs font-medium text-[#986d6d]">
                        7 Hari Terakhir
                    </span>
                </div>

                @php
                    $nilaiMaksimal = collect($grafikPenjualan)->max('total');

                    if ($nilaiMaksimal <= 0) {
                        $nilaiMaksimal = 1;
                    }
                @endphp

                <div class="mt-8 flex h-64 items-end gap-3 border-b border-[#f0e8e8] px-2 sm:gap-5">

                    @foreach ($grafikPenjualan as $data)

                        @php
                            $tinggi = ($data['total'] / $nilaiMaksimal) * 100;
                        @endphp

                        <div class="flex h-full min-w-0 flex-1 flex-col justify-end">

                            <div class="group relative flex h-full items-end justify-center">

                                <div
                                    class="w-full max-w-[45px] rounded-t-lg bg-gradient-to-t from-[#986d6d] to-[#d6b6b6] transition duration-200 hover:from-[#7e5353] hover:to-[#bd9292]"
                                    style="height: {{ max($tinggi, 3) }}%;"
                                ></div>

                                <div class="pointer-events-none absolute bottom-full left-1/2 z-10 mb-2 hidden -translate-x-1/2 whitespace-nowrap rounded-lg bg-[#563f3f] px-3 py-2 text-xs text-white shadow-lg group-hover:block">
                                    Rp {{ number_format($data['total'], 0, ',', '.') }}
                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

                <div class="mt-3 flex gap-3 px-2 sm:gap-5">
                    @foreach ($grafikPenjualan as $data)
                        <div class="min-w-0 flex-1 truncate text-center text-xs text-[#a39494]">
                            {{ $data['tanggal'] }}
                        </div>
                    @endforeach
                </div>

            </div>


            {{-- PENJUALAN KATEGORI --}}
            <div class="rounded-2xl border border-[#eee3e3] bg-white p-6 shadow-sm">

                <div>
                    <h2 class="font-serif text-xl font-semibold text-[#563f3f]">
                        Penjualan Kategori
                    </h2>

                    <p class="mt-1 text-sm text-[#a39494]">
                        Persentase produk terjual per kategori
                    </p>
                </div>

                @if ($kategoriPenjualan->count() > 0)

                    <div class="mt-7 space-y-6">

                        @foreach ($kategoriPenjualan as $kategori)

                            @php
                                $persentase = $totalTerjual > 0
                                    ? round(($kategori->jumlah / $totalTerjual) * 100)
                                    : 0;
                            @endphp

                            <div>
                                <div class="mb-2 flex items-center justify-between gap-3">

                                    <span class="truncate text-sm font-medium text-[#654f4f]">
                                        {{ $kategori->category }}
                                    </span>

                                    <span class="shrink-0 text-sm font-semibold text-[#986d6d]">
                                        {{ $persentase }}%
                                    </span>

                                </div>

                                <div class="h-2.5 overflow-hidden rounded-full bg-[#f4eded]">
                                    <div
                                        class="h-full rounded-full bg-gradient-to-r from-[#986d6d] to-[#d4b1b1] transition-all duration-500"
                                        style="width: {{ $persentase }}%;"
                                    ></div>
                                </div>
                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="flex min-h-[200px] flex-col items-center justify-center text-center">
                        <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#faf1f1] text-[#b18a8a]">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                    d="M4 19V5m0 14h16M8 15v-4m4 4V7m4 8v-6"/>
                            </svg>
                        </div>

                        <p class="mt-3 text-sm font-medium text-[#654f4f]">
                            Belum ada data penjualan
                        </p>

                        <p class="mt-1 text-xs text-[#a39494]">
                            Data kategori akan tampil di sini.
                        </p>
                    </div>

                @endif

            </div>

        </div>


        {{-- PESANAN TERBARU DAN STOK MENIPIS --}}
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

            {{-- PESANAN TERBARU --}}
            <div class="overflow-hidden rounded-2xl border border-[#eee3e3] bg-white shadow-sm xl:col-span-2">

                <div class="flex flex-col justify-between gap-3 border-b border-[#f0e8e8] px-6 py-5 sm:flex-row sm:items-center">

                    <div>
                        <h2 class="font-serif text-xl font-semibold text-[#563f3f]">
                            Pesanan Terbaru
                        </h2>

                        <p class="mt-1 text-sm text-[#a39494]">
                            Pantau pesanan yang masuk ke toko
                        </p>
                    </div>

                    <a
                        href="{{ route('penjual.pesanan') }}"
                        class="inline-flex w-fit items-center gap-2 rounded-lg border border-[#eadada] px-4 py-2 text-sm font-medium text-[#986d6d] transition hover:bg-[#faf1f1]"
                    >
                        Lihat semua
                        <span aria-hidden="true">→</span>
                    </a>

                </div>

                @if ($pesananTerbaru->count() > 0)

                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[600px]">

                            <thead class="bg-[#fcf9f9]">
                                <tr>
                                    <th class="px-6 py-4 text-left text-[11px] font-semibold uppercase tracking-wider text-[#a39494]">
                                        Nomor Pesanan
                                    </th>

                                    <th class="px-6 py-4 text-left text-[11px] font-semibold uppercase tracking-wider text-[#a39494]">
                                        Pelanggan
                                    </th>

                                    <th class="px-6 py-4 text-left text-[11px] font-semibold uppercase tracking-wider text-[#a39494]">
                                        Total
                                    </th>

                                    <th class="px-6 py-4 text-left text-[11px] font-semibold uppercase tracking-wider text-[#a39494]">
                                        Status
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-[#f3eded]">

                                @foreach ($pesananTerbaru as $order)

                                    @php
                                        $status = strtolower($order->status ?? '');

                                        $statusClass = match ($status) {
                                            'pending', 'baru' => 'bg-amber-50 text-amber-700 ring-amber-200',
                                            'paid' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
                                            'processing', 'diproses' => 'bg-blue-50 text-blue-700 ring-blue-200',
                                            'shipped', 'dikirim' => 'bg-purple-50 text-purple-700 ring-purple-200',
                                            'completed', 'selesai' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
                                            'cancelled', 'dibatalkan' => 'bg-red-50 text-red-700 ring-red-200',
                                            default => 'bg-gray-50 text-gray-600 ring-gray-200',
                                        };
                                    @endphp

                                    <tr class="transition hover:bg-[#fdfafa]">

                                        <td class="px-6 py-5">
                                            <span class="text-sm font-semibold text-[#654f4f]">
                                                {{ $order->order_number ?? 'PS-' . str_pad($order->id, 4, '0', STR_PAD_LEFT) }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-5">
                                            <div class="flex items-center gap-3">
                                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#f4e6e6] text-xs font-semibold text-[#986d6d]">
                                                    {{ strtoupper(substr($order->user?->name ?? $order->address_name ?? 'P', 0, 1)) }}
                                                </div>

                                                <span class="text-sm text-[#756464]">
                                                    {{ $order->user?->name ?? $order->address_name ?? 'Pelanggan' }}
                                                </span>
                                            </div>
                                        </td>

                                        <td class="px-6 py-5">
                                            <span class="whitespace-nowrap text-sm font-semibold text-[#654f4f]">
                                                Rp {{ number_format($order->total, 0, ',', '.') }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-5">
                                            <span class="inline-flex whitespace-nowrap rounded-full px-3 py-1.5 text-xs font-medium ring-1 ring-inset {{ $statusClass }}">
                                                {{ ucfirst($order->status ?? 'Tidak diketahui') }}
                                            </span>
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="flex min-h-[200px] flex-col items-center justify-center px-6 text-center">
                        <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#faf1f1] text-[#b18a8a]">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                    d="M3 7h18l-2 12H5L3 7zm0 0l-1-3H1m8 7v4m6-4v4"/>
                            </svg>
                        </div>

                        <p class="mt-3 text-sm font-medium text-[#654f4f]">
                            Belum ada pesanan
                        </p>

                        <p class="mt-1 text-xs text-[#a39494]">
                            Pesanan pelanggan akan muncul di bagian ini.
                        </p>
                    </div>

                @endif

            </div>


            {{-- STOK MENIPIS --}}
            <div class="overflow-hidden rounded-2xl border border-[#eee3e3] bg-white shadow-sm">

                <div class="border-b border-[#f0e8e8] px-6 py-5">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h2 class="font-serif text-xl font-semibold text-[#563f3f]">
                                Stok Menipis
                            </h2>

                            <p class="mt-1 text-sm text-[#a39494]">
                                Produk dengan stok 10 atau kurang
                            </p>
                        </div>

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#fff4e7] text-[#b78345]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                    d="M12 9v4m0 4h.01M10.3 3.9L1.8 18.5A1.7 1.7 0 003.3 21h17.4a1.7 1.7 0 001.5-2.5L13.7 3.9a2 2 0 00-3.4 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                @if ($stokMenipis->count() > 0)

                    <div class="divide-y divide-[#f3eded]">

                        @foreach ($stokMenipis as $product)

                            <div class="flex items-center justify-between gap-3 px-6 py-4 transition hover:bg-[#fdfafa]">

                                <div class="min-w-0">
                                    <p class="truncate text-sm font-medium text-[#654f4f]">
                                        {{ $product->name }}
                                    </p>

                                    <p class="mt-1 text-xs text-[#a39494]">
                                        {{ $product->category }}
                                    </p>
                                </div>

                                <div class="ml-3 shrink-0 text-right">
                                    <span class="inline-flex min-w-10 justify-center rounded-lg px-2.5 py-1.5 text-sm font-semibold
                                        {{ $product->stock <= 5
                                            ? 'bg-red-50 text-red-600'
                                            : 'bg-orange-50 text-orange-600' }}">
                                        {{ $product->stock }}
                                    </span>

                                    <p class="mt-1 text-[10px] text-[#a39494]">
                                        unit
                                    </p>
                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="flex min-h-[200px] flex-col items-center justify-center px-6 text-center">
                        <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#edf5ee] text-[#62866b]">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                    d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>

                        <p class="mt-3 text-sm font-medium text-[#654f4f]">
                            Stok masih aman
                        </p>

                        <p class="mt-1 text-xs text-[#a39494]">
                            Tidak ada produk dengan stok menipis.
                        </p>
                    </div>

                @endif

            </div>

        </div>

    @endsection
