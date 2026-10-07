<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PenjualProdukController extends Controller
{
    /**
     * Menampilkan semua produk.
     */
    public function index()
    
    {
        $products = Product::latest()->paginate(10);

        return view('penjual.produk', compact('products'));
    }

    /**
     * Menampilkan detail produk.
     */
    public function show(Product $products)
    {
        return view('penjual.produk.show', compact('products'));
    }

    /**
     * Menampilkan halaman edit produk.
     */
    public function edit(Product $products)
    {
        return view('penjual.produk.edit', compact('products'));
    }

    /**
     * Menyimpan perubahan produk.
     */
    public function update(Request $request, Product $products)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'sizes' => ['nullable', 'string', 'max:255'],
            'colors' => ['nullable', 'string', 'max:255'],
        ]);

        $products->update([
            'name' => $validated['name'],
            'category' => $validated['category'] ?? null,
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'sizes' => $validated['sizes'] ?? null,
            'colors' => $validated['colors'] ?? null,
        ]);

        return redirect()
            ->route('penjual.produk')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk.
     */
    public function destroy(Product $products)
    {
        $products->delete();

        return redirect()
            ->route('penjual.produk')
            ->with('success', 'Produk berhasil dihapus.');
    }
}