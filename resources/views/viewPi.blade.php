@extends('layout.layout')
@section('content')
<div class="w-full grid xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
    <!-- Main Info Card -->
    <div class="xl:col-span-2 lg:col-span-2 w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col">
        <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between items-center">
            <span class="font-semibold text-primary text-xl">Principal Investigator Profile</span>
        </div>
        <div class="p-4 grid xl:grid-cols-3 gap-4">
            <!-- Profile Photo -->
            <div class="flex flex-col items-center gap-3">
                <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=400" alt="PI Photo" class="w-48 h-48 rounded-full object-cover border-4 border-primary/20">
                <h2 class="text-xl font-semibold text-primary">Dr. Rajesh Kumar</h2>
                <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm font-medium">Principal Investigator</span>
            </div>
            
            <!-- Basic Info -->
            <div class="xl:col-span-2 flex flex-col gap-2">
                <h3 class="font-semibold text-primary">Basic Information</h3>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <span class="text-gray-600">Department:</span>
                    <span class="font-medium">Materials Science</span>
                    <span class="text-gray-600">Designation:</span>
                    <span class="font-medium">Professor</span>
                    <span class="text-gray-600">Email:</span>
                    <span class="font-medium">rajesh.kumar@iitr.ac.in</span>
                    <span class="text-gray-600">Phone:</span>
                    <span class="font-medium">+91 98765 43210</span>
                    <span class="text-gray-600">Office:</span>
                    <span class="font-medium">Room 305, Academic Block</span>
                    <span class="text-gray-600">Joining Date:</span>
                    <span class="font-medium">2015-08-15</span>
                </div>
            </div>

            <!-- Research Information -->
            <div class="xl:col-span-3 flex flex-col gap-2">
                <h3 class="font-semibold text-primary">Research Information</h3>
                <div class="grid xl:grid-cols-2 gap-4 text-sm">
                    <div class="flex flex-col gap-2">
                        <span class="text-gray-600">Research Areas:</span>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 bg-secondary/10 text-secondary rounded-full text-xs">Nanotechnology</span>
                            <span class="px-2 py-1 bg-secondary/10 text-secondary rounded-full text-xs">Materials Science</span>
                            <span class="px-2 py-1 bg-secondary/10 text-secondary rounded-full text-xs">Surface Engineering</span>
                            <span class="px-2 py-1 bg-secondary/10 text-secondary rounded-full text-xs">Thin Films</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <span class="text-gray-600">Students in Lab:</span>
                        <div class="flex flex-wrap gap-2">
                            <span onclick="document.getElementById('studentInLab').classList.toggle('hidden')" class="cursor-pointer px-2 py-1 bg-success/10 text-success rounded-full text-xs"><span class="font-semibold">02</span> - View All</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     
    </div>

    <!-- Stats Card -->
    <div class="w-full border-[1px] border-t-[4px] border-warning/20 border-t-warning bg-white flex gap-2 flex-col">
    <div class="bg-warning/10 px-4 py-2 border-b-[2px] border-b-warning/20">
        <span class="font-semibold text-warning text-lg">Recent Activities</span>
    </div>
    <div class="p-4">
        <div class="relative overflow-x-auto overflow-y-auto h-[500px]">
        <table class="w-full border-[2px] border-secondary/40 border-collapse">
    <tr>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Date</td>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Activity</td>
    </tr>
    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024-02-15</td>
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Login</td>
    </tr>
    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024-02-16</td>
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Updated Profile</td>
    </tr>
    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024-02-18</td>
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Downloaded Report</td>
    </tr>
    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024-02-20</td>
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Login</td>
    </tr>
    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024-02-21</td>
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Created Document</td>
    </tr>
    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024-02-22</td>
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Password Changed</td>
    </tr>
    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024-02-24</td>
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Submitted Form</td>
    </tr>
    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024-02-25</td>
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Login</td>
    </tr>
    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024-02-26</td>
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Generated API Key</td>
    </tr>
    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024-02-28</td>
        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Logout</td>
    </tr>
    
</table>
        </div>
    </div>
    </div>
</div>

<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-success bg-white flex gap-2 flex-col mt-4 mb-4 hidden" id="studentInLab">
          <div class="bg-success/10 px-4 py-2 border-b-[2px] border-b-success/20">
              <span class="font-semibold text-success text-lg">Students in lab</span>
          </div>
          <div class="p-4">
              <div class="relative overflow-x-auto">
        
              <table class="w-full border-[2px] border-secondary/40 border-collapse">
    <thead>
        <tr>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Student ID</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Name</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Department</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">PI</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Year</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Status</th>
        </tr>
    </thead>
    <tbody>
        <!-- Sample Data Row -->
        <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">STU001</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">John Doe</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Computer Science</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Dr. Rajesh Kumar</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Active</span>
            </td>
        
        </tr>
        <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">STU002</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Priya Sharma</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Electrical Engineering</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Dr. Ananya Patel</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2023</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Active</span>
            </td>
         
        </tr>
    </tbody>
</table>
             
                </div>
          </div>
</div>




<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col mt-4 mb-4 ">
          <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20">
              <span class="font-semibold text-primary text-lg">Recent Bookings</span>
          </div>
          <div class="p-4">
              <div class="relative overflow-x-auto">
        
                  <table class="w-full border-[2px] border-secondary/40 border-collapse mt-4">
                        <tr>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Sr. No.</td>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Date</td>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Instrument</td>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Duration</td>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Status</td>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Cost</td>
                        </tr>

                            <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">1</td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">2024-02-15</td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                                  Microscope
                                </td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">2 hours</td>

                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm"><span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Completed</span></td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">₹15,000</td>
                              
                            </tr>
    
                   </table>
              </div>
          </div>
</div>


<!-- Activity Logs -->

@endsection

@push('scripts')

@endpush