<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comestible;
use App\Models\Table;
use App\Models\Chair;

class Menu extends Model
{
    protected $fillable = [
        'table_id', 'chair_id',
        'appetizer_id', 'appetizer_quantity',
        'main_dish_id', 'main_dish_quantity',
        'drink_id', 'drink_quantity',
        'hydration_id', 'hydration_quantity',
        'protein_id', 'protein_quantity',
        'dessert_id', 'dessert_quantity',
    ];

    protected static function booted()
    {
        static::created(function ($menu) {
            foreach (['appetizer', 'main_dish', 'drink', 'hydration', 'protein', 'dessert'] as $item) {
                $comestible = Comestible::find($menu->{$item . '_id'});
                if ($comestible && $comestible->quantity >= $menu->{$item . '_quantity'}) {
                    $comestible->decrement('quantity', $menu->{$item . '_quantity'});
                }
            }
        });
    }

    public function table()
    {
        return $this->belongsTo(EventTable::class);
    }

    public function chair()
    {
        return $this->belongsTo(Chair::class);
    }

    public function appetizer()
    {
        return $this->belongsTo(Comestible::class, 'appetizer_id');
    }

    public function mainDish()
    {
        return $this->belongsTo(Comestible::class, 'main_dish_id');
    }

    public function drink()
    {
        return $this->belongsTo(Comestible::class, 'drink_id');
    }

    public function hydration()
    {
        return $this->belongsTo(Comestible::class, 'hydration_id');
    }

    public function protein()
    {
        return $this->belongsTo(Comestible::class, 'protein_id');
    }

    public function dessert()
    {
        return $this->belongsTo(Comestible::class, 'dessert_id');
    }
}
