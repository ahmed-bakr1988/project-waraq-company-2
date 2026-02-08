<?php

namespace App\Filament\Resources\JobApplications\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class JobApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('career_id')
                    ->relationship('career', 'title')
                    ->searchable()
                    ->preload()
                    ->default(null),
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('cv_path')
                    ->required(),
                Textarea::make('cover_letter')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('linkedin_url')
                    ->url()
                    ->default(null),
                TextInput::make('years_experience')
                    ->numeric()
                    ->default(null),
                Select::make('status')
                    ->options([
                        'new' => 'New',
                        'reviewed' => 'Reviewed',
                        'shortlisted' => 'Shortlisted',
                        'rejected' => 'Rejected',
                    ])
                    ->default('new')
                    ->required(),
                Toggle::make('is_read')
                    ->default(false),
                TextInput::make('ip_address')
                    ->disabled()
                    ->default(null),
            ]);
    }
}
