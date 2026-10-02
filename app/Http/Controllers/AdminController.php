<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Status pesanan yang dihitung sebagai pendapatan
        $statusSukses = [
            'paid',
            'processing',
            'shipped',
            'completed',
            'selesai',
        ];

        // =========================
        // STATISTIK UTAMA
        // =========================

        // Total pengguna
        $totalPengguna = User::count();

        // Total produk
        $totalProduk = Product::count();

        // Total pesanan
        $totalPesanan = Order::count();

        // Total pendapatan
        $totalPendapatan = Order::whereIn('status', $statusSukses)
            ->sum('total');


        // =========================
        // GRAFIK PENJUALAN 7 HARI
        // =========================

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


        // =========================
        // PESANAN TERBARU
        // =========================

        $pesananTerbaru = Order::with('user')
            ->latest()
            ->take(5)
            ->get();


        // =========================
        // PRODUK TERBARU
        // =========================

        $produkTerbaru = Product::latest()
            ->take(4)
            ->get();


        // =========================
        // KIRIM KE VIEW
        // =========================

        return view('admin.dashboard', compact(
            'totalPengguna',
            'totalProduk',
            'totalPesanan',
            'totalPendapatan',
            'grafikPenjualan',
            'pesananTerbaru',
            'produkTerbaru'
        ));
    }
}