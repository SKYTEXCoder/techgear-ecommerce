<?php

namespace App\Filament\Resources;

use App\Enums\RolesEnum;
use App\Filament\Resources\DepartmentResource\Pages;
use App\Filament\Resources\DepartmentResource\RelationManagers;
use App\Filament\Resources\DepartmentResource\RelationManagers\CategoriesRelationManager;
use App\Models\Department;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Str;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->live(true)
                    ->required()
                    ->maxLength(255)
                    ->label('Department Name')
                    ->afterStateUpdated(callback: function (string $operation, $state, callable $set) {
                        $set('slug', Str::slug($state));
                    }),

                TextInput::make('slug')
                    ->required(),

                FileUpload::make('icon_svg_path')
                    ->image()
                    ->acceptedFileTypes(['image/svg+xml'])
                    ->directory('departments/icons')
                    ->label('Icon (SVG)')
                    ->maxSize(2048)
                    ->helperText('Upload an SVG icon for the department. Recommended size: 24x24px'),

                Checkbox::make('is_active')
                    ->required()
                    ->default(true)
                    ->label('Is Currently Active'),

                Checkbox::make('has_new_products')
                    //->required()
                    ->default(false)
                    ->label('Has New Products Recently'),

                Checkbox::make('is_currently_featured')
                    //->required()
                    ->default(false)
                    ->label('Is Currently Featured'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon_svg_path')
                    ->label('SVG Icon')
                    ->circular()
                    ->height(40)
                    ->width(40),

                TextColumn::make('name')
                    ->label('Department Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->copyable(),

                BooleanColumn::make('is_currently_featured')
                    ->label('Currently Featured')
                    ->sortable(),

                BooleanColumn::make('has_new_products')
                    ->label('Has New Products')
                    ->sortable(),

                BooleanColumn::make('is_active')
                    ->label('Active')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Created At')
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Updated At')
                    ->sortable()
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            CategoriesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool {
        $user = Filament::auth()->user();
        return $user && $user->hasRole(RolesEnum::Admin);
    }
}
