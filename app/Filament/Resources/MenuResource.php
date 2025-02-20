<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
// use App\Models\EventTable;
use App\Models\Chair;
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
use Filament\Tables\Columns\SelectColumn;  //for the select in the table for status
use Filament\Forms\Get;  //in the dependent select field
use Illuminate\Support\Collection; //in the dependent select field
use Illuminate\Support\Facades\DB;// for the calculation of quantity



class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('table_id')
                ->label('Table')
                ->searchable()
                ->preload()
                ->relationship('table', 'table_name') // Table relationship
                ->live(),
                
                Select::make('chair_id')
                    ->options(fn (Get $get): Collection => Chair::query()
                        ->where('table_id', $get('table_id'))
                        ->pluck('chair_name','id'))
                    ->searchable()
                    ->preload()
                    ->label('Chair'),

                // Appetizer Selection
                Select::make('appetizer_id')
                    ->label('Appetizer')
                    ->searchable()
                    ->preload()
                    ->options(fn () => Comestible::where('category', 'Appetizer')->pluck('name', 'id'))
                    ->nullable()
                    ->reactive(),

                TextInput::make('appetizer_quantity')
                    ->label('Appetizer Qty. (Packs)')
                    ->numeric()
                    ->nullable()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set, $get) => self::validateQuantity('appetizer_id', $state, $set, $get)),

                // Main Dish Selection
                Select::make('main_dish_id')
                    ->label('Main Dish')
                    ->searchable()
                    ->preload()
                    ->options(fn () => Comestible::where('category', 'Main Dish')->pluck('name', 'id'))
                    ->nullable()
                    ->reactive(),

                TextInput::make('main_dish_quantity')
                    ->label('Main Dish Qty. (Plates)')
                    ->numeric()
                    ->nullable()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set, $get) => self::validateQuantity('main_dish_id', $state, $set, $get)),

                    // Protein Selection
                Select::make('protein_id')
                ->label('Protein')
                ->searchable()
                ->preload()
                ->options(fn () => Comestible::where('category', 'Protein')->pluck('name', 'id'))
                ->nullable()
                ->reactive(),
                TextInput::make('protein_quantity')
                ->label('Protein Qty. (Piece)')
                ->numeric()
                ->nullable()
                ->reactive()
                ->afterStateUpdated(fn ($state, callable $set, $get) => self::validateQuantity('protein_id', $state, $set, $get)),
        

                // Drink Selection
                Select::make('drink_id')
                    ->label('Drink')
                    ->searchable()
                    ->preload()
                    ->options(fn () => Comestible::where('category', 'Drink')->pluck('name', 'id'))
                    ->nullable()
                    ->reactive(),
                TextInput::make('drink_quantity')
                    ->label('Drink Qty. (Bottle/Pack/Can)')
                    ->numeric()
                    ->nullable()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set, $get) => self::validateQuantity('drink_id', $state, $set, $get)),
            
                

                // Hydration Selection
                Select::make('hydration_id')
                    ->label('Hydration')
                    ->searchable()
                    ->preload()
                    ->options(fn () => Comestible::where('category', 'Hydration')->pluck('name', 'id'))
                    ->nullable()
                    ->reactive(),
                TextInput::make('hydration_quantity')
                    ->label('Hydration Qty. (Bottle)')
                    ->numeric()
                    ->nullable()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set, $get) => self::validateQuantity('hydration_id', $state, $set, $get)),
        
                // Dessert Selection
                Select::make('dessert_id')
                    ->label('Dessert')
                    ->searchable()
                    ->preload()
                    ->options(fn () => Comestible::where('category', 'Dessert')->pluck('name', 'id'))
                    ->nullable()
                    ->reactive(),
                TextInput::make('dessert_quantity')
                    ->label('Dessert Qty. (Pack/Pieces)')
                    ->numeric()
                    ->nullable()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set, $get) => self::validateQuantity('desser_id', $state, $set, $get)),
            
    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('3s')//this is to refresh the table automatically after 3 seconds
            ->columns([
                TextColumn::make('table.table_name')
                    ->label('Table')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('chair.chair_name')
                    ->label('Chair')
                    ->searchable()
                    ->sortable(),

                
                SelectColumn::make('status')  //just using SelectColumn in a table updates the table
                    ->label('Status')
                    ->options([
                        'Pending' => 'Pending',
                        'Processing' => 'Processing',
                        'Delivered' => 'Delivered',
                    ])
                    ->default('Pending') // Set default status
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
                Tables\Actions\ViewAction::make()->slideOver(),
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make()
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('toggleStatus')
                ->label('Change Status')
                ->icon('heroicon-m-switch-horizontal')
                ->action(fn (Menu $record) => $record->update([
                    'status' => $record->status === 'Pending' ? 'Processing' : 'Delivered',
                ]))
                ->requiresConfirmation()
                ->color('primary')
                ->visible(fn (Menu $record) => in_array($record->status, ['Pending', 'Delivered'])),
        ];
    }



    public static function getRelations(): array
    {
        return [
            //
        ];
    }


     /**
     * Validate if the selected quantity does not exceed available stock
     */
    public static function validateQuantity($field, $selectedQuantity, callable $set, $get)
    {
        $comestibleId = $get($field);
        $selectedQuantity = (int) $selectedQuantity;

        if ($comestibleId) {
            $availableQuantity = Comestible::find($comestibleId)?->quantity ?? 0;

            if ($selectedQuantity > $availableQuantity) {
                $set(str_replace('_id', '_quantity', $field), $availableQuantity);
                session()->flash('error', 'Selected quantity exceeds available stock.');
            }
        }
    }

    /**
     * Handle form submission: Save menu and update stock.
     */
    public static function createMenu($data)
    {
        DB::transaction(function () use ($data) {
            $menu = Menu::create();

            $items = [
                'appetizer' => ['id' => 'appetizer_id', 'qty' => 'appetizer_quantity'],
                'main_dish' => ['id' => 'main_dish_id', 'qty' => 'main_dish_quantity'],
            ];

            foreach ($items as $item) {
                if (!empty($data[$item['id']]) && !empty($data[$item['qty']])) {
                    $comestible = Comestible::find($data[$item['id']]);

                    if ($comestible && $comestible->quantity >= $data[$item['qty']]) {
                        $menu->comestibles()->attach($comestible->id, ['quantity' => $data[$item['qty']]]);
                        $comestible->decrement('quantity', $data[$item['qty']]);
                    }
                }
            }
        });
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            // 'create' => Pages\CreateMenu::route('/create'),
            // 'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
