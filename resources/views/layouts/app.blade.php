<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @production
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @endproduction

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Initialize GSAP safely -->
    {{-- <script nonce="{{ csp_nonce() }}">
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof gsap !== 'undefined') {
                // Initialize GSAP animations here after DOM is ready
                const targets = document.querySelectorAll('[data-gsap]');
                if (targets.length) {
                    targets.forEach(target => {
                        // Safe GSAP initialization per element
                        const config = JSON.parse(target.dataset.gsap || '{}');
                        gsap.from(target, config);
                    });
                }
            }
        });
    </script> --}}
</head>

@include('layouts.head')

<body class="color-blue-demo">
    <!-- header area start -->
    @include('layouts.header')

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- rts footer area start -->
    @include('layouts.footer')
    <!-- rts footer area end -->

    <!-- side bar area start -->
    <div id="side-bar" class="side-bar header-two">
        <button class="close-icon-menu" title="Close menu"><i class="fa fa-times"></i></button>
        <!-- inner menu area desktop start -->
        <div class="rts-sidebar-menu-desktop">
            <a class="logo-1" href="{{ route('home') }}"><img class="logo" src="{{ asset('assets/images/logo/80.jpg') }}" alt="finbiz_logo"></a>
            <div class="body d-none d-xl-block">
                <p class="disc">
                    {{ __('words.side_bar_area_desc') }}
                </p>
                <div class="get-in-touch">
                    <!-- title -->
                    <div class="h6 title">Get In Touch</div>
                    <!-- title End -->
                    <div class="wrapper">
                        <!-- single -->
                        <div class="single">
                            <i class="fas fa-phone-alt"></i>
                            <a href="tel:+8801234566789">+8801234566789</a>
                        </div>
                        <!-- single ENd -->
                        <!-- single -->
                        <div class="single">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:example@gmail.com">example@gmail.com</a>
                        </div>
                        <!-- single ENd -->
                        <!-- single -->
                        <div class="single">
                            <i class="fas fa-globe"></i>
                            <a href="https://www.webexample.com">www.webexample.com</a>
                        </div>
                        <!-- single ENd -->
                        <!-- single -->
                        <div class="single">
                            <i class="fas fa-map-marker-alt"></i>
                            <a href="#">13/A, New Pro State, NYC</a>
                        </div>
                        <!-- single ENd -->
                    </div>
                    <div class="social-wrapper-two menu">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="linkedin"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile menu area start -->
        <div class="mobile-menu d-block d-xl-none">
            <nav class="nav-main mainmenu-nav mt--30">
                <ul class="mainmenu metismenu" id="mobile-menu-active">
                    <li class="has-droupdown">
                        <a href="#" class="main">{{ __('words.nav_about') }}</a>
                        <ul class="submenu mm-collapse">
                            <li><a href="{{ route('company-history') }}">{{ __('words.company_history') }}</a></li>
                            <li><a href="{{ route('vision-mission') }}">{{ __('words.vision_mission') }}</a></li>
                            <li><a href="{{ route('our-team') }}">{{ __('words.our_team') }}</a></li>
                            <li><a href="{{ route('quality-certificates') }}">{{ __('words.quality_certificates_menu') }}</a></li>
                            <li><a href="{{ route('social-responsibility') }}">{{ __('words.social_responsibility') }}</a></li>
                            <li><a href="{{ route('awards-recognition') }}">{{ __('words.awards_recognition') }}</a></li>
                        </ul>
                    </li>
                    <li class="has-droupdown">
                        <a href="#" class="main">{{ __('words.nav_products') }}</a>
                        <ul class="submenu mm-collapse">
                            <li><a href="{{ route('products.index') }}">{{ __('words.all_products') }}</a></li>
                        </ul>
                    </li>
                    <li class="has-droupdown">
                        <a href="#" class="main">{{ __('words.nav_news') }}</a>
                        <ul class="submenu mm-collapse">
                            <li><a href="{{ route('company-news') }}">{{ __('words.company_news') }}</a></li>
                            <li><a href="{{ route('technical-articles') }}">{{ __('words.technical_articles') }}</a></li>
                            <li><a href="{{ route('tips-guidelines') }}">{{ __('words.tips_guidelines') }}</a></li>
                            <li><a href="{{ route('exhibitions-events') }}">{{ __('words.exhibitions_events') }}</a></li>
                        </ul>
                    </li>
                    <li class="has-droupdown">
                        <a href="#" class="main">{{ __('words.nav_sustainability') }}</a>
                        <ul class="submenu mm-collapse">
                            <li><a href="{{ route('sustainability-activities') }}">{{ __('words.sustainability_activities') }}</a></li>
                        </ul>
                    </li>
                    <li class="has-droupdown">
                        <a href="#" class="main">{{ __('words.nav_contact') }}</a>
                        <ul class="submenu mm-collapse">
                            <li><a href="{{ route('contact-info') }}">{{ __('words.contact_info') }}</a></li>
                            <li><a href="{{ route('quote-request') }}">{{ __('words.quote_request') }}</a></li>
                            <li><a href="{{ route('customer-service') }}">{{ __('words.customer_service') }}</a></li>
                            <li><a href="{{ route('complaints-suggestions') }}">{{ __('words.complaints_suggestions') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <div class="social-wrapper-one">
                <ul>
                    <li>
                        <a href="#" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-label="twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-label="youtube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-label="linkedin">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- mobile menu area end -->
    </div>
    <!-- side bar area end -->

    <!-- offcanvase search -->
    <div class="search-input-area">
        <div class="container">
            <div class="search-input-inner">
                <div class="input-div">
                    <input class="search-input autocomplete" type="text" placeholder="Search by keyword or #">
                    <button><i class="far fa-search"></i></button>
                </div>
            </div>
        </div>
        <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
    </div>

    <!-- progress area start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>
    <!-- progress area end -->

    @include('layouts.scripts')
</body>
</html>
