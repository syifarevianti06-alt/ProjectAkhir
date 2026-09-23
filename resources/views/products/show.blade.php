<x-layouts.app :title="$product->name">
    <div class="grid md:grid-cols-2 gap-10">
        <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1520975916090-3105956dac38?q=80&w=600' }}"
             class="w-full rounded-lg object-cover">

        <div>
            <h1 class="font-serif text-xl text-gray-800 mb-1">{{ $product->name }}</h1>
            <p class="text-lg text-maroon font-medium mb-4">{{ $product->formatted_price }}</p>
            <p class="text-sm text-gray-600 mb-6">{{ $product->description }}</p>

            <form method="POST" action="{{ route('cart.store') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                @if ($product->sizes)
                    <p class="text-xs text-gray-500 mb-2">Ukuran</p>
                    <div class="flex gap-2 mb-4">
                        @foreach ($product->sizes as $size)
                            <label class="cursor-pointer">
                                <input type="radio" name="size" value="{{ $size }}" class="peer hidden" required>
                                <span class="block px-3 py-1.5 text-sm border border-gray-300 rounded-md peer-checked:bg-maroon peer-checked:text-white peer-checked:border-maroon">{{ $size }}</span>
                            </label>
                        @endforeach
                    </div>
                @endif

                @if ($product->colors)
                    <p class="text-xs text-gray-500 mb-2">Warna</p>
                    <div class="flex gap-2 mb-4">
                        @foreach ($product->colors as $color)
                            <label class="cursor-pointer">
                                <input type="radio" name="color" value="{{ $color }}" class="peer hidden" required>
                                <span class="block px-3 py-1.5 text-sm border border-gray-300 rounded-md peer-checked:bg-maroon peer-checked:text-white peer-checked:border-maroon">{{ $color }}</span>
                            </label>
                        @endforeach
                    </div>
                @endif

                <p class="text-xs text-gray-500 mb-2">Jumlah &middot; Stok: {{ $product->stock }}</p>
                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}"
                       class="w-20 border border-gray-300 rounded-md px-2 py-1.5 text-sm mb-6">

                <div class="flex gap-3">
                    <button type="submit" class="flex-1 border border-maroon text-maroon text-sm py-2.5 rounded-md hover:bg-maroon/5">Tambah Keranjang</button>
                    <button type="submit" formaction="{{ route('cart.store') }}" name="buy_now" value="1"
                            class="flex-1 bg-maroon text-white text-sm py-2.5 rounded-md hover:bg-maroon-dark">Beli sekarang</button>
                </div>
            </form>

            <p class="text-xs text-gray-400 mt-6">Lune Attire Official Store &middot; Toko resmi</p>
        </div>
    </div>
</x-layouts.app>