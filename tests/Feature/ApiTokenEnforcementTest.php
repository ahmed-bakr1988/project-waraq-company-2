<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTokenEnforcementTest extends TestCase
{
    use RefreshDatabase;

    public function test_requires_token_when_configured(): void
    {
        config(['app.api_token' => 'secret-token']);

        $payload = [
            'source' => 'test',
            'dataset' => 'demo',
            'keys' => ['id'],
            'records' => [['id' => 1]],
        ];

        $this->postJson('/api/v1/datasets/upsert', $payload)
            ->assertStatus(401);

        $this->postJson('/api/v1/datasets/upsert', $payload, ['X-API-Token' => 'secret-token'])
            ->assertStatus(200)
            ->assertJson(['ok' => true]);
    }
}
