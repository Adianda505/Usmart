<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            Dashboard Kasir
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="bg-white p-6 rounded-2xl shadow">

            <h1 class="text-2xl font-bold text-gray-800">
                Selamat Datang,
                {{ auth()->user()->name }}
            </h1>

            <p class="mt-2 text-gray-600">
                Cabang:
                <span class="font-semibold text-blue-600">
                    {{ auth()->user()->branch->nama_cabang }}
                </span>
            </p>

        </div>

    </div>

</x-app-layout>