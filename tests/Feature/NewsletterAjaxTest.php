<?php

namespace Tests\Feature;

use App\Models\NewsletterSubscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsletterAjaxTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test newsletter subscription via Ajax with valid email.
     */
    public function test_newsletter_subscription_via_ajax_with_valid_email(): void
    {
        $response = $this->postJson(route('newsletter.store'), [
            'email' => 'test@example.com',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'type' => 'success',
            ]);

        $this->assertDatabaseHas('newsletter_subscriptions', [
            'email' => 'test@example.com',
            'status' => 'active',
        ]);
    }

    /**
     * Test newsletter subscription via Ajax with invalid email.
     */
    public function test_newsletter_subscription_via_ajax_with_invalid_email(): void
    {
        $response = $this->postJson(route('newsletter.store'), [
            'email' => 'invalid-email',
        ]);

        $response->assertStatus(422)
            ->assertJson([
                'success' => false,
            ]);
    }

    /**
     * Test newsletter subscription via Ajax with empty email.
     */
    public function test_newsletter_subscription_via_ajax_with_empty_email(): void
    {
        $response = $this->postJson(route('newsletter.store'), [
            'email' => '',
        ]);

        $response->assertStatus(422)
            ->assertJson([
                'success' => false,
            ]);
    }

    /**
     * Test newsletter subscription via Ajax with already subscribed email.
     */
    public function test_newsletter_subscription_via_ajax_with_already_subscribed_email(): void
    {
        // Create an existing active subscription
        NewsletterSubscription::create([
            'email' => 'existing@example.com',
            'status' => 'active',
            'subscribed_at' => now(),
        ]);

        $response = $this->postJson(route('newsletter.store'), [
            'email' => 'existing@example.com',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'type' => 'info',
            ]);
    }

    /**
     * Test newsletter subscription reactivation via Ajax.
     */
    public function test_newsletter_subscription_reactivation_via_ajax(): void
    {
        // Create an inactive subscription
        NewsletterSubscription::create([
            'email' => 'inactive@example.com',
            'status' => 'inactive',
            'subscribed_at' => now()->subMonth(),
        ]);

        $response = $this->postJson(route('newsletter.store'), [
            'email' => 'inactive@example.com',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'type' => 'success',
            ]);

        $this->assertDatabaseHas('newsletter_subscriptions', [
            'email' => 'inactive@example.com',
            'status' => 'active',
        ]);
    }
}
