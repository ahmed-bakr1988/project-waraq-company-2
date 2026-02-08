<?php

namespace App\Filament\Resources\ProductCategories\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductCategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category')
                    ->schema([
                        ImageEntry::make('image')->disk('public'),
                        TextEntry::make('icon'),
                        TextEntry::make('order'),
                        IconEntry::make('is_active')->boolean(),
                    ])
                    ->columns(2),
                Section::make('Translations')
                    ->schema([
                        RepeatableEntry::make('translations')
                            ->schema([
                                TextEntry::make('locale'),
                                TextEntry::make('name'),
                                TextEntry::make('slug'),
                                TextEntry::make('description'),
                            ])
                            ->columns(2),
                    ]),
            ]);
    }
}
