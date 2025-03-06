<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lab;
use App\Models\PIUserMeta;
use App\Models\StudentUserMeta;
use App\Models\Instrument;
use App\Models\BookingInstrument;
use App\Models\InstrumentsCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;





class PIController extends Controller
{
    



/*****Remove the dashboard */
public function hs_dashboard(){
   
  
        $lab_count = Lab::count(); 
        $pi_count = PIUserMeta::count(); 
        $student_count = StudentUserMeta::count(); // Fixed typo from $student_cout to $student_count
        $total_instrument = Instrument::count();
        $total_booking=BookingInstrument::count(); 
        $total_instrumentcategory=InstrumentsCategory::count(); 
    
        return view('superadmin.dashboard', compact('lab_count', 'pi_count', 'student_count', 'total_instrument','total_booking','total_instrumentcategory'));
 
    

    
 
    // return view('superadmin.dashboard');
}



    /*******pi create ******/

    public function hs_picreste(){
      
        return view('superadmin.pages.pi.createPi');
    }

    
    
    /****Store pi ******/

    public function hs_pistore(Request $request)
{

 
    $request->validate([
        'first_name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email',
        'last_name' => 'nullable|string|max:50',
        'department' => 'nullable|string|max:100',
        'designation' => 'nullable|string|max:100',
        'alt_email' => 'nullable|email|max:100',
        'phone_number' => 'nullable|string|max:15',
        'mobile' => 'nullable|string|max:15',
        'lab_room' => 'required|string',
        'specialization' => 'required|string|max:255',
        'qualification' => 'required|string|max:255',
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);



   
    DB::beginTransaction(); // Start Transaction

    try {
        // Handle Profile Photo Upload
        $profile = null;
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $imageName = Str::slug($request->first_name) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/pi/images/');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $file->move($destinationPath, $imageName);
            $profile = 'images/pi/images/' . $imageName; // Store relative path
        }

        // Create User
        $user = new User();
        $user->name = $request->first_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->email); 
        $user->type = 'pi';
        $user->profile_name = $profile;
        $user->save();

        // Create PIUserMeta
        $piUserMeta = new PIUserMeta();
        $piUserMeta->pi_id = $user->id; 
        $piUserMeta->title = $request->title;
        $piUserMeta->address = $request->office_address;
        $piUserMeta->last_name = $request->last_name;
        $piUserMeta->department = $request->department;
        $piUserMeta->designation = $request->designation;
        $piUserMeta->alt_email = $request->alt_email;
        $piUserMeta->phone_number = $request->phone;
        $piUserMeta->mobile_number = $request->mobile;
        $piUserMeta->lab_number = $request->lab_room;
        $piUserMeta->specialization = $request->specialization;
        $piUserMeta->academica = $request->qualification;
        $piUserMeta->date_of_joining = $request->date_of_joining;
        $piUserMeta->status = "active";
        $piUserMeta->action =  '1';
        $piUserMeta->login_status = "0";
        $piUserMeta->save();

        DB::commit(); // Commit the transaction

        return redirect()->route('alldetails_pi')->with('success', 'PI Metadata added successfully.');
    } catch (\Exception $e) {
        dd($e);
        DB::rollBack(); // Rollback on error
        return redirect()->back()->with('error', 'Error saving PI Metadata: ' . $e->getMessage());
    }
}


/**** View Pi ******/

public function hs_viewallpi(){
    $allpi = User::with('pi')->where('type', 'pi')->paginate(10);

    $pi_count = PIUserMeta::count(); 
    $active_pi = PIUserMeta::where('status', 'active')->count();
    $inactive_pi = PIUserMeta::where('status', 'inactive')->count();
     return view('superadmin.pages.pi.piList',['allpi'=>$allpi,'pi_count'=>$pi_count,'active_pi'=>$active_pi,'inactive_pi'=>$inactive_pi]);
}




/******View Pi Single details*******/

public function hs_viewpi ($id){
    $pi = User::with('pi')->where('id',$id)->first();
    $students=StudentUserMeta::with('user_data')->where('pi_id',$id)->paginate(5000); 
    $bookings=BookingInstrument::with('instrument')->where('user_id',$id)->paginate(5);
     return view('superadmin.pages.pi.viewPi',['pi'=>$pi,'students'=>$students,'bookings'=>$bookings]);

}

}
