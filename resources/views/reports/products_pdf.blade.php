<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Produk</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #111827;
        }

        .header {
            text-align: center;
            margin-bottom: 18px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
        }

        .header p {
            margin: 4px 0 0;
            color: #6b7280;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
            padding: 8px 6px;
            text-transform: uppercase;
            font-size: 10px;
            text-align: left;
        }

        td {
            border: 1px solid #d1d5db;
            padding: 7px 6px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .font-semibold {
            font-weight: bold;
        }

        .muted {
            color: #9ca3af;
        }

        .footer {
            margin-top: 16px;
            font-size: 10px;
            text-align: right;
            color: #6b7280;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Laporan Data Produk</h2>
        <p>Menampilkan seluruh data produk</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th width="25%">Nama Barang</th>
                <th width="20%">Kategori</th>
                <th class="text-right" width="20%">Harga</th>
                <th class="text-center" width="15%">Stok</th>
            </tr>
        </thead>

        <tbody>
            @forelse($products as $product)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>

                    <td class="font-semibold">
                        {{ $product->nama_barang }}
                    </td>

                    <td>
                        {{ $product->category->nama_kategori ?? '-' }}
                    </td>

                    <td class="text-right">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </td>

                    <td class="text-center">
                        {{ $product->stok }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center muted">
                        Belum ada data produk.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ now()->format('d-m-Y H:i') }}
    </div>

</body>
</html>