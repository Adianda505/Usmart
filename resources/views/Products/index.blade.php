<x-app-layout>

    <x-slot name="header">
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800">
            Tambah Produk
        </h2>
        {{-- Create Product --}}
        <a href="{{ route('products.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            + Create Product
        </a>
    </div>
    </x-slot>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-5">
        <h1 class="text-2xl font-bold">
            Data Produk
        </h1>
    </div>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">No</th>
                <th class="border p-2">Kategori</th>
                <th class="border p-2">Nama Barang</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Stok</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $product)
            <tr>
                <td class="border p-2">
                    {{ $loop->iteration }}
                </td>

                <td class="border p-2">
                    {{ $product->category->nama_kategori ?? '-' }}
                </td>

                <td class="border p-2">
                    {{ $product->nama_barang }}
                </td>

                <td class="border p-2">
                    Rp {{ number_format($product->harga) }}
                </td>

                <td class="border p-2">
                    {{ $product->stok }}
                </td>

                <td class="border p-2">

    <div class="flex gap-2">

        <a href="{{ route('products.edit', $product->id) }}"
            class="bg-yellow-400 text-white px-3 py-1 rounded">

            Edit

        </a>

        <form action="{{ route('products.destroy', $product->id) }}"
            method="POST">

            @csrf
            @method('DELETE')

            <button type="submit"
                onclick="return confirm('Yakin hapus produk?')"
                class="bg-red-500 text-white px-3 py-1 rounded">

                Hapus

            </button>

        </form>

    </div>

</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>
</x-app-layout>