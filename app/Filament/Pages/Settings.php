<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Settings extends Page
{
    protected string $view = 'filament.pages.settings'; // Specify the Blade view for this page

    public function setLocale(string $locale): void
    {
        if (! in_array($locale, ['en', 'ar'], true)) {
            return;
        }

        session()->put('filament_locale', $locale);
        app()->setLocale($locale);

        $this->redirect(static::getUrl());
    }
}
