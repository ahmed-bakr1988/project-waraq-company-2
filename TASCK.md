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
