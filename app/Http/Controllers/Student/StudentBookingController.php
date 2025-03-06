<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PIUserMeta;
use App\Models\Instrument;
use App\Models\Lab;
use App\Models\BookingInstrument;
use App\Repositories\BookingInstrumentRepositoryInterface;
use Carbon\Carbon;


class StudentBookingController extends Controller
{
    
    protected BookingInstrumentRepositoryInterface $bookingRepository;

    
    public function __construct(BookingInstrumentRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }


     /**
     * Get a single booking by ID.
     */
    public function show()
    {
        
        $userId = auth()->id();
        $booking = $this->bookingRepository->findById($userId);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return response()->json($booking);
    }


    
    /*****booking INdex******/
    public function hs_bookingindex(){


        $userId = auth()->id();
          
        /****Get Booking Data ******/
        // dd($userId);
        $booking = $this->bookingRepository->getInstrumentsById($userId,'student');
     

        $student=$booking['student']; 
        $instruments=$booking['instruments'];
     
        // return view('student.dashboard',['student'=>$student]);
        return view('student.pages.booking.bookInstrument', ['student'=>$student ,'instruments'=>$instruments]);
    
    }



    /******Get Instrument ********/
    public function hs_getinstrument(Request $request) {
       
        $instrument = Instrument::with([
            'purchaseInformation',
            'instrumentDocument',
            'serviceengineerInformation',
            'labInformation',
            'instrumentsCategory',
            'warrantyInformation'
        ])->where('id', $request->instrument)->first(); 
    
        // Check if the instrument exists
        if (!$instrument) {
            return response()->json(['message' => 'Instrument not found'], 404);
        }
    
        // Return instrument details as JSON response
        return response()->json($instrument);
  
    }


    /******Get Index********/
    public function hs_storebooking(Request $request){
        $validatedData = $request->validate([
            'instrument_id' => 'required|exists:instruments,id', // Ensures the instrument exists
            'booking_date' => 'required|date|after_or_equal:today', // Ensures a valid date, not past
            'select_time' => 'required', // Ensures a valid time format like "09:00 AM"
            'end_time' => 'required',
            'additional_notes' => 'nullable|string|max:500', // Optional but must be a string
        ]);
        
       
        $booking = $this->bookingRepository->create($validatedData);

        return redirect()->route('viewstudent.booking')->with('success', 'Booking created successfully!');
     
    }




      /***********VIew Booking ********/
  public function hs_viewbooking(){

   /****Get Booking Data ******/

   $booking = $this->bookingRepository->getAll('student');
//    dd($booking);
   $student=$booking['student']; 
   $bookings=$booking['bookings'];

     return view('student.pages.booking.bookingList', ['student'=>$student ,'bookings'=>$bookings]);

  }


   /******Get Instrumentbooking according date ********/
  public function hs_getinstrumentbooking(Request $request){

//    dd($request->all());
 
$startLimit = Carbon::createFromTime(9, 0, 0); // 9:00 AM
$endLimit = Carbon::createFromTime(18, 0, 0); // 6:00 PM

$bookings = BookingInstrument::where('date', $request->booking_date)->where('instrument_id',$request->instrument)->get(['start_time', 'end_time']);

// foreach ($bookings as $booking) {
//     $startTime = Carbon::parse($booking->start_time);
//     $endTime = Carbon::parse($booking->end_time);

//     if ($startTime->between($startLimit, $endLimit) && $endTime->between($startLimit, $endLimit)) {
//         dd('check');
//          return response()->json(['message' => 'All slot are Booked on this date'], 400);
//     }
// }

 // Check if the instrument exists
 if (!$bookings) {
    return response()->json(['message' => 'Booking not found not found'], 404);
}

// Return instrument details as JSON response
return response()->json($bookings);


  }
}
