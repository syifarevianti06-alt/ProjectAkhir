<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualLaporanController extends Controller
{
    public function index(Request $request)
    {
        // Bulan yang dipilih
        $bulan = $request->get('bulan', now()->format('Y-m'));

        try {
            $tanggal = Carbon::createFromFormat('Y-m', $bulan);
        } catch (\Exception $e) {
            $tanggal = now();
            $bulan = now()->format('Y-m');
        }

        $awalBulan = $tanggal->copy()->startOfMonth();
        $akhirBulan = $tanggal->copy()->endOfMonth();

        // Status yang dihitung sebagai penjualan
        $statusSukses = [
            'paid',
            'processing',
            'shipped',
            'completed',
            'selesai',
        ];

        // TOTAL PESANAN

        $totalPesanan = Order::whereBetween(
            'created_at',
            [$awalBulan, $akhirBulan]
        )
            ->count();



        // TOTAL PENDAPATAN


        $totalPendapatan = Order::whereBetween(
            'created_at',
            [$awalBulan, $akhirBulan]
        )
            ->whereIn('status', $statusSukses)
            ->sum('total');



        // TOTAL PRODUK TERJUAL

        $totalProdukTerjual = OrderItem::whereHas('order', function ($query) use (
            $awalBulan,
            $akhirBulan,
            $statusSukses
        ) {
            $query
                ->whereBetween(
                    'created_at',
                    [$awalBulan, $akhirBulan]
                )
                ->whereIn('status', $statusSukses);
        })
            ->sum('quantity');



        // RATA-RATA NILAI PESANAN


        $rataRataPesanan = Order::whereBetween(
            'created_at',
            [$awalBulan, $akhirBulan]
        )
            ->whereIn('status', $statusSukses)
            ->avg('total') ?? 0;



        // GRAFIK PENJUALAN HARIAN

        $grafikPenjualan = [];

        $hari = $awalBulan->copy();

        while ($hari->lte($akhirBulan)) {

            $total = Order::whereDate(
                'created_at',
                $hari
            )
                ->whereIn('status', $statusSukses)
                ->sum('total');

            $grafikPenjualan[] = [
                'tanggal' => $hari->format('d'),
                'label' => $hari->format('d M'),
                'total' => (float) $total,
            ];

            $hari->addDay();
        }



        // PRODUK TERLARIS

        $produkTerlaris = OrderItem::select(
            'product_id',
            'product_name',
            DB::raw('SUM(quantity) as total_terjual'),
            DB::raw('SUM(price * quantity) as total_pendapatan')
        )
            ->whereHas('order', function ($query) use (
                $awalBulan,
                $akhirBulan,
                $statusSukses
            ) {
                $query
                    ->whereBetween(
                        'created_at',
                        [$awalBulan, $akhirBulan]
                    )
                    ->whereIn('status', $statusSukses);
            })
            ->groupBy(
                'product_id',
                'product_name'
            )
            ->orderByDesc('total_terjual')
            ->take(10)
            ->get();



        // STATUS PESANAN

        $statusPesanan = Order::whereBetween(
            'created_at',
            [$awalBulan, $akhirBulan]
        )
            ->select(
                'status',
                DB::raw('COUNT(*) as jumlah')
            )
            ->groupBy('status')
            ->orderByDesc('jumlah')
            ->get();


        // PRODUK DENGAN PENJUALAN TERBANYAK

        $produkTerjual = $produkTerlaris->sum('total_terjual');


        return view('penjual.laporan', compact(
            'bulan',
            'totalPesanan',
            'totalPendapatan',
            'totalProdukTerjual',
            'rataRataPesanan',
            'grafikPenjualan',
            'produkTerlaris',
            'statusPesanan',
            'produkTerjual'
        ));
    }
}
