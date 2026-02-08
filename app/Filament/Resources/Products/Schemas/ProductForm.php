<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
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

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product')
                    ->schema([
                        Grid::make(4)->schema([
                            Select::make('product_category_id')
                                ->relationship(
                                    name: 'productCategory',
                                    titleAttribute: 'id',
                                    modifyQueryUsing: fn ($query) => $query->with('translation'),
                                )
                                ->getOptionLabelFromRecordUsing(fn ($record): string => (string) $record->name)
                                ->searchable()
                                ->preload()
                                ->nullable(),
                            TextInput::make('order')
                                ->numeric()
                                ->default(0),
                            Toggle::make('is_active')->default(true),
                            Toggle::make('is_featured')->default(false),
                        ]),
                        FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->imageEditorViewportWidth('520')
                            ->imageEditorViewportHeight('622')
                            ->disk('public')
                            ->directory('products')
                            ->nullable(),
                        FileUpload::make('gallery')
                            ->label('Gallery')
                            ->multiple()
                            ->disk('public')
                            ->directory('products/gallery')
                            ->nullable(),
                        Grid::make(2)->schema([
                            TextInput::make('logo')->label('Logo Path')->nullable(),
                            TextInput::make('url')->label('External URL')->nullable(),
                        ]),
                        Grid::make(2)->schema([
                            KeyValue::make('specs')->keyLabel('Spec')->valueLabel('Value')->columnSpan(1)->nullable(),
                            KeyValue::make('downloads')->keyLabel('Label')->valueLabel('URL')->columnSpan(1)->nullable(),
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
                                        fn (Get $get, ?Model $record) => Rule::unique('product_translations', 'slug')
                                            ->where('locale', $get('locale'))
                                            ->ignore($record),
                                    ]),
                                Textarea::make('short_description')->rows(3)->nullable(),
                                Textarea::make('description')->rows(6)->nullable(),
                                KeyValue::make('features')->keyLabel('Feature')->valueLabel('Value')->nullable(),
                                Grid::make(2)->schema([
                                    TextInput::make('meta_title')->nullable()->maxLength(255),
                                    Textarea::make('meta_description')->rows(3)->nullable(),
                                ]),
                            ]),
                    ]),
            ]);
    }
}
