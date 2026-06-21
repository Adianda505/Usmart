<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800">
                Dashboard Supervisor
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Ringkasan data transaksi cabang Anda
            </p>
        </div>
    </x-slot>

    <div class="p-6 space-y-6">

        {{-- INFO SUPERVISOR --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800">
                Selamat datang, {{ $supervisor->name }}
            </h3>

            <p class="text-gray-600 mt-1">
                Anda sedang melihat ringkasan transaksi untuk cabang:
                <span class="font-semibold text-gray-800">
                    {{ $supervisor->branch->nama_cabang ?? 'Cabang belum ditentukan' }}
                </span>
            </p>
        </div>

        {{-- CARD RINGKASAN --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Transaksi Hari Ini</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">
                            {{ $totalTransaksiHariIni }}
                        </h3>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                        <span class="text-blue-600 text-xl">🧾</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Pendapatan Hari Ini</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">
                            Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}
                        </h3>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center">
                        <span class="text-green-600 text-xl">💰</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Transaksi Bulan Ini</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">
                            {{ $totalTransaksiBulanIni }}
                        </h3>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center">
                        <span class="text-purple-600 text-xl">📊</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Pendapatan Bulan Ini</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">
                            Rp {{ number_format($pendapatanBulanIni, 0, ',', '.') }}
                        </h3>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center">
                        <span class="text-orange-600 text-xl">📈</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- BAGIAN TABEL --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- TRANSAKSI TERBARU --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            Transaksi Terbaru
                        </h3>
                        <p class="text-sm text-gray-500">
                            5 transaksi terakhir pada cabang Anda
                        </p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="border-b bg-gray-50 text-gray-600">
                                <th class="px-4 py-3 text-left font-semibold">Kode</th>
                                <th class="px-4 py-3 text-left font-semibold">Kasir</th>
                                <th class="px-4 py-3 text-left font-semibold">Total</th>
                                <th class="px-4 py-3 text-left font-semibold">Tanggal</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @forelse ($transaksiTerbaru as $transaction)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 font-medium text-gray-800">
                                        {{ $transaction->kode_transaksi }}
                                    </td>

                                    <td class="px-4 py-3 text-gray-600">
                                        {{ $transaction->user->name ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3 text-gray-800 font-semibold">
                                        Rp {{ number_format($transaction->total, 0, ',', '.') }}
                                    </td>

                                    <td class="px-4 py-3 text-gray-600">
                                        {{ \Carbon\Carbon::parse($transaction->tanggal)->format('d M Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                        Belum ada transaksi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- METODE PEMBAYARAN --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Ringkasan Metode Pembayaran
                    </h3>
                    <p class="text-sm text-gray-500">
                        Jumlah transaksi berdasarkan metode pembayaran
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="border-b bg-gray-50 text-gray-600">
                                <th class="px-4 py-3 text-left font-semibold">Metode</th>
                                <th class="px-4 py-3 text-left font-semibold">Transaksi</th>
                                <th class="px-4 py-3 text-left font-semibold">Pendapatan</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @forelse ($metodePembayaran as $method)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 text-gray-800 font-medium">
                                        {{ strtoupper($method->payment_method ?? '-') }}
                                    </td>

                                    <td class="px-4 py-3 text-gray-600">
                                        {{ $method->total_transaksi }}
                                    </td>

                                    <td class="px-4 py-3 text-gray-800 font-semibold">
                                        Rp {{ number_format($method->total_pendapatan, 0, ',', '.') }}
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

        </div>

        {{-- TRANSAKSI 7 HARI TERAKHIR --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">
                    Ringkasan Transaksi 7 Hari Terakhir
                </h3>
                <p class="text-sm text-gray-500">
                    Menampilkan jumlah transaksi dan pendapatan harian
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b bg-gray-50 text-gray-600">
                            <th class="px-4 py-3 text-left font-semibold">Tanggal</th>
                            <th class="px-4 py-3 text-left font-semibold">Total Transaksi</th>
                            <th class="px-4 py-3 text-left font-semibold">Total Pendapatan</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse ($transaksiPerHari as $data)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-800 font-medium">
                                    {{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}
                                </td>

                                <td class="px-4 py-3 text-gray-600">
                                    {{ $data->total_transaksi }}
                                </td>

                                <td class="px-4 py-3 text-gray-800 font-semibold">
                                    Rp {{ number_format($data->total_pendapatan, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                                    Belum ada transaksi dalam 7 hari terakhir.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</x-app-layout>