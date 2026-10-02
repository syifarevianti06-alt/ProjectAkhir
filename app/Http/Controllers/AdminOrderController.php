<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('user')
            ->latest();

        // SEARCH
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('order_number', 'like', '%' . $search . '%')
                    ->orWhere('address_name', 'like', '%' . $search . '%')
                    ->orWhere('address_phone', 'like', '%' . $search . '%');

            });
        }

        // FILTER STATUS
        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        $orders = $query
            ->paginate(10)
            ->withQueryString();


        // STATISTIK
        $totalPesanan = Order::count();

        $pesananPending = Order::whereIn('status', [
            'pending',
            'baru',
        ])->count();

        $pesananDiproses = Order::whereIn('status', [
            'processing',
            'diproses',
        ])->count();

        $pesananSelesai = Order::whereIn('status', [
            'completed',
            'selesai',
        ])->count();


        return view('admin.pesanan', compact(
            'orders',
            'totalPesanan',
            'pesananPending',
            'pesananDiproses',
            'pesananSelesai'
        ));
    }


    public function show(Order $order)
    {
        $order->load([
            'user',
            'items.product',
        ]);

        return view('admin.pesanan-detail', compact('order'));
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
            ->route('admin.pesanan.show', $order)
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }
}