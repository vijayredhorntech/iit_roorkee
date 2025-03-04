<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentUserMeta extends Model
{
    
    protected $table = 'student_user_meta';


    public function user()
    {
        return $this->belongsTo(User::class, 'sid');
    }

    public function pideatils()
    {
        return $this->hasOne(PIUserMeta::class, 'pi_id','pi_id');
    }

    public function piname()
    {
        return $this->hasOne(User::class, 'id','pi_id');
    }

    public function user_data(){
        return $this->hasOne(User::class, 'id','sid');
    }

}

