<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    /**
     * Generate XML sitemap for search engines
     * This provides search engines with all indexable pages
     */
    public function index(): Response
    {
        $baseUrl = config('app.url', 'https://isubyo.com');

        // Define all public pages with their priorities and change frequencies
        $pages = [
            // Main pages
            [
                'url' => '/',
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'daily',
                'priority' => '1.0',
            ],
            [
                'url' => '/about',
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            [
                'url' => '/features',
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            [
                'url' => '/pricing',
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'weekly',
                'priority' => '0.9',
            ],
            [
                'url' => '/contact',
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ],
            [
                'url' => '/blog',
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            // Blog articles
            [
                'url' => '/blog/article-savings-strategies',
                'lastmod' => '2024-12-15',
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ],
            [
                'url' => '/blog/article-loan-management',
                'lastmod' => '2024-12-18',
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ],
            [
                'url' => '/blog/article-financial-literacy',
                'lastmod' => '2024-12-12',
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ],
            [
                'url' => '/blog/article-community-story',
                'lastmod' => '2024-12-20',
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ],
            [
                'url' => '/blog/article-financial-metrics',
                'lastmod' => '2024-12-10',
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ],
            [
                'url' => '/blog/article-digitization',
                'lastmod' => '2024-12-22',
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ],
            // Products
            [
                'url' => '/products/savings',
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            [
                'url' => '/products/loans',
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            [
                'url' => '/products/groups',
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            // Legal pages
            [
                'url' => '/legal/privacy',
                'lastmod' => '2024-01-01',
                'changefreq' => 'yearly',
                'priority' => '0.4',
            ],
            [
                'url' => '/legal/terms',
                'lastmod' => '2024-01-01',
                'changefreq' => 'yearly',
                'priority' => '0.4',
            ],
            // Support
            [
                'url' => '/support/faq',
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'weekly',
                'priority' => '0.6',
            ],
            [
                'url' => '/support/documentation',
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'weekly',
                'priority' => '0.6',
            ],
            // Auth pages (lower priority but still indexable)
            [
                'url' => '/login',
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.5',
            ],
            [
                'url' => '/register',
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ],
        ];

        $content = $this->generateSitemapXml($baseUrl, $pages);

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Generate sitemap XML content
     */
    private function generateSitemapXml(string $baseUrl, array $pages): string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
        $xml .= 'xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ';
        $xml .= 'xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";

        foreach ($pages as $page) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($baseUrl . $page['url']) . "</loc>\n";
            $xml .= "    <lastmod>" . $page['lastmod'] . "</lastmod>\n";
            $xml .= "    <changefreq>" . $page['changefreq'] . "</changefreq>\n";
            $xml .= "    <priority>" . $page['priority'] . "</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }

    /**
     * Generate robots.txt dynamically
     */
    public function robots(): Response
    {
        $baseUrl = config('app.url', 'https://isubyo.com');

        $content = <<<ROBOTS
# isubyo Robots.txt
# https://isubyo.com

User-agent: *
Allow: /

# Block admin and authenticated areas
Disallow: /dashboard
Disallow: /admin
Disallow: /group-admin
Disallow: /member
Disallow: /profile
Disallow: /chat
Disallow: /api/
Disallow: /_debugbar/

# Block utility pages
Disallow: /password/
Disallow: /email/
Disallow: /logout
Disallow: /sanctum/

# Allow important pages
Allow: /login
Allow: /register

# Crawl-delay for polite crawling
Crawl-delay: 1

# Sitemap location
Sitemap: {$baseUrl}/sitemap.xml

# Google specific
User-agent: Googlebot
Allow: /
Disallow: /dashboard
Disallow: /admin
Disallow: /group-admin
Disallow: /member

# Bing specific
User-agent: Bingbot
Allow: /
Disallow: /dashboard
Disallow: /admin
Disallow: /group-admin
Disallow: /member

# Block bad bots
User-agent: AhrefsBot
Disallow: /

User-agent: SemrushBot
Disallow: /

User-agent: MJ12bot
Disallow: /
ROBOTS;

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }
}
