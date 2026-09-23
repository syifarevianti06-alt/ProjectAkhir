<x-layouts.app title="Detail Pesanan">
    <h1 class="font-serif text-xl text-gray-800 mb-1">Pesanan {{ $order->order_number }}</h1>
    <p class="text-xs text-gray-400 mb-6">Status: {{ ucfirst($order->status) }}</p>

    <div class="bg-white border border-gray-100 rounded-lg p-5 mb-5">
        @foreach ($order->items as $item)
            <div class="flex gap-3 mb-3">
                <img src="{{ $item->product_image ?? 'https://images.unsplash.com/photo-1520975916090-3105956dac38?q=80&w=200' }}" class="w-16 h-20 object-cover rounded-md">
                <div class="flex-1">
                    <p class="text-sm text-gray-800">{{ $item->product_name }}</p>
                    <p class="text-xs text-gray-400">Ukuran: {{ $item->size }} &middot; Warna: {{ $item->color }} &middot; x{{ $item->quantity }}</p>
                    <p class="text-sm font-medium text-gray-800 mt-1">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="bg-white border border-gray-100 rounded-lg p-5 text-sm text-gray-600 space-y-1">
        <p class="font-medium text-gray-800">Alamat Pengiriman</p>
        <p>{{ $order->address_name }} &middot; {{ $order->address_phone }}</p>
        <p>{{ $order->address_full }}, {{ $order->address_city }}, {{ $order->address_postal_code }}</p>
        <p class="font-medium text-gray-800 pt-3">Total: {{ $order->formatted_total }}</p>
    </div>
</x-layouts.app>