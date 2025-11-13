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

                    {{-- <form action="{{ route('newsletter.store') }}" method="POST">
                        @csrf --}}
                        <div class="right-area">
                            <div class="inpur-area-main">
                                <input type="text" placeholder="{{ __('words.email_placeholder') }}" required
                                    name="email" />
                                <button id="subscribe-button"
                                    class="rts-btn btn-primary">{{ __('words.subscribe') }}</button>
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $('body').on('click', '#subscribe-button', function(event) {
                    event.preventDefault();
                    console.log('Subscribe button clicked');

                        let subscribeUrl = $(this).attr('href');
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('newsletter.store') }}',

                            success: function(data) {

                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })
                    }
                })

</script>
