<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-gradient-to-r from-red-500 to-orange-500 shadow-xl rounded-lg p-8">
        <!-- Informational Message -->
        <div class="mb-6 text-white text-sm">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-white" />
                <x-text-input 
                    id="email" 
                    class="block w-full px-4 py-2 mt-1 bg-transparent border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="email" 
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-6">
                <x-primary-button 
                    class="px-6 py-3 text-orange-600 border-2 border-orange-600 rounded-lg shadow-md hover:bg-white hover:text-orange-700 hover:border-orange-700 focus:ring-2 focus:ring-indigo-500"
                >
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
