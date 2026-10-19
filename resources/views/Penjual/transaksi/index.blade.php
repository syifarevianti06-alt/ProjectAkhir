
@extends('layouts.penjual')

@section('title', 'Transaksi')

@section('content')
<div class="space-y-6">

    {{-- JUDUL --}}
    <div>
        <h1 class="text-2xl font-bold text-[#7B1F3A]">
            Transaksi
        </h1>
        <p class="mt-1 text-sm text-gray-500">
            Pantau transaksi pembayaran Lune Attiré.
        </p>
    </div>

    {{-- RINGKASAN --}}
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div class="rounded-2xl border border-[#eadfe1] bg-white p-6 shadow-sm">
            <p class="text-sm text-gray-500">Total Transaksi Dibayar</p>
            <p class="mt-2 text-3xl font-bold text-[#7B1F3A]">
                {{ $totalTransaksi }}
            </p>
        </div>

        <div class="rounded-2xl border border-[#eadfe1] bg-white p-6 shadow-sm">
            <p class="text-sm text-gray-500">Total Pembayaran</p>
            <p class="mt-2 text-3xl font-bold text-[#7B1F3A]">
                Rp {{ number_format((float) $totalPendapatan, 0, ',', '.') }}
            </p>
        </div>
    </div>

    {{-- TABEL --}}
    <div class="overflow-hidden rounded-2xl border border-[#eadfe1] bg-white">
        <div class="border-b border-[#eadfe1] p-5">
            <h2 class="font-semibold text-gray-800">
                Riwayat Transaksi
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-[#faf5ee] text-gray-600">
                    <tr>
                        <th class="whitespace-nowrap px-5 py-4">No.</th>
                        <th class="whitespace-nowrap px-5 py-4">Nomor Pesanan</th>
                        <th class="whitespace-nowrap px-5 py-4">Pelanggan</th>
                        <th class="whitespace-nowrap px-5 py-4">Metode Pembayaran</th>
                        <th class="whitespace-nowrap px-5 py-4">Total</th>
                        <th class="whitespace-nowrap px-5 py-4">Tanggal Pembayaran</th>
                        <th class="px-5 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse ($transaksi as $item)
                        <tr class="transition hover:bg-[#faf5ee]/50">
                            <td class="px-5 py-4">
                                {{ $transaksi->firstItem() + $loop->index }}
                            </td>

                            <td class="whitespace-nowrap px-5 py-4 font-medium text-[#7B1F3A]">
                                {{ $item->order_number }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $item->user?->name ?? 'Pelanggan' }}
                            </td>

                            <td class="px-5 py-4">
                                {{ strtoupper($item->payment_method ?? '-') }}
                            </td>

                            <td class="whitespace-nowrap px-5 py-4 font-semibold">
                                Rp {{ number_format((float) $item->total, 0, ',', '.') }}
                            </td>

                            <td class="whitespace-nowrap px-5 py-4">
                                {{ $item->paid_at?->format('d-m-Y H:i') ?? '-' }}
                            </td>

                            <td class="px-5 py-4 text-center">
                                <button
                                    type="button"
                                    onclick="cetakTransaksi(this)"
                                    data-nomor="{{ $item->order_number }}"
                                    data-pelanggan="{{ $item->user?->name ?? 'Pelanggan' }}"
                                    data-metode="{{ strtoupper($item->payment_method ?? '-') }}"
                                    data-total="Rp {{ number_format((float) $item->total, 0, ',', '.') }}"
                                    data-tanggal="{{ $item->paid_at?->format('d-m-Y H:i') ?? '-' }}"
                                    class="inline-flex items-center gap-2 rounded-lg bg-[#7B1F3A] px-4 py-2 font-semibold text-white shadow-sm transition hover:bg-[#64182F]">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="16" height="16"
                                         viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor"
                                         stroke-width="2"
                                         stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <polyline points="6 9 6 2 18 2 18 9"/>
                                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                                        <rect x="6" y="14" width="12" height="8"/>
                                    </svg>

                                    Cetak
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-8 text-center text-gray-500">
                                Belum ada transaksi pembayaran yang tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        @if ($transaksi->hasPages())
            <div class="border-t border-[#eadfe1] p-5">
                {{ $transaksi->links() }}
            </div>
        @endif
    </div>
</div>

{{-- CETAK BUKTI TRANSAKSI --}}
<script>
function cetakTransaksi(button) {
    const data = button.dataset;

    const jendela = window.open(
        '',
        '_blank',
        'width=850,height=700'
    );

    if (!jendela) {
        alert('Izinkan pop-up browser untuk mencetak transaksi.');
        return;
    }

    const aman = (teks) => String(teks ?? '-').replace(
        /[&<>"']/g,
        karakter => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        })[karakter]
    );

    jendela.document.open();

    jendela.document.write(`
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Transaksi - ${aman(data.nomor)}</title>

    <script src="https://cdn.tailwindcss.com"><\/script>

    <style>
        @page {
            size: A5 portrait;
            margin: 5mm;
        }

        * {
            box-sizing: border-box;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        @media print {
            html, body {
                margin: 0 !important;
                padding: 0 !important;
                background: white !important;
            }

            .receipt {
                width: 100% !important;
                max-width: 100% !important;
                margin: 0 !important;
                box-shadow: none !important;
                break-inside: avoid;
                page-break-inside: avoid;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-[#faf5ee] p-4 font-sans text-gray-800">

    <main class="receipt mx-auto max-w-lg overflow-hidden rounded-xl border border-[#eadfe1] bg-white shadow-lg">

        <header class="bg-[#7B1F3A] px-6 py-5 text-center text-white">
            <p class="text-xs font-medium uppercase tracking-[0.3em]">
                Lune Attiré
            </p>

            <h1 class="mt-2 text-xl font-bold tracking-wide">
                Bukti Transaksi
            </h1>

            <p class="mt-1 text-xs text-white/80">
                Bukti pembayaran pesanan Anda
            </p>
        </header>

        <section class="space-y-3 p-5">

            <div>
                <p class="text-[10px] uppercase tracking-wider text-gray-400">
                    Nomor Pesanan
                </p>
                <p class="mt-1 break-all text-sm font-bold text-[#7B1F3A]">
                    ${aman(data.nomor)}
                </p>
            </div>

            <div class="h-px bg-[#eadfe1]"></div>

            <div class="flex items-start justify-between gap-3">
                <span class="text-xs text-gray-500">Nama Pelanggan</span>
                <span class="max-w-[60%] break-words text-right text-xs font-semibold">
                    ${aman(data.pelanggan)}
                </span>
            </div>

            <div class="flex items-start justify-between gap-3">
                <span class="text-xs text-gray-500">Metode Pembayaran</span>
                <span class="max-w-[60%] break-words text-right text-xs font-semibold text-[#7B1F3A]">
                    ${aman(data.metode)}
                </span>
            </div>

            <div class="flex items-start justify-between gap-3">
                <span class="text-xs text-gray-500">Tanggal Pembayaran</span>
                <span class="max-w-[60%] break-words text-right text-xs font-semibold">
                    ${aman(data.tanggal)}
                </span>
            </div>

            <div class="rounded-lg bg-[#faf5ee] p-4">
                <p class="text-xs text-gray-500">Total Pembayaran</p>
                <p class="mt-1 break-words text-2xl font-bold text-[#7B1F3A]">
                    ${aman(data.total)}
                </p>
            </div>

            <div class="border-t border-dashed border-[#d9c7cc] pt-4 text-center">
                <p class="text-sm font-semibold text-[#7B1F3A]">
                    Terima kasih telah berbelanja!
                </p>
                <p class="mt-1 text-[10px] leading-4 text-gray-500">
                    Lune Attiré — Elegansi dalam setiap pilihan.
                </p>
                <p class="mt-1 text-[10px] text-gray-400">
                    Simpan bukti ini sebagai referensi transaksi.
                </p>
            </div>

        </section>
    </main>

    <div class="no-print mx-auto mt-4 flex max-w-lg justify-center gap-3">
        <button
            onclick="window.print()"
            class="rounded-lg bg-[#7B1F3A] px-5 py-2.5 text-sm font-semibold text-white hover:bg-[#64182F]">
            Cetak Bukti
        </button>

        <button
            onclick="window.close()"
            class="rounded-lg border border-[#eadfe1] bg-white px-5 py-2.5 text-sm font-semibold text-[#7B1F3A] hover:bg-[#f5e9ed]">
            Tutup
        </button>
    </div>

    <script>
        window.onload = function () {
            setTimeout(function () {
                window.print();
            }, 800);
        };
    <\/script>
</body>
</html>
    `);

    jendela.document.close();
}
</script>
@endsection
