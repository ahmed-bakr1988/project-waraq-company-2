<?php

namespace App\Filament\Resources\MediaItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MediaItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('locale')
                    ->label('Locale')
                    ->searchable(),
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Type')
                    ->searchable(),
                TextColumn::make('url')
                    ->label('URL')
                    ->searchable(),
                TextColumn::make('file')
                    ->label('File')
                    ->searchable(),
                TextColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->searchable(),
                TextColumn::make('published_at')
                    ->label('Published At')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
