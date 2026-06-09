<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800">
                Data Manajer
            </h2>

            <a href="{{ route('manajer.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow transition duration-200">
                + Tambah Manajer
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
                        <th class="border p-2">Nama Manajer</th>
                        <th class="border p-2">Email</th>
                        <th class="border p-2">Role</th>
                        <th class="border p-2">Cabang</th>
                        <th class="border p-2">Kota</th>
                        <th class="border p-2">Alamat Cabang</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($managers as $manager)

                        <tr>
                            <td class="border p-2 text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border p-2">
                                {{ $manager->name }}
                            </td>

                            <td class="border p-2">
                                {{ $manager->email }}
                            </td>

                            <td class="border p-2 text-center">
                                <span class="bg-purple-500 text-white px-2 py-1 rounded">
                                    {{ ucfirst($manager->role) }}
                                </span>
                            </td>

                            <td class="border p-2">
                                {{ $manager->branch->nama_cabang ?? '-' }}
                            </td>

                            <td class="border p-2">
                                {{ $manager->branch->kota ?? '-' }}
                            </td>

                            <td class="border p-2">
                                {{ $manager->branch->alamat ?? '-' }}
                            </td>

                            <td class="border p-2">
                                <div class="flex gap-2 justify-center">

                                    <a href="{{ route('manajer.edit', $manager->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('manajer.destroy', $manager->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus manajer ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                            Hapus
                                        </button>

                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="border p-4 text-center text-gray-500">
                                Belum ada data manajer.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>