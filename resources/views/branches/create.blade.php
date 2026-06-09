<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Tambah Cabang
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8">

            <form action="{{ route('branches.store') }}"
                  method="POST"
                  class="space-y-6">

                @csrf

                {{-- Nama Cabang --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Nama Cabang
                    </label>

                    <input type="text"
                           name="nama_cabang"
                           value="{{ old('nama_cabang') }}"
                           placeholder="Contoh: Cabang Banjar"
                           class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

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
                           value="{{ old('kota') }}"
                           placeholder="Contoh: Banjar"
                           class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

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
                              placeholder="Masukkan alamat lengkap cabang..."
                              class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('alamat') }}</textarea>

                    @error('alamat')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Button --}}
                <div class="flex items-center justify-end gap-3">

                    <a href="{{ route('branches.index') }}"
                       class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                        Kembali
                    </a>

                    <button type="submit"
                            class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-md transition">
                        Simpan Cabang
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>