<x-layouts.app title="Profil Saya">
    <h1 class="font-serif text-xl text-gray-800 mb-6">Profil Saya</h1>

    <div class="grid md:grid-cols-2 gap-6 max-w-2xl">
        <div class="bg-white border border-gray-100 rounded-lg p-5 flex items-center gap-3">
            <div class="w-12 h-12 rounded-full bg-maroon text-white flex items-center justify-center font-medium">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div>
                <p class="text-sm font-medium text-gray-800">{{ $user->name }}</p>
                <p class="text-xs text-gray-400">{{ $user->email }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('profile.update') }}" class="bg-white border border-gray-100 rounded-lg p-5 space-y-4">
            @csrf @method('PUT')
            <h2 class="text-sm font-medium text-gray-800 mb-1">Edit Profil</h2>

            <div>
                <label class="block text-xs text-gray-600 mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                       class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-gray-600 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                       class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-gray-600 mb-1">Nomor HP</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                       class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
            </div>

            <div class="flex gap-3 pt-2">
                <button type="reset" class="flex-1 border border-gray-300 text-sm py-2.5 rounded-md">Batal</button>
                <button class="flex-1 bg-maroon text-white text-sm py-2.5 rounded-md hover:bg-maroon-dark">Simpan</button>
            </div>
        </form>
    </div>
</x-layouts.app>