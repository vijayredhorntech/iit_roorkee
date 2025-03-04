@extends('superadmin.layout.layout')
@section('content')
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
        <span class="font-semibold text-primary text-xl">Lab List</span>
       
    </div>

    <div class="w-full p-4 flex flex-col gap-4">

    <div class="w-full grid xl:grid-cols-4 gap-4 mb-4">
     
     <div class="w-full flex flex-col gap-1">
         <input type="text" placeholder="Search by Name/ID" class="px-2 py-1 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
     </div>
     <div class="w-full flex flex-col gap-1">
     <select class="px-2 py-1 text-sm font-medium bg-transparent border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
     </div>
     <div class="w-full flex flex-col gap-1">
     <select class="px-2 py-1 text-sm font-medium bg-transparent border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">All Departments</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Physics">Physics</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Biology">Biology</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Medicine">Medicine</option>
                </select>
     </div>
  
     <div class="flex gap-2 justify-end">
 <button title="Export to excel" class="bg-success/20 text-success h-8 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white cursor-pointer transition ease-in duration-2000">
                 <i class="fa fa-file-excel"></i>
             </button>

             <button title="Export to pdf" class="bg-danger/20 text-danger h-8 w-8 flex justify-center items-center rounded-[3px] hover:bg-danger hover:text-white cursor-pointer transition ease-in duration-2000">
                 <i class="fa fa-file-pdf"></i>
             </button>
 </div>
 </div>


  

        <div class="w-full overflow-x-auto">
      
            <table class="w-full border-[2px] border-secondary/40 border-collapse">
    <thead>
        <tr>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Lab Name</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Department</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Location</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Lab Manager</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Contact</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Working Hours</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Status</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Actions</th>
        </tr>
    </thead>
    <tbody>

    
    @forelse($lebs as $leb)
        <!-- Sample Data Row -->

        <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">{{$leb->name}}</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">{{$leb->department}} </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">{{$leb->building}},  {{$leb->floor}}, {{$leb->room_number}} </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm"> {{$leb->manager_info->name}}  </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm"> {{$leb->contact_number}}  </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm"> {{$leb->working_hours}}  </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Active</span>
            </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <div class="flex gap-2">
                    <a href="{{route('create_lab')}}" class="text-xs bg-warning/30 px-3 py-1 rounded-full font-semibold border-[1px] border-warning/80 text-warning hover:text-white hover:bg-warning hover:border-ternary/30 transition ease-in duration-2000">Edit</a>
                </div>
            </td>
        </tr>

        @empty
    <tr>
        <td colspan="7" class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm text-center">
            No records found
        </td>
    </tr>
@endforelse


        <!-- Sample Data Row -->
       
        

    </tbody>
</table>
        </div>

        <div class="flex justify-between items-center mt-4">
        <div class="text-sm text-gray-600">
                Showing {{ $lebs->firstItem() }} to {{ $lebs->lastItem() }} of {{ $lebs->total() }} entries
            </div>
            <div class="mt-4">
                {{ $lebs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection