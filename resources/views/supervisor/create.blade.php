<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Tambah Akun Supervisor
            </h2>

            <a href="{{ route('supervisor.index') }}"
               class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="p-6">

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 rounded shadow max-w-xl">

            <form action="{{ route('supervisor.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Nama Supervisor
                    </label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="w-full border rounded px-3 py-2"
                           placeholder="Masukkan nama supervisor"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Email
                    </label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="w-full border rounded px-3 py-2"
                           placeholder="Masukkan email"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Password
                    </label>
                    <input type="password"
                           name="password"
                           class="w-full border rounded px-3 py-2"
                           placeholder="Masukkan password"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Konfirmasi Password
                    </label>
                    <input type="password"
                           name="password_confirmation"
                           class="w-full border rounded px-3 py-2"
                           placeholder="Ulangi password"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Cabang
                    </label>

                    <select name="branch_id"
                            class="w-full border rounded px-3 py-2"
                            required>
                        <option value="">-- Pilih Cabang --</option>

                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}"
                                {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                                {{ $branch->nama_cabang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Simpan
                    </button>

                    <a href="{{ route('supervisor.index') }}"
                       class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Batal
                    </a>
                </div>

            </form>

        </div>

    </div>

</x-app-layout>