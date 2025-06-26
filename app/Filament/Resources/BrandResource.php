<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Filament\Resources\BrandResource\RelationManagers;
use App\Models\Brand;
use App\Models\BrandType;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Str;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->live(true)
                    ->required()
                    ->maxLength(255)
                    ->label('Brand Name')
                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                        if ($operation === 'create' || $operation === 'edit') {
                            $set('slug', Str::slug($state));
                        }
                    }),

                TextInput::make('slug')
                    ->required()
                    ->dehydrated()
                    ->unique(Brand::class, 'slug', ignoreRecord: true)
                    ->maxLength(255)
                    ->helperText('Unique URL Identifier, usually auto-generated from the provided name.'),

                Select::make('brand_types')
                    ->relationship('brandTypes', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->live(onBlur: true)
                            ->required()
                            ->unique()
                            ->maxLength(255)
                            ->label('Brand Type Name')
                            ->afterStateUpdated(function (string $operation, $state, callable $set) {
                                    $set('slug', Str::slug($state));
                            }),
                        TextInput::make('slug')
                            ->required()
                            ->dehydrated()
                            ->unique()
                            ->maxLength(255)
                            ->prefix('brand-type-')
                            ->helperText('Will be auto-generated from name if left empty.')
                    ])
                    ->createOptionUsing(function (array $data) {
                        if (empty($data['slug'])) {
                            $data['slug'] = Str::slug($data['name']);
                        }
                        return BrandType::create($data)->getKey();
                    })
                    ->label('Brand Types'),

                FileUpload::make('logo_path')
                    ->label('Brand Logo')
                    ->image()
                    ->directory('brands')
                    ->maxSize(5120)
                    ->imagePreviewHeight('80'),

                Select::make('categories')
                    ->relationship('categories', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->label('Associated Categories'),

                Toggle::make('is_active')
                    ->label('Is Currently Active')
                    ->default(true)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo_path')
                    ->label('Logo')
                    ->circular()
                    ->height(40)
                    ->width(40),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->copyable(),

                TextColumn::make('brandTypes.name')
                    ->label('Brand Types')
                    ->badge()
                    ->separator(', ')
                    ->sortable(),

                TextColumn::make('categories.name')
                    ->label('Categories')
                    ->badge()
                    ->limitList(2)
                    ->separator(', ')
                    ->sortable(),

                BooleanColumn::make('is_active')
                    ->label('Active')
                    ->sortable(),
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
