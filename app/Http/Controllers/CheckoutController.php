<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
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
        /*
        |--------------------------------------------------------------------------
        | CHECKOUT DARI PRODUK / BELI SEKARANG
        |--------------------------------------------------------------------------
        */

        if ($request->filled('product_id')) {

            $product = Product::findOrFail($request->product_id);

            $quantity = max(1, (int) ($request->quantity ?? 1));

            if ($quantity > $product->stock) {
                $quantity = $product->stock;
            }

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


        /*
        |--------------------------------------------------------------------------
        | CHECKOUT DARI KERANJANG
        |--------------------------------------------------------------------------
        */

        $items = Auth::user()
            ->cartItems()
            ->with('product')
            ->get();

        // Kalau keranjang kosong
        if ($items->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang masih kosong.');
        }

        // Cek stok
        foreach ($items as $item) {

            if (!$item->product) {
                continue;
            }

            if ($item->quantity > $item->product->stock) {
                return redirect()
                    ->route('cart.index')
                    ->with(
                        'error',
                        "Stok {$item->product->name} tidak mencukupi."
                    );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | DATA UNTUK HALAMAN CHECKOUT
        |--------------------------------------------------------------------------
        */

        $subtotal = $items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        /*
        | checkout.blade.php kamu sebelumnya menggunakan
        | $product, $quantity, $size, $color.
        |
        | Untuk checkout keranjang, kita kirim juga $items.
        */

        $product = $items->first()->product;
        $quantity = $items->first()->quantity;
        $size = $items->first()->size;
        $color = $items->first()->color;

        return view('checkout', compact(
            'items',
            'product',
            'quantity',
            'size',
            'color',
            'subtotal'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | BUAT PESANAN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'address_name' => 'required|string|max:255',
            'address_phone' => 'required|string|max:30',
            'address_full' => 'required|string|max:500',
            'address_city' => 'required|string|max:100',
            'address_postal_code' => 'required|string|max:20',

            'products' => 'required|array|min:1',

            'products.*.product_id' =>
                'required|exists:products,id',

            'products.*.quantity' =>
                'required|integer|min:1',

            'products.*.size' =>
                'nullable|string|max:100',

            'products.*.color' =>
                'nullable|string|max:100',

            'payment_method' =>
                'nullable|string|max:50',
        ]);

        DB::beginTransaction();

        try {

            $subtotal = 0;
            $orderItems = [];

            /*
            |--------------------------------------------------------------------------
            | CEK SEMUA PRODUK
            |--------------------------------------------------------------------------
            */

            foreach ($validated['products'] as $item) {

                $product = Product::findOrFail(
                    $item['product_id']
                );

                $quantity = (int) $item['quantity'];

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

                $orderItems[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'size' => $item['size'] ?? null,
                    'color' => $item['color'] ?? null,
                ];
            }


            /*
            |--------------------------------------------------------------------------
            | BUAT ORDER
            |--------------------------------------------------------------------------
            */

            $order = Order::create([

                'user_id' => Auth::id(),

                'order_number' =>
                    'ORD-' .
                    now()->format('YmdHis') .
                    '-' .
                    strtoupper(Str::random(4)),

                'address_name' =>
                    $validated['address_name'],

                'address_phone' =>
                    $validated['address_phone'],

                'address_full' =>
                    $validated['address_full'],

                'address_city' =>
                    $validated['address_city'],

                'address_postal_code' =>
                    $validated['address_postal_code'],

                'subtotal' => $subtotal,

                'total' => $subtotal,

                'payment_method' =>
                    $validated['payment_method'] ?? 'qris',

                'status' => 'pending',
            ]);


            /*
            |--------------------------------------------------------------------------
            | SIMPAN ORDER ITEMS + KURANGI STOK
            |--------------------------------------------------------------------------
            */

            foreach ($orderItems as $item) {

                $product = $item['product'];

                OrderItem::create([

                    'order_id' => $order->id,

                    'product_id' => $product->id,

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


            /*
            |--------------------------------------------------------------------------
            | HAPUS ITEM DARI KERANJANG
            |--------------------------------------------------------------------------
            |
            | Karena barang sudah menjadi pesanan,
            | barang tersebut tidak boleh tetap berada di keranjang.
            |
            */

            Auth::user()
                ->cartItems()
                ->delete();


            DB::commit();


            /*
            |--------------------------------------------------------------------------
            | KE QRIS
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route('payment.qris', $order->id);


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