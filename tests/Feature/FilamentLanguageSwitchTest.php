<?php

namespace Tests\Feature;

use App\Filament\Pages\Settings;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class FilamentLanguageSwitchTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_switch_language_from_settings_page(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        Filament::setCurrentPanel('admin');

        Livewire::test(Settings::class)
            ->call('setLocale', 'ar')
            ->assertRedirect(Settings::getUrl());

        $this->assertSame('ar', session('filament_locale'));
    }
}
