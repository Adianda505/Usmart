<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800">
                Buat Transaksi
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Tambahkan transaksi penjualan kasir
            </p>
        </div>
    </x-slot>

    <div class="p-6 flex justify-center">

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow p-6 max-w-3xl">

            <form action="{{ route('kasir.transaksi.store') }}" method="POST">
                @csrf

                {{-- PRODUK --}}
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Pilih Produk
                    </label>

                    <select 
                        name="product_id" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                        required
                    >
                        <option value="">-- Pilih Produk --</option>

                        @foreach($products as $item)
                            <option value="{{ $item->product->id }}">
                                {{ $item->product->nama_barang }}
                                - Stok: {{ $item->stok }}
                                - Rp {{ number_format($item->product->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>

                    @error('product_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- QTY --}}
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Qty
                    </label>

                    <input 
                        type="number" 
                        name="qty" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                        min="1" 
                        placeholder="Masukkan jumlah barang"
                        required
                    >

                    @error('qty')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- METODE PEMBAYARAN --}}
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Metode Pembayaran
                    </label>

                    <select 
                        name="payment_method" 
                        id="payment_method"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                        required
                    >
                        <option value="cash">Cash</option>
                        <option value="qris">QRIS</option>
                        <option value="e_wallet">E-Wallet</option>
                        <option value="transfer">Transfer</option>
                    </select>

                    @error('payment_method')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- UANG TUNAI --}}
                <div class="mb-5" id="cash_field">
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Uang Tunai
                    </label>

                    <input 
                        type="number" 
                        name="cash_received" 
                        id="cash_received"
                        min="0"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                        placeholder="Masukkan uang tunai"
                    >

                    <p class="text-xs text-gray-500 mt-1">
                        Diisi hanya jika metode pembayaran menggunakan Cash.
                    </p>

                    @error('cash_received')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <div class="flex justify-end mt-6">
                    <button 
                        type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow"
                    >
                        Simpan Transaksi
                    </button>
                </div>

            </form>

        </div>

    </div>

    <script>
        const paymentMethod = document.getElementById('payment_method');
        const cashField = document.getElementById('cash_field');
        const cashInput = document.getElementById('cash_received');

        function toggleCashField() {
            if (paymentMethod.value === 'cash') {
                cashField.style.display = 'block';
                cashInput.required = true;
            } else {
                cashField.style.display = 'none';
                cashInput.required = false;
                cashInput.value = '';
            }
        }

        paymentMethod.addEventListener('change', toggleCashField);

        toggleCashField();
    </script>

</x-app-layout>