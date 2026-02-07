<div class="header-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-main-one-wrapper">
                    <div class="thumbnail ">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logo/Logo-1-2.jpg') }}" alt="finbiz-logo" style="width:149px;" width="149" height="40" loading="lazy">
                        </a>
                    </div>
                    <div class="main-header ">
                        <div class="nav-area">
                            <ul class="">

                                <li class="main-nav has-dropdown">
                                    <a href="{{ route('about') }}">{{ __('words.nav_about') }}</a>
                                    <ul class="submenu parent-nav">
                                        <li><a href="{{ route('company-history') }}">{{ __('words.company_history') }}</a>
                                        </li>

                                        <li><a href="{{ route('our-team.index') }}">{{ __('words.our_team') }}</a></li>
                                        <li><a href="{{ route('quality-certificates') }}">{{ __('words.quality_certificates_menu') }}</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="main-nav has-dropdown mega-menu">
                                    <a href="{{ route('products.index') }}">{{ __('words.nav_products') }}</a>
                                    <div class="rts-mega-menu service-mega-menu-style">
                                        <div class="wrapper">
                                            <div class="container">
                                                <div class="row g-5">
                                                    @php
                                                    $categories = \App\Models\ProductCategory::active()
                                                    ->ordered()
                                                    ->take(4)
                                                    ->get();
                                                    @endphp

                                                    @if($categories->count() > 0)
                                                    <div class="col-lg-4">
                                                        <ul class="mega-menu-item parent-nav">
                                                            @foreach($categories->take(2) as $category)
                                                            <li>
                                                                <a href="{{ route('product-categories.show', $category->slug) }}">
                                                                    <div class="single-service-menu">
                                                                        <div class="icon">
                                                                            <img src="{{ asset('assets/images/project/HP-FLUTE/MG_1728-2-copy-2-150x150.jpg') }}" alt="{{ $category->name }}">
                                                                        </div>
                                                                        <div class="info">
                                                                            <h5 class="title">{{ $category->name }}</h5>
                                                                            <p class="details">{{ Str::limit($category->description, 80) }}</p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="mega-menu-item parent-nav">
                                                            @foreach($categories->skip(2)->take(2) as $category)
                                                            <li>
                                                                <a href="{{ route('product-categories.show', $category->slug) }}">
                                                                    <div class="single-service-menu">
                                                                        <div class="icon">
                                                                            <img src="{{ asset('assets/images/project/Picture5.jpg') }}" alt="{{ $category->name }}">
                                                                        </div>
                                                                        <div class="info">
                                                                            <h5 class="title">{{ $category->name }}</h5>
                                                                            <p class="details">{{ Str::limit($category->description, 80) }}</p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @else
                                                    <div class="col-lg-8">
                                                        <div class="text-center py-5">
                                                            <p>{{ __('words.no_categories_available') }}</p>
                                                        </div>
                                                    </div>
                                                    @endif

                                                    <div class="col-lg-4">
                                                        <div class="menu-thumb pl--20">
                                                            <img src="{{ asset('assets/images/project/products/waraq-co-photo_1.jpg') }}" alt="{{ __('words.our_products') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="main-nav has-dropdown">
                                    <a href="{{ route('company-news') }}">{{ __('words.nav_news') }}</a>
                                    <ul class="submenu parent-nav">
                                        <li><a href="{{ route('company-news') }}">{{ __('words.company_news') }}</a>
                                        </li>
                                        <li><a href="{{ route('technical-articles') }}">{{ __('words.technical_articles') }}</a>
                                        </li>
                                        <li><a href="{{ route('exhibitions-events') }}">{{ __('words.exhibitions_events') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="main-nav has-dropdown">
                                    <a href="{{ route('sustainability-activities') }}">{{ __('words.nav_sustainability_activities') }}</a>
                                    <ul class="submenu parent-nav">
                                        <li><a href="{{ route('sustainability-activities') }}">{{ __('words.nav_sustainability_activities') }}</a></li>
                                        <li><a href="{{ route('vision-mission') }}">{{ __('words.vision_mission') }}</a></li>
                                        <li><a href="{{ route('social-responsibility') }}">{{ __('words.social_responsibility') }}</a></li>
                                        <li><a href="{{ route('awards-recognition') }}">{{ __('words.awards_recognition') }}</a></li>
                                    </ul>
                                </li>

                                <li class="main-nav has-dropdown">
                                    <a href="{{ route('contact-info') }}">{{ __('words.nav_contact') }}</a>
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
                            <a href="{{ route('quote-request') }}" class="rts-btn btn-primary ml--20 ml_sm--5 header-one-btn quote-btn" data-analytics-event="cta_get_quote" data-analytics-location="header">
                                {{ __('words.get_quote') }}
                            </a>
                            <button id="menu-btn" class="menu menu-btn ml--20 ml_sm--5">
                                <img class="menu-light" src="{{ asset('assets/images/icons/01.svg') }}" alt="Menu-icon">
                            </button>
                        </div>
                        <div class="nav-area" @if (LaravelLocalization::getCurrentLocale()=='en' ) style="margin-left: 65px !important; margin-right: 0 !important;" @else style="margin-left: 0; margin-right: 65px;" @endif>
                            <ul>
                                <li class="main-nav has-dropdown">
                                    <a href="javascript:void(0)">
                                        <i class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocale() == 'en' ? 'gb' : (LaravelLocalization::getCurrentLocale() == 'ar' ? 'eg' : LaravelLocalization::getCurrentLocale()) }}"></i>
                                        {{ LaravelLocalization::getCurrentLocaleNative() }}
                                    </a>
                                    <ul class="submenu parent-nav">
                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                <i class="flag-icon flag-icon-{{ $localeCode == 'en' ? 'gb' : ($localeCode == 'ar' ? 'eg' : $localeCode) }}"></i>
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
