<x-app-layout>

    @include('sections.banner')




    <!-- tectimonisl-area start -->
    @include('sections.products-gallery', ['products' => $products])
    <!-- tectimonisl-area end -->




    <!-- rts business case area start -->
    {{-- <div class="rts-business-case-area rts-section-gapBottom pt--40" dir="ltr">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tite-between-area-8 position-relative">
                        <div class="title-style-one eight left mb--30">
                            <span class="pre">RECENT CASE STUDIES </span>
                            <h2 class="title rts-text-anime-style-1 uppercase">Our Business <span>Cases</span>
                            </h2>
                        </div>
                        <div class="next-prev-area">
                            <div class="swiper-button-next"><i class="fa-sharp fa fa-arrow-right"></i></div>
                            <div class="swiper-button-prev"><i class="fa-sharp fa fa-arrow-left"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt--20">
            <div class="row">
                <div class="col-lg-12">
                    <div class="flowating-right">

                        <div class="case-studies-wrapper-main-5">
                            <div class="swiper mySwiper-case-studies-5 pb--0">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="single-case-studies-four">
                                            <a href="project-details.html" class="thumbnail">
                                                <img src="assets/images/project/07.webp" alt="project">
                                            </a>
                                            <div class="inner">
                                                <a href="project-details.html">
                                                    <h3 class="title">Digital Business Solution</h3>
                                                    <span>Business Strategy</span>
                                                </a>
                                            </div>
                                            <div class="eye">
                                                <img src="assets/images/project/eye.svg" alt="project">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-case-studies-four">
                                            <a href="project-details.html" class="thumbnail">
                                                <img src="assets/images/project/08.webp" alt="project">
                                            </a>
                                            <div class="inner">
                                                <a href="project-details.html">
                                                    <h3 class="title">Marketing Business Solution</h3>
                                                    <span>Business Strategy</span>
                                                </a>
                                            </div>
                                            <div class="eye">
                                                <img src="assets/images/project/eye.svg" alt="project">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-case-studies-four">
                                            <a href="project-details.html" class="thumbnail">
                                                <img src="assets/images/project/09.webp" alt="project">
                                            </a>
                                            <div class="inner">
                                                <a href="project-details.html">
                                                    <h3 class="title">Best Business Solution</h3>
                                                    <span>Business Strategy</span>
                                                </a>
                                            </div>
                                            <div class="eye">
                                                <img src="assets/images/project/eye.svg" alt="project">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="single-case-studies-four">
                                            <a href="project-details.html" class="thumbnail">
                                                <img src="assets/images/project/08.webp" alt="project">
                                            </a>
                                            <div class="inner">
                                                <a href="project-details.html">
                                                    <h3 class="title">Website Business Solution</h3>
                                                    <span>Business Strategy</span>
                                                </a>
                                            </div>
                                            <div class="eye">
                                                <img src="assets/images/project/eye.svg" alt="project">
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
    </div> --}}
    <div class="rts-business-process-area rts-section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="business-process-hr-left-thumbnail">
                        <img src="assets/images/process/Image.png" alt="process">
                        {{-- <div class="right-top">
                            <img src="assets/images/process/icon/04.svg" alt="process">
                            <div class="information-area">
                                <h5 class="title">98%</h5>
                                <span>Company Growth</span>
                            </div>
                        </div> --}}
                        <div class="right-top bottom">
                            <img src="assets/images/process/icon/04.svg" alt="process">
                            <div class="information-area">
                                <h5 class="title">98%</h5>
                                <span>Company Growth</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt_sm--30 mt_md--50">
                    <div class="business-process-hr-content">
                        <div class="title-area-between-hr">
                            <div class="title-area-hr-left">
                                <span class="pre">
                                    Business Progress
                                </span>
                                <h2 class="title d-block rts-text-anime-style-1">
                                    We’re Solve Revolutionary for your Company
                                </h2>
                                <p class="disc">
                                    Vehicula euismod ante dis ullamcorper quam orci facilisis, condimentum cursus mattis
                                    tincidunt vitae porta litora, dui ridiculus enim lacinia blandit curabitur. Dui
                                    dapibus praesent magna tempor metus facilisis proin imperdiet
                                </p>
                            </div>
                        </div>
                        <a href="#" class="rts-btn btn-primary">Let’s Work Togather</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts business case area end -->



    <!-- Contact Us start -->
    @include('sections.contact-us')
    <!-- Contact Us End -->

</x-app-layout>
