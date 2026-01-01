<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-gray-50 via-green-50 to-emerald-50 px-4">
        <!-- Success Container -->
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ __('messages.email_verified_successfully') }}</h1>
                <p class="text-gray-600">{{ __('messages.your_email_is_now_verified') }}</p>
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
                            {{ __('messages.you_can_now_access_full_features') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Details Section -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">{{ __('messages.what_you_can_do_now') }}</h2>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <div class="flex items-center justify-center w-6 h-6 rounded-full bg-green-100 mr-3 mt-0.5">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-gray-700">{{ __('messages.access_your_dashboard') }}</p>
                    </li>
                    <li class="flex items-start">
                        <div class="flex items-center justify-center w-6 h-6 rounded-full bg-green-100 mr-3 mt-0.5">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-gray-700">{{ __('messages.manage_your_account') }}</p>
                    </li>
                    <li class="flex items-start">
                        <div class="flex items-center justify-center w-6 h-6 rounded-full bg-green-100 mr-3 mt-0.5">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-gray-700">{{ __('messages.use_all_features') }}</p>
                    </li>
                </ul>
            </div>

            <!-- CTA Button -->
            <div class="space-y-3">
                <a href="{{ route('dashboard') }}" class="w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-medium rounded-lg hover:from-green-700 hover:to-emerald-700 transition-all shadow-md hover:shadow-lg">
                    {{ __('messages.go_to_dashboard') }}
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>

                <a href="{{ route('profile.edit') }}" class="w-full inline-flex items-center justify-center px-6 py-2 text-gray-700 font-medium rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                    {{ __('messages.view_profile') }}
                </a>
            </div>

            <!-- Confirmation Info -->
            <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <p class="text-sm text-blue-900">
                    <span class="font-semibold">{{ __('messages.verified') }}:</span>
                    {{ __('messages.your_email_address_is_verified') }}: <span class="font-medium">{{ auth()->user()->email }}</span>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
