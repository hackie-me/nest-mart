<?php

namespace App\Filament\Vendor\Resources\VendorDetailsResource\Pages;

use App\Filament\Vendor\Resources\VendorDetailsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVendorDetails extends ListRecords
{
    protected static string $resource = VendorDetailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
