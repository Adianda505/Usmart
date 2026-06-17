<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-slate-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- Left Side -->
            <div class="flex items-center">

                <!-- Logo / Brand -->
                <div class="shrink-0 flex items-center">
                    <a href="#" class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center font-bold text-lg shadow">
                            U
                        </div>

                        <div class="leading-tight">
                            <h1 class="text-xl font-bold text-slate-800 tracking-tight">
                                UsMart
                            </h1>
                            <p class="text-xs text-slate-500 -mt-1">
                                Store Management
                            </p>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ms-10 gap-2">

                    {{-- OWNER --}}
                    @if(Auth::user()->role == 'owner')

                        <a href="{{ route('owner.dashboard') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('owner.dashboard') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Dashboard
                        </a>

                        <a href="{{ route('owner.products.product') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('owner.products.product') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Products
                        </a>

                        <a href="{{ route('owner.stock.stocklist') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('owner.stock.stocklist') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Stock
                        </a>

                        <a href="{{ route('branches.index') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('branches.*') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Cabang
                        </a>

                        <a href="{{ route('kasir.index') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('kasir.index') || request()->routeIs('kasir.create') || request()->routeIs('kasir.edit') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Kasir
                        </a>

                        <a href="{{ route('manajer.index') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('manajer.index') || request()->routeIs('manajer.create') || request()->routeIs('manajer.edit') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Manajer
                        </a>

                        <a href="{{ route('supervisor.index') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('supervisor.index') || request()->routeIs('supervisor.create') || request()->routeIs('supervisor.edit') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Supervisor
                        </a>

                        <a href="{{ route('owner.transactions.index') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('owner.transactions.index') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Transaksi
                        </a>


                    {{-- MANAJER --}}
                    @elseif(Auth::user()->role == 'manajer')

                        <a href="{{ route('manajer.dashboard') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('manajer.dashboard') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Dashboard
                        </a>

                        <a href="{{ route('manajer.produk-cabang.index') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('manajer.produk-cabang.index') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Produk Cabang
                        </a>

                        <a href="{{ route('manajer.transaksi.index') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('manajer.transaksi.index') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Transaksi
                        </a>


                    {{-- KASIR --}}
                    @elseif(Auth::user()->role == 'kasir')

                        <a href="{{ route('kasir.dashboard') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('kasir.dashboard') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Dashboard
                        </a>

                        <a href="{{ route('kasir.transaksi.index') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('kasir.transaksi.index') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Transaksi
                        </a>

                        <a href="{{ route('kasir.transaksi.create') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('kasir.transaksi.create') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Buat Transaksi
                        </a>


                    {{-- GUDANG --}}
                    @elseif(Auth::user()->role == 'gudang')

                        <a href="{{ route('gudang.dashboard') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('gudang.dashboard') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Dashboard
                        </a>

                        <a href="{{ route('products.index') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('products.*') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Produk
                        </a>

                        <a href="{{ route('stock.index') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('stock.*') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Stock Movement
                        </a>


                    {{-- SUPERVISOR --}}
                    @elseif(Auth::user()->role == 'supervisor')

                        <a href="{{ route('supervisor.dashboard') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('supervisor.dashboard') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Dashboard
                        </a>

                        <a href="{{ route('supervisor.transaksi.index') }}"
                           class="px-4 py-2 rounded-xl text-sm font-medium transition
                           {{ request()->routeIs('supervisor.transaksi.index') ? 'bg-slate-900 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Transaksi
                        </a>

                    @endif

                </div>

            </div>

            <!-- Right Side / User Dropdown -->
            <div class="hidden sm:flex sm:items-center">

                <x-dropdown align="right" width="56">

                    <x-slot name="trigger">
                        <button class="flex items-center gap-3 px-3 py-2 rounded-2xl border border-slate-200 bg-white hover:bg-slate-50 transition shadow-sm">

                            <div class="w-9 h-9 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            <div class="text-left leading-tight">
                                <div class="text-sm font-semibold text-slate-800">
                                    {{ Auth::user()->name }}
                                </div>

                                <div class="text-xs text-slate-500 capitalize">
                                    {{ Auth::user()->role }}
                                </div>
                            </div>

                            <svg class="w-4 h-4 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>

                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <div class="px-4 py-3 border-b border-slate-100">
                            <div class="font-semibold text-sm text-slate-800">
                                {{ Auth::user()->name }}
                            </div>

                            <div class="text-xs text-slate-500">
                                {{ Auth::user()->email }}
                            </div>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                Log Out
                            </x-dropdown-link>
                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- Hamburger -->
            <div class="flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none transition"
                >
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">

                        <path
                            :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>
                </button>

            </div>

        </div>

    </div>

    <!-- Responsive Navigation Menu -->
    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden bg-white border-t border-slate-200"
    >

        <div class="px-4 pt-4 pb-3 space-y-2">

            {{-- OWNER RESPONSIVE --}}
            @if(Auth::user()->role == 'owner')

                <a href="{{ route('owner.dashboard') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('owner.dashboard') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Dashboard
                </a>

                <a href="{{ route('owner.products.product') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('owner.products.product') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Products
                </a>

                <a href="{{ route('owner.stock.stocklist') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('owner.stock.stocklist') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Stock
                </a>

                <a href="{{ route('branches.index') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('branches.*') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Cabang
                </a>

                <a href="{{ route('kasir.index') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('kasir.*') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Kasir
                </a>

                <a href="{{ route('manajer.index') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('manajer.*') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Manajer
                </a>

                <a href="{{ route('supervisor.index') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('supervisor.*') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Supervisor
                </a>

                <a href="{{ route('owner.transactions.index') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('owner.transactions.index') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Transaksi
                </a>


            {{-- MANAJER RESPONSIVE --}}
            @elseif(Auth::user()->role == 'manajer')

                <a href="{{ route('manajer.dashboard') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('manajer.dashboard') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Dashboard
                </a>

                <a href="{{ route('manajer.produk-cabang.index') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('manajer.produk-cabang.index') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Produk Cabang
                </a>

                <a href="{{ route('manajer.transaksi.index') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('manajer.transaksi.index') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Transaksi
                </a>


            {{-- KASIR RESPONSIVE --}}
            @elseif(Auth::user()->role == 'kasir')

                <a href="{{ route('kasir.dashboard') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('kasir.dashboard') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Dashboard
                </a>

                <a href="{{ route('kasir.transaksi.index') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('kasir.transaksi.index') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Transaksi
                </a>

                <a href="{{ route('kasir.transaksi.create') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('kasir.transaksi.create') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Buat Transaksi
                </a>


            {{-- GUDANG RESPONSIVE --}}
            @elseif(Auth::user()->role == 'gudang')

                <a href="{{ route('gudang.dashboard') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('gudang.dashboard') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Dashboard
                </a>

                <a href="{{ route('products.index') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('products.*') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Produk
                </a>

                <a href="{{ route('stock.index') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('stock.*') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Stock Movement
                </a>


            {{-- SUPERVISOR RESPONSIVE --}}
            @elseif(Auth::user()->role == 'supervisor')

                <a href="{{ route('supervisor.dashboard') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('supervisor.dashboard') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Dashboard
                </a>

                <a href="{{ route('supervisor.transaksi.index') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium transition
                   {{ request()->routeIs('supervisor.transaksi.index') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-slate-100' }}">
                    Transaksi
                </a>

            @endif

        </div>

        <!-- Responsive User Info -->
        <div class="px-4 pt-4 pb-5 border-t border-slate-200 bg-slate-50">

            <div class="flex items-center gap-3 mb-4">

                <div class="w-11 h-11 rounded-xl bg-slate-900 text-white flex items-center justify-center font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <div>
                    <div class="font-semibold text-slate-800">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="text-sm text-slate-500">
                        {{ Auth::user()->email }}
                    </div>

                    <div class="text-xs text-slate-400 capitalize">
                        {{ Auth::user()->role }}
                    </div>
                </div>

            </div>

            <div class="space-y-2">

                <a href="{{ route('profile.edit') }}"
                   class="block px-4 py-3 rounded-xl text-sm font-medium text-slate-700 hover:bg-white transition">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="block px-4 py-3 rounded-xl text-sm font-medium text-red-600 hover:bg-red-50 transition"
                    >
                        Log Out
                    </a>
                </form>

            </div>

        </div>

    </div>

</nav>