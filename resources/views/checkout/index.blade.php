<x-layouts.app title="Checkout">
    <h1 class="font-serif text-xl text-gray-800 mb-6">Checkout</h1>

    <div class="grid md:grid-cols-3 gap-8">
        <div class="md:col-span-2 space-y-6">
            <div class="bg-white border border-gray-100 rounded-lg p-5">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-sm font-medium text-gray-800">Alamat Pengiriman</h2>
                    @if ($address)
                        <a href="{{ route('addresses.edit', $address) }}" class="text-xs text-maroon">Ubah</a>
                    @else
                        <a href="{{ route('addresses.create') }}" class="text-xs text-maroon">+ Tambah</a>
                    @endif
                </div>
                @if ($address)
                    <p class="text-sm text-gray-700">{{ $address->name }} &middot; {{ $address->phone }}</p>
                    <p class="text-xs text-gray-500">{{ $address->address }}, {{ $address->city }}, {{ $address->postal_code }}</p>
                @else
                    <p class="text-sm text-red-500">Belum ada alamat. Silakan tambahkan alamat pengiriman.</p>
                @endif
            </div>

            <div class="bg-white border border-gray-100 rounded-lg p-5">
                <h2 class="text-sm font-medium text-gray-800 mb-3">Metode Pembayaran</h2>
                <div class="border border-maroon rounded-md p-3 flex items-center gap-3 bg-maroon/5">
                    <span class="text-sm font-medium text-maroon">QRIS</span>
                    <span class="text-xs text-gray-500">Scan QR dari aplikasi apapun</span>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-100 rounded-lg p-5 h-fit">
            <h2 class="text-sm font-medium text-gray-800 mb-4">Ringkasan Pesanan</h2>
            @foreach ($items as $item)
                <div class="flex justify-between text-xs text-gray-600 mb-2">
                    <span>{{ $item->product->name }} x{{ $item->quantity }}</span>
                    <span>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                </div>
            @endforeach
            <div class="flex justify-between text-sm font-medium text-gray-800 border-t border-gray-100 pt-3 mt-3 mb-4">
                <span>Total pembayaran</span>
                <span>Rp {{ number_format($subtotal, 0, ',', '.') }},00</span>
            </div>
            <form method="POST" action="{{ route('checkout.store') }}">
                @csrf
                <button {{ $address ? '' : 'disabled' }}
                        class="w-full bg-maroon text-white text-sm py-2.5 rounded-md hover:bg-maroon-dark disabled:opacity-50">
                    Bayar sekarang
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>