<div class="header-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-main-one-wrapper">
                    <div class="thumbnail ">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logo/Logo-1-2.jpg') }}" alt="finbiz-logo"
                                style="width:149px;" width="149" height="40" loading="lazy">
                        </a>
                    </div>
                    <div class="main-header ">
                        <div class="nav-area">
                            <ul class="">

                                <li class="main-nav has-dropdown">
                                    <a href="{{ route('about') }}">{{ __('words.nav_about') }}</a>
                                    <ul class="submenu parent-nav">
                                        <li><a
                                                href="{{ route('company-history') }}">{{ __('words.company_history') }}</a>
                                        </li>
                                        {{-- <li><a href="{{ route('vision-mission') }}">{{ __('words.vision_mission') }}</a></li> --}}
                                        <li><a href="{{ route('our-team') }}">{{ __('words.our_team') }}</a></li>
                                        <li><a
                                                href="{{ route('quality-certificates') }}">{{ __('words.quality_certificates_menu') }}</a>
                                        </li>
                                        {{-- <li><a href="{{ route('social-responsibility') }}">{{ __('words.social_responsibility') }}</a></li> --}}
                                        {{-- <li><a href="{{ route('awards-recognition') }}">{{ __('words.awards_recognition') }}</a></li> --}}
                                    </ul>
                                </li>

                                <li class="main-nav has-dropdown mega-menu">
                                    <a href="{{ route('products.index') }}">{{ __('words.nav_products') }}</a>
                                    <div class="rts-mega-menu service-mega-menu-style">
                                        <div class="wrapper">
                                            <div class="container">
                                                <div class="row g-5">
                                                    <div class="col-lg-4">
                                                        <ul class="mega-menu-item parent-nav">
                                                            <li>
                                                                <a href="{{ route('product-categories.show', ['slug' => 'test-liner-1']) }}">
                                                                    <div class="single-service-menu">
                                                                        <div class="icon">
                                                                            <img src="{{ asset('assets/images/project/HP-FLUTE/MG_1728-2-copy-2-150x150.jpg') }}"
                                                                                alt="service">
                                                                        </div>
                                                                        <div class="info">
                                                                            <h5 class="title">
                                                                                {{ __('words.manufacturing_production') }}
                                                                            </h5>
                                                                            <p class="details">
                                                                                {{ __('words.manufacturing_desc') }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('product-categories.show', ['slug' => 'test-liner-1']) }}">
                                                                    <div class="single-service-menu">
                                                                        <div class="icon">
                                                                            <img src="{{ asset('assets/images/project/Picture5.jpg') }}"
                                                                                alt="service">
                                                                        </div>
                                                                        <div class="info">
                                                                            <h5 class="title">
                                                                                {{ __('words.quality_control') }}</h5>
                                                                            <p class="details">
                                                                                {{ __('words.quality_control_desc') }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="mega-menu-item parent-nav">
                                                            <li>
                                                                <a  href="{{ route('product-categories.show', ['slug' => 'test-liner-1']) }}">
                                                                    <div class="single-service-menu">
                                                                        <div class="icon">
                                                                            <img src="{{ asset('assets/images/project/TS-liner/Picture3.jpg') }}"
                                                                                alt="service">
                                                                        </div>
                                                                        <div class="info">
                                                                            <h5 class="title">
                                                                                {{ __('words.shipping_delivery') }}
                                                                            </h5>
                                                                            <p class="details">
                                                                                {{ __('words.shipping_delivery_desc') }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('product-categories.show', ['slug' => 'test-liner-1']) }}">
                                                                    <div class="single-service-menu">
                                                                        <div class="icon">
                                                                            <img src="{{ asset('assets/images/project/TS-liner/MG_1.jpg') }}"
                                                                                alt="service">
                                                                        </div>
                                                                        <div class="info">
                                                                            <h5 class="title">
                                                                                {{ __('words.technical_support') }}
                                                                            </h5>
                                                                            <p class="details">
                                                                                {{ __('words.technical_support_desc') }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="menu-thumb pl--20">
                                                            <img src="{{ asset('assets/images/project/products/waraq-co-photo_1.jpg') }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="main-nav has-dropdown">
                                    <a href="#">{{ __('words.nav_news') }}</a>
                                    <ul class="submenu parent-nav">
                                        <li><a href="{{ route('company-news') }}">{{ __('words.company_news') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('technical-articles') }}">{{ __('words.technical_articles') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('tips-guidelines') }}">{{ __('words.tips_guidelines') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('exhibitions-events') }}">{{ __('words.exhibitions_events') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="main-nav has-dropdown">
                                    <a
                                        href="{{ route('sustainability-activities') }}">{{ __('words.nav_sustainability') }}</a>
                                    <ul class="submenu parent-nav">
                                        <li><a href="{{ route('sustainability-activities') }}">انشطة الاستدامة </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="main-nav has-dropdown">
                                    <a href="{{ route('contact-info') }}">{{ __('words.nav_contact') }}</a>
                                    <ul class="submenu parent-nav">
                                        <li><a href="{{ route('contact-info') }}">{{ __('words.contact_info') }}</a>
                                        </li>
                                        <li><a href="{{ route('careers.index') }}">Careers</a></li>
                                        <li><a href="{{ url('/news') }}">{{ __('words.company_news') }}</a>
                                        </li>
                                        <li><a href="{{ route('quote-request') }}">{{ __('words.quote_request') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('customer-service') }}">{{ __('words.customer_service') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('complaints-suggestions') }}">{{ __('words.complaints_suggestions') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="loader-wrapper">
                            <div class="loader">
                            </div>
                            <div class="loader-section section-left"></div>
                            <div class="loader-section section-right"></div>
                        </div>
                        <div class="button-area">
                            <a href="#" class="rts-btn btn-primary ml--20 ml_sm--5 header-one-btn quote-btn"
                                data-analytics-event="cta_get_quote" data-analytics-location="header">
                                {{ __('words.get_quote') }}
                            </a>
                            <button id="menu-btn" class="menu menu-btn ml--20 ml_sm--5">
                                @svg('heroicon-o-bars-3', 'w-6 h-6')
                            </button>
                        </div>
                        <div class="nav-area"
                            @if (LaravelLocalization::getCurrentLocale() == 'en') style="margin-left: 65px !important; margin-right: 0 !important;" @else
                            style="margin-left: 0; margin-right: 65px;" @endif>
                            <ul>
                                <li class="main-nav has-dropdown">
                                    <a href="javascript:void(0)">
                                        <i
                                            class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocale() == 'en' ? 'gb' : (LaravelLocalization::getCurrentLocale() == 'ar' ? 'eg' : LaravelLocalization::getCurrentLocale()) }}"></i>
                                        {{ LaravelLocalization::getCurrentLocaleNative() }}
                                    </a>
                                    <ul class="submenu parent-nav">
                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li>
                                                <a rel="alternate" hreflang="{{ $localeCode }}"
                                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    <i
                                                        class="flag-icon flag-icon-{{ $localeCode == 'en' ? 'gb' : ($localeCode == 'ar' ? 'eg' : $localeCode) }}"></i>
                                                    {{ $properties['native'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
