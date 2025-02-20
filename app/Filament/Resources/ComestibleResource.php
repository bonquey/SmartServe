<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComestibleResource\Pages;
use App\Filament\Resources\ComestibleResource\RelationManagers;
use App\Models\Comestible;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class ComestibleResource extends Resource
{
    protected static ?string $model = Comestible::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                Select::make('category')
                ->options([
                    
                    'Appetizer' => 'Appetizer',
                    'Main Dish' => 'Main Dish',
                    'Protein'=> 'Protein',
                    'Dessert' => 'Dessert',
                    'Drink' => 'Drink',
                    'Hydration'=> 'Hydration'
                ])
                ->searchable()
                ->label('Type'),
                TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('3s')//this is to refresh the table automatically after 3 seconds
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('category')
                    ->searchable(),
                TextColumn::make('quantity')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
            'index' => Pages\ListComestibles::route('/'),
            // 'create' => Pages\CreateComestible::route('/create'),
            // 'edit' => Pages\EditComestible::route('/{record}/edit'),
        ];
    }
}
