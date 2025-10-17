<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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
                        Grid::make(3)->schema([
                            Select::make('locale')->options(['en' => 'English', 'ar' => 'العربية'])->nullable(),
                            TextInput::make('name')->required()->maxLength(255),
                            TextInput::make('role')->required()->maxLength(255),
                        ]),
                        Grid::make(3)->schema([
                            TextInput::make('photo')->label('Photo Path')->nullable(),
                            TextInput::make('order')->numeric()->default(0),
                            TextInput::make('id')->disabled()->dehydrated(false),
                        ]),
                        Textarea::make('bio')->rows(6)->nullable(),
                    ]),
            ]);
    }
}
