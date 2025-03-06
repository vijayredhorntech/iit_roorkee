@extends('superadmin.layout.layout')
@section('content')
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">

    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
        <span class="font-semibold text-primary text-xl">Principal Investigator (PI) Registration</span>
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
     <form action="{{ route('pi_store') }}" method="POST" enctype="multipart/form-data">
               @csrf
            <div class="w-full grid xl:grid-cols-4 gap-2 p-4">
        
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Title (Dr./Prof./etc.) <span class="text-danger">*</span></label>
                    <select name="title" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                        <option value="">--- Select title ---</option>
                        <option value="Dr.">Dr.</option>
                        <option value="Prof.">Prof.</option>
                        <option value="Assoc. Prof.">Assoc. Prof.</option>
                        <option value="Assoc. Prof. (Distinguished)">Assoc. Prof. (Distinguished)</option> 
                    </select>
                    @if ($errors->has('title'))
                    <span class="text-red-500">{{ $errors->first('title') }}</span>
                   @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">First Name <span class="text-danger">*</span></label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" required placeholder="Enter first name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('first_name'))
                    <span class="text-red-500">{{ $errors->first('first_name') }}</span>
                   @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Last Name <span class="text-danger">*</span></label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" required placeholder="Enter last name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('last_name'))
                    <span class="text-red-500">{{ $errors->first('last_name') }}</span>
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
              
                    @if ($errors->has('department'))
                    <span class="text-red-500">{{ $errors->first('department') }}</span>
                   @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Designation/Position <span class="text-danger">*</span></label>
                    <select name="designation" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                        <option value="">--- Select designation ---</option>
                        <option value="Professor">Professor</option>
                        <option value="Assistant Professor">Assistant Professor</option>
                        <option value="Associate Professor">Associate Professor</option>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Senior Lecturer">Senior Lecturer</option>
                    </select>
              
                    @if ($errors->has('designation'))
                    <span class="text-red-500">{{ $errors->first('designation') }}</span>
                   @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Email (institutional) <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="Enter institutional email" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('email'))
                    <span class="text-red-500">{{ $errors->first('email') }}</span>
                   @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Alternative Email</label>
                    <input type="email" name="alt_email" value="{{ old('alt_email') }}" placeholder="Enter alternative email" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('alt_email'))
                    <span class="text-red-500">{{ $errors->first('alt_email') }}</span>
                   @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Phone Number <span class="text-danger">*</span></label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="Enter phone number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('phone'))
                    <span class="text-red-500">{{ $errors->first('phone') }}</span>
                   @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Mobile Number</label>
                    <input type="tel" name="mobile" value="{{ old('mobile') }}" placeholder="Enter mobile number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('mobile'))
                    <span class="text-red-500">{{ $errors->first('mobile') }}</span>
                   @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Office Address <span class="text-danger">*</span></label>
                    <textarea name="office_address"   value="{{ old('office_address') }}" required rows="2" placeholder="Enter office address" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                    @if ($errors->has('office_address'))
                    <span class="text-red-500">{{ $errors->first('office_address') }}</span>
                   @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Lab/Room Number <span class="text-danger">*</span></label>
                    <input type="text" name="lab_room" value="{{ old('lab_room') }}"  required placeholder="Enter lab/room number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('lab_room'))
                    <span class="text-red-500">{{ $errors->first('lab_room') }}</span>
                   @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Specialization/Research Area <span class="text-danger">*</span></label>
                    <input type="text" name="specialization" value="{{ old('specialization') }}"  required placeholder="Enter specialization" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('specialization'))
                    <span class="text-red-500">{{ $errors->first('specialization') }}</span>
                   @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Academic Qualifications <span class="text-danger">*</span></label>
                    <select name="qualification" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                        <option value="">--- Select qualification ---</option>
                        <option value="Bachelor of Science">Bachelor of Science</option>
                        <option value="Bachelor of Arts">Bachelor of Arts</option>
                        <option value="Bachelor of Science (Honours)">Bachelor of Science (Honours)</option>
                        <option value="PhD">PhD</option>
                        <option value="Master of Science">Master of Science</option>
                        <option value="Master of Arts">Master of Arts</option>
                        <option value="Master of Science (Honours)">Master of Science (Honours)</option>
                        <option value="Other">Other</option>
                    </select>
                    @if ($errors->has('qualification'))
                    <span class="text-red-500">{{ $errors->first('qualification') }}</span>
                   @endif
                </div>
                <!-- <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Date of Joining <span class="text-danger">*</span></label>
                    <input type="date" name="joining_date" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div> -->

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Profile Photo</label>
                    <input type="file" name="profile_photo" accept="image/*" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('profile_photo'))
                    <span class="text-red-500">{{ $errors->first('profile_photo') }}</span>
                   @endif
                </div>
             
            
            </div>
            <div class="w-full flex justify-end px-4 pb-4 gap-2">
                                     <a href="{{route('dashboard')}}" class="text-sm bg-primary/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Back</a>
                                     <button type="submit" class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Create Principal Investigator</button>
                               </div>
        </form>
    </div>
</div>
@endsection