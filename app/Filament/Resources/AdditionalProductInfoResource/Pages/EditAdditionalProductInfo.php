<?php

namespace App\Filament\Resources\AdditionalProductInfoResource\Pages;

use App\Filament\Resources\AdditionalProductInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdditionalProductInfo extends EditRecord
{
    protected static string $resource = AdditionalProductInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
