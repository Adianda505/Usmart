<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Tambah Kasir
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8">

            <form action="{{ route('kasir.store') }}"
                  method="POST"
                  class="space-y-6">

                @csrf

                {{-- Nama Kasir --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Nama Kasir
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Masukkan nama kasir"
                           class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    @error('name')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Masukkan email"
                           class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    @error('email')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           placeholder="Masukkan password"
                           class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    @error('password')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Pilih Cabang --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Pilih Cabang
                    </label>

                    <select name="branch_id"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                        <option value="">
                            -- Pilih Cabang --
                        </option>

                        @foreach($branches as $branch)

                            <option value="{{ $branch->id }}"
                                {{ old('branch_id') == $branch->id ? 'selected' : '' }}>

                                {{ $branch->nama_cabang }} - {{ $branch->kota }}

                            </option>

                        @endforeach

                    </select>

                    @error('branch_id')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="flex items-center justify-end gap-3">

                    {{-- <a href="{{ route('kasir.index') }}"
                       class="px-5 py-2.5 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-100 transition">
                        Kembali
                    </a> --}}

                    <button type="submit"
                            class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-md transition">
                        Simpan Kasir
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>