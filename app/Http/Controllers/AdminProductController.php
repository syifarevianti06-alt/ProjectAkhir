<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * Daftar produk
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('category', 'like', '%' . $search . '%');
            });
        }

        // Filter kategori
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $products = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Statistik
        $totalProduk = Product::count();

        $totalStok = Product::sum('stock');

        $stokMenipis = Product::where('stock', '<=', 10)->count();

        $kategori = Product::whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->pluck('category');

        return view('admin.produk', compact(
            'products',
            'totalProduk',
            'totalStok',
            'stokMenipis',
            'kategori'
        ));
    }

    /**
     * Form tambah produk
     */
    public function create()
    {
        return view('admin.produk-create');
    }

    /**
     * Simpan produk
     */
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

        // Upload gambar
        if ($request->hasFile('image')) {
            $data['image'] = $request
                ->file('image')
                ->store('products', 'public');
        }

        // Slug otomatis
        $data['slug'] = Str::slug($data['name']);

        // Sizes dari string menjadi array
        if (!empty($data['sizes'])) {
            $data['sizes'] = array_map(
                'trim',
                explode(',', $data['sizes'])
            );
        } else {
            $data['sizes'] = null;
        }

        // Colors dari string menjadi array
        if (!empty($data['colors'])) {
            $data['colors'] = array_map(
                'trim',
                explode(',', $data['colors'])
            );
        } else {
            $data['colors'] = null;
        }

        Product::create($data);

        return redirect()
            ->route('admin.produk')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Form edit produk
     */
    public function edit(Product $product)
    {
        return view('admin.produk-edit', compact('product'));
    }

    /**
     * Update produk
     */
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

        // Slug
        $data['slug'] = Str::slug($data['name']);

        // Sizes
        if (!empty($data['sizes'])) {
            $data['sizes'] = array_map(
                'trim',
                explode(',', $data['sizes'])
            );
        } else {
            $data['sizes'] = null;
        }

        // Colors
        if (!empty($data['colors'])) {
            $data['colors'] = array_map(
                'trim',
                explode(',', $data['colors'])
            );
        } else {
            $data['colors'] = null;
        }

        // Jika upload gambar baru
        if ($request->hasFile('image')) {

            // Hapus gambar lama
            if ($product->image) {
                Storage::disk('public')->delete(
                    $product->image
                );
            }

            // Simpan gambar baru
            $data['image'] = $request
                ->file('image')
                ->store('products', 'public');
        }

        $product->update($data);

        return redirect()
            ->route('admin.produk')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Hapus produk
     */
    public function destroy(Product $product)
    {
        // Hapus gambar
        if ($product->image) {
            Storage::disk('public')->delete(
                $product->image
            );
        }

        // Hapus produk
        $product->delete();

        return redirect()
            ->route('admin.produk')
            ->with('success', 'Produk berhasil dihapus.');
    }
}