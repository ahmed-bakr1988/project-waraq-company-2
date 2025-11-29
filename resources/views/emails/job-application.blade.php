<x-mail::message>
# New Job Application

You have received a new job application for: **{{ $jobApplication->career?->title ?? 'Position' }}**

## Candidate Information

**Name:** {{ $jobApplication->name }}  
**Email:** {{ $jobApplication->email }}  
**Phone:** {{ $jobApplication->phone }}  
@if($jobApplication->linkedin_url)
**LinkedIn:** [View Profile]({{ $jobApplication->linkedin_url }})  
@endif
@if($jobApplication->years_experience)
**Years of Experience:** {{ $jobApplication->years_experience }}  
@endif

@if($jobApplication->cover_letter)
## Cover Letter

{{ $jobApplication->cover_letter }}
@endif

## Additional Information

**CV:** Attached to this email  
**Application Date:** {{ $jobApplication->created_at->format('F d, Y \a\t H:i') }}  
**IP Address:** {{ $jobApplication->ip_address ?? 'Unknown' }}

<x-mail::button :url="'mailto:' . $jobApplication->email">
Contact Candidate
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
