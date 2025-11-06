<?php

namespace App\Filament\Resources\OurTeams;

use App\Filament\Resources\OurTeams\Pages\CreateOurTeam;
use App\Filament\Resources\OurTeams\Pages\EditOurTeam;
use App\Filament\Resources\OurTeams\Pages\ListOurTeams;
use App\Filament\Resources\OurTeams\Schemas\OurTeamForm;
use App\Filament\Resources\OurTeams\Tables\OurTeamsTable;
use App\Models\OurTeam;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OurTeamResource extends Resource
{
    protected static ?string $model = OurTeam::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OurTeamForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OurTeamsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOurTeams::route('/'),
            'create' => CreateOurTeam::route('/create'),
            'edit' => EditOurTeam::route('/{record}/edit'),
        ];
    }
}
