<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventTable extends Model
{
    protected $fillable = [
        'table_name'
    ];

    public function chairs()
    {
        return $this->hasMany(Chair::class);
    }

    public function menus()
    {
        
       return $this->hasOne(Menu::class);
       
    }
}
