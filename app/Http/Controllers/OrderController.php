<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function success(Request $request, Order $order)
    {
        abort_unless($order->user_id === $request->user()->id, 403);
        return view('checkout.success', compact('order'));
    }

    public function index(Request $request)
    {
        $query = $request->user()->orders()->latest();
        if ($request->filled('status') && $request->status !== 'semua') {
            $query->where('status', $request->status);
        }
        $orders = $query->with('items')->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Request $request, Order $order)
    {
        abort_unless($order->user_id === $request->user()->id, 403);
        return view('orders.show', compact('order'));
    }
}