<?php

namespace App\Filament\Resources\ProductCategories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class ProductCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category')
                    ->schema([
                        FileUpload::make('image')->nullable(),
                        TextInput::make('icon')->nullable()->maxLength(255),
                        Grid::make(2)->schema([
                            TextInput::make('order')->numeric()->default(0),
                            Toggle::make('is_active')->default(true),
                        ]),
                    ]),
                Section::make('Translations')
                    ->schema([
                        Repeater::make('translations')
                            ->relationship('translations')
                            ->default([
                                ['locale' => 'en'],
                                ['locale' => 'ar'],
                            ])
                            ->minItems(2)
                            ->maxItems(2)
                            ->schema([
                                Grid::make(3)->schema([
                                    Select::make('locale')
                                        ->options([
                                            'en' => 'English',
                                            'ar' => 'العربية',
                                        ])
                                        ->required()
                                        ->disableOptionsWhenSelectedInSiblingRepeaterItems(),
                                    TextInput::make('name')
                                        ->required()
                                        ->maxLength(255)
                                        ->columnSpan(2),
                                ]),
                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->rules([
                                        fn (Get $get, ?Model $record) => Rule::unique('product_category_translations', 'slug')
                                            ->where('locale', $get('locale'))
                                            ->ignore($record),
                                    ]),
                                Textarea::make('description')->rows(4)->nullable(),
                                Grid::make(2)->schema([
                                    TextInput::make('meta_title')->nullable()->maxLength(255),
                                    Textarea::make('meta_description')->rows(3)->nullable(),
                                ]),
                            ]),
                    ]),
            ]);
    }
}
