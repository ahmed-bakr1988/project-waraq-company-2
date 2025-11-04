<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product')
                    ->schema([
                        Grid::make(3)->schema([
                            Select::make('product_category_id')
                                ->relationship('productCategory', 'name')
                                ->searchable()
                                ->preload()
                                ->nullable(),
                            TextInput::make('order')
                                ->numeric()
                                ->default(0),
                            Toggle::make('is_active')->default(true),
                        ]),
                        FileUpload::make('image')
                            ->label('Image Path')
                            ->required(),
                        Grid::make(2)->schema([
                            TextInput::make('logo')->label('Logo Path')->nullable(),
                            TextInput::make('url')->label('External URL')->nullable(),
                        ]),
                        Textarea::make('summary')->rows(4)->nullable(),
                        Grid::make(2)->schema([
                            KeyValue::make('specs')->keyLabel('Spec')->valueLabel('Value')->columnSpan(1)->nullable(),
                            KeyValue::make('downloads')->keyLabel('Label')->valueLabel('URL')->columnSpan(1)->nullable(),
                        ]),
                    ]),
            ]);
    }
}
