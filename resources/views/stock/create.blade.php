<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800">
                Tambah Stock Movement
            </h2>

            <a href="{{ route('stock.index') }}"
               class="px-4 py-2 bg-gray-700 text-white text-sm rounded-lg hover:bg-gray-800 transition">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-lg rounded-xl overflow-hidden">

                <div class="px-6 py-5 border-b bg-slate-900">
                    <h3 class="text-lg font-semibold text-white">
                        Form Tambah Data Stok
                    </h3>
                    <p class="text-sm text-blue-100 mt-1">
                        Gunakan form ini untuk mencatat barang masuk atau barang keluar ke cabang.
                    </p>
                </div>

                <form action="{{ route('stock.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf

                    {{-- ERROR MESSAGE --}}
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg">
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- PRODUCT --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Produk
                            </label>

                            <select name="product_id"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Pilih Produk</option>

                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- TYPE --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Jenis Pergerakan Stok
                            </label>

                            <select name="type"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Pilih Jenis</option>
                                <option value="masuk" {{ old('type') == 'masuk' ? 'selected' : '' }}>
                                    Barang Masuk
                                </option>
                                <option value="keluar" {{ old('type') == 'keluar' ? 'selected' : '' }}>
                                    Barang Keluar
                                </option>
                            </select>
                        </div>

                        {{-- BRANCH --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Cabang Tujuan
                            </label>

                            <select name="branch_id"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Pilih Cabang</option>

                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->nama_cabang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- QTY --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Jumlah Barang
                            </label>

                            <input type="number"
                                   name="qty"
                                   value="{{ old('qty') }}"
                                   min="1"
                                   placeholder="Masukkan jumlah barang"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        {{-- TANGGAL --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal
                            </label>

                            <input type="datetime-local"
                                   name="tanggal"
                                   value="{{ old('tanggal') }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                    </div>

                    {{-- INFO BOX --}}
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <p class="text-sm text-slate-900">
                            <span class="font-semibold">Catatan:</span>
                            Pilih <b>Barang Masuk</b> jika stok bertambah, dan pilih <b>Barang Keluar</b> jika barang dikirim atau dikeluarkan ke cabang.
                        </p>
                    </div>

                    {{-- BUTTON --}}
                    <div class="flex justify-end gap-3 pt-4 border-t">
                        <a href="{{ route('stock.index') }}"
                           class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                            Batal
                        </a>

                        <button type="submit"
                                class="px-5 py-2.5 bg-slate-900 text-white rounded-lg ">
                            Simpan Data
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>