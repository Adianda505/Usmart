<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Produk
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="max-w-2xl bg-white p-6 rounded shadow">

            <form action="{{ route('products.update', $product->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <!-- CATEGORY -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">
                        Kategori
                    </label>

                    <select name="category_id"
                        class="w-full border rounded p-2">

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>

                                {{ $category->nama_kategori }}

                            </option>

                        @endforeach

                    </select>
                </div>

                <!-- NAMA -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">
                        Nama Barang
                    </label>

                    <input type="text"
                        name="nama_barang"
                        value="{{ $product->nama_barang }}"
                        class="w-full border rounded p-2">
                </div>

                <!-- HARGA -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">
                        Harga
                    </label>

                    <input type="number"
                        name="harga"
                        value="{{ $product->harga }}"
                        class="w-full border rounded p-2">
                </div>

                <!-- STOK -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">
                        Stok
                    </label>

                    <input type="number"
                        name="stok"
                        value="{{ $product->stok }}"
                        class="w-full border rounded p-2">
                </div>

                <!-- BARCODE -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">
                        Barcode
                    </label>

                    <input type="text"
                        name="barcode"
                        value="{{ $product->barcode }}"
                        class="w-full border rounded p-2">
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white px-5 py-2 rounded">

                    Update Produk

                </button>

            </form>

        </div>

    </div>

</x-app-layout>