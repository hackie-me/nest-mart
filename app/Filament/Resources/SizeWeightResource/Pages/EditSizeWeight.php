<?php

namespace App\Filament\Resources\SizeWeightResource\Pages;

use App\Filament\Resources\SizeWeightResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSizeWeight extends EditRecord
{
    protected static string $resource = SizeWeightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
