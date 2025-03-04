<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PIUserMeta;
use App\Models\StudentUserMeta;

class AccessStudentController extends Controller
{
    
    public function hs_studentdashboard(){
     
        $userId = auth()->id();
        $student = User::with(['student.piname','student.pideatils'])->where('id',$userId)->first();
        return view('student.dashboard',['student'=>$student]);
    }
}
