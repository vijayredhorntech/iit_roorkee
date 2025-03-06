<?php 
namespace App\Repositories;

use App\Models\BookingInstrument;
use App\Models\Instrument;
use App\Models\User;
use App\Jobs\SaveBookingJob;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;




class BookingInstrumentRepository implements BookingInstrumentRepositoryInterface
{
    public function create(array $data): BookingInstrument
    {
       
   
        $userId = auth()->id();
        if (!$userId) {
            throw new \Exception("User not authenticated.");
        }
    
         
        // Convert booking time format and calculate end time
        // $time = Carbon::now()->setTimezone(config('app.timezone'));
        // $startTime = Carbon::createFromFormat('h:i A', $data['booking_time']);
  
        // $endTime = $startTime->copy()->addHour();
             // Create booking record directly (without queue)
        return BookingInstrument::create([
            'instrument_id' => $data['instrument_id'],
            'user_id' => $userId,
            'date' => $data['booking_date'],
            'start_time' => $data['select_time'],
            'end_time' => $data['end_time'],
            'description' => $data['additional_notes'] ?? null,
        ]);

    }

    public function getAll(string $type)
    {

        $userId = auth()->id();
        $pi = User::with([$type])->where('id', $userId)->first();
        $bookings = BookingInstrument::with('instrument')
        ->where('user_id', $userId)
        ->orderBy('date', 'desc') 
        ->orderBy('start_time', 'desc') 
        ->paginate(10);
          if($type=="pi"){
            return [
                'pi' => $pi,
                'bookings' => $bookings
            ];
        }else{
            return [
                'student' => $pi,
                'bookings' => $bookings
            ];
        }
       
        // return BookingInstrument::with(['user', 'instrument'])->get();
    }

    public function findById(int $id): ?BookingInstrument
    {
       
        return BookingInstrument::find($id);
    }

    /******Function for get Instrument with labInformation And  */
    public function getInstrumentsById(int $userId, string $type){

       
        $userId = auth()->id();
        $pi = User::with([$type])->where('id', $userId)->first();
        $instruments=Instrument::with('labInformation')->get(); 

        if($type=="pi"){
            return [
                'pi' => $pi,
                'instruments' => $instruments
            ];
        }else{
            return [
                'student' => $pi,
                'instruments' => $instruments
            ];
        }
        // return [
        //     'pi' => $pi,
        //     'instruments' => $instruments
        // ];
    }
}
