<?php

namespace App\Filament\Resources\QuoteRequestSubmissions\Pages;

use App\Filament\Resources\QuoteRequestSubmissions\QuoteRequestSubmissionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewQuoteRequestSubmission extends ViewRecord
{
    protected static string $resource = QuoteRequestSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
