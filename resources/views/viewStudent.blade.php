@extends('layout.layout')
@section('content')
<div class="w-full grid xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
    <!-- Main Info Card -->
    <div class="xl:col-span-2 lg:col-span-2 w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col">
        <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between items-center">
            <span class="font-semibold text-primary text-xl">Student Profile</span>
        </div>
        <div class="p-4 grid xl:grid-cols-3 gap-4">
            <!-- Profile Photo -->
            <div class="flex flex-col items-center gap-3">
                <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=400" alt="Student Photo" class="w-48 h-48 rounded-full object-cover border-4 border-primary/20">
                <h2 class="text-xl font-semibold text-primary">John Doe</h2>
                <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm font-medium">Research Student</span>
            </div>
            
            <!-- Basic Info -->
            <div class="xl:col-span-2 flex flex-col gap-2">
                <h3 class="font-semibold text-primary">Basic Information</h3>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <span class="text-gray-600">Student ID:</span>
                    <span class="font-medium">STU001</span>
                    <span class="text-gray-600">Department:</span>
                    <span class="font-medium">Computer Science</span>
                    <span class="text-gray-600">Year of Study:</span>
                    <span class="font-medium">2024</span>
                    <span class="text-gray-600">Email:</span>
                    <span class="font-medium">john.doe@iitr.ac.in</span>
                    <span class="text-gray-600">Mobile:</span>
                    <span class="font-medium">+91 98765 43210</span>
                    <span class="text-gray-600">PI:</span>
                    <span class="font-medium">Dr. Rajesh Kumar</span>
                </div>
            </div>

            <!-- Research Information -->
            <div class="xl:col-span-3 flex flex-col gap-2">
                <h3 class="font-semibold text-primary">Research Information</h3>
                <div class="grid xl:grid-cols-2 gap-4 text-sm">
                    <div class="flex flex-col gap-2">
                        <span class="text-gray-600">Research Topic/Area:</span>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 bg-secondary/10 text-secondary rounded-full text-xs">Machine Learning</span>
                            <span class="px-2 py-1 bg-secondary/10 text-secondary rounded-full text-xs">Data Science</span>
                            <span class="px-2 py-1 bg-secondary/10 text-secondary rounded-full text-xs">Artificial Intelligence</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <span class="text-gray-600">Status:</span>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 bg-success/10 text-success rounded-full text-xs">Active</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity Card -->
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
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Profile Updated</td>
                    </tr>
                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024-02-14</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Submitted Research Report</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Research Progress -->
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-success bg-white flex gap-2 flex-col mt-4 mb-4">
    <div class="bg-success/10 px-4 py-2 border-b-[2px] border-b-success/20">
        <span class="font-semibold text-success text-lg">Research Progress</span>
    </div>
    <div class="p-4">
        <div class="relative overflow-x-auto">
            <table class="w-full border-[2px] border-secondary/40 border-collapse mt-4">
                <tr>
                    <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Date</td>
                    <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Milestone</td>
                    <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Status</td>
                    <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Comments</td>
                </tr>
                <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                    <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024-02-01</td>
                    <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Literature Review</td>
                    <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                        <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Completed</span>
                    </td>
                    <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Excellent progress</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush