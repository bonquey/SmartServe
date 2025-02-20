<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comestible extends Model
{
    protected $fillable = ['name', 'category', 'quantity'];

    

    public function menuAppetizer()
    {
        return $this->hasOne(Menu::class, 'appetizer_id');
    }

    public function menuMainDishe()
    {
        return $this->hasOne(Menu::class, 'main_dish_id');
    }

    public function menuDrink()
    {
        return $this->hasOne(Menu::class, 'drink_id');
    }

    public function menuHydration()
    {
        return $this->hasOne(Menu::class, 'hydration_id');
    }

    public function menuProtein()
    {
        return $this->hasOne(Menu::class, 'protein_id');
    }

    public function menuDessert()
    {
        return $this->hasOne(Menu::class, 'dessert_id');
    }
}
