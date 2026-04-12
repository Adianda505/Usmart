<div class="bg-green-900 w-full shadow-lg">

    <!-- HEADER -->
    <div class="flex items-center justify-between px-6 py-4 text-white">
        
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16">
                <path d="M4 2a.5.5 0 0 0-.447.276l-1.5 3A.5.5 0 0 0 2 5.5v2a.5.5 0 0 0 .5.5H3v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V8h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.053-.224l-1.5-3A.5.5 0 0 0 12 2z"/>
            </svg>
            <h1 class="text-xl font-bold">UsMart</h1>
        </div>

        <!-- MENU -->
        <div class="flex items-center gap-6 text-sm">

            <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-300">Dashboard</a>

            <a href="{{ route('admin.customers') }}" class="hover:text-gray-300">Customer</a>

            <a href="{{ route('admin.products') }}" class="hover:text-gray-300">Products</a>

            <a href="{{ route('admin.transaction') }}" class="hover:text-gray-300">Transaction</a>

            <a href="{{ route('admin.settings') }}" class="hover:text-gray-300">Settings</a>

            <a href="#" class="hover:text-red-400">Logout</a>

        </div>
    </div>

</div>