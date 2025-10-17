<?php

namespace App\Filament\Resources\Careers\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CareerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Career')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('title')->required(),
                            TextInput::make('location')->required(),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('apply_email')->email()->nullable(),
                            TextInput::make('form_url')->url()->nullable(),
                        ]),
                        Toggle::make('is_active')->default(true),
                        DateTimePicker::make('published_at')->nullable(),
                        Textarea::make('description')->rows(8)->required(),
                    ]),
            ]);
    }
}
