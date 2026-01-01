<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Static Pages Routes
Route::middleware('web')->group(function () {
    // Home and Quick Links
    Route::get('/', function () {
        return view('pages.index');
    })->name('pages.index');

    Route::get('/about', function () {
        return view('pages.about');
    })->name('pages.about');

    Route::get('/features', function () {
        return view('pages.features');
    })->name('pages.features');

    Route::get('/pricing', function () {
        return view('pages.pricing');
    })->name('pages.pricing');

    Route::get('/blog', function () {
        return view('pages.blog');
    })->name('pages.blog');

    // Blog Articles
    Route::prefix('blog')->name('pages.blog.')->group(function () {
        Route::get('/article-savings-strategies', function () {
            return view('pages.blog.article-savings-strategies');
        })->name('article-savings-strategies');

        Route::get('/article-loan-management', function () {
            return view('pages.blog.article-loan-management');
        })->name('article-loan-management');

        Route::get('/article-financial-literacy', function () {
            return view('pages.blog.article-financial-literacy');
        })->name('article-financial-literacy');

        Route::get('/article-community-story', function () {
            return view('pages.blog.article-community-story');
        })->name('article-community-story');

        Route::get('/article-financial-metrics', function () {
            return view('pages.blog.article-financial-metrics');
        })->name('article-financial-metrics');

        Route::get('/article-digitization', function () {
            return view('pages.blog.article-digitization');
        })->name('article-digitization');
    });

    Route::get('/contact', [ContactController::class, 'show'])->name('pages.contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('pages.contact.store');

    // Products
    Route::prefix('products')->name('pages.products.')->group(function () {
        Route::get('/group-savings', function () {
            return view('pages.products.group-savings');
        })->name('group-savings');

        Route::get('/loan-management', function () {
            return view('pages.products.loan-management');
        })->name('loan-management');

        Route::get('/member-dashboard', function () {
            return view('pages.products.member-dashboard');
        })->name('member-dashboard');

        Route::get('/analytics', function () {
            return view('pages.products.analytics');
        })->name('analytics');

        Route::get('/mobile-app', function () {
            return view('pages.products.mobile-app');
        })->name('mobile-app');
    });

    // Support
    Route::prefix('support')->name('pages.support.')->group(function () {
        Route::get('/help-center', function () {
            return view('pages.support.help-center');
        })->name('help-center');

        Route::get('/documentation', function () {
            return view('pages.support.documentation');
        })->name('documentation');

        Route::get('/user-guide', function () {
            return view('pages.support.user-guide');
        })->name('user-guide');

        Route::get('/admin-guide', function () {
            return view('pages.support.admin-guide');
        })->name('admin-guide');

        Route::get('/api-docs', function () {
            return view('pages.support.api-docs');
        })->name('api-docs');

        Route::get('/faq', function () {
            return view('pages.support.faq');
        })->name('faq');

        Route::get('/status', function () {
            return view('pages.support.status-page');
        })->name('status-page');

        Route::get('/changelog', function () {
            return view('pages.support.changelog');
        })->name('changelog');
    });

    // Legal
    Route::prefix('legal')->name('pages.legal.')->group(function () {
        Route::get('/privacy-policy', function () {
            return view('pages.legal.privacy-policy');
        })->name('privacy-policy');

        Route::get('/terms-of-service', function () {
            return view('pages.legal.terms-of-service');
        })->name('terms-of-service');

        Route::get('/cookie-policy', function () {
            return view('pages.legal.cookie-policy');
        })->name('cookie-policy');
    });

    // SEO Routes - Sitemap and Robots
    Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');
    Route::get('/robots.txt', [\App\Http\Controllers\SitemapController::class, 'robots'])->name('robots');
});
