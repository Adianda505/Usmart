<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Tambah Akun Manajer
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8">

            <form action="{{ route('manajer.store') }}"
                  method="POST"
                  class="space-y-6">

                @csrf

                {{-- Nama Manajer --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Nama Manajer
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Contoh: Budi Santoso"
                           class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           required>

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
                           placeholder="Contoh: manajer@example.com"
                           class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           required>

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
                           placeholder="Masukkan password akun manajer"
                           class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           required>

                    @error('password')
                        <p class="mt-1 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Cabang --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Cabang
                    </label>

                    <select name="branch_id"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                        <option value="">-- Pilih Cabang --</option>

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

                {{-- Button --}}
                <div class="flex items-center justify-end gap-3">

                    <button type="submit"
                            class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-xl shadow-md transition">
                        Simpan Manajer
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>