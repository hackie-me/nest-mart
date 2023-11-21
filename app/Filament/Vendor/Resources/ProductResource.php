<?php

namespace App\Filament\Vendor\Resources;

use App\Filament\Vendor\Resources\ProductResource\Pages;
use App\Filament\Vendor\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\VendorDetails;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('Thumbnail')
                    ->directory('product/thumbnail')
                    ->image()
                    ->required(),
                Forms\Components\FileUpload::make('gallery')
                    ->directory('product/gallery')
                    ->image()
                    ->multiple()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Select::make('category_id')
                    ->native(false)
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\TextInput::make('summary')
                    ->required()
                    ->maxLength(191),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('stock')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('sku')
                    ->label('SKU')
                    ->required()
                    ->maxLength(191),
                Forms\Components\DatePicker::make('mfg')
                    ->live()
                    ->before('exp')
                    ->required(),
                Forms\Components\DatePicker::make('exp')
                    ->live()
                    ->after('mfg')
                    ->required(),
                Forms\Components\TagsInput::make('tags')
                    ->splitKeys([',', ';',])
                    ->required(),
                Forms\Components\Select::make('vendor_id')
                    ->label('Select your Shop')
                    ->native(false)
                    ->options(function () {
                        return VendorDetails::where('vendor_id', auth()->id())->pluck('name', 'id')->toArray();
                    })
                    ->relationship('vendor', 'name')
                    ->required(),
                Forms\Components\Section::make('Additional Details')
                    ->relationship('additionalProductInfos')
                    ->schema([
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
                        Forms\Components\ColorPicker::make('color')
                            ->required()
                            ->default('N/A'),
                        Forms\Components\TextInput::make('size')
                            ->required()
                            ->maxLength(191)
                            ->default('N/A'),
                    ])
                    ->columns(4)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->disk('public'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vendor.name')
                    ->label('Shop')
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
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('vendor_id', auth()->id());
            })
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
