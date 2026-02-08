<?php

namespace App\Filament\Resources\NewsletterSubscriptions\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class NewsletterSubscriptionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('email')
                    ->label('Email address'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('subscribed_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('unsubscribed_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('ip_address')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
