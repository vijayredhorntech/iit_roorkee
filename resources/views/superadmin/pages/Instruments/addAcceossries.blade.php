@extends('superadmin.layout.layout')
@section('content')
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
        <span class="font-semibold text-primary text-xl">Add Accessories for <span class="italic">{{$instrument->name}}</span></span>
    </div>

    <div id="formDiv" class="w-full border-b-[2px] border-b-ternary/10 shadow-lg shadow-ternary/20">
    <form action="{{ route('superadmin.accessory_store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="w-full grid xl:grid-cols-4 gap-2 p-4">
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Types <span class="text-danger">*</span></label>
                    <input type="hidden" name="instrument_id"  value="{{$instrument->id}}"placeholder="Accessory type..." />
                    <input type="text" name="accessory_type" required placeholder="Accessory type..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                       @if ($errors->has('accessory_type'))
                        <span class="text-red-500">{{ $errors->first('accessory_type') }}</span>
                    @endif
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Name <span class="text-danger">*</span></label>
                    <input type="text" name="accessory_name" required placeholder="Accessory name..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    @if ($errors->has('accessory_name'))
                          <span class="text-red-500">{{ $errors->first('accessory_name') }}</span>
                     @endif
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Model Number <span class="text-danger">*</span></label>
                    <input type="text" name="accessory_modelnumber" required placeholder="Model number..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                  @if ($errors->has('accessory_modelnumber'))
                          <span class="text-red-500">{{ $errors->first('accessory_modelnumber') }}</span>
                     @endif
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Serial Number <span class="text-danger">*</span></label>
                    <input type="text" name="accessory_serialnumber" required placeholder="Serial number..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                   @if ($errors->has('accessory_serialnumber'))
                          <span class="text-red-500">{{ $errors->first('accessory_serialnumber') }}</span>
                      @endif
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Purpose/Description</label>
                    <textarea rows="2" name="accessory_description" placeholder="Purpose or description..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                   @if ($errors->has('accessory_description'))
                          <span class="text-red-500">{{ $errors->first('accessory_description') }}</span>
                      @endif
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Quantity <span class="text-danger">*</span></label>
                    <input type="number" name="accessory_quantity" required placeholder="Quantity..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                   @if ($errors->has('accessory_quantity'))
                        <span class="text-red-500">{{ $errors->first('accessory_quantity') }}</span>
                     @endif
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Status <span class="text-danger">*</span></label>
                    <select required name="accessory_status" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                        <option value="">Select Status</option>
                        <option value="working">Working</option>
                        <option value="not_working">Not Working</option>
                    </select>
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Purchase Date</label>
                    <input type="date" name="purchase_date" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                   @if ($errors->has('purchase_date'))
                        <span class="text-red-500">{{ $errors->first('purchase_date') }}</span>
                    @endif
                </div>

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Warranty Period</label>
                    <input type="number" name="warrentyperiod" placeholder="Warranty period in months..." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                   @if ($errors->has('warrentyperiod'))
                         <span class="text-red-500">{{ $errors->first('warrentyperiod') }}</span>
                    @endif
                </div>

                <div class="w-full flex flex-col gap-1">
                    <!-- <label class="font-semibold text-primary">Photos</label>
                    <input type="file" multiple accept="image/*" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/> -->
                    <label class="font-semibold text-primary">Photos</label>
                    <div id="accessories-photos-container">
                        <div class="flex gap-2 items-center">
                            <input type="file" name="accessories_photos[]" class="instrument-photo-input px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                            <button type="button" class="add-photo-btn px-2 py-1 bg-green-500 text-white rounded">+</button>
                        </div>
                    </div>
                                          
                     @if ($errors->has('accessory_photos'))
                    <span class="text-red-500">{{ $errors->first('accessory_photos') }}</span>
                        @endif
                
                
                </div> 
                

                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Manual</label>
                    <input type="file"  name="manual" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                    <!-- accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" -->
                </div>
            </div>

            <div class="w-full flex justify-end px-4 pb-4 gap-2">
                                     <button type="submit" class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Add Acceossries</button>
                               </div>
        </form>
    </div>
</div>

<script>
//expend images

document.addEventListener("DOMContentLoaded", function () {
  const container = document.getElementById("accessories-photos-container");

  document.querySelector(".add-photo-btn").addEventListener("click", function () {
      const newInputGroup = document.createElement("div");
      newInputGroup.classList.add("flex", "gap-2", "items-center");

      const newInput = document.createElement("input");
      newInput.type = "file";
      newInput.name = "accessories_photos[]";
      newInput.classList.add("accessories-photo-input", "px-2", "py-2", "w-full", "text-sm", "font-medium", "bg-transparent", "placeholder-primary/70", "border-[2px]", "border-primary/40", "rounded-[3px]", "rounded-tr-[8px]", "rounded-bl-[8px]", "focus:ring-0", "focus:outline-none", "focus:border-primary", "transition", "ease-in", "duration-2000");

      const removeBtn = document.createElement("button");
      removeBtn.type = "button";
      removeBtn.classList.add("remove-photo-btn", "px-2", "py-1", "bg-red-500", "text-white", "rounded");
      removeBtn.innerText = "-";

      removeBtn.addEventListener("click", function () {
          newInputGroup.remove();
      });

      newInputGroup.appendChild(newInput);
      newInputGroup.appendChild(removeBtn);
      container.appendChild(newInputGroup);
  });
});
</script>
@endsection