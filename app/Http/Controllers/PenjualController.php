<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class PenjualController extends Controller
{
    public function dashboard()
    {
        /*
        |--------------------------------------------------------------------------
        | STATISTIK PESANAN
        |--------------------------------------------------------------------------
        */

        // Penjualan hari ini
        $penjualanHariIni = Order::whereDate('created_at', today())
            ->whereIn('status', [
                'paid',
                'processing',
                'shipped',
                'completed',
                'selesai',
            ])
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


        /*
        |--------------------------------------------------------------------------
        | DATA PRODUK
        |--------------------------------------------------------------------------
        */

        // Jumlah produk
        $totalProduk = Product::count();

        // Total stok semua produk
        $totalStok = Product::sum('stock');

        // Produk yang stoknya 10 atau kurang
        $stokMenipis = Product::where('stock', '<=', 10)
            ->orderBy('stock', 'asc')
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | PESANAN TERBARU
        |--------------------------------------------------------------------------
        */

        $pesananTerbaru = Order::with('user')
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | DATA GRAFIK PENJUALAN 7 HARI
        |--------------------------------------------------------------------------
        */

        $grafikPenjualan = [];

        for ($i = 6; $i >= 0; $i--) {

            $tanggal = Carbon::today()->subDays($i);

            $total = Order::whereDate('created_at', $tanggal)
                ->whereIn('status', [
                    'paid',
                    'processing',
                    'shipped',
                    'completed',
                    'selesai',
                ])
                ->sum('total');

            $grafikPenjualan[] = [
                'tanggal' => $tanggal->format('d M'),
                'total' => $total,
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | PENJUALAN BERDASARKAN KATEGORI
        |--------------------------------------------------------------------------
        */

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
            ->whereIn('orders.status', [
                'paid',
                'processing',
                'shipped',
                'completed',
                'selesai',
            ])
            ->selectRaw(
                'products.category, SUM(order_items.quantity) as jumlah'
            )
            ->groupBy('products.category')
            ->orderByDesc('jumlah')
            ->get();

        $totalTerjual = $kategoriPenjualan->sum('jumlah');


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE VIEW
        |--------------------------------------------------------------------------
        */

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