@extends('superadmin.layout.layout')
@section('content')
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between items-center">
        <span class="font-semibold text-primary text-xl">Instrument  List </span>
        <!-- <a href="{{route('pi.create_student')}}" class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Add New Student</a> -->
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

        <table class="w-full border-[2px] border-secondary/40 border-collapse mt-4">
                        <tr>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Sr. No.</td>
                    <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Instrument Name</td>
                    <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Accessories</td>
                    <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Model Number</td>
                    <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Manufacturer</td>
                    <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Location</td>
                    <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Status</td>
                    <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Last Calibration</td>
                    <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Action</td>
                        </tr>

                        @forelse($instruments as $instrument)
                            
                            <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                            <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">{{ $loop->iteration }}</td>
                            <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">{{ $instrument->name }}</td>

                            <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                                <div class="flex gap-2 items-center">
                                <a href="{{ route('superadmin.view_acceossries', ['id' => $instrument->id]) }}"  title="View Acceossries" class="bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                    <span class="font-semibold"><i class="fa fa-eye"></i>   {{ $instrument->instrumentaccessoriesInformations ? $instrument->instrumentaccessoriesInformations->count() : 0 }}</span>
                                    </a>   
                                <a href="{{ route('superadmin.add_accessories', ['id' => $instrument->id]) }}" title="Add Acceossries" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </td>   

                            <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
                            {{ $instrument->model_number ?? 'Not Specified' }}
                            </td>
                            <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm"> {{ $instrument->purchaseInformation->manufacture_name ?? 'Not Specified' }}</td>
                            <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Lab {{ $instrument->lab_id }}</td>
                            <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                                <span class="bg-success/10 text-success px-2 py-1 rounded-[3px] font-bold">Available</span>
                                <!-- <span class="bg-warning/10 text-warning px-2 py-1 rounded-[3px] font-bold">In Use</span> -->
                                <!-- <span class="bg-danger/10 text-danger px-2 py-1 rounded-[3px] font-bold">Maintenance</span> -->
                            </td>
                            <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm"></td>
                            <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                                <div class="flex gap-2 items-center">
                                    <a href="{{route('create_instrument')}}" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href=" {{ route('superadmin.view_instrument', ['id' => $instrument->id]) }}"  title="View Details" class="bg-success/10 text-success h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                        <i class="fa fa-eye"></i>
                                    </a>
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

                </table>
      
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-4">
        <div class="text-sm text-gray-600">
                Showing {{ $instruments->firstItem() }} to {{ $instruments->lastItem() }} of {{ $instruments->total() }} entries
            </div>
            <div class="mt-4">
                {{ $instruments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection