<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="#">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    {{-- OWNER --}}
                    @if(Auth::user()->role == 'owner')

                        <x-nav-link :href="route('owner.dashboard')" :active="request()->routeIs('owner.dashboard')">
                            Dashboard
                        </x-nav-link>

                        <x-nav-link :href="route('owner.products.product')" :active="request()->routeIs('owner.products.product')">
                            Products
                        </x-nav-link>

                        <x-nav-link :href="route('owner.stock.stocklist')" :active="request()->routeIs('owner.stock.stocklist')">
                            Stock
                        </x-nav-link>

                        <x-nav-link :href="route('branches.index')" :active="request()->routeIs('branches.*')">
                            Cabang
                        </x-nav-link>

                        <x-nav-link :href="route('kasir.index')" :active="request()->routeIs('kasir.index') || request()->routeIs('kasir.create') || request()->routeIs('kasir.edit')">
                            Kasir
                        </x-nav-link>

                        <x-nav-link :href="route('manajer.index')" :active="request()->routeIs('manajer.index') || request()->routeIs('manajer.create') || request()->routeIs('manajer.edit')">
                            Manajer
                        </x-nav-link>

                        <x-nav-link :href="route('supervisor.index')" :active="request()->routeIs('supervisor.index') || request()->routeIs('supervisor.create') || request()->routeIs('supervisor.edit')">
                            Supervisor
                        </x-nav-link>

                        <x-nav-link :href="route('owner.transactions.index')" :active="request()->routeIs('owner.transactions.index')">
                            Transaksi Cabang
                        </x-nav-link>


                    {{-- MANAJER --}}
                    @elseif(Auth::user()->role == 'manajer')

                        <x-nav-link :href="route('manajer.dashboard')" :active="request()->routeIs('manajer.dashboard')">
                            Dashboard
                        </x-nav-link>

                       <x-nav-link :href="route('manajer.produk-cabang.index')" :active="request()->routeIs('manajer.produk-cabang.index')">
                             Produk Cabang
                        </x-nav-link>

                        <x-nav-link :href="route('manajer.transaksi.index')" :active="request()->routeIs('manajer.transaksi.index')">
                            Transaksi
                        </x-nav-link>


                    {{-- KASIR --}}
                    @elseif(Auth::user()->role == 'kasir')

                        <x-nav-link :href="route('kasir.dashboard')" :active="request()->routeIs('kasir.dashboard')">
                            Dashboard
                        </x-nav-link>

                        <x-nav-link :href="route('kasir.transaksi.index')" :active="request()->routeIs('kasir.transaksi.index')">
                            Transaksi
                        </x-nav-link>

                        <x-nav-link :href="route('kasir.transaksi.create')" :active="request()->routeIs('kasir.transaksi.create')">
                            Buat Transaksi
                        </x-nav-link>


                    {{-- GUDANG --}}
                    @elseif(Auth::user()->role == 'gudang')

                        <x-nav-link :href="route('gudang.dashboard')" :active="request()->routeIs('gudang.dashboard')">
                            Dashboard
                        </x-nav-link>

                        <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                            Produk
                        </x-nav-link>

                        <x-nav-link :href="route('stock.index')" :active="request()->routeIs('stock.*')">
                            Stock Movement
                        </x-nav-link>


                    {{-- SUPERVISOR --}}
                    @elseif(Auth::user()->role == 'supervisor')

                        <x-nav-link :href="route('supervisor.dashboard')" :active="request()->routeIs('supervisor.dashboard')">
                            Dashboard
                        </x-nav-link>

                        <x-nav-link :href="route('supervisor.transaksi.index')" :active="request()->routeIs('supervisor.transaksi.index')">
                            Transaksi
                        </x-nav-link>

                    @endif

                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                            <div>
                                {{ Auth::user()->name }}

                                <span class="text-xs text-gray-400">
                                    ({{ Auth::user()->role }})
                                </span>
                            </div>

                            <div class="ms-1">

                                <svg class="fill-current h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">

                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />

                                </svg>

                            </div>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">

                                Log Out

                            </x-dropdown-link>
                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">

                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">

                    <svg class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24">

                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">

            {{-- OWNER RESPONSIVE --}}
            @if(Auth::user()->role == 'owner')

                <x-responsive-nav-link :href="route('owner.dashboard')" :active="request()->routeIs('owner.dashboard')">
                    Dashboard
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('owner.products.product')" :active="request()->routeIs('owner.products.product')">
                    Products
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('owner.stock.stocklist')" :active="request()->routeIs('owner.stock.stocklist')">
                    Stock
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('branches.index')" :active="request()->routeIs('branches.*')">
                    Cabang
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('kasir.index')" :active="request()->routeIs('kasir.*')">
                    Kasir
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('manajer.index')" :active="request()->routeIs('manajer.*')">
                    Manajer
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('supervisor.index')" :active="request()->routeIs('supervisor.*')">
                    Supervisor
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('owner.transactions.index')" :active="request()->routeIs('owner.transactions.index')">
                    Transaksi Cabang
                </x-responsive-nav-link>


            {{-- MANAJER RESPONSIVE --}}
            @elseif(Auth::user()->role == 'manajer')

                <x-responsive-nav-link :href="route('manajer.dashboard')" :active="request()->routeIs('manajer.dashboard')">
                    Dashboard
                </x-responsive-nav-link>

                <x-nav-link :href="route('manajer.produk-cabang.index')" :active="request()->routeIs('manajer.produk-cabang.index')">
                     Produk Cabang
                </x-nav-link>

                <x-responsive-nav-link :href="route('manajer.stock.stocklist')" :active="request()->routeIs('manajer.stock.stocklist')">
                    Stock
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('manajer.transaksi.index')" :active="request()->routeIs('manajer.transaksi.index')">
                    Transaksi
                </x-responsive-nav-link>


            {{-- KASIR RESPONSIVE --}}
            @elseif(Auth::user()->role == 'kasir')

                <x-responsive-nav-link :href="route('kasir.dashboard')" :active="request()->routeIs('kasir.dashboard')">
                    Dashboard
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('kasir.transaksi.index')" :active="request()->routeIs('kasir.transaksi.index')">
                    Transaksi
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('kasir.transaksi.create')" :active="request()->routeIs('kasir.transaksi.create')">
                    Buat Transaksi
                </x-responsive-nav-link>


            {{-- GUDANG RESPONSIVE --}}
            @elseif(Auth::user()->role == 'gudang')

                <x-responsive-nav-link :href="route('gudang.dashboard')" :active="request()->routeIs('gudang.dashboard')">
                    Dashboard
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                    Produk
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('stock.index')" :active="request()->routeIs('stock.*')">
                    Stock Movement
                </x-responsive-nav-link>


            {{-- SUPERVISOR RESPONSIVE --}}
            @elseif(Auth::user()->role == 'supervisor')

                <x-responsive-nav-link :href="route('supervisor.dashboard')" :active="request()->routeIs('supervisor.dashboard')">
                    Dashboard
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('supervisor.transaksi.index')" :active="request()->routeIs('supervisor.transaksi.index')">
                    Transaksi
                </x-responsive-nav-link>

            @endif

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="px-4">

                <div class="font-medium text-base text-gray-800">
                    {{ Auth::user()->name }}
                </div>

                <div class="font-medium text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>

                <div class="text-xs text-gray-400">
                    Role : {{ Auth::user()->role }}
                </div>

            </div>

            <div class="mt-3 space-y-1">

                <x-responsive-nav-link :href="route('profile.edit')">
                    Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">

                        Log Out

                    </x-responsive-nav-link>
                </form>

            </div>

        </div>

    </div>

</nav>