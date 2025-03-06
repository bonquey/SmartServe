<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Table;
use App\Models\Chair;

class Menu extends Model
{
    protected $fillable = [
        'table_id', 'chair_id',
        'starters',
        'local_dish',
        'local_dish_protein',
        'continental',
        'continental_sauce',
        'continental_protein',
        'soup',
        'swallow',
        'soup_protein',
        'salad',
        'status'

        
    ];

    protected static function booted()
    {
      
    }

    public function table()
    {
        return $this->belongsTo(EventTable::class);
    }

    public function chair()
    {
        return $this->belongsTo(Chair::class);
    }

}
