<?php

namespace App\Filament\Resources\QuoteRequestSubmissions\Pages;

use App\Filament\Resources\QuoteRequestSubmissions\QuoteRequestSubmissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQuoteRequestSubmissions extends ListRecords
{
    protected static string $resource = QuoteRequestSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
