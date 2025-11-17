<?php

namespace Tests\Feature;

use App\Models\NewsPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * اختبار ميزة قائمة الأخبار للتأكد من ظهور المنشورات المنشورة ضمن المسار المحلي.
 */
class NewsListingTest extends TestCase
{
    use RefreshDatabase;

    public function test_news_index_lists_published_posts(): void
    {
        $post = new NewsPost;
        $post->locale = 'en';
        $post->title = 'Hello World';
        $post->slug = 'hello-world';
        $post->excerpt = 'short';
        $post->body = 'long body';
        $post->is_published = true;
        $post->published_at = now()->subDay();
        $post->save();

        // Set locale for the test
        app()->setLocale('en');

        $response = $this->followingRedirects()->get(route('news.index', [], false));
        $response->assertStatus(200)
            ->assertSee('Hello World');
    }

    // Additional show page tests can be added later if needed
}
