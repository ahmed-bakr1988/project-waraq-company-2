<?php

namespace Tests\Feature;

use App\Mail\NewsletterWelcomeMail;
use App\Models\NewsletterSubscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class NewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_newsletter_subscription_successful(): void
    {
        Mail::fake();

        $response = $this->postJson(route('newsletter.store'), [
            'email' => 'test@example.com',
        ]);

        $response->assertJson([
            'success' => true,
            'type' => 'success',
        ]);

        $this->assertDatabaseHas('newsletter_subscriptions', [
            'email' => 'test@example.com',
            'is_active' => true,
            'status' => 'active',
        ]);

        Mail::assertQueued(NewsletterWelcomeMail::class);
    }

    public function test_newsletter_subscription_already_exists(): void
    {
        NewsletterSubscription::create([
            'email' => 'test@example.com',
            'is_active' => true,
            'status' => 'active',
            'subscribed_at' => now(),
        ]);

        $response = $this->postJson(route('newsletter.store'), [
            'email' => 'test@example.com',
        ]);

        $response->assertJson([
            'success' => true,
            'type' => 'info',
        ]);
    }

    public function test_newsletter_reactivation_works(): void
    {
        NewsletterSubscription::create([
            'email' => 'test@example.com',
            'is_active' => false,
            'status' => 'unsubscribed',
            'subscribed_at' => now()->subMonth(),
            'unsubscribed_at' => now()->subDay(),
        ]);

        $response = $this->postJson(route('newsletter.store'), [
            'email' => 'test@example.com',
        ]);

        $response->assertJson([
            'success' => true,
            'type' => 'success',
        ]);

        $this->assertDatabaseHas('newsletter_subscriptions', [
            'email' => 'test@example.com',
            'is_active' => true,
            'status' => 'active',
        ]);
    }

    public function test_newsletter_validation_fails_with_invalid_email(): void
    {
        $response = $this->postJson(route('newsletter.store'), [
            'email' => 'invalid-email',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
    }

    public function test_newsletter_validation_fails_with_empty_email(): void
    {
        $response = $this->postJson(route('newsletter.store'), []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
    }
}
