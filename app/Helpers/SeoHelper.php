<?php

namespace App\Helpers;

use Illuminate\Support\Str;

/**
 * SEO Helper Class
 * Provides utilities for generating SEO-friendly content and structured data
 */
class SeoHelper
{
    /**
     * Generate a URL-friendly slug
     */
    public static function slug(string $text): string
    {
        return Str::slug($text);
    }

    /**
     * Truncate text for meta description (max 160 characters)
     */
    public static function metaDescription(string $text, int $maxLength = 160): string
    {
        $text = strip_tags($text);
        $text = preg_replace('/\s+/', ' ', $text);
        
        if (strlen($text) <= $maxLength) {
            return $text;
        }
        
        $truncated = substr($text, 0, $maxLength - 3);
        $lastSpace = strrpos($truncated, ' ');
        
        if ($lastSpace !== false) {
            $truncated = substr($truncated, 0, $lastSpace);
        }
        
        return $truncated . '...';
    }

    /**
     * Generate LocalBusiness schema for local SEO
     */
    public static function localBusinessSchema(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'FinancialService',
            'name' => config('app.name', 'isubyo'),
            'description' => 'Smart group savings and loans management platform',
            'url' => config('app.url'),
            'logo' => asset('images/isubyo.png'),
            'image' => asset('images/isubyo-og.png'),
            'priceRange' => '$',
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Kigali',
                'addressCountry' => 'RW',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => -1.9403,
                'longitude' => 29.8739,
            ],
            'openingHoursSpecification' => [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens' => '08:00',
                'closes' => '18:00',
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
                'email' => 'support@isubyo.com',
                'availableLanguage' => ['English', 'Kinyarwanda'],
            ],
            'sameAs' => [
                'https://twitter.com/isubyo',
                'https://www.facebook.com/isubyo',
                'https://www.linkedin.com/company/isubyo',
            ],
        ];
    }

    /**
     * Generate Article schema for blog posts
     */
    public static function articleSchema(
        string $title,
        string $description,
        string $url,
        string $image,
        string $datePublished,
        string $dateModified = null,
        string $author = null
    ): array {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $title,
            'description' => self::metaDescription($description),
            'url' => $url,
            'image' => $image,
            'datePublished' => $datePublished,
            'dateModified' => $dateModified ?? $datePublished,
            'author' => [
                '@type' => 'Organization',
                'name' => $author ?? config('app.name', 'isubyo'),
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => config('app.name', 'isubyo'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/isubyo.png'),
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $url,
            ],
        ];
    }

    /**
     * Generate FAQ schema
     */
    public static function faqSchema(array $faqs): array
    {
        $mainEntity = [];
        
        foreach ($faqs as $faq) {
            $mainEntity[] = [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer'],
                ],
            ];
        }
        
        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $mainEntity,
        ];
    }

    /**
     * Generate Breadcrumb schema
     */
    public static function breadcrumbSchema(array $items): array
    {
        $itemListElement = [];
        
        foreach ($items as $index => $item) {
            $itemListElement[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'item' => $item['url'] ?? url()->current(),
            ];
        }
        
        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $itemListElement,
        ];
    }

    /**
     * Generate Product/Service schema
     */
    public static function serviceSchema(
        string $name,
        string $description,
        string $price = '0',
        string $currency = 'USD'
    ): array {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $name,
            'description' => self::metaDescription($description),
            'provider' => [
                '@type' => 'Organization',
                'name' => config('app.name', 'isubyo'),
            ],
            'areaServed' => [
                '@type' => 'Place',
                'name' => 'Africa',
            ],
            'offers' => [
                '@type' => 'Offer',
                'price' => $price,
                'priceCurrency' => $currency,
            ],
        ];
    }

    /**
     * Generate HowTo schema for tutorials
     */
    public static function howToSchema(
        string $name,
        string $description,
        array $steps,
        string $totalTime = 'PT10M'
    ): array {
        $stepList = [];
        
        foreach ($steps as $index => $step) {
            $stepList[] = [
                '@type' => 'HowToStep',
                'position' => $index + 1,
                'name' => $step['name'],
                'text' => $step['text'],
                'url' => $step['url'] ?? null,
            ];
        }
        
        return [
            '@context' => 'https://schema.org',
            '@type' => 'HowTo',
            'name' => $name,
            'description' => self::metaDescription($description),
            'totalTime' => $totalTime,
            'step' => $stepList,
        ];
    }

    /**
     * Convert schema array to JSON-LD script tag
     */
    public static function toJsonLd(array $schema): string
    {
        return '<script type="application/ld+json">' . 
               json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . 
               '</script>';
    }

    /**
     * Generate canonical URL
     */
    public static function canonicalUrl(string $path = null): string
    {
        if ($path) {
            return rtrim(config('app.url'), '/') . '/' . ltrim($path, '/');
        }
        
        return url()->current();
    }

    /**
     * Generate hreflang tags for multi-language support
     */
    public static function hreflangTags(array $languages = ['en', 'rw']): string
    {
        $tags = '';
        $currentUrl = url()->current();
        
        foreach ($languages as $lang) {
            $tags .= '<link rel="alternate" hreflang="' . $lang . '" href="' . $currentUrl . '" />' . "\n";
        }
        
        $tags .= '<link rel="alternate" hreflang="x-default" href="' . $currentUrl . '" />';
        
        return $tags;
    }
}
