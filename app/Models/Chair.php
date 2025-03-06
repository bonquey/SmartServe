<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{
    protected $fillable = [
        'table_id', 
        'chair_name'
    ];

    public function table()
    {
        return $this->belongsTo(EventTable::class);
    }

    public function menu()
    {
        
       return $this->hasOne(Menu::class);
       
    }
}
