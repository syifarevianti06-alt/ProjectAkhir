<x-layouts.app title="Beranda">
    <div class="bg-maroon/10 rounded-lg p-10 mb-10">
        <h1 class="font-serif text-3xl md:text-4xl text-maroon max-w-md mb-3">Tampil Stylish, Jadi Dirimu Sendiri</h1>
        <p class="text-sm text-gray-600 max-w-sm mb-5">Temukan koleksi fashion pilihan untuk melengkapi gaya setiap harimu.</p>
        <a href="{{ route('products.index') }}" class="inline-block bg-maroon text-white text-sm px-5 py-2.5 rounded-md hover:bg-maroon-dark">Belanja Sekarang</a>
    </div>

    <h2 class="font-serif text-xl text-gray-800 mb-1">Produk Terbaru</h2>
    <p class="text-xs text-gray-400 mb-5">{{ $products->count() }} produk ditemukan</p>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
        @foreach ($products as $product)
            <div class="bg-white rounded-lg overflow-hidden border border-gray-100">
                <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1520975916090-3105956dac38?q=80&w=400' }}" class="w-full h-40 object-cover">
                <div class="p-3">
                    <p class="text-xs text-gray-400">{{ $product->category }}</p>
                    <p class="text-sm text-gray-800 line-clamp-2 h-10">{{ $product->name }}</p>
                    <p class="text-sm font-medium text-gray-800 mt-1">{{ $product->formatted_price }}</p>
                    <a href="{{ route('products.show', $product) }}" class="block text-center mt-2 text-xs bg-maroon text-white rounded-md py-1.5 hover:bg-maroon-dark">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
</x-layouts.app>