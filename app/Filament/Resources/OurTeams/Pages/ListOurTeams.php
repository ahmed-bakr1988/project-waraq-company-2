<?php

namespace App\Filament\Resources\OurTeams\Pages;

use App\Filament\Resources\OurTeams\OurTeamResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOurTeams extends ListRecords
{
    protected static string $resource = OurTeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
