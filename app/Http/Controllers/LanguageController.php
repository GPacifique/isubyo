<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Available locales with their names and flags
     */
    protected array $locales = [
        'en' => ['name' => 'English', 'flag' => '🇬🇧', 'native' => 'English'],
        'fr' => ['name' => 'French', 'flag' => '🇫🇷', 'native' => 'Français'],
        'sw' => ['name' => 'Swahili', 'flag' => '🇹🇿', 'native' => 'Kiswahili'],
        'rw' => ['name' => 'Kinyarwanda', 'flag' => '🇷🇼', 'native' => 'Ikinyarwanda'],
    ];

    /**
     * Switch the application language
     */
    public function switch(Request $request, string $locale)
    {
        if (array_key_exists($locale, $this->locales)) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }

    /**
     * Get available locales
     */
    public function getLocales(): array
    {
        return $this->locales;
    }
}
