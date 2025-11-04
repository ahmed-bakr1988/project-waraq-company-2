<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FilamentSmokeTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_page_loads(): void
    {
        $this->get('/admin/login')->assertStatus(200);
    }
}
