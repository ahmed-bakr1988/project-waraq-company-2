<x-app-layout>
    <!-- Breadcrumb -->
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ __('words.our_factory') }}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="{{ route('home') }}">{{ __('words.nav_home') }}</a>
                        <span> / </span>
                        <a href="#" class="active">{{ __('words.our_factory') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Factory Section -->
    <div class="rts-about-area rts-section-gap">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="about-image-v-inner">
                        <img src="{{ asset('assets/images/project/products/waraq-co-photo_1.jpg') }}" alt="{{ __('words.our_factory') }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-progress-inner">
                        <div class="title-area">
                            <span>{{ __('words.since_2006') }}</span>
                            <h2 class="title">{{ __('words.our_factory') }}</h2>
                        </div>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                تقع منشأتنا الصناعية الحديثة في المنطقة الصناعية بمصر، وتمتد على مساحة تزيد عن 50,000 متر مربع. المصنع مجهز بآلات أوروبية حديثة ويعمل على مدار الساعة لتلبية طلبات العملاء.
                            @else
                                Our state-of-the-art manufacturing facility is located in the Industrial Zone of Egypt, spanning over 50,000 square meters. The factory is equipped with modern European machinery and operates 24/7 to meet customer demands.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Production Capacity Section -->
    <div class="rts-feature-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb--40">
                        <h2 class="title">{{ __('words.production_capacity') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-area-start">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                الطاقة السنوية
                            @else
                                Annual Capacity
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                180,000 طن سنوياً
                            @else
                                180,000 tons per year
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-area-start">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                الطاقة الشهرية
                            @else
                                Monthly Capacity
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                15,000 طن شهرياً
                            @else
                                15,000 tons per month
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-area-start">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                الطاقة اليومية
                            @else
                                Daily Capacity
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                500 طن يومياً
                            @else
                                500 tons per day
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Facility Sections -->
    <div class="rts-service-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb--40">
                        <h2 class="title">
                            @if(app()->getLocale() === 'ar')
                                أقسام المصنع
                            @else
                                Facility Sections
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
                                    إعادة التدوير
                                @else
                                    Recycling
                                @endif
                            </h5>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    منطقة مخصصة لإعادة تدوير الورق المستعمل
                                @else
                                    Dedicated area for recycling used paper
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
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                                </svg>
                            </div>
                        </div>
                        <div class="service-details">
                            <h5 class="title">
                                @if(app()->getLocale() === 'ar')
                                    العجن
                                @else
                                    Pulping
                                @endif
                            </h5>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    تحويل الورق المعاد تدويره إلى عجينة
                                @else
                                    Converting recycled paper into pulp
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
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>
                            </div>
                        </div>
                        <div class="service-details">
                            <h5 class="title">
                                @if(app()->getLocale() === 'ar')
                                    صناعة الورق
                                @else
                                    Paper Making
                                @endif
                            </h5>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    خطوط إنتاج حديثة لصناعة الورق
                                @else
                                    Modern production lines for paper making
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
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                </svg>
                            </div>
                        </div>
                        <div class="service-details">
                            <h5 class="title">
                                @if(app()->getLocale() === 'ar')
                                    مراقبة الجودة
                                @else
                                    Quality Control
                                @endif
                            </h5>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    فحص شامل لضمان أعلى معايير الجودة
                                @else
                                    Comprehensive inspection ensuring highest quality
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Workforce Section -->
    <div class="rts-counterup-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb--40">
                        <h2 class="title">
                            @if(app()->getLocale() === 'ar')
                                القوى العاملة
                            @else
                                Our Workforce
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single-counterup">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                        </div>
                        <div class="info">
                            <h3 class="title"><span class="counter">300</span>+</h3>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    عامل ومهندس ماهر
                                @else
                                    Skilled Workers & Engineers
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt--40">
                <div class="col-12">
                    <div class="text-center">
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                نوظف أكثر من 300 عامل ومهندس ماهر ملتزمون بالتميز في كل مرحلة من مراحل الإنتاج.
                            @else
                                We employ over 300 skilled workers and engineers committed to excellence at every stage of production.
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
                                                هل ترغب في زيارة مصنعنا؟
                                            @else
                                                Want to visit our factory?
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

