<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $quantity = (int) ($request->quantity ?? 1);
        $size = $request->size;
        $color = $request->color;

        $subtotal = $product->price * $quantity;

        return view('checkout', compact(
            'product',
            'quantity',
            'size',
            'color',
            'subtotal'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_name' => 'required|string|max:255',
            'address_phone' => 'required|string|max:30',
            'address_full' => 'required|string|max:500',
            'address_city' => 'required|string|max:100',
            'address_postal_code' => 'required|string|max:20',

            'products' => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.size' => 'nullable|string|max:100',
            'products.*.color' => 'nullable|string|max:100',
        ]);

        DB::beginTransaction();

        try {

            $subtotal = 0;
            $cartItems = [];

            foreach ($request->products as $item) {

                $product = Product::findOrFail(
                    $item['product_id']
                );

                $quantity = (int) $item['quantity'];

                // Cek stok
                if ($product->stock < $quantity) {

                    DB::rollBack();

                    return back()
                        ->withErrors([
                            'products' =>
                                "Stok {$product->name} tidak mencukupi."
                        ])
                        ->withInput();
                }

                $subtotal +=
                    $product->price * $quantity;

                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'size' => $item['size'] ?? null,
                    'color' => $item['color'] ?? null,
                ];
            }


            // BUAT ORDER
            $order = Order::create([
                'user_id' => Auth::id(),

                'order_number' =>
                    'ORD-' .
                    now()->format('YmdHis') .
                    '-' .
                    strtoupper(Str::random(4)),

                'address_name' =>
                    $request->address_name,

                'address_phone' =>
                    $request->address_phone,

                'address_full' =>
                    $request->address_full,

                'address_city' =>
                    $request->address_city,

                'address_postal_code' =>
                    $request->address_postal_code,

                'subtotal' => $subtotal,

                'total' => $subtotal,

                'payment_method' =>
                    $request->payment_method ?? 'qris',

                'status' => 'pending',
            ]);


            // BUAT ORDER ITEM + KURANGI STOK
            foreach ($cartItems as $item) {

                $product = $item['product'];

                OrderItem::create([
                    'order_id' =>
                        $order->id,

                    'product_id' =>
                        $product->id,

                    'product_name' =>
                        $product->name,

                    'product_image' =>
                        $product->image,

                    'price' =>
                        $product->price,

                    'size' =>
                        $item['size'],

                    'color' =>
                        $item['color'],

                    'quantity' =>
                        $item['quantity'],
                ]);


                $product->decrement(
                    'stock',
                    $item['quantity']
                );
            }


            DB::commit();


            return redirect()
                ->route('orders')
                ->with(
                    'success',
                    'Pesanan berhasil dibuat.'
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withErrors([
                    'checkout' =>
                        'Pesanan gagal dibuat: ' .
                        $e->getMessage()
                ])
                ->withInput();
        }
    }
}