<x-app-layout>
    <!-- Breadcrumb -->
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ __('words.about_us') }}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="{{ route('home') }}">{{ __('words.nav_home') }}</a>
                        <span> / </span>
                        <a href="#" class="active">{{ __('words.about_us') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="rts-about-area rts-section-gap">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="about-image-v-inner">
                        <img src="{{ asset('assets/images/project/products/waraq-co-photo_1.jpg') }}" alt="{{ __('words.company_name') }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-progress-inner">
                        <div class="title-area">
                            <span>{{ __('words.since_2006') }}</span>
                            <h2 class="title">{{ __('words.company_name') }}</h2>
                        </div>
                        <p class="disc">
                            {{ __('words.company_description') }}
                        </p>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                شركة ورق لصناعة الورق هي شركة مصرية رائدة في تصنيع المنتجات الورقية، تأسست في عام 2006. نحن متخصصون في إنتاج منتجات ورقية معاد تدويرها عالية الجودة للتغليف المموج والتطبيقات الصناعية. نلتزم بتقديم أعلى مستويات الجودة مع الحفاظ على البيئة من خلال استخدام ألياف معاد تدويرها بنسبة 100%.
                            @else
                                Waraq for Paper Industries is a leading Egyptian manufacturer of paper products, established in 2006. We specialize in producing high-quality recycled paper products for corrugated packaging and industrial applications. We are committed to delivering the highest quality standards while protecting the environment through 100% recycled fiber usage.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission & Vision Section -->
    <div class="rts-feature-area rts-section-gapBottom">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="single-feature-area-start">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h5 class="title">{{ __('words.our_mission') }}</h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                توفير منتجات ورقية عالية الجودة للأسواق المصرية والإقليمية مع الحفاظ على الاستدامة البيئية وتقديم قيمة استثنائية لعملائنا.
                            @else
                                Providing high-quality paper products to Egyptian and regional markets while maintaining environmental sustainability and delivering exceptional value to our customers.
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-feature-area-start">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h5 class="title">{{ __('words.our_vision') }}</h5>
                        <p class="disc">
                            @if(app()->getLocale() === 'ar')
                                أن نكون الشركة الرائدة في تصنيع الورق في الشرق الأوسط، معترف بها للجودة والابتكار والمسؤولية البيئية.
                            @else
                                To be the leading paper manufacturer in the Middle East, recognized for quality, innovation, and environmental responsibility.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Values Section -->
    <div class="rts-service-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <p class="pre-title">{{ __('words.company_name') }}</p>
                        <h2 class="title">{{ __('words.core_values') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--20">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="service-one-inner-four">
                        <div class="big-thumbnail-area">
                            <div class="thumbnail">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </div>
                        </div>
                        <div class="service-details">
                            <h5 class="title">{{ __('words.quality_value') }}</h5>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    لا نتنازل أبداً عن جودة المنتج
                                @else
                                    We never compromise on product quality
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="service-one-inner-four">
                        <div class="big-thumbnail-area">
                            <div class="thumbnail">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                                </svg>
                            </div>
                        </div>
                        <div class="service-details">
                            <h5 class="title">{{ __('words.innovation_value') }}</h5>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    التحسين المستمر لعملياتنا ومنتجاتنا
                                @else
                                    Continuously improving our processes and products
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="service-one-inner-four">
                        <div class="big-thumbnail-area">
                            <div class="thumbnail">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                                </svg>
                            </div>
                        </div>
                        <div class="service-details">
                            <h5 class="title">{{ __('words.sustainability_value') }}</h5>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    ملتزمون بحماية البيئة
                                @else
                                    Committed to environmental protection
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="service-one-inner-four">
                        <div class="big-thumbnail-area">
                            <div class="thumbnail">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="service-details">
                            <h5 class="title">{{ __('words.customer_focus_value') }}</h5>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    نجاحكم هو نجاحنا
                                @else
                                    Your success is our success
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Achievements Section -->
    <div class="rts-counterup-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb--40">
                        <p class="pre-title">{{ __('words.since_2006') }}</p>
                        <h2 class="title">{{ __('words.achievements') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-counterup">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                            </svg>
                        </div>
                        <div class="info">
                            <h3 class="title"><span class="counter">18</span>+</h3>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    سنة من الخبرة
                                @else
                                    Years of Experience
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-counterup">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                            </svg>
                        </div>
                        <div class="info">
                            <h3 class="title"><span class="counter">180</span>K</h3>
                            <p class="disc">{{ __('words.annual_capacity') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-counterup">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                        </div>
                        <div class="info">
                            <h3 class="title"><span class="counter">300</span>+</h3>
                            <p class="disc">{{ __('words.over_300_employees') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-counterup">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                            </svg>
                        </div>
                        <div class="info">
                            <h3 class="title"><span class="counter">500</span>+</h3>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    عميل راضٍ
                                @else
                                    Satisfied Clients
                                @endif
                            </p>
                        </div>
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
                                                هل ترغب في معرفة المزيد عن منتجاتنا؟
                                            @else
                                                Want to learn more about our products?
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
