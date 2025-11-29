<x-mail::message>
# New Quote Request

You have received a new quote request from a potential customer.

## Company Information

**Company Name:** {{ $quoteRequest->company }}  
**Contact Person:** {{ $quoteRequest->name }}  
**Email:** {{ $quoteRequest->email }}  
**Phone:** {{ $quoteRequest->phone }}

## Request Details

@if($quoteRequest->product)
**Product:** {{ $quoteRequest->product->name ?? 'N/A' }}  
@endif
@if($quoteRequest->product_type)
**Product Type:** {{ $quoteRequest->product_type }}  
@endif
@if($quoteRequest->quantity)
**Quantity:** {{ $quoteRequest->quantity }}  
@endif
@if($quoteRequest->project_type)
**Project Type:** {{ $quoteRequest->project_type }}  
@endif
@if($quoteRequest->budget_range)
**Budget Range:** {{ $quoteRequest->budget_range }}  
@endif
@if($quoteRequest->timeline)
**Timeline:** {{ $quoteRequest->timeline }}  
@endif

## Project Description

{{ $quoteRequest->description }}

@if($quoteRequest->message)
## Additional Message

{{ $quoteRequest->message }}
@endif

@if($quoteRequest->requirements)
## Requirements

{{ $quoteRequest->requirements }}
@endif

---

**Submitted on:** {{ $quoteRequest->created_at->format('F d, Y \a\t H:i') }}  
**IP Address:** {{ $quoteRequest->ip_address ?? 'Unknown' }}

<x-mail::button :url="'mailto:' . $quoteRequest->email">
Reply to {{ $quoteRequest->name }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
