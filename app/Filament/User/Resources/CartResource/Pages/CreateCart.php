<?php

namespace App\Filament\User\Resources\CartResource\Pages;

use App\Filament\User\Resources\CartResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCart extends CreateRecord
{
    protected static string $resource = CartResource::class;
    protected static bool $canCreateAnother = false;    
}
