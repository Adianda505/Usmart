<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Tambah Produk
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="max-w-2xl bg-white p-6 rounded shadow">

            @if ($errors->any())
                <div class="bg-red-200 text-red-700 p-4 mb-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST">

                @csrf

                <!-- CATEGORY -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">
                        Kategori
                    </label>

                    <select name="category_id"
                        class="w-full border rounded p-2">

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" class="block mb-1 font-semibold">
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- NAMA BARANG -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">
                        Nama Barang
                    </label>

                    <input type="text"
                        name="nama_barang"
                        class="w-full border rounded p-2">
                </div>

                <!-- HARGA -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">
                        Harga
                    </label>

                    <input type="number"
                        name="harga"
                        class="w-full border rounded p-2">
                </div>

                <!-- STOK -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">
                        Stok
                    </label>

                    <input type="number"
                        name="stok"
                        class="w-full border rounded p-2">
                </div>
                <!-- BUTTON -->
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded">

                    Simpan Produk

                </button>

            </form>

        </div>

    </div>

</x-app-layout>