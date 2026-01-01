<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 px-4">
        <!-- Success Container -->
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ __('messages.password_reset_successful') }}</h1>
                <p class="text-gray-600">{{ __('messages.your_password_has_been_reset') }}</p>
            </div>

            <!-- Success Message Box -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ __('messages.you_can_now_login') }} {{ __('messages.with_your_new_password') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Details Section -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">{{ __('messages.what_happens_next') }}</h2>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <div class="flex items-center justify-center w-6 h-6 rounded-full bg-indigo-100 mr-3 mt-0.5">
                            <span class="text-sm font-medium text-indigo-600">1</span>
                        </div>
                        <p class="text-gray-700">{{ __('messages.your_password_is_now_updated') }}</p>
                    </li>
                    <li class="flex items-start">
                        <div class="flex items-center justify-center w-6 h-6 rounded-full bg-indigo-100 mr-3 mt-0.5">
                            <span class="text-sm font-medium text-indigo-600">2</span>
                        </div>
                        <p class="text-gray-700">{{ __('messages.click_below_to_login') }}</p>
                    </li>
                    <li class="flex items-start">
                        <div class="flex items-center justify-center w-6 h-6 rounded-full bg-indigo-100 mr-3 mt-0.5">
                            <span class="text-sm font-medium text-indigo-600">3</span>
                        </div>
                        <p class="text-gray-700">{{ __('messages.use_your_email_and_new_password') }}</p>
                    </li>
                </ul>
            </div>

            <!-- CTA Button -->
            <div class="space-y-3">
                <a href="{{ route('login') }}" class="w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all shadow-md hover:shadow-lg">
                    {{ __('messages.continue_to_login') }}
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>

                <a href="{{ route('login') }}" class="w-full inline-flex items-center justify-center px-6 py-2 text-gray-700 font-medium rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                    {{ __('messages.back_to_login') }}
                </a>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <p class="text-sm text-blue-900">
                    <span class="font-semibold">{{ __('messages.security_note') }}:</span>
                    {{ __('messages.password_reset_security_message') }}
                </p>
            </div>

            <!-- Support Link -->
            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">
                    {{ __('messages.having_trouble') }}
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">{{ __('messages.contact_support') }}</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
