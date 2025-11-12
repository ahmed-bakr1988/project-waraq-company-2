<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\JobApplication;
use App\Models\NewsletterSubscription;
use App\Models\QuoteRequestSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'subject' => 'nullable|string|max:255',
                'message' => 'required|string',
            ]);

            if ($validator->fails()) {
                flash()->error(__('words.validation_error'));
                return back()->withInput()->withErrors($validator);
            }

            ContactMessage::create($validator->validated());

            $successMessage = __('words.contact_success');
            flash()->success($successMessage);
            return back();

        } catch (\Exception $e) {
            $errorMessage = __('words.contact_error');
            flash()->error($errorMessage);
            return back()->withInput();
        }
    }

    public function storeQuote(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'company' => 'nullable|string|max:255',
                'product_interest' => 'nullable|string|max:255',
                'quantity' => 'nullable|integer|min:1',
                'message' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                flash()->error(__('words.validation_error'));
                return back()->withInput()->withErrors($validator);
            }

            QuoteRequestSubmission::create($validator->validated());

            $successMessage = __('words.quote_success');
            flash()->success($successMessage);
            return back();

        } catch (\Exception $e) {
            $errorMessage = __('words.quote_error');
            flash()->error($errorMessage);
            return back()->withInput();
        }
    }

    public function newsletter(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:255',
            ]);

            if ($validator->fails()) {
                flash()->error(__('words.validation_error'));
                return back()->withInput()->withErrors($validator);
            }

            $email = $validator->validated()['email'];
            $existing = NewsletterSubscription::where('email', $email)->first();

            if ($existing) {
                if ($existing->is_active) {
                    $message = __('words.newsletter_already_subscribed');
                    flash()->info($message);
                    return back();
                } else {
                    $existing->update(['is_active' => true]);
                    $successMessage = __('words.newsletter_reactivated');
                    flash()->success($successMessage);
                    return back();
                }
            }

            NewsletterSubscription::create([
                'email' => $email,
                'is_active' => true,
            ]);

            $successMessage = __('words.newsletter_success');
            flash()->success($successMessage);
            return back();

        } catch (\Exception $e) {
            $errorMessage = __('words.newsletter_error');
            flash()->error($errorMessage);
            return back()->withInput();
        }
    }

    public function applyJob(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'career_id' => 'required|exists:careers,id',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'cover_letter' => 'nullable|string',
                'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            ]);

            if ($validator->fails()) {
                flash()->error(__('words.validation_error'));
                return back()->withInput()->withErrors($validator);
            }

            $data = $validator->validated();

            if ($request->hasFile('resume')) {
                $resume = $request->file('resume');
                $resumePath = $resume->store('resumes', 'public');
                $data['resume_path'] = $resumePath;
            }

            JobApplication::create($data);

            $successMessage = __('words.job_application_success');
            flash()->success($successMessage);
            return back();

        } catch (\Exception $e) {
            $errorMessage = __('words.job_application_error');
            flash()->error($errorMessage);
            return back()->withInput();
        }
    }
}
