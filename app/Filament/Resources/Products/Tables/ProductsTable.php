<?php

namespace App\Filament\Resources\Products\Tables;

use App\Models\ProductCategory;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('translation.name')->label('Name'),
                TextColumn::make('translation.slug')->label('Slug'),
                TextColumn::make('productCategory.translation.name')->label('Category'),
                ImageColumn::make('image')
                    ->imageHeight(40)
                    ->square(true)
                    ->label('Image'),
                TextColumn::make('order')->sortable(),
                IconColumn::make('is_active')->boolean(),
                IconColumn::make('is_featured')->boolean(),
                TextColumn::make('updated_at')->dateTime()->label('Updated'),
            ])
            ->filters([
                SelectFilter::make('product_category_id')
                    ->options(fn (): array => ProductCategory::query()
                        ->with('translation')
                        ->orderBy('order')
                        ->get(['id'])
                        ->mapWithKeys(fn (ProductCategory $category): array => [
                            $category->id => $category->name,
                        ])
                        ->all())
                    ->label('Category'),
                TernaryFilter::make('is_active')
                    ->label('Active')
                    ->placeholder('All')
                    ->trueLabel('Active')
                    ->falseLabel('Inactive'),
                TernaryFilter::make('is_featured')
                    ->label('Featured')
                    ->placeholder('All')
                    ->trueLabel('Featured')
                    ->falseLabel('Not featured'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order');
    }
}
