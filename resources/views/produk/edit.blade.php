<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Produk</title>

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
            max-width: 800px;
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

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        h1 {
            color: #222;
            font-size: 28px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input[type="file"] {
            padding: 9px;
            background: #fff;
            cursor: pointer;
        }

        .file-info {
            margin-top: 7px;
            font-size: 12px;
            color: #777;
        }

        .current-image {
            margin-bottom: 15px;
        }

        .current-image p {
            margin-bottom: 8px;
            font-size: 13px;
            color: #555;
        }

        .current-image img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .no-image {
            width: 150px;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: #777;
            border-radius: 10px;
            border: 1px solid #ddd;
            font-size: 13px;
            text-align: center;
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 13px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            padding: 11px 18px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #333;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .card {
                padding: 20px;
            }

            .row {
                grid-template-columns: 1fr;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <a
        href="{{ route('produk.index') }}"
        class="back"
    >
        ← Kembali ke Produk
    </a>

    <div class="card">

        <h1>Edit Produk</h1>

        <form
            action="{{ route('produk.update', $produk->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            {{-- Kategori --}}
            <div class="form-group">

                <label for="kategori_id">
                    Kategori
                </label>

                <select
                    id="kategori_id"
                    name="kategori_id"
                    required
                >

                    <option value="">
                        -- Pilih Kategori --
                    </option>

                    @foreach ($kategoris as $kategori)

                        <option
                            value="{{ $kategori->id }}"
                            {{ old('kategori_id', $produk->kategori_id) == $kategori->id ? 'selected' : '' }}
                        >
                            {{ $kategori->nama_kategori }}
                        </option>

                    @endforeach

                </select>

                @error('kategori_id')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Nama Produk --}}
            <div class="form-group">

                <label for="nama_produk">
                    Nama Produk
                </label>

                <input
                    type="text"
                    id="nama_produk"
                    name="nama_produk"
                    value="{{ old('nama_produk', $produk->nama_produk) }}"
                    placeholder="Contoh: Kaos Oversize"
                    required
                >

                @error('nama_produk')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Deskripsi --}}
            <div class="form-group">

                <label for="deskripsi">
                    Deskripsi
                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    placeholder="Masukkan deskripsi produk..."
                >{{ old('deskripsi', $produk->deskripsi) }}</textarea>

                @error('deskripsi')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Harga dan Stok --}}
            <div class="row">

                <div class="form-group">

                    <label for="harga">
                        Harga
                    </label>

                    <input
                        type="number"
                        id="harga"
                        name="harga"
                        value="{{ old('harga', $produk->harga) }}"
                        placeholder="Contoh: 75000"
                        min="0"
                        required
                    >

                    @error('harga')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="stok">
                        Stok
                    </label>

                    <input
                        type="number"
                        id="stok"
                        name="stok"
                        value="{{ old('stok', $produk->stok) }}"
                        placeholder="Contoh: 20"
                        min="0"
                        required
                    >

                    @error('stok')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            {{-- Ukuran dan Warna --}}
            <div class="row">

                <div class="form-group">

                    <label for="ukuran">
                        Ukuran
                    </label>

                    <input
                        type="text"
                        id="ukuran"
                        name="ukuran"
                        value="{{ old('ukuran', $produk->ukuran) }}"
                        placeholder="Contoh: M, L, XL"
                    >

                    @error('ukuran')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="warna">
                        Warna
                    </label>

                    <input
                        type="text"
                        id="warna"
                        name="warna"
                        value="{{ old('warna', $produk->warna) }}"
                        placeholder="Contoh: Hitam"
                    >

                    @error('warna')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            {{-- Gambar Lama --}}
            <div class="form-group">

                <label>
                    Gambar Saat Ini
                </label>

                <div class="current-image">

                    @if ($produk->gambar)

                        <p>
                            Gambar produk yang tersimpan:
                        </p>

                        <img
                            src="{{ asset('storage/' . $produk->gambar) }}"
                            alt="{{ $produk->nama_produk }}"
                        >

                    @else

                        <div class="no-image">
                            Belum ada gambar
                        </div>

                    @endif

                </div>

            </div>


            {{-- Ganti Gambar --}}
            <div class="form-group">

                <label for="gambar">
                    Ganti Gambar
                </label>

                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    accept="image/jpeg,image/png,image/webp"
                >

                <div class="file-info">
                    Kosongkan jika tidak ingin mengganti gambar.
                    Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                </div>

                @error('gambar')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Tombol --}}
            <div class="buttons">

                <a
                    href="{{ route('produk.index') }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>