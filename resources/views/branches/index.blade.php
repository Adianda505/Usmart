<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Data Cabang
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Kelola data cabang toko
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('branches.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white font-medium rounded-lg shadow transition duration-200">
                    + Tambah Cabang
                </a>

                <a href="{{ route('owner.branches.exportPdf') }}"
                    class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    Export PDF
                </a>
            </div>
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
                    Daftar Cabang
                </h3>
                <p class="text-sm text-gray-500 mt-1">
                    Menampilkan seluruh data cabang yang tersedia
                </p>
            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-600">

                    <thead class="bg-slate-900 text-white uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-4 font-semibold">No</th>
                            <th class="px-6 py-4 font-semibold">Nama Cabang</th>
                            <th class="px-6 py-4 font-semibold">Kota</th>
                            <th class="px-6 py-4 font-semibold">Alamat</th>
                            <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse($branches as $index => $b)
                            <tr class="hover:bg-slate-50 transition duration-150">

                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-slate-100 text-slate-700 font-semibold">
                                        {{ $index + 1 }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-900">
                                        {{ $b->nama_cabang }}
                                    </div>
                                    <div class="text-xs text-gray-400 mt-1">
                                        Cabang ID: {{ $b->id }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-blue-50 text-blue-700 border border-blue-100">
                                        {{ $b->kota }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-gray-600 max-w-md">
                                    {{ $b->alamat }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">

                                        {{-- Edit --}}
                                        <a href="{{ route('branches.edit', $b->id) }}"
                                            class="inline-flex items-center px-3 py-2 bg-amber-400 hover:bg-amber-500 text-white rounded-lg shadow-sm text-sm font-medium transition">
                                            Edit
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('branches.destroy', $b->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus cabang ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg shadow-sm text-sm font-medium transition">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
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
                                                    d="M3 21h18M4 21V7l8-4 8 4v14M9 21v-6h6v6M9 10h.01M15 10h.01" />
                                            </svg>
                                        </div>

                                        <h4 class="text-gray-700 font-semibold">
                                            Data cabang belum tersedia
                                        </h4>

                                        <p class="text-gray-400 text-sm mt-1">
                                            Silakan tambahkan data cabang terlebih dahulu.
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
