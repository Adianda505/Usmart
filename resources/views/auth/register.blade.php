<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-indigo-100 px-4 py-10">

        <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            <!-- Bagian kiri / branding -->
            <div class="hidden md:flex flex-col justify-center p-10 bg-slate-900 text-white relative overflow-hidden">

                <div class="absolute -top-16 -right-16 w-40 h-40 bg-white/10 rounded-full"></div>
                <div class="absolute -bottom-20 -left-20 w-56 h-56 bg-white/10 rounded-full"></div>

                <div class="relative z-10">
                    <h1 class="text-4xl font-bold mb-4">
                        Join UsMart
                    </h1>

                    <p class="text-blue-100 text-lg leading-relaxed">
                        Daftar akun untuk mulai menggunakan sistem penjualan dan manajemen stok Us Mart.
                    </p>
                </div>
            </div>

            <!-- Bagian kanan / form register -->
            <div class="p-8 md:p-12">

                <div class="mb-8 text-center md:text-left">
                    <h2 class="text-3xl font-bold text-gray-800">
                        Buat Akun
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Silakan lengkapi data akun Us Mart
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nama Lengkap')" />

                        <x-text-input
                            id="name"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Masukkan nama lengkap"
                        />

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-5">
                        <x-input-label for="email" :value="__('Email')" />

                        <x-text-input
                            id="email"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="username"
                            placeholder="Masukkan email"
                        />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-5">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input
                            id="password"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Masukkan password"
                        />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-5">
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

                        <x-text-input
                            id="password_confirmation"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Ulangi password"
                        />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Role -->
                    <div class="mt-5">
                        <x-input-label for="role" :value="__('Role')" />

                        <select
                            name="role"
                            id="role"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                            required
                        >
                            <option value="">-- Pilih Role --</option>
                            <option value="owner" {{ old('role') == 'owner' ? 'selected' : '' }}>Owner</option>
                            <option value="manajer" {{ old('role') == 'manajer' ? 'selected' : '' }}>Manajer</option>
                            <option value="kasir" {{ old('role') == 'kasir' ? 'selected' : '' }}>Kasir</option>
                            <option value="gudang" {{ old('role') == 'gudang' ? 'selected' : '' }}>Gudang</option>
                            <option value="supervisor" {{ old('role') == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                        </select>

                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Button Register -->
                    <div class="mt-8">
                        <button
                            type="submit"
                            class="w-full py-3 px-4 bg-slate-900 text-white font-semibold rounded-xl shadow-lg shadow-blue-200 transition duration-200"
                        >
                            Daftar Akun
                        </button>
                    </div>

                    <!-- Link Login -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Sudah punya akun?

                            <a
                                href="{{ route('login') }}"
                                class="font-semibold text-slate-900"
                            >
                                Login sekarang
                            </a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>