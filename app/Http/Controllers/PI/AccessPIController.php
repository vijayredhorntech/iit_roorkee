<?php

namespace App\Http\Controllers\PI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PIUserMeta;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentUserMeta;

class AccessPIController extends Controller
{

    /****PI dashboard **********/
    public function hs_pidashboard(){
       
        $userId = auth()->id();
        $pi = User::with('pi')->where('id',$userId)->first();
        
        return view('pi.dashboard',['pi'=>$pi]);

    }


    /*********Student list ********/
   public function  hs_studentlist(){

    $userId = auth()->id();
    $pi = User::with('pi')->where('id',$userId)->first();
    $students=StudentUserMeta::with('user_data')->where('pi_id',$userId)->paginate(10); 
    // dd($students);
    
    return view('pi.pages.student.studentList', ['students' => $students,'pi'=>$pi]);
 
   }



/********View student dashboard******* */
   public function hs_viewstudent($id){

    $userId = auth()->id();

    $check_pi=StudentUserMeta::where('pi_id',$userId)->where('id',$id)->first(); 
    if (!$check_pi) {
        abort(404); // Show 404 error if $check_pi is not found
    }
    
    $id = $check_pi->sid;
    $student = User::with(['student.piname', 'student.pideatils'])->where('id', $id)->first();
    $pi = User::with('pi')->where('id', $userId)->first();
    
    return view('pi.pages.student.viewStudentDashboard', [
        'student' => $student,
        'pi' => $pi
    ]);
   
  }


  /*********Create student ********/

  public function hs_createstudent(){
    $userId = auth()->id();
    $pi = User::with('pi')->where('id', $userId)->first();
    return view('pi.pages.student.createStudent', ['pi' => $pi]);
  }




}
