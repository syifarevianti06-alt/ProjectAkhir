<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Kategori</title>

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
            max-width: 1000px;
            margin: auto;
        }

        /* Tombol kembali */
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

        /* Header */
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

        /* Tombol tambah */
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

        /* Card */
        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        /* Pesan berhasil */
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1f5f9;
            color: #333;
        }

        tr:hover {
            background: #f8fafc;
        }

        /* Tombol edit */
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

        /* Tombol hapus */
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

        /* Jika kategori kosong */
        .empty {
            text-align: center;
            color: #777;
            padding: 30px;
        }

        /* Responsive */
        @media (max-width: 600px) {

            body {
                padding: 15px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .card {
                padding: 15px;
                overflow-x: auto;
            }

            table {
                min-width: 600px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    {{-- Tombol kembali ke dashboard --}}
    <a href="{{ route('admin.dashboard') }}" class="back">
        ← Kembali ke Dashboard
    </a>


    {{-- Header --}}
    <div class="header">

        <h1>Kelola Kategori</h1>

        <a
            href="{{ route('kategori.create') }}"
            class="btn-add"
        >
            + Tambah Kategori
        </a>

    </div>


    {{-- Pesan berhasil --}}
    @if (session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Card tabel --}}
    <div class="card">

        <table>

            <thead>

                <tr>

                    <th width="10%">
                        No
                    </th>

                    <th>
                        Nama Kategori
                    </th>

                    <th width="25%">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse ($kategoris as $kategori)

                    <tr>

                        {{-- Nomor --}}
                        <td>
                            {{ $loop->iteration }}
                        </td>


                        {{-- Nama kategori --}}
                        <td>
                            {{ $kategori->nama_kategori }}
                        </td>


                        {{-- Tombol aksi --}}
                        <td>

                            {{-- Edit --}}
                            <a
                                href="{{ route('kategori.edit', $kategori->id) }}"
                                class="edit"
                            >
                                Edit
                            </a>


                            {{-- Hapus --}}
                            <form
                                action="{{ route('kategori.destroy', $kategori->id) }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Yakin ingin menghapus kategori ini?');"
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
                            colspan="3"
                            class="empty"
                        >
                            Belum ada kategori.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>

</html>