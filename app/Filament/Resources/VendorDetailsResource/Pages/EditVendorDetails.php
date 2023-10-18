<?php

namespace App\Filament\Resources\VendorDetailsResource\Pages;

use App\Filament\Resources\VendorDetailsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVendorDetails extends EditRecord
{
    protected static string $resource = VendorDetailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
