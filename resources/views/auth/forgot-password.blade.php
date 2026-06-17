<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-indigo-100 px-4 py-10">

        <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            <!-- Bagian kiri / branding -->
            <div class="hidden md:flex flex-col justify-center p-10 bg-gradient-to-br from-slate-900 to-blue-700 text-white relative overflow-hidden">

                <div class="absolute -top-16 -right-16 w-40 h-40 bg-white/10 rounded-full"></div>
                <div class="absolute -bottom-20 -left-20 w-56 h-56 bg-white/10 rounded-full"></div>

                <div class="relative z-10">
                    <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center text-2xl mb-6">
                        🔐
                    </div>

                    <h1 class="text-4xl font-bold mb-4">
                        Lupa Password?
                    </h1>

                    <p class="text-blue-100 text-lg leading-relaxed">
                        Tenang, masukkan email akun Us Mart kamu. Sistem akan mengirimkan link untuk mengatur ulang password.
                    </p>

                    <div class="mt-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                ✓
                            </div>
                            <span>Masukkan email terdaftar</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                ✓
                            </div>
                            <span>Cek link reset password</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                ✓
                            </div>
                            <span>Buat password baru</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian kanan / form forgot password -->
            <div class="p-8 md:p-12 flex flex-col justify-center">

                <div class="mb-8 text-center md:text-left">
                    <div class="mx-auto md:mx-0 w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-5">
                        🔑
                    </div>

                    <h2 class="text-3xl font-bold text-gray-800">
                        Reset Password
                    </h2>

                    <p class="mt-3 text-gray-500 leading-relaxed">
                        Masukkan email yang terhubung dengan akun Us Mart kamu.
                        Kami akan mengirimkan link untuk membuat password baru.
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
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
                            placeholder="Masukkan email kamu"
                        />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Button -->
                    <div class="mt-8">
                        <button
                            type="submit"
                            class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg shadow-blue-200 transition duration-200"
                        >
                            Kirim Link Reset Password
                        </button>
                    </div>

                    <!-- Back to Login -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Sudah ingat password?

                            <a
                                href="{{ route('login') }}"
                                class="font-semibold text-blue-600 hover:text-blue-800"
                            >
                                Kembali ke Login
                            </a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>