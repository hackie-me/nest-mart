<?php

namespace App\Filament\Resources\SizeWeightResource\Pages;

use App\Filament\Resources\SizeWeightResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSizeWeights extends ListRecords
{
    protected static string $resource = SizeWeightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
