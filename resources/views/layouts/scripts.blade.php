    <!-- jQuery -->
    <script src="{{ asset('assets/js/plugins/jquery.js') }}"></script>

     <!-- Bootstrap -->
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script> --}}
    <!-- Bootstrap Bundle (includes Popper) -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}

    <!-- Plugins -->
    <script src="{{ asset('assets/js/plugins/swiper.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/odometer.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-appear.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/gsap.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/split-text.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/scroll-trigger.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scroll.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/metismenu.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/popup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/contact.form.js') }}"></script>

    <!-- Main Script -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @if(app()->getLocale() == 'ar')
    <script src="{{ asset('assets/js/rtl.js') }}"></script>
    @endif

    <!-- Analytics Events -->
    <script src="{{ asset('assets/js/analytics.js') }}"></script>
