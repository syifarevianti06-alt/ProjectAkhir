<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Baju - Beranda</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f5f5;
            color: #222;
        }

        .navbar {
            background: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .menu a {
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        .logout {
            background: #222;
            color: white;
            border: none;
            padding: 9px 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        .container {
            padding: 40px;
        }

        .welcome {
            background: white;
            padding: 35px;
            border-radius: 12px;
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .welcome p {
            color: #666;
        }

        .section-title {
            margin-bottom: 20px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .card p {
            color: #666;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            background: #222;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="navbar">

        <div class="logo">
            Toko Baju
        </div>

        <div class="menu">

            <a href="#">Beranda</a>
            <a href="#">Katalog</a>
            <a href="#">Keranjang</a>
            <a href="#">Pesanan Saya</a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout">
                    Logout
                </button>
            </form>

        </div>

    </div>

    <div class="container">

        <div class="welcome">

            <h1>
                Halo, {{ auth()->user()->name }}!
            </h1>

            <p>
                Selamat datang di Toko Baju.
                Silakan pilih produk yang ingin kamu beli.
            </p>

        </div>

        <h2 class="section-title">
            Menu Pelanggan
        </h2>

        <div class="cards">

            <div class="card">
                <h3>Katalog Produk</h3>

                <p>
                    Lihat berbagai produk baju yang tersedia.
                </p>

                <a href="#" class="button">
                    Lihat Katalog
                </a>
            </div>

            <div class="card">
                <h3>Keranjang</h3>

                <p>
                    Lihat produk yang sudah kamu pilih.
                </p>

                <a href="#" class="button">
                    Lihat Keranjang
                </a>
            </div>

            <div class="card">
                <h3>Pesanan Saya</h3>

                <p>
                    Lihat status pesanan yang sudah dibuat.
                </p>

                <a href="#" class="button">
                    Lihat Pesanan
                </a>
            </div>

        </div>

    </div>

</body>
</html>