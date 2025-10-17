<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Content')
                    ->schema([
                        Grid::make(3)->schema([
                            Select::make('locale')->options([
                                'en' => 'English',
                                'ar' => 'العربية',
                            ])->required()->default('en'),
                            TextInput::make('title')->required()->maxLength(255)->columnSpan(2),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('slug')->required()->maxLength(255),
                            DateTimePicker::make('published_at')->nullable(),
                        ]),
                        Textarea::make('summary')->rows(3)->nullable(),
                        Textarea::make('body')->rows(10)->nullable(),
                    ]),
                Section::make('Meta')->schema([
                    KeyValue::make('meta')->columnSpanFull()->nullable(),
                ]),
            ]);
    }
}
