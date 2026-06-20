<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi Supervisor</title>

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
            width: 130px;
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
            font-size: 9px;
            text-align: left;
        }

        .data-table td {
            border: 1px solid #d1d5db;
            padding: 7px 6px;
            vertical-align: middle;
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
            padding: 3px 7px;
            border-radius: 10px;
            font-size: 9px;
            font-weight: bold;
        }

        .badge-cash {
            background-color: #dcfce7;
            color: #166534;
        }

        .badge-qris {
            background-color: #dbeafe;
            color: #1d4ed8;
        }

        .badge-ewallet {
            background-color: #f3e8ff;
            color: #7e22ce;
        }

        .badge-transfer {
            background-color: #fef9c3;
            color: #854d0e;
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
        <h2>Laporan Transaksi Supervisor</h2>
        <p>Menampilkan data transaksi berdasarkan cabang supervisor yang sedang login</p>
    </div>

    <div class="info">
        <table>
            <tr>
                <td class="label">Nama Supervisor</td>
                <td>: {{ $supervisor->name }}</td>
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
                <th class="text-center" width="4%">No</th>
                <th width="14%">Kode Transaksi</th>
                <th width="13%">Cabang</th>
                <th width="12%">Kasir</th>
                <th width="10%">Metode</th>
                <th class="text-right" width="13%">Total</th>
                <th class="text-right" width="12%">Uang Tunai</th>
                <th class="text-right" width="12%">Kembalian</th>
                <th width="10%">Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @forelse($transactions as $transaction)
                <tr>
                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="font-semibold">
                        {{ $transaction->kode_transaksi }}
                    </td>

                    <td>
                        {{ $transaction->branch->nama_cabang ?? '-' }}
                    </td>

                    <td>
                        {{ $transaction->kasir->name ?? '-' }}
                    </td>

                    <td>
                        @if($transaction->payment_method == 'cash')
                            <span class="badge badge-cash">Cash</span>
                        @elseif($transaction->payment_method == 'qris')
                            <span class="badge badge-qris">QRIS</span>
                        @elseif($transaction->payment_method == 'e_wallet')
                            <span class="badge badge-ewallet">E-Wallet</span>
                        @elseif($transaction->payment_method == 'transfer')
                            <span class="badge badge-transfer">Transfer</span>
                        @else
                            <span class="muted">-</span>
                        @endif
                    </td>

                    <td class="text-right font-semibold">
                        Rp {{ number_format($transaction->total, 0, ',', '.') }}
                    </td>

                    <td class="text-right">
                        @if($transaction->cash_received)
                            Rp {{ number_format($transaction->cash_received, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </td>

                    <td class="text-right">
                        @if($transaction->change_amount)
                            Rp {{ number_format($transaction->change_amount, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </td>

                    <td>
                        {{ $transaction->tanggal }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center muted">
                        Belum ada transaksi pada cabang ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Laporan Transaksi Supervisor - {{ config('app.name') }}
    </div>

</body>
</html>