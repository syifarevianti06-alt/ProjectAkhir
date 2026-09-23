<x-layouts.app title="Pesanan Saya">
    <h1 class="font-serif text-xl text-gray-800 mb-4">Pesanan saya</h1>

    <div class="flex gap-4 text-sm mb-6 border-b border-gray-200">
        @foreach (['semua' => 'Semua','diproses' => 'Diproses','dikirim' => 'Dikirim','selesai' => 'Selesai'] as $key => $label)
            <a href="{{ route('orders.index', ['status' => $key]) }}"
               class="pb-2 {{ request('status', 'semua') === $key ? 'text-maroon border-b-2 border-maroon' : 'text-gray-400' }}">{{ $label }}</a>
        @endforeach
    </div>

    <div class="space-y-4">
        @forelse ($orders as $order)
            <div class="bg-white border border-gray-100 rounded-lg p-4">
                <div class="flex justify-between text-xs text-gray-400 mb-3">
                    <span>{{ $order->created_at->translatedFormat('d F Y') }}</span>
                    <span class="text-maroon font-medium">{{ ucfirst($order->status) }}</span>
                </div>
                @foreach ($order->items as $item)
                    <div class="flex gap-3 mb-2">
                        <img src="{{ $item->product_image ?? 'https://images.unsplash.com/photo-1520975916090-3105956dac38?q=80&w=200' }}" class="w-14 h-16 object-cover rounded-md">
                        <div class="flex-1">
                            <p class="text-sm text-gray-800">{{ $item->product_name }} x{{ $item->quantity }}</p>
                            <p class="text-sm font-medium text-gray-800">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('orders.show', $order) }}" class="text-xs text-maroon">Lihat Detail</a>
            </div>
        @empty
            <p class="text-sm text-gray-500">Belum ada pesanan.</p>
        @endforelse
    </div>
</x-layouts.app>