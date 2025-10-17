<div class="row g-5 mt--40">
    @foreach($services as $service)
    <div class="col-xl-4 col-lg-6 col-sm-12" data-animation="fadeInUp" data-delay="0.1" data-duration="1.2">
        <div class="single-service-hr">
            <a href="#" class="thumbnail">
                <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }}">
            </a>
            <div class="inner">
                <div class="icon-area">
                    <img src="{{ asset($service['icon']) }}" alt="">
                </div>
                <a href="#">
                    <h3 class="title">{{ $service['title'] }}</h3>
                </a>
                <p class="disc">{{ $service['description'] }}</p>
                <a href="#" class="rts-btn btn-primary btn-white">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>