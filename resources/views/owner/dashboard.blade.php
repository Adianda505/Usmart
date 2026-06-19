<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
            <div>
                <h2 class="font-bold text-2xl text-slate-800">
                    Dashboard Owner
                </h2>
                <p class="text-sm text-slate-500 mt-1">
                    Ringkasan data toko, cabang, pengguna, transaksi, dan pendapatan UsMart.
                </p>
            </div>

            <div class="px-4 py-2 bg-white border border-slate-200 rounded-xl shadow-sm">
                <p class="text-xs text-slate-500">Login sebagai</p>
                <p class="text-sm font-semibold text-slate-800">
                    {{ Auth::user()->name }}
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- HERO / WELCOME --}}
            <div class="bg-slate-900 rounded-3xl p-8 mb-8 shadow-xl overflow-hidden relative">

                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/5 rounded-full -ml-16 -mb-16"></div>

                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                    <div>
                        <p class="text-slate-300 text-sm mb-2">
                            Selamat datang kembali,
                        </p>

                        <h1 class="text-3xl md:text-4xl font-bold text-white">
                            {{ Auth::user()->name }}
                        </h1>

                        <p class="text-slate-300 mt-3 max-w-2xl">
                            Pantau perkembangan cabang, produk, pengguna, dan transaksi toko melalui halaman dashboard ini.
                        </p>
                    </div>

                    <div class="bg-white/10 backdrop-blur rounded-2xl px-6 py-5 border border-white/10">
                        <p class="text-slate-300 text-sm">
                            Total Pendapatan
                        </p>

                        <h2 class="text-3xl font-bold text-white mt-1">
                            Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                        </h2>

                        <p class="text-xs text-slate-400 mt-2">
                            Akumulasi seluruh transaksi
                        </p>
                    </div>

                </div>
            </div>

            {{-- CARD STATISTIK --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

                {{-- Total Cabang --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                            🏬
                        </div>

                        <span class="text-xs font-medium text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                            Cabang
                        </span>
                    </div>

                    <p class="text-sm text-slate-500">
                        Total Cabang
                    </p>

                    <h3 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $totalCabang }}
                    </h3>

                    <p class="text-xs text-slate-400 mt-3">
                        Jumlah cabang yang terdaftar
                    </p>
                </div>

                {{-- Total Produk --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
                            📦
                        </div>

                        <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">
                            Produk
                        </span>
                    </div>

                    <p class="text-sm text-slate-500">
                        Total Produk
                    </p>

                    <h3 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $totalProduk }}
                    </h3>

                    <p class="text-xs text-slate-400 mt-3">
                        Produk yang tersedia di sistem
                    </p>
                </div>

                {{-- Total Kasir --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
                            🧾
                        </div>

                        <span class="text-xs font-medium text-amber-600 bg-amber-50 px-3 py-1 rounded-full">
                            Kasir
                        </span>
                    </div>

                    <p class="text-sm text-slate-500">
                        Total Kasir
                    </p>

                    <h3 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $totalKasir }}
                    </h3>

                    <p class="text-xs text-slate-400 mt-3">
                        Akun kasir yang aktif
                    </p>
                </div>

                {{-- Total Manajer --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl">
                            👔
                        </div>

                        <span class="text-xs font-medium text-purple-600 bg-purple-50 px-3 py-1 rounded-full">
                            Manajer
                        </span>
                    </div>

                    <p class="text-sm text-slate-500">
                        Total Manajer
                    </p>

                    <h3 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $totalManajer }}
                    </h3>

                    <p class="text-xs text-slate-400 mt-3">
                        Pengelola cabang terdaftar
                    </p>
                </div>

                {{-- Total Supervisor --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-xl">
                            🧑‍💼
                        </div>

                        <span class="text-xs font-medium text-rose-600 bg-rose-50 px-3 py-1 rounded-full">
                            Supervisor
                        </span>
                    </div>

                    <p class="text-sm text-slate-500">
                        Total Supervisor
                    </p>

                    <h3 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $totalSupervisor }}
                    </h3>

                    <p class="text-xs text-slate-400 mt-3">
                        Akun supervisor terdaftar
                    </p>
                </div>

                {{-- Total Transaksi --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center text-xl">
                            💳
                        </div>

                        <span class="text-xs font-medium text-cyan-600 bg-cyan-50 px-3 py-1 rounded-full">
                            Transaksi
                        </span>
                    </div>

                    <p class="text-sm text-slate-500">
                        Total Transaksi
                    </p>

                    <h3 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $totalTransaksi }}
                    </h3>

                    <p class="text-xs text-slate-400 mt-3">
                        Jumlah transaksi seluruh cabang
                    </p>
                </div>

                {{-- Total Pendapatan --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition sm:col-span-2">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                        <div>
                            <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center text-xl mb-5">
                                💰
                            </div>

                            <p class="text-sm text-slate-500">
                                Total Pendapatan
                            </p>

                            <h3 class="text-3xl font-bold text-slate-800 mt-1">
                                Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                            </h3>

                            <p class="text-xs text-slate-400 mt-3">
                                Total pendapatan dari seluruh transaksi
                            </p>
                        </div>

                        <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 min-w-[180px]">
                            <p class="text-xs text-slate-500">
                                Rata-rata / transaksi
                            </p>

                            <h4 class="text-xl font-bold text-slate-800 mt-1">
                                Rp {{ $totalTransaksi > 0 ? number_format($totalPendapatan / $totalTransaksi, 0, ',', '.') : 0 }}
                            </h4>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

</x-app-layout>