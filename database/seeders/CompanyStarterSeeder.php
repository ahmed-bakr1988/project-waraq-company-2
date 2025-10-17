<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\NewsPost;
use App\Models\Pages;
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
        $categories = [
            ['name' => 'Test Liner 1', 'slug' => 'test-liner-1'],
            ['name' => 'Test Liner 2', 'slug' => 'test-liner-2'],
            ['name' => 'HP Fluting', 'slug' => 'hp-fluting'],
            ['name' => 'White Top', 'slug' => 'white-top'],
            ['name' => 'Unbleached Coreboard', 'slug' => 'unbleached-coreboard'],
            ['name' => 'Semi Kraft Liner', 'slug' => 'semi-kraft-liner'],
        ];

        $catModels = [];
        foreach ($categories as $i => $c) {
            $catModels[$c['slug']] = ProductCategory::query()->updateOrCreate(
                ['slug' => $c['slug']],
                [
                    'name' => $c['name'],
                    'description' => 'Category: '.$c['name'],
                    'order' => $i + 1,
                    'is_active' => true,
                ]
            );
        }

        $products = [
            [
                'category' => 'hp-fluting',
                'slug' => 'hp-flute',
                'image' => 'assets/images/gallery/images-products/Picture3.webp',
                'summary_en' => 'High-performance fluting material',
                'summary_ar' => 'ورق فلوت عالي الأداء',
                'specs' => ['gsm_range' => '125-200', 'fiber' => 'recycled', 'width_mm' => [1000, 2400]],
            ],
            [
                'category' => 'test-liner-1',
                'slug' => 'test-liner-1-p',
                'image' => 'assets/images/gallery/images-products/Picture4.webp',
                'summary_en' => 'Durable test liner',
                'summary_ar' => 'ورق تيست لاينر متين',
                'specs' => ['gsm_range' => '140-230', 'fiber' => 'recycled', 'width_mm' => [1200, 2600]],
            ],
            [
                'category' => 'white-top',
                'slug' => 'white-top-1',
                'image' => 'assets/images/gallery/images-products/Picture5.webp',
                'summary_en' => 'White top liner for packaging',
                'summary_ar' => 'وايت توب للتغليف',
                'specs' => ['gsm_range' => '125-200', 'fiber' => 'virgin', 'width_mm' => [1000, 2400]],
            ],
            [
                'category' => 'semi-kraft-liner',
                'slug' => 'semi-kraft-1',
                'image' => 'assets/images/gallery/images-products/Picture7.webp',
                'summary_en' => 'Semi kraft liner',
                'summary_ar' => 'سيمي كرافت لاينر',
                'specs' => ['gsm_range' => '120-200', 'fiber' => 'mix', 'width_mm' => [1100, 2400]],
            ],
            [
                'category' => 'unbleached-coreboard',
                'slug' => 'coreboard-1',
                'image' => 'assets/images/gallery/images-products/Picture4.webp',
                'summary_en' => 'Unbleached coreboard',
                'summary_ar' => 'كوربورد غير مبيض',
                'specs' => ['gsm_range' => '200-400', 'fiber' => 'recycled', 'width_mm' => [1000, 2200]],
            ],
            [
                'category' => 'test-liner-2',
                'slug' => 'test-liner-2-p',
                'image' => 'assets/images/gallery/images-products/Picture5.webp',
                'summary_en' => 'Test liner variant 2',
                'summary_ar' => 'تيست لاينر نوع 2',
                'specs' => ['gsm_range' => '130-210', 'fiber' => 'recycled', 'width_mm' => [1000, 2400]],
            ],
        ];

        foreach ($products as $idx => $p) {
            $product = Product::query()->updateOrCreate(
                ['image' => $p['image']],
                [
                    'product_category_id' => $catModels[$p['category']]->id,
                    'summary' => $p['summary_en'],
                    'specs' => $p['specs'],
                    'order' => $idx + 1,
                    'is_active' => true,
                ]
            );

            // Translations
            foreach ([
                'en' => ['name' => Str::headline(str_replace('-', ' ', $p['slug'])), 'desc' => $p['summary_en']],
                'ar' => ['name' => $p['summary_ar'], 'desc' => $p['summary_ar']],
            ] as $locale => $t) {
                ProductTranslation::query()->updateOrCreate(
                    ['product_id' => $product->id, 'locale' => $locale],
                    [
                        'slug' => $p['slug'],
                        'name' => $t['name'],
                        'category' => $catModels[$p['category']]->name,
                        'description' => $t['desc'],
                        'features' => [],
                    ]
                );
            }
        }

        // Pages (About, Factory, Environment) en/ar
        foreach (['about', 'factory', 'environment'] as $slug) {
            foreach (['en' => Str::title($slug), 'ar' => ''] as $locale => $title) {
                Pages::query()->updateOrCreate(
                    ['locale' => $locale, 'slug' => $slug],
                    [
                        'title' => $title ?: strtoupper($slug),
                        'summary' => $locale === 'en' ? 'Company '.$title.' page' : 'صفحة '.$slug,
                        'body' => $locale === 'en' ? ($title.' content') : ('محتوى '.$slug),
                        'published_at' => now(),
                    ]
                );
            }
        }

        // News (3 posts)
        $dates = [0, -3, -7];
        foreach ($dates as $i => $d) {
            NewsPost::query()->updateOrCreate(
                ['locale' => 'en', 'slug' => 'post-'.$i],
                [
                    'title' => 'News Post '.($i + 1),
                    'excerpt' => 'Excerpt '.($i + 1),
                    'body' => 'Body content for news post '.($i + 1),
                    'is_published' => true,
                    'published_at' => now()->addDays($d),
                ]
            );
        }

        // Team Members (3)
        $members = [
            ['name' => 'Ali Hassan', 'role' => 'CEO'],
            ['name' => 'Mona Khaled', 'role' => 'Operations'],
            ['name' => 'John Smith', 'role' => 'Sales'],
        ];
        foreach ($members as $i => $m) {
            TeamMember::query()->updateOrCreate(
                ['name' => $m['name']],
                [
                    'role' => $m['role'],
                    'photo' => null,
                    'bio' => $m['role'].' bio',
                    'order' => $i + 1,
                ]
            );
        }

        // Careers (2)
        foreach ([
            ['title' => 'Production Engineer', 'location' => 'Riyadh'],
            ['title' => 'Sales Executive', 'location' => 'Jeddah'],
        ] as $c) {
            Career::query()->updateOrCreate(
                ['title' => $c['title']],
                [
                    'location' => $c['location'],
                    'description' => 'Responsibilities for '.$c['title'],
                    'apply_email' => 'hr@example.com',
                    'form_url' => null,
                    'is_active' => true,
                    'published_at' => now(),
                ]
            );
        }
    }
}
