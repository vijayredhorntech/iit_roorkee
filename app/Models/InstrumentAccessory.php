<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstrumentAccessory extends Model
{
    //


    public function  instrumentInformation(){
        return $this->hasOne(Instrument::class, 'id','instrument_id');
    }
}
