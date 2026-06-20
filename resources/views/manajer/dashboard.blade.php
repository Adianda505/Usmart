<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
            <div>
                <h2 class="font-bold text-2xl text-slate-800">
                    Dashboard Manajer
                </h2>
                <p class="text-sm text-slate-500 mt-1">
                    Ringkasan data stok produk dan transaksi pada cabang Anda.
                </p>
            </div>

            <div class="px-4 py-2 bg-white border border-slate-200 rounded-xl shadow-sm">
                <p class="text-xs text-slate-500">Login sebagai</p>
                <p class="text-sm font-semibold text-slate-800">
                    {{ $manajer->name }}
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- HERO / WELCOME --}}
            <div class="bg-slate-900 rounded-3xl p-8 mb-8 shadow-xl overflow-hidden relative">

                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/5 rounded-full -ml-16 -mb-16"></div>

                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                    <div>
                        <p class="text-slate-300 text-sm mb-2">
                            Selamat datang kembali,
                        </p>

                        <h1 class="text-3xl md:text-4xl font-bold text-white">
                            {{ $manajer->name }}
                        </h1>

                        <p class="text-slate-300 mt-3 max-w-2xl">
                            Anda sedang memantau data stok produk dan transaksi untuk cabang
                            <span class="font-semibold text-white">
                                {{ $manajer->branch->nama_cabang ?? 'Cabang belum ditentukan' }}
                            </span>.
                        </p>
                    </div>

                    <div class="bg-white/10 backdrop-blur rounded-2xl px-6 py-5 border border-white/10">
                        <p class="text-slate-300 text-sm">
                            Total Pendapatan Cabang
                        </p>

                        <h2 class="text-3xl font-bold text-white mt-1">
                            Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                        </h2>

                        <p class="text-xs text-slate-400 mt-2">
                            Akumulasi transaksi pada cabang ini
                        </p>
                    </div>

                </div>
            </div>

            {{-- CARD STATISTIK --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

                {{-- Total Produk --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
                            📦
                        </div>

                        <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">
                            Produk
                        </span>
                    </div>

                    <p class="text-sm text-slate-500">
                        Total Produk
                    </p>

                    <h3 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $totalProduk }}
                    </h3>

                    <p class="text-xs text-slate-400 mt-3">
                        Produk yang tersedia pada cabang ini
                    </p>
                </div>

                {{-- Total Stok --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                            🏷️
                        </div>

                        <span class="text-xs font-medium text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                            Stok
                        </span>
                    </div>

                    <p class="text-sm text-slate-500">
                        Total Stok
                    </p>

                    <h3 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $totalStok }}
                    </h3>

                    <p class="text-xs text-slate-400 mt-3">
                        Akumulasi seluruh stok produk cabang
                    </p>
                </div>

                {{-- Total Transaksi --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center text-xl">
                            💳
                        </div>

                        <span class="text-xs font-medium text-cyan-600 bg-cyan-50 px-3 py-1 rounded-full">
                            Transaksi
                        </span>
                    </div>

                    <p class="text-sm text-slate-500">
                        Total Transaksi
                    </p>

                    <h3 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $totalTransaksi }}
                    </h3>

                    <p class="text-xs text-slate-400 mt-3">
                        Jumlah transaksi pada cabang ini
                    </p>
                </div>

                {{-- Rata-rata Transaksi --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
                            💰
                        </div>

                        <span class="text-xs font-medium text-amber-600 bg-amber-50 px-3 py-1 rounded-full">
                            Rata-rata
                        </span>
                    </div>

                    <p class="text-sm text-slate-500">
                        Rata-rata / Transaksi
                    </p>

                    <h3 class="text-2xl font-bold text-slate-800 mt-1">
                        Rp {{ $totalTransaksi > 0 ? number_format($totalPendapatan / $totalTransaksi, 0, ',', '.') : 0 }}
                    </h3>

                    <p class="text-xs text-slate-400 mt-3">
                        Rata-rata pendapatan per transaksi
                    </p>
                </div>

            </div>

            {{-- DATA STOK PRODUK --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-8">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-5">
                    <div>
                        <h3 class="text-lg font-bold text-slate-800">
                            Data Stok Produk Cabang
                        </h3>

                        <p class="text-sm text-slate-500">
                            Daftar produk yang tersedia di cabang Anda.
                        </p>
                    </div>

                    <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">
                        {{ $stocks->count() }} Data Produk
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-slate-100 text-slate-600">
                                <th class="px-4 py-3 text-left rounded-l-xl">No</th>
                                <th class="px-4 py-3 text-left">Produk</th>
                                <th class="px-4 py-3 text-left">Harga</th>
                                <th class="px-4 py-3 text-left">Stok Cabang</th>
                                <th class="px-4 py-3 text-left rounded-r-xl">Cabang</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @forelse($stocks as $stock)
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-4 py-3 text-slate-600">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <p class="font-semibold text-slate-800">
                                            {{ $stock->product->nama_barang ?? '-' }}
                                        </p>
                                    </td>

                                    <td class="px-4 py-3 text-slate-600">
                                        Rp {{ number_format($stock->product->harga ?? 0, 0, ',', '.') }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                            {{ $stock->stok > 10 ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-600' }}">
                                            {{ $stock->stok }} stok
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 text-slate-600">
                                        {{ $stock->branch->nama_cabang ?? '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-8 text-center text-slate-500">
                                        Belum ada stok produk pada cabang ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

            {{-- DATA TRANSAKSI --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-5">
                    <div>
                        <h3 class="text-lg font-bold text-slate-800">
                            Data Transaksi Cabang
                        </h3>

                        <p class="text-sm text-slate-500">
                            Riwayat transaksi yang terjadi pada cabang Anda.
                        </p>
                    </div>

                    <span class="text-xs font-medium text-cyan-600 bg-cyan-50 px-3 py-1 rounded-full">
                        {{ $transactions->count() }} Transaksi
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-slate-100 text-slate-600">
                                <th class="px-4 py-3 text-left rounded-l-xl">No</th>
                                <th class="px-4 py-3 text-left">Kode Transaksi</th>
                                <th class="px-4 py-3 text-left">Kasir</th>
                                <th class="px-4 py-3 text-left">Tanggal</th>
                                <th class="px-4 py-3 text-left">Total</th>
                                <th class="px-4 py-3 text-left rounded-r-xl">Cabang</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @forelse($transactions as $transaction)
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-4 py-3 text-slate-600">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <span class="font-semibold text-slate-800">
                                            {{ $transaction->kode_transaksi }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 text-slate-600">
                                        {{ $transaction->user->name ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3 text-slate-600">
                                        {{ $transaction->tanggal }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <span class="font-semibold text-slate-800">
                                            Rp {{ number_format($transaction->total, 0, ',', '.') }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 text-slate-600">
                                        {{ $transaction->branch->nama_cabang ?? '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-8 text-center text-slate-500">
                                        Belum ada transaksi pada cabang ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>