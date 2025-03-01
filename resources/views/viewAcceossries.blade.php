@extends('layout.layout')
@section('content')
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between items-center">
        <span class="font-semibold text-primary text-xl">Scanning Electron Microscope - Accessories</span>
    </div>

    <!-- Accessories Grid -->
    <div class="p-4 grid xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-6">
        <!-- Accessory Card 1 -->
        <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR03FMsiI0XukUUTpcdr3N5W1rdgoi4U9mC7g&s" alt="EDS Detector" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-primary text-lg mb-2">EDS Detector</h3>
                <div class="grid grid-cols-2 gap-2 text-sm mb-4">
                    <span class="text-gray-600">Model:</span>
                    <span class="font-medium">X-Max 50</span>
                    <span class="text-gray-600">Manufacturer:</span>
                    <span class="font-medium">Oxford Instruments</span>
                    <span class="text-gray-600">Status:</span>
                    <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs font-semibold w-fit">Working</span>
                    <span class="text-gray-600">Purchase Date:</span>
                    <span class="font-medium">2022-06-15</span>
                </div>
                <p class="text-sm text-gray-600 mb-4">Energy-dispersive X-ray spectroscopy detector for elemental analysis with resolution up to 125 eV.</p>
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

        <!-- Accessory Card 2 -->
        <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3kWJPYwdYjPpx8QdL7Xq5wXfbedKBqfOq_Q&s" alt="Sample Stage" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-primary text-lg mb-2">5-Axis Sample Stage</h3>
                <div class="grid grid-cols-2 gap-2 text-sm mb-4">
                    <span class="text-gray-600">Model:</span>
                    <span class="font-medium">CompuStage</span>
                    <span class="text-gray-600">Manufacturer:</span>
                    <span class="font-medium">FEI Company</span>
                    <span class="text-gray-600">Status:</span>
                    <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs font-semibold w-fit">Working</span>
                    <span class="text-gray-600">Purchase Date:</span>
                    <span class="font-medium">2022-06-15</span>
                </div>
                <p class="text-sm text-gray-600 mb-4">High-precision motorized stage with 5-axis movement capability for precise sample positioning.</p>
                <div class="flex gap-2">
                    <a href="#" class="flex items-center gap-2 p-2 border rounded hover:bg-gray-50">
                        <i class="fa fa-file-pdf text-danger"></i>
                        <span class="text-sm">Manual</span>
                    </a>
                    <a href="#" class="flex items-center gap-2 p-2 border rounded hover:bg-gray-50">
                        <i class="fa fa-file-pdf text-danger"></i>
                        <span class="text-sm">Calibration</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Accessory Card 3 -->
        <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRk7AgwOhzXofWnwlZPdXGVG1wKR_2nljcObQ&s" alt="BSE Detector" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-primary text-lg mb-2">BSE Detector</h3>
                <div class="grid grid-cols-2 gap-2 text-sm mb-4">
                    <span class="text-gray-600">Model:</span>
                    <span class="font-medium">DBS-A</span>
                    <span class="text-gray-600">Manufacturer:</span>
                    <span class="font-medium">JEOL</span>
                    <span class="text-gray-600">Status:</span>
                    <span class="px-2 py-1 bg-warning/20 text-warning rounded-full text-xs font-semibold w-fit">Maintenance</span>
                    <span class="text-gray-600">Purchase Date:</span>
                    <span class="font-medium">2022-06-15</span>
                </div>
                <p class="text-sm text-gray-600 mb-4">Backscattered electron detector for compositional imaging with high sensitivity and resolution.</p>
                <div class="flex gap-2">
                    <a href="#" class="flex items-center gap-2 p-2 border rounded hover:bg-gray-50">
                        <i class="fa fa-file-pdf text-danger"></i>
                        <span class="text-sm">Manual</span>
                    </a>
                    <a href="#" class="flex items-center gap-2 p-2 border rounded hover:bg-gray-50">
                        <i class="fa fa-file-pdf text-danger"></i>
                        <span class="text-sm">Service Guide</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection