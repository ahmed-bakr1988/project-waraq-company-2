<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\QuoteRequest;
use App\Models\ContactMessage;
use App\Models\QuoteRequestSubmission;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Store contact form submission
     */
    public function store(ContactRequest $request)
    {
        try {
            // Save to database
            ContactMessage::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'status' => 'new',
            ]);

            // Log the contact attempt
            Log::info('Contact form submitted', [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'ip' => $request->ip(),
            ]);

            $locale = app()->getLocale();
            $successMessage = $locale === 'ar' 
                ? 'تم إرسال رسالتك بنجاح. سنتواصل معك قريباً.'
                : 'Your message has been sent successfully. We will contact you soon.';

            return back()->with('success', $successMessage);

        } catch (\Exception $e) {
            Log::error('Contact form error: '.$e->getMessage());

            $locale = app()->getLocale();
            $errorMessage = $locale === 'ar'
                ? 'حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى.'
                : 'An error occurred while sending the message. Please try again.';

            return back()->withInput()->with('error', $errorMessage);
        }
    }

    /**
     * Store quote request submission
     */
    public function storeQuote(QuoteRequest $request)
    {
        try {
            // Save to database
            QuoteRequestSubmission::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company' => $request->company,
                'project_type' => $request->project_type,
                'budget_range' => $request->budget_range,
                'timeline' => $request->timeline,
                'description' => $request->description,
                'requirements' => $request->requirements,
                'ip_address' => $request->ip(),
                'status' => 'new',
            ]);

            // Log the quote request
            Log::info('Quote request submitted', [
                'name' => $request->name,
                'email' => $request->email,
                'company' => $request->company,
                'project_type' => $request->project_type,
                'ip' => $request->ip(),
            ]);

            $locale = app()->getLocale();
            $successMessage = $locale === 'ar'
                ? 'تم إرسال طلب العرض بنجاح. سنتواصل معك خلال 24 ساعة.'
                : 'Your quote request has been submitted successfully. We will contact you within 24 hours.';

            return back()->with('success', $successMessage);

        } catch (\Exception $e) {
            Log::error('Quote request error: '.$e->getMessage());

            $locale = app()->getLocale();
            $errorMessage = $locale === 'ar'
                ? 'حدث خطأ أثناء إرسال الطلب. يرجى المحاولة مرة أخرى.'
                : 'An error occurred while submitting the request. Please try again.';

            return back()->withInput()->with('error', $errorMessage);
        }
    }

    /**
     * Store newsletter subscription
     */
    public function newsletter(Request $request)
    {
        $locale = app()->getLocale();
        
        $request->validate([
            'email' => 'required|email|max:255',
        ], [
            'email.required' => $locale === 'ar' ? 'البريد الإلكتروني مطلوب' : 'Email is required',
            'email.email' => $locale === 'ar' ? 'البريد الإلكتروني غير صحيح' : 'Email is invalid',
        ]);

        try {
            // Check if already subscribed
            $existing = NewsletterSubscription::where('email', $request->email)->first();
            
            if ($existing) {
                if ($existing->status === 'active') {
                    $message = $locale === 'ar'
                        ? 'أنت مشترك بالفعل في النشرة الإخبارية.'
                        : 'You are already subscribed to our newsletter.';
                    return back()->with('info', $message);
                } else {
                    // Resubscribe
                    $existing->update([
                        'status' => 'active',
                        'subscribed_at' => now(),
                        'unsubscribed_at' => null,
                    ]);
                }
            } else {
                // Create new subscription
                NewsletterSubscription::create([
                    'email' => $request->email,
                    'status' => 'active',
                    'subscribed_at' => now(),
                    'ip_address' => $request->ip(),
                ]);
            }

            // Log newsletter subscription
            Log::info('Newsletter subscription', [
                'email' => $request->email,
                'ip' => $request->ip(),
            ]);

            $successMessage = $locale === 'ar'
                ? 'تم الاشتراك في النشرة الإخبارية بنجاح.'
                : 'You have successfully subscribed to our newsletter.';

            return back()->with('success', $successMessage);

        } catch (\Exception $e) {
            Log::error('Newsletter subscription error: '.$e->getMessage());

            $errorMessage = $locale === 'ar'
                ? 'حدث خطأ أثناء الاشتراك. يرجى المحاولة مرة أخرى.'
                : 'An error occurred during subscription. Please try again.';

            return back()->with('error', $errorMessage);
        }
    }
}
