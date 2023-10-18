<?php

namespace App\Filament\Resources\AdditionalProductInfoResource\Pages;

use App\Filament\Resources\AdditionalProductInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdditionalProductInfos extends ListRecords
{
    protected static string $resource = AdditionalProductInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
