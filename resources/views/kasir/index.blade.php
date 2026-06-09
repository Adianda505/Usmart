<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Data Kasir
            </h2>

            <a href="{{ route('kasir.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Tambah Kasir
            </a>
        </div>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded shadow">

            <table class="w-full border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2">No</th>
                        <th class="border p-2">Nama Kasir</th>
                        <th class="border p-2">Email</th>
                        <th class="border p-2">Cabang</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($kasirs as $kasir)
                        <tr>
                            <td class="border p-2 text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border p-2">
                                {{ $kasir->name }}
                            </td>

                            <td class="border p-2">
                                {{ $kasir->email }}
                            </td>

                            <td class="border p-2">
                                {{ $kasir->branch->nama_cabang ?? '-' }}
                            </td>

                            <td class="border p-2 text-center">
                                <a href="{{ route('kasir.edit', $kasir->id) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('kasir.destroy', $kasir->id) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Yakin ingin menghapus kasir ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border p-4 text-center text-gray-500">
                                Belum ada data kasir.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</x-app-layout>