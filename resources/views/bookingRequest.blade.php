@extends('layout.layout')
@section('content')
    <div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
        <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20">
            <span class="font-semibold text-primary text-xl">Request Instrument Booking</span>
        </div>

        <div class="w-full p-4">
            <form action="" method="POST" class="w-full grid xl:grid-cols-2 gap-4">
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Instrument <span class="text-danger">*</span></label>
                    <select name="instrument_id" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->id }}">{{ $instrument->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Purpose <span class="text-danger">*</span></label>
                    <input type="text" name="purpose" required placeholder="Enter booking purpose"
                           class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Start Date & Time <span class="text-danger">*</span></label>
                    <input type="datetime-local" name="start_datetime" required
                           class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Duration (Hours) <span class="text-danger">*</span></label>
                    <input type="number" name="duration_hours" required min="1" step="0.5" placeholder="Enter duration in hours"
                           class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>

                <div class="w-full xl:col-span-2 flex flex-col gap-1">
                    <label class="font-semibold text-primary">Special Requirements</label>
                    <textarea name="special_requirements" rows="3" placeholder="Enter any special requirements or notes"
                              class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                </div>

                <div class="w-full xl:col-span-2">
                    <div class="bg-warning/10 p-4 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] border-[2px] border-warning/40">
                        <h3 class="font-semibold text-warning mb-2">Important Notes:</h3>
                        <ul class="list-disc list-inside text-sm text-ternary/80 space-y-1">
                            <li>Bookings must be made at least 24 hours in advance</li>
                            <li>Maximum booking duration is subject to instrument policy</li>
                            <li>Cancellations must be made at least 12 hours before the scheduled time</li>
                            <li>Late cancellations may incur penalties as per lab policy</li>
                        </ul>
                    </div>
                </div>

                <div class="w-full xl:col-span-2 flex justify-end gap-2">
                    <a href="{{ route('bookings') }}"
                       class="text-sm bg-primary/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">
                        Cancel
                    </a>
                    <button type="submit"
                            class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">
                        Submit Request
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection