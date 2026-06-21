<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800">
                    Data Transaksi Semua Cabang
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Menampilkan seluruh data transaksi dari semua cabang
                </p>
            </div>

            <a href="{{ route('owner.transactions.exportPdf', ['branch_id' => request('branch_id')]) }}"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                Export PDF
            </a>
        </div>
    </x-slot>

    <div class="p-6">

        {{-- FILTER --}}
        <div class="bg-white p-6 rounded-xl shadow mb-6">

            <form method="GET" action="{{ route('owner.transactions.index') }}" class="flex flex-wrap gap-4 items-end">

                <div class="w-full md:w-64">
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Filter Cabang
                    </label>

                    <select 
                        name="branch_id" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                    >
                        <option value="">Semua Cabang</option>

                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}"
                                {{ request('branch_id') == $branch->id ? 'selected' : '' }}>
                                {{ $branch->nama_cabang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button 
                    type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow"
                >
                    Filter
                </button>

                <a 
                    href="{{ route('owner.transactions.index') }}" 
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow"
                >
                    Reset
                </a>

            </form>

        </div>

        {{-- TABEL --}}
        <div class="bg-white rounded-xl shadow overflow-hidden">

            <div class="px-6 py-4 border-b">
                <h3 class="font-semibold text-gray-800">
                    Daftar Transaksi
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 text-center">No</th>
                            <th class="px-4 py-3">Kode Transaksi</th>
                            <th class="px-4 py-3">Cabang</th>
                            <th class="px-4 py-3">Kasir</th>
                            <th class="px-4 py-3">Metode</th>
                            <th class="px-4 py-3 text-right">Total</th>
                            <th class="px-4 py-3 text-right">Uang Tunai</th>
                            <th class="px-4 py-3 text-right">Kembalian</th>
                            <th class="px-4 py-3">Tanggal</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse($transactions as $transaction)
                            <tr class="hover:bg-gray-50">

                                <td class="px-4 py-3 text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-4 py-3 font-medium text-gray-800">
                                    {{ $transaction->kode_transaksi }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $transaction->branch->nama_cabang ?? '-' }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $transaction->kasir->name ?? '-' }}
                                </td>

                                <td class="px-4 py-3">
                                    @if($transaction->payment_method == 'cash')
                                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                                            Cash
                                        </span>
                                    @elseif($transaction->payment_method == 'qris')
                                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
                                            QRIS
                                        </span>
                                    @elseif($transaction->payment_method == 'e_wallet')
                                        <span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold">
                                            E-Wallet
                                        </span>
                                    @elseif($transaction->payment_method == 'transfer')
                                        <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold">
                                            Transfer
                                        </span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                <td class="px-4 py-3 text-right font-semibold">
                                    Rp {{ number_format($transaction->total, 0, ',', '.') }}
                                </td>

                                <td class="px-4 py-3 text-right">
                                    @if($transaction->cash_received)
                                        Rp {{ number_format($transaction->cash_received, 0, ',', '.') }}
                                    @else
                                        -
                                    @endif
                                </td>

                                <td class="px-4 py-3 text-right">
                                    @if($transaction->change_amount)
                                        Rp {{ number_format($transaction->change_amount, 0, ',', '.') }}
                                    @else
                                        -
                                    @endif
                                </td>

                                <td class="px-4 py-3">
                                    {{ $transaction->tanggal }}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-4 py-6 text-center text-gray-500">
                                    Belum ada transaksi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</x-app-layout>