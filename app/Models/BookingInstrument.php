<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingInstrument extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'booking_instruments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'instrument_id',
        'user_id',
        'date',
        'start_time',
        'end_time',
        'description',
        'booking_status',  // Added
        'display_status',  // Added
    ];
    

    /**
     * Get the instrument that owns the booking.
     */
    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }
    

    /**
     * Get the user that owns the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
