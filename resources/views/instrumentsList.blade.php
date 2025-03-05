@extends('layout.layout')

@section('content')
<div class="w-full grid xl:grid-cols-5 lg:grid-cols-3 md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-2">
    
          <!-- Total Instruments -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-primary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Total Instruments</span>
                  <span class="font-bold text-2xl text-ternary">75</span>
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

            <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">1</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">Spectrophotometer</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
            <a href="{{route('view_acceossries')}}"  title="View Acceossries" class="bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                <span class="font-semibold"><i class="fa fa-eye"></i> 8</span>
                </a>   
            <a href="{{route('add_acceossries')}}" title="Add Acceossries" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </td>   
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">UV-1800</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Shimadzu</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Lab 101</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <span class="bg-success/10 text-success px-2 py-1 rounded-[3px] font-bold">Available</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">2023-10-15</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
                <a href="{{route('create_instrument')}}" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-pen"></i>
                </a>
                <a href="{{route('view_instrument')}}"  title="View Details" class="bg-success/10 text-success h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">2</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">HPLC System</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
            <a href="{{route('view_acceossries')}}"  title="View Acceossries" class="bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                <span class="font-semibold"><i class="fa fa-eye"></i> 4</span>
                </a>   
            <a href="{{route('add_acceossries')}}" title="Add Acceossries" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </td>   
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Nexera X3</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Shimadzu</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Lab 205</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <span class="bg-warning/10 text-warning px-2 py-1 rounded-[3px] font-bold">In Use</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">2024-01-22</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
                <a href="{{route('create_instrument')}}" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-pen"></i>
                </a>
                <a href="{{route('view_instrument')}}"  title="View Details" class="bg-success/10 text-success h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">3</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">Mass Spectrometer</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
            <a href="{{route('view_acceossries')}}"  title="View Acceossries" class="bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                <span class="font-semibold"><i class="fa fa-eye"></i> 5</span>
                </a>   
            <a href="{{route('add_acceossries')}}" title="Add Acceossries" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </td>   
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">LCMS-8050</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Shimadzu</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Lab 302</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <span class="bg-danger/10 text-danger px-2 py-1 rounded-[3px] font-bold">Maintenance</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">2024-02-05</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
                <a href="{{route('create_instrument')}}" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-pen"></i>
                </a>
                <a href="{{route('view_instrument')}}"  title="View Details" class="bg-success/10 text-success h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">4</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">Gas Chromatograph</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
            <a href="{{route('view_acceossries')}}"  title="View Acceossries" class="bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                <span class="font-semibold"><i class="fa fa-eye"></i> 9</span>
                </a>   
            <a href="{{route('add_acceossries')}}" title="Add Acceossries" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </td>   
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">7890B</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Agilent</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Lab 201</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <span class="bg-success/10 text-success px-2 py-1 rounded-[3px] font-bold">Available</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">2023-12-18</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
                <a href="{{route('create_instrument')}}" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-pen"></i>
                </a>
                <a href="{{route('view_instrument')}}"  title="View Details" class="bg-success/10 text-success h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">5</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">Fluorescence Microscope</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
            <a href="{{route('view_acceossries')}}"  title="View Acceossries" class="bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                <span class="font-semibold"><i class="fa fa-eye"></i> 6</span>
                </a>   
            <a href="{{route('add_acceossries')}}" title="Add Acceossries" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </td>   
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">BX53</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Olympus</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Lab 405</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <span class="bg-warning/10 text-warning px-2 py-1 rounded-[3px] font-bold">In Use</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">2024-01-10</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
                <a href="{{route('create_instrument')}}" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-pen"></i>
                </a>
                <a href="{{route('view_instrument')}}"  title="View Details" class="bg-success/10 text-success h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">6</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">PCR Thermal Cycler</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
            <a href="{{route('view_acceossries')}}"  title="View Acceossries" class="bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                <span class="font-semibold"><i class="fa fa-eye"></i> 3</span>
                </a>   
            <a href="{{route('add_acceossries')}}" title="Add Acceossries" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </td>   
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">QuantStudio 5</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Thermo Fisher</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Lab 301</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <span class="bg-success/10 text-success px-2 py-1 rounded-[3px] font-bold">Available</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">2023-11-30</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
                <a href="{{route('create_instrument')}}" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-pen"></i>
                </a>
                <a href="{{route('view_instrument')}}"  title="View Details" class="bg-success/10 text-success h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">7</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">Centrifuge</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
            <a href="{{route('view_acceossries')}}"  title="View Acceossries" class="bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                <span class="font-semibold"><i class="fa fa-eye"></i> 7</span>
                </a>   
            <a href="{{route('add_acceossries')}}" title="Add Acceossries" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </td>   
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">5430R</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Eppendorf</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Lab 203</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <span class="bg-danger/10 text-danger px-2 py-1 rounded-[3px] font-bold">Maintenance</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">2024-02-15</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
                <a href="{{route('create_instrument')}}" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-pen"></i>
                </a>
                <a href="{{route('view_instrument')}}"  title="View Details" class="bg-success/10 text-success h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </td>
    </tr>

    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">8</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">FTIR Spectrometer</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
            <a href="{{route('view_acceossries')}}"  title="View Acceossries" class="bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                <span class="font-semibold"><i class="fa fa-eye"></i> 5</span>
                </a>   
            <a href="{{route('add_acceossries')}}" title="Add Acceossries" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </td>   
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Spectrum Two</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">PerkinElmer</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Lab 102</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <span class="bg-success/10 text-success px-2 py-1 rounded-[3px] font-bold">Available</span>
        </td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">2024-01-05</td>
        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
            <div class="flex gap-2 items-center">
                <a href="{{route('create_instrument')}}" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-pen"></i>
                </a>
                <a href="{{route('view_instrument')}}"  title="View Details" class="bg-success/10 text-success h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                    <i class="fa fa-eye"></i>
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