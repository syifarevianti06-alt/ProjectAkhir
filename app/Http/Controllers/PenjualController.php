<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PenjualController extends Controller
{
    public function dashboard()
    {
        // ==========================================
        // STATUS PESANAN YANG DIHITUNG SEBAGAI PENJUALAN
        // ==========================================

        $statusSukses = [
            'paid',
            'processing',
            'shipped',
            'completed',
            'selesai',
        ];


        // ==========================================
        // STATISTIK PESANAN
        // ==========================================

        // Penjualan hari ini
        $penjualanHariIni = Order::whereDate('created_at', today())
            ->whereIn('status', $statusSukses)
            ->sum('total');


        // Pesanan baru
        $pesananBaru = Order::whereIn('status', [
            'pending',
            'baru',
        ])->count();


        // Pesanan diproses
        $pesananDiproses = Order::whereIn('status', [
            'processing',
            'diproses',
        ])->count();


        // Pesanan selesai
        $pesananSelesai = Order::whereIn('status', [
            'completed',
            'selesai',
        ])->count();


        // ==========================================
        // DATA PRODUK
        // ==========================================

        $totalProduk = Product::count();

        $totalStok = Product::sum('stock');


        // Produk dengan stok menipis
        $stokMenipis = Product::where('stock', '<=', 10)
            ->orderBy('stock', 'asc')
            ->take(5)
            ->get();


        // ==========================================
        // PESANAN TERBARU
        // ==========================================

        $pesananTerbaru = Order::with('user')
            ->latest()
            ->take(5)
            ->get();


        // ==========================================
        // GRAFIK PENJUALAN 7 HARI TERAKHIR
        // ==========================================

        $grafikPenjualan = [];

        for ($i = 6; $i >= 0; $i--) {

            $tanggal = Carbon::today()->subDays($i);

            $total = Order::whereDate('created_at', $tanggal)
                ->whereIn('status', $statusSukses)
                ->sum('total');

            $grafikPenjualan[] = [
                'tanggal' => $tanggal->format('d M'),
                'total' => (float) $total,
            ];
        }


        // ==========================================
        // PENJUALAN BERDASARKAN KATEGORI
        // ==========================================

        $kategoriPenjualan = Product::query()
            ->join(
                'order_items',
                'products.id',
                '=',
                'order_items.product_id'
            )
            ->join(
                'orders',
                'orders.id',
                '=',
                'order_items.order_id'
            )
            ->whereIn('orders.status', $statusSukses)
            ->select(
                'products.category',
                DB::raw('SUM(order_items.quantity) as jumlah')
            )
            ->groupBy('products.category')
            ->orderByDesc('jumlah')
            ->get();


        $totalTerjual = $kategoriPenjualan->sum('jumlah');


        // ==========================================
        // KIRIM DATA KE DASHBOARD PENJUAL
        // ==========================================

        return view('penjual.dashboard', compact(
            'penjualanHariIni',
            'pesananBaru',
            'pesananDiproses',
            'pesananSelesai',
            'totalProduk',
            'totalStok',
            'stokMenipis',
            'pesananTerbaru',
            'grafikPenjualan',
            'kategoriPenjualan',
            'totalTerjual'
        ));
    }
}