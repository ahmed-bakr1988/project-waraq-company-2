تمام يا أحمد. تحت هتلاقي “Prompt” واحد جاهز تنسخه لأداة الذكاء الاصطناعي عندك علشان تنفّذ كل المطلوب بالترتيب من **الأهم → المهم → التحسينات**، مع **شروط قبول** و**أوامر واضحة** و**مخرجات متوقعة**. استشهدت بأفضل المراجع الرسمية لـ CSP وSEO/صور/Schema ونسقت القوائم بحسب مواقع المرجع (WARAQ وEl-Soudi) علشان نوصل لنفس المستوى الاحترافي. ([MDN Web Docs][1])

> ملاحظة: عناصر القوائم والمحتوى المؤسسي مقتبسة من:
> – **WARAQ**: قوائم About/Vision–Mission–Values، Products (Unbleached Coreboard, Fluting, Test Liner, Semi Kraft Liner)، Environment/How we work، News. ([waraq.com][2])
> – **El-Soudi for Paper**: Our Companies، Our Factory (أرقام: المساحة/عدد المصانع/العمالة)، Products (Test Liner 1/2, HP Flute, Absorbent Kraft Liner, White Top)، Contact. ([elsoudi-paper.com][3])

---

# 📌 MASTER IMPLEMENTATION PROMPT (انسخه كما هو للأداة)

**الدور (Role):**
أنت Agent تنفيذي خبير Laravel 12 + Filament v4 + Vite، مسئول عن تحويل موقع شركة ورقية إلى مستوى مواقع الشركات المرجعية (WARAQ / El-Soudi). نفّذ الخطة بالكامل بالترتيب المحدد، مع Git commits صغيرة، واكتب اختبار/تحقق بعد كل مرحلة.

**البيئة:** PHP 8.2+، Laravel 12، Filament ^4، Vite، Blade، MySQL، لغتين (ar/en)، RTL.

**معايير عامة (Non-functional):**

* أمان: تفعيل **CSP صارم**، منع المصادر الخارجية للخطوط/الأيقونات (حمّلها محليًا). (مرجع CSP من MDN). ([MDN Web Docs][1])
* SEO دولي: **hreflang** ثنائي (ar / en) + **x-default**، self-referencing، روابط كاملة. (مرجع Google Search Central). ([Google for Developers][4])
* أداء الصور: استخدم **WebP/AVIF** + `loading="lazy"` لكل الصور خارج الـviewport، واحفظ أبعاد الصور لتفادي CLS. (مراجع web.dev). ([web.dev][5])
* بيانات منظَّمة: **Organization + ContactPoint** و**Product** كـ JSON-LD. (schema.org/Google). ([Schema.org][6])

---

## ⚠️ المرحلة A — الأهم (أساس الأمان والبنية)

**الهدف:** إصلاح الأصول وCSP، وبناء هيكل CMS مؤسسي يطابق المواقع المرجعية.

1. **Security & Assets Baseline**

* أنشئ Middleware: `app/Http/Middleware/SecurityHeaders.php` يضبط رأس **Content-Security-Policy** مع سياسات:
  `default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline'; img-src 'self' data: blob:; font-src 'self' data:; connect-src 'self'; frame-ancestors 'none'; base-uri 'self'; form-action 'self'` (اضبطها إن لزم). ([MDN Web Docs][1])
* سجّل الـMiddleware في Kernel وتأكد أنه يُطبق على web.
* انقل الخطوط/الأيقونات محليًا (Vite): ضعها تحت `resources/assets/fonts`، وحدّث CSS @font-face لمسارات `@vite`.
* **شروط القبول:** لا أخطاء Console تتعلق بـCSP/Fonts، كل الأصول تُحمَّل محليًا.

2. **هيكل المحتوى المؤسسي (Filament Resources)**
   ولّـد الموارد التالية (Models + Migrations + Filament Resources):

* `Page` (صفحات ثابتة: About, Factory, Sustainability/Environment, Leadership, Milestones)
* `ProductCategory`, `Product` (حقول مقترحة: name, slug, summary, specs(JSON: gsm_range, fiber, width…), downloads)
* `NewsPost` (title, slug, excerpt, body, published_at, cover)
* `TeamMember` (name, role, photo, bio, order)
* `MediaItem` (title, type, url/file, thumbnail)
* `Career` (title, location, description, apply_email/form_url)
  **أوامر توليد (أمثلة):**

```bash
php artisan make:model Page -m
php artisan make:model ProductCategory -m
php artisan make:model Product -m
php artisan make:model NewsPost -m
php artisan make:model TeamMember -m
php artisan make:model MediaItem -m
php artisan make:model Career -m

php artisan make:filament-resource Page --generate
php artisan make:filament-resource ProductCategory --generate
php artisan make:filament-resource Product --generate
php artisan make:filament-resource NewsPost --generate
php artisan make:filament-resource TeamMember --generate
php artisan make:filament-resource MediaItem --generate
php artisan make:filament-resource Career --generate
```

(تأكيد: `make:filament-resource` و`--generate` مدعومين في وثائق/مقالات Filament v3/v4). ([docs.laravel-filament.cn][7])

* فعّل علاقات/تبويبات داخل موارد Filament (Nested/Relation Managers) عند الحاجة. ([Filament][8])
* **شروط القبول:** CRUD كامل لكل كيان + صلاحيات أساسية + قائمة تنقل في لوحة Filament.

3. **قائمة الموقع العلوية (Main Nav) متوافقة مع المرجع**
   أنشئ Mega-Menu به الأقسام التالية (قابلة للإدارة من `Page` و`ProductCategory`):

* About (About / Vision – Mission – Values) — مأخوذة من WARAQ. ([waraq.com][9])
* Products (أمثلة فئات: **Test Liner 1/2, HP Fluting, White Top, Absorbent Kraft Liner, Unbleached Coreboard, Semi Kraft Liner**) — ملائمة لما يظهر بالمواقع المرجعية. ([elsoudi-paper.com][3])
* Factory — كما في El-Soudi. ([elsoudi-paper.com][10])
* Environment/Sustainability — كما في WARAQ. ([waraq.com][2])
* Media/News — كما في WARAQ (قسم أخبار نشط). ([waraq.com][2])
* Careers — مذكورة لدى El-Soudi/WARAQ. ([elsoudi-paper.com][3])
* Contact — تفاصيل العناوين والهواتف. ([elsoudi-paper.com][11])
  **شروط القبول:** القوائم تعمل باللغتين، ومسارات سليمة، وروابط فعّالة.

---

## ✅ المرحلة B — المهم (الواجهة، الترجمة، الـSEO الأساسي)

4. **الصفحات العامة (Blade + Controllers)**

* أنشئ Controllers/Views لصفحات: Home, About, Factory, Environment, Products (قائمة وفردية), News (قائمة + عرض), Careers (قائمة + عرض), Contact.
* بنية المنتجات: صفحة فئة → بطاقات منتجات → صفحة منتج بمواصفات تقنية مختصرة (GSM/الألياف/الاستخدامات والأبعاد). (محاكاة تنظيم WARAQ/El-Soudi). ([waraq.com][12])
* أضف JSON-LD:

  * `Organization` + `ContactPoint` في الـ`<head>` للموقع. ([Google for Developers][13])
  * `Product` في صفحات المنتج.
* **شروط القبول:** Lighthouse SEO ≥ 90 على الصفحات الأساسية.

5. **i18n & hreflang**

* مسارات مسبوقة بالـlocale (`/{locale}/...`) + تبديل لغة دائم بالهيدر.
* داخل `<head>` لكل صفحة: `link rel="alternate" hreflang="ar" …` + `hreflang="en"` + `x-default` لنسخة محايدة. التزم بالأكواد ISO وبالروابط الكاملة وبالروابط العكسية (self-referencing). ([Google for Developers][4])
* **شروط القبول:** تحقق عبر فحص يدوي أن كل نسخة تشير للأخرى (bidirectional).

6. **أداء الصور**

* تحويل الصور إلى WebP/AVIF مع fallback (إذا لزم)، وإضافة `loading="lazy"` لكل صور خارج الـviewport، والحفاظ على `width/height`. ([web.dev][14])
* **شروط القبول:** LCP < 2.5s على 4G، CLS < 0.1.

---

## 🔧 المرحلة C — التحسينات (الأتمتة، السايت ماب، الاختبارات)

7. **Sitemaps & Robots**

* أنشئ `sitemap.xml` ديناميكيًا (home/pages/products/news).
* `robots.txt`: لا تستخدم `noindex` داخل robots (غير مدعوم)، لا تحظر CSS/JS، وأضف سطر `Sitemap: https://example.com/sitemap.xml`. ([SEOs Hut][15])
* **شروط القبول:** Google Search Console يلتقط السايت ماب بدون تحذيرات.

8. **تكامل n8n لاستيراد المنتجات**

* أنشئ Endpoint آمن: `POST /api/v1/products/upsert` مع Header `X-API-Token`.
* الحقول: `category_slug,name_ar,name_en,slug,summary_ar,summary_en,specs(json),images[],published_at`.
* سير n8n: Google Sheets → HTTP Request (Bearer/Token) → Laravel.
* **شروط القبول:** تشغيل تدفق إدخال مثال (3 منتجات) وتحديثها عبر upsert بنجاح.

9. **الاختبارات والتتبّع**

* PHPUnit Feature:

  * News listing returns 200 and shows latest posts.
  * Product upsert API requires token & validates payload.
* Analytics: إعداد events أساسية (CTA “Get Quote”, “Apply Job”, “Download Spec PDF”).

10. **تسليم نهائي**

* README مختصر: طريقة إدارة المحتوى عبر Filament، نشر الصور، توليد السايت ماب، تشغيل n8n.
* Checklists UAT:

  * كل روابط الهيدر والفوتر تعمل.
  * الصفحات الحرجة (Home/Products/Factory/Environment/News/Contact/Careers) متوفرة بالعربي/الإنجليزي.
  * **CSP** لا يمنع أي أصل ضروري. ([MDN Web Docs][1])

---

## أوامر تنفيذ نموذجية (ضعها ضمن مهام الأداة)

```bash
# 0) تنصيب الاعتمادات (لو لسه)
composer install && npm ci

# 1) أمان وأصول
php artisan make:middleware SecurityHeaders
# (حدّث handle() لإضافة رؤوس CSP وغيرها ثم اربط الـMiddleware بمجموعة web)

# 2) الموديلات والموارد
php artisan make:model Page -m && php artisan make:filament-resource Page --generate
php artisan make:model ProductCategory -m && php artisan make:filament-resource ProductCategory --generate
php artisan make:model Product -m && php artisan make:filament-resource Product --generate
php artisan make:model NewsPost -m && php artisan make:filament-resource NewsPost --generate
php artisan make:model TeamMember -m && php artisan make:filament-resource TeamMember --generate
php artisan make:model MediaItem -m && php artisan make:filament-resource MediaItem --generate
php artisan make:model Career -m && php artisan make:filament-resource Career --generate
php artisan migrate

# 3) الواجهة والـSEO
# - إنشاء Controllers/Views للصفحات العامة
# - إضافة JSON-LD Organization/ContactPoint و Product في صفحات المنتج
# - ضبط hreflang (ar, en, x-default) في <head>

# 4) الصور
# - تحويل الصور إلى WebP/AVIF (مثلاً عبر vite plugin أو task خارجي) وإضافة loading="lazy"

# 5) السايت ماب والروبوتس
# - توليد sitemap.xml ديناميكي
# - إنشاء robots.txt وإضافة سطر Sitemap ومنع فقط المسارات الإدارية دون حظر CSS/JS

# 6) API للأتمتة
php artisan make:controller Api/ProductUpsertController
# - مسار: POST /api/v1/products/upsert (محمّي بـ token)
# - فاليوديشن و upsert وربط الصور

# 7) اختبارات
php artisan make:test ProductUpsertTest --unit
php artisan make:test NewsListingTest --feature

# 8) Build نهائي
npm run build
```

**رسائل Git الموصى بها (مختصرة وواضحة):**
`feat(security): add CSP middleware and local fonts via Vite`
`feat(cms): scaffold Filament resources (pages, products, news, team, media, careers)`
`feat(ui): public pages & product details with JSON-LD`
`chore(seo): hreflang + sitemap + robots (no blocking css/js)`
`feat(api): products upsert endpoint + tests`
`perf(images): webp/avif + lazy loading`

---

## معايير القبول (Acceptance Criteria) ملخّصة

* ✅ **CSP** مُفعّل بدون أخطاء Console، جميع الخطوط/الأيقونات محلية. ([MDN Web Docs][1])
* ✅ لوحة **Filament** تُدار منها الصفحات/المنتجات/الأخبار/الفريق/الوسائط/الوظائف. ([docs.laravel-filament.cn][7])
* ✅ قوائم الموقع تتوافق مع بنية المواقع المرجعية المذكورة. ([waraq.com][2])
* ✅ **hreflang** (ar/en/x-default) صحيح وراجع ذاتي (bidirectional). ([Google for Developers][4])
* ✅ صور **WebP/AVIF** و`loading="lazy"`، ثبات Layout. ([web.dev][14])
* ✅ **sitemap.xml** و **robots.txt** بدون حظر CSS/JS ومع رابط السايت ماب. ([Prerender][16])
* ✅ سير **n8n** يُغذّي المنتجات عبر API upsert بنجاح.

---

لو عايزني أحوّل الـPrompt ده لإصدار “تنفيذي بالكامل” بصيغة JSON لروبوت الـCI/CD أو n8n (مع steps/conditions)، قولي وانا أطلّع لك نسخة plug-and-play فورًا.

[1]: https://developer.mozilla.org/en-US/docs/Security/CSP/Introducing_Content_Security_Policy?utm_source=chatgpt.com "Content Security Policy (CSP) - HTTP | MDN"
[2]: https://waraq.com/?utm_source=chatgpt.com "WARAQ – Arab Paper Manufacturing Company"
[3]: https://elsoudi-paper.com/?utm_source=chatgpt.com "Home – saudi group"
[4]: https://developers.google.com/search/docs/specialty/international/localized-versions/?utm_source=chatgpt.com "Localized Versions of your Pages | Google Search Central  |  Documentation  |  Google for Developers"
[5]: https://web.dev/learn/images/avif//?utm_source=chatgpt.com "Image formats: AVIF  |  web.dev"
[6]: https://schema.org/Organization?utm_source=chatgpt.com "Organization - Schema.org Type"
[7]: https://docs.laravel-filament.cn/docs/3.x/panels/getting-started/?utm_source=chatgpt.com "Getting started | Laravel Filament"
[8]: https://next.filamentphp.com/content/leandrocfe-whats-new-in-filament-v4?utm_source=chatgpt.com "What's new in Filament v4? - Feature Overview by Leandro Ferreira - Filament"
[9]: https://waraq.com/overview/?utm_source=chatgpt.com "Overview – WARAQ"
[10]: https://elsoudi-paper.com/our-factory/?utm_source=chatgpt.com "Our Factory – saudi group"
[11]: https://elsoudi-paper.com/contact-us/?utm_source=chatgpt.com "Contact us – saudi group"
[12]: https://waraq.com/how-we-work/?utm_source=chatgpt.com "How we work – WARAQ"
[13]: https://developers.google.com/search/docs/appearance/structured-data/organization?utm_source=chatgpt.com "Organization Schema Markup | Google Search Central  |  Documentation  |  Google for Developers"
[14]: https://web.dev/articles/choose-the-right-image-format?utm_source=chatgpt.com "Choose the right image format  |  Articles  |  web.dev"
[15]: https://seoshut.com/blog/robots-txt-best-practices/?utm_source=chatgpt.com "Robots Txt Best Practices: A Comprehensive Guide"
[16]: https://prerender.io/blog/robots-txt-and-seo/?utm_source=chatgpt.com "Robots.txt Guide to Boost SEO: The Dos, Don’ts, and Examples"






---------------------------------------------------------------
 <!-- partners area breadcrumb area wrapper -->
    <div class="partner-breadcrumb bg_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-left center">
                        <span class="bg-title">Shop</span>
                        <h1 class="title">
                            Shop
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partners area breadcrumb area end -->



    <div class="shop-area-start rts-section-gapTop">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.2">
                    <div class="rts-single-shop-area">
                        <a href="shop-single.html" class="thumbnail">
                            <img src="assets/images/shop/01.webp" alt="shop">
                        </a>
                        <div class="inner-content">
                            <div class="stars-area">
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                            </div>
                            <a href="shop-single.html">
                                <h4 class="title">Music Headphones</h4>
                            </a>
                            <div class="pricing-area-wrapper">
                                <p class="price">$400</p>
                                <button class="rts-btn btn-primary"><i class="fa-regular fa-cart-shopping"></i> Add To
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.3">
                    <div class="rts-single-shop-area">
                        <a href="shop-single.html" class="thumbnail">
                            <img src="assets/images/shop/02.webp" alt="shop">
                        </a>
                        <div class="inner-content">
                            <div class="stars-area">
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                            </div>
                            <a href="shop-single.html">
                                <h4 class="title">White joystick gamepad</h4>
                            </a>
                            <div class="pricing-area-wrapper">
                                <p class="price">$300</p>
                                <button class="rts-btn btn-primary"><i class="fa-regular fa-cart-shopping"></i> Add To
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.4">
                    <div class="rts-single-shop-area">
                        <a href="shop-single.html" class="thumbnail">
                            <img src="assets/images/shop/03.webp" alt="shop">
                        </a>
                        <div class="inner-content">
                            <div class="stars-area">
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                            </div>
                            <a href="shop-single.html">
                                <h4 class="title">Smartwatch screen digital</h4>
                            </a>
                            <div class="pricing-area-wrapper">
                                <p class="price">$200</p>
                                <button class="rts-btn btn-primary"><i class="fa-regular fa-cart-shopping"></i> Add To
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.2">
                    <div class="rts-single-shop-area">
                        <a href="shop-single.html" class="thumbnail">
                            <img src="assets/images/shop/04.webp" alt="shop">
                        </a>
                        <div class="inner-content">
                            <div class="stars-area">
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                            </div>
                            <a href="shop-single.html">
                                <h4 class="title">Hiking Boots With Pink</h4>
                            </a>
                            <div class="pricing-area-wrapper">
                                <p class="price">$199</p>
                                <button class="rts-btn btn-primary"><i class="fa-regular fa-cart-shopping"></i> Add To
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.3">
                    <div class="rts-single-shop-area">
                        <a href="shop-single.html" class="thumbnail">
                            <img src="assets/images/shop/05.webp" alt="shop">
                        </a>
                        <div class="inner-content">
                            <div class="stars-area">
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                            </div>
                            <a href="shop-single.html">
                                <h4 class="title">Glasses with rounded frames</h4>
                            </a>
                            <div class="pricing-area-wrapper">
                                <p class="price">$320</p>
                                <button class="rts-btn btn-primary"><i class="fa-regular fa-cart-shopping"></i> Add To
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.4">
                    <div class="rts-single-shop-area">
                        <a href="shop-single.html" class="thumbnail">
                            <img src="assets/images/shop/06.webp" alt="shop">
                        </a>
                        <div class="inner-content">
                            <div class="stars-area">
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                            </div>
                            <a href="shop-single.html">
                                <h4 class="title">Bearded guy t shirt</h4>
                            </a>
                            <div class="pricing-area-wrapper">
                                <p class="price">$650</p>
                                <button class="rts-btn btn-primary"><i class="fa-regular fa-cart-shopping"></i> Add To
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.2">
                    <div class="rts-single-shop-area">
                        <a href="shop-single.html" class="thumbnail">
                            <img src="assets/images/shop/07.webp" alt="shop">
                        </a>
                        <div class="inner-content">
                            <div class="stars-area">
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                            </div>
                            <a href="shop-single.html">
                                <h4 class="title">Brown briefcase with tablet</h4>
                            </a>
                            <div class="pricing-area-wrapper">
                                <p class="price">$999</p>
                                <button class="rts-btn btn-primary"><i class="fa-regular fa-cart-shopping"></i> Add To
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.3">
                    <div class="rts-single-shop-area">
                        <a href="shop-single.html" class="thumbnail">
                            <img src="assets/images/shop/08.webp" alt="shop">
                        </a>
                        <div class="inner-content">
                            <div class="stars-area">
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                            </div>
                            <a href="shop-single.html">
                                <h4 class="title">Hand holding photo camera</h4>
                            </a>
                            <div class="pricing-area-wrapper">
                                <p class="price">$99</p>
                                <button class="rts-btn btn-primary"><i class="fa-regular fa-cart-shopping"></i> Add To
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12" data-animation="fadeInUp" data-delay="0.4">
                    <div class="rts-single-shop-area">
                        <a href="shop-single.html" class="thumbnail">
                            <img src="assets/images/shop/09.webp" alt="shop">
                        </a>
                        <div class="inner-content">
                            <div class="stars-area">
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                            </div>
                            <a href="shop-single.html">
                                <h4 class="title">Levitating cosmetic cream</h4>
                            </a>
                            <div class="pricing-area-wrapper">
                                <p class="price">$126</p>
                                <button class="rts-btn btn-primary"><i class="fa-regular fa-cart-shopping"></i> Add To
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="rts-brand-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-list-area-wrapper">
                        <div class="left-paragraph">
                            <p>Our Trusted Clients</p>
                        </div>
                        <div class="right-brand-area-wrapper">
                            <div class="single-image">
                                <img src="assets/images/brand/01.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/02.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/03.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/04.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/05.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/06.webp" alt="brand">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-cta-area-inner bg_image ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-inner-content-inner-page">
                        <div class="left-side-content">
                            <span>Subscribe Newsletter</span>
                            <h3 class="title">Stay Updated with <br> the Latest News!</h3>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Enter Email Address">
                            <button class="rts-btn btn-primary btn-white">Subscribe Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- shop details area start -->
 <div class="rts-sop-details-area rts-section-gapTop">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-horizental">
                        <div class="swiper swiper-container-h1">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="slider-inner">
                                        <img src="assets/images/shop/shop-01.jpg" alt="full_screen-image">
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="slider-inner">
                                        <img src="assets/images/shop/shop-03.jpg" alt="full_screen-image">
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="slider-inner">
                                        <img src="assets/images/shop/shop-02.jpg" alt="full_screen-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-pagination-area-shop-details">
                            <div class="swiper-pagination swiper-pagination-horizontal">
                                <span class="swiper-pagination-bullet"></span>
                                <span class="swiper-pagination-bullet two"></span>
                                <span class="swiper-pagination-bullet three"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt_md--180 mt_sm--180">
                    <div class="ms-single-product__content">
                        <h2 class="ms-single-product_title">Modernize Shovel</h2>
                        <p class="price">
                            <span class="woocommerce-Price-amount amount">
                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>29.00</bdi>
                            </span>
                        </p>
                        <div class="ms-woocommerce-product-rating woocommerce-product-rating">
                            <div class="ms-rating-icon">
                                <svg height="26px" version="1.2" viewBox="3 2 22 22" width="26px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <g>
                                            <path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="ms-rating-average"> 5.00 </div>
                            <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span
                                    class="count">1</span> customer review)</a>
                        </div>
                        <div class="woocommerce-product-details__short-description">
                            <p>Progressively incentivize B2C content vis-a-vis reliable experiences.
                                Phosfluorescently benchmark unique e-services whereas transparent
                                collaboration and idea-sharing. Enthusiastically communicate maintainable
                                networks via global metrics. Credibly negotiate progressive bandwidth for go
                                forward e-commerce. Rapidiously evolve magnetic initiatives through
                                client-based portals.
                            </p>
                        </div>
                        <p class="stock in-stock">7 in stock</p>
                        <div class="quantity-area">
                            <div class="cart-edit">
                                <div class="quantity-edit">
                                    <button class="button"><i class="fal fa-minus minus"></i></button>
                                    <input type="text" class="input" value="3">
                                    <button class="button plus">+<i class="fal fa-plus plus"></i></button>
                                </div>
                            </div>
                            <a href="cart.html" class="rts-btn btn-primary">Add to cart</a>
                        </div>
                        <div class="product_meta">
                            <span class="sku_wrapper"><strong>SKU:</strong> <span class="sku">161056</span></span>
                            <span class="posted_in"><strong>Category:</strong> <a href="#0" rel="tag">For
                                    Running</a></span>
                            <span class="tagged_as"><strong>Tags:</strong> <a href="#0" rel="tag">Life</a>,
                                <a href="#0" rel="tag">Move</a>,
                                <a href="#0" rel="tag">Sport</a>,
                                <a href="#0" rel="tag">Trainers</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 tab-area-shop rts-section-gap">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs pt--100 pt_md--50 pt_sm--50" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Additional
                                Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Review
                                (0)</button>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            Credibly e-enable e-business materials with competitive products.
                            Enthusiastically extend unique leadership before timely users. Synergistically
                            scale B2C e-business rather than quality products. Synergistically incubate
                            extensible outsourcing via magnetic sources. Interactively revolutionize
                            intuitive collaboration and idea-sharing through high-quality models. Synergistically
                            incubate
                            extensible outsourcing via magnetic sources. Interactively revolutionize
                            intuitive collaboration and idea-sharing through high-quality models. Interactively
                            revolutionize
                            intuitive collaboration and idea-sharing through high-quality models.
                            <br>
                            <br>
                            Interactively revolutionize intuitive collaboration and idea-sharing through high-quality
                            models. Credibly e-enable e-business materials with competitive products.
                            Enthusiastically extend unique leadership before timely users.
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="ms-section-title">
                                <h3 class="ms-heading-title"> Additional information</h3>
                                <table class="woocommerce-product-attributes shop_attributes">
                                    <tbody>
                                        <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_size">
                                            <th class="woocommerce-product-attributes-item__label">Size</th>
                                            <td class="woocommerce-product-attributes-item__value">
                                                <p>39, 40, 41, 42, 43, 44</p>
                                            </td>
                                        </tr>
                                        <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_collection">
                                            <th class="woocommerce-product-attributes-item__label"> Collection</th>
                                            <td class="woocommerce-product-attributes-item__value">
                                                <p>Most Sport Pro</p>
                                            </td>
                                        </tr>
                                        <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_upper-material">
                                            <th class="woocommerce-product-attributes-item__label">Upper Material</th>
                                            <td class="woocommerce-product-attributes-item__value">
                                                <p>Leather</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab" tabindex="0">
                            <div id="reviews" class="woocommerce-Reviews">
                                <div class="full-details-inner">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="reveiw-form">
                                                <h2 class="heading-title"> Be the first to reveiw</h2>
                                                <div class="reveiw-form-main">
                                                    <form class="contact-form">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="input-box text-input">
                                                                    <textarea name="Message" id="validationDefault01" cols="30" rows="10" placeholder="Your Review*"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="col-lg-12">
                                                                    <div class="input-box">
                                                                        <input type="text" id="validationDefault02" placeholder="Name*" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="input-box mail-input">
                                                                        <input type="text" id="validationDefault03" placeholder="E-mail*" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="rating">
                                                                        <p>Your Rating :</p>
                                                                        <div class="rating-icon">
                                                                            <span class="one"><a href="#"> <i
                                                                                        class="fal fa-star"></i></a></span>
                                                                            <span class="two"><a href="#"> <i
                                                                                        class="fal fa-star"></i></a></span>
                                                                            <span class="three"><a href="#"> <i
                                                                                        class="fal fa-star"></i></a></span>
                                                                            <span class="four"><a href="#"> <i
                                                                                        class="fal fa-star"></i></a></span>
                                                                            <span class="five"><a href="#"> <i
                                                                                        class="fal fa-star"></i></a></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-cf--bottom col-12">
                                                                    <button class="rts-btn btn-primary" type="submit">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- rts related shop area start -->
    <div class="rts-related-shop-area rts-section-gapBottom" dir="ltr">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-style-five center mb--40">
                        <span class="pre">Blog & News</span>
                        <h2 class="title">Related products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper-related-shop-area">
                        <div class="swiper mySwiper-related-shop">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="rts-single-shop-area">
                                        <a href="#" class="thumbnail">
                                            <img src="assets/images/shop/01.webp" alt="shop">
                                        </a>
                                        <div class="inner-content">
                                            <div class="stars-area">
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <a href="#">
                                                <h4 class="title">Music Headphones</h4>
                                            </a>
                                            <div class="pricing-area-wrapper">
                                                <p class="price">$400</p>
                                                <button class="rts-btn btn-primary"><i
                                                        class="fa-regular fa-cart-shopping"></i> Add To
                                                    Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rts-single-shop-area">
                                        <a href="#" class="thumbnail">
                                            <img src="assets/images/shop/02.webp" alt="shop">
                                        </a>
                                        <div class="inner-content">
                                            <div class="stars-area">
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <a href="#">
                                                <h4 class="title">Hand holding photo camera</h4>
                                            </a>
                                            <div class="pricing-area-wrapper">
                                                <p class="price">$400</p>
                                                <button class="rts-btn btn-primary"><i
                                                        class="fa-regular fa-cart-shopping"></i> Add To
                                                    Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rts-single-shop-area">
                                        <a href="#" class="thumbnail">
                                            <img src="assets/images/shop/03.webp" alt="shop">
                                        </a>
                                        <div class="inner-content">
                                            <div class="stars-area">
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <a href="#">
                                                <h4 class="title">Levitating cosmetic cream</h4>
                                            </a>
                                            <div class="pricing-area-wrapper">
                                                <p class="price">$400</p>
                                                <button class="rts-btn btn-primary"><i
                                                        class="fa-regular fa-cart-shopping"></i> Add To
                                                    Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rts-single-shop-area">
                                        <a href="#" class="thumbnail">
                                            <img src="assets/images/shop/04.webp" alt="shop">
                                        </a>
                                        <div class="inner-content">
                                            <div class="stars-area">
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <a href="#">
                                                <h4 class="title">Music Headphones</h4>
                                            </a>
                                            <div class="pricing-area-wrapper">
                                                <p class="price">$400</p>
                                                <button class="rts-btn btn-primary"><i
                                                        class="fa-regular fa-cart-shopping"></i> Add To
                                                    Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts related shop area end -->





    <div class="rts-brand-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-list-area-wrapper">
                        <div class="left-paragraph">
                            <p>Our Trusted Clients</p>
                        </div>
                        <div class="right-brand-area-wrapper">
                            <div class="single-image">
                                <img src="assets/images/brand/01.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/02.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/03.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/04.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/05.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/06.webp" alt="brand">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-cta-area-inner bg_image ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-inner-content-inner-page">
                        <div class="left-side-content">
                            <span>Subscribe Newsletter</span>
                            <h3 class="title">Stay Updated with <br> the Latest News!</h3>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Enter Email Address">
                            <button class="rts-btn btn-primary btn-white">Subscribe Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
