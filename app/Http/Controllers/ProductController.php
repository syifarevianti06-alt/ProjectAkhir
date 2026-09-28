<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::latest()->take(5)->get();
        return view('home', compact('products'));
    }

    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }
        if ($request->filled('category') && $request->category !== 'Semua') {
            $query->where('category', $request->category);
        }

        $products = $query->latest()->paginate(10)->withQueryString();
        $categories = ['Semua','Atasan','Bawahan','Dress','Outer','Setelan'];

        return view('products.index', compact('products','categories'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}