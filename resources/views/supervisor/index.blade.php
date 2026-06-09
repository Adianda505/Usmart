<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Data Supervisor
            </h2>

            <a href="{{ route('supervisor.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Supervisor
            </a>
        </div>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded shadow">

            <table class="w-full border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2 text-left">No</th>
                        <th class="border p-2 text-left">Nama Supervisor</th>
                        <th class="border p-2 text-left">Email</th>
                        <th class="border p-2 text-left">Cabang</th>
                        <th class="border p-2 text-left">Role</th>
                        <th class="border p-2 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($supervisors as $supervisor)
                        <tr>
                            <td class="border p-2">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border p-2">
                                {{ $supervisor->name }}
                            </td>

                            <td class="border p-2">
                                {{ $supervisor->email }}
                            </td>

                            <td class="border p-2">
                                {{ $supervisor->branch->nama_cabang ?? '-' }}
                            </td>

                            <td class="border p-2">
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                                    {{ ucfirst($supervisor->role) }}
                                </span>
                            </td>

                            <td class="border p-2 text-center">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('supervisor.edit', $supervisor->id) }}"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                        Edit
                                    </a>

                                    <form action="{{ route('supervisor.destroy', $supervisor->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus supervisor ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="border p-4 text-center text-gray-500">
                                Belum ada data supervisor.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>

</x-app-layout>