<div class="rts-trusted-client rts-section-gapBottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-area-client-client text-center">
                    <p class="client-title">{{ __('words.trusted_clients_title') }}</p>
                </div>
            </div>
        </div>
        <div class="row mt--65">
            <div class="col-lg-12">
                <div class="client-three-wrapper">
                    @foreach($clients as $client)
                    <div class="single">
                        <img src="{{ asset($client) }}" alt="Client logo">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>