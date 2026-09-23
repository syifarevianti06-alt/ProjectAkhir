<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Penjual</title>

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

        /* NAVBAR */
        .navbar {
            background: #222;
            color: white;
            padding: 20px 40px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            font-size: 22px;
        }

        .logout {
            background: white;
            color: #222;

            border: none;
            padding: 9px 16px;

            border-radius: 6px;

            cursor: pointer;
            font-size: 14px;
        }

        .logout:hover {
            background: #eaeaea;
        }

        /* CONTAINER */
        .container {
            padding: 40px;
            max-width: 1200px;
            margin: auto;
        }

        /* WELCOME */
        .welcome {
            background: white;

            padding: 30px;

            border-radius: 12px;

            margin-bottom: 25px;

            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .welcome h1 {
            margin-bottom: 10px;
            font-size: 28px;
        }

        .welcome p {
            color: #666;
            margin-top: 5px;
        }

        .role {
            display: inline-block;

            margin-top: 15px;

            background: #222;
            color: white;

            padding: 6px 12px;

            border-radius: 20px;

            font-size: 13px;
        }

        /* CARDS */
        .cards {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 20px;
        }

        .card {
            background: white;

            padding: 25px;

            border-radius: 12px;

            text-decoration: none;

            color: #222;

            display: block;

            border: 1px solid #eee;

            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);

            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .card h3 {
            margin-bottom: 10px;

            font-size: 19px;
        }

        .card p {
            color: #666;

            line-height: 1.5;

            margin-bottom: 20px;
        }

        .button {
            display: inline-block;

            background: #222;
            color: white;

            padding: 9px 15px;

            border-radius: 6px;

            font-size: 14px;
        }

        /* RESPONSIVE */
        @media (max-width: 800px) {

            .navbar {
                padding: 18px 20px;
            }

            .container {
                padding: 25px 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">

        <h2>Toko Baju - Penjual</h2>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit" class="logout">
                Logout
            </button>

        </form>

    </div>


    <!-- CONTENT -->
    <div class="container">

        <!-- WELCOME -->
        <div class="welcome">

            <h1>
                Dashboard Penjual
            </h1>

            <p>
                Selamat datang,
                <strong>{{ auth()->user()->name }}</strong>!
            </p>

            <p>
                Kamu masuk sebagai penjual dan dapat mengelola produk toko.
            </p>

            <span class="role">
                Role: {{ auth()->user()->role }}
            </span>

        </div>


        <!-- MENU -->
        <div class="cards">

            <!-- KELOLA PRODUK -->
            <a href="{{ route('produk.index') }}" class="card">

                <h3>
                    Kelola Produk
                </h3>

                <p>
                    Tambah, lihat, edit, dan hapus produk baju.
                </p>

                <span class="button">
                    Buka Produk
                </span>

            </a>


            <!-- KELOLA KATEGORI -->
            <div class="card">

                <h3>
                    Kelola Kategori
                </h3>

                <p>
                    Kelola kategori produk toko.
                </p>

                <span class="button">
                    Segera
                </span>

            </div>


          <a
    href="{{ route('penjual.pesanan.index') }}"
    class="card"
>

    <h3>
        Kelola Pesanan
    </h3>

    <p>
        Lihat dan kelola pesanan pelanggan.
    </p>

    <span class="button">
        Buka Pesanan
    </span>

</a>
        </div>

    </div>

</body>

</html>