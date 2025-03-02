@extends('layout.layout')
@section('content')
<div class="w-full flex flex-col gap-4">
    <!-- User Information Section -->
    <div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col">
        <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20">
            <span class="font-semibold text-primary text-lg">User Information</span>
        </div>
        <div class="p-4 grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
            <div class="flex flex-col gap-1">
                <span class="text-sm text-gray-600">Name</span>
                <span class="font-medium text-ternary">John Doe</span>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-sm text-gray-600">Department</span>
                <span class="font-medium text-ternary">Computer Science</span>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-sm text-gray-600">Email</span>
                <span class="font-medium text-ternary">john.doe@iitr.ac.in</span>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-sm text-gray-600">Contact</span>
                <span class="font-medium text-ternary">+91 98765 43210</span>
            </div>
        </div>
    </div>

    <!-- Booking Section -->
    <div class="w-full grid xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-1 grid-cols-1 gap-4">
        <!-- Left Side - Instrument Selection & Date -->
        <div class="w-full border-[1px] border-t-[4px] border-secondary/20 border-t-secondary bg-white flex gap-2 flex-col">
            <div class="bg-secondary/10 px-4 py-2 border-b-[2px] border-b-secondary/20">
                <span class="font-semibold text-secondary text-lg">Select Instrument & Date</span>
            </div>
            <div class="p-4 flex flex-col gap-4">
                <!-- Instrument Selection -->
                <div class="flex flex-col gap-2">
                    <label class="text-sm text-gray-600">Select Instrument</label>
                    <select class="w-full border-[1px] border-secondary/20 rounded-md px-3 py-2 focus:outline-none focus:border-secondary">
                        <option value="">Select an instrument</option>
                        <option value="1">Microscope - Lab 1</option>
                        <option value="2">Spectrometer - Lab 2</option>
                        <option value="3">Analyzer - Lab 3</option>
                    </select>
                </div>

                <!-- Date Selection -->
                <div class="flex flex-col gap-2">
                    <label class="text-sm text-gray-600">Select Date</label>
                    <input type="date" class="w-full border-[1px] border-secondary/20 rounded-md px-3 py-2 focus:outline-none focus:border-secondary">
                </div>

                <!-- Instrument Details -->
                <div class="mt-4 p-4 bg-gray-50 rounded-md">
                    <h3 class="font-semibold text-ternary mb-2">Instrument Details</h3>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <span class="text-gray-600">Location:</span>
                        <span>Lab 1, Block A</span>
                        <span class="text-gray-600">Cost per Hour:</span>
                        <span>₹1,500</span>
                        <span class="text-gray-600">Status:</span>
                        <span class="text-success font-medium">Available</span>
                    </div>
                </div>

                <!-- Instrument Photos -->
                <div class="mt-4">
                    <h3 class="font-semibold text-ternary mb-2">Instrument Photos</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <div class="aspect-square overflow-hidden rounded-lg border border-secondary/20 group cursor-pointer">
                            <img src="https://www.hitachi-hightech.com/my/en/media/su8600_main_tcm41-57046.png" alt="Instrument Photo 1" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="aspect-square overflow-hidden rounded-lg border border-secondary/20 group cursor-pointer">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQFpCJWbozxVrcvSW-J850ZMSOA5_FXDopeg&s" alt="Instrument Photo 2" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="aspect-square overflow-hidden rounded-lg border border-secondary/20 group cursor-pointer">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9u57QmVaVbIsRo3HEiBmi98at59HP5R9Mhg&s" alt="Instrument Photo 3" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="aspect-square overflow-hidden rounded-lg border border-secondary/20 group cursor-pointer">
                            <img src="https://www.hitachi-hightech.com/in/en/media/su3800_main_tcm38-53139.png" alt="Instrument Photo 4" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Time Slots -->
        <div class="w-full border-[1px] border-t-[4px] border-success/20 border-t-success bg-white flex gap-2 flex-col">
            <div class="bg-success/10 px-4 py-2 border-b-[2px] border-b-success/20">
                <span class="font-semibold text-success text-lg">Available Time Slots</span>
            </div>
            <div class="p-4">
                <div class="grid grid-cols-4 gap-2">
                    <!-- Morning Slots -->
                    <div class="col-span-4">
                        <h3 class="font-medium text-ternary mb-2">Morning</h3>
                        <div class="grid grid-cols-4 gap-2">
                            <button class="px-4 py-2 bg-success/10 text-success rounded hover:bg-success/20 text-sm">09:00 AM</button>
                            <button class="px-4 py-2 bg-danger/10 text-danger rounded cursor-not-allowed text-sm">10:00 AM</button>
                            <button class="px-4 py-2 bg-warning/10 text-warning rounded hover:bg-warning/20 text-sm">11:00 AM</button>
                            <button class="px-4 py-2 bg-success/10 text-success rounded hover:bg-success/20 text-sm">12:00 PM</button>
                        </div>
                    </div>

                    <!-- Afternoon Slots -->
                    <div class="col-span-4 mt-4">
                        <h3 class="font-medium text-ternary mb-2">Afternoon</h3>
                        <div class="grid grid-cols-4 gap-2">
                            <button class="px-4 py-2 bg-danger/10 text-danger rounded cursor-not-allowed text-sm">01:00 PM</button>
                            <button class="px-4 py-2 bg-success/10 text-success rounded hover:bg-success/20 text-sm">02:00 PM</button>
                            <button class="px-4 py-2 bg-success/10 text-success rounded hover:bg-success/20 text-sm">03:00 PM</button>
                            <button class="px-4 py-2 bg-warning/10 text-warning rounded hover:bg-warning/20 text-sm">04:00 PM</button>
                        </div>
                    </div>

                    <!-- Evening Slots -->
                    <div class="col-span-4 mt-4">
                        <h3 class="font-medium text-ternary mb-2">Evening</h3>
                        <div class="grid grid-cols-4 gap-2">
                            <button class="px-4 py-2 bg-success/10 text-success rounded hover:bg-success/20 text-sm">05:00 PM</button>
                            <button class="px-4 py-2 bg-success/10 text-success rounded hover:bg-success/20 text-sm">06:00 PM</button>
                        </div>
                    </div>

                    <!-- Legend -->
                    <div class="col-span-4 mt-6 flex gap-4 text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-success/10 rounded"></div>
                            <span>Available</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-danger/10 rounded"></div>
                            <span>Booked</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-warning/10 rounded"></div>
                            <span>Notify Me</span>
                        </div>
                    </div>
                </div>

                <!-- Booking Form -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <form class="flex flex-col gap-4">
                        <div class="flex flex-col gap-2">
                            <label class="text-sm text-gray-600">Additional Notes</label>
                            <textarea class="w-full border-[1px] border-success/20 rounded-md px-3 py-2 focus:outline-none focus:border-success h-24 resize-none" placeholder="Enter any additional requirements or notes"></textarea>
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="submit" class="px-6 py-2 bg-success text-white rounded-md hover:bg-success/90">Confirm Booking</button>
                            <button type="button" class="px-6 py-2 bg-gray-100 text-ternary rounded-md hover:bg-gray-200">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Add any required JavaScript for handling bookings
</script>
@endpush