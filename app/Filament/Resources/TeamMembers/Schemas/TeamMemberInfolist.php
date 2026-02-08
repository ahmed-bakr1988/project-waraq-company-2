<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TeamMemberInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profile')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('position'),
                        TextEntry::make('locale'),
                        IconEntry::make('is_active')->boolean(),
                        ImageEntry::make('image')->disk('public'),
                        TextEntry::make('specialty'),
                    ])
                    ->columns(2),
                Section::make('Details')
                    ->schema([
                        TextEntry::make('email'),
                        TextEntry::make('phone'),
                        TextEntry::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url(fn ($record): ?string => $record->linkedin_url),
                        TextEntry::make('qualifications'),
                        TextEntry::make('bio'),
                        TextEntry::make('display_order'),
                    ])
                    ->columns(2),
            ]);
    }
}
