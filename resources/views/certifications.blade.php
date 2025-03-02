@extends('layout.layout')
@section('content')
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between items-center">
        <span class="font-semibold text-primary text-xl">Training Certifications</span>
        <button class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Issue New Certificate</button>
    </div>

    <div class="p-4">
        <!-- Search and Filter Section -->
        <div class="w-full grid xl:grid-cols-4 gap-4 mb-4">
            <div class="w-full flex flex-col gap-1">
                <input type="text" placeholder="Search by Student Name/ID" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
            </div>
            <div class="w-full flex flex-col gap-1">
                <select class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">Filter by Module</option>
                    <option value="Basic">Basic Operation</option>
                    <option value="Advanced">Advanced Analysis</option>
                    <option value="Safety">Safety Training</option>
                </select>
            </div>
            <div class="w-full flex flex-col gap-1">
                <select class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">Filter by Status</option>
                    <option value="Valid">Valid</option>
                    <option value="Expired">Expired</option>
                    <option value="Revoked">Revoked</option>
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

        <!-- Certifications Table -->
        <div class="relative overflow-x-auto">
            <table class="w-full border-[2px] border-secondary/40 border-collapse">
                <thead>
                    <tr class="bg-primary/10">
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Certificate ID</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Student Name</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Module</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Issue Date</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Expiry Date</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Status</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">CERT001</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">John Doe</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">Basic Operation</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2024-01-15</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">2025-01-14</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Valid</span>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                            <div class="flex gap-2">
                                <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View</button>
                                <button class="text-xs bg-warning/30 px-3 py-1 rounded-full font-semibold border-[1px] border-warning/80 text-warning hover:text-white hover:bg-warning hover:border-ternary/30 transition ease-in duration-2000">Renew</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-4">
            <div class="text-sm text-gray-600">Showing 1 to 1 of 1 entries</div>
            <div class="flex gap-2">
                <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Previous</button>
                <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection