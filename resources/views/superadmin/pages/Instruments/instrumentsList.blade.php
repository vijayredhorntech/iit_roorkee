@extends('superadmin.layout.layout')

@section('content')

@php
    $totalInstruments = count($instruments);
@endphp
<div class="w-full grid xl:grid-cols-5 lg:grid-cols-3 md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-2">
    
          <!-- Total Instruments -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-primary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Total Instruments</span>
                  <span class="font-bold text-2xl text-ternary"> {{ $totalInstruments > 0 ? $totalInstruments : 0 }}</span>
              </div>
              <div>
                  <i class="fa fa-microscope text-4xl text-primary"></i>
              </div>
          </div>

          <!-- Instruments Not Working -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-danger bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Instruments Down</span>
                  <span class="font-bold text-2xl text-ternary">3</span>
              </div>
              <div>
                  <i class="fa fa-triangle-exclamation text-4xl text-danger"></i>
              </div>
          </div>

          <!-- Pending Services -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-warning bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Pending Services</span>
                  <span class="font-bold text-2xl text-ternary">5</span>
              </div>
              <div>
                  <i class="fa fa-wrench text-4xl text-warning"></i>
              </div>
          </div>

          <!-- Total Categories -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-secondary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Instrument Categories</span>
                  <span class="font-bold text-2xl text-ternary">8</span>
              </div>
              <div>
                  <i class="fa fa-list text-4xl text-secondary"></i>
              </div>
          </div>

          <!-- Today's Bookings -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-primary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Today's Bookings</span>
                  <span class="font-bold text-2xl text-ternary">15</span>
              </div>
              <div>
                  <i class="fa fa-calendar-day text-4xl text-primary"></i>
              </div>
          </div>          
          </div>
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300 mt-6">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
        <span class="font-semibold text-primary text-xl">Instruments List</span>
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
            <input type="text" name="model_number" required placeholder="Search instrument" class="px-2 py-1 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
            <select name="category" required class="px-2 py-1 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
            <option value="All">All</option>
                    <option value="Available">Available</option>
                    <option value="In Use">In Use</option>
                    <option value="Under Maintenance">Under Maintenance</option>                  
             </select>
             
            </div>
        </div>
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
                            <span class="font-semibold"><i class="fa fa-eye"></i> 8</span>
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