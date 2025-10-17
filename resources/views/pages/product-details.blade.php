{{-- @extends('layouts.app')

@section('content') --}}
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
</x-app-layout> 
