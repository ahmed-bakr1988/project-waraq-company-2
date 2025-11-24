<?php

namespace Tests\Feature;

use App\Mail\ContactFormMail;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_submission_successful(): void
    {
        Mail::fake();

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+1234567890',
            'subject' => 'Test Subject',
            'message' => 'This is a test message that is longer than 10 characters.',
        ];

        $response = $this->post(route('contact.store'), $data);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Test Subject',
        ]);

        Mail::assertQueued(ContactFormMail::class);
    }

    public function test_contact_form_validation_fails_with_empty_data(): void
    {
        $response = $this->post(route('contact.store'), []);

        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
    }

    public function test_contact_form_validation_fails_with_invalid_email(): void
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'subject' => 'Test Subject',
            'message' => 'This is a test message.',
        ];

        $response = $this->post(route('contact.store'), $data);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_contact_form_validation_fails_with_short_message(): void
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Test Subject',
            'message' => 'Short',
        ];

        $response = $this->post(route('contact.store'), $data);

        $response->assertSessionHasErrors(['message']);
    }

    public function test_contact_form_rate_limiting_works(): void
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message.',
        ];

        // Make 11 requests (rate limit is 10 per minute)
        for ($i = 0; $i < 11; $i++) {
            $response = $this->post(route('contact.store'), $data);
        }

        // The 11th request should be rate limited
        $response->assertStatus(429);
    }
}
