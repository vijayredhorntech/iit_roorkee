<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstrumentsCategory extends Model
{
    protected $table = 'instruments_categories'; 


    public function  instruments(){
        return $this->hasMany(Instrument::class, 'category_type','id');
    }

    
}
