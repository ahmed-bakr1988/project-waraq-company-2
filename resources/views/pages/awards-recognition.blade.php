<x-app-layout>
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ __('words.awards_recognition') }}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="{{ route('home') }}">{{ __('words.nav_home') }}</a>
                        <span> / </span>
                        <a href="#" class="active">{{ __('words.awards_recognition') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-awards-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <!-- Add awards and recognition content here -->
            </div>
        </div>
    </div>
</x-app-layout> 