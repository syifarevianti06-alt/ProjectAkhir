<x-layouts.app title="Alamat">
    <h1 class="font-serif text-xl text-gray-800 mb-6">{{ $address ? 'Ubah Alamat' : 'Tambah Alamat' }}</h1>

    <form method="POST" action="{{ $address ? route('addresses.update', $address) : route('addresses.store') }}"
          class="bg-white border border-gray-100 rounded-lg p-6 max-w-md space-y-4">
        @csrf
        @if ($address) @method('PUT') @endif

        <div>
            <label class="block text-xs text-gray-600 mb-1">Nama Penerima</label>
            <input type="text" name="name" value="{{ old('name', $address->name ?? '') }}" required
                   class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block text-xs text-gray-600 mb-1">Nomor HP</label>
            <input type="text" name="phone" value="{{ old('phone', $address->phone ?? '') }}" required
                   class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block text-xs text-gray-600 mb-1">Alamat Lengkap</label>
            <textarea name="address" rows="3" required class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">{{ old('address', $address->address ?? '') }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="block text-xs text-gray-600 mb-1">Kota</label>
                <input type="text" name="city" value="{{ old('city', $address->city ?? '') }}" required
                       class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-gray-600 mb-1">Kode Pos</label>
                <input type="text" name="postal_code" value="{{ old('postal_code', $address->postal_code ?? '') }}" required
                       class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <a href="{{ route('checkout.index') }}" class="flex-1 text-center border border-gray-300 text-sm py-2.5 rounded-md">Batal</a>
            <button class="flex-1 bg-maroon text-white text-sm py-2.5 rounded-md hover:bg-maroon-dark">Simpan</button>
        </div>
    </form>
</x-layouts.app>