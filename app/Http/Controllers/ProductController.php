<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('penjual.produk', compact('products'));
    }

    public function create()
    {
        return view('penjual.tambah-produk');
    }

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
            $data['sizes'] = array_map('trim', explode(',', $data['sizes']));
        }

        if (!empty($data['colors'])) {
            $data['colors'] = array_map('trim', explode(',', $data['colors']));
        }

        Product::create($data);

        return redirect()
            ->route('penjual.produk')
            ->with('success', 'Produk berhasil ditambahkan.');
    }
}