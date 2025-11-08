    <div class="rts-footer-area in-green-demo with-hr-demo footer-three rts-section-gapTop footer-bg-2">
        <div class="container pb--100 pb_sm--40">
            <div class="row g-5">
                <div class="col-xl-5 col-lg-6">
                    <div class="footer-three-single-wized left">
                        <a href="index.html" class="logo_footer">
                            <img src="{{ asset('assets/images/logo/logo-1-2.jpg') }}" alt="Logo-image" style="width: 55%;">
                        </a>
                        <p class="disc">Felis consquat magnis fames sagittis ultrices plasodales porttitor quisque
                            ultrice tempor turpis.</p>
                        <ul class="social-three-wrapper">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- footer three mid area -->
                <div class="col-xl-7 col-lg-6">
                    <div class="row">
                        <!-- footer mid area left -->
                        <div class="col-lg-7">
                            <div class="footer-three-single-wized footer-two-single-wized mid-left">
                                <div class="wized-title-area mb--15">
                                    <h5 class="wized-title">Office Inforamtion</h5>
                                    <img src="assets/images/footer/01.png" alt="Invena_Footer">
                                </div>
                                <div class="body">
                                    <div class="info-wrapper">
                                        <div class="single">
                                            <ul class="icon">
                                                <li><i class="fas fa-phone-alt"></i></li>
                                            </ul>
                                            <div class="info">
                                                <span>Call Us 24/7</span>
                                                <a href="#">(+256) 2145.2156</a>
                                            </div>
                                        </div>
                                        <div class="single">
                                            <ul class="icon">
                                                <li><i class="far fa-envelope"></i></li>
                                            </ul>
                                            <div class="info">
                                                <span>Work with us</span>
                                                <a href="#">info@finbiz.com</a>
                                            </div>
                                        </div>
                                        <div class="single">
                                            <ul class="icon">
                                                <li><i class="fas fa-map-marker-alt"></i></li>
                                            </ul>
                                            <div class="info">
                                                <span>Our Location</span>
                                                <a href="#">XYZ Hilton Street, 125 <br>
                                                    Town United State</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- footer mid area left end -->

                        <!-- footer mid area right -->
                        <div class="col-lg-5 d-flex flex-end-footer">
                            <div class="footer-two-single-wized two">
                                <div class="wized-title-area">
                                    <h5 class="wized-title">Our Services</h5>
                                    <img src="assets/images/footer/01.png" alt="Invena_Footer">
                                </div>
                                <div class="wized-2-body">
                                    <ul>
                                        <li><a href="service-details.html"><i
                                                    class="fab fa-chevron-double-right"></i>Business
                                                planning</a></li>
                                        <li><a href="service-details.html"><i
                                                    class="fab fa-chevron-double-right"></i>Tax
                                                strategy</a></li>
                                        <li><a href="service-details.html"><i
                                                    class="fab fa-chevron-double-right"></i>Financial
                                                advices</a></li>
                                        <li><a href="service-details.html"><i
                                                    class="fab fa-chevron-double-right"></i>Insurance
                                                strategy</a></li>
                                        <li><a href="service-details.html"><i
                                                    class="fab fa-chevron-double-right"></i>Manage
                                                investment</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- footer mid area right end -->
                    </div>
                </div>
            </div>

            <!-- Newsletter Section -->
            <div class="row pt--60 pb--40">
                <div class="col-12">
                    <div class="newsletter-wrapper text-center">
                        <h4 class="title" style="color: #fff; margin-bottom: 15px;">
                            @if(app()->getLocale() === 'ar')
                                اشترك في نشرتنا الإخبارية
                            @else
                                Subscribe to Our Newsletter
                            @endif
                        </h4>
                        <p class="disc" style="color: #ddd; margin-bottom: 25px;">
                            @if(app()->getLocale() === 'ar')
                                احصل على آخر التحديثات والأخبار مباشرة في بريدك الإلكتروني
                            @else
                                Get the latest updates and news directly in your inbox
                            @endif
                        </p>

                        @if(session('success') && request()->is('*'))
                            <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert" style="max-width: 500px;">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('info') && request()->is('*'))
                            <div class="alert alert-info alert-dismissible fade show mx-auto" role="alert" style="max-width: 500px;">
                                <strong>{{ session('info') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('newsletter.store') }}" method="POST" class="newsletter-form mx-auto" style="max-width: 500px;">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="{{ __('words.email_placeholder') }}" required style="height: 50px; border-radius: 5px 0 0 5px;">
                                <button type="submit" class="rts-btn btn-primary" style="border-radius: 0 5px 5px 0; padding: 0 30px;">
                                    {{ __('words.subscribe') }}
                                </button>
                            </div>
                            @error('email')
                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area ptb--20">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="disc text-center">
                            INVENA - Copyright
                            <script>
                                document.write(
                                    new Date().getFullYear()
                                )
                            </script>. All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="rts-footer-area footer-two mt-dec-footer-map bg-footer-two bg_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="map-area-main-wrapper">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="map-area-main-footer-two">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d29208.07522277672!2d90.423296!3d23.7826795!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1738651440174!5m2!1sen!2sbd"
                                        width="625" height="625" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="map-information-2-footer">
                                    <h5 class="title-main">Contact Us</h5>
                                    <img src="assets/images/footer/02.svg" alt="line" class="line">
                                    <div class="contact-information-main-wrapper">
                                        <div class="signle-contact-information">
                                            <div class="icon">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                            <div class="information-wrapper">
                                                <span>Call Us 24/7</span>
                                                <a href="#">
                                                    <h6 class="title">(+256) 2145.2156</h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="signle-contact-information">
                                            <div class="icon">
                                                <i class="fa-solid fa-envelope"></i>
                                            </div>
                                            <div class="information-wrapper">
                                                <span>Work with us</span>
                                                <a href="#">
                                                    <h6 class="title">info@invena.com</h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="signle-contact-information">
                                            <div class="icon">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i>
                                            </div>
                                            <div class="information-wrapper">
                                                <span>Our Location</span>
                                                <a href="#">
                                                    <h6 class="title">125 TownUnited State</h6>
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
        </div>
        <div class="container bg-shape-f1">
            <!-- rts footer area -->
            <div class="row pt--120 pt_sm--80 pb--80 pb_sm--40">

                <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                    <div class="footer-one-single-wized mid-bg">
                        <div class="wized-title">
                            <h5 class="title">Opening Hours</h5>
                            <img src="assets/images/footer/01.svg" alt="finbiz_footer">
                        </div>
                        <div class="opening-time-inner">
                            <div class="single-opening">
                                <p class="day">Week Days</p>
                                <p class="time">09.00 - 24:00</p>
                            </div>
                            <div class="single-opening">
                                <p class="day">Saturday</p>
                                <p class="time">08:00 - 03.00</p>
                            </div>
                            <div class="single-opening mb--30 mb_sm--10">
                                <p class="day">Sunday</p>
                                <p class="time">Day Off</p>
                            </div>
                            <a href="#" class="rts-btn btn-primary btn-white">Contact Us</a>
                        </div>
                    </div>
                </div>
                <!-- footer mid area end -->
                <div class="col-xl-4 col-md-6 col-sm-12 col-12 pl--50 pl_sm--15">
                    <div class="footer-one-single-wized">
                        <div class="wized-title">
                            <h5 class="title">Quick Links</h5>
                            <img src="assets/images/footer/01.svg" alt="finbiz_footer">
                        </div>
                        <div class="quick-link-inner">
                            <ul class="links">
                                <li><a href="#"><i class="far fa-arrow-right"></i> Forum Support</a></li>
                                <li><a href="#"><i class="far fa-arrow-right"></i> Help &amp; FAQ</a></li>
                                <li><a href="#"><i class="far fa-arrow-right"></i> Contact Us</a></li>
                                <li><a href="#"><i class="far fa-arrow-right"></i> Pricing &amp; Plans</a></li>
                                <li><a href="#"><i class="far fa-arrow-right"></i> Cookie Policy</a></li>
                            </ul>
                            <ul class="links margin-left-70">
                                <li><a href="#"><i class="far fa-arrow-right"></i> About Us</a></li>
                                <li><a href="#"><i class="far fa-arrow-right"></i> My Account</a></li>
                                <li><a href="#"><i class="far fa-arrow-right"></i>Our Company</a></li>
                                <li><a href="#"><i class="far fa-arrow-right"></i>Service</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- footer mid area -->

                <!-- footer end area post -->
                <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                    <div class="footer-one-single-wized margin-left-65">
                        <div class="wized-title">
                            <h5 class="title">Get Updates</h5>
                            <img src="assets/images/footer/01.svg" alt="finbiz_footer">
                        </div>
                        <div class="body">
                            <div class="update-wrapper">
                                <p class="disc">Sign up for our latest news &amp; articles. We won’t give you spam
                                    mails.</p>
                                <form class="email-footer-area">
                                    <input type="email" placeholder="Enter Email Address" required="">
                                    <button type="submit"><i class="fas fa-location-arrow"></i></button>
                                </form>
                                <div class="note-area">
                                    <p><span>Note:</span> We do not publish your email</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer end area post end-->
            </div>
            <!-- rts footer area End -->
        </div>
        <!-- copyright area start -->
        <div class="rts-copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <p>Invena - Copyright
                                <script>
                                    document.write(
                                        new Date().getFullYear()
                                    )
                                </script>. All rights reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- copyright area end -->
    </div> --}}