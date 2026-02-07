<x-app-layout>
    <!-- Breadcrumb Area -->
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ __('words.company_history') }}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="{{ route('home') }}">{{ __('words.nav_home') }}</a>
                        <span> / </span>
                        <a href="#" class="active">{{ __('words.company_history') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Intro Section -->
    <div class="rts-about-area rts-section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="title-area mb--30">
                        <span class="pre-title">{{ __('words.company_name') }}</span>
                        <h2 class="title">
                            @if(app()->getLocale() === 'ar')
                                مسيرة التميز والإنجاز
                            @else
                                A Journey of Excellence and Achievement
                            @endif
                        </h2>
                        <p class="disc mt--20">
                            @if(app()->getLocale() === 'ar')
                                منذ تأسيسها، سعت شركة ورق لتكون الرائدة في صناعة الورق في المملكة العربية السعودية، مبنية على أسس متينة من الجودة والابتكار والالتزام بخدمة العملاء.
                            @else
                                Since its establishment, Waraq has strived to be the leader in paper manufacturing in Saudi Arabia, built on solid foundations of quality, innovation, and commitment to customer service.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Timeline Section -->
    <div class="rts-timeline-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb--50">
                    <h2 class="title">
                        @if(app()->getLocale() === 'ar')
                            محطات تاريخية
                        @else
                            Historical Milestones
                        @endif
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="timeline-wrapper">
                        <!-- 1990 -->
                        <div class="timeline-item mb--40">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3">
                                    <div class="year-badge bg-primary text-white p-3 rounded text-center">
                                        <h3 class="mb-0">1990</h3>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-9">
                                    <div class="timeline-content bg-white p-4 rounded shadow-sm">
                                        <h5 class="title">
                                            @if(app()->getLocale() === 'ar')
                                                التأسيس
                                            @else
                                                Foundation
                                            @endif
                                        </h5>
                                        <p class="disc">
                                            @if(app()->getLocale() === 'ar')
                                                تأسست شركة ورق برؤية واضحة لتصبح الشركة الرائدة في صناعة الورق في المنطقة، بدءاً بمصنع صغير في الرياض.
                                            @else
                                                Waraq was founded with a clear vision to become the leading paper manufacturer in the region, starting with a small factory in Riyadh.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 1995 -->
                        <div class="timeline-item mb--40">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3">
                                    <div class="year-badge bg-primary text-white p-3 rounded text-center">
                                        <h3 class="mb-0">1995</h3>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-9">
                                    <div class="timeline-content bg-white p-4 rounded shadow-sm">
                                        <h5 class="title">
                                            @if(app()->getLocale() === 'ar')
                                                التوسع الأول
                                            @else
                                                First Expansion
                                            @endif
                                        </h5>
                                        <p class="disc">
                                            @if(app()->getLocale() === 'ar')
                                                افتتاح خط إنتاج ثانٍ وتوسيع الطاقة الإنتاجية لتلبية الطلب المتزايد في السوق المحلي.
                                            @else
                                                Opening of a second production line and expanding capacity to meet growing demand in the local market.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2000 -->
                        <div class="timeline-item mb--40">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3">
                                    <div class="year-badge bg-primary text-white p-3 rounded text-center">
                                        <h3 class="mb-0">2000</h3>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-9">
                                    <div class="timeline-content bg-white p-4 rounded shadow-sm">
                                        <h5 class="title">
                                            @if(app()->getLocale() === 'ar')
                                                شهادة ISO 9001
                                            @else
                                                ISO 9001 Certification
                                            @endif
                                        </h5>
                                        <p class="disc">
                                            @if(app()->getLocale() === 'ar')
                                                الحصول على شهادة ISO 9001 لنظام إدارة الجودة، مما يؤكد التزامنا بأعلى معايير الجودة.
                                            @else
                                                Obtaining ISO 9001 quality management certification, confirming our commitment to the highest quality standards.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2005 -->
                        <div class="timeline-item mb--40">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3">
                                    <div class="year-badge bg-primary text-white p-3 rounded text-center">
                                        <h3 class="mb-0">2005</h3>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-9">
                                    <div class="timeline-content bg-white p-4 rounded shadow-sm">
                                        <h5 class="title">
                                            @if(app()->getLocale() === 'ar')
                                                التصدير للخليج
                                            @else
                                                Gulf Exports
                                            @endif
                                        </h5>
                                        <p class="disc">
                                            @if(app()->getLocale() === 'ar')
                                                بدء التصدير لدول الخليج العربي، لنصبح أحد أكبر مصدري الورق في المنطقة.
                                            @else
                                                Started exporting to Gulf countries, becoming one of the largest paper exporters in the region.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2010 -->
                        <div class="timeline-item mb--40">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3">
                                    <div class="year-badge bg-primary text-white p-3 rounded text-center">
                                        <h3 class="mb-0">2010</h3>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-9">
                                    <div class="timeline-content bg-white p-4 rounded shadow-sm">
                                        <h5 class="title">
                                            @if(app()->getLocale() === 'ar')
                                                المصنع الجديد
                                            @else
                                                New Factory
                                            @endif
                                        </h5>
                                        <p class="disc">
                                            @if(app()->getLocale() === 'ar')
                                                افتتاح المصنع الجديد بأحدث التقنيات والمعدات، مما ضاعف الطاقة الإنتاجية.
                                            @else
                                                Opening of the new factory with latest technologies and equipment, doubling production capacity.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2015 -->
                        <div class="timeline-item mb--40">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3">
                                    <div class="year-badge bg-primary text-white p-3 rounded text-center">
                                        <h3 class="mb-0">2015</h3>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-9">
                                    <div class="timeline-content bg-white p-4 rounded shadow-sm">
                                        <h5 class="title">
                                            @if(app()->getLocale() === 'ar')
                                                الاستدامة البيئية
                                            @else
                                                Environmental Sustainability
                                            @endif
                                        </h5>
                                        <p class="disc">
                                            @if(app()->getLocale() === 'ar')
                                                إطلاق برنامج الاستدامة البيئية وتطبيق أنظمة إعادة التدوير المتقدمة.
                                            @else
                                                Launch of environmental sustainability program and implementation of advanced recycling systems.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2020 -->
                        <div class="timeline-item mb--40">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3">
                                    <div class="year-badge bg-primary text-white p-3 rounded text-center">
                                        <h3 class="mb-0">2020</h3>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-9">
                                    <div class="timeline-content bg-white p-4 rounded shadow-sm">
                                        <h5 class="title">
                                            @if(app()->getLocale() === 'ar')
                                                التحول الرقمي
                                            @else
                                                Digital Transformation
                                            @endif
                                        </h5>
                                        <p class="disc">
                                            @if(app()->getLocale() === 'ar')
                                                تبني أحدث التقنيات الرقمية في الإنتاج والإدارة لتحسين الكفاءة وجودة المنتجات.
                                            @else
                                                Adopting the latest digital technologies in production and management to improve efficiency and product quality.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Present -->
                        <div class="timeline-item">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3">
                                    <div class="year-badge bg-success text-white p-3 rounded text-center">
                                        <h3 class="mb-0">
                                            @if(app()->getLocale() === 'ar')
                                                اليوم
                                            @else
                                                Today
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-9">
                                    <div class="timeline-content bg-white p-4 rounded shadow-sm">
                                        <h5 class="title">
                                            @if(app()->getLocale() === 'ar')
                                                الريادة المستمرة
                                            @else
                                                Continued Leadership
                                            @endif
                                        </h5>
                                        <p class="disc">
                                            @if(app()->getLocale() === 'ar')
                                                نواصل مسيرتنا نحو التميز مع أكثر من 500 موظف ومنتجات تخدم أكثر من 15 دولة حول العالم.
                                            @else
                                                We continue our journey towards excellence with over 500 employees and products serving more than 15 countries worldwide.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="rts-stats-area rts-section-gap bg-light-custom">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb--50">
                    <h2 class="title">
                        @if(app()->getLocale() === 'ar')
                            أرقام وإنجازات
                        @else
                            Numbers and Achievements
                        @endif
                    </h2>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card text-center p-4 bg-white rounded h-100">
                        <h2 class="counter title text-primary">35+</h2>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                سنة من الخبرة
                            @else
                                Years of Experience
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card text-center p-4 bg-white rounded h-100">
                        <h2 class="counter title text-primary">500+</h2>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                موظف
                            @else
                                Employees
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card text-center p-4 bg-white rounded h-100">
                        <h2 class="counter title text-primary">15+</h2>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                دولة نخدمها
                            @else
                                Countries Served
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card text-center p-4 bg-white rounded h-100">
                        <h2 class="counter title text-primary">1000+</h2>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                عميل سعيد
                            @else
                                Happy Clients
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="rts-callto-acation-area rts-section-gapBottom rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-area text-center bg-white p-5 rounded shadow-sm">
                        <h3 class="title mb--20">
                            @if(app()->getLocale() === 'ar')
                                كن جزءاً من قصة نجاحنا
                            @else
                                Be Part of Our Success Story
                            @endif
                        </h3>
                        <p class="disc mb--30">
                            @if(app()->getLocale() === 'ar')
                                انضم إلى عائلة ورق واستمتع بأفضل المنتجات والخدمات.
                            @else
                                Join the Waraq family and enjoy the best products and services.
                            @endif
                        </p>
                        <a href="{{ route('contact-info') }}" class="rts-btn btn-primary">{{ __('words.contact_us') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
