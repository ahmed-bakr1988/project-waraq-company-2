<?php

namespace App\Filament\Resources\NewsletterSubscriptions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class NewsletterSubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                Toggle::make('is_active')
                    ->default(true),
                Select::make('status')
                    ->options(['active' => 'Active', 'unsubscribed' => 'Unsubscribed'])
                    ->default('active')
                    ->required(),
                DateTimePicker::make('subscribed_at'),
                DateTimePicker::make('unsubscribed_at'),
                TextInput::make('ip_address')
                    ->disabled()
                    ->default(null),
            ]);
    }
}
