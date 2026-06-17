<section class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">

    <div class="bg-slate-900 px-6 py-5">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center text-white text-xl font-bold">
                👤
            </div>

            <div>
                <h2 class="text-xl font-bold text-white">
                    Informasi Profile
                </h2>

                <p class="mt-1 text-sm text-blue-100">
                    Perbarui nama dan email akun Us Mart kamu.
                </p>
            </div>
        </div>
    </div>

    <div class="p-6">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('patch')

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" />

                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="mt-2 block w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    :value="old('name', $user->name)"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Masukkan nama lengkap"
                />

                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    class="mt-2 block w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    :value="old('email', $user->email)"
                    required
                    autocomplete="username"
                    placeholder="Masukkan email"
                />

                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-4 rounded-xl bg-yellow-50 border border-yellow-200 p-4">
                        <p class="text-sm text-yellow-800">
                            Email kamu belum diverifikasi.

                            <button
                                form="send-verification"
                                class="font-semibold underline text-yellow-700 hover:text-yellow-900"
                            >
                                Kirim ulang email verifikasi
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                Link verifikasi baru sudah dikirim ke email kamu.
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Button -->
            <div class="flex items-center gap-4">
                <button
                    type="submit"
                    class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-md shadow-blue-200 transition"
                >
                    Simpan Perubahan
                </button>

                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm font-medium text-green-600"
                    >
                        Berhasil disimpan.
                    </p>
                @endif
            </div>
        </form>
    </div>
</section>