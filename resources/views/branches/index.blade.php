<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                Data Cabang
            </h2>
            <a href="{{ route('branches.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow transition duration-200">
                + Tambah Cabang
            </a>
        </div>
    </x-slot>


    
  <div class="p-6">

        {{-- Alert Success --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-600">

                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-4">No</th>
                            <th class="px-6 py-4">Nama Cabang</th>
                            <th class="px-6 py-4">Kota</th>
                            <th class="px-6 py-4">Alamat</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @forelse($branches as $index => $b)
                            <tr class="hover:bg-gray-50 transition duration-150">

                                <td class="px-6 py-4 font-medium text-gray-800">
                                    {{ $index + 1 }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-900">
                                        {{ $b->nama_cabang }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    {{ $b->kota }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $b->alamat }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">

                                        {{-- Edit --}}
                                        <a href="{{ route('branches.edit', $b->id) }}"
                                           class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg shadow text-sm font-medium transition">
                                            Edit
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('branches.destroy', $b->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus cabang ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg shadow text-sm font-medium transition">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="4"
                                    class="px-6 py-10 text-center text-gray-500">
                                    
                                    Data cabang belum tersedia.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</x-app-layout>