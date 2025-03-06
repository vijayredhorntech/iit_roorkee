<?php

namespace App\Jobs;

use Illuminate\Foundation\Queue\Queueable;
use App\Models\BookingInstrument;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SaveBookingJob implements ShouldQueue
{
    use Queueable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The booking details.
     *
     * @var array
     */
    protected array $bookingData;

    /**
     * Create a new job instance.
     *
     * @param array $bookingData
     */
    public function __construct(array $bookingData)
    {
        $this->bookingData = $bookingData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $userId = Auth::id(); // Get authenticated user ID

        // Calculate end_time (start_time + 1 hour)
        $startTime = Carbon::createFromFormat('h:i A', $this->bookingData['booking_time']);
        $endTime = $startTime->addHour()->format('H:i:s'); // Convert to 24-hour format

        // Create and save booking
        $booking = new BookingInstrument();
        $booking->instrument_id = $this->bookingData['instrument_id'];
        $booking->user_id = $userId;
        $booking->date = $this->bookingData['booking_date'];
        $booking->start_time = $startTime->format('H:i:s'); // Convert to 24-hour format
        $booking->end_time = $endTime;
        $booking->description = $this->bookingData['additional_notes'] ?? null;
        $booking->save();
        // BookingInstrument::create($this->bookingData);
    }

}
