<x-app-layout>
    <div class="container py-10 max-w-3xl">
        <h1 class="text-2xl font-bold">{{ $career->title }}</h1>
        <p class="text-gray-500 mb-4">{{ $career->location }}</p>
        <div class="prose max-w-none">{!! nl2br(e($career->description)) !!}</div>
        <div class="mt-6 flex gap-3">
            @if($career->apply_email)
                <a href="mailto:{{ $career->apply_email }}" class="rts-btn btn-primary"
                   data-analytics-event="apply_job_email"
                   data-analytics-title="{{ $career->title }}"
                   data-analytics-location="careers_show">
                    Apply by Email
                </a>
            @endif
            @if($career->form_url)
                <a href="{{ $career->form_url }}" class="rts-btn btn-primary"
                   data-analytics-event="apply_job_form"
                   data-analytics-title="{{ $career->title }}"
                   data-analytics-location="careers_show">
                    Apply via Form
                </a>
            @endif
        </div>
    </div>
</x-app-layout>
