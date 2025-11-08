<x-app-layout>
<div class="product-details-area rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="product-single bg-white p-4 rounded-3 shadow-sm">
                    <div class="product-thumbnail mb-4">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded-3" loading="eager" width="960" height="640">
                    </div>
                    <div class="product-info">
                        <h2 class="product-title mb-3">{{ $product->name }}</h2>
                        <span class="product-category text-primary mb-3 d-block">{{ $product->category }}</span>
                        <p class="product-description text-muted">{{ $product->description }}</p>

                        @if($product->features)
                        <div class="product-features mt-4">
                            <h4 class="mb-3">{{ __('words.features') }}</h4>
                            <div class="features-list">
                                @foreach($product->features as $feature)
                                    <span class="feature-badge bg-light text-dark rounded-pill px-3 py-2 me-2 mb-2 d-inline-block">
                                        <i class="fas fa-check-circle text-primary me-1"></i>
                                        {{ $feature }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @php
                            $specs = is_array($product->specs ?? null) ? $product->specs : [];
                        @endphp
                        @if(!empty($specs))
                        <div class="product-specs mt-4">
                            <h4 class="mb-3">Specifications</h4>
                            <ul class="list-disc ms-4">
                                @foreach($specs as $k => $v)
                                    <li><strong>{{ Str::title(str_replace('_',' ', $k)) }}:</strong> {{ is_array($v) ? implode(', ', $v) : $v }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @php
                            $downloads = is_array($product->downloads ?? null) ? $product->downloads : [];
                        @endphp
                        @if(!empty($downloads))
                        <div class="product-downloads mt-4">
                            <h4 class="mb-3">Downloads</h4>
                            <ul class="list-disc ms-4">
                                @foreach($downloads as $label => $url)
                                    <li>
                                        <a href="{{ $url }}" target="_blank" rel="noopener"
                                           data-analytics-event="download_spec_pdf"
                                           data-analytics-label="{{ $label }}"
                                           data-analytics-location="product_details">
                                            {{ is_string($label) ? $label : basename($url) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $productJson = [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => $product->name,
        'description' => $product->description,
        'image' => asset($product->image),
        'brand' => [ 'name' => config('app.name') ],
        'category' => $product->category,
    ];
@endphp
<script type="application/ld+json">{!! json_encode($productJson, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>


    <div class="rts-sop-details-area rts-section-gapTop">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-horizental">
                        <div class="swiper swiper-container-h1">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="slider-inner">
                                        <img src="assets/images/shop/shop-01.jpg" alt="full_screen-image">
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="slider-inner">
                                        <img src="assets/images/shop/shop-03.jpg" alt="full_screen-image">
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="slider-inner">
                                        <img src="assets/images/shop/shop-02.jpg" alt="full_screen-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-pagination-area-shop-details">
                            <div class="swiper-pagination swiper-pagination-horizontal">
                                <span class="swiper-pagination-bullet"></span>
                                <span class="swiper-pagination-bullet two"></span>
                                <span class="swiper-pagination-bullet three"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt_md--180 mt_sm--180">
                    <div class="ms-single-product__content">
                        <h2 class="ms-single-product_title">Modernize Shovel</h2>
                        <p class="price">
                            <span class="woocommerce-Price-amount amount">
                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>29.00</bdi>
                            </span>
                        </p>
                        <div class="ms-woocommerce-product-rating woocommerce-product-rating">
                            <div class="ms-rating-icon">
                                <svg height="26px" version="1.2" viewBox="3 2 22 22" width="26px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <g>
                                            <path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="ms-rating-average"> 5.00 </div>
                            <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span
                                    class="count">1</span> customer review)</a>
                        </div>
                        <div class="woocommerce-product-details__short-description">
                            <p>Progressively incentivize B2C content vis-a-vis reliable experiences.
                                Phosfluorescently benchmark unique e-services whereas transparent
                                collaboration and idea-sharing. Enthusiastically communicate maintainable
                                networks via global metrics. Credibly negotiate progressive bandwidth for go
                                forward e-commerce. Rapidiously evolve magnetic initiatives through
                                client-based portals.
                            </p>
                        </div>
                        <p class="stock in-stock">7 in stock</p>
                        <div class="quantity-area">
                            <div class="cart-edit">
                                <div class="quantity-edit">
                                    <button class="button"><i class="fal fa-minus minus"></i></button>
                                    <input type="text" class="input" value="3">
                                    <button class="button plus">+<i class="fal fa-plus plus"></i></button>
                                </div>
                            </div>
                            <a href="cart.html" class="rts-btn btn-primary">Add to cart</a>
                        </div>
                        <div class="product_meta">
                            <span class="sku_wrapper"><strong>SKU:</strong> <span class="sku">161056</span></span>
                            <span class="posted_in"><strong>Category:</strong> <a href="#0" rel="tag">For
                                    Running</a></span>
                            <span class="tagged_as"><strong>Tags:</strong> <a href="#0" rel="tag">Life</a>,
                                <a href="#0" rel="tag">Move</a>,
                                <a href="#0" rel="tag">Sport</a>,
                                <a href="#0" rel="tag">Trainers</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 tab-area-shop rts-section-gap">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs pt--100 pt_md--50 pt_sm--50" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Additional
                                Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Review
                                (0)</button>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            Credibly e-enable e-business materials with competitive products.
                            Enthusiastically extend unique leadership before timely users. Synergistically
                            scale B2C e-business rather than quality products. Synergistically incubate
                            extensible outsourcing via magnetic sources. Interactively revolutionize
                            intuitive collaboration and idea-sharing through high-quality models. Synergistically
                            incubate
                            extensible outsourcing via magnetic sources. Interactively revolutionize
                            intuitive collaboration and idea-sharing through high-quality models. Interactively
                            revolutionize
                            intuitive collaboration and idea-sharing through high-quality models.
                            <br>
                            <br>
                            Interactively revolutionize intuitive collaboration and idea-sharing through high-quality
                            models. Credibly e-enable e-business materials with competitive products.
                            Enthusiastically extend unique leadership before timely users.
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="ms-section-title">
                                <h3 class="ms-heading-title"> Additional information</h3>
                                <table class="woocommerce-product-attributes shop_attributes">
                                    <tbody>
                                        <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_size">
                                            <th class="woocommerce-product-attributes-item__label">Size</th>
                                            <td class="woocommerce-product-attributes-item__value">
                                                <p>39, 40, 41, 42, 43, 44</p>
                                            </td>
                                        </tr>
                                        <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_collection">
                                            <th class="woocommerce-product-attributes-item__label"> Collection</th>
                                            <td class="woocommerce-product-attributes-item__value">
                                                <p>Most Sport Pro</p>
                                            </td>
                                        </tr>
                                        <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_upper-material">
                                            <th class="woocommerce-product-attributes-item__label">Upper Material</th>
                                            <td class="woocommerce-product-attributes-item__value">
                                                <p>Leather</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab" tabindex="0">
                            <div id="reviews" class="woocommerce-Reviews">
                                <div class="full-details-inner">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="reveiw-form">
                                                <h2 class="heading-title"> Be the first to reveiw</h2>
                                                <div class="reveiw-form-main">
                                                    <form class="contact-form">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="input-box text-input">
                                                                    <textarea name="Message" id="validationDefault01" cols="30" rows="10" placeholder="Your Review*"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <div class="col-lg-12">
                                                                    <div class="input-box">
                                                                        <input type="text" id="validationDefault02" placeholder="Name*" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="input-box mail-input">
                                                                        <input type="text" id="validationDefault03" placeholder="E-mail*" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="rating">
                                                                        <p>Your Rating :</p>
                                                                        <div class="rating-icon">
                                                                            <span class="one"><a href="#"> <i
                                                                                        class="fal fa-star"></i></a></span>
                                                                            <span class="two"><a href="#"> <i
                                                                                        class="fal fa-star"></i></a></span>
                                                                            <span class="three"><a href="#"> <i
                                                                                        class="fal fa-star"></i></a></span>
                                                                            <span class="four"><a href="#"> <i
                                                                                        class="fal fa-star"></i></a></span>
                                                                            <span class="five"><a href="#"> <i
                                                                                        class="fal fa-star"></i></a></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-cf--bottom col-12">
                                                                    <button class="rts-btn btn-primary" type="submit">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- rts related shop area start -->
    <div class="rts-related-shop-area rts-section-gapBottom" dir="ltr">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-style-five center mb--40">
                        <span class="pre">Blog & News</span>
                        <h2 class="title">Related products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper-related-shop-area">
                        <div class="swiper mySwiper-related-shop">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="rts-single-shop-area">
                                        <a href="#" class="thumbnail">
                                            <img src="assets/images/shop/01.webp" alt="shop">
                                        </a>
                                        <div class="inner-content">
                                            <div class="stars-area">
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <a href="#">
                                                <h4 class="title">Music Headphones</h4>
                                            </a>
                                            <div class="pricing-area-wrapper">
                                                <p class="price">$400</p>
                                                <button class="rts-btn btn-primary"><i
                                                        class="fa-regular fa-cart-shopping"></i> Add To
                                                    Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rts-single-shop-area">
                                        <a href="#" class="thumbnail">
                                            <img src="assets/images/shop/02.webp" alt="shop">
                                        </a>
                                        <div class="inner-content">
                                            <div class="stars-area">
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <a href="#">
                                                <h4 class="title">Hand holding photo camera</h4>
                                            </a>
                                            <div class="pricing-area-wrapper">
                                                <p class="price">$400</p>
                                                <button class="rts-btn btn-primary"><i
                                                        class="fa-regular fa-cart-shopping"></i> Add To
                                                    Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rts-single-shop-area">
                                        <a href="#" class="thumbnail">
                                            <img src="assets/images/shop/03.webp" alt="shop">
                                        </a>
                                        <div class="inner-content">
                                            <div class="stars-area">
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <a href="#">
                                                <h4 class="title">Levitating cosmetic cream</h4>
                                            </a>
                                            <div class="pricing-area-wrapper">
                                                <p class="price">$400</p>
                                                <button class="rts-btn btn-primary"><i
                                                        class="fa-regular fa-cart-shopping"></i> Add To
                                                    Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rts-single-shop-area">
                                        <a href="#" class="thumbnail">
                                            <img src="assets/images/shop/04.webp" alt="shop">
                                        </a>
                                        <div class="inner-content">
                                            <div class="stars-area">
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <a href="#">
                                                <h4 class="title">Music Headphones</h4>
                                            </a>
                                            <div class="pricing-area-wrapper">
                                                <p class="price">$400</p>
                                                <button class="rts-btn btn-primary"><i
                                                        class="fa-regular fa-cart-shopping"></i> Add To
                                                    Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts related shop area end -->





    <div class="rts-brand-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-list-area-wrapper">
                        <div class="left-paragraph">
                            <p>Our Trusted Clients</p>
                        </div>
                        <div class="right-brand-area-wrapper">
                            <div class="single-image">
                                <img src="assets/images/brand/01.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/02.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/03.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/04.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/05.webp" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="assets/images/brand/06.webp" alt="brand">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-cta-area-inner bg_image ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-inner-content-inner-page">
                        <div class="left-side-content">
                            <span>Subscribe Newsletter</span>
                            <h3 class="title">Stay Updated with <br> the Latest News!</h3>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Enter Email Address">
                            <button class="rts-btn btn-primary btn-white">Subscribe Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Reviews Section -->
    <div class="rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="product-reviews bg-white p-4 rounded-3 shadow-sm">
                        <h3 class="mb-4">{{ __('words.write_review') }}</h3>

                        <!-- Success/Error Messages -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('error') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('products.review', $product->id) }}" method="POST" class="review-form">
                            @csrf
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <label class="form-label">{{ __('words.rating') }} *</label>
                                    <div class="rating-input d-flex gap-2 mb-3">
                                        @for($i = 1; $i <= 5; $i++)
                                            <label class="star-rating-label">
                                                <input type="radio" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} required>
                                                <span class="star" style="font-size: 2rem; cursor: pointer; color: #ddd;">★</span>
                                            </label>
                                        @endfor
                                    </div>
                                    @error('rating')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <input type="text" name="reviewer_name" value="{{ old('reviewer_name') }}" placeholder="{{ __('words.your_name') }} *" class="form-control" required>
                                    @error('reviewer_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <input type="email" name="reviewer_email" value="{{ old('reviewer_email') }}" placeholder="{{ __('words.email') }} *" class="form-control" required>
                                    @error('reviewer_email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <input type="text" name="title" value="{{ old('title') }}" placeholder="{{ __('words.review_title') }}" class="form-control">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <textarea name="comment" placeholder="{{ __('words.review_comment') }} *" rows="5" class="form-control" required>{{ old('comment') }}</textarea>
                                    @error('comment')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="rts-btn btn-primary">
                                        @if(app()->getLocale() === 'ar')
                                            إرسال المراجعة
                                        @else
                                            Submit Review
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .star-rating-label input[type="radio"] {
            display: none;
        }
        .star-rating-label input[type="radio"]:checked ~ .star,
        .star-rating-label:hover .star {
            color: #ffc107;
        }
        .star-rating-label input[type="radio"]:checked ~ .star {
            color: #ffc107;
        }
        .rating-input label {
            margin-bottom: 0;
        }
    </style>

</x-app-layout>
