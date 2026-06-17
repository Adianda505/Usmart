{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-indigo-100 px-4 py-10">

        <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            <!-- Bagian kiri / branding -->
            <div class="hidden md:flex flex-col justify-center p-10 bg-slate-900 text-white relative overflow-hidden">

                <div class="absolute -top-16 -right-16 w-40 h-40 bg-white/10 rounded-full"></div>
                <div class="absolute -bottom-20 -left-20 w-56 h-56 bg-white/10 rounded-full"></div>

                <div class="relative z-10">
                    <h1 class="text-4xl font-bold mb-4">
                        Welcome to UsMart
                    </h1>
                    <p>
                        Sistem manajemen stok produk dan transaksi
                    <p>
                </div>
            </div>

            <!-- Bagian kanan / form login -->
            <div class="p-8 md:p-12">

                <div class="mb-8 text-center md:text-left">
                    <h2 class="text-3xl font-bold text-gray-800">
                        Login
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Masuk ke akun Us Mart kamu
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />

                        <x-text-input
                            id="email"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Masukkan email kamu"
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
                            autocomplete="current-password"
                            placeholder="Masukkan password"
                        />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me dan Forgot Password -->
                    <div class="flex items-center justify-between mt-5">
                        <label for="remember_me" class="inline-flex items-center">
                            <input
                                id="remember_me"
                                type="checkbox"
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                                name="remember"
                            >

                            <span class="ms-2 text-sm text-gray-600">
                                {{ __('Remember me') }}
                            </span>
                        </label>

                        @if (Route::has('password.request'))
                            <a
                                class="text-sm text-slate-900 font-medium"
                                href="{{ route('password.request') }}"
                            >
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- Button Login -->
                    <div class="mt-8">
                        <button
                            type="submit"
                            class="w-full py-3 px-4 bg-slate-900 text-white font-semibold rounded-xl shadow-lg shadow-blue-200 transition duration-200"
                        >
                            Login
                        </button>
                    </div>

                    <!-- Link Register -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Belum punya akun?

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="font-semibold text-slate-900"
                                >
                                    Daftar sekarang
                                </a>
                            @endif
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>