    <div class="banner-swiper-two" id="home">
        <div class="swiper mySwiper-banner-two">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="rts-banner-area-two rts-section-gap bg_image">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-inner-two-content">
                                        <p class="pre-title"><span>{{ __('words.welcome') }}</span> {{ __('words.grow_business') }}</p>
                                        <h1 class="title">{{ __('words.title') }} <br> {{ __('words.title_2') }}</h1>
                                        <p class="disc">{{ __('words.banner_desc_1') }}</p>
                                        <a href="{{ route('contact-info') }}" class="rts-btn btn-primary btn-white">{{ __('words.Request_a_sample') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"><i class="fa-solid fa-chevron-right"></i></div>
            <div class="swiper-button-prev"><i class="fa-solid fa-chevron-left"></i></div>
        </div>
    </div>

    <!-- Featured Products Area -->
    <div class="rts-service-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between-hr">
                        <div class="title-area-hr-left">
                            <span class="pre">{{ __('words.our_products') }}</span>
                            <h2 class="title rts-text-anime-style-1">{{ __('words.products_title') }}</h2>
                        </div>
                        <a href="{{ route('products.index') }}" class="rts-btn btn-primary btn-border">{{ __('words.view_all_products') }}</a>
                    </div>
                </div>
            </div>

            <div class="row g-5 mt--40">
                @foreach($featuredProducts as $product)
                <div class="col-xl-4 col-lg-6 col-sm-12" data-animation="fadeInUp" data-delay="0.1" data-duration="1.2">
                    <div class="single-service-hr">
                        <a href="{{ route('products.show', $product) }}" class="thumbnail">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        </a>
                        <div class="inner">
                            <a href="{{ route('products.show', $product) }}">
                                <h3 class="title">{{ $product->name }}</h3>
                            </a>
                            <p class="disc">{{ Str::limit($product->summary, 100) }}</p>
                            <a href="{{ route('products.show', $product) }}" class="rts-btn btn-primary btn-white">{{ __('words.read_more') }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Latest News Area -->
    <div class="rts-blog-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between-hr">
                        <div class="title-area-hr-left">
                            <span class="pre">{{ __('words.latest_news') }}</span>
                            <h2 class="title rts-text-anime-style-1">{{ __('words.news_title') }}</h2>
                        </div>
                        <a href="{{ route('company-news') }}" class="rts-btn btn-primary btn-border">{{ __('words.view_all_news') }}</a>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--40">
                @foreach($latestNews as $news)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-single-two-wrapper">
                        <div class="image-area">
                            <a href="{{ route('news.show', $news->slug) }}" class="thumbnail">
                                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
                            </a>
                            <div class="date">
                                <span class="day">{{ $news->published_at->format('d') }}</span>
                                <span class="month">{{ $news->published_at->format('M') }}</span>
                            </div>
                        </div>
                        <div class="inner-content">
                            <a href="{{ route('news.show', $news->slug) }}">
                                <h5 class="title">{{ $news->title }}</h5>
                            </a>
                            <a href="{{ route('news.show', $news->slug) }}" class="btn-read-more-blog">{{ __('words.read_more') }} <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Trusted Clients -->
    <div class="rts-trusted-client rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-area-client-client text-center">
                        <p class="client-title">{{ __('words.trusted_clients') }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt--65">
                <div class="col-lg-12">
                    <div class="client-three-wrapper">
                        <div class="single"><img src="{{ asset('assets/images/brand/01.webp') }}" alt="Client"></div>
                        <div class="single"><img src="{{ asset('assets/images/brand/02.webp') }}" alt="Client"></div>
                        <div class="single"><img src="{{ asset('assets/images/brand/03.webp') }}" alt="Client"></div>
                        <div class="single"><img src="{{ asset('assets/images/brand/04.webp') }}" alt="Client"></div>
                        <div class="single"><img src="{{ asset('assets/images/brand/05.webp') }}" alt="Client"></div>
                        <div class="single"><img src="{{ asset('assets/images/brand/06.webp') }}" alt="Client"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>