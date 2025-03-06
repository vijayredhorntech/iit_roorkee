<?php

namespace App\Http\Controllers\PI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PIUserMeta;
use App\Models\Instrument;
use App\Models\Lab;
use App\Repositories\BookingInstrumentRepositoryInterface;

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
            'booking_time' => 'required|date_format:h:i A', // Ensures a valid time format like "09:00 AM"
            'additional_notes' => 'nullable|string|max:500', // Optional but must be a string
        ]);
        
       
        $booking = $this->bookingRepository->create($validatedData);
        dd($booking);
    }
}
