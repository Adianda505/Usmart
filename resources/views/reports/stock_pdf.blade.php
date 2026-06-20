<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Stock</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
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
            font-size: 9px;
            text-align: left;
        }

        td {
            border: 1px solid #d1d5db;
            padding: 7px 6px;
        }

        .text-center {
            text-align: center;
        }

        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 9px;
            font-weight: bold;
        }

        .badge-masuk {
            background-color: #dcfce7;
            color: #166534;
        }

        .badge-keluar {
            background-color: #fee2e2;
            color: #991b1b;
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
        <h2>Laporan Data Stock Movement</h2>
        <p>Menampilkan seluruh riwayat barang masuk dan barang keluar</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th width="20%">Produk</th>
                <th width="18%">Cabang</th>
                <th width="10%">Tipe</th>
                <th class="text-center" width="8%">Qty</th>
                <th width="14%">Tanggal</th>
                <th width="25%">Keterangan</th>
            </tr>
        </thead>

        <tbody>
            @forelse($stocks as $stock)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>

                    <td>
                        {{ $stock->product->nama_barang ?? '-' }}
                    </td>

                    <td>
                        {{ $stock->branch->nama_cabang ?? '-' }}
                    </td>

                    <td>
                        @if($stock->type == 'masuk')
                            <span class="badge badge-masuk">Masuk</span>
                        @elseif($stock->type == 'keluar')
                            <span class="badge badge-keluar">Keluar</span>
                        @else
                            <span class="muted">-</span>
                        @endif
                    </td>

                    <td class="text-center">
                        {{ $stock->qty }}
                    </td>

                    <td>
                        {{ $stock->tanggal }}
                    </td>

                    <td>
                        {{ $stock->keterangan ?? '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center muted">
                        Belum ada data stock movement.
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