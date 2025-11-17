<div>
    <!-- Newsletter Section -->
    {{-- <div class="row pt--60 pb--40">
        <div class="col-12">
            <div class="newsletter-wrapper text-center">
                <h4 class="title" style="color: #fff; margin-bottom: 15px;">
                    @if (app()->getLocale() === 'ar')
                        اشترك في نشرتنا الإخبارية
                    @else
                        Subscribe to Our Newsletter
                    @endif
                </h4>
                <p class="disc" style="color: #ddd; margin-bottom: 25px;">
                    @if (app()->getLocale() === 'ar')
                        احصل على آخر التحديثات والأخبار مباشرة في بريدك الإلكتروني
                    @else
                        Get the latest updates and news directly in your inbox
                    @endif
                </p>

                @if (session('success') && request()->is('*'))
                    <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert"
                        style="max-width: 500px;">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('info') && request()->is('*'))
                    <div class="alert alert-info alert-dismissible fade show mx-auto" role="alert"
                        style="max-width: 500px;">
                        <strong>{{ session('info') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('newsletter.store') }}" method="POST" class="newsletter-form mx-auto"
                    style="max-width: 500px;">
                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" class="form-control"
                            placeholder="{{ __('words.email_placeholder') }}" required
                            style="height: 50px; border-radius: 5px 0 0 5px;">
                        <button type="submit" class="rts-btn btn-primary"
                            style="border-radius: 0 5px 5px 0; padding: 0 30px;">
                            {{ __('words.subscribe') }}
                        </button>
                    </div>
                    @error('email')
                        <small class="text-danger d-block mt-2">{{ $message }}</small>
                    @enderror
                </form>
            </div>
        </div>
    </div> --}}
</div>
<div class="rts-cta-area-one rts-section-gapBottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cta-main-area-wrapper-one bg_image">
                    <div class="left-areas">
                        <span class="pre">
                            @if (app()->getLocale() === 'ar')
                                احصل على آخر التحديثات والأخبار مباشرة في بريدك الإلكتروني
                            @else
                                Get updates and news in your inbox.
                            @endif
                        </span>
                        <h3 class="title">
                            @if (app()->getLocale() === 'ar')
                                اشترك في نشرتنا الإخبارية
                            @else
                                Subscribe to Our Newsletter
                            @endif
                        </h3>
                    </div>

                    <div class="right-area">
                        <div class="inpur-area-main">
                            <input type="email" id="newsletter-email" placeholder="{{ __('words.email_placeholder') }}" required
                                name="email" />
                            <button id="subscribe-button"
                                class="rts-btn btn-primary">{{ __('words.subscribe') }}</button>
                        </div>
                        <div id="newsletter-message" style="margin-top: 10px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Set up CSRF token for all Ajax requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Handle newsletter subscription
        $('#subscribe-button').on('click', function(event) {
            event.preventDefault();
            
            // Get email value from input
            var email = $('#newsletter-email').val();
            var button = $(this);
            var messageDiv = $('#newsletter-message');
            
            // Clear previous messages
            messageDiv.html('');
            
            // Validate email is not empty
            if (!email || email.trim() === '') {
                messageDiv.html('<div class="alert alert-danger">@if (app()->getLocale() === "ar") الرجاء إدخال البريد الإلكتروني @else Please enter your email @endif</div>');
                return;
            }
            
            // Disable button and show loading state
            button.prop('disabled', true);
            button.html('@if (app()->getLocale() === "ar") جاري الإرسال... @else Sending... @endif');
            
            // Send Ajax request
            $.ajax({
                type: 'POST',
                url: '{{ route('newsletter.store') }}',
                data: {
                    email: email
                },
                success: function(response) {
                    // Re-enable button
                    button.prop('disabled', false);
                    button.html('{{ __('words.subscribe') }}');
                    
                    if (response.success) {
                        // Show success message
                        var alertClass = response.type === 'info' ? 'alert-info' : 'alert-success';
                        messageDiv.html('<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' +
                            '<strong>' + response.message + '</strong>' +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>');
                        
                        // Clear input on success
                        if (response.type !== 'info') {
                            $('#newsletter-email').val('');
                        }
                    }
                },
                error: function(xhr, status, error) {
                    // Re-enable button
                    button.prop('disabled', false);
                    button.html('{{ __('words.subscribe') }}');
                    
                    var errorMessage = '@if (app()->getLocale() === "ar") حدث خطأ. الرجاء المحاولة مرة أخرى @else An error occurred. Please try again @endif';
                    
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    
                    // Show error message
                    messageDiv.html('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        '<strong>' + errorMessage + '</strong>' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>');
                }
            });
        });
    });
</script>
