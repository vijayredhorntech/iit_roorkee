<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PIUserMeta extends Model
{
    
    protected $table = 'pi_user_meta';

    
    public function user()
    {
        return $this->belongsTo(User::class, 'pi_id');
    }



    
}
