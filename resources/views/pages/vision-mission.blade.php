<x-app-layout>
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ __('words.vision_mission') }}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="{{ route('home') }}">{{ __('words.nav_home') }}</a>
                        <span> / </span>
                        <a href="#" class="active">{{ __('words.vision_mission') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-about-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-vision-wrapper">
                        <h3 class="title">{{ __('words.our_vision') }}</h3>
                        <!-- Add vision content here -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-mission-wrapper">
                        <h3 class="title">{{ __('words.our_mission') }}</h3>
                        <!-- Add mission content here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 