<?php

namespace App\Services;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleService
{
    /**
     * Available locales in the application
     */
    protected const AVAILABLE_LOCALES = ['en', 'fr', 'sw', 'rw'];

    /**
     * Default locale - Kinyarwanda
     */
    protected const DEFAULT_LOCALE = 'rw';

    /**
     * Get current application locale
     */
    public static function getCurrentLocale(): string
    {
        return App::getLocale();
    }

    /**
     * Set application locale to Kinyarwanda (default)
     */
    public static function setToKinyarwanda(): void
    {
        App::setLocale(self::DEFAULT_LOCALE);
        Session::put('locale', self::DEFAULT_LOCALE);
    }

    /**
     * Set application locale to a specific language
     */
    public static function setLocale(string $locale): bool
    {
        if (!in_array($locale, self::AVAILABLE_LOCALES)) {
            return false;
        }

        App::setLocale($locale);
        Session::put('locale', $locale);
        return true;
    }

    /**
     * Get the default locale (Kinyarwanda)
     */
    public static function getDefaultLocale(): string
    {
        return self::DEFAULT_LOCALE;
    }

    /**
     * Get all available locales
     */
    public static function getAvailableLocales(): array
    {
        return self::AVAILABLE_LOCALES;
    }

    /**
     * Check if locale is available
     */
    public static function isAvailable(string $locale): bool
    {
        return in_array($locale, self::AVAILABLE_LOCALES);
    }

    /**
     * Reset locale to default (Kinyarwanda)
     */
    public static function resetToDefault(): void
    {
        Session::forget('locale');
        App::setLocale(self::DEFAULT_LOCALE);
    }

    /**
     * Get locale name in its own language
     */
    public static function getLocaleName(string $locale): string
    {
        return match ($locale) {
            'en' => 'English',
            'fr' => 'Français',
            'sw' => 'Kiswahili',
            'rw' => 'Ikinyarwanda',
            default => self::DEFAULT_LOCALE,
        };
    }

    /**
     * Get locale flag emoji
     */
    public static function getLocaleFlag(string $locale): string
    {
        return match ($locale) {
            'en' => '🇬🇧',
            'fr' => '🇫🇷',
            'sw' => '🇹🇿',
            'rw' => '🇷🇼',
            default => '🇷🇼',
        };
    }
}
