<?php

namespace App\Filament\Vendor\Resources;

use App\Filament\Vendor\Resources\VendorDetailsResource\Pages;
use App\Filament\Vendor\Resources\VendorDetailsResource\RelationManagers;
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
    protected static ?string $navigationLabel = 'My Shop';
    protected static ?string $modelLabel = 'Shop';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('vendor_id')
                    ->default(auth()->user()->id)
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Enter your shop Name:')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('summary')
                    ->label('Enter your shop summary:')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('phone')
                    ->prefix('+91')
                    ->tel()
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('twitter')
                    ->prefix('@')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('facebook')
                    ->prefix('@')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('instagram')
                    ->prefix('@')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\TextInput::make('pinterest')
                    ->prefix('@')
                    ->required()
                    ->maxLength(191)
                    ->default('N/A'),
                Forms\Components\DatePicker::make('since')
                    ->default(now())
                    ->required(),
                Forms\Components\Section::make('Shop Address')
                    ->relationship('address')
                    ->schema([
                        Forms\Components\Hidden::make('vendor_id')
                            ->default(auth()->user()->id)
                            ->required(),
                        Forms\Components\TextInput::make('address_line_1')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('address_line_2')
                            ->maxLength(191),
                        Forms\Components\TextInput::make('city')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('state')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('zip_code')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('country')
                            ->readOnly()
                            ->default('India')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\Hidden::make('address_type')
                            ->default('vendor')
                            ->required()
                    ])->columns(3)
            ])->columns(3);
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
                Tables\Actions\ViewAction::make(),
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
            'view' => Pages\ViewVendorDetails::route('/{record}'),
            'edit' => Pages\EditVendorDetails::route('/{record}/edit'),
        ];
    }
}
