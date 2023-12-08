<?php

namespace App\Filament\User\Resources\CartResource\Pages;

use App\Filament\User\Resources\CartResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCart extends EditRecord
{
    protected static string $resource = CartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
