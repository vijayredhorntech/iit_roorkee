@extends('superadmin.layout.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">

    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
        <span class="font-semibold text-primary text-xl">Lab Registration</span>
    </div>

    <div id="formDiv" class="w-full border-b-[2px] border-b-ternary/10 shadow-lg shadow-ternary/20">
    <form action="{{ route('superadmin.lab_store') }}" method="POST" enctype="multipart/form-data">
              @csrf
           
            <div class="w-full grid xl:grid-cols-4 gap-2 p-4">
            <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Lab Photos</label>
                    <input type="file" name="lab_photos[]" multiple accept="image/*" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Lab Name <span class="text-danger">*</span></label>
                    <input type="text" name="lab_name" value="{{ old('lab_name') }}" required placeholder="Enter lab name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('lab_name'))
                    <span class="text-red-500">{{ $errors->first('lab_name') }}</span>
                @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Department <span class="text-danger">*</span></label>
                    <select name="department" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                        <option value="">--- Select department ---</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Physics">Physics</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Biology">Biology</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Medicine">Medicine</option>
                    </select>
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Building/Block <span class="text-danger">*</span></label>
                    <input type="text" name="building" required   value="{{ old('building') }}" placeholder="Enter building/block" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('building'))
                    <span class="text-red-500">{{ $errors->first('building') }}</span>
                @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Floor <span class="text-danger">*</span></label>
                    <input type="text" name="floor" value="{{ old('floor') }}"  required placeholder="Enter floor" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('floor'))
                    <span class="text-red-500">{{ $errors->first('floor') }}</span>
                @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Room Number <span class="text-danger">*</span></label>
                    <input type="text" name="room_number" value="{{ old('room_number') }}" required placeholder="Enter room number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('room_number'))
                    <span class="text-red-500">{{ $errors->first('room_number') }}</span>
                @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Lab Type <span class="text-danger">*</span></label>
                    <select name="lab_type" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                        <option value="">--- Select lab type ---</option>
                        <option value="Experimental">Experimental</option>
                        <option value="Non-experimental">Non-experimental</option>
                    </select>
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Lab Manager (PI Reference) <span class="text-danger">*</span></label>
                    <select name="lab_manager" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                        <option value="">--- Select lab manager ---</option>
                        <option value="1">Dr. Rajesh Kumar</option>
                        <option value="2">Dr. Priya Singh</option>
                    </select>
                    <!-- <select name="lab_manager" id="pi_select"  required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">--- Select PI ---</option>

                    @forelse($pilist as $pi)
                        <option value="{{ $pi->id }}">{{ $pi->pi->title }} {{ $pi->name }} {{ $pi->pi->last_name }}</option>
                    @empty
                        <option value="1">No PI found</option>
                    @endforelse

                      
                    </select> -->
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Contact Number <span class="text-danger">*</span></label>
                    <input type="tel" name="contact_number" value="{{ old('contact_number') }}" required placeholder="Enter contact number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('contact_number'))
                    <span class="text-red-500">{{ $errors->first('contact_number') }}</span>
                @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Working Hours <span class="text-danger">*</span></label>
                    <input type="text" name="working_hours"  value="{{ old('working_hours') }}" required placeholder="Enter working hours" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('working_hours'))
                    <span class="text-red-500">{{ $errors->first('working_hours') }}</span>
                @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Maximum Capacity <span class="text-danger">*</span></label>
                    <input type="number" name="max_capacity" value="{{ old('max_capacity') }}" required placeholder="Enter maximum capacity" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('max_capacity'))
                    <span class="text-red-500">{{ $errors->first('max_capacity') }}</span>
                @endif
                </div>
       
                <div class="w-full flex flex-col gap-1 col-span-2">
                    <label class="font-semibold text-primary">Description</label>
                    <textarea name="description" rows="2" value="{{ old('description') }}" placeholder="Enter lab description" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                    @if ($errors->has('description'))
                    <span class="text-red-500">{{ $errors->first('description') }}</span>
                @endif
                </div>
                <div class="w-full flex flex-col gap-1 col-span-2">
                    <label class="font-semibold text-primary">Safety Guidelines</label>
                    <textarea name="safety_guidelines" rows="2" value="{{ old('safety_guidelines') }}" placeholder="Enter safety guidelines" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                    @if ($errors->has('safety_guidelines'))
                    <span class="text-red-500">{{ $errors->first('safety_guidelines') }}</span>
                @endif
                </div>
                <div class="w-full flex flex-col gap-1 col-span-2">
                    <label class="font-semibold text-primary">Special Requirements/Notes</label>
                    <textarea name="special_requirements" value="{{ old('special_requirements') }}" rows="2" placeholder="Enter special requirements or notes" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                    @if ($errors->has('special_requirements'))
                    <span class="text-red-500">{{ $errors->first('special_requirements') }}</span>
                @endif
                </div>
            </div>
            <div class="w-full flex justify-end px-4 pb-4 gap-2">
                <a href="{{route('dashboard')}}" class="text-sm bg-primary/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Back</a>
                <button type="submit" class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Create Lab</button>
            </div>
        </form>
    </div>
</div>


<!-- jQuery (Required for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#pi_select').select2({
            placeholder: "--- Select PI ---",
            allowClear: true
        });
    });
</script>
@endsection