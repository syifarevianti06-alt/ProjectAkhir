<x-layouts.app title="Katalog Produk">
    <h1 class="font-serif text-2xl text-gray-800 mb-1">Katalog Produk</h1>
    <p class="text-xs text-gray-400 mb-5">Temukan produk fashion pilihan Lune Attire</p>

    <form method="GET" class="flex flex-col md:flex-row gap-3 mb-6">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..."
               class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
        <select name="category" onchange="this.form.submit()" class="border border-gray-300 rounded-md px-3 py-2 text-sm">
            @foreach ($categories as $cat)
                <option value="{{ $cat }}" @selected(request('category', 'Semua') === $cat)>{{ $cat }}</option>
            @endforeach
        </select>
        <button class="bg-maroon text-white text-sm px-4 py-2 rounded-md">Cari</button>
    </form>

    <p class="text-xs text-gray-400 mb-4">{{ $products->total() }} Produk ditemukan</p>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
        @foreach ($products as $product)
            <div class="bg-white rounded-lg overflow-hidden border border-gray-100">
                <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1520975916090-3105956dac38?q=80&w=400' }}" class="w-full h-40 object-cover">
                <div class="p-3">
                    <p class="text-sm text-gray-800 line-clamp-2 h-10">{{ $product->name }}</p>
                    <p class="text-sm font-medium text-gray-800 mt-1">{{ $product->formatted_price }}</p>
                    <a href="{{ route('products.show', $product) }}" class="block text-center mt-2 text-xs bg-maroon text-white rounded-md py-1.5 hover:bg-maroon-dark">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8">{{ $products->links() }}</div>
</x-layouts.app>