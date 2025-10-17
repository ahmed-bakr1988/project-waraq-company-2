<x-app-layout>
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ __('words.tips_guidelines') }}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="{{ route('home') }}">{{ __('words.nav_home') }}</a>
                        <span> / </span>
                        <a href="#" class="active">{{ __('words.tips_guidelines') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-tips-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <!-- Add tips and guidelines content here -->
            </div>
        </div>
    </div>
</x-app-layout> 