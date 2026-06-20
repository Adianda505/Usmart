branches : 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Cabang</title>

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
        <h2>Laporan Data Cabang</h2>
        <p>Menampilkan seluruh data cabang</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th width="30%">Nama Cabang</th>
                <th width="20%">Kota</th>
                <th width="45%">Alamat</th>
            </tr>
        </thead>

        <tbody>
            @forelse($branches as $branch)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>

                    <td>
                        {{ $branch->nama_cabang }}
                    </td>

                    <td>
                        {{ $branch->kota ?? '-' }}
                    </td>

                    <td>
                        {{ $branch->alamat ?? '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center muted">
                        Belum ada data cabang.
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