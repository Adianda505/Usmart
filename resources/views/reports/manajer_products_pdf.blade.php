<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Produk Cabang Manajer</title>

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
            font-weight: bold;
        }

        .header p {
            margin: 4px 0 0;
            color: #6b7280;
            font-size: 11px;
        }

        .info {
            margin-bottom: 14px;
            font-size: 11px;
        }

        .info table {
            width: 100%;
            border-collapse: collapse;
        }

        .info td {
            border: none;
            padding: 3px 0;
        }

        .info .label {
            width: 120px;
            font-weight: bold;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            background-color: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
            padding: 8px 6px;
            text-transform: uppercase;
            font-size: 10px;
            text-align: left;
        }

        .data-table td {
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

        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 9px;
            font-weight: bold;
            background-color: #dcfce7;
            color: #166534;
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
        <h2>Laporan Produk Cabang</h2>
        <p>Menampilkan data produk berdasarkan cabang manajer yang sedang login</p>
    </div>

    <div class="info">
        <table>
            <tr>
                <td class="label">Nama Manajer</td>
                <td>: {{ $manajer->name }}</td>
            </tr>
            <tr>
                <td class="label">Cabang</td>
                <td>: {{ $branch->nama_cabang ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Cetak</td>
                <td>: {{ now()->format('d-m-Y H:i') }}</td>
            </tr>
        </table>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th width="28%">Nama Barang</th>
                <th width="20%">Kategori</th>
                <th class="text-right" width="17%">Harga</th>
                <th class="text-center" width="12%">Stok Cabang</th>
                <th width="18%">Cabang</th>
            </tr>
        </thead>

        <tbody>
            @forelse($products as $item)
                <tr>
                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="font-semibold">
                        {{ $item->product->nama_barang ?? '-' }}
                    </td>

                    <td>
                        {{ $item->product->category->nama_kategori ?? '-' }}
                    </td>

                    <td class="text-right">
                        Rp {{ number_format($item->product->harga ?? 0, 0, ',', '.') }}
                    </td>

                    <td class="text-center">
                        <span class="badge">
                            {{ $item->stok }}
                        </span>
                    </td>

                    <td>
                        {{ $item->branch->nama_cabang ?? '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center muted">
                        Belum ada produk pada cabang ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Laporan Produk Cabang - {{ config('app.name') }}
    </div>

</body>

</html>