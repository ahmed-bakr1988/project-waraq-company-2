<x-mail::message>
# New Contact Form Submission

You have received a new contact form submission from your website.

## Contact Details

**Name:** {{ $contactMessage->name }}  
**Email:** {{ $contactMessage->email }}  
**Phone:** {{ $contactMessage->phone ?? 'Not provided' }}  
**Subject:** {{ $contactMessage->subject }}

## Message

{{ $contactMessage->message }}

---

**Submitted on:** {{ $contactMessage->created_at->format('F d, Y \a\t H:i') }}  
**IP Address:** {{ $contactMessage->ip_address ?? 'Unknown' }}

<x-mail::button :url="'mailto:' . $contactMessage->email">
Reply to {{ $contactMessage->name }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
