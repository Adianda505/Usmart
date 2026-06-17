<section class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">

    <div class="bg-slate-900 px-6 py-5">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center text-white text-xl font-bold">
                🔒
            </div>

            <div>
                <h2 class="text-xl font-bold text-white">
                    Update Password
                </h2>

                <p class="mt-1 text-sm text-indigo-100">
                    Gunakan password yang kuat agar akun Us Mart tetap aman.
                </p>
            </div>
        </div>
    </div>

    <div class="p-6">
        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            @method('put')

            <!-- Current Password -->
            <div>
                <x-input-label for="update_password_current_password" :value="__('Password Saat Ini')" />

                <x-text-input
                    id="update_password_current_password"
                    name="current_password"
                    type="password"
                    class="mt-2 block w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    autocomplete="current-password"
                    placeholder="Masukkan password saat ini"
                />

                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <!-- New Password -->
            <div>
                <x-input-label for="update_password_password" :value="__('Password Baru')" />

                <x-text-input
                    id="update_password_password"
                    name="password"
                    type="password"
                    class="mt-2 block w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    autocomplete="new-password"
                    placeholder="Masukkan password baru"
                />

                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Password Baru')" />

                <x-text-input
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="mt-2 block w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    autocomplete="new-password"
                    placeholder="Ulangi password baru"
                />

                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Button -->
            <div class="flex items-center gap-4">
                <button
                    type="submit"
                    class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md shadow-indigo-200 transition"
                >
                    Update Password
                </button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm font-medium text-green-600"
                    >
                        Password berhasil diperbarui.
                    </p>
                @endif
            </div>
        </form>
    </div>
</section>