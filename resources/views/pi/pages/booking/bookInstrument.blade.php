@extends('pi.layout.layout')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


<div class="w-full flex flex-col gap-4">
    <!-- User Information Section -->
    <div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col">
        <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20">
            <span class="font-semibold text-primary text-lg">User Information</span>
        </div>

        <div class="p-4 grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
            <div class="flex flex-col gap-1">
                <span class="text-sm text-gray-600">Name</span>
                <span class="font-medium text-ternary">{{$pi->name}}</span>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-sm text-gray-600">Department</span>
                <span class="font-medium text-ternary">{{$pi->pi->department}}</span>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-sm text-gray-600">Email</span>
                <span class="font-medium text-ternary">{{$pi->email}}</span>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-sm text-gray-600">Contact</span>
                <span class="font-medium text-ternary">{{$pi->pi->phone_number}}</span>
            </div>
        </div>
    </div>
   
    <form action="{{ route('pi.storebooking') }}" method="POST" enctype="multipart/form-data">
    @csrf
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
                    <select name="instrument_id" id="instrument_select"   required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                      <option value="">--- Select Lab ---</option>
               
                           @forelse($instruments as $instrument)
                 
                                <option value="{{$instrument->id }}">{{ $instrument->name }} - {{ $instrument->labInformation->name}}</option>
                           @empty
                                <option >No PI found</option>
                           @endforelse
                                  </select>

                            @if ($errors->has('lab_id'))
                                <span class="text-red-500">{{ $errors->first('lab_id') }}</span>
                            @endif 
                     </div>

                <!-- Date Selection -->
                <div class="flex flex-col gap-2">
                    <label class="text-sm text-gray-600">Select Date</label>
                    <input type="date" name="booking_date" class="w-full border-[1px] border-secondary/20 rounded-md px-3 py-2 focus:outline-none focus:border-secondary">
                </div>

                <!-- Instrument Details -->
                <div class="mt-4 p-4 bg-gray-50 rounded-md " id="instrument_details">
                    <h3 class="font-semibold text-ternary mb-2">Instrument Details</h3>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <span class="text-gray-600">Location:</span>
                        <span id="location"></span>
                        <span class="text-gray-600">Cost per Hour:</span>
                        <span id="costperhour">₹1,500</span>
                        <span class="text-gray-600">Status:</span>
                        <span class="text-success font-medium" id="status">Available</span>
                    </div>
                </div>

                <!-- Instrument Photos -->
                <div class="mt-4" id="instrument_photos">
                    <h3 class="font-semibold text-ternary mb-2">Instrument Photos</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3" id="imagesContainer">
                       
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
                            <button class="px-4 py-2 bg-success/10 text-success rounded hover:bg-success/20 text-sm time_vlaue">09:00 AM</button>
                            <button class="px-4 py-2 bg-danger/10 text-danger rounded cursor-not-allowed text-sm time_vlaue">10:00 AM</button>
                            <button class="px-4 py-2 bg-warning/10 text-warning rounded hover:bg-warning/20 text-sm time_vlaue">11:00 AM</button>
                            <button class="px-4 py-2 bg-success/10 text-success rounded hover:bg-success/20 text-sm time_vlaue">12:00 PM</button>
                        </div>
                    </div>

                    <!-- Afternoon Slots -->
                    <div class="col-span-4 mt-4">
                        <h3 class="font-medium text-ternary mb-2">Afternoon</h3>
                        <div class="grid grid-cols-4 gap-2">
                            <button class="px-4 py-2 bg-danger/10 text-danger rounded cursor-not-allowed text-sm time_vlaue">01:00 PM</button>
                            <button class="px-4 py-2 bg-success/10 text-success rounded hover:bg-success/20 text-sm time_vlaue">02:00 PM</button>
                            <button class="px-4 py-2 bg-success/10 text-success rounded hover:bg-success/20 text-sm time_vlaue">03:00 PM</button>
                            <button class="px-4 py-2 bg-warning/10 text-warning rounded hover:bg-warning/20 text-sm time_vlaue">04:00 PM</button>
                        </div>
                    </div>

                    <!-- Evening Slots -->
                    <div class="col-span-4 mt-4">
                        <h3 class="font-medium text-ternary mb-2">Evening</h3>
                        <div class="grid grid-cols-4 gap-2">
                            <button class="px-4 py-2 bg-success/10 text-success rounded hover:bg-success/20 text-sm time_vlaue">05:00 PM</button>
                            <button class="px-4 py-2 bg-success/10 text-success rounded hover:bg-success/20 text-sm time_vlaue">06:00 PM</button>
                        </div>
                    </div>

                    <input type="hidden" name="booking_time" id="booking_time"> 
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
                    <!-- <form class="flex flex-col gap-4"> -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm text-gray-600">Additional Notes</label>
                            <textarea  name="additional_notes" class="w-full border-[1px] border-success/20 rounded-md px-3 py-2 focus:outline-none focus:border-success h-24 resize-none" placeholder="Enter any additional requirements or notes"></textarea>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {

        $("#instrument_photos").hide(); 
        $("#instrument_details").hide(); 


        $('#instrument_select').select2({
            placeholder: "--- Select  ---",
            allowClear: true
        });

        jQuery(document).on("click", ".time_vlaue", function (e) {
            e.preventDefault(); // Ensure this is only used if necessary
            var time = jQuery(this).text(); 
            jQuery("#booking_time").val(time);
        });


        // Run AJAX when an option is selected
        $('#instrument_select').on('change', function() {
    var selectedValue = $(this).val(); 

    if (selectedValue) {
        $.ajax({
            url: "{{ route('pi.getinstrument') }}", // Use Laravel route helper
            type: 'POST', 
            data: {
                instrument: selectedValue,
                _token: $('meta[name="csrf-token"]').attr('content') // CSRF token for security
            },
            dataType: 'json',
            success: function(response) {
           
            //    lab information set

            jQuery("#location").html(
                        response.lab_information.name + " - " + 
                        response.lab_information.building + " " + 
                        response.lab_information.floor + "/" + 
                        response.lab_information.department
                    );

            jQuery("#costperhour").html(
                      "₹" +response.per_hour_cost  
                     );

            // <span class="text-gray-600">Location:</span>
            //             <span id="location"></span>
            //             <span class="text-gray-600">Cost per Hour:</span>
            //             <span id="costperhour">₹1,500</span>
            //             <span class="text-gray-600">Status:</span>
            //             <span class="text-success font-medium" id="status">Available</span>


               //images set 
                var baseUrl = "{{ asset('') }}";
                let imagesContainer = $('#imagesContainer'); // The div where images will be added
                imagesContainer.html(''); // Clear previous images before appending new ones

                if (response.instrument_document?.instrument_photos) {
                    let photos = response.instrument_document.instrument_photos;

                    // Convert JSON string to an array if necessary
                    if (typeof photos === "string") {
                        photos = JSON.parse(photos);
                    }

                    // Check if it's a valid array before looping
                    if (Array.isArray(photos)) {
                        photos.forEach((image, index) => {
                            let imageUrl = baseUrl + image;// Replace with your actual domain or use asset()
                            let imageHtml = `
                                <div class="aspect-square overflow-hidden rounded-lg border border-secondary/20 group cursor-pointer">
                                    <img src="${imageUrl}" alt="Instrument Photo ${index + 1}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                </div>
                            `;
                            imagesContainer.append(imageHtml);
                        });
                    } else {
                        imagesContainer.html('<p>No images found</p>');
                    }

                    $("#instrument_photos").show(); 
                    $("#instrument_details").show(); 
                } else {
                    imagesContainer.html('<p>No images found</p>');
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
            }
        });
    }
});



    });
     


  
</script>


@endpush