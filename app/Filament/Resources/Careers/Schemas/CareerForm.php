<?php

namespace App\Filament\Resources\Careers\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CareerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('location')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('requirements')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('type')
                    ->default(null),
                TextInput::make('apply_email')
                    ->email()
                    ->default(null),
                TextInput::make('form_url')
                    ->url()
                    ->default(null),
                Toggle::make('is_active')
                    ->default(true),
                DateTimePicker::make('posted_at'),
                DateTimePicker::make('expires_at'),
            ]);
    }
}
