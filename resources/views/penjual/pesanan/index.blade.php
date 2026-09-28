<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Kelola Pesanan</title>

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
            background: #222;
            color: white;
            padding: 20px 40px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .back {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        .logout {
            background: white;
            color: #222;
            border: none;
            padding: 9px 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 40px;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin-bottom: 8px;
        }

        .header p {
            color: #666;
        }

        .success {
            background: #dff5e3;
            color: #216b2f;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .table-box {
            background: white;
            border-radius: 12px;
            overflow-x: auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        th {
            background: #fafafa;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #eee;
            font-size: 13px;
        }

        .action {
            display: inline-block;
            background: #222;
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 13px;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 30px;
        }

        @media (max-width: 800px) {
            .navbar {
                padding: 18px 20px;
            }

            .container {
                padding: 25px 20px;
            }
        }
    </style>

</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">

        <div>
            <a
                href="{{ route('penjual.dashboard') }}"
                class="back"
            >
                ← Dashboard
            </a>

            <strong>
                Toko Baju - Penjual
            </strong>
        </div>

        <form
            action="{{ route('logout') }}"
            method="POST"
        >
            @csrf

            <button
                type="submit"
                class="logout"
            >
                Logout
            </button>
        </form>

    </div>


    <!-- CONTENT -->
    <div class="container">

        <div class="header">

            <h1>
                Kelola Pesanan
            </h1>

            <p>
                Lihat dan kelola pesanan pelanggan.
            </p>

        </div>


        @if(session('success'))

            <div class="success">
                {{ session('success') }}
            </div>

        @endif


        <div class="table-box">

            @if($pesanans->count() > 0)

                <table>

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($pesanans as $pesanan)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $pesanan->user->name ?? '-' }}
                                </td>

                                <td>
                                    {{ $pesanan->tanggal_pesanan
                                        ? $pesanan->tanggal_pesanan->format('d-m-Y H:i')
                                        : '-' }}
                                </td>

                                <td>
                                    Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                                </td>

                                <td>

                                    <span class="status">
                                        {{ ucfirst($pesanan->status) }}
                                    </span>

                                </td>

                                <td>

                                    <a
                                        href="{{ route('penjual.pesanan.show', $pesanan->id) }}"
                                        class="action"
                                    >
                                        Detail
                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="empty">

                    Belum ada pesanan pelanggan.

                </div>

            @endif

        </div>

    </div>

</body>

</html>