<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Edit Cabang
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8">

            <form action="{{ route('branches.update', $branch->id) }}"
                  method="POST"
                  class="space-y-6">

                @csrf
                @method('PUT')

                {{-- Nama Cabang --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Nama Cabang
                    </label>

                    <input type="text"
                           name="nama_cabang"
                           value="{{ old('nama_cabang', $branch->nama_cabang) }}"
                           placeholder="Masukkan nama cabang"
                           class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">

                    @error('nama_cabang')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Kota --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Kota
                    </label>

                    <input type="text"
                           name="kota"
                           value="{{ old('kota', $branch->kota) }}"
                           placeholder="Masukkan kota"
                           class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">

                    @error('kota')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Alamat
                    </label>

                    <textarea name="alamat"
                              rows="4"
                              placeholder="Masukkan alamat lengkap cabang"
                              class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">{{ old('alamat', $branch->alamat) }}</textarea>

                    @error('alamat')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="flex items-center justify-end gap-3">

                    <a href="{{ route('branches.index') }}"
                       class="px-5 py-2.5 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-100 transition">
                        Kembali
                    </a>

                    <button type="submit"
                            class="px-6 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-xl shadow-md transition">
                        Update Cabang
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>