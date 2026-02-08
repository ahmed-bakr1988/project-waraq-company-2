<?php

namespace App\Filament\Resources\QuoteRequestSubmissions\Schemas;

use App\Models\Product;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class QuoteRequestSubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('company')
                    ->required(),
                Select::make('product_id')
                    ->label('Product')
                    ->options(fn (): array => Product::query()
                        ->with('translation')
                        ->orderBy('order')
                        ->get(['id'])
                        ->mapWithKeys(fn (Product $product): array => [
                            $product->id => $product->name ?: ('#'.$product->id),
                        ])
                        ->all())
                    ->searchable()
                    ->preload()
                    ->default(null),
                TextInput::make('product_type')
                    ->default(null),
                TextInput::make('quantity')
                    ->numeric()
                    ->default(null),
                TextInput::make('project_type')
                    ->required(),
                TextInput::make('budget_range')
                    ->default(null),
                TextInput::make('timeline')
                    ->default(null),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('requirements')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('message')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'quoted' => 'Quoted',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected',
                    ])
                    ->default('new')
                    ->required(),
                Toggle::make('is_read')
                    ->default(false),
                TextInput::make('ip_address')
                    ->disabled()
                    ->default(null),
            ]);
    }
}
