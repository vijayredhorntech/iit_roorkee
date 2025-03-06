@extends('superadmin.layout.layout')

@section('content')
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between items-center">
        <span class="font-semibold text-primary text-xl">{{$instrument->name}}</span>
    </div>

   




    <!-- Accessories Grid -->
    <div class="p-4 grid xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-6">

 
    
    @forelse($accessories as $accessory)

    @php
    $images=json_decode($accessory->photos);

     @endphp
    <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
            <img src="{{ asset($images[0]) }}" alt="EDS Detector" class="w-full h-48 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-primary text-lg mb-2">EDS Detector</h3>
                <div class="grid grid-cols-2 gap-2 text-sm mb-4">
                    <span class="text-gray-600">Model:</span>
                    <span class="font-medium">{{$accessory->modelNumber}}</span>
                    <span class="text-gray-600">Manufacturer:</span>
                    <span class="font-medium">{{$accessory->model_number}}</span>
                    <span class="text-gray-600">Status:</span>
                    <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs font-semibold w-fit"> {{$accessory->status}}  </span>
                    <span class="text-gray-600">Purchase Date:</span>
                    <span class="font-medium"> {{$accessory->purchase_date}}</span>
                </div>
                <p class="text-sm text-gray-600 mb-4">  {{$accessory->purpose}} </p>
                <div class="flex gap-2">
                    <a href="#" class="flex items-center gap-2 p-2 border rounded hover:bg-gray-50">
                        <i class="fa fa-file-pdf text-danger"></i>
                        <span class="text-sm">Manual</span>
                    </a>
                    <a href="#" class="flex items-center gap-2 p-2 border rounded hover:bg-gray-50">
                        <i class="fa fa-file-pdf text-danger"></i>
                        <span class="text-sm">Specs</span>
                    </a>
                </div>
            </div>
        </div>

 @empty
 No record Found
 @endforelse
        <!-- Accessory Card 1 -->
       



    
@endsection