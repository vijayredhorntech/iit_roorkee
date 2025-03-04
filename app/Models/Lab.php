<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    
    public function manager_info(){
        return $this->hasOne(User::class, 'id','lab_manager');
    }
}
