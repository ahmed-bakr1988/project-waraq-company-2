<?php

namespace App\Filament\Resources\NewsletterSubscriptions\Pages;

use App\Filament\Resources\NewsletterSubscriptions\NewsletterSubscriptionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewNewsletterSubscription extends ViewRecord
{
    protected static string $resource = NewsletterSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
