<x-layouts.app title="Pembayaran QRIS">
    <div class="max-w-sm mx-auto bg-white border border-gray-100 rounded-lg p-6 text-center">
        <h1 class="font-serif text-lg text-gray-800 mb-1">Pembayaran QRIS</h1>
        <p class="text-xs text-gray-500 mb-4">Scan QR code di bawah untuk menyelesaikan pembayaran</p>

        <div class="bg-gray-100 w-48 h-48 mx-auto rounded-md flex items-center justify-center mb-4">
            <span class="text-xs text-gray-400">[QR CODE]</span>
        </div>

        <p class="text-xs text-gray-500">Nomor pesanan</p>
        <p class="text-sm font-medium text-gray-800 mb-3">{{ $order->order_number }}</p>

        <p class="text-xs text-gray-500">Total pembayaran</p>
        <p class="text-lg font-medium text-maroon mb-4">{{ $order->formatted_total }}</p>

        <div class="text-left text-xs text-gray-500 bg-gray-50 rounded-md p-3 mb-5">
            <p class="font-medium mb-1">Cara pembayaran:</p>
            <ol class="list-decimal list-inside space-y-1">
                <li>Buka aplikasi e-wallet atau mobile banking kamu</li>
                <li>Pilih menu Scan QR atau QRIS</li>
                <li>Arahkan kamera ke QR code di atas</li>
                <li>Periksa nominal dan konfirmasi pembayaran</li>
            </ol>
        </div>

        <form method="POST" action="{{ route('payment.confirm', $order) }}">
            @csrf
            <button class="w-full bg-maroon text-white text-sm py-2.5 rounded-md hover:bg-maroon-dark">Saya Sudah Bayar</button>
        </form>
    </div>
</x-layouts.app>