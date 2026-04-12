@extends('layout.admin')
@section('content')

<div class="flex min-h-screen bg-gray-100">   

    {{-- Content --}}
    <div class="flex-1 flex flex-col">

        {{-- Header --}}
        <x-header title="Products" />

        <div class="p-6 space-y-6">

            {{-- Top Bar --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                {{-- Search --}}
                <div class="flex items-center gap-2 w-full md:w-1/3">
                    <input 
                        type="text" 
                        placeholder="Cari produk..." 
                        class="w-full px-4 py-2 rounded-lg border border-green-600 focus:outline-none focus:ring-2 focus:ring-green-600 text-sm"
                    >

                    <button class="bg-green-700 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-800 transition">
                        Search
                    </button>
                </div>

                {{-- Tambah --}}
                <button class="bg-green-700 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-800 transition self-start md:self-auto">
                    + Tambah Produk
                </button>

            </div>

            {{-- Dummy Data --}}
            @php
                $products = [
                    ['nama' => 'Indomie Goreng', 'harga' => 3500, 'stok' => 120],
                    ['nama' => 'Aqua Botol', 'harga' => 4000, 'stok' => 80],
                    ['nama' => 'Teh Pucuk', 'harga' => 5000, 'stok' => 60],
                    ['nama' => 'Roti Tawar', 'harga' => 12000, 'stok' => 30],
                    ['nama' => 'Susu Ultra', 'harga' => 7000, 'stok' => 50],
                ];
            @endphp

            {{-- Table --}}
            <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

                <table class="w-full text-sm">

                    {{-- Head --}}
                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-4 text-left">Produk</th>
                            <th class="px-6 py-4 text-left">Harga</th>
                            <th class="px-6 py-4 text-left">Stok</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    {{-- Body --}}
                    <tbody class="divide-y">
                        @foreach ($products as $item)
                        <tr class="hover:bg-gray-50 transition">

                            {{-- Produk --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-green-100 text-green-700 flex items-center justify-center text-sm font-semibold">
                                        {{ strtoupper(substr($item['nama'], 0, 1)) }}
                                    </div>
                                    <span class="font-medium text-gray-800">{{ $item['nama'] }}</span>
                                </div>
                            </td>

                            {{-- Harga --}}
                            <td class="px-6 py-4 text-gray-600">
                                Rp {{ number_format($item['harga'], 0, ',', '.') }}
                            </td>

                            {{-- Stok --}}
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-700">
                                    {{ $item['stok'] }} pcs
                                </span>
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-4 text-center space-x-2">
                                <button class="text-blue-600 hover:underline text-xs">
                                    Edit
                                </button>
                                <button class="text-red-600 hover:underline text-xs">
                                    Delete
                                </button>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
</div>
@endsection