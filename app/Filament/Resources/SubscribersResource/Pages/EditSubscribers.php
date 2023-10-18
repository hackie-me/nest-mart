<?php

namespace App\Filament\Resources\SubscribersResource\Pages;

use App\Filament\Resources\SubscribersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubscribers extends EditRecord
{
    protected static string $resource = SubscribersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
