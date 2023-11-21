<?php

namespace App\Filament\Vendor\Resources\VendorDetailsResource\Pages;

use App\Filament\Vendor\Resources\VendorDetailsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVendorDetails extends EditRecord
{
    protected static string $resource = VendorDetailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
