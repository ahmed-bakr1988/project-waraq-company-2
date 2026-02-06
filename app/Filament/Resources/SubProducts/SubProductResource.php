<?php

namespace App\Filament\Resources\SubProducts;

use App\Filament\Resources\SubProducts\Pages\ManageSubProducts;
use App\Models\Product;
use App\Models\SubProduct;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SubProductResource extends Resource
{
    protected static ?string $model = SubProduct::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getNavigationLabel(): string
    {
        return __('filament.sub_products.navigation');
    }

    public static function getModelLabel(): string
    {
        return __('filament.sub_products.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.sub_products.plural');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('filament.sub_products.sections.main'))
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('product_category_id')
                                ->label(__('filament.fields.product_category'))
                                ->relationship(
                                    name: 'productCategory',
                                    titleAttribute: 'id',
                                    modifyQueryUsing: fn ($query) => $query->with('translation'),
                                )
                                ->getOptionLabelFromRecordUsing(fn ($record): string => (string) $record->name)
                                ->searchable()
                                ->preload()
                                ->required()
                                ->afterStateUpdated(fn ($state, callable $set) => $set('product_id', null)),

                            Select::make('product_id')
                                ->label(__('filament.fields.product'))
                                ->options(function (Get $get): array {
                                    $categoryId = $get('product_category_id');

                                    if (! $categoryId) {
                                        return [];
                                    }

                                    return Product::query()
                                        ->where('product_category_id', $categoryId)
                                        ->with('translation')
                                        ->orderBy('order')
                                        ->get(['id', 'product_category_id'])
                                        ->mapWithKeys(fn (Product $product): array => [$product->id => $product->name])
                                        ->all();
                                })
                                ->searchable()
                                ->preload()
                                ->required()
                                ->disabled(fn (Get $get): bool => blank($get('product_category_id'))),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('size')
                                ->label(__('filament.fields.size'))
                                ->required()
                                ->maxLength(255),
                            TextInput::make('order')
                                ->label(__('filament.fields.order'))
                                ->numeric()
                                ->default(0)
                                ->required(),
                        ]),
                        Grid::make(2)->schema([
                            Toggle::make('is_active')
                                ->label(__('filament.fields.is_active'))
                                ->default(true),
                            FileUpload::make('image')
                                ->label(__('filament.fields.image'))
                                ->image()
                                ->directory('sub-products')
                                ->nullable(),
                        ]),
                    ]),

                Section::make(__('filament.sub_products.sections.translations'))
                    ->schema([
                        Repeater::make('translations')
                            ->label(__('filament.fields.translations'))
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
                                        ->label(__('filament.fields.locale'))
                                        ->options([
                                            'en' => __('filament.locales.en'),
                                            'ar' => __('filament.locales.ar'),
                                        ])
                                        ->required()
                                        ->disableOptionsWhenSelectedInSiblingRepeaterItems(),
                                    TextInput::make('name')
                                        ->label(__('filament.fields.name'))
                                        ->required()
                                        ->maxLength(255)
                                        ->columnSpan(2),
                                ]),
                                Textarea::make('description')
                                    ->label(__('filament.fields.description'))
                                    ->rows(6)
                                    ->nullable(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('productCategory.translation.name')
                    ->label(__('filament.fields.product_category'))
                    ->toggleable(),
                TextColumn::make('product.translation.name')
                    ->label(__('filament.fields.product'))
                    ->toggleable(),
                TextColumn::make('translation.name')
                    ->label(__('filament.fields.name'))
                    ->searchable(),
                TextColumn::make('size')
                    ->label(__('filament.fields.size'))
                    ->searchable(),
                TextColumn::make('order')
                    ->label(__('filament.fields.order'))
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label(__('filament.fields.is_active'))
                    ->boolean(),
                ImageColumn::make('image')
                    ->label(__('filament.fields.image')),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageSubProducts::route('/'),
        ];
    }
}
