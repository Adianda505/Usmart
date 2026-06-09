<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Buat Transaksi
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

            <form action="{{ route('kasir.transaksi.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block mb-2">Pilih Produk</label>

                    <select name="product_id" class="border p-2 w-full" required>
                        <option value="">-- Pilih Produk --</option>

                        @foreach($products as $item)
                            <option value="{{ $item->product->id }}">
                                {{ $item->product->nama_barang }}
                                - Stok: {{ $item->stok }}
                                - Rp {{ number_format($item->product->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Qty</label>
                    <input type="number" name="qty" class="border p-2 w-full" min="1" required>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Simpan Transaksi
                </button>

            </form>

        </div>

    </div>

</x-app-layout>