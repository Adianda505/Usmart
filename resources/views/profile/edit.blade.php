<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-bold text-2xl text-gray-800">
                Profile Akun
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Kelola informasi akun, password, dan keamanan akun Us Mart.
            </p>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-slate-900 rounded-3xl shadow-xl p-8 text-white   ">
                <div class="flex flex-col md:flex-row md:items-center gap-5">
                    <div class="w-20 h-20 rounded-2xl bg-white/20 flex items-center justify-center text-3xl font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div>
                        <h1 class="text-3xl font-bold">
                            {{ auth()->user()->name }}
                        </h1>

                        <p class="mt-1 text-blue-100">
                            {{ auth()->user()->email }}
                        </p>

                        <span class="inline-block mt-3 px-4 py-1.5 bg-white/20 rounded-full text-sm font-medium">
                            Role: {{ ucfirst(auth()->user()->role) }}
                        </span>
                    </div>
                </div>
            </div>

            @include('profile.partials.update-profile-information-form')

            @include('profile.partials.update-password-form')

            @include('profile.partials.delete-user-form')

        </div>
    </div>
</x-app-layout>
