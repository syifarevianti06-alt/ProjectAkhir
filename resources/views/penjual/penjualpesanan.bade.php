<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PenjualPesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with([
            'user',
            'alamat',
            'detailPesanans.produk',
            'pembayaran',
        ])
            ->latest('tanggal_pesanan')
            ->get();

        return view('penjual.pesanan.index', compact('pesanans'));
    }

    public function show(Pesanan $pesanan)
    {
        $pesanan->load([
            'user',
            'alamat',
            'detailPesanans.produk',
            'pembayaran',
        ]);

        return view('penjual.pesanan.show', compact('pesanan'));
    }

    public function updateStatus(Request $request, Pesanan $pesanan)
    {
        $data = $request->validate([
            'status' => [
                'required',
                'in:menunggu,diproses,dikirim,selesai,dibatalkan',
            ],
        ]);

        $pesanan->update([
            'status' => $data['status'],
        ]);

        return redirect()
            ->route('penjual.pesanan.index')
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }
}