<x-app-layout>
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ __('words.social_responsibility') }}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="{{ route('home') }}">{{ __('words.nav_home') }}</a>
                        <span> / </span>
                        <a href="#" class="active">{{ __('words.social_responsibility') }}</a>
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
                                التزامنا تجاه المجتمع
                            @else
                                Our Commitment to Society
                            @endif
                        </h2>
                        <p class="disc mt--20">
                            @if(app()->getLocale() === 'ar')
                                نؤمن في شركة ورق بأن نجاحنا مرتبط بمسؤوليتنا تجاه المجتمع والبيئة. نسعى جاهدين لتحقيق تأثير إيجابي مستدام من خلال برامج ومبادرات متنوعة.
                            @else
                                At Waraq, we believe our success is tied to our responsibility towards society and the environment. We strive to achieve a sustainable positive impact through various programs and initiatives.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pillars Section -->
    <div class="rts-feature-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb--50">
                    <h2 class="title">
                        @if(app()->getLocale() === 'ar')
                            ركائز المسؤولية الاجتماعية
                        @else
                            Social Responsibility Pillars
                        @endif
                    </h2>
                </div>
            </div>
            <div class="row g-5">
                <!-- Community Development -->
                <div class="col-lg-4 col-md-6">
                    <div class="responsibility-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: var(--color-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                تنمية المجتمع
                            @else
                                Community Development
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                ندعم المجتمعات المحلية من خلال برامج التوظيف والتدريب والمبادرات الاجتماعية المتنوعة.
                            @else
                                We support local communities through employment programs, training, and various social initiatives.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Education Support -->
                <div class="col-lg-4 col-md-6">
                    <div class="responsibility-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: var(--color-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                دعم التعليم
                            @else
                                Education Support
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                نقدم منحاً دراسية وبرامج تدريبية للشباب لتطوير مهاراتهم وبناء مستقبلهم المهني.
                            @else
                                We provide scholarships and training programs for youth to develop their skills and build their careers.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Environmental Protection -->
                <div class="col-lg-4 col-md-6">
                    <div class="responsibility-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: var(--color-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                حماية البيئة
                            @else
                                Environmental Protection
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                نلتزم بممارسات صديقة للبيئة وندعم مبادرات الحفاظ على الموارد الطبيعية.
                            @else
                                We are committed to eco-friendly practices and support natural resource conservation initiatives.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Health Programs -->
                <div class="col-lg-4 col-md-6">
                    <div class="responsibility-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: var(--color-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                البرامج الصحية
                            @else
                                Health Programs
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                نساهم في دعم المبادرات الصحية والتوعوية لتعزيز صحة المجتمع.
                            @else
                                We contribute to supporting health and awareness initiatives to enhance community health.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Employee Welfare -->
                <div class="col-lg-4 col-md-6">
                    <div class="responsibility-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: var(--color-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                رفاهية الموظفين
                            @else
                                Employee Welfare
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                نوفر بيئة عمل آمنة وصحية ونهتم برفاهية موظفينا وتطويرهم المهني.
                            @else
                                We provide a safe and healthy work environment and care for employee welfare and professional development.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Volunteer Programs -->
                <div class="col-lg-4 col-md-6">
                    <div class="responsibility-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="icon-wrapper mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem; color: var(--color-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.05 4.575a1.575 1.575 0 10-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0l.075 5.925m3.075.75V4.575m0 0a1.575 1.575 0 013.15 0V15M6.9 7.575a1.575 1.575 0 10-3.15 0v8.175a6.75 6.75 0 006.75 6.75h2.018a5.25 5.25 0 003.712-1.538l1.732-1.732a5.25 5.25 0 001.538-3.712l.003-2.024a.668.668 0 01.198-.471 1.575 1.575 0 10-2.228-2.228 3.818 3.818 0 00-1.12 2.687M6.9 7.575V12m6.27 4.318A4.49 4.49 0 0116.35 15" />
                            </svg>
                        </div>
                        <h5 class="title">
                            @if(app()->getLocale() === 'ar')
                                برامج التطوع
                            @else
                                Volunteer Programs
                            @endif
                        </h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                نشجع موظفينا على المشاركة في الأعمال التطوعية وخدمة المجتمع.
                            @else
                                We encourage our employees to participate in volunteer work and community service.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Impact Stats -->
    <div class="rts-stats-area rts-section-gap bg-light-custom">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb--50">
                    <h2 class="title">
                        @if(app()->getLocale() === 'ar')
                            تأثيرنا في المجتمع
                        @else
                            Our Impact on Society
                        @endif
                    </h2>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card text-center p-4 bg-white rounded h-100">
                        <h2 class="counter title text-primary">500+</h2>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                شاب تم تدريبهم
                            @else
                                Youth Trained
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card text-center p-4 bg-white rounded h-100">
                        <h2 class="counter title text-primary">50+</h2>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                منحة دراسية
                            @else
                                Scholarships
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card text-center p-4 bg-white rounded h-100">
                        <h2 class="counter title text-primary">1000+</h2>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                ساعة تطوعية
                            @else
                                Volunteer Hours
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card text-center p-4 bg-white rounded h-100">
                        <h2 class="counter title text-primary">20+</h2>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                مبادرة اجتماعية
                            @else
                                Social Initiatives
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
                                شاركنا في صنع الفرق
                            @else
                                Join Us in Making a Difference
                            @endif
                        </h3>
                        <p class="disc mb--30">
                            @if(app()->getLocale() === 'ar')
                                نرحب بالتعاون مع الجهات والأفراد الراغبين في المساهمة في خدمة المجتمع.
                            @else
                                We welcome collaboration with organizations and individuals willing to contribute to community service.
                            @endif
                        </p>
                        <a href="{{ route('contact-info') }}" class="rts-btn btn-primary">{{ __('words.contact_us') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
