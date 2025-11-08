<x-app-layout>
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ __('words.quote_request') }}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="{{ route('home') }}">{{ __('words.nav_home') }}</a>
                        <span> / </span>
                        <a href="#" class="active">{{ __('words.quote_request') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-quote-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="quote-form-wrapper">
                        <div class="title-area text-center mb--40">
                            <h2 class="title">
                                @if(app()->getLocale() === 'ar')
                                    احصل على عرض سعر مجاني
                                @else
                                    Get a Free Quote
                                @endif
                            </h2>
                            <p class="disc">
                                @if(app()->getLocale() === 'ar')
                                    املأ النموذج أدناه وسنتواصل معك خلال 24 ساعة
                                @else
                                    Fill out the form below and we'll contact you within 24 hours
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

                        <form action="{{ route('quote.store') }}" method="POST" class="quote-form">
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
                                    <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="{{ __('words.phone_number') }} *" required>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="company" value="{{ old('company') }}" placeholder="{{ __('words.company_name') }} *" required>
                                    @error('company')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="project_type" value="{{ old('project_type') }}" placeholder="{{ __('words.project_type') }} *" required>
                                    @error('project_type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <select name="budget_range" class="form-select">
                                        <option value="">{{ __('words.budget_range') }}</option>
                                        <option value="< 10000" {{ old('budget_range') == '< 10000' ? 'selected' : '' }}>
                                            @if(app()->getLocale() === 'ar')
                                                أقل من 10,000
                                            @else
                                                Less than 10,000
                                            @endif
                                        </option>
                                        <option value="10000-50000" {{ old('budget_range') == '10000-50000' ? 'selected' : '' }}>10,000 - 50,000</option>
                                        <option value="50000-100000" {{ old('budget_range') == '50000-100000' ? 'selected' : '' }}>50,000 - 100,000</option>
                                        <option value="> 100000" {{ old('budget_range') == '> 100000' ? 'selected' : '' }}>
                                            @if(app()->getLocale() === 'ar')
                                                أكثر من 100,000
                                            @else
                                                More than 100,000
                                            @endif
                                        </option>
                                    </select>
                                    @error('budget_range')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="timeline" value="{{ old('timeline') }}" placeholder="{{ __('words.timeline') }}">
                                    @error('timeline')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="description" placeholder="{{ __('words.project_description') }} *" rows="5" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="requirements" placeholder="{{ __('words.requirements') }}" rows="4">{{ old('requirements') }}</textarea>
                                    @error('requirements')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="rts-btn btn-primary">
                                        @if(app()->getLocale() === 'ar')
                                            إرسال الطلب
                                        @else
                                            Submit Request
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
</x-app-layout> 