<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\OurTeamController;
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

// Sitemap & Robots (non-localized, must be outside locale group)
Route::get('/sitemap.xml', [SitemapController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

// Localized Routes Group
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localeViewPath'],
], function () {
    
    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    // Products Routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    
    // Product Categories Routes (kept original naming for backwards compatibility)
    Route::get('/products/categories', [ProductCategoryController::class, 'index'])->name('product-categories.index');
    Route::get('/products/category/{slug}', [ProductCategoryController::class, 'show'])->name('product-categories.show');
    
    // News Routes
    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/{slug}', [NewsController::class, 'show'])->name('show');
    });
    
    // Our Team Routes
    Route::prefix('our-team')->name('our-team.')->group(function () {
        Route::get('/', [OurTeamController::class, 'index'])->name('index');
        Route::get('/{slug}', [OurTeamController::class, 'show'])->name('show');
    });
    
    // About Pages
    Route::get('/about', [AboutController::class, 'show'])->name('about');
    Route::get('/factory', [FactoryController::class, 'show'])->name('factory');
    Route::get('/environment', [EnvironmentController::class, 'show'])->name('environment');
    
    // Company Information Pages
    Route::view('/company-history', 'pages.company-history')->name('company-history');
    Route::view('/vision-mission', 'pages.vision-mission')->name('vision-mission');
    Route::view('/quality-certificates', 'pages.quality-certificates')->name('quality-certificates');
    Route::view('/social-responsibility', 'pages.social-responsibility')->name('social-responsibility');
    Route::view('/awards-recognition', 'pages.awards-recognition')->name('awards-recognition');
    
    // News & Media Pages
    Route::view('/company-news', 'pages.company-news')->name('company-news');
    Route::view('/technical-articles', 'pages.technical-articles')->name('technical-articles');
    Route::view('/tips-guidelines', 'pages.tips-guidelines')->name('tips-guidelines');
    Route::view('/exhibitions-events', 'pages.exhibitions-events')->name('exhibitions-events');
    
    // Sustainability
    Route::view('/sustainability-activities', 'pages.sustainability-activities')->name('sustainability-activities');
    
    // Contact Pages
    Route::view('/contact-info', 'pages.contact-info')->name('contact-info');
    Route::view('/quote-request', 'pages.quote-request')->name('quote-request');
    Route::view('/customer-service', 'pages.customer-service')->name('customer-service');
    Route::view('/complaints-suggestions', 'pages.complaints-suggestions')->name('complaints-suggestions');
    
    // Dashboard Preview
    Route::get('/dashboards/{id}', fn(string $id) => view('pages.dashboard', ['dashboardId' => $id]))
        ->name('dashboards.show');
    
    // Contact Form Routes (with proper security)
    Route::post('/contact', [ContactController::class, 'store'])
        ->middleware('throttle:10,1')
        ->name('contact.store');
    
    Route::post('/quote-request', [ContactController::class, 'storeQuote'])
        ->middleware('throttle:5,1')
        ->name('quote.store');
    
    Route::post('/newsletter', [ContactController::class, 'newsletter'])
        ->middleware('throttle:20,1')
        ->name('newsletter.store');
});