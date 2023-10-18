<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendorDetailsResource\Pages;
use App\Filament\Resources\VendorDetailsResource\RelationManagers;
use App\Models\VendorDetails;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendorDetailsResource extends Resource
{
    protected static ?string $model = VendorDetails::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('vendor_id')
                    ->relationship('vendor', 'name')
                    ->required(),
                Forms\Components\Select::make('address_id')
                    ->relationship('address', 'id')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('summary')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('twitter')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('facebook')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('instagram')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('pinterest')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\DatePicker::make('since')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vendor.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('summary')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('twitter')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pinterest')
                    ->searchable(),
                Tables\Columns\TextColumn::make('since')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVendorDetails::route('/'),
            'create' => Pages\CreateVendorDetails::route('/create'),
            'edit' => Pages\EditVendorDetails::route('/{record}/edit'),
        ];
    }    
}
