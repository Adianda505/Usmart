<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                Edit Produk
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Perbarui data produk, kategori, harga, stok, dan barcode
            </p>
        </div>
    </x-slot>

    <div class="p-6">

        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">

            {{-- Card Header --}}
            <div class="px-8 py-5 border-b border-gray-100 bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-800">
                    Form Edit Produk
                </h3>
                <p class="text-sm text-gray-500 mt-1">
                    Ubah data produk sesuai kebutuhan
                </p>
            </div>

            <div class="p-8">

                <form action="{{ route('products.update', $product->id) }}"
                      method="POST"
                      class="space-y-6">

                    @csrf
                    @method('PUT')

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
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                               value="{{ old('nama_barang', $product->nama_barang) }}"
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
                               value="{{ old('harga', $product->harga) }}"
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
                               value="{{ old('stok', $product->stok) }}"
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
                            Update Produk
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>