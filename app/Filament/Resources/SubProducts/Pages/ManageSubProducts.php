<?php

namespace App\Filament\Resources\SubProducts\Pages;

use App\Filament\Resources\SubProducts\SubProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageSubProducts extends ManageRecords
{
    protected static string $resource = SubProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
