<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800">
                Dashboard Kasir
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Ringkasan transaksi dan metode pembayaran cabang Anda
            </p>
        </div>
    </x-slot>

    <div class="p-6 space-y-6">

        {{-- INFO KASIR --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800">
                Selamat datang, {{ $kasir->name }}
            </h3>

            <p class="text-gray-600 mt-1">
                Anda sedang bertugas di cabang:
                <span class="font-semibold text-gray-800">
                    {{ $kasir->branch->nama_cabang ?? 'Cabang belum ditentukan' }}
                </span>
            </p>
        </div>

        {{-- CARD RINGKASAN --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <p class="text-sm text-gray-500">Transaksi Hari Ini</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-2">
                    {{ $totalTransaksiHariIni }}
                </h3>
                <p class="text-xs text-gray-400 mt-1">
                    Jumlah transaksi hari ini
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <p class="text-sm text-gray-500">Pendapatan Hari Ini</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-2">
                    Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}
                </h3>
                <p class="text-xs text-gray-400 mt-1">
                    Total pembayaran hari ini
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <p class="text-sm text-gray-500">Total Transaksi</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-2">
                    {{ $totalSemuaTransaksi }}
                </h3>
                <p class="text-xs text-gray-400 mt-1">
                    Semua transaksi cabang
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <p class="text-sm text-gray-500">Total Pendapatan</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-2">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </h3>
                <p class="text-xs text-gray-400 mt-1">
                    Semua pendapatan cabang
                </p>
            </div>

        </div>

        {{-- METODE PEMBAYARAN --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Metode Pembayaran
                    </h3>
                    <p class="text-sm text-gray-500">
                        Ringkasan transaksi berdasarkan metode pembayaran
                    </p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="border-b bg-gray-50 text-gray-600">
                            <th class="px-4 py-3 font-semibold">Metode Pembayaran</th>
                            <th class="px-4 py-3 font-semibold">Jumlah Transaksi</th>
                            <th class="px-4 py-3 font-semibold">Total Pendapatan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($metodePembayaran as $metode)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                        {{ strtoupper($metode->payment_method ?? 'Tidak diketahui') }}
                                    </span>
                                </td>

                                <td class="px-4 py-3 text-gray-700">
                                    {{ $metode->total_transaksi }}
                                </td>

                                <td class="px-4 py-3 font-semibold text-gray-800">
                                    Rp {{ number_format($metode->total_pendapatan, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                                    Belum ada data metode pembayaran.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- TRANSAKSI TERBARU --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Transaksi Terbaru
                    </h3>
                    <p class="text-sm text-gray-500">
                        Daftar 10 transaksi terbaru pada cabang Anda
                    </p>
                </div>

                <a href="{{ route('kasir.transaksi.index') }}"
                   class="text-sm font-semibold text-blue-600 hover:text-blue-800">
                    Lihat Semua
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="border-b bg-gray-50 text-gray-600">
                            <th class="px-4 py-3 font-semibold">Kode</th>
                            <th class="px-4 py-3 font-semibold">Tanggal</th>
                            <th class="px-4 py-3 font-semibold">Kasir</th>
                            <th class="px-4 py-3 font-semibold">Metode</th>
                            <th class="px-4 py-3 font-semibold">Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($transactions as $transaction)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 font-semibold text-gray-800">
                                    {{ $transaction->kode_transaksi }}
                                </td>

                                <td class="px-4 py-3 text-gray-600">
                                    {{ \Carbon\Carbon::parse($transaction->tanggal)->format('d M Y') }}
                                </td>

                                <td class="px-4 py-3 text-gray-600">
                                    {{ $transaction->user->name ?? '-' }}
                                </td>

                                <td class="px-4 py-3">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                        {{ strtoupper($transaction->payment_method ?? '-') }}
                                    </span>
                                </td>

                                <td class="px-4 py-3 font-semibold text-gray-800">
                                    Rp {{ number_format($transaction->total, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-500">
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