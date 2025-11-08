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

    <!-- Contact Information Section -->
    <div class="rts-contact-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Information Cards -->
                <div class="col-lg-4">
                    <div class="contact-info-wrapper">
                        <!-- Address -->
                        <div class="single-contact-info mb--30">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2.5rem; height: 2.5rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            <div class="info">
                                <h5 class="title">{{ __('words.address') }}</h5>
                                <p class="disc">
                                    @if(app()->getLocale() === 'ar')
                                        المنطقة الصناعية، مصر
                                    @else
                                        Industrial Zone, Egypt
                                    @endif
                                </p>
                            </div>
                        </div>

                        <!-- Phone Numbers -->
                        <div class="single-contact-info mb--30">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2.5rem; height: 2.5rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                            </div>
                            <div class="info">
                                <h5 class="title">{{ __('words.phone') }}</h5>
                                <p class="disc">
                                    <a href="tel:+201001568862">+20 100 156 8862</a><br>
                                    <a href="tel:+201116660665">+20 111 666 0665</a>
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="single-contact-info mb--30">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2.5rem; height: 2.5rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <div class="info">
                                <h5 class="title">{{ __('words.email') }}</h5>
                                <p class="disc">
                                    <a href="mailto:info@waraqco.com">info@waraqco.com</a>
                                </p>
                            </div>
                        </div>

                        <!-- Working Hours -->
                        <div class="single-contact-info">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2.5rem; height: 2.5rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="info">
                                <h5 class="title">{{ __('words.working_hours') }}</h5>
                                <p class="disc">
                                    @if(app()->getLocale() === 'ar')
                                        الأحد - الخميس: 9 صباحاً - 5 مساءً
                                    @else
                                        Sunday - Thursday: 9 AM - 5 PM
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="contact-form-wrapper">
                        <div class="title-area">
                            <h3 class="title">{{ __('words.send_message') }}</h3>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    املأ النموذج أدناه وسنتواصل معك في أقرب وقت ممكن
                                @else
                                    Fill out the form below and we'll get back to you as soon as possible
                                @endif
                            </p>
                        </div>

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

                        <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                            @csrf
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('words.full_name') }} *" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('words.email') }} *" required>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="{{ __('words.phone_number') }}">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="subject" value="{{ old('subject') }}" placeholder="{{ __('words.subject') }}" required>
                                    @error('subject')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="{{ __('words.message') }} *" rows="6" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="rts-btn btn-primary">
                                        {{ __('words.send_message') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="row mt--60">
                <div class="col-12">
                    <div class="contact-map">
                        <div class="map-wrapper" style="height: 450px; background: #f5f5f5; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 4rem; height: 4rem; margin: 0 auto; color: #999;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                                </svg>
                                <p class="mt-3" style="color: #999;">
                                    @if(app()->getLocale() === 'ar')
                                        المنطقة الصناعية، مصر
                                    @else
                                        Industrial Zone, Egypt
                                    @endif
                                </p>
                                <p style="color: #999; font-size: 0.875rem;">
                                    @if(app()->getLocale() === 'ar')
                                        خريطة موقع الشركة
                                    @else
                                        Company Location Map
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional CTA Section -->
    <div class="rts-callto-acation-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-one-bg bg_image">
                        <div class="row">
                            <div class="col-12">
                                <div class="cta-one-inner">
                                    <div class="cta-left">
                                        <h3 class="title animated fadeIn">
                                            @if(app()->getLocale() === 'ar')
                                                اتصل بنا اليوم للحصول على عرض أسعار مخصص
                                            @else
                                                Contact us today for a customized quote
                                            @endif
                                        </h3>
                                    </div>
                                    <div class="cta-right">
                                        <a class="rts-btn btn-primary" href="tel:+201001568862">
                                            {{ __('words.phone_1') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 