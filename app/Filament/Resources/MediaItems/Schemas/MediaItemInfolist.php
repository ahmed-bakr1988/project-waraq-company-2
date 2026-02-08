<?php

namespace App\Filament\Resources\MediaItems\Schemas;

use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MediaItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Media')
                    ->schema([
                        TextEntry::make('title'),
                        TextEntry::make('locale'),
                        TextEntry::make('type'),
                        TextEntry::make('url')
                            ->url(fn ($record): ?string => $record->url),
                        TextEntry::make('file'),
                        TextEntry::make('thumbnail'),
                        TextEntry::make('published_at')->dateTime(),
                    ])
                    ->columns(2),
            ]);
    }
}
