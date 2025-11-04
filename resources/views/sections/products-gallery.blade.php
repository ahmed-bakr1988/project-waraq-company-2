{{-- <div class="rts-product-gallery-area rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-between-area">
                    <div class="title-style-five">
                        <span class="pre">{{ __('words.our_products') }}</span>
                        <h2 class="title rts-text-anime-style-1">{{ __('words.product_gallery') }}</h2>
                    </div>
                    <div class="pagination-wrapper">
                        <div class="swiper-button-prevs"><i class="fa-sharp fa fa-arrow-left"></i></div>
                        <div class="swiper-pagination-fractions"></div>
                        <div class="swiper-button-nexts"><i class="fa-sharp fa fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5 mt--10">
            <div class="col-lg-12">
                <div class="swiper mySwiper-products" dir="ltr">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                            <div class="swiper-slide">
                                <div class="single-product-card">
                                    <div class="thumbnail">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                    </div>
                                    <div class="product-content">
                                        <h4 class="title">{{ $product->name }}</h4>
                                        <p class="description">
                                            {{ Str::limit($product->description, 150) }}
                                        </p>
                                        <div class="product-action">
                                            <a href="{{ route('products.show', $product->id) }}" class="rts-btn btn-primary">
                                                {{ __('words.view_details') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="rts-testimonials-area-five with-bg-shape-image bg_image rts-section-gap" style="content-visibility:auto;contain-intrinsic-size:1px 600px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-between-area">
                    <div class="title-style-five">
                        <span class="pre">{{ __('words.our_products') }}</span>
                        <h2 class="title rts-text-anime-style-1">{{ __('words.company_products') }}
                        </h2>
                    </div>
                    <div class="pagination-wrapper">
                        <div class="swiper-button-nexts"><i class="fa-sharp fa fa-arrow-right"></i></div>
                        <div class="swiper-pagination-fractions"></div>
                        <div class="swiper-button-prevs"><i class="fa-sharp fa fa-arrow-left"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5 mt--10">
            <div class="col-lg-12">
                <div class="swiper mySwiper-testimonials-5" dir="ltr">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                        
                            <div class="swiper-slide">
                                <div class="single-testimonials-style-five">
                                    <div class="thumbnail">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                             loading="lazy" decoding="async"
                                             width="600" height="400"
                                             sizes="(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 600px">
                                    </div>
                                    <div class="inner-content">
                                        <div class="name-area">
                                            <h5 class="title">{{ $product->name }}</h5>
                                            <span>{{ $product->category }}</span>
                                        </div>
                                        <p class="disc">
                                           {{ $product->description }}
                                        </p>
                                        <div class="body-end">
                                            <a href="#"><img src="assets/images/testimonials/icons/Logo-1-2.webp"
                                                    alt="Client_logo"></a>
                                            <div class="star-icon">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
