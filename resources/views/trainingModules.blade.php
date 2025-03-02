@extends('layout.layout')
@section('content')
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between items-center">
        <span class="font-semibold text-primary text-xl">Training Modules</span>
        <button class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Add New Module</button>
    </div>

    <div class="p-4">
        <!-- Search and Filter Section -->
        <div class="w-full grid xl:grid-cols-3 gap-4 mb-4">
            <div class="w-full flex flex-col gap-1">
                <input type="text" placeholder="Search by Module Name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
            </div>
            <div class="w-full flex flex-col gap-1">
                <select class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">Filter by Category</option>
                    <option value="Basic">Basic Training</option>
                    <option value="Advanced">Advanced Training</option>
                    <option value="Safety">Safety Training</option>
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

        <!-- Training Modules Grid -->
        <div class="grid xl:grid-cols-3 gap-4">
            <!-- Module Card 1 -->
            <div class="border-[1px] border-primary/20 rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
                <div class="bg-primary/10 p-4 border-b border-primary/20">
                    <h3 class="font-semibold text-primary">Basic Instrument Operation</h3>
                </div>
                <div class="p-4">
                    <p class="text-sm text-gray-600 mb-4">Introduction to basic instrument operation and safety protocols.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs bg-success/20 text-success px-2 py-1 rounded-full">Required</span>
                        <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Module Card 2 -->
            <div class="border-[1px] border-primary/20 rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
                <div class="bg-primary/10 p-4 border-b border-primary/20">
                    <h3 class="font-semibold text-primary">Advanced Analysis Techniques</h3>
                </div>
                <div class="p-4">
                    <p class="text-sm text-gray-600 mb-4">Advanced training for complex analysis and data interpretation.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs bg-warning/20 text-warning px-2 py-1 rounded-full">Optional</span>
                        <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Module Card 3 -->
            <div class="border-[1px] border-primary/20 rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
                <div class="bg-primary/10 p-4 border-b border-primary/20">
                    <h3 class="font-semibold text-primary">Safety Protocols</h3>
                </div>
                <div class="p-4">
                    <p class="text-sm text-gray-600 mb-4">Essential safety procedures and emergency protocols.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs bg-success/20 text-success px-2 py-1 rounded-full">Required</span>
                        <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View Details</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-4">
            <div class="text-sm text-gray-600">Showing 1 to 3 of 9 entries</div>
            <div class="flex gap-2">
                <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Previous</button>
                <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection