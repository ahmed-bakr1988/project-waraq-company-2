<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\EnvironmentController;
use App\Http\Controllers\Frontend\FactoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\ProductCategoryController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Root home (fallback) without locale prefix and redirect to localized if available

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localeViewPath'],
    ],
    function () {

        // Localized home (will have prefix e.g. /ar)
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/products/categories', [ProductCategoryController::class, 'index'])->name('product-categories.index');
        Route::get('/products/category/{slug}', [ProductCategoryController::class, 'show'])->name('product-categories.show');

        // About Routes
        Route::get('/company-history', function () {
            return view('pages.company-history');
        })->name('company-history');
        Route::get('/vision-mission', function () {
            return view('pages.vision-mission');
        })->name('vision-mission');
        Route::get('/our-team', function () {
            return view('pages.our-team');
        })->name('our-team');
        Route::get('/quality-certificates', function () {
            return view('pages.quality-certificates');
        })->name('quality-certificates');
        Route::get('/social-responsibility', function () {
            return view('pages.social-responsibility');
        })->name('social-responsibility');
        Route::get('/awards-recognition', function () {
            return view('pages.awards-recognition');
        })->name('awards-recognition');

        // News Routes
        Route::get('/company-news', function () {
            return view('pages.company-news');
        })->name('company-news');
        Route::get('/technical-articles', function () {
            return view('pages.technical-articles');
        })->name('technical-articles');
        Route::get('/news', [NewsController::class, 'index'])->name('news.index');
        Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
        Route::get('/tips-guidelines', function () {
            return view('pages.tips-guidelines');
        })->name('tips-guidelines');
        Route::get('/exhibitions-events', function () {
            return view('pages.exhibitions-events');
        })->name('exhibitions-events');

        // Sustainability Routes
        Route::get('/sustainability-activities', function () {
            return view('pages.sustainability-activities');
        })->name('sustainability-activities');

        // Simple analytics dashboard preview (stub)
        Route::get('/dashboards/{id}', function (string $id) {
            return view('pages.dashboard', [
                'dashboardId' => $id,
            ]);
        })->name('dashboards.show');

        // Contact Routes
        Route::get('/contact-info', function () {
            return view('pages.contact-info');
        })->name('contact-info');
        Route::get('/quote-request', function () {
            return view('pages.quote-request');
        })->name('quote-request');
        Route::get('/customer-service', function () {
            return view('pages.customer-service');
        })->name('customer-service');
        Route::get('/complaints-suggestions', function () {
            return view('pages.complaints-suggestions');
        })->name('complaints-suggestions');
        Route::get('/about', [AboutController::class, 'show'])->name('about');
        Route::get('/factory', [FactoryController::class, 'show'])->name('factory');
        Route::get('/environment', [EnvironmentController::class, 'show'])->name('environment');
        Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
        Route::get('/careers/{id}', [CareerController::class, 'show'])->name('careers.show');

        // Contact Form Routes with Rate Limiting
        Route::post('/contact', [ContactController::class, 'store'])
            ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class])
            ->middleware('throttle:10,1')
            ->name('contact.store');

        Route::post('/quote-request', [ContactController::class, 'storeQuote'])
            ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class])
            ->middleware('throttle:5,1')
            ->name('quote.store');

        Route::post('/newsletter', [ContactController::class, 'newsletter'])
            ->withoutMiddleware([
                \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
                \Illuminate\Routing\Middleware\ThrottleRequests::class,
            ])
            ->name('newsletter.store');

        // Sitemaps & Robots (non-localized endpoints)
        Route::get('/sitemap.xml', [SitemapController::class, 'sitemap'])->name('sitemap');
        Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

        // Fallback non-localized routes for tests / direct access (named for helpers)
        Route::get('/news', [NewsController::class, 'index'])->name('news.index');
        Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/products/categories', [ProductCategoryController::class, 'index'])->name('product-categories.index');
        Route::get('/products/category/{slug}', [ProductCategoryController::class, 'show'])->name('product-categories.show');

        // About & static pages
        Route::get('/company-history', fn () => view('pages.company-history'))->name('company-history');
        Route::get('/vision-mission', fn () => view('pages.vision-mission'))->name('vision-mission');
        Route::get('/our-team', fn () => view('pages.our-team'))->name('our-team');
        Route::get('/quality-certificates', fn () => view('pages.quality-certificates'))->name('quality-certificates');
        Route::get('/social-responsibility', fn () => view('pages.social-responsibility'))->name('social-responsibility');
        Route::get('/awards-recognition', fn () => view('pages.awards-recognition'))->name('awards-recognition');
        Route::get('/tips-guidelines', fn () => view('pages.tips-guidelines'))->name('tips-guidelines');
        Route::get('/exhibitions-events', fn () => view('pages.exhibitions-events'))->name('exhibitions-events');
        Route::get('/sustainability-activities', fn () => view('pages.sustainability-activities'))->name('sustainability-activities');
        Route::get('/contact-info', fn () => view('pages.contact-info'))->name('contact-info');
        Route::get('/quote-request', fn () => view('pages.quote-request'))->name('quote-request');
        Route::get('/customer-service', fn () => view('pages.customer-service'))->name('customer-service');
        Route::get('/complaints-suggestions', fn () => view('pages.complaints-suggestions'))->name('complaints-suggestions');
        Route::get('/about', [AboutController::class, 'show'])->name('about');
        Route::get('/factory', [FactoryController::class, 'show'])->name('factory');
        Route::get('/environment', [EnvironmentController::class, 'show'])->name('environment');
        Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
        Route::get('/careers/{id}', [CareerController::class, 'show'])->name('careers.show');
    }
);
