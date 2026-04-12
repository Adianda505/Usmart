@extends('layout.admin')
@section('content')

<div class="flex min-h-screen bg-gray-100">   

    <div class="flex-1 flex flex-col">

        {{-- Header --}}
        <x-header title="Dashboard" />

        <div class="p-6 space-y-6">

            {{-- STATISTIC CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white p-5 rounded-2xl shadow-sm border">
                    <p class="text-sm text-gray-500">Total Produk</p>
                    <h2 class="text-3xl font-bold mt-2">0</h2>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm border">
                    <p class="text-sm text-gray-500">Total User</p>
                    <h2 class="text-3xl font-bold mt-2">0</h2>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm border">
                    <p class="text-sm text-gray-500">Transaksi Hari Ini</p>
                    <h2 class="text-3xl font-bold mt-2">0</h2>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm border">
                    <p class="text-sm text-gray-500">Pendapatan</p>
                    <h2 class="text-3xl font-bold mt-2">Rp 0</h2>
                </div>

            </div>

            {{-- CHART & ACTIVITY --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Chart --}}
                <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border">
                    <h3 class="font-semibold mb-4">Grafik Penjualan</h3>
                    <div class="h-64 flex items-center justify-center text-gray-400 border-2 border-dashed rounded-lg">
                        Chart Area
                    </div>
                </div>

                {{-- Activity --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border">
                    <h3 class="font-semibold mb-4">Aktivitas Terbaru</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li>Belum ada aktivitas</li>
                    </ul>
                </div>

            </div>

            {{-- TABLE --}}
            <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

                <div class="p-5 border-b">
                    <h3 class="font-semibold">Transaksi Terbaru</h3>
                </div>

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-4 text-left">ID</th>
                            <th class="px-6 py-4 text-left">Nama User</th>
                            <th class="px-6 py-4 text-left">Produk</th>
                            <th class="px-6 py-4 text-left">Tanggal</th>
                            <th class="px-6 py-4 text-left">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-400">
                                Belum ada data
                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>

        </div>
    </div>
</div>

@endsection