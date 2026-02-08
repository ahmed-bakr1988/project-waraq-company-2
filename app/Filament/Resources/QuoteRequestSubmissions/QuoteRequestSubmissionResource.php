<?php

namespace App\Filament\Resources\QuoteRequestSubmissions;

use App\Filament\Resources\QuoteRequestSubmissions\Pages\CreateQuoteRequestSubmission;
use App\Filament\Resources\QuoteRequestSubmissions\Pages\EditQuoteRequestSubmission;
use App\Filament\Resources\QuoteRequestSubmissions\Pages\ListQuoteRequestSubmissions;
use App\Filament\Resources\QuoteRequestSubmissions\Pages\ViewQuoteRequestSubmission;
use App\Filament\Resources\QuoteRequestSubmissions\Schemas\QuoteRequestSubmissionForm;
use App\Filament\Resources\QuoteRequestSubmissions\Schemas\QuoteRequestSubmissionInfolist;
use App\Filament\Resources\QuoteRequestSubmissions\Tables\QuoteRequestSubmissionsTable;
use App\Models\QuoteRequestSubmission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QuoteRequestSubmissionResource extends Resource
{
    protected static ?string $model = QuoteRequestSubmission::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;



    protected static ?string $navigationLabel = 'Quote Requests';

    public static function form(Schema $schema): Schema
    {
        return QuoteRequestSubmissionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return QuoteRequestSubmissionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QuoteRequestSubmissionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListQuoteRequestSubmissions::route('/'),
            'create' => CreateQuoteRequestSubmission::route('/create'),
            'view' => ViewQuoteRequestSubmission::route('/{record}'),
            'edit' => EditQuoteRequestSubmission::route('/{record}/edit'),
        ];
    }
}
