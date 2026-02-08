<?php

namespace App\Filament\Resources\NewsPosts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
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

class NewsPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Post')
                    ->schema([
                        Grid::make(3)->schema([
                            Select::make('locale')->options(['en' => 'English', 'ar' => 'العربية'])->default('en')->required(),
                            TextInput::make('title')->required()->maxLength(255)->columnSpan(2),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('slug')
                                ->required()
                                ->maxLength(255)
                                ->rules([
                                    fn (Get $get, ?Model $record) => Rule::unique('news_posts', 'slug')
                                        ->where('locale', $get('locale') ?? 'en')
                                        ->ignore($record),
                                ]),
                            Toggle::make('is_published')->default(false),
                        ]),
                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->disk('public')
                            ->directory('news-posts')
                            ->nullable(),
                        Textarea::make('excerpt')->rows(3)->nullable(),
                        Textarea::make('body')->rows(10)->required(),
                        DateTimePicker::make('published_at')->nullable(),
                    ]),
            ]);
    }
}
