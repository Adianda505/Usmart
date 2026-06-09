<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Data Transaksi Semua Cabang
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="bg-white p-6 rounded shadow mb-6">

            <form method="GET" action="{{ route('owner.transactions.index') }}" class="flex gap-4 items-end">

                <div>
                    <label class="block mb-1 font-semibold">Filter Cabang</label>
                    <select name="branch_id" class="border rounded px-3 py-2">
                        <option value="">Semua Cabang</option>

                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}"
                                {{ request('branch_id') == $branch->id ? 'selected' : '' }}>
                                {{ $branch->nama_cabang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Filter
                </button>

                <a href="{{ route('owner.transactions.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded">
                    Reset
                </a>

            </form>

        </div>

        <div class="bg-white p-6 rounded shadow">

            <table class="w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2">No</th>
                        <th class="border p-2">Kode Transaksi</th>
                        <th class="border p-2">Cabang</th>
                        <th class="border p-2">Kasir</th>
                        <th class="border p-2">Total</th>
                        <th class="border p-2">Tanggal</th>
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
                                {{ $transaction->branch->nama_cabang ?? '-' }}
                            </td>

                            <td class="border p-2">
                                {{ $transaction->kasir->name ?? '-' }}
                            </td>

                            <td class="border p-2">
                                Rp {{ number_format($transaction->total, 0, ',', '.') }}
                            </td>

                            <td class="border p-2">
                                {{ $transaction->tanggal }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="border p-4 text-center text-gray-500">
                                Belum ada transaksi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>

</x-app-layout>