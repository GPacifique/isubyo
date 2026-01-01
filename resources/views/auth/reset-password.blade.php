<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 px-4 py-12">
        <!-- Container -->
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ __('messages.reset_password') }}</h1>
                <p class="text-gray-600">{{ __('messages.enter_new_password_below') }}</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-lg shadow-lg p-8 border border-gray-200">
                <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900 mb-2">
                            {{ __('messages.email_address') }}
                        </label>
                        <input
                            id="email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition @error('email') border-red-500 @enderror"
                            type="email"
                            name="email"
                            value="{{ old('email', $request->email) }}"
                            required
                            autofocus
                            autocomplete="username"
                        />
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-900 mb-2">
                            {{ __('messages.new_password') }}
                        </label>
                        <input
                            id="password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition @error('password') border-red-500 @enderror"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">{{ __('messages.password_requirements') }}</p>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-900 mb-2">
                            {{ __('messages.confirm_password') }}
                        </label>
                        <input
                            id="password_confirmation"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition @error('password_confirmation') border-red-500 @enderror"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium py-3 rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            {{ __('messages.reset_password') }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Help Text -->
            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">
                    {{ __('messages.remember_password') }}
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">{{ __('messages.back_to_login') }}</a>
                </p>
            </div>

            <!-- Security Info -->
            <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <p class="text-sm text-blue-900">
                    <span class="font-semibold">{{ __('messages.security_note') }}:</span>
                    {{ __('messages.reset_link_expires_in_60_minutes') }}
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
