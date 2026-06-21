<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                Tambah Produk
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Tambahkan data produk baru ke dalam sistem
            </p>
        </div>
    </x-slot>

    <div class="p-6">

        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">

            {{-- Card Header --}}
            <div class="px-8 py-5 border-b border-gray-100 bg-slate-900">
                <h3 class="text-lg font-semibold text-white">
                    Form Tambah Produk
                </h3>
                <p class="text-sm text-white mt-1">
                    Lengkapi data produk dengan kategori, harga, dan stok
                </p>
            </div>

            <div class="p-8">

                <form action="{{ route('products.store') }}"
                      method="POST"
                      class="space-y-6">

                    @csrf

                    {{-- Kategori --}}
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">
                            Kategori
                        </label>

                        <select name="category_id"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500">
                            <option value="">-- Pilih Kategori --</option>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->nama_kategori }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Nama Barang --}}
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">
                            Nama Barang
                        </label>

                        <input type="text"
                               name="nama_barang"
                               value="{{ old('nama_barang') }}"
                               placeholder="Contoh: Indomie Goreng"
                               class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500">

                        @error('nama_barang')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Harga --}}
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">
                            Harga
                        </label>

                        <input type="number"
                               name="harga"
                               value="{{ old('harga') }}"
                               placeholder="Contoh: 5000"
                               min="0"
                               class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500">

                        @error('harga')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Stok --}}
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">
                            Stok
                        </label>

                        <input type="number"
                               name="stok"
                               value="{{ old('stok') }}"
                               placeholder="Contoh: 100"
                               min="0"
                               class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500">

                        @error('stok')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Button --}}
                    <div class="flex items-center justify-end gap-3 pt-2">

                        <button type="submit"
                                class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-xl shadow-md transition">
                            Simpan Produk
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>