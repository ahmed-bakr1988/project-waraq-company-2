<?php

namespace Tests\Feature;

use App\Models\NewsPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter;
use Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect;
use Tests\TestCase;

/**
 * اختبار ميزة قائمة الأخبار للتأكد من ظهور المنشورات المنشورة ضمن المسار المحلي.
 */
class NewsListingTest extends TestCase
{
    use RefreshDatabase;

    public function test_news_index_lists_published_posts(): void
    {
        // Set the app locale to English
        app()->setLocale('en');

        $post = new NewsPost;
        $post->locale = 'en';
        $post->title = 'Hello World';
        $post->slug = 'hello-world';
        $post->excerpt = 'short';
        $post->body = 'long body';
        $post->is_published = true;
        $post->published_at = now()->subDay();
        $post->save();

        // Disable localization redirects for testing
        $response = $this->withoutMiddleware([
            LocaleSessionRedirect::class,
            LaravelLocalizationRedirectFilter::class,
        ])->get('/news');

        $response->assertStatus(200)
            ->assertSee('Hello World');
    }
}
