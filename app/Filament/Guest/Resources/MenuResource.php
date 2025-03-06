<?php

namespace App\Filament\Guest\Resources;

use App\Filament\Guest\Resources\MenuResource\Pages;
use App\Filament\Guest\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;  //for the select in the table for status
use Filament\Forms\Get;  //in the dependent select field
use Illuminate\Support\Collection; //in the dependent select field
use Illuminate\Support\Facades\DB;// for the calculation of quantity
// use App\Models\EventTable;
use App\Models\Chair;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  
    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Section::make('Menu Instructions')
                ->description('Please enter your table and chair number along with your starter meal. Then, scroll down to choose your preferred main course.')
                ->schema([
                    Grid::make(3)
                        ->schema([
                            Select::make('table_id')
                                ->label('Table')
                                ->required()
                                ->searchable()
                                ->preload()
                                ->relationship('table', 'table_name') // Table relationship
                                ->live(),

                            Select::make('chair_id')
                                ->options(fn (Get $get): Collection => Chair::query()
                                    ->where('table_id', $get('table_id'))
                                    ->pluck('chair_name', 'id'))
                                ->searchable()
                                ->preload()
                                ->label('Chair')
                                ->required(),

                            Select::make('starters')
                                ->label('Starter Meal')
                                ->options([
                                    'Goat-meat Pepper Soup' => 'Goat-meat Pepper Soup',
                                    'Fresh-Fish Pepper Soup' => 'Fresh-Fish Pepper Soup',
                                ])
                                ->live(),
                        ]),
                ]),

            Section::make('Main Course (Local Rice)')
                ->description('If you prefer local rice as your main course, please click here to select. Otherwise, you may proceed.')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Select::make('local_dish')
                                ->label('Local Rice')
                                ->options([
                                    'Firewood Rice' => 'Firewood Rice',
                                    'Asun Rice' => 'Asun Rice',
                                ])
                                ->live(),
                            Select::make('local_dish_protein')
                                ->label('Protein')
                                ->options([
                                    'Peppered Fish' => 'Peppered Fish',
                                    'Peppered Chicken' => 'Peppered Chicken',
                                ])
                                ->live(),
                        ]),
                ])
                ->disabled(fn (Get $get) => !empty($get('soup')) || !empty($get('continental'))),

            Section::make('Main Course (Local Soup)')
                ->description('If you prefer local soup as your main course, please click here to select. Otherwise, you may proceed.')
                ->schema([
                    Grid::make(3)
                        ->schema([
                            Select::make('soup')
                                ->label('Soup')
                                ->options([
                                    'Afang Soup' => 'Afang Soup',
                                    'White Soup' => 'White Soup',
                                    'Egusi Soup' => 'Egusi Soup',
                                ])
                                ->live(),
                            Select::make('swallow')
                                ->label('Swallow')
                                ->options([
                                    'Garri' => 'Garri',
                                    'Fufu' => 'Fufu',
                                ])
                                ->live(),
                            Select::make('soup_protein')
                                ->label('Protein')
                                ->options([
                                    'Peppered Fish' => 'Peppered Fish',
                                    'Peppered Chicken' => 'Peppered Chicken',
                                ])
                                ->live(),
                        ]),
                ])
                ->disabled(fn (Get $get) => !empty($get('local_dish')) || !empty($get('continental'))),

            Section::make('Main Course (Continentals)')
                ->description('If you prefer Continentals as your main course, please click here to select. Otherwise, you may proceed.')
                ->schema([
                    Grid::make(3)
                        ->schema([
                            Select::make('continental')
                                ->label('Continental Dish (Rice)')
                                ->options([
                                    'Basmati White Rice' => 'Basmati White Rice',
                                ])
                                ->live(),
                            Select::make('continental_sauce')
                                ->label('Continental Sauce')
                                ->options([
                                    'Shredded Beef Sauce' => 'Shredded Beef Sauce',
                                ])
                                ->live(),
                            Select::make('continental_protein')
                                ->label('Protein')
                                ->options([
                                    'Peppered Fish' => 'Peppered Fish',
                                    'Peppered Chicken' => 'Peppered Chicken',
                                ])
                                ->live(),
                        ]),
                ])
                ->disabled(fn (Get $get) => !empty($get('local_dish')) || !empty($get('soup'))),

            Section::make('Salad')
                ->description('If you would like to add salad to your order, please select it. Otherwise, click the "Create" button below to submit your order.')
                ->schema([
                    Select::make('salad')
                        ->label('Salad')
                        ->options([
                            'Mixed Vegetable Salad' => 'Mixed Vegetable Salad',
                            'Coleslaw' => 'Coleslaw',
                        ])
                        ->live(),
                ])
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\CreateMenu::route('/'),
            // 'create' => Pages\ListMenu::route('/create'),
            // 'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
