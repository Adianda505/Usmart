<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800">
                Stock Movement
            </h2>
            {{-- Add Stock-Movement --}}
                <a href="{{ route('stock.create') }}"
                   class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                    + Stock Movement
                </a>
        </div>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
            <div class="bg-green-200 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-200 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded shadow">

            <table class="w-full border">

                <thead class="bg-gray-100">

                    <tr>
                        <th class="border p-2">No</th>
                        <th class="border p-2">Produk</th>
                        <th class="border p-2">Type</th>
                        <th class="border p-2">Cabang</th>
                        <th class="border p-2">Qty</th>
                        <th class="border p-2">Tanggal</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($movements as $movement)

                    <tr>

                        <td class="border p-2">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border p-2">
                            {{ $movement->product->nama_barang }}
                        </td>

                        <td class="border p-2">

                            @if($movement->type == 'masuk')

                                <span class="bg-green-500 text-white px-2 py-1 rounded">
                                    Masuk
                                </span>

                            @else

                                <span class="bg-red-500 text-white px-2 py-1 rounded">
                                    Keluar
                                </span>

                            @endif

                        </td>
                        <td>
                            {{ $movement->branch->nama_cabang ?? '-' }}
                        </td>

                        <td class="border p-2">
                            {{ $movement->qty }}
                        </td>

                        <td class="border p-2">
                            {{ $movement->tanggal }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>