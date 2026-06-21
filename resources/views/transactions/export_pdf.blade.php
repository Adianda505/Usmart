<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #111827;
        }

        h2 {
            text-align: center;
            margin-bottom: 4px;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 20px;
            font-size: 11px;
            color: #6b7280;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #1f2937;
            color: white;
            padding: 8px;
            border: 1px solid #d1d5db;
            font-size: 11px;
        }

        td {
            padding: 7px;
            border: 1px solid #d1d5db;
            font-size: 11px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Laporan Transaksi</h2>
    <div class="subtitle">
        Dicetak pada: {{ now()->format('d-m-Y H:i') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Tanggal</th>
                <th>Cabang</th>
                <th>Kasir</th>
                <th>Metode Pembayaran</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $transaction->kode_transaksi }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->tanggal)->format('d-m-Y H:i') }}</td>
                    <td>{{ $transaction->branch->nama_cabang ?? '-' }}</td>
                    <td>{{ $transaction->user->name ?? '-' }}</td>
                    <td>{{ $transaction->metode_pembayaran ?? '-' }}</td>
                    <td class="text-right">
                        Rp {{ number_format($transaction->total, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        Tidak ada data transaksi.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>