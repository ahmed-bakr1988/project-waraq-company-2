    <div class="banner-service-wrapper-bg">
        <!-- rts banner area start -->
        <div class="rts-banner-hr rts-section-gap bg_image"
            style="background-image: url('{{ asset('assets/images/banner/30.webp') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-hr-content-wrapper">
                            <span class="pre-title" data-animation="fadeInUp" data-delay="0.1" data-duration="1.2">
                                {{-- <img src="assets/images/banner/icon/03.svg" alt="icon"> --}}
                                {{ __('words.welcome_banner') }}♻️
                            </span>
                            <h1 class="title" data-animation="fadeInUp" data-delay="0.4" data-duration="1.2">WARAQ CO -
                                {{ __('words.banner_title_1') }}</h1>
                            <p class="disc" data-animation="fadeInUp" data-delay="0.7" data-duration="1.2">
                                {{ __('words.banner_desc') }}
                            </p>
                            <a href="{{ route('about') }}" class="rts-btn btn-primary btn-white"
                                data-animation="fadeInUp" data-delay="0.9"
                                data-duration="1.2">{{ __('words.get_quote_banner') }}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- rts banner area end -->

        <!-- rts service area start in file banner.blade.php -->
        <div class="rts-service-area rts-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-area-between-hr">
                            <div class="title-area-hr-left">
                                <span class="pre">
                                    {{ __('words.Our_process') }}
                                </span>
                                <h2 class="title rts-text-anime-style-1" >
                                    {{ __('words.banner_title_2') }}
                                </h2>
                            </div>
                            {{-- <a href="#" class="rts-btn btn-primary btn-border">View All Service</a> --}}
                        </div>
                    </div>
                </div>

                <div class="row g-5 mt--40">
                    <div class="col-xl-4 col-lg-6 col-sm-12" data-animation="fadeInUp" data-delay="0.1"
                        data-duration="1.2">
                        <div class="single-service-hr">
                            <a href="#" class="thumbnail hover-image-swap">
                                <img src="{{ asset('assets/images/service/14.jpg') }}"
                                    data-hover="{{ asset('assets/images/service/14.webp') }}" alt="service"
                                    class="service-image">
                            </a>
                            <div class="inner">
                                <div class="icon-area">
                                    <img src="assets/images/service/icon/03.svg" alt="">
                                </div>
                                <a href="#">
                                    <h3 class="title">{{ __('words.Our_process_Ship_it_3') }}</h3>
                                </a>
                                <p class="disc">
                                    {{ __('words.Our_process_Ship_it_desc_3') }}
                                </p>
                                <a href="#" class="rts-btn btn-primary btn-white">{{ __('words.Read_More') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-12" data-animation="fadeInUp" data-delay="0.4"
                        data-duration="1.2">
                        <div class="single-service-hr">
                            <a href="#" class="thumbnail hover-image-swap">
                                <img src="{{ asset('assets/images/service/15.jpeg') }}"
                                    data-hover="{{ asset('assets/images/service/15.webp') }}" alt="service"
                                    class="service-image">
                            </a>
                            <div class="inner">
                                <div class="icon-area">
                                    <img src="assets/images/service/icon/04.svg" alt="">
                                </div>
                                <a href="#">
                                    <h3 class="title">{{ __('words.Our_process_Recycle_it_2') }}</h3>
                                </a>
                                <p class="disc">
                                    {{ __('words.Our_process_Recycle_desc_2') }}
                                </p>
                                <a href="#" class="rts-btn btn-primary btn-white">{{ __('words.Read_More') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-12" data-animation="fadeInUp" data-delay="0.7"
                        data-duration="1.2">
                        <div class="single-service-hr">
                            <a href="#" class="thumbnail hover-image-swap">
                                <img src="{{ asset('assets/images/service/16.jpg') }}"
                                    data-hover="{{ asset('assets/images/service/16.webp') }}" alt="service"
                                    class="service-image">
                            </a>
                            <div class="inner">
                                <div class="icon-area">
                                    <img src="assets/images/service/icon/05.svg" alt="">
                                </div>
                                <a href="#">
                                    <h3 class="title">{{ __('words.Our_process_Collect_it_1') }}</h3>
                                </a>
                                <p class="disc">
                                    {{ __('words.Our_process_Collect_it_desc_1') }}
                                </p>
                                <a href="#" class="rts-btn btn-primary btn-white">{{ __('words.Read_More') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- rts service area end in file banner.blade.php -->

        <div class="rts-trusted-client rts-section-gapBottom">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb--40">
                        <div class="title-area-client-client text-center">
                            <p class="client-title"
                                @if (app()->getLocale() == 'ar') style="font-size: 3rem!important;" @endif>
                                {{ __('words.Our_Trusted_Clients') }}</p>
                        </div>
                    </div>
                </div>
                <div class="rts-client-review-area-start rts-section-gapBottom mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="swiper mySwiper-testimnials-hr" dir="ltr">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="single-testimonials-hr">
                                                <div class="brand">
                                                    <img src="assets/images/testimonials/icons/04.svg" alt="avatar">
                                                </div>
                                                <p class="disc">
                                                    4.88 out of 5 star from 1,645 reviews
                                                </p>
                                                <div class="stars-wrapper">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-testimonials-hr">
                                                <div class="brand">
                                                    <img src="assets/images/testimonials/icons/04.svg" alt="avatar">
                                                </div>
                                                <p class="disc">
                                                    4.88 out of 5 star from 1,645 reviews
                                                </p>
                                                <div class="stars-wrapper">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-testimonials-hr">
                                                <div class="brand">
                                                    <img src="assets/images/testimonials/icons/04.svg" alt="avatar">
                                                </div>
                                                <p class="disc">
                                                    4.88 out of 5 star from 1,645 reviews
                                                </p>
                                                <div class="stars-wrapper">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-testimonials-hr">
                                                <div class="brand">
                                                    <img src="assets/images/testimonials/icons/04.svg" alt="avatar">
                                                </div>
                                                <p class="disc">
                                                    4.88 out of 5 star from 1,645 reviews
                                                </p>
                                                <div class="stars-wrapper">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
                                    <div class="swiper-button-prev"><i class="fa-solid fa-arrow-left"></i></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row mt--65">
                    <div class="col-lg-12">
                        <div class="client-three-wrapper">
                            <div class="single">
                                <img src="assets/images/brand/01.webp" alt="Business_client">
                            </div>
                            <div class="single">
                                <img src="assets/images/brand/02.webp" alt="Business_client">
                            </div>
                            <div class="single">
                                <img src="assets/images/brand/03.webp" alt="Business_client">
                            </div>
                            <div class="single">
                                <img src="assets/images/brand/04.webp" alt="Business_client">
                            </div>
                            <div class="single">
                                <img src="assets/images/brand/05.webp" alt="Business_client">
                            </div>
                            <div class="single">
                                <img src="assets/images/brand/06.webp" alt="Business_client">
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

    </div>
