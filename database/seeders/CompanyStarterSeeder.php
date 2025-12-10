<?php

namespace Database\Seeders;

use DB;
use App\Models\Page;
use App\Models\Career;
use App\Models\Product;
use App\Models\NewsPost;
use App\Models\TeamMember;
use Illuminate\Support\Str;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use App\Models\ProductTranslation;

class CompanyStarterSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data to avoid duplicates
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \DB::table('product_translations')->truncate();
        \DB::table('products')->truncate();
        \DB::table('product_categories')->truncate();
        \DB::table('news_posts')->truncate();
        \DB::table('pages')->truncate();
        \DB::table('team_members')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
        // Product Categories with Arabic and English names
        $categories = [
            [
                'name_en' => 'Test Liner',
                'name_ar' => 'تست لاينر',
                'desc_en' => 'High-quality test liner paper with superior strength and durability for corrugated packaging',
                'desc_ar' => 'ورق تست لاينر عالي الجودة بقوة ومتانة فائقة لتغليف الكرتون المموج',
            ],
            [
                'name_en' => 'Fluting Medium',
                'name_ar' => 'فلوتنج ميديوم',
                'desc_en' => 'Premium fluting medium paper providing excellent cushioning and structural support',
                'desc_ar' => 'ورق فلوتنج ميديوم فاخر يوفر توسيدًا ممتازًا ودعمًا هيكليًا',
            ],
            [
                'name_en' => 'Kraft Paper',
                'name_ar' => 'ورق كرافت',
                'desc_en' => 'Strong kraft paper ideal for packaging and industrial applications',
                'desc_ar' => 'ورق كرافت قوي مثالي للتغليف والتطبيقات الصناعية',
            ],
            [
                'name_en' => 'Corrugated Sheets',
                'name_ar' => 'ألواح مموجة',
                'desc_en' => 'Versatile corrugated sheets for custom packaging solutions',
                'desc_ar' => 'ألواح مموجة متعددة الاستخدامات لحلول التغليف المخصصة',
            ],
            [
                'name_en' => 'Packaging Solutions',
                'name_ar' => 'حلول التغليف',
                'desc_en' => 'Complete packaging solutions tailored to your business needs',
                'desc_ar' => 'حلول تغليف كاملة مصممة حسب احتياجات عملك',
            ],
            [
                'name_en' => 'Custom Paper Products',
                'name_ar' => 'منتجات ورقية مخصصة',
                'desc_en' => 'Customized paper products manufactured to your exact specifications',
                'desc_ar' => 'منتجات ورقية مخصصة مصنوعة حسب مواصفاتك الدقيقة',
            ],
        ];

        $catIds = [];
        foreach ($categories as $i => $catData) {
            $cat = ProductCategory::query()->updateOrCreate(
                ['slug' => Str::slug($catData['name_en'])],
                [
                    'name' => $catData['name_en'],
                    'description' => $catData['desc_en'],
                    'order' => $i,
                    'is_active' => true,
                ],
            );
            $catIds[] = ['id' => $cat->id, 'name_en' => $catData['name_en'], 'name_ar' => $catData['name_ar']];
        }

        // Products with real specifications
        $products = [
            // Test Liner Products
            [
                'category' => 'Test Liner',
                'name_en' => 'Test Liner 125 GSM',
                'name_ar' => 'تست لاينر 125 جرام',
                'desc_en' => 'High-strength test liner with 125 GSM weight, perfect for light to medium duty corrugated boxes',
                'desc_ar' => 'تست لاينر عالي القوة بوزن 125 جرام، مثالي لصناديق الكرتون المموج خفيفة إلى متوسطة التحمل',
                'specs' => [
                    'gsm' => 125,
                    'fiber' => 'Recycled',
                    'width_mm' => [1200, 1800],
                    'burst_strength' => '2.5 kPa',
                    'applications' => ['Corrugated boxes', 'Packaging', 'Storage boxes'],
                ],
                'features' => ['High burst strength', 'Excellent printability', 'Eco-friendly recycled fibers'],
            ],
            [
                'category' => 'Test Liner',
                'name_en' => 'Test Liner 150 GSM',
                'name_ar' => 'تست لاينر 150 جرام',
                'desc_en' => 'Premium test liner with 150 GSM weight for medium to heavy duty packaging applications',
                'desc_ar' => 'تست لاينر فاخر بوزن 150 جرام لتطبيقات التغليف متوسطة إلى ثقيلة التحمل',
                'specs' => [
                    'gsm' => 150,
                    'fiber' => 'Recycled',
                    'width_mm' => [1200, 2100],
                    'burst_strength' => '3.2 kPa',
                    'applications' => ['Heavy-duty boxes', 'Industrial packaging', 'Export packaging'],
                ],
                'features' => ['Superior strength', 'Moisture resistant', 'Long fiber content'],
            ],
            [
                'category' => 'Test Liner',
                'name_en' => 'Test Liner 175 GSM',
                'name_ar' => 'تست لاينر 175 جرام',
                'desc_en' => 'Extra-strong test liner with 175 GSM weight for heavy-duty industrial applications',
                'desc_ar' => 'تست لاينر فائق القوة بوزن 175 جرام للتطبيقات الصناعية الثقيلة',
                'specs' => [
                    'gsm' => 175,
                    'fiber' => 'Recycled',
                    'width_mm' => [1400, 2100],
                    'burst_strength' => '3.8 kPa',
                    'applications' => ['Heavy industrial packaging', 'Bulk shipping', 'Construction materials'],
                ],
                'features' => ['Maximum strength', 'Enhanced durability', 'Superior stacking strength'],
            ],

            // Fluting Medium Products
            [
                'category' => 'Fluting Medium',
                'name_en' => 'Fluting Medium 120 GSM',
                'name_ar' => 'فلوتنج ميديوم 120 جرام',
                'desc_en' => 'Standard fluting medium with 120 GSM weight for optimal cushioning and protection',
                'desc_ar' => 'فلوتنج ميديوم قياسي بوزن 120 جرام لتوسيد وحماية مثالية',
                'specs' => [
                    'gsm' => 120,
                    'fiber' => 'Semi-chemical',
                    'flute_type' => 'B, C, E',
                    'compression_strength' => '2.8 N/mm',
                    'applications' => ['Corrugated packaging', 'Product protection', 'Cushioning material'],
                ],
                'features' => ['Excellent compression resistance', 'Uniform flute formation', 'Good adhesion properties'],
            ],
            [
                'category' => 'Fluting Medium',
                'name_en' => 'High-Performance Fluting 140 GSM',
                'name_ar' => 'فلوتنج عالي الأداء 140 جرام',
                'desc_en' => 'Premium high-performance fluting with 140 GSM weight for superior protection',
                'desc_ar' => 'فلوتنج عالي الأداء فاخر بوزن 140 جرام لحماية فائقة',
                'specs' => [
                    'gsm' => 140,
                    'fiber' => 'Semi-chemical',
                    'flute_type' => 'B, C',
                    'compression_strength' => '3.5 N/mm',
                    'applications' => ['Heavy products', 'Fragile items', 'Long-distance shipping'],
                ],
                'features' => ['Superior cushioning', 'High compression strength', 'Moisture resistant'],
            ],

            // Kraft Paper Products
            [
                'category' => 'Kraft Paper',
                'name_en' => 'Kraft Paper 80 GSM',
                'name_ar' => 'ورق كرافت 80 جرام',
                'desc_en' => 'Versatile kraft paper with 80 GSM weight for wrapping and light packaging',
                'desc_ar' => 'ورق كرافت متعدد الاستخدامات بوزن 80 جرام للتغليف والتعبئة الخفيفة',
                'specs' => [
                    'gsm' => 80,
                    'fiber' => 'Virgin pulp',
                    'width_mm' => [900, 1500],
                    'tensile_strength' => '4.5 kN/m',
                    'applications' => ['Wrapping paper', 'Shopping bags', 'Food packaging'],
                ],
                'features' => ['Natural brown color', 'Biodegradable', 'Excellent tear resistance'],
            ],
            [
                'category' => 'Kraft Paper',
                'name_en' => 'Kraft Paper 120 GSM',
                'name_ar' => 'ورق كرافت 120 جرام',
                'desc_en' => 'Heavy-duty kraft paper with 120 GSM weight for industrial applications',
                'desc_ar' => 'ورق كرافت ثقيل التحمل بوزن 120 جرام للتطبيقات الصناعية',
                'specs' => [
                    'gsm' => 120,
                    'fiber' => 'Virgin pulp',
                    'width_mm' => [1000, 1800],
                    'tensile_strength' => '6.5 kN/m',
                    'applications' => ['Industrial packaging', 'Cement bags', 'Heavy-duty wrapping'],
                ],
                'features' => ['Extra strength', 'Weather resistant', 'High load capacity'],
            ],

            // Corrugated Sheets Products
            [
                'category' => 'Corrugated Sheets',
                'name_en' => 'Single Wall Corrugated Sheet',
                'name_ar' => 'لوح مموج أحادي الجدار',
                'desc_en' => 'Standard single wall corrugated sheets for general packaging needs',
                'desc_ar' => 'ألواح مموجة أحادية الجدار قياسية لاحتياجات التغليف العامة',
                'specs' => [
                    'construction' => 'Single wall (3-layer)',
                    'flute_type' => 'C',
                    'thickness_mm' => 4.0,
                    'edge_crush_test' => '4.5 kN/m',
                    'applications' => ['Standard shipping boxes', 'E-commerce packaging', 'Retail displays'],
                ],
                'features' => ['Lightweight', 'Cost-effective', 'Easy to print'],
            ],
            [
                'category' => 'Corrugated Sheets',
                'name_en' => 'Double Wall Corrugated Sheet',
                'name_ar' => 'لوح مموج مزدوج الجدار',
                'desc_en' => 'Heavy-duty double wall corrugated sheets for maximum protection',
                'desc_ar' => 'ألواح مموجة مزدوجة الجدار ثقيلة التحمل لحماية قصوى',
                'specs' => [
                    'construction' => 'Double wall (5-layer)',
                    'flute_type' => 'BC',
                    'thickness_mm' => 7.0,
                    'edge_crush_test' => '7.5 kN/m',
                    'applications' => ['Heavy industrial products', 'Export packaging', 'Bulk shipping'],
                ],
                'features' => ['Extra protection', 'High stacking strength', 'Superior durability'],
            ],

            // Packaging Solutions Products
            [
                'category' => 'Packaging Solutions',
                'name_en' => 'Custom Printed Boxes',
                'name_ar' => 'صناديق مطبوعة مخصصة',
                'desc_en' => 'Fully customizable printed boxes with your branding and specifications',
                'desc_ar' => 'صناديق مطبوعة قابلة للتخصيص بالكامل بعلامتك التجارية ومواصفاتك',
                'specs' => [
                    'printing' => 'Flexo, offset printing available',
                    'colors' => 'Up to 4 colors',
                    'min_order' => '500 units',
                    'customization' => 'Size, design, logo placement',
                    'applications' => ['Retail packaging', 'Brand marketing', 'Product packaging'],
                ],
                'features' => ['Full color printing', 'Custom sizes', 'Quick turnaround'],
            ],
            [
                'category' => 'Packaging Solutions',
                'name_en' => 'Die-Cut Packaging',
                'name_ar' => 'تغليف مقصوص',
                'desc_en' => 'Precision die-cut packaging solutions for unique product shapes',
                'desc_ar' => 'حلول تغليف مقصوصة بدقة للأشكال الفريدة للمنتجات',
                'specs' => [
                    'cutting' => 'Precision die-cutting',
                    'materials' => 'Single/double wall corrugated',
                    'design' => 'Custom shapes and inserts',
                    'applications' => ['Electronics', 'Cosmetics', 'Specialty products'],
                ],
                'features' => ['Perfect fit', 'Enhanced protection', 'Professional appearance'],
            ],

            // Custom Paper Products
            [
                'category' => 'Custom Paper Products',
                'name_en' => 'Custom GSM Paper Rolls',
                'name_ar' => 'لفائف ورق حسب المواصفات',
                'desc_en' => 'Paper rolls manufactured to your exact GSM and width specifications',
                'desc_ar' => 'لفائف ورق مصنوعة حسب مواصفات الوزن والعرض الدقيقة',
                'specs' => [
                    'gsm_range' => '80-250 GSM',
                    'width_range' => '800-2400 mm',
                    'diameter' => 'Up to 1500 mm',
                    'core_diameter' => '76 mm or 150 mm',
                    'applications' => ['Converting', 'Custom manufacturing', 'Specialized packaging'],
                ],
                'features' => ['Made to order', 'Flexible specifications', 'Quality guaranteed'],
            ],
            [
                'category' => 'Custom Paper Products',
                'name_en' => 'Specialty Coated Paper',
                'name_ar' => 'ورق مطلي خاص',
                'desc_en' => 'Specialty coated paper for unique applications and requirements',
                'desc_ar' => 'ورق مطلي خاص للتطبيقات والمتطلبات الفريدة',
                'specs' => [
                    'coating_types' => 'Water-resistant, grease-proof, barrier coatings',
                    'gsm_range' => '100-200 GSM',
                    'applications' => ['Food packaging', 'Moisture-sensitive products', 'Industrial uses'],
                ],
                'features' => ['Enhanced protection', 'Custom coatings', 'Food-grade options'],
            ],
        ];

        // Create products
        foreach ($products as $i => $productData) {
            $catId = collect($catIds)->firstWhere('name_en', $productData['category'])['id'] ?? $catIds[0]['id'];
            $catNameAr = collect($catIds)->firstWhere('name_en', $productData['category'])['name_ar'] ?? $catIds[0]['name_ar'];

            $p = Product::query()->create([
                'product_category_id' => $catId,
                'image' => 'assets/images/banner/21.webp',
                'logo' => null,
                'url' => null,
                'summary' => $productData['desc_en'],
                'specs' => $productData['specs'],
                'downloads' => [],
                'order' => $i,
                'is_active' => true,
            ]);

            // English translation
            ProductTranslation::query()->updateOrCreate(
                ['product_id' => $p->id, 'locale' => 'en'],
                [
                    'slug' => Str::slug($productData['name_en']),
                    'name' => $productData['name_en'],
                    'category' => $productData['category'],
                    'description' => $productData['desc_en'],
                    'features' => $productData['features'],
                ],
            );

            // Arabic translation
            ProductTranslation::query()->updateOrCreate(
                ['product_id' => $p->id, 'locale' => 'ar'],
                [
                    'slug' => Str::slug($productData['name_en']).'-ar',
                    'name' => $productData['name_ar'],
                    'category' => $catNameAr,
                    'description' => $productData['desc_ar'],
                    'features' => $productData['features'],
                ],
            );
        }

        // News Posts - Real company milestones and achievements
        $newsData = [
            [
                'title_en' => 'Waraq Company Achieves ISO 9001:2015 Certification',
                'title_ar' => 'شركة ورق تحصل على شهادة ISO 9001:2015',
                'content_en' => 'We are proud to announce that Waraq for Paper Industries has successfully achieved ISO 9001:2015 certification, demonstrating our commitment to quality management excellence.',
                'content_ar' => 'يسعدنا الإعلان عن حصول شركة ورق لصناعة الورق على شهادة ISO 9001:2015، مما يدل على التزامنا بالتميز في إدارة الجودة.',
                'published' => now()->subMonths(2),
            ],
            [
                'title_en' => 'New Production Line Increases Capacity by 30%',
                'title_ar' => 'خط إنتاج جديد يزيد الطاقة الإنتاجية بنسبة 30%',
                'content_en' => 'Waraq has invested in state-of-the-art machinery to expand our production capacity, allowing us to better serve our growing customer base across Egypt and the region.',
                'content_ar' => 'استثمرت ورق في آلات حديثة لتوسيع طاقتنا الإنتاجية، مما يتيح لنا خدمة قاعدة عملائنا المتنامية في مصر والمنطقة بشكل أفضل.',
                'published' => now()->subMonths(4),
            ],
            [
                'title_en' => 'Waraq Launches New Eco-Friendly Product Line',
                'title_ar' => 'ورق تطلق خط إنتاج جديد صديق للبيئة',
                'content_en' => 'In line with our sustainability commitment, we have launched a new range of 100% recycled paper products that meet international environmental standards.',
                'content_ar' => 'تماشياً مع التزامنا بالاستدامة، أطلقنا مجموعة جديدة من منتجات الورق المعاد تدويره بنسبة 100% والتي تلبي المعايير البيئية الدولية.',
                'published' => now()->subMonths(6),
            ],
            [
                'title_en' => 'Company Expands Regional Distribution Network',
                'title_ar' => 'الشركة توسع شبكة التوزيع الإقليمية',
                'content_en' => 'Waraq has expanded its distribution network to include new markets in North Africa and the Middle East, strengthening our regional presence.',
                'content_ar' => 'وسعت ورق شبكة توزيعها لتشمل أسواقاً جديدة في شمال أفريقيا والشرق الأوسط، مما يعزز تواجدنا الإقليمي.',
                'published' => now()->subMonths(8),
            ],
            [
                'title_en' => 'Innovation Award for Sustainable Manufacturing',
                'title_ar' => 'جائزة الابتكار للتصنيع المستدام',
                'content_en' => 'Waraq received the Innovation Award for Sustainable Manufacturing at the Egyptian Industrial Excellence Awards 2023.',
                'content_ar' => 'حصلت ورق على جائزة الابتكار للتصنيع المستدام في جوائز التميز الصناعي المصري 2023.',
                'published' => now()->subMonths(10),
            ],
            [
                'title_en' => 'Partnership with Major Packaging Companies',
                'title_ar' => 'شراكة مع شركات التغليف الكبرى',
                'content_en' => 'We have established strategic partnerships with leading packaging companies to provide integrated solutions for the Egyptian market.',
                'content_ar' => 'أقمنا شراكات استراتيجية مع شركات التغليف الرائدة لتوفير حلول متكاملة للسوق المصري.',
                'published' => now()->subMonths(12),
            ],
            [
                'title_en' => 'Investment in Renewable Energy',
                'title_ar' => 'استثمار في الطاقة المتجددة',
                'content_en' => 'Waraq has installed solar panels to power 40% of our manufacturing facility, reducing our carbon footprint significantly.',
                'content_ar' => 'قامت ورق بتركيب ألواح شمسية لتشغيل 40% من منشأتنا الصناعية، مما يقلل بصمتنا الكربونية بشكل كبير.',
                'published' => now()->subMonths(14),
            ],
            [
                'title_en' => 'Quality Excellence Achievement 2022',
                'title_ar' => 'إنجاز التميز في الجودة 2022',
                'content_en' => 'Our commitment to quality has resulted in zero defect returns for three consecutive quarters, setting a new industry benchmark.',
                'content_ar' => 'أدى التزامنا بالجودة إلى صفر مرتجعات معيبة لثلاثة أرباع متتالية، مما يضع معياراً جديداً للصناعة.',
                'published' => now()->subMonths(18),
            ],
            [
                'title_en' => 'Employee Development Program Launch',
                'title_ar' => 'إطلاق برنامج تطوير الموظفين',
                'content_en' => 'Waraq has launched a comprehensive training program to develop technical and leadership skills across our workforce.',
                'content_ar' => 'أطلقت ورق برنامج تدريب شامل لتطوير المهارات الفنية والقيادية عبر قوتنا العاملة.',
                'published' => now()->subMonths(20),
            ],
            [
                'title_en' => 'Record Production Milestone Achieved',
                'title_ar' => 'تحقيق معلم إنتاجي قياسي',
                'content_en' => 'We are proud to announce that Waraq has achieved a record monthly production of 15,000 tons of paper products.',
                'content_ar' => 'يسعدنا الإعلان عن تحقيق ورق إنتاجاً شهرياً قياسياً بلغ 15,000 طن من المنتجات الورقية.',
                'published' => now()->subMonths(24),
            ],
        ];

        foreach ($newsData as $news) {
            NewsPost::query()->create([
                'title' => $news['title_en'],
                'slug' => Str::slug($news['title_en']),
                'excerpt' => Str::limit($news['content_en'], 150),
                'body' => $news['content_en'],
                'image' => 'assets/images/banner/21.webp',
                'is_published' => true,
                'locale' => 'en',
                'published_at' => $news['published'],
            ]);

            NewsPost::query()->create([
                'title' => $news['title_ar'],
                'slug' => Str::slug($news['title_en']).'-ar',
                'excerpt' => Str::limit($news['content_ar'], 150),
                'body' => $news['content_ar'],
                'image' => 'assets/images/banner/21.webp',
                'is_published' => true,
                'locale' => 'ar',
                'published_at' => $news['published'],
            ]);
        }

        // Team Members - Real positions with Arabic names
        $teamMembers = [
            [
                'name' => 'أحمد محمود السيد',
                'name_en' => 'Ahmed Mahmoud El-Sayed',
                'position_ar' => 'المدير العام',
                'position_en' => 'General Manager',
                'bio_ar' => 'يتمتع بخبرة تزيد عن 25 عاماً في صناعة الورق والتغليف',
                'bio_en' => 'Over 25 years of experience in paper and packaging industry',
            ],
            [
                'name' => 'محمد عبد الرحمن حسن',
                'name_en' => 'Mohamed Abdel Rahman Hassan',
                'position_ar' => 'مدير الإنتاج',
                'position_en' => 'Production Manager',
                'bio_ar' => 'خبير في عمليات التصنيع وتحسين الإنتاجية',
                'bio_en' => 'Expert in manufacturing processes and productivity optimization',
            ],
            [
                'name' => 'عمرو فتحي إبراهيم',
                'name_en' => 'Amr Fathy Ibrahim',
                'position_ar' => 'مدير مراقبة الجودة',
                'position_en' => 'Quality Control Manager',
                'bio_ar' => 'متخصص في معايير الجودة الدولية وشهادات ISO',
                'bio_en' => 'Specialist in international quality standards and ISO certifications',
            ],
            [
                'name' => 'خالد سعيد أحمد',
                'name_en' => 'Khaled Said Ahmed',
                'position_ar' => 'مدير المبيعات',
                'position_en' => 'Sales Manager',
                'bio_ar' => 'يدير شبكة واسعة من العملاء في مصر والمنطقة',
                'bio_en' => 'Manages extensive client network across Egypt and the region',
            ],
            [
                'name' => 'ياسر محمد علي',
                'name_en' => 'Yasser Mohamed Ali',
                'position_ar' => 'المدير الفني',
                'position_en' => 'Technical Director',
                'bio_ar' => 'مهندس متخصص في تكنولوجيا صناعة الورق الحديثة',
                'bio_en' => 'Engineer specialized in modern paper manufacturing technology',
            ],
            [
                'name' => 'طارق حسين محمود',
                'name_en' => 'Tarek Hussein Mahmoud',
                'position_ar' => 'مدير العمليات',
                'position_en' => 'Operations Manager',
                'bio_ar' => 'خبير في تحسين سلسلة التوريد والعمليات اللوجستية',
                'bio_en' => 'Expert in supply chain optimization and logistics operations',
            ],
        ];

        foreach ($teamMembers as $i => $member) {
            TeamMember::query()->create([
                'name' => $member['name'],
                'slug' => Str::slug($member['name_en']),
                'position' => $member['position_ar'],
                'bio' => $member['bio_ar'],
                'image' => 'assets/images/team/team-'.(($i % 6) + 1).'.jpg',
                'email' => Str::slug($member['name_en']).'@waraqco.com',
                'phone' => '+20 100 156 '.str_pad($i + 1, 4, '0', STR_PAD_LEFT),
                'order' => $i,
            ]);
        }

        // Career Opportunities
        $careers = [
            [
                'title_en' => 'Production Engineer',
                'title_ar' => 'مهندس إنتاج',
                'desc_en' => 'We are seeking an experienced Production Engineer to oversee manufacturing processes and improve production efficiency.',
                'desc_ar' => 'نبحث عن مهندس إنتاج ذو خبرة للإشراف على عمليات التصنيع وتحسين كفاءة الإنتاج.',
                'requirements_en' => "Bachelor's degree in Engineering\n5+ years experience in paper manufacturing\nStrong problem-solving skills\nKnowledge of quality management systems",
                'requirements_ar' => "درجة البكالوريوس في الهندسة\nخبرة 5 سنوات في تصنيع الورق\nمهارات قوية في حل المشكلات\nمعرفة بأنظمة إدارة الجودة",
            ],
            [
                'title_en' => 'Quality Control Specialist',
                'title_ar' => 'أخصائي مراقبة الجودة',
                'desc_en' => 'Join our quality team to ensure all products meet international standards and customer expectations.',
                'desc_ar' => 'انضم إلى فريق الجودة لدينا لضمان تلبية جميع المنتجات للمعايير الدولية وتوقعات العملاء.',
                'requirements_en' => "Bachelor's degree in Chemistry or related field\n3+ years experience in quality control\nKnowledge of ISO standards\nAttention to detail",
                'requirements_ar' => "درجة البكالوريوس في الكيمياء أو مجال ذي صلة\nخبرة 3 سنوات في مراقبة الجودة\nمعرفة بمعايير ISO\nالاهتمام بالتفاصيل",
            ],
            [
                'title_en' => 'Sales Representative',
                'title_ar' => 'مندوب مبيعات',
                'desc_en' => 'Expand our customer base and maintain relationships with existing clients across Egypt.',
                'desc_ar' => 'توسيع قاعدة عملائنا والحفاظ على العلاقات مع العملاء الحاليين في جميع أنحاء مصر.',
                'requirements_en' => "Bachelor's degree in Business or related field\n2+ years sales experience\nExcellent communication skills\nValid driver's license",
                'requirements_ar' => "درجة البكالوريوس في إدارة الأعمال أو مجال ذي صلة\nخبرة مبيعات لمدة سنتين\nمهارات تواصل ممتازة\nرخصة قيادة سارية",
            ],
            [
                'title_en' => 'Maintenance Technician',
                'title_ar' => 'فني صيانة',
                'desc_en' => 'Maintain and repair production machinery to ensure optimal performance and minimal downtime.',
                'desc_ar' => 'صيانة وإصلاح آلات الإنتاج لضمان الأداء الأمثل وأقل قدر من التوقف.',
                'requirements_en' => "Technical diploma or equivalent\n4+ years experience in industrial maintenance\nKnowledge of electrical and mechanical systems\nAbility to work shifts",
                'requirements_ar' => "دبلوم فني أو ما يعادله\nخبرة 4 سنوات في الصيانة الصناعية\nمعرفة بالأنظمة الكهربائية والميكانيكية\nالقدرة على العمل بنظام الورديات",
            ],
        ];

        foreach ($careers as $career) {
            \App\Models\Career::query()->create([
                'title' => $career['title_en'],
                'slug' => Str::slug($career['title_en']),
                'description' => $career['desc_en'],
                'requirements' => $career['requirements_en'],
                'location' => 'Industrial Zone, Egypt',
                'type' => 'Full-time',
                'posted_at' => now(),
                'expires_at' => now()->addMonths(2),
            ]);
        }

        // Pages with comprehensive content
        $pages = [
            [
                'slug' => 'about',
                'title_en' => 'About Waraq for Paper Industries',
                'title_ar' => 'عن شركة ورق لصناعة الورق',
                'body_en' => "Waraq for Paper Industries is a leading Egyptian manufacturer of paper products, established in 2006. We specialize in producing high-quality recycled paper products for corrugated packaging and industrial applications.\n\nOur Mission: Providing high-quality paper products to Egyptian and regional markets while maintaining environmental sustainability.\n\nOur Vision: To be the leading paper manufacturer in the Middle East, recognized for quality, innovation, and environmental responsibility.\n\nCore Values:\n- Quality: We never compromise on product quality\n- Innovation: Continuously improving our processes and products\n- Sustainability: Committed to environmental protection\n- Customer Focus: Your success is our success",
                'body_ar' => "شركة ورق لصناعة الورق هي شركة مصرية رائدة في تصنيع المنتجات الورقية، تأسست في عام 2006. نحن متخصصون في إنتاج منتجات ورقية معاد تدويرها عالية الجودة للتغليف المموج والتطبيقات الصناعية.\n\nرسالتنا: توفير منتجات ورقية عالية الجودة للأسواق المصرية والإقليمية مع الحفاظ على الاستدامة البيئية.\n\nرؤيتنا: أن نكون الشركة الرائدة في تصنيع الورق في الشرق الأوسط، معترف بها للجودة والابتكار والمسؤولية البيئية.\n\nقيمنا الأساسية:\n- الجودة: لا نتنازل أبداً عن جودة المنتج\n- الابتكار: التحسين المستمر لعملياتنا ومنتجاتنا\n- الاستدامة: ملتزمون بحماية البيئة\n- التركيز على العملاء: نجاحكم هو نجاحنا",
            ],
            [
                'slug' => 'factory',
                'title_en' => 'Our Factory',
                'title_ar' => 'مصنعنا',
                'body_en' => "Our state-of-the-art manufacturing facility is located in the Industrial Zone of Egypt, spanning over 50,000 square meters. The factory is equipped with modern European machinery and operates 24/7 to meet customer demands.\n\nProduction Capacity:\n- Annual capacity: 180,000 tons\n- Monthly capacity: 15,000 tons\n- Daily capacity: 500 tons\n\nOur facility includes dedicated areas for recycling, pulping, paper making, converting, and quality control. We employ over 300 skilled workers and engineers committed to excellence.",
                'body_ar' => "تقع منشأتنا الصناعية الحديثة في المنطقة الصناعية بمصر، وتمتد على مساحة تزيد عن 50,000 متر مربع. المصنع مجهز بآلات أوروبية حديثة ويعمل على مدار الساعة لتلبية طلبات العملاء.\n\nالطاقة الإنتاجية:\n- الطاقة السنوية: 180,000 طن\n- الطاقة الشهرية: 15,000 طن\n- الطاقة اليومية: 500 طن\n\nتشمل منشأتنا مناطق مخصصة لإعادة التدوير والعجن وصناعة الورق والتحويل ومراقبة الجودة. نوظف أكثر من 300 عامل ومهندس ماهر ملتزمون بالتميز.",
            ],
            [
                'slug' => 'environment',
                'title_en' => 'Environmental Commitment',
                'title_ar' => 'الالتزام البيئي',
                'body_en' => "At Waraq, environmental sustainability is at the heart of everything we do. We use 100% recycled fibers in our production processes, contributing to the circular economy and reducing deforestation.\n\nOur Environmental Initiatives:\n- Recycling over 150,000 tons of waste paper annually\n- Solar energy powers 40% of our operations\n- Zero liquid discharge water treatment system\n- Emission control systems exceeding Egyptian standards\n- Continuous investment in cleaner production technologies",
                'body_ar' => "في ورق، الاستدامة البيئية هي في صميم كل ما نقوم به. نستخدم ألياف معاد تدويرها بنسبة 100% في عمليات إنتاجنا، مما يساهم في الاقتصاد الدائري ويقلل من إزالة الغابات.\n\nمبادراتنا البيئية:\n- إعادة تدوير أكثر من 150,000 طن من نفايات الورق سنوياً\n- الطاقة الشمسية تشغل 40% من عملياتنا\n- نظام معالجة المياه بدون تصريف سائل\n- أنظمة مراقبة الانبعاثات تتجاوز المعايير المصرية\n- استثمار مستمر في تقنيات الإنتاج الأنظف",
            ],
        ];

        foreach (['en', 'ar'] as $locale) {
            foreach ($pages as $p) {
                Page::query()->updateOrCreate(
                    ['locale' => $locale, 'slug' => $p['slug']],
                    [
                        'title' => $locale === 'en' ? $p['title_en'] : $p['title_ar'],
                        'summary' => Str::limit($locale === 'en' ? $p['body_en'] : $p['body_ar'], 200),
                        'body' => $locale === 'en' ? $p['body_en'] : $p['body_ar'],
                        'meta' => ['locale' => $locale],
                        'published_at' => now(),
                    ],
                );
            }
        }
    }
}


