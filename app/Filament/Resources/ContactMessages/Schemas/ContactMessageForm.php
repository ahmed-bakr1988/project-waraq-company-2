<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(100),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->tel()
                    ->maxLength(50),
                TextInput::make('subject')
                    ->required()
                    ->maxLength(200)
                    ->columnSpanFull(),
                Textarea::make('message')
                    ->required()
                    ->rows(5)
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'new' => 'New',
                        'read' => 'Read',
                        'replied' => 'Replied',
                    ])
                    ->default('new')
                    ->required(),
                Toggle::make('is_read')
                    ->label('Mark as Read')
                    ->default(false),
                DateTimePicker::make('read_at')
                    ->label('Read At'),
                TextInput::make('ip_address')
                    ->label('IP Address')
                    ->disabled(),
                Textarea::make('user_agent')
                    ->label('User Agent')
                    ->disabled()
                    ->rows(2)
                    ->columnSpanFull(),
            ]);
    }
}
