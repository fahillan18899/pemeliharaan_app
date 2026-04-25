<x-guest-layout>

    <!-- Status -->
    <x-auth-session-status class="mb-4 text-center text-green-600" :status="session('status')" />

    <!-- Judul -->
    <h2 class="text-lg font-semibold text-center mb-4 text-gray-700">
        Masuk ke Sistem
    </h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" 
                class="block mt-1 w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                type="email"
                name="email"
                :value="old('email')"
                required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" 
                class="block mt-1 w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                type="password"
                name="password"
                required />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Remember & Forgot -->
        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember" 
                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <span class="text-gray-600">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" 
                    class="text-blue-600 hover:underline">
                    Lupa password?
                </a>
            @endif
        </div>

        <!-- Button -->
        <button type="submit" 
            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition">
            Login
        </button>

    </form>

</x-guest-layout>