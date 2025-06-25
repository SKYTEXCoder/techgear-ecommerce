<?php

namespace App\Filament\Resources\DepartmentResource\RelationManagers;

use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Str;

class CategoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'categories';

    public function form(Form $form): Form
    {
        $department = $this->getOwnerRecord();
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->live(true)
                    ->required()
                    ->maxLength(255)
                    ->label('Category Name')
                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                        $set('slug', Str::slug($state));
                    }),

                TextInput::make('description')
                    ->maxLength(500)
                    ->label('Description'),

                TextInput::make('slug')
                    ->required()
                    ->dehydrated()
                    ->unique(Category::class, 'slug', ignoreRecord: true)
                    ->maxLength(255),

                Forms\Components\Select::make('parent_category_id')
                    ->live(true)
                    ->options(function () use ($department) {
                        return Category::query()
                            ->where('department_id', $department->id)
                            ->pluck('name', 'id')
                            ->toArray();
                    })
                    ->label('Parent Category')
                    ->preload()
                    ->searchable()
                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                        if ($state) {
                            $parentCategory = Category::find($state);
                            if ($parentCategory) {
                                $set('depth', $parentCategory->calculateDepth() + 1);
                            } else {
                                $set('depth', 0);
                            }
                        } else {
                            $set('depth', 0);
                        }
                    }),

                TextInput::make('depth')
                    ->label('Depth')
                    ->disabled()
                    ->dehydrated(false),

                Checkbox::make('is_active')
                    ->required()
                    ->default(true)
                    ->label('Active'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('parent.name')
                    ->sortable()
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean()
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
