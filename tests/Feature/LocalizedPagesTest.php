<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocalizedPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_localized_news_pages_return_200(): void
    {
        $this->followingRedirects()->get('/news')->assertStatus(200);
    }
}
