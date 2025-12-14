<?php

namespace Tests\Feature;

use App\Models\NewsPost;
use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SitemapRobotsTest extends TestCase
{
    use RefreshDatabase;

    public function test_sitemap_and_robots(): void
    {
        // Seed one product with translation and one news post
        $p = Product::factory()->create();
        ProductTranslation::query()->create([
            'product_id' => $p->id,
            'locale' => 'en',
            'slug' => 'p1',
            'name' => 'P1',
            'description' => 'Desc',
            'short_description' => 'Short',
            'features' => [],
            'meta_title' => null,
            'meta_description' => null,
        ]);

        NewsPost::factory()->create(['locale' => 'en']);

        $this->get('/sitemap.xml')->assertStatus(200)->assertHeader('Content-Type', 'application/xml');
        $this->get('/robots.txt')->assertStatus(200)->assertHeader('Content-Type', 'text/plain; charset=UTF-8');
    }
}
