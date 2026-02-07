<x-app-layout>
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ __('words.quality_certificates_menu') }}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="{{ route('home') }}">{{ __('words.nav_home') }}</a>
                        <span> / </span>
                        <a href="#" class="active">{{ __('words.quality_certificates_menu') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Intro Section -->
    <div class="rts-about-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="title-area mb--50">
                        <span class="pre-title">{{ __('words.company_name') }}</span>
                        <h2 class="title">
                            @if(app()->getLocale() === 'ar')
                                شهادات الجودة والاعتماد
                            @else
                                Quality Certifications & Accreditations
                            @endif
                        </h2>
                        <p class="disc mt--20" style="max-width: 700px; margin: 0 auto;">
                            @if(app()->getLocale() === 'ar')
                                نفخر بحصولنا على شهادات الجودة العالمية التي تؤكد التزامنا بأعلى معايير الجودة والسلامة البيئية في جميع عملياتنا ومنتجاتنا.
                            @else
                                We are proud to have obtained international quality certificates that confirm our commitment to the highest quality and environmental safety standards in all our operations and products.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Certificates Grid -->
    <div class="rts-certificate-area rts-section-gapBottom">
        <div class="container">
            <div class="row g-5">
                <!-- ISO 9001 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="certificate-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="certificate-icon mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 4rem; height: 4rem; color: var(--color-primary);">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                        </div>
                        <h4 class="title mb--10">ISO 9001:2015</h4>
                        <p class="subtitle text-muted mb--15">
                            @if(app()->getLocale() === 'ar')
                                نظام إدارة الجودة
                            @else
                                Quality Management System
                            @endif
                        </p>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                شهادة نظام إدارة الجودة التي تضمن التزامنا بتقديم منتجات وخدمات تلبي متطلبات العملاء والمتطلبات التنظيمية.
                            @else
                                Quality Management System certification that ensures our commitment to delivering products and services that meet customer and regulatory requirements.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- ISO 14001 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="certificate-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="certificate-icon mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 4rem; height: 4rem; color: #22c55e;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                            </svg>
                        </div>
                        <h4 class="title mb--10">ISO 14001:2015</h4>
                        <p class="subtitle text-muted mb--15">
                            @if(app()->getLocale() === 'ar')
                                نظام الإدارة البيئية
                            @else
                                Environmental Management System
                            @endif
                        </p>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                شهادة نظام الإدارة البيئية التي تثبت التزامنا بتقليل الأثر البيئي وتحسين الأداء البيئي باستمرار.
                            @else
                                Environmental Management System certification that demonstrates our commitment to minimizing environmental impact and continuously improving environmental performance.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- FSC -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="certificate-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="certificate-icon mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 4rem; height: 4rem; color: #16a34a;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                            </svg>
                        </div>
                        <h4 class="title mb--10">FSC</h4>
                        <p class="subtitle text-muted mb--15">
                            @if(app()->getLocale() === 'ar')
                                مجلس رعاية الغابات
                            @else
                                Forest Stewardship Council
                            @endif
                        </p>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                شهادة FSC تؤكد أن منتجاتنا تأتي من مصادر مسؤولة بيئياً واجتماعياً.
                            @else
                                FSC certification confirms that our products come from environmentally and socially responsible sources.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- ISO 45001 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="certificate-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="certificate-icon mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 4rem; height: 4rem; color: #f59e0b;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                            </svg>
                        </div>
                        <h4 class="title mb--10">ISO 45001:2018</h4>
                        <p class="subtitle text-muted mb--15">
                            @if(app()->getLocale() === 'ar')
                                نظام إدارة السلامة والصحة المهنية
                            @else
                                Occupational Health & Safety
                            @endif
                        </p>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                شهادة نظام إدارة السلامة والصحة المهنية التي تضمن بيئة عمل آمنة لجميع موظفينا.
                            @else
                                Occupational Health and Safety Management System certification that ensures a safe working environment for all our employees.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- HACCP -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="certificate-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="certificate-icon mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 4rem; height: 4rem; color: #3b82f6;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                            </svg>
                        </div>
                        <h4 class="title mb--10">HACCP</h4>
                        <p class="subtitle text-muted mb--15">
                            @if(app()->getLocale() === 'ar')
                                تحليل المخاطر ونقاط التحكم الحرجة
                            @else
                                Hazard Analysis Critical Control Points
                            @endif
                        </p>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                شهادة HACCP لضمان سلامة المنتجات المستخدمة في التغليف الغذائي.
                            @else
                                HACCP certification to ensure the safety of products used in food packaging.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- CE Mark -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="certificate-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="certificate-icon mb--20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 4rem; height: 4rem; color: #8b5cf6;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <h4 class="title mb--10">CE Marking</h4>
                        <p class="subtitle text-muted mb--15">
                            @if(app()->getLocale() === 'ar')
                                علامة المطابقة الأوروبية
                            @else
                                European Conformity
                            @endif
                        </p>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                علامة CE تؤكد مطابقة منتجاتنا للمعايير الأوروبية للسلامة والصحة والبيئة.
                            @else
                                CE marking confirms that our products comply with European safety, health, and environmental standards.
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
                                                هل تحتاج إلى نسخ من شهاداتنا؟
                                            @else
                                                Need copies of our certificates?
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
