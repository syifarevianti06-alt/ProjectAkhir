<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $products = Product::latest()->get();

        return view('penjual.produk', compact('products'));
    }


    // Halaman tambah produk
    public function create()
    {
        return view('penjual.tambah-produk');
    }


    // Menyimpan produk baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'sizes' => 'nullable|string',
            'colors' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        $data['slug'] = Str::slug($data['name']);

        if (!empty($data['sizes'])) {
            $data['sizes'] = array_map(
                'trim',
                explode(',', $data['sizes'])
            );
        }

        if (!empty($data['colors'])) {
            $data['colors'] = array_map(
                'trim',
                explode(',', $data['colors'])
            );
        }

        Product::create($data);

        return redirect()
            ->route('penjual.produk')
            ->with('success', 'Produk berhasil ditambahkan.');
    }


    // Halaman edit produk
    public function edit(Product $product)
    {
        return view('penjual.edit-produk', compact('product'));
    }


    // Memperbarui produk
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',

            'category' => 'required|string|max:255',

            'price' => 'required|numeric|min:0',

            'stock' => 'required|integer|min:0',

            'description' => 'nullable|string',

            'sizes' => 'nullable|string',

            'colors' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        // Update gambar
        if ($request->hasFile('image')) {

            if (
                $product->image &&
                Storage::disk('public')->exists($product->image)
            ) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')
                ->store('products', 'public');
        } else {
            $data['image'] = $product->image;
        }


        // Slug mengikuti nama produk
        $data['slug'] = Str::slug($data['name']);


        // Ubah ukuran menjadi array
        if (!empty($data['sizes'])) {

            $data['sizes'] = array_map(
                'trim',
                explode(',', $data['sizes'])
            );
        } else {

            $data['sizes'] = null;
        }


        // Ubah warna menjadi array
        if (!empty($data['colors'])) {

            $data['colors'] = array_map(
                'trim',
                explode(',', $data['colors'])
            );
        } else {

            $data['colors'] = null;
        }


        $product->update($data);


        return redirect()
            ->route('penjual.produk')
            ->with('success', 'Produk berhasil diperbarui.');
    }


    // Menghapus produk
    public function destroy(Product $product)
    {

        if (
            $product->image &&
            Storage::disk('public')->exists($product->image)
        ) {
            Storage::disk('public')->delete($product->image);
        }


        $product->delete();


        return redirect()
            ->route('penjual.produk')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
