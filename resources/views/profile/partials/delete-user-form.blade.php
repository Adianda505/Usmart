<section class="bg-white rounded-2xl shadow-lg border border-red-100 overflow-hidden">

    <div class="bg-red-600 px-6 py-5">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center text-white text-xl font-bold">
                ⚠️
            </div>

            <div>
                <h2 class="text-xl font-bold text-white">
                    Hapus Akun
                </h2>

                <p class="mt-1 text-sm text-red-100">
                    Tindakan ini akan menghapus akun secara permanen.
                </p>
            </div>
        </div>
    </div>

    <div class="p-6 space-y-6">
        <div class="rounded-xl bg-red-50 border border-red-200 p-4">
            <p class="text-sm text-red-700 leading-relaxed">
                Setelah akun dihapus, semua data yang berkaitan dengan akun ini akan dihapus secara permanen.
                Pastikan kamu sudah yakin sebelum melanjutkan proses ini.
            </p>
        </div>

        <button
            type="button"
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl shadow-md shadow-red-200 transition"
        >
            Hapus Akun
        </button>

        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center text-red-600 text-xl">
                        ⚠️
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-gray-900">
                            Yakin ingin menghapus akun?
                        </h2>

                        <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                            Setelah akun dihapus, semua data dan informasi akun akan hilang secara permanen.
                            Masukkan password kamu untuk mengonfirmasi penghapusan akun.
                        </p>
                    </div>
                </div>

                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('Password') }}" />

                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-2 block w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500"
                        placeholder="Masukkan password"
                    />

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <button
                        type="button"
                        x-on:click="$dispatch('close')"
                        class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl shadow-md shadow-red-200 transition"
                    >
                        Ya, Hapus Akun
                    </button>
                </div>
            </form>
        </x-modal>
    </div>
</section>