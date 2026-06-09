<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800">
                Edit Manajer
            </h2>

            <a href="{{ route('manajer.index') }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
                Kembali
            </a>

        </div>
    </x-slot>

    <div class="p-6">

        <div class="bg-white p-6 rounded shadow">

            @if ($errors->any())
                <div class="bg-red-200 text-red-700 p-3 rounded mb-4">
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('manajer.update', $manager->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">
                        Nama Manajer
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name', $manager->name) }}"
                           class="border rounded w-full p-2"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ old('email', $manager->email) }}"
                           class="border rounded w-full p-2"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">
                        Password Baru
                    </label>

                    <input type="password"
                           name="password"
                           class="border rounded w-full p-2">

                    <small class="text-gray-500">
                        Kosongkan jika tidak ingin mengganti password.
                    </small>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">
                        Cabang
                    </label>

                    <select name="branch_id"
                            class="border rounded w-full p-2"
                            required>

                        <option value="">-- Pilih Cabang --</option>

                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}"
                                {{ old('branch_id', $manager->branch_id) == $branch->id ? 'selected' : '' }}>

                                {{ $branch->nama_cabang }} - {{ $branch->kota }}

                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="flex gap-2">

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Update
                    </button>

                    <a href="{{ route('manajer.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>