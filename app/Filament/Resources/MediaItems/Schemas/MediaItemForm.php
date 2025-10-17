<?php

namespace App\Filament\Resources\MediaItems\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MediaItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Media')
                    ->schema([
                        Grid::make(3)->schema([
                            Select::make('locale')->options(['en' => 'English', 'ar' => 'العربية'])->nullable(),
                            TextInput::make('title')->required(),
                            Select::make('type')->options([
                                'image' => 'Image',
                                'video' => 'Video',
                                'pdf' => 'PDF',
                                'link' => 'Link',
                            ])->required(),
                        ]),
                        Grid::make(3)->schema([
                            TextInput::make('url')->nullable(),
                            TextInput::make('file')->nullable(),
                            TextInput::make('thumbnail')->nullable(),
                        ]),
                        DateTimePicker::make('published_at')->nullable(),
                    ]),
            ]);
    }
}
