<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Produk</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            padding: 30px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #2563eb;
            text-decoration: none;
            font-size: 15px;
        }

        .back:hover {
            text-decoration: underline;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            color: #222;
            font-size: 28px;
        }

        .btn-add {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            background: #2563eb;
            font-size: 14px;
        }

        .btn-add:hover {
            background: #1d4ed8;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        th,
        td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #f1f5f9;
            color: #333;
        }

        tr:hover {
            background: #f8fafc;
        }

        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .no-image {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: #777;
            border-radius: 8px;
            font-size: 12px;
            text-align: center;
        }

        .edit {
            display: inline-block;
            padding: 7px 12px;
            background: #f59e0b;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
        }

        .edit:hover {
            background: #d97706;
        }

        .delete {
            display: inline-block;
            padding: 7px 12px;
            background: #dc2626;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
            margin-left: 5px;
        }

        .delete:hover {
            background: #b91c1c;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 30px;
        }

        .harga {
            font-weight: bold;
        }

        .stok {
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    {{-- Kembali ke dashboard --}}
    <a
        href="{{ route('penjual.dashboard') }}"
        class="back"
    >
        ← Kembali ke Dashboard Penjual
    </a>


    {{-- Header --}}
    <div class="header">

        <h1>Kelola Produk</h1>

        <a
            href="{{ route('produk.create') }}"
            class="btn-add"
        >
            + Tambah Produk
        </a>

    </div>


    {{-- Pesan berhasil --}}
    @if (session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Tabel --}}
    <div class="card">

        <table>

            <thead>

                <tr>

                    <th width="5%">
                        No
                    </th>

                    <th>
                        Gambar
                    </th>

                    <th>
                        Nama Produk
                    </th>

                    <th>
                        Kategori
                    </th>

                    <th>
                        Harga
                    </th>

                    <th>
                        Stok
                    </th>

                    <th>
                        Ukuran
                    </th>

                    <th>
                        Warna
                    </th>

                    <th width="18%">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse ($produks as $produk)

                    <tr>

                        {{-- Nomor --}}
                        <td>
                            {{ $loop->iteration }}
                        </td>


                        {{-- Gambar --}}
                        <td>

                            @if ($produk->gambar)

                                <img
                                    src="{{ asset('storage/' . $produk->gambar) }}"
                                    alt="{{ $produk->nama_produk }}"
                                    class="product-image"
                                >

                            @else

                                <div class="no-image">
                                    Tidak ada gambar
                                </div>

                            @endif

                        </td>


                        {{-- Nama --}}
                        <td>
                            {{ $produk->nama_produk }}
                        </td>


                        {{-- Kategori --}}
                        <td>
                            {{ $produk->kategori->nama_kategori ?? '-' }}
                        </td>


                        {{-- Harga --}}
                        <td class="harga">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </td>


                        {{-- Stok --}}
                        <td class="stok">
                            {{ $produk->stok }}
                        </td>


                        {{-- Ukuran --}}
                        <td>
                            {{ $produk->ukuran ?? '-' }}
                        </td>


                        {{-- Warna --}}
                        <td>
                            {{ $produk->warna ?? '-' }}
                        </td>


                        {{-- Aksi --}}
                        <td>

                            <a
                                href="{{ route('produk.edit', $produk->id) }}"
                                class="edit"
                            >
                                Edit
                            </a>


                            <form
                                action="{{ route('produk.destroy', $produk->id) }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?');"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete"
                                >
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="9"
                            class="empty"
                        >
                            Belum ada produk.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>

</html>