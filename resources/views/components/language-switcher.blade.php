@props(['class' => ''])

@php
    $locales = [
        'en' => ['name' => 'English', 'flag' => '🇬🇧', 'native' => 'English'],
        'fr' => ['name' => 'Français', 'flag' => '🇫🇷', 'native' => 'Français'],
        'sw' => ['name' => 'Kiswahili', 'flag' => '🇹🇿', 'native' => 'Kiswahili'],
        'rw' => ['name' => 'Ikinyarwanda', 'flag' => '🇷🇼', 'native' => 'Ikinyarwanda'],
    ];
    $currentLocale = app()->getLocale();
@endphp

<div x-data="{ open: false }" @keydown.escape.window="open = false" class="relative {{ $class }}">
    <button
        @click="open = !open"
        @click.outside="open = false"
        type="button"
        class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 transition duration-150"
        aria-haspopup="true"
        :aria-expanded="open"
    >
        <span class="text-lg">{{ $locales[$currentLocale]['flag'] }}</span>
        <span class="hidden sm:inline truncate">{{ $locales[$currentLocale]['native'] }}</span>
        <svg
            class="w-4 h-4 transition-transform duration-200 flex-shrink-0"
            :class="{ 'rotate-180': open }"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95 -translate-y-2"
        x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="transform opacity-0 scale-95 -translate-y-2"
        class="absolute right-0 z-50 mt-2 w-56 origin-top-right bg-white dark:bg-gray-800 rounded-lg shadow-xl ring-1 ring-black ring-opacity-5 dark:ring-gray-700 focus:outline-none overflow-hidden"
        style="display: none;"
        role="menu"
        aria-orientation="vertical"
    >
        <div class="py-1" role="none">
            @foreach($locales as $code => $locale)
                <a
                    href="{{ route('language.switch', $code) }}"
                    class="flex items-center gap-3 px-4 py-2 text-sm transition duration-150 {{ $currentLocale === $code ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-400 font-semibold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                    role="menuitem"
                    @click="open = false"
                >
                    <span class="text-lg flex-shrink-0">{{ $locale['flag'] }}</span>
                    <span class="flex-1">{{ $locale['native'] }}</span>
                    @if($currentLocale === $code)
                        <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</div>
