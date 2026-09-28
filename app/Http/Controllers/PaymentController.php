<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show(Request $request, Order $order)
    {
        abort_unless($order->user_id === $request->user()->id, 403);
        return view('checkout.qris', compact('order'));
    }

    public function confirm(Request $request, Order $order)
    {
        abort_unless($order->user_id === $request->user()->id, 403);
        $order->update(['paid_at' => now()]);

        return redirect()->route('checkout.success', $order);
    }
}