<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Member')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('locale')
                                ->options([
                                    'en' => 'English',
                                    'ar' => 'العربية',
                                ])
                                ->default('en')
                                ->required(),
                            TextInput::make('name')->required()->maxLength(255),
                            TextInput::make('slug')
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(255),
                            TextInput::make('position')->required()->maxLength(255),
                            TextInput::make('specialty')->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            FileUpload::make('image')
                                ->image()
                                ->disk('public')
                                ->directory('team-members')
                                ->nullable(),
                            TextInput::make('order')->numeric()->default(0),
                            TextInput::make('display_order')->numeric()->default(0),
                            Toggle::make('is_active')->default(true),
                            TextInput::make('email')->email()->maxLength(255),
                            TextInput::make('phone')->tel()->maxLength(255),
                        ]),
                        Textarea::make('qualifications')->rows(3)->nullable(),
                        Textarea::make('bio')->rows(6)->nullable(),
                        TextInput::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url()
                            ->maxLength(255)
                            ->nullable(),
                    ]),
            ]);
    }
}
