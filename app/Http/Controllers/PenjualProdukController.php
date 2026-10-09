<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenjualProdukController extends Controller
{

    // Menampilkan semua produk.

    public function index()

    {
        $products = Product::latest()->paginate(10);

        return view('penjual.produk', compact('products'));
    }

    public function create()
    {
        return view('penjual.tambah-produk');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'sizes' => ['nullable', 'string'],
            'colors' => ['nullable', 'string'],

            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data = [
            'name' => $validated['name'],
            'category' => $validated['category'] ?? null,
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'stock' => $validated['stock'],

            'sizes' => !empty($validated['sizes'])
                ? array_map('trim', explode(',', $validated['sizes']))
                : null,

            'colors' => !empty($validated['colors'])
                ? array_map('trim', explode(',', $validated['colors']))
                : null,
        ];



        // BUAT PRODUK
        $product = Product::create($data);

        // SIMPAN BANYAK FOTO

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $index => $image) {

                $path = $image->store('products', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $path,
                ]);

                if ($index === 0) {
                    $product->update([
                        'image' => $path,
                    ]);
                }
            }
        }

        return redirect()
            ->route('penjual.produk')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan detail produk.

    public function show(Product $product)
    {
        return view('penjual.products.show', compact('product'));
    }

    // Menampilkan halaman edit produk.

    public function edit(Product $product)
    {
        return view('penjual.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'sizes' => ['nullable', 'string'],
            'colors' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data = [
            'name' => $validated['name'],
            'category' => $validated['category'] ?? null,
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'sizes' => !empty($validated['sizes'])
                ? array_map('trim', explode(',', $validated['sizes']))
                : null,
            'colors' => !empty($validated['colors'])
                ? array_map('trim', explode(',', $validated['colors']))
                : null,
        ];

        if ($request->hasFile('image')) {

            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()
            ->route('penjual.produk.show', $product->id)
            ->with('success', 'Produk berhasil diperbarui.');
    }

    //Menghapus produk.

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('penjual.produk')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
