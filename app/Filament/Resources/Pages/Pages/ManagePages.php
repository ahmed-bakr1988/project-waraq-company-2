<?php

namespace App\Filament\Resources\Pages\Pages;

use App\Filament\Resources\Pages\PagesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePages extends ManageRecords
{
    protected static string $resource = PagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
