@extends('superadmin.layout.layout')
@section('content')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">

    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
        <span class="font-semibold text-primary text-xl">Student Update</span>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div id="formDiv" class="w-full border-b-[2px] border-b-ternary/10 shadow-lg shadow-ternary/20">
    <form action="{{ route('update.student_store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           
           <input type="hidden" name="student_id" value="{{$student->id}}">

           <input type="hidden" name="pi_id" value="{{$student->student->pi_id}}">
            <div class="w-full grid xl:grid-cols-4 gap-2 p-4">
                <!-- <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Principal Investigator <span class="text-danger">*</span></label>
                    <select name="pi_id" id="pi_select" value="{{$student->piname->name ?? ''}}"  required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">--- Select PI ---</option>

                    @forelse($pilist as $pi)
                        <option value="{{ $pi->id }}">{{ $pi->pi->title }} {{ $pi->name }} {{ $pi->pi->last_name }}</option>
                    @empty
                        <option value="1">No PI found</option>
                    @endforelse

                      
                    </select>
                </div> -->
              

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">First Name <span class="text-danger">*</span></label>
                    <input type="text" name="first_name" value="{{$student->name ?? ''}}" required placeholder="Enter first name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>
                @if ($errors->has('first_name'))
                    <span class="text-red-500">{{ $errors->first('first_name') }}</span>
                @endif
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Last Name <span class="text-danger">*</span></label>
                    <input type="text" name="last_name" value="{{$student->student->lastname ?? ''}}" required placeholder="Enter last name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>
                @if ($errors->has('last_name'))
                    <span class="text-red-500">{{ $errors->first('last_name') }}</span>
                @endif

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Student Academic  ID <span class="text-danger">*</span></label>
                    <input type="text" name="student_aid" value="{{$student->student->student_id  ?? ''}}" required placeholder="Enter student ID" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>

                @if ($errors->has('student_aid'))
                    <span class="text-red-500">{{ $errors->first('student_aid') }}</span>
                @endif
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Department <span class="text-danger">*</span></label>
                    <select name="department" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                        <option value="">--- Select department ---</option>
                        <option value="Chemistry" {{ old('department', $student->student->department ?? '') == 'Chemistry' ? 'selected' : '' }}>Chemistry</option>
                    <option value="Physics" {{ old('department', $student->student->department ?? '') == 'Physics' ? 'selected' : '' }}>Physics</option>
                    <option value="Mathematics" {{ old('department', $student->student->department ?? '') == 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                    <option value="Biology" {{ old('department', $student->student->department ?? '') == 'Biology' ? 'selected' : '' }}>Biology</option>
                    <option value="Computer Science" {{ old('department', $student->student->department ?? '') == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                    <option value="Engineering" {{ old('department', $student->student->department ?? '') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                    <option value="Medicine" {{ old('department', $student->student->department ?? '') == 'Medicine' ? 'selected' : '' }}>Medicine</option>
                    </select>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Year of Study <span class="text-danger">*</span></label>
                    <select name="studyyear" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                        <option value="">--- Select year ---</option>
                        <option value="1" {{ old('studyyear', $student->student->student_year ?? '') == '1' ? 'selected' : '' }}>1 year</option>
                        <option value="2" {{ old('studyyear', $student->student->student_year ?? '') == '2' ? 'selected' : '' }}>2 year</option>
                        <option value="3" {{ old('studyyear', $student->student->student_year ?? '') == '3' ? 'selected' : '' }}>3 year</option>
                        
                    </select>
                </div>

                @if ($errors->has('studyyear'))
                    <span class="text-red-500">{{ $errors->first('studyyear') }}</span>
                @endif

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Email (institutional) <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{$student->email ?? ''}}" required placeholder="Enter institutional email" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>

                @if ($errors->has('email'))
                    <span class="text-red-500">{{ $errors->first('email') }}</span>
                @endif

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Alternative Email</label>
                    <input type="email" name="alt_email" value="{{$student->student->altemail ?? ''}}"  placeholder="Enter alternative email" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Mobile Number <span class="text-danger">*</span></label>
                    <input type="tel" name="mobile" value="{{$student->student->mobile_number ?? ''}}"  required placeholder="Enter mobile number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('mobile'))
                    <span class="text-red-500">{{ $errors->first('mobile') }}</span>
                   @endif
                </div>
            
              

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Research Topic/Area (optional)</label>
                    <input type="text" name="research_area" value="{{$student->student->research_area ?? ''}}"   placeholder="Enter research topic/area" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>
         
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Address <span class="text-danger">*</span></label>
                    <textarea name="address" required rows="2" placeholder="Enter address" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">{{$student->student->address ?? ''}}
                    </textarea>
                </div>
              
                <div class="w-full flex flex-col gap-1">
                <label class="font-semibold text-primary">Status <span class="text-danger">*</span></label>
                <label>
                    <input type="radio" name="status"  value="active" {{ old('status', $pi->status ?? '') == 'active' ? 'checked' : '' }}> Active
                </label>
                <label>
                    <input type="radio" name="status" value="inactive" {{ old('status', $pi->status ?? '') == 'inactive' ? 'checked' : '' }}> Inactive
                </label>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Profile Photo</label>
                    <input type="file" name="profile_photo" accept="image/*" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                 
                    <img src="{{ isset($student->profile_name) ? asset($student->profile_name) : '' }}" 
                    alt="NO Photo" 
                    class="w-48 h-48 rounded-full object-cover border-4 border-primary/20">
                </div>
               
              
            </div>
            <div class="w-full flex justify-end px-4 pb-4 gap-2">
                <a href="{{route('dashboard')}}" class="text-sm bg-primary/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Back</a>
                <button type="submit" class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Update Student</button>
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