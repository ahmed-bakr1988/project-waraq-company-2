<x-app-layout>
    <!-- rts breadcrumb area start -->
    <div class="rts-bread-crumb-area ptb--150 ptb_sm--100 bg-breadcrumb bg_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- bread crumb inner wrapper -->
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title">{{ $member->name }}</h1>
                        <div class="meta">
                            <a href="{{ route('home') }}" class="prev">{{ __('words.home') }} /</a>
                            <a href="{{ route('our-team.index') }}" class="prev">{{ __('words.our_team') }} /</a>
                            <a class="next">{{ $member->name }}</a>
                        </div>
                    </div>
                    <!-- bread crumb inner wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- rts breadcrumb area end -->

    <!-- team details area start -->
    <div class="rts-team-details-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="team-details-thumbnail">
                        @if($member->image)
                            <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" loading="lazy">
                        @else
                            <img src="{{ asset('assets/images/team/default-avatar.jpg') }}" alt="{{ $member->name }}" loading="lazy">
                        @endif
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="team-details-content">
                        <h3 class="title">{{ $member->name }}</h3>
                        <span class="designation">{{ $member->position }}</span>

                        @if($member->specialty)
                            <div class="specialty mt--30">
                                <h5>Specialty</h5>
                                <p>{{ $member->specialty }}</p>
                            </div>
                        @endif

                        @if($member->bio)
                            <div class="bio mt--30">
                                <h5>Biography</h5>
                                <p>{!! nl2br(e($member->bio)) !!}</p>
                            </div>
                        @endif

                        @if($member->qualifications)
                            <div class="qualifications mt--30">
                                <h5>Qualifications</h5>
                                <p>{!! nl2br(e($member->qualifications)) !!}</p>
                            </div>
                        @endif

                        <!-- contact information -->
                        <div class="contact-info mt--40">
                            <ul>
                                @if($member->email)
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                                    </li>
                                @endif
                                @if($member->phone)
                                    <li>
                                        <i class="fas fa-phone"></i>
                                        <a href="tel:{{ $member->phone }}">{{ $member->phone }}</a>
                                    </li>
                                @endif
                                @if($member->linkedin_url)
                                    <li>
                                        <i class="fab fa-linkedin"></i>
                                        <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener">LinkedIn</a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        <div class="team-back-btn mt--40">
                            <a href="{{ route('our-team.index') }}" class="rts-btn btn-primary">
                                <i class="fas fa-arrow-left"></i> Back to Team
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team details area end -->
</x-app-layout>
