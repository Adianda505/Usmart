<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Tambah Akun Supervisor
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Tambahkan akun supervisor dan hubungkan dengan cabang
                </p>
            </div>

            <a href="{{ route('supervisor.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg shadow transition duration-200">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="p-6">

        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">

            {{-- Card Header --}}
            <div class="px-8 py-5 border-b border-gray-100 bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-800">
                    Form Tambah Supervisor
                </h3>
                <p class="text-sm text-gray-500 mt-1">
                    Lengkapi data akun supervisor dengan benar
                </p>
            </div>

            <div class="p-8">
                <form action="{{ route('supervisor.store') }}"
                      method="POST"
                      class="space-y-6">

                    @csrf

                    {{-- Nama Supervisor --}}
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">
                            Nama Supervisor
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="Contoh: Siti Aminah"
                               class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500"
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
                               placeholder="Contoh: supervisor@example.com"
                               class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500"
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
                               placeholder="Masukkan password akun supervisor"
                               class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500"
                               required>

                        @error('password')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">
                            Konfirmasi Password
                        </label>

                        <input type="password"
                               name="password_confirmation"
                               placeholder="Ulangi password akun supervisor"
                               class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500"
                               required>

                        @error('password_confirmation')
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
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500"
                                required>
                            <option value="">-- Pilih Cabang --</option>

                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}"
                                    {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                                    {{ $branch->nama_cabang }}
                                    @if($branch->kota)
                                        - {{ $branch->kota }}
                                    @endif
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
                    <div class="flex items-center justify-end gap-3 pt-2">

                        <button type="submit"
                                class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-xl shadow-md transition">
                            Simpan Supervisor
                        </button>

                    </div>

                </form>
            </div>

        </div>

    </div>

</x-app-layout>