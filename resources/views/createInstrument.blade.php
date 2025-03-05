@extends('superadmin.layout.layout')
@section('content')



<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                      <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
                          <span class="font-semibold text-primary text-xl">Create New Instrument </span>
                        </div>
          
          
          
                       <div id="formDiv" class="w-full border-b-[2px] border-b-ternary/10 shadow-lg shadow-ternary/20 ">
                       <form action="{{ route('superadmin.instrument_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                          

                              <div class="w-full xl:col-span-4 bg-primary/10 px-4 py-2 font-semibold text-primary">
                                Basic Information
                              </div>
                               <div class="w-full grid xl:grid-cols-4 gap-2 p-4 ">
                                  <div class="w-full flex flex-col gap-1">
                                    <label class="font-semibold text-primary">Name <span class="text-danger">*</span></label>
                                    <input type="text" required  placeholder="Instrument name ....." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                </div>
                                  <div class="w-full flex flex-col gap-1">
                                    <label class="font-semibold text-primary">Model Number <span class="text-danger">*</span></label>
                                    <input type="text" name="model_number" required placeholder="Model number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Serial Number <span class="text-danger">*</span></label>
                                  <input type="text" name="serial_number" required placeholder="Serial number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Asset ID/Inventory Number <span class="text-danger">*</span></label>
                                  <input type="text" name="asset_id" required placeholder="Asset ID" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Category/Type <span class="text-danger">*</span></label>
                                  <select name="category" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                      <option value="">Select Category</option>
                                      <option value="">Category 1</option>
                                      
                                  </select>
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Location (Lab) <span class="text-danger">*</span></label>
                                  <select name="lab_id" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                      <option value="">Select Lab</option>
                                      <option value="">Lab 1</option>

                                  </select>
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Operating Status <span class="text-danger">*</span></label>
                                  <select name="lab_id" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                      <option value="">Working</option>
                                      <option value="">Under Maintainance</option>
                                      <option value="">Out of Order</option>

                                  </select>
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Per Hour Cost <span class="text-danger">*</span></label>
                                  <input type="number" name="serial_number" required placeholder="Per hour cost" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Minimum Booking Duration <span class="text-danger">*</span></label>
                                  <input type="number" name="serial_number" required placeholder="Duration(Hours)" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Maximum Booking Duration <span class="text-danger">*</span></label>
                                  <input type="number" name="serial_number" required placeholder="Duration(Hours)" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                </div>
                              
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Description</label>
                                  <textarea name="description" rows="2" placeholder="Instrument description" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                                </div>


                               </div>
                               <div class="w-full xl:col-span-4 bg-primary/10 px-4 py-2 font-semibold text-primary">
                                Purchase Information
                               </div>
                               <div class="w-full grid xl:grid-cols-4 gap-2 p-4 ">
                                    <div class="w-full flex flex-col gap-1">
                                      <label class="font-semibold text-primary">Manufacturer Name <span class="text-danger">*</span></label>
                                      <input type="text" name="manufacturer_name" required placeholder="Manufacturer name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                    </div>
                                    <div class="w-full flex flex-col gap-1">
                                      <label class="font-semibold text-primary">Vendor Name <span class="text-danger">*</span></label>
                                      <input type="text" name="manufacturer_name" required placeholder="Vendor name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                    </div>
                                    <div class="w-full flex flex-col gap-1">
                                      <label class="font-semibold text-primary">Purchase Order Number</label>
                                      <input type="text" name="po_number" placeholder="PO number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                    </div>
                                    <div class="w-full flex flex-col gap-1">
                                      <label class="font-semibold text-primary">Purchase Date</label>
                                      <input type="date" name="purchase_date" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                    </div>
                                    <div class="w-full flex flex-col gap-1">
                                      <label class="font-semibold text-primary">Cost</label>
                                      <input type="number" name="cost" placeholder="Cost" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                    </div>
                                    <div class="w-full flex flex-col gap-1">
                                      <label class="font-semibold text-primary">Funding Source</label>
                                      <input type="text" name="funding_source" placeholder="Funding source" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                    </div>
                                </div>
                                <div class="w-full xl:col-span-4 bg-primary/10 px-4 py-2 font-semibold text-primary">
                                  Service Engineer Information
                                 </div>
                                 <div class="w-full grid xl:grid-cols-4 gap-2 p-4 ">
                                      <div class="w-full flex flex-col gap-1">
                                        <label class="font-semibold text-primary">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="engineer_name" required placeholder="Engineer name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                      </div>
                                      <div class="w-full flex flex-col gap-1">
                                        <label class="font-semibold text-primary">Phone</label>
                                        <input type="tel" name="engineer_phone" placeholder="Phone number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                      </div>
                                      <div class="w-full flex flex-col gap-1">
                                        <label class="font-semibold text-primary">Email</label>
                                        <input type="email" name="engineer_email" placeholder="Email address" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                      </div>
                                      <div class="w-full flex flex-col gap-1">
                                        <label class="font-semibold text-primary">Company</label>
                                        <input type="text" name="engineer_company" placeholder="Company name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                      </div>
                                      <div class="w-full xl:col-span-2 flex flex-col gap-1">
                                        <label class="font-semibold text-primary">Address</label>
                                        <textarea name="engineer_address" placeholder="Address" rows="2" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                                      </div>
                                  </div>

                                  <div class="w-full xl:col-span-4 bg-primary/10 px-4 py-2 font-semibold text-primary">
                                    Dates & Warranty Information
                                   </div>
                                   <div class="w-full grid xl:grid-cols-4 gap-2 p-4 ">
                                        <div class="w-full flex flex-col gap-1">
                                          <label class="font-semibold text-primary">Manufacturing Date</label>
                                          <input type="date" name="manufacturing_date" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                        </div>
                                        <div class="w-full flex flex-col gap-1">
                                          <label class="font-semibold text-primary">Installation Date</label>
                                          <input type="date" name="installation_date" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                        </div>
                                        <div class="w-full flex flex-col gap-1">
                                          <label class="font-semibold text-primary">Warranty Period (months)</label>
                                          <input type="number" name="warranty_period" placeholder="Warranty period" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                        </div>
                                        <div class="w-full flex flex-col gap-1">
                                          <label class="font-semibold text-primary">Next Service Due Date</label>
                                          <input type="date" name="next_service_date" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                        </div>
                                    </div>

                                    <!-- <div class="w-full xl:col-span-4 bg-primary/10 px-4 py-2 font-semibold text-primary">
                                      Photos And Documents
                                     </div>
                                     <div class="w-full grid xl:grid-cols-4 gap-2 p-4 ">
                                          <div class="w-full flex flex-col gap-1">
                                            <label class="font-semibold text-primary">Instrument Photos</label>
                                            <input type="file" name="manufacturing_date" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                          </div>
                                          <div class="w-full flex flex-col gap-1">
                                            <label class="font-semibold text-primary">Operation Manual</label>
                                            <input type="file" name="manufacturing_date" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                          </div>
                                          <div class="w-full flex flex-col gap-1">
                                            <label class="font-semibold text-primary">Service Manual</label>
                                            <input type="file" name="manufacturing_date" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                          </div>
                                          <div class="w-full flex flex-col gap-1">
                                            <label class="font-semibold text-primary">Aditional Documents</label>
                                            <input type="file" name="manufacturing_date" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                          </div>
                                          <div class="w-full flex flex-col gap-1">
                                            <label class="font-semibold text-primary">Video Links</label>
                                            <input type="text" name="manufacturing_date" placeholder="Video links" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                          </div>
                                       
                                      </div> -->

                                      <div class="w-full xl:col-span-4 bg-primary/10 px-4 py-2 font-semibold text-primary">
                                            Photos And Documents
                                        </div>

                                        <div class="w-full grid xl:grid-cols-4 gap-2 p-4">
                                            <!-- Instrument Photos with Dynamic Add/Remove -->
                                            <div class="w-full flex flex-col gap-1">
                                                <label class="font-semibold text-primary">Instrument Photos</label>
                                                <div id="instrument-photos-container">
                                                    <div class="flex gap-2 items-center">
                                                        <input type="file" name="instrument_photos[]" class="instrument-photo-input px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                                        <button type="button" class="add-photo-btn px-2 py-1 bg-green-500 text-white rounded">+</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Other File Inputs -->
                                            <div class="w-full flex flex-col gap-1">
                                                <label class="font-semibold text-primary">Operation Manual</label>
                                                <input type="file" name="operation_manual" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                            </div>
                                            <div class="w-full flex flex-col gap-1">
                                                <label class="font-semibold text-primary">Service Manual</label>
                                                <input type="file" name="service_manual" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                            </div>
                                            <div class="w-full flex flex-col gap-1">
                                                <label class="font-semibold text-primary">Additional Documents</label>
                                                <input type="file" name="additional_documents" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                            </div>
                                            <div class="w-full flex flex-col gap-1">
                                                <label class="font-semibold text-primary">Video Links</label>
                                                <input type="text" name="video_links" placeholder="Video links" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                            </div>
                                        </div>



                               <div class="w-full flex justify-end px-4 pb-4 gap-2">
                                     <button type="submit" class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Create Instrument</button>
                               </div>
                           </form>
                       </div>
          
                  </div>

                  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const container = document.getElementById("instrument-photos-container");

        document.querySelector(".add-photo-btn").addEventListener("click", function () {
            const newInputGroup = document.createElement("div");
            newInputGroup.classList.add("flex", "gap-2", "items-center");

            const newInput = document.createElement("input");
            newInput.type = "file";
            newInput.name = "instrument_photos[]";
            newInput.classList.add("instrument-photo-input", "px-2", "py-2", "w-full", "text-sm", "font-medium", "bg-transparent", "placeholder-primary/70", "border-[2px]", "border-primary/40", "rounded-[3px]", "rounded-tr-[8px]", "rounded-bl-[8px]", "focus:ring-0", "focus:outline-none", "focus:border-primary", "transition", "ease-in", "duration-2000");

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

@push('scripts')

@endpush