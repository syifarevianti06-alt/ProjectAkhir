<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReportController extends Controller
{
    public function index(Request $request)
    {
        // Filter periode: 3 atau 6 bulan
        $periode = (int) $request->get('periode', 6);

        if (!in_array($periode, [3, 6])) {
            $periode = 6;
        }

        $awalPeriode = now()
            ->startOfMonth()
            ->subMonths($periode - 1);

        $akhirPeriode = now()->endOfMonth();

        $awalPeriodeLalu = $awalPeriode->copy()
            ->subMonths($periode);

        $akhirPeriodeLalu = $awalPeriode->copy()
            ->subDay()
            ->endOfDay();

        // Status pesanan yang dihitung sebagai penjualan berhasil
        $statusSukses = [
            'paid',
            'processing',
            'shipped',
            'completed',
            'selesai',
        ];

        // Total penjualan pada periode terpilih
        $totalPenjualan = Order::whereBetween('created_at', [
            $awalPeriode,
            $akhirPeriode,
        ])
            ->whereIn('status', $statusSukses)
            ->sum('total');

        // Jumlah transaksi berhasil
        $jumlahTransaksi = Order::whereBetween('created_at', [
            $awalPeriode,
            $akhirPeriode,
        ])
            ->whereIn('status', $statusSukses)
            ->count();

        // Total produk terjual
        $produkTerjual = OrderItem::whereHas(
            'order',
            function ($query) use (
                $awalPeriode,
                $akhirPeriode,
                $statusSukses
            ) {
                $query->whereBetween('created_at', [
                    $awalPeriode,
                    $akhirPeriode,
                ])->whereIn('status', $statusSukses);
            }
        )->sum('quantity');

        // Data periode sebelumnya
        $penjualanLalu = Order::whereBetween('created_at', [
            $awalPeriodeLalu,
            $akhirPeriodeLalu,
        ])
            ->whereIn('status', $statusSukses)
            ->sum('total');

        $transaksiLalu = Order::whereBetween('created_at', [
            $awalPeriodeLalu,
            $akhirPeriodeLalu,
        ])
            ->whereIn('status', $statusSukses)
            ->count();

        // Persentase perubahan penjualan
        $persenPenjualan = $penjualanLalu > 0
            ? round(
                (($totalPenjualan - $penjualanLalu)
                    / $penjualanLalu) * 100,
                1
            )
            : ($totalPenjualan > 0 ? 100 : 0);

        // Persentase perubahan transaksi
        $persenTransaksi = $transaksiLalu > 0
            ? round(
                (($jumlahTransaksi - $transaksiLalu)
                    / $transaksiLalu) * 100,
                1
            )
            : ($jumlahTransaksi > 0 ? 100 : 0);

        // Grafik penjualan bulanan
        $grafikBulanan = [];

        $bulanGrafik = $awalPeriode->copy()->startOfMonth();

        while ($bulanGrafik->lte($akhirPeriode)) {
            $total = Order::whereBetween('created_at', [
                $bulanGrafik->copy()->startOfMonth(),
                $bulanGrafik->copy()->endOfMonth(),
            ])
                ->whereIn('status', $statusSukses)
                ->sum('total');

            $grafikBulanan[] = [
                'bulan' => $bulanGrafik->translatedFormat('M Y'),
                'total' => (float) $total,
            ];

            $bulanGrafik->addMonth();
        }

        // Produk terlaris
        $produkTerlaris = OrderItem::select(
            'product_id',
            'product_name',
            DB::raw('SUM(quantity) as total_terjual'),
            DB::raw('SUM(price * quantity) as total_pendapatan')
        )
            ->whereHas('order', function ($query) use (
                $awalPeriode,
                $akhirPeriode,
                $statusSukses
            ) {
                $query->whereBetween('created_at', [
                    $awalPeriode,
                    $akhirPeriode,
                ])->whereIn('status', $statusSukses);
            })
            ->groupBy('product_id', 'product_name')
            ->orderByDesc('total_terjual')
            ->limit(10)
            ->get();

        // Ringkasan status pesanan
        $statusPesanan = Order::whereBetween('created_at', [
            $awalPeriode,
            $akhirPeriode,
        ])
            ->select('status', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('status')
            ->orderByDesc('jumlah')
            ->get();

        // Rata-rata nilai transaksi berhasil
        $rataRataPesanan = Order::whereBetween('created_at', [
            $awalPeriode,
            $akhirPeriode,
        ])
            ->whereIn('status', $statusSukses)
            ->avg('total') ?? 0;

        // Kompatibilitas dengan nama variabel lama
        $totalPesanan = $jumlahTransaksi;
        $totalPendapatan = $totalPenjualan;
        $totalProdukTerjual = $produkTerjual;

        return view('admin.laporan', compact(
            'periode',
            'awalPeriode',
            'akhirPeriode',
            'totalPesanan',
            'jumlahTransaksi',
            'totalPendapatan',
            'totalPenjualan',
            'totalProdukTerjual',
            'produkTerjual',
            'rataRataPesanan',
            'grafikBulanan',
            'produkTerlaris',
            'statusPesanan',
            'persenPenjualan',
            'persenTransaksi'
        ));
    }
}