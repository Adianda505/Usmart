<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Produk Cabang Saya
        </h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
            <div class="bg-green-200 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-200 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded shadow">

            <h1 class="text-xl font-bold mb-4">
                Daftar Produk yang Dikirim Gudang ke Cabang
            </h1>

            <table class="w-full border border-gray-300">

                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2">No</th>
                        <th class="border p-2">Nama Produk</th>
                        <th class="border p-2">Cabang</th>
                        <th class="border p-2">Harga</th>
                        <th class="border p-2">Stok Cabang</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $item)
                        <tr>
                            <td class="border p-2 text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border p-2">
                                {{ $item->product->nama_barang ?? '-' }}
                            </td>

                            <td class="border p-2">
                                {{ $item->branch->nama_cabang ?? '-' }}
                            </td>

                            <td class="border p-2">
                                Rp {{ number_format($item->product->harga ?? 0, 0, ',', '.') }}
                            </td>

                            <td class="border p-2 text-center">
                                {{ $item->stok }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border p-4 text-center text-gray-500">
                                Belum ada produk yang dikirim ke cabang ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>