@extends('layout.layout')

@section('content')
<div class="w-full grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 grid-cols-1 gap-2">
    
          <!-- Total PIs -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-primary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Total PIs</span>
                  <span class="font-bold text-2xl text-ternary">45</span>
              </div>
              <div>
                  <i class="fa fa-users text-4xl text-primary"></i>
              </div>
          </div>

          <!-- Active PIs -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-success bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Active PIs</span>
                  <span class="font-bold text-2xl text-ternary">38</span>
              </div>
              <div>
                  <i class="fa fa-user-check text-4xl text-success"></i>
              </div>
          </div>

          <!-- Inactive PIs -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-warning bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Inactive PIs</span>
                  <span class="font-bold text-2xl text-ternary">7</span>
              </div>
              <div>
                  <i class="fa fa-user-clock text-4xl text-warning"></i>
              </div>
          </div>

          <!-- Departments -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-secondary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Departments</span>
                  <span class="font-bold text-2xl text-ternary">12</span>
              </div>
              <div>
                  <i class="fa fa-building-user text-4xl text-secondary"></i>
              </div>
          </div>          
</div>

<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300 mt-6">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
        <span class="font-semibold text-primary text-xl">Principal Investigators List</span>
    </div>
    <div class="w-full overflow-x-auto p-4">
        <div class="w-full flex justify-between gap-2 items-center">
            <div class="flex gap-2">
                    <button title="Export to excel" class="bg-success/20 text-success h-8 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white cursor-pointer transition ease-in duration-2000">
                        <i class="fa fa-file-excel"></i>
                    </button>

                    <button title="Export to pdf" class="bg-danger/20 text-danger h-8 w-8 flex justify-center items-center rounded-[3px] hover:bg-danger hover:text-white cursor-pointer transition ease-in duration-2000">
                        <i class="fa fa-file-pdf"></i>
                    </button>
            </div>
            <div class="flex items-center gap-2">
            <input type="text" name="search" required placeholder="Search PI" class="px-2 py-1 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
            <select name="status" required class="px-2 py-1 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                <option value="All">All Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
            </div>
        </div>
        <table class="w-full border-[2px] border-secondary/40 border-collapse mt-4">
    <tr>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Sr. No.</td>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Name</td>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Email</td>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Phone</td>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Department</td>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Status</td>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Action</td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">1</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Dr. John Smith</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">john.smith@iitr.ac.in</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">+91 9876543210</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Computer Science</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <span class="bg-success/20 text-success px-2 py-0.5 rounded-full text-xs">Active</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2">
                <a href="{{route('view_pi')}}" title="View Details" class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-eye text-xs"></i>
                </a>
                <a href="{{route('create_pi')}}" title="Edit" class="bg-warning/20 text-warning h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-warning hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-pen text-xs"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">2</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Dr. Priya Sharma</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">priya.sharma@iitr.ac.in</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">+91 8765432109</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Electrical Engineering</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <span class="bg-success/20 text-success px-2 py-0.5 rounded-full text-xs">Active</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2">
                <a href="{{route('view_pi')}}" title="View Details" class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-eye text-xs"></i>
                </a>
                <a href="{{route('create_pi')}}" title="Edit" class="bg-warning/20 text-warning h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-warning hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-pen text-xs"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">3</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Dr. Rajesh Kumar</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">rajesh.kumar@iitr.ac.in</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">+91 7654321098</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Mechanical Engineering</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <span class="bg-danger/20 text-danger px-2 py-0.5 rounded-full text-xs">Inactive</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2">
                <a href="{{route('view_pi')}}" title="View Details" class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-eye text-xs"></i>
                </a>
                <a href="{{route('create_pi')}}" title="Edit" class="bg-warning/20 text-warning h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-warning hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-pen text-xs"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">4</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Dr. Ananya Patel</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">ananya.patel@iitr.ac.in</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">+91 6543210987</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Civil Engineering</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <span class="bg-success/20 text-success px-2 py-0.5 rounded-full text-xs">Active</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2">
                <a href="{{route('view_pi')}}" title="View Details" class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-eye text-xs"></i>
                </a>
                <a href="{{route('create_pi')}}" title="Edit" class="bg-warning/20 text-warning h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-warning hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-pen text-xs"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">5</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Dr. Vikram Singh</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">vikram.singh@iitr.ac.in</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">+91 5432109876</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Biotechnology</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <span class="bg-warning/20 text-warning px-2 py-0.5 rounded-full text-xs">On Leave</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2">
                <a href="{{route('view_pi')}}" title="View Details" class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-eye text-xs"></i>
                </a>
                <a href="{{route('create_pi')}}" title="Edit" class="bg-warning/20 text-warning h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-warning hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-pen text-xs"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">6</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Dr. Meera Gupta</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">meera.gupta@iitr.ac.in</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">+91 4321098765</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Physics</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <span class="bg-success/20 text-success px-2 py-0.5 rounded-full text-xs">Active</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2">
                <a href="{{route('view_pi')}}" title="View Details" class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-eye text-xs"></i>
                </a>
                <a href="{{route('create_pi')}}" title="Edit" class="bg-warning/20 text-warning h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-warning hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-pen text-xs"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">7</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Dr. Sanjay Verma</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">sanjay.verma@iitr.ac.in</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">+91 3210987654</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Chemistry</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <span class="bg-danger/20 text-danger px-2 py-0.5 rounded-full text-xs">Inactive</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2">
                <a href="{{route('view_pi')}}" title="View Details" class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-eye text-xs"></i>
                </a>
                <a href="{{route('create_pi')}}" title="Edit" class="bg-warning/20 text-warning h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-warning hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-pen text-xs"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">8</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Dr. Neha Agarwal</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">neha.agarwal@iitr.ac.in</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">+91 2109876543</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Mathematics</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <span class="bg-success/20 text-success px-2 py-0.5 rounded-full text-xs">Active</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2">
                <a href="{{route('view_pi')}}" title="View Details" class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-eye text-xs"></i>
                </a>
                <a href="{{route('create_pi')}}" title="Edit" class="bg-warning/20 text-warning h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-warning hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-pen text-xs"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">9</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Dr. Arjun Reddy</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">arjun.reddy@iitr.ac.in</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">+91 1098765432</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Architecture</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <span class="bg-warning/20 text-warning px-2 py-0.5 rounded-full text-xs">On Leave</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2">
                <a href="{{route('view_pi')}}" title="View Details" class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-eye text-xs"></i>
                </a>
                <a href="{{route('create_pi')}}" title="Edit" class="bg-warning/20 text-warning h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-warning hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-pen text-xs"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">10</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Dr. Sunita Rao</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">sunita.rao@iitr.ac.in</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">+91 9087654321</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">Earth Sciences</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <span class="bg-success/20 text-success px-2 py-0.5 rounded-full text-xs">Active</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2">
                <a href="{{route('view_pi')}}" title="View Details" class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-eye text-xs"></i>
                </a>
                <a href="{{route('create_pi')}}" title="Edit" class="bg-warning/20 text-warning h-6 w-6 flex justify-center items-center rounded-[3px] hover:bg-warning hover:text-white cursor-pointer transition ease-in duration-2000">
                    <i class="fa fa-pen text-xs"></i>
                </a>
            </div>
        </td>
    </tr>
</table>
<div class="flex justify-between items-center mt-4">
            <div class="text-sm text-gray-600">Showing 1 to 10 of 50 entries</div>
            <div class="flex gap-2">
                <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Previous</button>
                <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection