<?php

namespace App\Filament\Resources\Careers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CareersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('is_active')
                    ->badge('Active')
                    ->color('success')
                    ->label('Active')
                    ->searchable(),
                TextColumn::make('published_at')
                    ->date(),
                TextColumn::make('created_at')
                    ->date(),
                TextColumn::make('updated_at')
                    ->date(),
            ])
            ->filters([
                Filter::make('is_active')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
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
