@extends('layout.layout')
@section('content')
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between items-center">
        <span class="font-semibold text-primary text-xl">Students List</span>
        <a href="{{route('create_student')}}" class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Add New Student</a>
    </div>

    <div class="p-4">
        <!-- Search and Filter Section -->
        <div class="w-full grid xl:grid-cols-4 gap-4 mb-4">
     
            <div class="w-full flex flex-col gap-1">
                <input type="text" placeholder="Search by Name/ID" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
            </div>
            <div class="w-full flex flex-col gap-1">
                <select class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">Filter by Department</option>
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
                <select class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">Filter by Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="w-full flex flex-col gap-1">
                <select class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">Filter by PI</option>
                    <option value="1">Dr. Rajesh Kumar</option>
                    <option value="2">Dr. Priya Singh</option>
                </select>
            </div>
            <div class="flex gap-2">
        <button title="Export to excel" class="bg-success/20 text-success h-8 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white cursor-pointer transition ease-in duration-2000">
                        <i class="fa fa-file-excel"></i>
                    </button>

                    <button title="Export to pdf" class="bg-danger/20 text-danger h-8 w-8 flex justify-center items-center rounded-[3px] hover:bg-danger hover:text-white cursor-pointer transition ease-in duration-2000">
                        <i class="fa fa-file-pdf"></i>
                    </button>
        </div>
        </div>

        <!-- Students Table -->
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
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Actions</th>
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
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <div class="flex gap-2">
                    <a href="{{route('view_student_dashboard')}}" class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View</a>
                    <a href="{{route('create_student')}}" class="text-xs bg-warning/30 px-3 py-1 rounded-full font-semibold border-[1px] border-warning/80 text-warning hover:text-white hover:bg-warning hover:border-ternary/30 transition ease-in duration-2000">Edit</a>
                </div>
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
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <div class="flex gap-2">
                    <a href="{{route('view_student_dashboard')}}" class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View</a>
                    <a href="{{route('create_student')}}" class="text-xs bg-warning/30 px-3 py-1 rounded-full font-semibold border-[1px] border-warning/80 text-warning hover:text-white hover:bg-warning hover:border-ternary/30 transition ease-in duration-2000">Edit</a>
                </div>
            </td>
        </tr>
        <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">STU003</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Rahul Singh</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Mechanical Engineering</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Dr. Vikram Singh</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <span class="px-2 py-1 bg-danger/20 text-danger rounded-full text-xs">Inactive</span>
            </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <div class="flex gap-2">
                    <a href="{{route('view_student_dashboard')}}" class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View</a>
                    <a href="{{route('create_student')}}" class="text-xs bg-warning/30 px-3 py-1 rounded-full font-semibold border-[1px] border-warning/80 text-warning hover:text-white hover:bg-warning hover:border-ternary/30 transition ease-in duration-2000">Edit</a>
                </div>
            </td>
        </tr>
        <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">STU004</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Aisha Khan</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Civil Engineering</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Dr. Sanjay Verma</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2022</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <span class="px-2 py-1 bg-warning/20 text-warning rounded-full text-xs">On Leave</span>
            </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <div class="flex gap-2">
                    <a href="{{route('view_student_dashboard')}}" class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View</a>
                    <a href="{{route('create_student')}}" class="text-xs bg-warning/30 px-3 py-1 rounded-full font-semibold border-[1px] border-warning/80 text-warning hover:text-white hover:bg-warning hover:border-ternary/30 transition ease-in duration-2000">Edit</a>
                </div>
            </td>
        </tr>
        <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">STU005</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Vikram Patel</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Biotechnology</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Dr. Meera Gupta</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2023</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Active</span>
            </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <div class="flex gap-2">
                    <a href="{{route('view_student_dashboard')}}" class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View</a>
                    <a href="{{route('create_student')}}" class="text-xs bg-warning/30 px-3 py-1 rounded-full font-semibold border-[1px] border-warning/80 text-warning hover:text-white hover:bg-warning hover:border-ternary/30 transition ease-in duration-2000">Edit</a>
                </div>
            </td>
        </tr>
        <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">STU006</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Ankit Kumar</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Physics</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Dr. Neha Agarwal</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Active</span>
            </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <div class="flex gap-2">
                    <a href="{{route('view_student_dashboard')}}" class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View</a>
                    <a href="{{route('create_student')}}" class="text-xs bg-warning/30 px-3 py-1 rounded-full font-semibold border-[1px] border-warning/80 text-warning hover:text-white hover:bg-warning hover:border-ternary/30 transition ease-in duration-2000">Edit</a>
                </div>
            </td>
        </tr>
        <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">STU007</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Neha Gupta</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Chemistry</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Dr. Arjun Reddy</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2022</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <span class="px-2 py-1 bg-danger/20 text-danger rounded-full text-xs">Inactive</span>
            </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <div class="flex gap-2">
                    <a href="{{route('view_student_dashboard')}}" class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View</a>
                    <a href="{{route('create_student')}}" class="text-xs bg-warning/30 px-3 py-1 rounded-full font-semibold border-[1px] border-warning/80 text-warning hover:text-white hover:bg-warning hover:border-ternary/30 transition ease-in duration-2000">Edit</a>
                </div>
            </td>
        </tr>
        <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">STU008</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Rajat Verma</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Mathematics</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Dr. Sunita Rao</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2023</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <span class="px-2 py-1 bg-warning/20 text-warning rounded-full text-xs">On Leave</span>
            </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <div class="flex gap-2">
                    <a href="{{route('view_student_dashboard')}}" class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View</a>
                    <a href="{{route('create_student')}}" class="text-xs bg-warning/30 px-3 py-1 rounded-full font-semibold border-[1px] border-warning/80 text-warning hover:text-white hover:bg-warning hover:border-ternary/30 transition ease-in duration-2000">Edit</a>
                </div>
            </td>
        </tr>
        <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">STU009</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Deepa Mehta</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Architecture</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Dr. John Smith</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2021</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Active</span>
            </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <div class="flex gap-2">
                    <a href="{{route('view_student_dashboard')}}" class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View</a>
                    <a href="{{route('create_student')}}" class="text-xs bg-warning/30 px-3 py-1 rounded-full font-semibold border-[1px] border-warning/80 text-warning hover:text-white hover:bg-warning hover:border-ternary/30 transition ease-in duration-2000">Edit</a>
                </div>
            </td>
        </tr>
        <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">STU010</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Aryan Joshi</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Earth Sciences</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Dr. Priya Sharma</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Active</span>
            </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <div class="flex gap-2">
                    <a href="{{route('view_student_dashboard')}}" class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View</a>
                    <a href="{{route('create_student')}}" class="text-xs bg-warning/30 px-3 py-1 rounded-full font-semibold border-[1px] border-warning/80 text-warning hover:text-white hover:bg-warning hover:border-ternary/30 transition ease-in duration-2000">Edit</a>
                </div>
            </td>
        </tr>
    </tbody>
</table>
        </div>

        <!-- Pagination -->
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