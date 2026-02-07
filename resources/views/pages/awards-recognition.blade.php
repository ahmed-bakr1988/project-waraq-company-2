<x-app-layout>
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ __('words.awards_recognition') }}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="{{ route('home') }}">{{ __('words.nav_home') }}</a>
                        <span> / </span>
                        <a href="#" class="active">{{ __('words.awards_recognition') }}</a>
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
                                تميزنا المستمر
                            @else
                                Our Continuous Excellence
                            @endif
                        </h2>
                        <p class="disc mt--20">
                            @if(app()->getLocale() === 'ar')
                                نفخر بالجوائز والتقديرات التي حصلنا عليها والتي تعكس التزامنا بالتميز والجودة في صناعة الورق.
                            @else
                                We are proud of the awards and recognition we have received, reflecting our commitment to excellence and quality in the paper industry.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Awards Grid -->
    <div class="rts-awards-area rts-section-gapBottom">
        <div class="container">
            <div class="row g-5">
                <!-- Award 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="award-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 4rem; height: 4rem; color: #FFD700;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                            </svg>
                        </div>
                        <span class="award-year badge bg-primary mb--10">2024</span>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                جائزة التميز الصناعي
                            @else
                                Industrial Excellence Award
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                تقديراً لتميزنا في الإنتاج الصناعي والابتكار التقني.
                            @else
                                In recognition of our excellence in industrial production and technical innovation.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Award 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="award-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 4rem; height: 4rem; color: #C0C0C0;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                            </svg>
                        </div>
                        <span class="award-year badge bg-primary mb--10">2023</span>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                جائزة الاستدامة البيئية
                            @else
                                Environmental Sustainability Award
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                تكريماً لجهودنا في تطبيق ممارسات صديقة للبيئة.
                            @else
                                Honoring our efforts in implementing eco-friendly practices.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Award 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="award-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 4rem; height: 4rem; color: #CD7F32;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                            </svg>
                        </div>
                        <span class="award-year badge bg-primary mb--10">2022</span>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                جائزة رضا العملاء
                            @else
                                Customer Satisfaction Award
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                لتحقيقنا أعلى معدلات رضا العملاء في قطاع الورق.
                            @else
                                For achieving the highest customer satisfaction rates in the paper sector.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Award 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="award-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 4rem; height: 4rem; color: #FFD700;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                        </div>
                        <span class="award-year badge bg-primary mb--10">2021</span>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                نجمة الجودة السعودية
                            @else
                                Saudi Quality Star
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                تقديراً لالتزامنا بأعلى معايير الجودة المحلية والدولية.
                            @else
                                In recognition of our commitment to the highest local and international quality standards.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Award 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="award-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 4rem; height: 4rem; color: var(--color-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                        </div>
                        <span class="award-year badge bg-primary mb--10">2020</span>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                شهادة الأمان الصناعي
                            @else
                                Industrial Safety Certificate
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                لتحقيقنا صفر حوادث عمل لمدة عامين متتاليين.
                            @else
                                For achieving zero work accidents for two consecutive years.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Award 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="award-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 4rem; height: 4rem; color: var(--color-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                            </svg>
                        </div>
                        <span class="award-year badge bg-primary mb--10">2019</span>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                جائزة الابتكار الصناعي
                            @else
                                Industrial Innovation Award
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                لابتكاراتنا في تطوير منتجات ورقية صديقة للبيئة.
                            @else
                                For our innovations in developing eco-friendly paper products.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recognition Partners -->
    <div class="rts-partners-area rts-section-gap bg-light-custom">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb--50">
                    <h2 class="title">
                        @if(app()->getLocale() === 'ar')
                            شركاؤنا في التميز
                        @else
                            Our Partners in Excellence
                        @endif
                    </h2>
                    <p class="disc">
                        @if(app()->getLocale() === 'ar')
                            نفتخر بالتعاون مع أبرز المنظمات المحلية والدولية
                        @else
                            We are proud to collaborate with leading local and international organizations
                        @endif
                    </p>
                </div>
            </div>
            <div class="row g-4 justify-content-center align-items-center">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="partner-logo text-center p-3 bg-white rounded">
                        <span class="text-muted">ISO</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="partner-logo text-center p-3 bg-white rounded">
                        <span class="text-muted">FSC</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="partner-logo text-center p-3 bg-white rounded">
                        <span class="text-muted">SASO</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="partner-logo text-center p-3 bg-white rounded">
                        <span class="text-muted">SIDF</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
