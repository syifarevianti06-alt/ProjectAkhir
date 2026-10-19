<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class PenjualKategoriController extends Controller
{
    /**
     * Menampilkan daftar kategori dan form edit.
     */
    public function index()
    {
        $kategori = $this->ambilKategori();

        return view('Penjual.kategori.edit', [
            'kategori' => $kategori,
            'kategoriEdit' => null,
        ]);
    }

    /**
     * URL tambah lama diarahkan ke halaman daftar kategori.
     */
    public function create()
    {
        return redirect()->route('penjual.kategori');
    }

    /**
     * Menyimpan kategori baru.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                'unique:product_categories,name',
            ],
            'description' => [
                'nullable',
                'string',
                'max:500',
            ],
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.unique' => 'Nama kategori sudah tersedia.',
            'name.max' => 'Nama kategori maksimal 100 karakter.',
        ]);

        ProductCategory::create($data);

        return redirect()
            ->route('penjual.kategori')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan halaman yang sama dengan form edit terbuka.
     */
    public function edit(ProductCategory $kategori)
    {
        $daftarKategori = $this->ambilKategori();

        return view('Penjual.kategori.edit', [
            'kategori' => $daftarKategori,
            'kategoriEdit' => $kategori,
        ]);
    }

    /**
     * Memperbarui kategori.
     */
    public function update(Request $request, ProductCategory $kategori)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                'unique:product_categories,name,' . $kategori->id,
            ],
            'description' => [
                'nullable',
                'string',
                'max:500',
            ],
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.unique' => 'Nama kategori sudah digunakan.',
            'name.max' => 'Nama kategori maksimal 100 karakter.',
        ]);

        // Produk menyimpan nama kategori sebagai teks.
        // Perbarui nama kategori pada produk jika namanya berubah.
        if ($kategori->name !== $data['name']) {
            Product::where('category', $kategori->name)
                ->update(['category' => $data['name']]);
        }

        $kategori->update($data);

        return redirect()
            ->route('penjual.kategori')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori yang belum digunakan produk.
     */
    public function destroy(ProductCategory $kategori)
    {
        $jumlahProduk = Product::where(
            'category',
            $kategori->name
        )->count();

        if ($jumlahProduk > 0) {
            return redirect()
                ->route('penjual.kategori')
                ->with(
                    'error',
                    'Kategori tidak dapat dihapus karena masih digunakan oleh produk.'
                );
        }

        $kategori->delete();

        return redirect()
            ->route('penjual.kategori')
            ->with('success', 'Kategori berhasil dihapus.');
    }

    /**
     * Mengambil kategori beserta jumlah produknya.
     * total_produk adalah atribut sementara, bukan kolom database.
     */
    private function ambilKategori()
    {
        return ProductCategory::orderBy('name')
            ->get()
            ->map(function ($item) {
                $item->total_produk = Product::where(
                    'category',
                    $item->name
                )->count();

                return $item;
            });
    }
}
