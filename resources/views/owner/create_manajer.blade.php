<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Tambah Akun Manajer
        </h2>
    </x-slot>

    <div class="p-6">
        <div class="bg-white p-6 rounded shadow">

            <form action="{{ route('manajer.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label>Nama Manajer</label>
                    <input type="text" name="name" class="border rounded w-full p-2" required>
                </div>

                <div class="mb-4">
                    <label>Email</label>
                    <input type="email" name="email" class="border rounded w-full p-2" required>
                </div>

                <div class="mb-4">
                    <label>Password</label>
                    <input type="password" name="password" class="border rounded w-full p-2" required>
                </div>

                <div class="mb-4">
                    <label>Cabang</label>
                    <select name="branch_id" class="border rounded w-full p-2" required>
                        <option value="">-- Pilih Cabang --</option>

                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">
                                {{ $branch->nama_cabang }} - {{ $branch->kota }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Simpan
                </button>

            </form>

        </div>
    </div>
</x-app-layout>