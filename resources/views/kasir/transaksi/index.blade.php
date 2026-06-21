<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">

            <h2 class="text-2xl font-bold text-gray-800">
                Data Transaksi
            </h2>

            <a href="{{ route('branch.transactions.exportPdf') }}"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                Export PDF
            </a>
        </div>
    </x-slot>

    <div class="p-6">

        @if (session('success'))
            <div class="bg-green-200 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-200 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded shadow">

            <table class="w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2">No</th>
                        <th class="border p-2">Kode Transaksi</th>
                        <th class="border p-2">Kasir</th>
                        <th class="border p-2">Cabang</th>
                        <th class="border p-2">Total</th>
                        <th class="border p-2">Tanggal</th>
                        <th class="px-4 py-2">Metode Pembayaran</th>
                        <th class="px-4 py-2">Uang Tunai</th>
                        <th class="px-4 py-2">Kembalian</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($transactions as $transaction)
                        <tr>
                            <td class="border p-2 text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border p-2">
                                {{ $transaction->kode_transaksi }}
                            </td>

                            <td class="border p-2">
                                {{ $transaction->user->name ?? '-' }}
                            </td>

                            <td class="border p-2">
                                {{ $transaction->branch->nama_cabang ?? '-' }}
                            </td>

                            <td class="border p-2">
                                Rp{{ number_format($transaction->total, 0, ',', '.') }}
                            </td>

                            <td class="border p-2">
                                {{ $transaction->tanggal }}
                            </td>
                            <td class="px-4 py-2">
                                {{ strtoupper(str_replace('_', ' ', $transaction->payment_method)) }}
                            </td>

                            <td class="px-4 py-2">
                                @if ($transaction->cash_received)
                                    Rp {{ number_format($transaction->cash_received, 0, ',', '.') }}
                                @else
                                    -
                                @endif
                            </td>

                            <td class="px-4 py-2">
                                @if ($transaction->change_amount)
                                    Rp {{ number_format($transaction->change_amount, 0, ',', '.') }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="border p-3 text-center text-gray-500">
                                Belum ada data transaksi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>

</x-app-layout>
