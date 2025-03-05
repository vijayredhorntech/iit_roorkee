<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    
    public function  purchaseInformation(){
        return $this->hasOne(PurchaseInformation::class, 'instrument_id','id');
    }

    public function  instrumentDocument(){
        return $this->hasOne(InstrumentDocument::class, 'instrument_id','id');
    }

    public function  serviceengineerInformation(){
        return $this->hasOne(ServiceEngineerInformation::class, 'instrument_id','id');
    }


    public function  warrantyInformation(){
        return $this->hasOne(WarrantyInformation::class, 'instrument_id','id');
    }

    public function  instrumentsCategory(){
        return $this->hasOne(InstrumentsCategory::class, 'id','category_type');
    }

    public function  labInformation(){
        return $this->hasOne(Lab::class, 'id','lab_id');
    }
    
}
