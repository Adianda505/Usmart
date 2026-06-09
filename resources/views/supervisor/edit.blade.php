<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Edit Supervisor
            </h2>

            <a href="{{ route('supervisor.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="bg-white p-6 rounded shadow max-w-2xl mx-auto">

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('supervisor.update', $supervisor->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Nama Supervisor
                    </label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $supervisor->name) }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Email
                    </label>
                    <input type="email"
                           name="email"
                           value="{{ old('email', $supervisor->email) }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Cabang
                    </label>
                    <select name="branch_id"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                            required>
                        <option value="">-- Pilih Cabang --</option>

                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}"
                                {{ old('branch_id', $supervisor->branch_id) == $branch->id ? 'selected' : '' }}>
                                {{ $branch->nama_cabang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Password Baru
                    </label>
                    <input type="password"
                           name="password"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">

                    <p class="text-sm text-gray-500 mt-1">
                        Kosongkan jika tidak ingin mengubah password.
                    </p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Konfirmasi Password Baru
                    </label>
                    <input type="password"
                           name="password_confirmation"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('supervisor.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                        Batal
                    </a>

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Update Supervisor
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>