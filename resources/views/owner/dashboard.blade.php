<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard Owner
        </h2>
    </x-slot>

    <div class="p-6">

        {{-- CARD STATISTIK --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

            <div class="bg-white p-5 rounded shadow">
                <p class="text-gray-500">Total Cabang</p>
                <h3 class="text-2xl font-bold">{{ $totalCabang }}</h3>
            </div>

            <div class="bg-white p-5 rounded shadow">
                <p class="text-gray-500">Total Produk</p>
                <h3 class="text-2xl font-bold">{{ $totalProduk }}</h3>
            </div>

            <div class="bg-white p-5 rounded shadow">
                <p class="text-gray-500">Total Kasir</p>
                <h3 class="text-2xl font-bold">{{ $totalKasir }}</h3>
            </div>

            <div class="bg-white p-5 rounded shadow">
                <p class="text-gray-500">Total Manajer</p>
                <h3 class="text-2xl font-bold">{{ $totalManajer }}</h3>
            </div>

            <div class="bg-white p-5 rounded shadow">
                <p class="text-gray-500">Total Supervisor</p>
                <h3 class="text-2xl font-bold">{{ $totalSupervisor }}</h3>
            </div>

            <div class="bg-white p-5 rounded shadow">
                <p class="text-gray-500">Total Transaksi</p>
                <h3 class="text-2xl font-bold">{{ $totalTransaksi }}</h3>
            </div>

            <div class="bg-white p-5 rounded shadow md:col-span-2">
                <p class="text-gray-500">Total Pendapatan</p>
                <h3 class="text-2xl font-bold">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </h3>
            </div>

        </div>

        {{-- MENU CEPAT --}}
        {{-- <div class="bg-white p-5 rounded shadow mb-6">
            <h3 class="text-lg font-semibold mb-4">Menu Cepat</h3>

            <div class="flex flex-wrap gap-3">

                <a href="{{ route('branches.index') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Kelola Cabang
                </a>

                <a href="{{ route('kasir.index') }}"
                   class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Kelola Kasir
                </a>

                <a href="{{ route('products.index') }}"
                   class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                    Lihat Produk
                </a>

                <a href="{{ route('stock.index') }}"
                   class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">
                    Stock Movement
                </a>

                <a href="{{ route('owner.transactions') }}"
                   class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
                    Lihat Transaksi
                </a>

            </div>
        </div> --}}

        {{-- DATA CABANG --}}
        {{-- <div class="bg-white p-5 rounded shadow mb-6">
            <h3 class="text-lg font-semibold mb-4">Data Cabang</h3>

            <div class="overflow-x-auto">
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama Cabang</th>
                            <th class="border p-2">Kota</th>
                            <th class="border p-2">Alamat</th>
                            <th class="border p-2">Jumlah Kasir</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($branches as $branch)
                            <tr>
                                <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                                <td class="border p-2">{{ $branch->nama_cabang }}</td>
                                <td class="border p-2">{{ $branch->kota }}</td>
                                <td class="border p-2">{{ $branch->alamat }}</td>
                                <td class="border p-2 text-center">{{ $branch->total_kasir }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border p-3 text-center text-gray-500">
                                    Belum ada data cabang.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div> --}}

        {{-- TRANSAKSI TERBARU --}}
        {{-- <div class="bg-white p-5 rounded shadow mb-6">
            <h3 class="text-lg font-semibold mb-4">Transaksi Terbaru</h3>

            <div class="overflow-x-auto">
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
                        @forelse ($transaksiTerbaru as $transaksi)
                            <tr>
                                <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                                <td class="border p-2">{{ $transaksi->kode_transaksi }}</td>
                                <td class="border p-2">
                                    {{ $transaksi->branch->nama_cabang ?? '-' }}
                                </td>
                                <td class="border p-2">
                                    {{ $transaksi->user->name ?? '-' }}
                                </td>
                                <td class="border p-2">
                                    Rp {{ number_format($transaksi->total, 0, ',', '.') }}
                                </td>
                                <td class="border p-2">
                                    {{ $transaksi->tanggal ?? $transaksi->created_at->format('d-m-Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border p-3 text-center text-gray-500">
                                    Belum ada transaksi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div> --}}

        {{-- STOK RENDAH --}}
        {{-- <div class="bg-white p-5 rounded shadow mb-6">
            <h3 class="text-lg font-semibold mb-4">Produk dengan Stok Rendah</h3>

            <div class="overflow-x-auto">
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2">Produk</th>
                            <th class="border p-2">Cabang</th>
                            <th class="border p-2">Stok</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($stokRendah as $stok)
                            <tr>
                                <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                                <td class="border p-2">
                                    {{ $stok->product->nama_barang ?? '-' }}
                                </td>
                                <td class="border p-2">
                                    {{ $stok->branch->nama_cabang ?? '-' }}
                                </td>
                                <td class="border p-2 text-center">
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded">
                                        {{ $stok->stok }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border p-3 text-center text-gray-500">
                                    Tidak ada stok rendah.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div> --}}

        {{-- STOCK MOVEMENT TERBARU --}}
        {{-- <div class="bg-white p-5 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Stock Movement Terbaru</h3>

            <div class="overflow-x-auto">
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2">Produk</th>
                            <th class="border p-2">Cabang</th>
                            <th class="border p-2">Tipe</th>
                            <th class="border p-2">Qty</th>
                            <th class="border p-2">Tanggal</th>
                            <th class="border p-2">Keterangan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($stockMovements as $movement)
                            <tr>
                                <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                                <td class="border p-2">
                                    {{ $movement->product->nama_barang ?? '-' }}
                                </td>
                                <td class="border p-2">
                                    {{ $movement->branch->nama_cabang ?? '-' }}
                                </td>
                                <td class="border p-2 text-center">
                                    @if ($movement->type == 'masuk')
                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded">
                                            Masuk
                                        </span>
                                    @else
                                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded">
                                            Keluar
                                        </span>
                                    @endif
                                </td>
                                <td class="border p-2 text-center">{{ $movement->qty }}</td>
                                <td class="border p-2">{{ $movement->tanggal }}</td>
                                <td class="border p-2">{{ $movement->keterangan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="border p-3 text-center text-gray-500">
                                    Belum ada data stock movement.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div> --}}

    </div>

</x-app-layout>