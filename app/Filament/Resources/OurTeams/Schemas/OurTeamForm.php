<?php

namespace App\Filament\Resources\OurTeams\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OurTeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Legacy Team Member')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')->required()->maxLength(255),
                            TextInput::make('slug')->required()->unique(ignoreRecord: true)->maxLength(255),
                            TextInput::make('position')->required()->maxLength(255),
                            TextInput::make('specialty')->nullable()->maxLength(255),
                            TextInput::make('email')->email()->nullable()->maxLength(255),
                            TextInput::make('phone')->tel()->nullable()->maxLength(255),
                            Toggle::make('is_active')->default(true),
                            TextInput::make('display_order')->numeric()->default(0),
                        ]),
                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('our-team')
                            ->nullable(),
                        Textarea::make('qualifications')->rows(4)->nullable(),
                        Textarea::make('bio')->rows(6)->nullable(),
                        TextInput::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url()
                            ->nullable(),
                    ]),
            ]);
    }
}
