<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Content')
                    ->schema([
                        TextEntry::make('title'),
                        TextEntry::make('locale'),
                        TextEntry::make('slug'),
                        TextEntry::make('published_at')->dateTime(),
                        TextEntry::make('summary'),
                        TextEntry::make('body'),
                    ])
                    ->columns(2),
                Section::make('Meta')
                    ->schema([
                        KeyValueEntry::make('meta'),
                    ]),
            ]);
    }
}
