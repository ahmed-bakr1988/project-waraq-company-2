<x-app-layout>
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ __('words.vision_mission') }}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="{{ route('home') }}">{{ __('words.nav_home') }}</a>
                        <span> / </span>
                        <a href="#" class="active">{{ __('words.vision_mission') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vision Section -->
    <div class="rts-about-area rts-section-gap">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="about-image-v-inner">
                        <img src="{{ asset('assets/images/about/vision.webp') }}" alt="{{ __('words.our_vision') }}" onerror="this.src='{{ asset('assets/images/portfolio/30-1.webp') }}'">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-progress-inner">
                        <div class="title-area">
                            <span class="pre-title">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2rem; height: 2rem; display: inline-block; vertical-align: middle; margin-inline-end: 0.5rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ __('words.our_vision') }}
                            </span>
                            <h2 class="title">{{ __('words.our_vision') }}</h2>
                        </div>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                أن نكون الشركة الرائدة في تصنيع الورق في الشرق الأوسط وشمال أفريقيا، معترف بها عالمياً للجودة الفائقة والابتكار المستمر والمسؤولية البيئية. نسعى لأن نكون الخيار الأول لعملائنا من خلال تقديم منتجات ورقية صديقة للبيئة بأعلى معايير الجودة العالمية.
                            @else
                                To be the leading paper manufacturer in the Middle East and North Africa, globally recognized for exceptional quality, continuous innovation, and environmental responsibility. We strive to be the first choice for our customers by delivering eco-friendly paper products with the highest global quality standards.
                            @endif
                        </p>
                        <ul class="feature-list mt--20">
                            <li>
                                <i class="fa-solid fa-check"></i>
                                @if(app()->getLocale() === 'ar')
                                    الريادة في صناعة الورق المعاد تدويره
                                @else
                                    Leadership in recycled paper manufacturing
                                @endif
                            </li>
                            <li>
                                <i class="fa-solid fa-check"></i>
                                @if(app()->getLocale() === 'ar')
                                    الابتكار المستمر في العمليات والمنتجات
                                @else
                                    Continuous innovation in processes and products
                                @endif
                            </li>
                            <li>
                                <i class="fa-solid fa-check"></i>
                                @if(app()->getLocale() === 'ar')
                                    التوسع في الأسواق الإقليمية والدولية
                                @else
                                    Expansion in regional and international markets
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="rts-feature-area rts-section-gapBottom bg-light-custom">
        <div class="container">
            <div class="row g-5 align-items-center flex-lg-row-reverse">
                <div class="col-lg-6">
                    <div class="about-image-v-inner">
                        <img src="{{ asset('assets/images/about/mission.webp') }}" alt="{{ __('words.our_mission') }}" onerror="this.src='{{ asset('assets/images/portfolio/29-1.webp') }}'">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-progress-inner">
                        <div class="title-area">
                            <span class="pre-title">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2rem; height: 2rem; display: inline-block; vertical-align: middle; margin-inline-end: 0.5rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ __('words.our_mission') }}
                            </span>
                            <h2 class="title">{{ __('words.our_mission') }}</h2>
                        </div>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                نلتزم بتوفير منتجات ورقية عالية الجودة للأسواق المصرية والإقليمية مع الحفاظ على الاستدامة البيئية وتقديم قيمة استثنائية لعملائنا. نسعى لتحقيق التميز في كل جانب من جوانب عملنا من خلال الالتزام بأعلى معايير الجودة والسلامة.
                            @else
                                We are committed to providing high-quality paper products to Egyptian and regional markets while maintaining environmental sustainability and delivering exceptional value to our customers. We strive for excellence in every aspect of our work by adhering to the highest quality and safety standards.
                            @endif
                        </p>
                        <div class="row g-4 mt--20">
                            <div class="col-sm-6">
                                <div class="single-feature-box">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2rem; height: 2rem;">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                        </svg>
                                    </div>
                                    <h6>{{ __('words.quality_value') }}</h6>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-feature-box">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2rem; height: 2rem;">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                                        </svg>
                                    </div>
                                    <h6>{{ __('words.sustainability_value') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="rts-service-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb--50">
                        <span class="pre-title">{{ __('words.company_name') }}</span>
                        <h2 class="title">{{ __('words.core_values') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="service-one-inner-four text-center">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: var(--color-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                        </div>
                        <h5 class="title">{{ __('words.quality_value') }}</h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                لا نتنازل أبداً عن جودة منتجاتنا وخدماتنا
                            @else
                                We never compromise on product and service quality
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="service-one-inner-four text-center">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: var(--color-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                            </svg>
                        </div>
                        <h5 class="title">{{ __('words.innovation_value') }}</h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                التحسين المستمر لعملياتنا ومنتجاتنا
                            @else
                                Continuous improvement of our processes and products
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="service-one-inner-four text-center">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: var(--color-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                            </svg>
                        </div>
                        <h5 class="title">{{ __('words.sustainability_value') }}</h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                ملتزمون بحماية البيئة والاستدامة
                            @else
                                Committed to environmental protection and sustainability
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="service-one-inner-four text-center">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: var(--color-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </div>
                        <h5 class="title">{{ __('words.customer_focus_value') }}</h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                نجاح عملائنا هو نجاحنا
                            @else
                                Our customers' success is our success
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
                                                شاركنا في تحقيق مستقبل أخضر ومستدام
                                            @else
                                                Join us in achieving a green and sustainable future
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
