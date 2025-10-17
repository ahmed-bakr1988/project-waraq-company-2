<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\QuoteRequest;
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
            // Log the contact attempt
            Log::info('Contact form submitted', [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'ip' => $request->ip(),
            ]);

            // Here you would typically send an email or store in database
            // For now, we'll just return success

            return back()->with('success', 'تم إرسال رسالتك بنجاح. سنتواصل معك قريباً.');

        } catch (\Exception $e) {
            Log::error('Contact form error: '.$e->getMessage());

            return back()->with('error', 'حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى.');
        }
    }

    /**
     * Store quote request submission
     */
    public function storeQuote(QuoteRequest $request)
    {
        try {
            // Log the quote request
            Log::info('Quote request submitted', [
                'name' => $request->name,
                'email' => $request->email,
                'company' => $request->company,
                'project_type' => $request->project_type,
                'ip' => $request->ip(),
            ]);

            // Here you would typically send an email or store in database
            // For now, we'll just return success

            return back()->with('success', 'تم إرسال طلب العرض بنجاح. سنتواصل معك خلال 24 ساعة.');

        } catch (\Exception $e) {
            Log::error('Quote request error: '.$e->getMessage());

            return back()->with('error', 'حدث خطأ أثناء إرسال الطلب. يرجى المحاولة مرة أخرى.');
        }
    }

    /**
     * Store newsletter subscription
     */
    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ], [
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
        ]);

        try {
            // Log newsletter subscription
            Log::info('Newsletter subscription', [
                'email' => $request->email,
                'ip' => $request->ip(),
            ]);

            return back()->with('success', 'تم الاشتراك في النشرة الإخبارية بنجاح.');

        } catch (\Exception $e) {
            Log::error('Newsletter subscription error: '.$e->getMessage());

            return back()->with('error', 'حدث خطأ أثناء الاشتراك. يرجى المحاولة مرة أخرى.');
        }
    }
}
