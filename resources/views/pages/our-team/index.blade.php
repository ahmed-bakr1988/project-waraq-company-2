<x-app-layout>
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
                                @if($member->image)
                                    <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}" loading="lazy">
                                @else
                                    <img src="{{ asset('assets/images/team/default-avatar.jpg') }}" alt="{{ $member->name }}" loading="lazy">
                                @endif
                            </a>
                            <div class="content">
                                <h5 class="title">
                                    <a href="{{ route('our-team.show', $member->slug) }}">{{ $member->name }}</a>
                                </h5>
                                <span>{{ $member->position }}</span>
                                @if($member->specialty)
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

            @if($teamMembers->hasPages())
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
</x-app-layout>
