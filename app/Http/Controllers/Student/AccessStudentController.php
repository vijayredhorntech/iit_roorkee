<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PIUserMeta;
use App\Models\StudentUserMeta;
use App\Models\BookingInstrument;

class AccessStudentController extends Controller
{
    
    public function hs_studentdashboard(){
     
        $userId = auth()->id();
        $student = User::with(['student.piname','student.pideatils'])->where('id',$userId)->first();
        $bookings = BookingInstrument::with('instrument')
        ->where('user_id', $userId)
        ->orderBy('created_at', 'desc') // Order by latest bookings first
        ->paginate(10);

  
    //  return view('superadmin.pages.student.viewStudentDashboard',['student'=>$student,'bookings'=>$bookings]);
        return view('student.dashboard',['student'=>$student,'bookings'=>$bookings]);
    }
}
