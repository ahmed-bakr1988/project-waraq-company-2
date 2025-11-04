<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\NewsPost;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTranslation;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanyStarterSeeder extends Seeder
{
    public function run(): void
    {
        // Categories
        $categories = [
            'Test Liner 1',
            'Test Liner 2',
            'HP Fluting',
            'White Top',
            'Unbleached Coreboard',
            'Semi Kraft Liner',
        ];

        $catIds = [];
        foreach ($categories as $i => $name) {
            $cat = ProductCategory::query()->updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'description' => 'Category: '.$name,
                    'order' => $i,
                    'is_active' => true,
                ],
            );
            $catIds[] = $cat->id;
        }

        // Products with translations
        for ($i = 0; $i < 6; $i++) {
            $p = Product::query()->create([
                'product_category_id' => $catIds[$i % count($catIds)],
                'image' => 'assets/images/banner/21.webp',
                'logo' => null,
                'url' => null,
                'summary' => 'Short summary for product '.($i + 1),
                'specs' => [
                    'gsm_range' => [125, 200],
                    'fiber' => 'recycled',
                    'width_mm' => [1200, 1800],
                ],
                'downloads' => [
                    'spec_pdf' => 'https://example.com/spec.pdf',
                ],
                'order' => $i,
                'is_active' => true,
            ]);

            foreach (['en' => 'EN', 'ar' => 'AR'] as $locale => $suffix) {
                ProductTranslation::query()->updateOrCreate(
                    ['product_id' => $p->id, 'locale' => $locale],
                    [
                        'slug' => 'product-'.($i + 1).'-'.$locale,
                        'name' => 'Product '.($i + 1).' '.$suffix,
                        'category' => $categories[$i % count($categories)],
                        'description' => 'Description '.$suffix,
                        'features' => ['Strong', 'Durable'],
                    ],
                );
            }
        }

        // News posts
        NewsPost::factory()->count(3)->state(['locale' => 'en'])->create();
        NewsPost::factory()->count(3)->state(['locale' => 'ar'])->create();

        // Team members
        TeamMember::factory()->count(3)->create();

        // Careers
        Career::factory()->count(2)->create();

        // Pages
        $pages = [
            ['slug' => 'about', 'title' => 'About', 'body' => 'About body'],
            ['slug' => 'factory', 'title' => 'Factory', 'body' => 'Factory body'],
            ['slug' => 'environment', 'title' => 'Environment', 'body' => 'Environment body'],
        ];

        foreach (['en', 'ar'] as $locale) {
            foreach ($pages as $p) {
                Page::query()->updateOrCreate(
                    ['locale' => $locale, 'slug' => $p['slug']],
                    [
                        'title' => $p['title'],
                        'summary' => $p['title'].' summary',
                        'body' => $p['body'].' ('.$locale.')',
                        'meta' => ['locale' => $locale],
                        'published_at' => now(),
                    ],
                );
            }
        }
    }
}
