<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $items = $request->user()->cartItems()->with('product')->get();
        abort_if($items->isEmpty(), 404, 'Keranjang kosong.');

        $address = $request->user()->addresses()->where('is_default', true)->first();
        $subtotal = $items->sum(fn ($item) => $item->subtotal);

        return view('checkout.index', compact('items','address','subtotal'));
    }

    public function store(Request $request)
    {
        $items = $request->user()->cartItems()->with('product')->get();
        abort_if($items->isEmpty(), 404, 'Keranjang kosong.');

        $address = $request->user()->addresses()->where('is_default', true)->first();
        abort_unless($address, 422, 'Alamat pengiriman belum diisi.');

        $subtotal = $items->sum(fn ($item) => $item->subtotal);

        $order = Order::create([
            'user_id' => $request->user()->id,
            'order_number' => 'LA-' . random_int(10000000, 99999999),
            'address_name' => $address->name,
            'address_phone' => $address->phone,
            'address_full' => $address->address,
            'address_city' => $address->city,
            'address_postal_code' => $address->postal_code,
            'subtotal' => $subtotal,
            'total' => $subtotal,
            'payment_method' => 'QRIS',
            'status' => 'diproses',
        ]);

        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'product_name' => $item->product->name,
                'product_image' => $item->product->image,
                'price' => $item->product->price,
                'size' => $item->size,
                'color' => $item->color,
                'quantity' => $item->quantity,
            ]);
        }

        $request->user()->cartItems()->delete();

        return redirect()->route('payment.show', $order);
    }
}