<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Detail Pesanan</title>

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
            max-width: 1100px;
            margin: auto;
            padding: 40px;
        }

        .box {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .box h2 {
            margin-bottom: 20px;
        }

        .info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .info-item {
            background: #f8f8f8;
            padding: 15px;
            border-radius: 8px;
        }

        .info-item strong {
            display: block;
            margin-bottom: 5px;
        }

        .info-item span {
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 13px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #fafafa;
        }

        .total {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }

        .status-form {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .button {
            background: #222;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        @media (max-width: 700px) {

            .container {
                padding: 25px 20px;
            }

            .info {
                grid-template-columns: 1fr;
            }

            .status-form {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>

</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">

        <a
            href="{{ route('penjual.pesanan.index') }}"
            class="back"
        >
            ← Kembali ke Pesanan
        </a>

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

        <!-- INFORMASI PESANAN -->
        <div class="box">

            <h2>
                Detail Pesanan #{{ $pesanan->id }}
            </h2>

            <div class="info">

                <div class="info-item">

                    <strong>
                        Pelanggan
                    </strong>

                    <span>
                        {{ $pesanan->user->name ?? '-' }}
                    </span>

                </div>


                <div class="info-item">

                    <strong>
                        Email
                    </strong>

                    <span>
                        {{ $pesanan->user->email ?? '-' }}
                    </span>

                </div>


                <div class="info-item">

                    <strong>
                        Tanggal Pesanan
                    </strong>

                    <span>
                        {{ $pesanan->tanggal_pesanan
                            ? $pesanan->tanggal_pesanan->format('d-m-Y H:i')
                            : '-' }}
                    </span>

                </div>


                <div class="info-item">

                    <strong>
                        Status
                    </strong>

                    <span>
                        {{ ucfirst($pesanan->status) }}
                    </span>

                </div>

            </div>

        </div>


        <!-- ALAMAT -->
        <div class="box">

            <h2>
                Alamat Pengiriman
            </h2>

            @if($pesanan->alamat)

                <p>
                    <strong>
                        {{ $pesanan->alamat->nama_penerima }}
                    </strong>
                </p>

                <p>
                    {{ $pesanan->alamat->nomor_telepon }}
                </p>

                <p>
                    {{ $pesanan->alamat->alamat_lengkap }}
                </p>

                <p>
                    {{ $pesanan->alamat->kota }},
                    {{ $pesanan->alamat->provinsi }}
                    {{ $pesanan->alamat->kode_pos }}
                </p>

            @else

                <p>
                    Alamat tidak tersedia.
                </p>

            @endif

        </div>


        <!-- PRODUK -->
        <div class="box">

            <h2>
                Produk yang Dipesan
            </h2>

            @if($pesanan->detailPesanans->count() > 0)

                <table>

                    <thead>

                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($pesanan->detailPesanans as $detail)

                            <tr>

                                <td>
                                    {{ $detail->produk->nama_produk ?? '-' }}
                                </td>

                                <td>
                                    Rp {{ number_format($detail->harga, 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ $detail->jumlah }}
                                </td>

                                <td>
                                    Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>


                <div class="total">

                    Total:
                    Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}

                </div>

            @else

                <p>
                    Belum ada detail produk.
                </p>

            @endif

        </div>


        <!-- PEMBAYARAN -->
        <div class="box">

            <h2>
                Pembayaran
            </h2>

            @if($pesanan->pembayaran)

                <p>
                    <strong>Metode:</strong>
                    {{ $pesanan->pembayaran->metode_pembayaran }}
                </p>

                <p>
                    <strong>Jumlah:</strong>
                    Rp {{ number_format($pesanan->pembayaran->jumlah_bayar, 0, ',', '.') }}
                </p>

                <p>
                    <strong>Status:</strong>
                    {{ ucfirst($pesanan->pembayaran->status) }}
                </p>

            @else

                <p>
                    Belum ada data pembayaran.
                </p>

            @endif

        </div>


        <!-- UBAH STATUS -->
        <div class="box">

            <h2>
                Ubah Status Pesanan
            </h2>

            <form
                action="{{ route('penjual.pesanan.status', $pesanan->id) }}"
                method="POST"
                class="status-form"
            >

                @csrf

                @method('PUT')

                <select name="status">

                    <option
                        value="menunggu"
                        {{ $pesanan->status === 'menunggu' ? 'selected' : '' }}
                    >
                        Menunggu
                    </option>

                    <option
                        value="diproses"
                        {{ $pesanan->status === 'diproses' ? 'selected' : '' }}
                    >
                        Diproses
                    </option>

                    <option
                        value="dikirim"
                        {{ $pesanan->status === 'dikirim' ? 'selected' : '' }}
                    >
                        Dikirim
                    </option>

                    <option
                        value="selesai"
                        {{ $pesanan->status === 'selesai' ? 'selected' : '' }}
                    >
                        Selesai
                    </option>

                    <option
                        value="dibatalkan"
                        {{ $pesanan->status === 'dibatalkan' ? 'selected' : '' }}
                    >
                        Dibatalkan
                    </option>

                </select>

                <button
                    type="submit"
                    class="button"
                >
                    Simpan Status
                </button>

            </form>

        </div>

    </div>

</body>

</html>