<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800">
                Dashboard Gudang
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Ringkasan data produk dan pergerakan stok barang
            </p>
        </div>
    </x-slot>

    <div class="p-6 space-y-6">

        {{-- CARD RINGKASAN --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-500">
                <p class="text-sm text-gray-500">Total Produk</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">
                    {{ $totalProducts }}
                </h3>
                <p class="text-xs text-gray-400 mt-2">
                    Jumlah semua produk
                </p>
            </div>

            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-500">
                <p class="text-sm text-gray-500">Total Stok Produk</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">
                    {{ $totalStokProduk }}
                </h3>
                <p class="text-xs text-gray-400 mt-2">
                    Akumulasi stok di data produk
                </p>
            </div>

            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-emerald-500">
                <p class="text-sm text-gray-500">Barang Masuk</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">
                    {{ $totalBarangMasuk }}
                </h3>
                <p class="text-xs text-gray-400 mt-2">
                    Total qty stok masuk
                </p>
            </div>

            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-red-500">
                <p class="text-sm text-gray-500">Barang Keluar</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">
                    {{ $totalBarangKeluar }}
                </h3>
                <p class="text-xs text-gray-400 mt-2">
                    Total qty stok keluar
                </p>
            </div>

            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-purple-500">
                <p class="text-sm text-gray-500">Stock Movement</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">
                    {{ $totalStockMovement }}
                </h3>
                <p class="text-xs text-gray-400 mt-2">
                    Jumlah riwayat stok
                </p>
            </div>

        </div>

        {{-- MENU AKSI --}}
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                Menu Gudang
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <a href="{{ route('products.index') }}"
                    class="block p-5 rounded-lg border hover:bg-blue-50 hover:border-blue-400 transition">
                    <h4 class="font-semibold text-gray-800">
                        Data Produk
                    </h4>
                    <p class="text-sm text-gray-500 mt-1">
                        Kelola data produk, harga, kategori, dan barcode.
                    </p>
                </a>

                <a href="{{ route('stock.index') }}"
                    class="block p-5 rounded-lg border hover:bg-green-50 hover:border-green-400 transition">
                    <h4 class="font-semibold text-gray-800">
                        Data Stock Movement
                    </h4>
                    <p class="text-sm text-gray-500 mt-1">
                        Lihat riwayat barang masuk dan keluar.
                    </p>
                </a>

                <a href="{{ route('stock.create') }}"
                    class="block p-5 rounded-lg border hover:bg-purple-50 hover:border-purple-400 transition">
                    <h4 class="font-semibold text-gray-800">
                        Tambah Stock Movement
                    </h4>
                    <p class="text-sm text-gray-500 mt-1">
                        Input stok masuk atau stok keluar ke cabang.
                    </p>
                </a>

            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- PRODUK STOK RENDAH --}}
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            Produk Stok Rendah
                        </h3>
                        <p class="text-sm text-gray-500">
                            Produk dengan stok kurang dari atau sama dengan 10
                        </p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600">
                                <th class="px-4 py-3 text-left">Produk</th>
                                <th class="px-4 py-3 text-left">Barcode</th>
                                <th class="px-4 py-3 text-center">Stok</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($produkStokRendah as $product)
                                <tr class="border-b">
                                    <td class="px-4 py-3 font-medium text-gray-800">
                                        {{ $product->nama_barang }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">
                                        {{ $product->barcode ?? '-' }}
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                            {{ $product->stok <= 5 ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700' }}">
                                            {{ $product->stok }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                                        Tidak ada produk dengan stok rendah.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- STOCK MOVEMENT TERBARU --}}
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            Stock Movement Terbaru
                        </h3>
                        <p class="text-sm text-gray-500">
                            Riwayat terbaru barang masuk dan keluar
                        </p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600">
                                <th class="px-4 py-3 text-left">Produk</th>
                                <th class="px-4 py-3 text-left">Cabang</th>
                                <th class="px-4 py-3 text-center">Type</th>
                                <th class="px-4 py-3 text-center">Qty</th>
                                <th class="px-4 py-3 text-left">Tanggal</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($stockMovementsTerbaru as $movement)
                                <tr class="border-b">
                                    <td class="px-4 py-3 font-medium text-gray-800">
                                        {{ $movement->product->nama_barang ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3 text-gray-600">
                                        {{ $movement->branch->nama_cabang ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        @if ($movement->type == 'masuk')
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                                Masuk
                                            </span>
                                        @else
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                                Keluar
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 text-center font-semibold">
                                        {{ $movement->qty }}
                                    </td>

                                    <td class="px-4 py-3 text-gray-600">
                                        {{ \Carbon\Carbon::parse($movement->tanggal)->format('d M Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                        Belum ada data stock movement.
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