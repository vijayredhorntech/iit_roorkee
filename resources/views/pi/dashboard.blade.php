@extends('pi.layout.layout')
@section('content')

    <!-- Stats Section -->
    <div class="w-full grid xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4 mt-4">
        <!-- Total Bookings -->
        <div
            class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 items-center justify-between p-4">
            <div class="flex flex-col gap-2">
                <span class="font-semibold text-ternary/70 text-md">Total Bookings</span>
                <span class="font-bold text-2xl text-ternary">45</span>
            </div>
            <div>
                <i class="fa fa-calendar-check text-4xl text-primary"></i>
            </div>
        </div>

        <!-- Current Bookings -->
        <div
            class="w-full border-[1px] border-t-[4px] border-secondary/20 border-t-secondary bg-white flex gap-2 items-center justify-between p-4">
            <div class="flex flex-col gap-2">
                <span class="font-semibold text-ternary/70 text-md">Current Bookings</span>
                <span class="font-bold text-2xl text-ternary">3</span>
            </div>
            <div>
                <i class="fa fa-clock text-4xl text-secondary"></i>
            </div>
        </div>

        <!-- Total Fine -->
        <div
            class="w-full border-[1px] border-t-[4px] border-danger/20 border-t-danger bg-white flex gap-2 items-center justify-between p-4">
            <div class="flex flex-col gap-2">
                <span class="font-semibold text-ternary/70 text-md">Total Fine</span>
                <span class="font-bold text-2xl text-ternary">₹2,500</span>
            </div>
            <div>
                <i class="fa fa-rupee-sign text-4xl text-danger"></i>
            </div>
        </div>

        <!-- Pending Approvals -->
        <div
            class="w-full border-[1px] border-t-[4px] border-warning/20 border-t-warning bg-white flex gap-2 items-center justify-between p-4">
            <div class="flex flex-col gap-2">
                <span class="font-semibold text-ternary/70 text-md">Pending Approvals</span>
                <span class="font-bold text-2xl text-ternary">2</span>
            </div>
            <div>
                <i class="fa fa-hourglass-half text-4xl text-warning"></i>
            </div>
        </div>
    </div>

    <div class="w-full grid xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 mt-4">
        <!-- Main Info Card -->
        <div
            class="xl:col-span-2 lg:col-span-2 w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col">
            <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between items-center">
                <span class="font-semibold text-primary text-xl">Student Profile</span>
            </div>
            <div class="p-4 grid xl:grid-cols-3 gap-4">
                <!-- Profile Photo -->
                <div class="flex flex-col items-center gap-3">
                    <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=400"
                         alt="Student Photo" class="w-48 h-48 rounded-full object-cover border-4 border-primary/20">
                    <h2 class="text-xl font-semibold text-primary">John Doe</h2>
                    <span
                        class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm font-medium">PhD Scholar</span>
                </div>

                <!-- Basic Info -->
                <div class="xl:col-span-2 flex flex-col gap-2">
                    <h3 class="font-semibold text-primary">Basic Information</h3>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <span class="text-gray-600">Student Id:</span>
                        <span class="font-medium">CS2024PHD001</span>
                        <span class="text-gray-600">Department:</span>
                        <span class="font-medium">Computer Science</span>
                        <span class="text-gray-600">Principal Investigator:</span>
                        <span class="font-medium">William James</span>
                        <span class="text-gray-600">Email:</span>
                        <span class="font-medium">john.doe@iitr.ac.in</span>
                        <span class="text-gray-600">Phone:</span>
                        <span class="font-medium">+91 98765 43210</span>
                        <span class="text-gray-600">Enrollment Date:</span>
                        <span class="font-medium">2024-01-15</span>
                        <span class="text-gray-600">Address:</span>
                        <span class="font-medium">IIT Roorkee, Roorkee, Uttarakhand, India</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notifications Card -->
        <div class="w-full border-[1px] border-t-[4px] border-warning/20 border-t-warning bg-white flex gap-2 flex-col">
            <div class="bg-warning/10 px-4 py-2 border-b-[2px] border-b-warning/20">
                <span class="font-semibold text-warning text-lg">Notifications</span>
            </div>
            <div class="p-4">
                <div class="relative overflow-x-auto overflow-y-auto h-[300px]">
                    <div class="flex flex-col gap-3">
                        <div class="p-3 bg-success/10 rounded-lg border border-success/20">
                            <div class="flex items-center gap-2">
                                <i class="fa fa-check-circle text-success"></i>
                                <span class="text-sm font-medium text-success">Booking Confirmed</span>
                            </div>
                            <p class="text-sm text-gray-600 mt-1">Your booking for Microscope has been confirmed for
                                tomorrow.</p>
                            <span class="text-xs text-gray-500 mt-1">2 hours ago</span>
                        </div>
                        <div class="p-3 bg-warning/10 rounded-lg border border-warning/20">
                            <div class="flex items-center gap-2">
                                <i class="fa fa-exclamation-circle text-warning"></i>
                                <span class="text-sm font-medium text-warning">Payment Due</span>
                            </div>
                            <p class="text-sm text-gray-600 mt-1">You have a pending payment of ₹5,000 for last week's
                                bookings.</p>
                            <span class="text-xs text-gray-500 mt-1">1 day ago</span>
                        </div>
                        <div class="p-3 bg-primary/10 rounded-lg border border-primary/20">
                            <div class="flex items-center gap-2">
                                <i class="fa fa-info-circle text-primary"></i>
                                <span class="text-sm font-medium text-primary">Maintenance Notice</span>
                            </div>
                            <p class="text-sm text-gray-600 mt-1">The Spectrometer will be under maintenance on
                                Friday.</p>
                            <span class="text-xs text-gray-500 mt-1">2 days ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Current Bookings Table -->
    <div
        class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col mt-4">
        <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20">
            <span class="font-semibold text-primary text-lg">Current Bookings</span>
        </div>

        <div class="p-4">
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
                    <input type="text" name="search" required placeholder="Search Instrument" class="px-2 py-1 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    <select name="status" required class="px-2 py-1 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                        <option value="All">All Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="relative overflow-x-auto mt-4">
                <table class="w-full border-[2px] border-secondary/40 border-collapse">
                    <tr>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">
                            Sr. No.
                        </td>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">
                            Instrument
                        </td>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">
                            Booked At
                        </td>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">
                            Duration
                        </td>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">
                            Status
                        </td>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">
                            Cost
                        </td>
                    </tr>
                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">1
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            Microscope
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            2024-02-28 10:00 AM
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2
                            hours
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Active</span>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            ₹15,000
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Previous Bookings Table -->
    <div
        class="w-full border-[1px] border-t-[4px] border-secondary/20 border-t-secondary bg-white flex gap-2 flex-col mt-4 mb-4">
        <div class="bg-secondary/10 px-4 py-2 border-b-[2px] border-b-secondary/20">
            <span class="font-semibold text-secondary text-lg">Previous Bookings</span>
        </div>
        <div class="p-4">
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
                    <input type="text" name="search" required placeholder="Search Instrument" class="px-2 py-1 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    <select name="status" required class="px-2 py-1 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                        <option value="All">All Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <div class="relative overflow-x-auto mt-4">
                <table class="w-full border-[2px] border-secondary/40 border-collapse">
                    <tr>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">
                            Sr. No.
                        </td>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">
                            Instrument
                        </td>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">
                            Booked At
                        </td>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">
                            Duration
                        </td>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">
                            Status
                        </td>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">
                            Cost
                        </td>
                    </tr>
                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">1
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            Spectrometer
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            2024-02-20 02:00 PM
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">3
                            hours
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Completed</span>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            ₹20,000
                        </td>
                    </tr>
                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">XRD
                            Machine
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            2024-02-15 11:30 AM
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">4
                            hours
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Completed</span>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            ₹25,000
                        </td>
                    </tr>
                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">3
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">SEM
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            2024-02-10 09:00 AM
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">5
                            hours
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Completed</span>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            ₹30,000
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
