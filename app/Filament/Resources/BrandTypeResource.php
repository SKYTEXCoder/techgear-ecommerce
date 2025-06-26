<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandTypeResource\Pages;
use App\Filament\Resources\BrandTypeResource\RelationManagers;
use App\Filament\Resources\BrandTypeResource\RelationManagers\BrandsRelationManager;
use App\Models\BrandType;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Str;

class BrandTypeResource extends Resource
{
    protected static ?string $model = BrandType::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Types';
    protected static ?int $navigationCount = 3;
    protected static ?string $navigationLabel = 'Brand Types';
    protected static ?string $modelLabel = 'Brand Type';
    protected static ?string $pluralModelLabel = 'Brand Types';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                        if ($operation === 'create' || $operation === 'edit') {
                            $set('slug', Str::slug($state));
                        }
                    }),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->helperText('Unique URL Identifier, usually auto-generated from name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('brands_count')
                    ->counts('brands')
                    ->label('Brands')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->modalDescription('Are you absolutely sure that you want to delete this brand type? This will not delete any brands associated with this type, but it will remove the type from those brands.')
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\BrandsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrandTypes::route('/'),
            'create' => Pages\CreateBrandType::route('/create'),
            'edit' => Pages\EditBrandType::route('/{record}/edit'),
        ];
    }
}
