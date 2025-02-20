<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChairResource\Pages;
use App\Filament\Resources\ChairResource\RelationManagers;
use App\Models\Chair;
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

class ChairResource extends Resource
{
    protected static ?string $model = Chair::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('table_id')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Table Name')
                    ->relationship('table', 'table_name'),
                TextInput::make('chair_name')
                    ->required()
                    ->label('Chair Name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('table.table_name')
                ->label('Table Name')
                ->sortable(),
                TextColumn::make('chair_name')
                ->label('Chair Name')
                ->sortable(),
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
            'index' => Pages\ListChairs::route('/'),
            // 'create' => Pages\CreateChair::route('/create'),
            // 'edit' => Pages\EditChair::route('/{record}/edit'),
        ];
    }
}
