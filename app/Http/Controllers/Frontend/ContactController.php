<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\JobApplicationRequest;
use App\Http\Requests\NewsletterRequest;
use App\Http\Requests\QuoteRequest;
use App\Mail\ContactFormMail;
use App\Mail\JobApplicationMail;
use App\Mail\NewsletterWelcomeMail;
use App\Mail\QuoteRequestMail;
use App\Models\ContactMessage;
use App\Models\JobApplication;
use App\Models\NewsletterSubscription;
use App\Models\QuoteRequestSubmission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Store a contact form submission.
     */
    public function store(ContactRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            $data['ip_address'] = $request->ip();
            $data['user_agent'] = $request->userAgent();
            $data['is_read'] = false;

            $contactMessage = ContactMessage::create($data);

            // Queue email
            $adminEmail = config('mail.from.address');
            Mail::to($adminEmail)->queue(new ContactFormMail($contactMessage));

            flash()->success(__('words.contact_success'));
            return back();

        } catch (\Exception $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
            flash()->error(__('words.contact_error'));
            return back()->withInput();
        }
    }

    /**
     * Store a quote request submission.
     */
    public function storeQuote(QuoteRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            $data['ip_address'] = $request->ip();
            $data['is_read'] = false;

            $quoteRequest = QuoteRequestSubmission::create($data);

            // Queue email
            $adminEmail = config('mail.from.address');
            Mail::to($adminEmail)->queue(new QuoteRequestMail($quoteRequest));

            flash()->success(__('words.quote_success'));
            return back();

        } catch (\Exception $e) {
            \Log::error('Quote request error: ' . $e->getMessage());
            flash()->error(__('words.quote_error'));
            return back()->withInput();
        }
    }

    /**
     * Handle newsletter subscription.
     */
    public function newsletter(NewsletterRequest $request): JsonResponse|RedirectResponse
    {
        try {
            $email = $request->validated()['email'];
            $existing = NewsletterSubscription::where('email', $email)->first();

            if ($existing) {
                if ($existing->is_active || $existing->status === 'active') {
                    $message = __('words.newsletter_already_subscribed');
                    
                    if ($request->ajax() || $request->wantsJson()) {
                        return response()->json([
                            'success' => true,
                            'message' => $message,
                            'type' => 'info'
                        ]);
                    }
                    
                    flash()->info($message);
                    return back();
                } else {
                    // Reactivate subscription
                    $existing->update([
                        'is_active' => true,
                        'status' => 'active',
                        'subscribed_at' => now(),
                        'unsubscribed_at' => null,
                    ]);
                    
                    $successMessage = __('words.newsletter_reactivated');
                    
                    if ($request->ajax() || $request->wantsJson()) {
                        return response()->json([
                            'success' => true,
                            'message' => $successMessage,
                            'type' => 'success'
                        ]);
                    }
                    
                    flash()->success($successMessage);
                    return back();
                }
            }

            // Create new subscription
            $subscription = NewsletterSubscription::create([
                'email' => $email,
                'is_active' => true,
                'status' => 'active',
                'subscribed_at' => now(),
                'ip_address' => $request->ip(),
            ]);

            // Queue welcome email
            Mail::to($email)->queue(new NewsletterWelcomeMail($subscription));

            $successMessage = __('words.newsletter_success');
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $successMessage,
                    'type' => 'success'
                ]);
            }
            
            flash()->success($successMessage);
            return back();

        } catch (\Exception $e) {
            \Log::error('Newsletter subscription error: ' . $e->getMessage());
            $errorMessage = __('words.newsletter_error');
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage
                ], 500);
            }
            
            flash()->error($errorMessage);
            return back()->withInput();
        }
    }

    /**
     * Handle job application submission.
     */
    public function applyJob(JobApplicationRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            $data['ip_address'] = $request->ip();
            $data['is_read'] = false;

            // Handle CV upload
            if ($request->hasFile('cv')) {
                $cv = $request->file('cv');
                $filename = time() . '_' . $cv->getClientOriginalName();
                $cvPath = $cv->storeAs('cvs', $filename, 'private');
                $data['cv_path'] = $cvPath;
                // Also save to resume_path for backward compatibility
                $data['resume_path'] = $cvPath;
            }

            $jobApplication = JobApplication::create($data);

            // Queue email
            $adminEmail = config('mail.from.address');
            Mail::to($adminEmail)->queue(new JobApplicationMail($jobApplication));

            flash()->success(__('words.job_application_success'));
            return back();

        } catch (\Exception $e) {
            \Log::error('Job application error: ' . $e->getMessage());
            flash()->error(__('words.job_application_error'));
            return back()->withInput();
        }
    }
}
