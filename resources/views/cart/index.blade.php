<x-layouts.app title="Keranjang Belanja">
    <h1 class="font-serif text-xl text-gray-800 mb-6">Keranjang Belanja</h1>

    @if ($items->isEmpty())
        <p class="text-sm text-gray-500">Keranjang kamu masih kosong.</p>
    @else
        <div class="grid md:grid-cols-3 gap-8">
            <div class="md:col-span-2 space-y-4">
                @foreach ($items as $item)
                    <div class="bg-white border border-gray-100 rounded-lg p-4 flex gap-4">
                        <img src="{{ $item->product->image ?? 'https://images.unsplash.com/photo-1520975916090-3105956dac38?q=80&w=200' }}" class="w-20 h-24 object-cover rounded-md">
                        <div class="flex-1">
                            <p class="text-sm text-gray-800">{{ $item->product->name }}</p>
                            <p class="text-xs text-gray-400">Ukuran: {{ $item->size }} &middot; Warna: {{ $item->color }}</p>
                            <p class="text-sm font-medium text-maroon mt-1">{{ $item->product->formatted_price }}</p>

                            <div class="flex items-center gap-3 mt-3">
                                <form method="POST" action="{{ route('cart.update', $item) }}" class="flex items-center gap-2">
                                    @csrf @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                           class="w-16 border border-gray-300 rounded-md px-2 py-1 text-sm" onchange="this.form.submit()">
                                </form>
                                <form method="POST" action="{{ route('cart.destroy', $item) }}">
                                    @csrf @method('DELETE')
                                    <button class="text-xs text-gray-400 hover:text-red-500">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="bg-white border border-gray-100 rounded-lg p-5 h-fit">
                <h2 class="text-sm font-medium text-gray-800 mb-4">Ringkasan Pesanan</h2>
                <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span>Subtotal ({{ $items->count() }} produk)</span>
                    <span>Rp {{ number_format($total, 0, ',', '.') }},00</span>
                </div>
                <div class="flex justify-between text-sm font-medium text-gray-800 border-t border-gray-100 pt-3 mb-4">
                    <span>Total pembayaran</span>
                    <span>Rp {{ number_format($total, 0, ',', '.') }},00</span>
                </div>
                <a href="{{ route('checkout.index') }}" class="block text-center bg-maroon text-white text-sm py-2.5 rounded-md hover:bg-maroon-dark">Checkout</a>
            </div>
        </div>
    @endif
</x-layouts.app>