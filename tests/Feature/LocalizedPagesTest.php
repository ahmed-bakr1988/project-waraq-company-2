<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter;
use Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect;
use Tests\TestCase;

class LocalizedPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_localized_news_pages_return_200(): void
    {
        // Set the app locale before accessing
        app()->setLocale('en');

        // Disable localization redirects for testing
        $response = $this->withoutMiddleware([
            LocaleSessionRedirect::class,
            LaravelLocalizationRedirectFilter::class,
        ])->get('/news');

        $response->assertStatus(200);
    }
}
