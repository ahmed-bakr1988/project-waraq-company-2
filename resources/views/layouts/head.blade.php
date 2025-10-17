<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Invena – A modern and responsive HTML template for consulting businesses. Perfect for finance, corporate, and agency websites. SEO-friendly, fast-loading, and easy to customize. Create a professional online presence today!">

    <title>{{ config('app.name', 'Waraq') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}">

    <!-- Local Icon Fonts (Font Awesome) -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome/brands.css') }}">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/metismenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnifying-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fontawesome.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/flag-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/arabic-text-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/contact-section.css') }}">

    <!-- Preload Critical Images -->
    <link rel="preload" as="image" href="{{ asset('assets/images/banner/21.webp') }}">

    {{-- Canonical & hreflang (absolute, bidirectional) --}}
    @php
        $supported = Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales();
        $canonical = url()->current();
    @endphp
    <link rel="canonical" href="{{ $canonical }}">
    @foreach($supported as $code => $props)
        <link rel="alternate" hreflang="{{ $code }}" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($code, null, [], true) }}">
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL(config('app.fallback_locale', 'en'), null, [], true) }}">

    {{-- JSON-LD: Organization + ContactPoint --}}
    @php
        $org = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => config('app.name', 'Waraq'),
            'url' => config('app.url'),
            'logo' => asset('assets/images/logo/Logo-1-2.jpg'),
            'contactPoint' => [[
                '@type' => 'ContactPoint',
                'contactType' => 'customer support',
                'telephone' => '+210-8976569',
                'email' => 'support@waraqco.com',
                'areaServed' => ['SA','EG','AE'],
                'availableLanguage' => ['ar','en'],
            ]],
        ];
    @endphp
    <script type="application/ld+json">{!! json_encode($org, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>

    {{-- @vite(['resources/js/app.js' , 'resources/css/app.css']) --}}

</head>
