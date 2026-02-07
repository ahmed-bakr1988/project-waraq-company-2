<x-app-layout>
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

    <!-- Intro Section -->
    <div class="rts-about-area rts-section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="title-area mb--30">
                        <span class="pre-title">{{ __('words.company_name') }}</span>
                        <h2 class="title">
                            @if(app()->getLocale() === 'ar')
                                رحلتنا نحو الاستدامة
                            @else
                                Our Journey Towards Sustainability
                            @endif
                        </h2>
                        <p class="disc mt--20">
                            @if(app()->getLocale() === 'ar')
                                نؤمن بأن الاستدامة ليست خياراً بل ضرورة. نعمل على تطبيق أفضل الممارسات البيئية في جميع مراحل الإنتاج للحفاظ على كوكبنا للأجيال القادمة.
                            @else
                                We believe sustainability is not an option but a necessity. We implement the best environmental practices across all production stages to preserve our planet for future generations.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Initiatives -->
    <div class="rts-feature-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb--50">
                    <h2 class="title">
                        @if(app()->getLocale() === 'ar')
                            مبادراتنا البيئية
                        @else
                            Our Environmental Initiatives
                        @endif
                    </h2>
                </div>
            </div>
            <div class="row g-5">
                <!-- Recycling -->
                <div class="col-lg-4 col-md-6">
                    <div class="sustainability-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: #22c55e;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                إعادة التدوير
                            @else
                                Recycling
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                نستخدم أكثر من 60% من المواد المعاد تدويرها في منتجاتنا، مما يقلل من استهلاك الموارد الطبيعية.
                            @else
                                We use over 60% recycled materials in our products, reducing natural resource consumption.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Clean Energy -->
                <div class="col-lg-4 col-md-6">
                    <div class="sustainability-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: #f59e0b;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                الطاقة النظيفة
                            @else
                                Clean Energy
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                نعتمد على الطاقة الشمسية لتغطية 30% من احتياجاتنا الطاقوية، ونخطط للوصول إلى 50% بحلول 2030.
                            @else
                                We rely on solar energy for 30% of our energy needs, planning to reach 50% by 2030.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Water Conservation -->
                <div class="col-lg-4 col-md-6">
                    <div class="sustainability-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: #3b82f6;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 4.556 4.03 8.25 9 8.25z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                ترشيد المياه
                            @else
                                Water Conservation
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                نعيد تدوير 80% من المياه المستخدمة في عملياتنا الصناعية باستخدام تقنيات متقدمة.
                            @else
                                We recycle 80% of water used in our industrial processes using advanced technologies.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Carbon Footprint -->
                <div class="col-lg-4 col-md-6">
                    <div class="sustainability-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: #6366f1;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15a4.5 4.5 0 004.5 4.5H18a3.75 3.75 0 001.332-7.257 3 3 0 00-3.758-3.848 5.25 5.25 0 00-10.233 2.33A4.502 4.502 0 002.25 15z" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                تقليل البصمة الكربونية
                            @else
                                Carbon Footprint Reduction
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                خفضنا انبعاثات الكربون بنسبة 25% خلال السنوات الخمس الماضية.
                            @else
                                We reduced carbon emissions by 25% over the past five years.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Sustainable Sourcing -->
                <div class="col-lg-4 col-md-6">
                    <div class="sustainability-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: #22c55e;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.893 13.393l-1.135-1.135a2.252 2.252 0 01-.421-.585l-1.08-2.16a.414.414 0 00-.663-.107.827.827 0 01-.812.21l-1.273-.363a.89.89 0 00-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 01-1.81 1.025 1.055 1.055 0 01-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 01-1.383-2.46l.007-.042a2.25 2.25 0 01.29-.787l.09-.15a2.25 2.25 0 012.37-1.048l1.178.236a1.125 1.125 0 001.302-.795l.208-.73a1.125 1.125 0 00-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 01-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 01-1.458-1.137l1.411-2.353a2.25 2.25 0 00.286-.76m11.928 9.869A9 9 0 008.965 3.525m11.928 9.868A9 9 0 118.965 3.525" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                توريد مستدام
                            @else
                                Sustainable Sourcing
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                جميع موادنا الخام حاصلة على شهادة FSC للتوريد من مصادر مستدامة.
                            @else
                                All our raw materials are FSC certified for sustainable sourcing.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Waste Management -->
                <div class="col-lg-4 col-md-6">
                    <div class="sustainability-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: #8b5cf6;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                إدارة النفايات
                            @else
                                Waste Management
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                نهدف للوصول إلى صفر نفايات في مكبات القمامة بحلول عام 2030.
                            @else
                                We aim to achieve zero landfill waste by 2030.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Goals Section -->
    <div class="rts-goals-area rts-section-gap bg-light-custom">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb--50">
                    <h2 class="title">
                        @if(app()->getLocale() === 'ar')
                            أهدافنا 2030
                        @else
                            Our 2030 Goals
                        @endif
                    </h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="goal-card text-center p-4 bg-white rounded h-100">
                        <h2 class="title text-primary">100%</h2>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                طاقة نظيفة
                            @else
                                Clean Energy
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="goal-card text-center p-4 bg-white rounded h-100">
                        <h2 class="title text-primary">0</h2>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                نفايات للمكبات
                            @else
                                Landfill Waste
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="goal-card text-center p-4 bg-white rounded h-100">
                        <h2 class="title text-primary">50%</h2>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                خفض انبعاثات الكربون
                            @else
                                Carbon Reduction
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="goal-card text-center p-4 bg-white rounded h-100">
                        <h2 class="title text-primary">100%</h2>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                مواد معاد تدويرها
                            @else
                                Recycled Materials
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
                                انضم إلى رحلتنا نحو الاستدامة
                            @else
                                Join Our Sustainability Journey
                            @endif
                        </h3>
                        <p class="disc mb--30">
                            @if(app()->getLocale() === 'ar')
                                معاً نستطيع صنع مستقبل أفضل لكوكبنا.
                            @else
                                Together we can create a better future for our planet.
                            @endif
                        </p>
                        <a href="{{ route('contact-info') }}" class="rts-btn btn-primary">{{ __('words.contact_us') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
