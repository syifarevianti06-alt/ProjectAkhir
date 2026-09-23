<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Lune Attiré' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cream min-h-screen flex flex-col">
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-serif text-lg text-maroon">Lune Attiré</a>
            <div class="hidden md:flex gap-6 text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-maroon">Beranda</a>
                <a href="{{ route('products.index') }}" class="hover:text-maroon">Produk</a>
                <a href="{{ route('orders.index') }}" class="hover:text-maroon">Pesanan</a>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('cart.index') }}" class="text-gray-600 hover:text-maroon">🛍</a>
                <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-maroon">👤</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-xs text-gray-400 hover:text-maroon">Keluar</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="flex-1 max-w-6xl w-full mx-auto px-4 py-8">
        @if (session('status'))
            <div class="mb-4 text-sm text-green-700 bg-green-50 border border-green-200 rounded-md p-3">
                {{ session('status') }}
            </div>
        @endif
        {{ $slot }}
    </main>

    <footer class="text-center text-xs text-gray-400 py-6">
        &copy; {{ date('Y') }} Lune Attiré. Semua hak dilindungi.
    </footer>
</body>
</html>