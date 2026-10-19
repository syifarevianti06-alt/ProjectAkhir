<?php

namespace App\Http\Controllers;

use App\Models\Order;

class PenjualTransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Order::with('user')
            ->whereNotNull('paid_at')
            ->latest('paid_at')
            ->paginate(10);

        $totalTransaksi = Order::whereNotNull('paid_at')->count();

        $totalPendapatan = Order::whereNotNull('paid_at')
            ->sum('total');

        return view('Penjual.transaksi.index', compact(
            'transaksi',
            'totalTransaksi',
            'totalPendapatan'
        ));
    }
}
