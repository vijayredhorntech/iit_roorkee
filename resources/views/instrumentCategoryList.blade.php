@extends('superadmin.layout.layout')
@section('content')
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
        <span class="font-semibold text-primary text-xl">Instrument Category List</span>

    </div>

    <div class="w-full p-4 flex flex-col gap-4">

    <div class="w-full grid xl:grid-cols-2 gap-4 mb-4">

     <div class="w-full flex flex-col gap-1">
         <input type="text" placeholder="Search by Name/ID" class="px-2 py-1 w-full max-w-[300px] text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
     </div>
     <div class="flex gap-2 justify-end">
 <button title="Export to excel" class="bg-success/20 text-success h-8 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white cursor-pointer transition ease-in duration-2000">
                 <i class="fa fa-file-excel"></i>
             </button>

             <button title="Export to pdf" class="bg-danger/20 text-danger h-8 w-8 flex justify-center items-center rounded-[3px] hover:bg-danger hover:text-white cursor-pointer transition ease-in duration-2000">
                 <i class="fa fa-file-pdf"></i>
             </button>
 </div>
 </div>




        <div class="w-full overflow-x-auto">

        <table class="w-full">
            <thead>
                <tr class="bg-primary/10">
                    <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Sr. No.</th>
                    <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Category Name</th>
                    <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Category Description</th>
                    <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">No. of Instruments</th>
                    <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Action</th>
                </tr>
            </thead>
            <tbody>

                    @forelse($all_category as $category)
                <!-- Sample Data Row -->

                            <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">1</td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">{{$category->name}}</td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm"> {{$category->description}}</td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                                <a href="{{route('instrument_list')}}"  title="View Instruments" class="w-max bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                            <span class="font-semibold"><i class="fa fa-eye"></i> 5</span>
                                            </a>
                                </td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                                    <div class="flex gap-2 items-center">
                                        <a href="#" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                            <i class="fa fa-pen"></i>
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
          </tbody>
        </table>
        </div>

        <div class="flex justify-between items-center mt-4">
            <div class="text-sm text-gray-600">
                    Showing {{ $all_category->firstItem() }} to {{ $all_category->lastItem() }} of {{ $all_category->total() }} entries
                </div>
                <div class="mt-4">
                    {{ $all_category->links() }}
                </div>
        </div>
    </div>
</div>
@endsection
