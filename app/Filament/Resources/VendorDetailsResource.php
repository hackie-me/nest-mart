<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendorDetailsResource\Pages;
use App\Filament\Resources\VendorDetailsResource\RelationManagers;
use App\Models\VendorDetails;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendorDetailsResource extends Resource
{
    protected static ?string $model = VendorDetails::class;
    protected static ?string $modelLabel = 'Stores';
    protected static ?string $navigationLabel = 'Vendors';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('vendor_id')
                    ->relationship('vendor', 'name'),
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
                Section::make('Shop Address')
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
                    ])->columns(3),
                Section::make('User Details')
                    ->hidden(fn($operation) => $operation == 'create')
                    ->relationship('vendor')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->disabled()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('username')
                            ->disabled()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('phone')
                            ->disabled()
                            ->tel()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->disabled()
                            ->required()
                            ->maxLength(191),
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
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
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
