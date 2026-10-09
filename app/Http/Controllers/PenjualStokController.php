<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PenjualStokController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        $totalProduk = Product::count();

        $totalStok = Product::sum('stock');

        $stokMenipis = Product::where('stock', '>', 0)
            ->where('stock', '<=', 7)
            ->count();

        $stokHabis = Product::where('stock', 0)->count();

        return view('penjual.stok', compact(
            'products',
            'totalProduk',
            'totalStok',
            'stokMenipis',
            'stokHabis'
        ));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'stock' => ['required', 'integer', 'min:0'],
        ]);

        $product->update([
            'stock' => $data['stock'],
        ]);

        return redirect()
            ->route('penjual.stok')
            ->with('success', 'Stok berhasil diperbarui.');
    }
}
