<x-app-layout>
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ __('words.contact_info') }}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="{{ route('home') }}">{{ __('words.nav_home') }}</a>
                        <span> / </span>
                        <a href="#" class="active">{{ __('words.contact_info') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-contact-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-info-wrapper">
                        <!-- Add contact information here -->
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-map">
                        <!-- Add map here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 