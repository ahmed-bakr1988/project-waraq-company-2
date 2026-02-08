<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product')
                    ->schema([
                        TextEntry::make('productCategory.name')->label('Category'),
                        TextEntry::make('order'),
                        IconEntry::make('is_active')->boolean(),
                        IconEntry::make('is_featured')->boolean(),
                        ImageEntry::make('image')->disk('public'),
                        TextEntry::make('url')->url(fn ($record): ?string => $record->url),
                    ])
                    ->columns(2),
                Section::make('Translations')
                    ->schema([
                        RepeatableEntry::make('translations')
                            ->schema([
                                TextEntry::make('locale'),
                                TextEntry::make('name'),
                                TextEntry::make('slug'),
                                TextEntry::make('short_description'),
                                TextEntry::make('description'),
                            ])
                            ->columns(2),
                    ]),
            ]);
    }
}
