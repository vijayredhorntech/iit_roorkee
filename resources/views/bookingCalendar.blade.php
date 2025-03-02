@extends('layout.layout')
@section('content')
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between items-center">
        <span class="font-semibold text-primary text-xl">Instrument Booking Calendar</span>
        <button class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">New Booking</button>
    </div>

    <div class="p-4">
        <!-- Calendar Controls -->
        <div class="w-full grid xl:grid-cols-4 gap-4 mb-4">
            <div class="w-full flex flex-col gap-1">
                <select class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">Select Instrument</option>
                    <option value="1">Microscope</option>
                    <option value="2">Spectrometer</option>
                    <option value="3">XRD Machine</option>
                </select>
            </div>
            <div class="w-full flex flex-col gap-1">
                <select class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">View Type</option>
                    <option value="day">Day View</option>
                    <option value="week">Week View</option>
                    <option value="month">Month View</option>
                </select>
            </div>
            <div class="w-full flex items-center gap-2">
                <button class="text-sm bg-primary/30 px-4 py-2 rounded-[3px] font-semibold border-[2px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Today</button>
                <button class="text-sm bg-primary/30 px-2 py-2 rounded-[3px] font-semibold border-[2px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">&lt;</button>
                <span class="text-sm font-semibold text-primary">February 2024</span>
                <button class="text-sm bg-primary/30 px-2 py-2 rounded-[3px] font-semibold border-[2px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">&gt;</button>
            </div>
        </div>

        <!-- Calendar Grid -->
        <div class="border-[2px] border-secondary/40 rounded-lg overflow-hidden">
            <!-- Week Days Header -->
            <div class="grid grid-cols-7 bg-primary/10">
                <div class="p-2 text-center border-r-[2px] border-secondary/40 font-semibold text-primary">Sun</div>
                <div class="p-2 text-center border-r-[2px] border-secondary/40 font-semibold text-primary">Mon</div>
                <div class="p-2 text-center border-r-[2px] border-secondary/40 font-semibold text-primary">Tue</div>
                <div class="p-2 text-center border-r-[2px] border-secondary/40 font-semibold text-primary">Wed</div>
                <div class="p-2 text-center border-r-[2px] border-secondary/40 font-semibold text-primary">Thu</div>
                <div class="p-2 text-center border-r-[2px] border-secondary/40 font-semibold text-primary">Fri</div>
                <div class="p-2 text-center font-semibold text-primary">Sat</div>
            </div>

            <!-- Calendar Days -->
            <div class="grid grid-cols-7">
                <!-- Previous Month Days -->
                <div class="min-h-[100px] p-2 border-r-[2px] border-b-[2px] border-secondary/40 text-gray-400">28</div>
                <div class="min-h-[100px] p-2 border-r-[2px] border-b-[2px] border-secondary/40 text-gray-400">29</div>
                <div class="min-h-[100px] p-2 border-r-[2px] border-b-[2px] border-secondary/40 text-gray-400">30</div>
                <div class="min-h-[100px] p-2 border-r-[2px] border-b-[2px] border-secondary/40 text-gray-400">31</div>

                <!-- Current Month Days -->
                <div class="min-h-[100px] p-2 border-r-[2px] border-b-[2px] border-secondary/40">
                    <div class="font-semibold">1</div>
                    <div class="mt-2 text-xs bg-success/20 text-success p-1 rounded">Microscope (9-11 AM)</div>
                </div>
                <div class="min-h-[100px] p-2 border-r-[2px] border-b-[2px] border-secondary/40">
                    <div class="font-semibold">2</div>
                </div>
                <div class="min-h-[100px] p-2 border-b-[2px] border-secondary/40">
                    <div class="font-semibold">3</div>
                </div>

                <!-- More weeks would follow... -->
            </div>
        </div>

        <!-- Legend -->
        <div class="mt-4 flex gap-4">
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-success/20 border border-success rounded"></div>
                <span class="text-sm text-gray-600">Available</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-warning/20 border border-warning rounded"></div>
                <span class="text-sm text-gray-600">Pending</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-danger/20 border border-danger rounded"></div>
                <span class="text-sm text-gray-600">Booked</span>
            </div>
        </div>
    </div>
</div>
@endsection