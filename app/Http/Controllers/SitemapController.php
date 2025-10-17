<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use App\Models\Product;
use Illuminate\Http\Response as HttpResponse;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * توليد ملفات Sitemap XML و robots.txt ديناميكياً.
 *
 * - sitemap.xml: يتضمن الروابط المترجمة للصفحة الرئيسية، المنتجات، والأخبار.
 * - robots.txt: يسمح بالزحف ويعلن عن رابط ملف الـ Sitemap.
 */
class SitemapController extends Controller
{
    /**
     * إنشاء خريطة الموقع بصيغة XML مع روابط مترجمة.
     */
    public function sitemap(): HttpResponse
    {
        $urls = [];

        $locales = array_keys(LaravelLocalization::getSupportedLocales() ?: ['en' => []]);

        foreach ($locales as $locale) {
            $urls[] = [
                'loc' => LaravelLocalization::getLocalizedURL($locale, '/'),
                'priority' => '1.0',
                'lastmod' => now()->toAtomString(),
            ];
        }

        // المنتجات
        $products = Product::query()->with('translations')->get();
        foreach ($products as $product) {
            foreach ($product->translations as $tr) {
                $locUrl = LaravelLocalization::getLocalizedURL($tr->locale, route('products.show', $product->id, false));
                $urls[] = [
                    'loc' => $locUrl,
                    'priority' => '0.8',
                    'lastmod' => optional($product->updated_at)->toAtomString(),
                ];
            }
        }

        // الأخبار
        $news = NewsPost::query()->latest('published_at')->get();
        foreach ($news as $post) {
            $locUrl = LaravelLocalization::getLocalizedURL($post->locale, route('news.show', $post->slug, false));
            $urls[] = [
                'loc' => $locUrl,
                'priority' => '0.6',
                'lastmod' => optional($post->published_at ?? $post->updated_at)->toAtomString(),
            ];
        }

        $content = view('sitemap.xml', compact('urls'))->render();

        return response($content, 200, ['Content-Type' => 'application/xml']);
    }

    /**
     * إنشاء ملف robots.txt بسيط يسمح بالزحف ويشير إلى خريطة الموقع.
     */
    public function robots(): HttpResponse
    {
        $host = parse_url((string) config('app.url'), PHP_URL_HOST) ?: request()->getHost();
        $scheme = request()->isSecure() ? 'https' : 'http';
        $sitemapUrl = sprintf('%s://%s/sitemap.xml', $scheme, $host);

        $lines = [
            'User-agent: *',
            'Disallow:',
            'Sitemap: '.$sitemapUrl,
        ];

        return response(implode("\n", $lines), 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }
}
