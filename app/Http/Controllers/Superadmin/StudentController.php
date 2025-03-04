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

class StudentController extends Controller
{
    

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

            
        DB::beginTransaction(); // Start Transaction

        try {
            // Handle Profile Photo Upload
            $profile = null;
            if ($request->hasFile('profile_photo')) {
                $file = $request->file('profile_photo');
                $imageName = Str::slug($request->first_name) . '_' . time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('images/student/images/');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }

                $file->move($destinationPath, $imageName);
                $profile = 'images/student/images/' . $imageName; 
            }

            // Create User
            $user = new User();
            $user->name = $request->first_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->email); 
            $user->type = 'student';
            $user->profile_name = $profile;
            $user->save();

            // Create PIUserMeta
            $studentMeta = new StudentUserMeta();
            $studentMeta->pi_id = $request->pi_id; 
            $studentMeta->sid = $user->id; 
            $studentMeta->student_id  = $request->student_aid;
            $studentMeta->address = $request->office_address;
            $studentMeta->lastname = $request->last_name;
            $studentMeta->department = $request->department;
            $studentMeta->student_year = $request->studyyear;
            $studentMeta->altemail = $request->alt_email;
            $studentMeta->mobile_number = $request->mobile;
            $studentMeta->research_area = $request->research_area;
            $studentMeta->address = $request->address;
            $studentMeta->status = "active";
            $studentMeta->action =  '1';
            $studentMeta->login_status = "0";
            $studentMeta->save();

            DB::commit(); // Commit the transaction

      
            $user = auth()->user(); // Get the logged-in user

            if ($user->type == "pi") {  
                return redirect()->route('allpi_student')->with('success', 'Student added successfully.');
            } else {  
                return redirect()->route('alldetails_student')->with('success', 'Student added successfully.');
            }


           
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack(); // Rollback on error
            return redirect()->back()->with('error', 'Error saving PI Metadata: ' . $e->getMessage());
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
     return view('superadmin.pages.student.viewStudentDashboard',['student'=>$student]);
  }
   
}
