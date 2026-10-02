<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PenjualPesananController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['user', 'items'])
            ->latest();

        // Search nomor pesanan / nama pelanggan
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'like', '%' . $search . '%')
                    ->orWhere('address_name', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->paginate(10)->withQueryString();

        // Statistik
        $pesananBaru = Order::whereIn('status', [
            'pending',
            'baru',
        ])->count();

        $pesananDiproses = Order::whereIn('status', [
            'processing',
            'diproses',
        ])->count();

        $pesananDikirim = Order::whereIn('status', [
            'shipped',
            'dikirim',
        ])->count();

        $pesananSelesai = Order::whereIn('status', [
            'completed',
            'selesai',
        ])->count();

        return view('penjual.pesanan', compact(
            'orders',
            'pesananBaru',
            'pesananDiproses',
            'pesananDikirim',
            'pesananSelesai'
        ));
    }

    public function show(Order $order)
    {
        $order->load([
            'user',
            'items.product',
        ]);

        return view('penjual.pesanan-detail', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => [
                'required',
                'in:pending,baru,processing,diproses,shipped,dikirim,completed,selesai,cancelled,dibatalkan',
            ],
        ]);

        $order->update([
            'status' => $data['status'],
        ]);

        return redirect()
            ->route('penjual.pesanan')
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }
}