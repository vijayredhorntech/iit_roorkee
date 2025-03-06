<?php

namespace App\Http\Controllers\PI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PIUserMeta;
use App\Models\Instrument;
use App\Models\Lab;
use App\Models\BookingInstrument;
use App\Repositories\BookingInstrumentRepositoryInterface;
use Carbon\Carbon;


class BookingController extends Controller
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

        $booking = $this->bookingRepository->getInstrumentsById($userId,'pi');

        $pi=$booking['pi']; 
        $instruments=$booking['instruments'];
        return view('pi.pages.booking.bookInstrument', ['pi'=>$pi ,'instruments'=>$instruments]);
    
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

        return redirect()->route('viewpi.booking')->with('success', 'Booking created successfully!');
     
    }




      /***********VIew Booking ********/
  public function hs_viewbooking(){

   /****Get Booking Data ******/
   $booking = $this->bookingRepository->getAll('pi');
   $pi=$booking['pi']; 
   $bookings=$booking['bookings'];

     return view('pi.pages.booking.bookingList', ['pi'=>$pi ,'bookings'=>$bookings]);

  }


   /******Get Instrumentbooking according date ********/
  public function hs_getinstrumentbooking(Request $request){

//    dd($request->all());
 
$startLimit = Carbon::createFromTime(9, 0, 0); // 9:00 AM
$endLimit = Carbon::createFromTime(18, 0, 0); // 6:00 PM

$bookings = BookingInstrument::where('date', $request->booking_date)->where('instrument_id',$request->instrument)->get(['start_time', 'end_time']);


 // Check if the instrument exists
 if (!$bookings) {
    return response()->json(['message' => 'Booking not found not found'], 404);
}

// Return instrument details as JSON response
return response()->json($bookings);


  }

  /******Route for superradmin******/
  public function hs_getbooking(){

    $bookings = $this->bookingRepository->getBothBooking();
      return view('superadmin.pages.booking.bookingList', ['bookings'=>$bookings]);
  }
}
