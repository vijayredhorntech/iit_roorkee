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
use App\Events\UserRegistered;
use App\Contracts\PIRepositoryInterface;
use Carbon\Carbon;


class PIController extends Controller
{
    
    protected $piRepository;

    public function __construct(PIRepositoryInterface $piRepository)
    {
        $this->piRepository = $piRepository;
    }


/*****Remove the dashboard */
public function hs_dashboard(){
   
  
        $lab_count = Lab::count(); 
        $pi_count = PIUserMeta::count(); 
        $student_count = StudentUserMeta::count(); // Fixed typo from $student_cout to $student_count
        $total_instrument = Instrument::count();
        $total_booking=BookingInstrument::count(); 
        $total_instrumentcategory=InstrumentsCategory::count(); 
        // $topInstruments = BookingInstrument::select('instrument_id', DB::raw('COUNT(*) as total_bookings'))
        // ->groupBy('instrument_id')
        // ->orderByDesc('total_bookings')
        // ->limit(5)
        // ->get();
        $allBookings = BookingInstrument::with('instrument')
        ->whereBetween('date', [
            now()->subMonth()->startOfMonth()->toDateString(), 
            now()->subMonth()->endOfMonth()->toDateString()
        ])
        ->get();

        // $uniqueInstrumentSum = BookingInstrument::selectRaw('instrument_id, COUNT(*) as count')
        // ->groupBy('instrument_id')
        // ->pluck('count', 'instrument_id')
        // ->whereBetween('date', [
        //     now()->subMonth()->startOfMonth()->toDateString(), 
        //     now()->subMonth()->endOfMonth()->toDateString()
        // ])
        // ->select('instrument_id') // Ensures only one value per instrument_id
        // ->groupBy('instrument_id') // Groups by unique instruments
        // ->pluck('instrument_id')
        // ->sum();

        Instrument::selectRaw('operation_status, COUNT(*) as count')
        ->groupBy('operation_status')
        ->pluck('count', 'operation_status');
    

    // $currentMonthSum = $currentMonthData->sum('amount');

   
        $counts = Instrument::selectRaw('operation_status, COUNT(*) as count')
        ->groupBy('operation_status')
        ->pluck('count', 'operation_status');
      
        $topInstruments = BookingInstrument::with('instrument')->select('instrument_id', DB::raw('COUNT(*) as total_bookings'))
        ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
        ->groupBy('instrument_id')
        ->orderByDesc('total_bookings')
        ->limit(10)
        ->get();
        // dd($topInstruments);

        $instrumentSummary = Instrument::with('instrumentsCategory')->select(
            'category_type',
            DB::raw('COUNT(*) as total_instruments'),
            DB::raw('SUM(CASE WHEN operation_status = "working" THEN 1 ELSE 0 END) as working_instruments')
        )
        ->groupBy('category_type')
        // ->limit(10)
        ->get();

        // dd($instrumentSummary); 
       
        // dd($allBookings);

    
        return view('superadmin.dashboard', compact('lab_count', 'pi_count', 'student_count', 
        'total_instrument','total_booking','total_instrumentcategory','allBookings','counts','topInstruments','instrumentSummary'));
 
    

    
 
    // return view('superadmin.dashboard');
}



    /*******pi create ******/

    public function hs_picreste(){
      
        return view('superadmin.pages.pi.createPi');
    }

    
    
    /****Store pi ******/

    public function hs_pistore(Request $request)
{

 
   $validate=$request->validate([
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

    $data=$request->all();
    $pi =$this->piRepository->create($data);


        return redirect()->route('alldetails_pi')->with('success', 'PI Metadata added successfully.');
    
}


/**** View Pi ******/

public function hs_viewallpi(){
    $allpi = User::with('pi')->where('type', 'pi')->paginate(10);

    $pi_count = PIUserMeta::count(); 
    $active_pi = User::where('status', 'active')->where('type','pi')->count();
    $inactive_pi = User::where('status', 'inactive')->where('type','pi')->count();
     return view('superadmin.pages.pi.piList',['allpi'=>$allpi,'pi_count'=>$pi_count,'active_pi'=>$active_pi,'inactive_pi'=>$inactive_pi]);
}




/******View Pi Single details*******/

public function hs_viewpi ($id){
    $pi = User::with('pi')->where('id',$id)->first();
    $students=StudentUserMeta::with('user_data')->where('pi_id',$id)->paginate(5000); 
    $bookings=BookingInstrument::with('instrument')->where('user_id',$id)->paginate(5);
     return view('superadmin.pages.pi.viewPi',['pi'=>$pi,'students'=>$students,'bookings'=>$bookings]);

}




public function hs_editpi($id){ 

    // $pi = User::with('pi')->where('id',$id)->first();
    $pi =$this->piRepository->find($id);
    return view('superadmin.pages.pi.updatePi',['pi'=>$pi]);
}


public function hs_updatepi(Request $request){
    // dd($request->all()); 
    $validate=$request->validate([
        'pi_id'=>'required',
        'first_name' => 'required|string|max:100',
        'email' =>       'required|email',
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
    $data=$request->all();
    $pi =$this->piRepository->update($request->pi_id,$data);
    return redirect()->route('alldetails_pi')->with('success', 'PI Metadata added successfully.');
}




public function hs_piserach(Request $request)
{
    $query = User::with('pi')->where('type', 'pi'); // Start query with relation & type filter

    if ($request->filled('search')) {
        $search = $request->search; 
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });

        // if ($request->filled('status') || $request->status !== 'All') {
        //     $query->where('status', $request->status); // Direct match for ENUM field

        // }

        $users = $query->get(); // Prevent duplicate records

        // dd($users);
        return response()->json($users);
    }

    if ($request->filled('status') && $request->status !== 'all') {
        
        $query->where('status', $request->status); // Direct match for ENUM field
    }else{
    
        $users = $query->get(); // Prevent duplicate records

        // dd($users);
        return response()->json($users);
    }

    $users = $query->get(); // Prevent duplicate records

    return response()->json($users); // Return results as JSON
}





} 
