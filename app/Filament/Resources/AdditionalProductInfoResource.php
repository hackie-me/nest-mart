<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdditionalProductInfoResource\Pages;
use App\Filament\Resources\AdditionalProductInfoResource\RelationManagers;
use App\Models\AdditionalProductInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdditionalProductInfoResource extends Resource
{
    protected static ?string $model = AdditionalProductInfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->relationship('product', 'name')
                    ->required(),
                Forms\Components\TextInput::make('stand_up')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('folded_w_o_wheels')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('folded_w_wheels')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('door_pass_through')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('frame')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('weight')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('capacity')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('width')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('height')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('handle_height')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('wheels')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('seat_back_height')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('head_room')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('color')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('size')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stand_up')
                    ->searchable(),
                Tables\Columns\TextColumn::make('folded_w_o_wheels')
                    ->searchable(),
                Tables\Columns\TextColumn::make('folded_w_wheels')
                    ->searchable(),
                Tables\Columns\TextColumn::make('door_pass_through')
                    ->searchable(),
                Tables\Columns\TextColumn::make('frame')
                    ->searchable(),
                Tables\Columns\TextColumn::make('weight')
                    ->searchable(),
                Tables\Columns\TextColumn::make('capacity')
                    ->searchable(),
                Tables\Columns\TextColumn::make('width')
                    ->searchable(),
                Tables\Columns\TextColumn::make('height')
                    ->searchable(),
                Tables\Columns\TextColumn::make('handle_height')
                    ->searchable(),
                Tables\Columns\TextColumn::make('wheels')
                    ->searchable(),
                Tables\Columns\TextColumn::make('seat_back_height')
                    ->searchable(),
                Tables\Columns\TextColumn::make('head_room')
                    ->searchable(),
                Tables\Columns\TextColumn::make('color')
                    ->searchable(),
                Tables\Columns\TextColumn::make('size')
                    ->searchable(),
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
            'index' => Pages\ListAdditionalProductInfos::route('/'),
            'create' => Pages\CreateAdditionalProductInfo::route('/create'),
            'edit' => Pages\EditAdditionalProductInfo::route('/{record}/edit'),
        ];
    }    
}
