<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-md mx-auto mt-10 bg-gradient-to-r from-red-500 to-orange-500 shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold text-center text-white mb-6">{{ __('Login to Your Account') }}</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-6">
                <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-white" />
                <x-text-input id="email" class="block mt-2 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Password -->
            <div class="mb-6">
                <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-white" />
                <x-text-input id="password" class="block mt-2 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <label for="remember_me" class="ml-2 text-sm text-white">{{ __('Remember me') }}</label>
            </div>

            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-white hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <!-- Updated Login Button -->
                <x-primary-button class="px-6 py-3 text-orange-600 border-2 border-orange-600 rounded-lg shadow-md hover:bg-white hover:text-orange-700 hover:border-orange-700 focus:ring-2 focus:ring-indigo-500">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
