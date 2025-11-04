<x-app-layout>
    @php
        // Determine which single product to display on this page
        $selectedProduct = null;
        if (isset($products) && $products instanceof \Illuminate\Support\Collection) {
            $requestedId = (int) request('product');
            $selectedProduct = $requestedId ? $products->firstWhere('id', $requestedId) : $products->first();
        }
    @endphp
    {{-- <div class="container py-10">
        <h1 class="text-2xl font-bold mb-2">{{ $category->name }}</h1>
        @if($category->description)
            <p class="text-gray-600 mb-6">{{ $category->description }}</p>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
                <a href="{{ route('products.show', $product->id) }}" class="block group">
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" loading="lazy" width="600" height="400" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="font-semibold group-hover:underline">{{ $product->name }}</h2>
                            <p class="text-gray-600 mt-2 line-clamp-2">{{ Str::limit($product->description ?? $product->summary, 120) }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div> --}}


@if ($selectedProduct)
    <div class="rts-sop-details-area rts-section-gapTop">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-horizental">
                        <div class="swiper swiper-container-h1">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="slider-inner">
                                        <img src="{{ asset($selectedProduct->image) }}" alt="{{ $selectedProduct->name }}">
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="slider-inner">
                                        <img src="{{ asset($selectedProduct->image) }}" alt="{{ $selectedProduct->name }}">
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="slider-inner">
                                        <img src="{{ asset($selectedProduct->image) }}" alt="{{ $selectedProduct->name }}">
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
                        <h2 class="ms-single-product_title">{{ $selectedProduct->name }}</h2>
                        @if(optional($selectedProduct->productCategory)->name)
                            <p class="mb-2"><strong>{{ __('Category') }}:</strong> {{ optional($selectedProduct->productCategory)->name }}</p>
                        @endif
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
                        <div class="product_meta">
                            @if(optional($selectedProduct->productCategory)->name)
                                <span class="posted_in"><strong>{{ __('Category') }}:</strong>
                                    <a href="{{ route('product-categories.show', $category->slug) }}" rel="tag">{{ optional($selectedProduct->productCategory)->name }}</a>
                                </span>
                            @endif
                            @php
                                $downloads = is_array($selectedProduct->downloads ?? null) ? $selectedProduct->downloads : [];
                            @endphp
                            @if(!empty($downloads))
                                <div class="mt-4">
                                    <h3 class="ms-heading-title">{{ __('Downloads') }}</h3>
                                    <ul class="list-disc ms-4">
                                        @foreach($downloads as $label => $url)
                                            <li>
                                                <a href="{{ $url }}" target="_blank" rel="noopener">
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
                            {!! nl2br(e($selectedProduct->description ?: ($selectedProduct->summary ?? ''))) !!}
                            @php
                                $features = is_array($selectedProduct->features ?? null) ? $selectedProduct->features : [];
                            @endphp
                            @if(!empty($features))
                                <div class="mt-3">
                                    <h5 class="mb-2">{{ __('Features') }}</h5>
                                    <ul class="ms-4 list-disc">
                                        @foreach($features as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="ms-section-title">
                                <h3 class="ms-heading-title">{{ __('Additional information') }}</h3>
                                @php
                                    $specs = is_array($selectedProduct->specs ?? null) ? $selectedProduct->specs : [];
                                @endphp
                                @if(!empty($specs))
                                <table class="woocommerce-product-attributes shop_attributes">
                                    <tbody>
                                        @foreach($specs as $key => $value)
                                            <tr class="woocommerce-product-attributes-item">
                                                <th class="woocommerce-product-attributes-item__label">{{ Str::title(str_replace('_',' ', (string) $key)) }}</th>
                                                <td class="woocommerce-product-attributes-item__value">
                                                    <p>{{ is_array($value) ? implode(', ', $value) : $value }}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <p class="text-muted">{{ __('No additional information available.') }}</p>
                                @endif
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


    @else
        <div class="container py-10">
            <h1 class="text-2xl font-bold mb-2">{{ $category->name }}</h1>
            <p class="text-gray-600">{{ __('No products available in this category yet.') }}</p>
        </div>
    @endif

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
                                @php
                                    $related = (isset($selectedProduct) && $selectedProduct)
                                        ? $products->filter(fn($p) => $p->id !== $selectedProduct->id)->take(8)
                                        : $products->take(8);
                                @endphp
                                @forelse($related as $item)
                                    <div class="swiper-slide">
                                        <div class="rts-single-shop-area">
                                            <a href="{{ route('products.show', $item->id) }}" class="thumbnail">
                                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                                            </a>
                                            <div class="inner-content">
                                                <a href="{{ route('products.show', $item->id) }}">
                                                    <h4 class="title">{{ $item->name }}</h4>
                                                </a>
                                                <div class="pricing-area-wrapper">
                                                    <a class="rts-btn btn-primary" href="{{ route('products.show', $item->id) }}">{{ __('View') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="swiper-slide">
                                        <div class="rts-single-shop-area">
                                            <div class="inner-content">
                                                <p class="text-muted">{{ __('No related products found.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
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
                                <img src="{{ asset('assets/images/brand/01.webp') }}" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="{{ asset('assets/images/brand/02.webp') }}" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="{{ asset('assets/images/brand/03.webp') }}" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="{{ asset('assets/images/brand/04.webp') }}" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="{{ asset('assets/images/brand/05.webp') }}" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="{{ asset('assets/images/brand/06.webp') }}" alt="brand">
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
</x-app-layout>
