{{-- <x-app-layout>
    <!-- rts breadcrumb area start -->
    <div class="rts-bread-crumb-area ptb--150 ptb_sm--100 bg-breadcrumb bg_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- bread crumb inner wrapper -->
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title">{{ __('words.our_team') }}</h1>
                        <div class="meta">
                            <a href="{{ route('home') }}" class="prev">{{ __('words.home') }} /</a>
                            <a class="next">{{ __('words.our_team') }}</a>
                        </div>
                    </div>
                    <!-- bread crumb inner wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- rts breadcrumb area end -->

    <!-- team area start -->
    <div class="rts-team-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                @forelse($teamMembers as $member)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <!-- single team area start -->
                        <div class="team-single-area-start">
                            <a href="{{ route('our-team.show', $member->slug) }}" class="thumbnail">
                                @if ($member->image)
                                    <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}"
                                        loading="lazy">
                                @else
                                    <img src="{{ asset('assets/images/team/default-avatar.jpg') }}"
                                        alt="{{ $member->name }}" loading="lazy">
                                @endif
                            </a>
                            <div class="content">
                                <h5 class="title">
                                    <a href="{{ route('our-team.show', $member->slug) }}">{{ $member->name }}</a>
                                </h5>
                                <span>{{ $member->position }}</span>
                                @if ($member->specialty)
                                    <p class="disc">{{ Str::limit($member->specialty, 60) }}</p>
                                @endif
                            </div>
                        </div>
                        <!-- single team area end -->
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p>{{ __('words.no_team_members') }}</p>
                    </div>
                @endforelse
            </div>

            @if ($teamMembers->hasPages())
                <div class="row mt--50">
                    <div class="col-12">
                        <div class="pagination-wrapper text-center">
                            {{ $teamMembers->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- team area end -->
</x-app-layout> --}}
<x-app-layout>
    <!-- about us area wrapper main -->
    <div class="rts-breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-left center">
                        <span class="bg-title">Our Team</span>
                        <h1 class="title">
                            Team Experts
                        </h1>
                        <p class="disc" style="max-width: 45%; margin: auto;">
                            With a team of experienced professionals and a passion for innovation, we combine
                            cutting-edge strategies
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-area">
            <img src="{{ asset('assets/images/about/shape/01.png') }}" alt="shape" class="one">
            <img src="{{ asset('assets/images/about/shape/01.png') }}" alt="shape" class="two">
            <img src="{{ asset('assets/images/about/shape/01.png') }}" alt="shape" class="three">
        </div>
    </div>
    <!-- about us area wrapper main end -->


    <div class="inner-page-team-area rts-section-gapBottom mt-dec-section-inner">
        <div class="container pb--80">
            <div class="row mt--30 g-5 g-sm-30 mb--80">
                @forelse($teamMembers as $member)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-animation="fadeInUp" data-delay="0.2"
                        data-duration="1.2">
                        <div class="single-team-area-one-start">
                            <a href="{{ route('our-team.show', $member->slug) }}" class="thumbnail">
                                @if ($member->image)
                                    @php
                                        $memberImage = Str::startsWith($member->image, ['http://', 'https://', '/'])
                                            ? $member->image
                                            : (Str::startsWith($member->image, 'assets/')
                                                ? asset($member->image)
                                                : Storage::url($member->image));
                                    @endphp
                                    <img src="{{ $memberImage }}" alt="{{ $member->name }}"
                                        loading="lazy">
                                @else
                                    <img src="{{ asset('assets/images/team/01.webp') }}" alt="team">
                                @endif
                            </a>
                            <div class="inner-content">
                                <div class="text-top">
                                    <a href="{{ route('our-team.show', $member->slug) }}">
                                        <h5 class="title">{{ $member->name }}</h5>
                                    </a>
                                    <span>{{ $member->position }}</span>
                                    @if ($member->specialty)
                                        <p class="disc">{{ Str::limit($member->specialty, 60) }}</p>
                                    @endif
                                </div>
                                <div class="social-one-wrapper">
                                    <ul>
                                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p>{{ __('words.no_team_members') }}</p>
                    </div>
                @endforelse
            </div>
            @if ($teamMembers->hasPages())
                <div class="row mt--30">
                    <div class="col-12">
                        {{ $teamMembers->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>



    <div class="rts-brand-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-list-area-wrapper">
                        <div class="left-paragraph">
                            <p>Our Trusted Clients</p>
                        </div>
                        <div class="right-brand-area-wrapper">
                            <div class="single-image">
                                <img src="{{ asset('assets/images/brand/01.webp') }}" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="{{ asset('assets/images/brand/02.webp') }}" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="{{ asset('assets/images/brand/03.webp') }}" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="{{ asset('assets/images/brand/04.webp') }}" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="{{ asset('assets/images/brand/05.webp') }}" alt="brand">
                            </div>
                            <div class="single-image">
                                <img src="{{ asset('assets/images/brand/06.webp') }}" alt="brand">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts brand area end -->

    <!-- rts cta area start -->
    <div class="rts-cta-area-inner bg_image ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-inner-content-inner-page">
                        <div class="left-side-content">
                            <span>Subscribe Newsletter</span>
                            <h3 class="title">Stay Updated with <br> the Latest News!</h3>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Enter Email Address">
                            <button class="rts-btn btn-primary btn-white">Subscribe Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts cta area end -->
</x-app-layout>
