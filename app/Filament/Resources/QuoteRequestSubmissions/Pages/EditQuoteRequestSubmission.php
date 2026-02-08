<?php

namespace App\Filament\Resources\QuoteRequestSubmissions\Pages;

use App\Filament\Resources\QuoteRequestSubmissions\QuoteRequestSubmissionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditQuoteRequestSubmission extends EditRecord
{
    protected static string $resource = QuoteRequestSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
