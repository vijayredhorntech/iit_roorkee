<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PIUserMeta;
use App\Models\StudentUserMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Services\StudentService;
use App\Models\BookingInstrument;

class StudentController extends Controller
{
    
    /*****Store the user *******/
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }


    

    public function hs_createstudent() {
        
        $pi = User::with('pi')->where('type', 'pi')->get(); 
        return view('superadmin.pages.student.createStudent', ['pilist' => $pi]);
    }

    public function hs_studentstore(Request $request){

            
            $validatedData = $request->validate([
                'pi_id'          => 'required|exists:users,id',
                'first_name'     => 'required|string|max:255',
                'last_name'      => 'required|string|max:255',
                'student_aid'     => 'required|unique:student_user_meta,student_id', 
                'department'     => 'required|string|max:255',
                'studyyear'      => 'required|integer|min:1|max:6',
                'email'          => 'required|email|unique:users,email',
                'alt_email'      => 'nullable|email', 
                'mobile'         => 'required|digits:10|numeric', 
                'research_area'  => 'nullable|string|max:500', 
                'address'        => 'required|string|max:500',
                'profile_photo'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048', 
            ]);


            // service for create student 

            $studentCreated = $this->studentService->createStudent(auth()->user(), $request->all());
          if($studentCreated){

            $user = auth()->user(); // Get the logged-in user

            if ($user->type === "pi") {  
                return redirect()->route('allpi_student')->with('success', 'Student added successfully.');
            } else {  
                return redirect()->route('alldetails_student')->with('success', 'Student added successfully.');
            }
          }else{
            return back()->withErrors(['error' => 'Failed to create student. Please try again.']);
          }

        
           


           
        
    }

    /*****View sutdent *******/

   public function hs_viewallstudent(){

    // $students = User::with('student')->where('type', 'student')->get();
    
    $students = User::with(['student.piname','student.pideatils'])->where('type', 'student')->paginate(10);
    return view('superadmin.pages.student.studentList', ['students' => $students]);
  
   }


   /*****Views student *******/


   public function hs_viewstudent ($id){  
   
    
    $student = User::with(['student.piname','student.pideatils'])->where('id',$id)->first();
    $bookings = BookingInstrument::with('instrument')
    ->where('user_id', $id)
    ->orderBy('created_at', 'desc') // Order by latest bookings first
    ->paginate(10);

  
     return view('superadmin.pages.student.viewStudentDashboard',['student'=>$student,'bookings'=>$bookings]);
  }
   
}
