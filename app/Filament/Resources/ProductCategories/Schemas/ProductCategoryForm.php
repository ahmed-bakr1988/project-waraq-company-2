<?php

namespace App\Filament\Resources\ProductCategories\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')->required()->maxLength(255),
                            TextInput::make('slug')->required()->unique(ignoreRecord: true)->maxLength(255),
                        ]),
                        Textarea::make('description')->rows(4)->nullable(),
                        Grid::make(2)->schema([
                            TextInput::make('order')->numeric()->default(0),
                            Toggle::make('is_active')->default(true),
                        ]),
                    ]),
            ]);
    }
}
