<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $items = $request->user()->cartItems()->with('product')->get();
        $total = $items->sum(fn ($item) => $item->subtotal);

        return view('cart.index', compact('items','total'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required','exists:products,id'],
            'size' => ['nullable','string'],
            'color' => ['nullable','string'],
            'quantity' => ['required','integer','min:1'],
        ]);

        $item = CartItem::firstOrNew([
            'user_id' => $request->user()->id,
            'product_id' => $validated['product_id'],
            'size' => $validated['size'] ?? null,
            'color' => $validated['color'] ?? null,
        ]);
        $item->quantity = ($item->quantity ?? 0) + $validated['quantity'];
        $item->save();

        return redirect()->route('cart.index')->with('status', 'Produk ditambahkan ke keranjang.');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        abort_unless($cartItem->user_id === $request->user()->id, 403);
        $validated = $request->validate(['quantity' => ['required','integer','min:1']]);
        $cartItem->update($validated);

        return back();
    }

    public function destroy(Request $request, CartItem $cartItem)
    {
        abort_unless($cartItem->user_id === $request->user()->id, 403);
        $cartItem->delete();

        return back();
    }
}