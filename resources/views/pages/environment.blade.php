<x-app-layout>
    <!-- Breadcrumb -->
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ __('words.nav_sustainability') }}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="{{ route('home') }}">{{ __('words.nav_home') }}</a>
                        <span> / </span>
                        <a href="#" class="active">{{ __('words.nav_sustainability') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sustainability Section -->
    <div class="rts-about-area rts-section-gap">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="about-image-v-inner">
                        <img src="{{ asset('assets/images/project/products/waraq-co-photo_1.jpg') }}" alt="{{ __('words.nav_sustainability') }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-progress-inner">
                        <div class="title-area">
                            <span>{{ __('words.since_2006') }}</span>
                            <h2 class="title">
                                @if(app()->getLocale() === 'ar')
                                    الاستدامة والمسؤولية البيئية
                                @else
                                    Sustainability & Environmental Responsibility
                                @endif
                            </h2>
                        </div>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                في شركة ورق لصناعة الورق، نلتزم بحماية البيئة من خلال استخدام 100٪ من الألياف المعاد تدويرها في عملية الإنتاج. نحن نؤمن بأن الصناعة المستدامة هي مستقبل الأعمال.
                            @else
                                At Waraq for Paper Industries, we are committed to environmental protection through using 100% recycled fibers in our production process. We believe sustainable manufacturing is the future of business.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Environmental Initiatives -->
    <div class="rts-service-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb--40">
                        <p class="pre-title">{{ __('words.company_name') }}</p>
                        <h2 class="title">
                            @if(app()->getLocale() === 'ar')
                                مبادراتنا البيئية
                            @else
                                Our Environmental Initiatives
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="service-one-inner-four">
                        <div class="big-thumbnail-area">
                            <div class="thumbnail">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                            </div>
                        </div>
                        <div class="service-details">
                            <h5 class="title">
                                @if(app()->getLocale() === 'ar')
                                    إعادة التدوير بنسبة 100٪
                                @else
                                    100% Recycling
                                @endif
                            </h5>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    جميع منتجاتنا مصنوعة من ألياف معاد تدويرها
                                @else
                                    All our products are made from recycled fibers
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-one-inner-four">
                        <div class="big-thumbnail-area">
                            <div class="thumbnail">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                            </div>
                        </div>
                        <div class="service-details">
                            <h5 class="title">
                                @if(app()->getLocale() === 'ar')
                                    كفاءة الطاقة
                                @else
                                    Energy Efficiency
                                @endif
                            </h5>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    استخدام تقنيات حديثة لتقليل استهلاك الطاقة
                                @else
                                    Using modern technology to reduce energy consumption
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-one-inner-four">
                        <div class="big-thumbnail-area">
                            <div class="thumbnail">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15a4.5 4.5 0 004.5 4.5H18a3.75 3.75 0 001.332-7.257 3 3 0 00-3.758-3.848 5.25 5.25 0 00-10.233 2.33A4.502 4.502 0 002.25 15z" />
                                </svg>
                            </div>
                        </div>
                        <div class="service-details">
                            <h5 class="title">
                                @if(app()->getLocale() === 'ar')
                                    تقليل الانبعاثات
                                @else
                                    Emission Reduction
                                @endif
                            </h5>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    تقليل البصمة الكربونية من خلال عمليات نظيفة
                                @else
                                    Reducing carbon footprint through clean processes
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-one-inner-four">
                        <div class="big-thumbnail-area">
                            <div class="thumbnail">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                </svg>
                            </div>
                        </div>
                        <div class="service-details">
                            <h5 class="title">
                                @if(app()->getLocale() === 'ar')
                                    إدارة النفايات
                                @else
                                    Waste Management
                                @endif
                            </h5>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    نظام متكامل لإدارة النفايات وإعادة استخدامها
                                @else
                                    Integrated system for waste management and reuse
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Environmental Impact Section -->
    <div class="rts-counterup-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb--40">
                        <h2 class="title">
                            @if(app()->getLocale() === 'ar')
                                تأثيرنا البيئي
                            @else
                                Our Environmental Impact
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="single-counterup">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                            </svg>
                        </div>
                        <div class="info">
                            <h3 class="title"><span class="counter">100</span>%</h3>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    ألياف معاد تدويرها
                                @else
                                    Recycled Fibers
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-counterup">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                            </svg>
                        </div>
                        <div class="info">
                            <h3 class="title"><span class="counter">50</span>K</h3>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    طن من الورق المعاد تدويره سنوياً
                                @else
                                    Tons of Paper Recycled Annually
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-counterup">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                            </svg>
                        </div>
                        <div class="info">
                            <h3 class="title"><span class="counter">30</span>%</h3>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    تقليل في استهلاك الطاقة
                                @else
                                    Reduction in Energy Consumption
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Certifications Section -->
    <div class="rts-feature-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb--40">
                        <h2 class="title">
                            @if(app()->getLocale() === 'ar')
                                شهادات بيئية
                            @else
                                Environmental Certifications
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="single-feature-area-start">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                        </div>
                        <h5 class="title">ISO 9001:2015</h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                شهادة نظام إدارة الجودة الدولية
                            @else
                                International Quality Management System Certification
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-feature-area-start">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                            </svg>
                        </div>
                        <h5 class="title">ISO 14001</h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                شهادة نظام الإدارة البيئية
                            @else
                                Environmental Management System Certification
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="rts-callto-acation-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-one-bg bg_image">
                        <div class="row">
                            <div class="col-12">
                                <div class="cta-one-inner">
                                    <div class="cta-left">
                                        <h3 class="title animated fadeIn">
                                            @if(app()->getLocale() === 'ar')
                                                معاً نحو مستقبل أكثر استدامة
                                            @else
                                                Together Towards a More Sustainable Future
                                            @endif
                                        </h3>
                                    </div>
                                    <div class="cta-right">
                                        <a class="rts-btn btn-primary" href="{{ route('contact-info') }}">{{ __('words.contact_us') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

