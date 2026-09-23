<x-layouts.app title="Pesanan Berhasil">
    <div class="max-w-sm mx-auto bg-white border border-gray-100 rounded-lg p-6 text-center">
        <div class="w-12 h-12 rounded-full bg-maroon text-white flex items-center justify-center mx-auto mb-4">✓</div>
        <h1 class="font-serif text-lg text-gray-800 mb-1">Pesanan Berhasil!</h1>
        <p class="text-xs text-gray-500 mb-4">Terima kasih, pesanan kamu telah berhasil dibuat.</p>

        <p class="text-xs text-gray-500">Total pembayaran</p>
        <p class="text-lg font-medium text-maroon mb-4">{{ $order->formatted_total }}</p>

        <div class="text-left text-xs text-gray-600 border-t border-gray-100 pt-4 space-y-1 mb-5">
            <p>Metode pembayaran: {{ $order->payment_method }}</p>
            <p>Estimasi pengiriman: 2-3 hari kerja</p>
            <p class="pt-2">Alamat Pengiriman:</p>
            <p>{{ $order->address_name }} &middot; {{ $order->address_full }}, {{ $order->address_city }}</p>
            <p class="pt-2">Nomor pesanan: {{ $order->order_number }}</p>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('orders.show', $order) }}" class="flex-1 border border-maroon text-maroon text-sm py-2.5 rounded-md">Lihat pesanan</a>
            <a href="{{ route('home') }}" class="flex-1 bg-maroon text-white text-sm py-2.5 rounded-md">Kembali ke Beranda</a>
        </div>
    </div>
</x-layouts.app>