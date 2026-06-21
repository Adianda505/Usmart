<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Data Produk
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Menampilkan data produk yang tersedia
                </p>

            </div>
            <a href="{{ route('owner.products.exportPdf') }}"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                Export PDF
            </a>
        </div>
    </x-slot>

    <div class="p-6">

        {{-- Alert Success --}}
        @if (session('success'))
            <div
                class="mb-5 flex items-center gap-3 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl shadow-sm">
                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                <span class="font-medium">
                    {{ session('success') }}
                </span>
            </div>
        @endif

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">

            {{-- Card Header --}}
            <div class="px-6 py-5 border-b border-gray-100 bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-800">
                    Daftar Produk
                </h3>
                <p class="text-sm text-gray-500 mt-1">
                    Menampilkan kategori, nama barang, harga, dan stok produk
                </p>
            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-600">

                    <thead class="bg-slate-900 text-white uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-4 font-semibold">No</th>
                            <th class="px-6 py-4 font-semibold">Kategori</th>
                            <th class="px-6 py-4 font-semibold">Nama Barang</th>
                            <th class="px-6 py-4 font-semibold text-right">Harga</th>
                            <th class="px-6 py-4 font-semibold text-center">Stok</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse($products as $product)
                            <tr class="hover:bg-slate-50 transition duration-150">

                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-slate-100 text-slate-700 font-semibold">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    @if ($product->category)
                                        <span
                                            class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-blue-50 text-blue-700 border border-blue-100">
                                            {{ $product->category->nama_kategori }}
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-500 border border-gray-200">
                                            -
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-900">
                                        {{ $product->nama_barang }}
                                    </div>
                                    <div class="text-xs text-gray-400 mt-1">
                                        Produk ID: {{ $product->id }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <span class="font-semibold text-gray-900">
                                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @if ($product->stok > 0)
                                        <span
                                            class="inline-flex items-center justify-center min-w-10 px-3 py-1 rounded-full bg-green-50 text-green-700 border border-green-100 font-semibold">
                                            {{ $product->stok }}
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center justify-center min-w-10 px-3 py-1 rounded-full bg-red-50 text-red-700 border border-red-100 font-semibold">
                                            Habis
                                        </span>
                                    @endif
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-14 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div
                                            class="w-14 h-14 flex items-center justify-center rounded-full bg-slate-100 text-slate-500 mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                            </svg>
                                        </div>

                                        <h4 class="text-gray-700 font-semibold">
                                            Belum ada data produk
                                        </h4>

                                        <p class="text-gray-400 text-sm mt-1">
                                            Data produk akan muncul setelah ditambahkan.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>
