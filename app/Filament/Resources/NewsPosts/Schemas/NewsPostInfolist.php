<?php

namespace App\Filament\Resources\NewsPosts\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class NewsPostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Post')
                    ->schema([
                        TextEntry::make('title'),
                        TextEntry::make('locale'),
                        TextEntry::make('slug'),
                        IconEntry::make('is_published')->boolean(),
                        ImageEntry::make('image')->disk('public'),
                        TextEntry::make('published_at')->dateTime(),
                        TextEntry::make('excerpt'),
                        TextEntry::make('body'),
                    ])
                    ->columns(2),
            ]);
    }
}
