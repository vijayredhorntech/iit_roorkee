@extends('superadmin.layout.layout')
@section('content')
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
        <span class="font-semibold text-primary text-xl">Add Accessories for <span class="italic">Scanning Electron Microscope</span></span>
    </div>

    <div id="formDiv" class="w-full border-b-[2px] border-b-ternary/10 shadow-lg shadow-ternary/20">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="w-full grid xl:grid-cols-4 gap-2 p-4">
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Types <span class="text-danger">*</span></label>
                    <input type="text" required placeholder="Accessory type..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Name <span class="text-danger">*</span></label>
                    <input type="text" required placeholder="Accessory name..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Model Number <span class="text-danger">*</span></label>
                    <input type="text" required placeholder="Model number..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Serial Number <span class="text-danger">*</span></label>
                    <input type="text" required placeholder="Serial number..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Purpose/Description</label>
                    <textarea rows="2" placeholder="Purpose or description..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Quantity <span class="text-danger">*</span></label>
                    <input type="number" required placeholder="Quantity..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Status <span class="text-danger">*</span></label>
                    <select required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                        <option value="">Select Status</option>
                        <option value="working">Working</option>
                        <option value="not_working">Not Working</option>
                    </select>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Purchase Date</label>
                    <input type="date" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Warranty Period</label>
                    <input type="number" placeholder="Warranty period in months..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Photos</label>
                    <input type="file" multiple accept="image/*" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Manual</label>
                    <input type="file" accept=".pdf,.doc,.docx" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                </div>
            </div>

            <div class="w-full flex justify-end px-4 pb-4 gap-2">
                                     <button type="submit" class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Add Acceossries</button>
                               </div>
        </form>
    </div>
</div>
@endsection