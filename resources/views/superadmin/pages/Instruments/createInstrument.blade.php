@extends('superadmin.layout.layout')
@section('content')

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


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
                                    <input type="text" name="name" value="{{ old('name') }}" required  placeholder="Instrument name ....." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                    @if ($errors->has('name'))
                                        <span class="text-red-500">{{ $errors->first('name') }}</span>
                                    @endif
                                  </div>
                                  <div class="w-full flex flex-col gap-1">
                                    <label class="font-semibold text-primary">Model Number <span class="text-danger">*</span></label>
                                    <input type="text" name="model_number" value="{{ old('model_number') }}" required placeholder="Model number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                    @if ($errors->has('model_number'))
                                        <span class="text-red-500">{{ $errors->first('model_number') }}</span>
                                    @endif
                                  </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Serial Number <span class="text-danger">*</span></label>
                                  <input type="text" name="serial_number" value="{{ old('serial_number') }}"  required placeholder="Serial number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                  @if ($errors->has('serial_number'))
                                        <span class="text-red-500">{{ $errors->first('serial_number') }}</span>
                                    @endif
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Asset ID/Inventory Number <span class="text-danger">*</span></label>
                                  <input type="text" name="asset_id" value="{{ old('asset_id') }}" required placeholder="Asset ID" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                  @if ($errors->has('asset_id'))
                                        <span class="text-red-500">{{ $errors->first('asset_id') }}</span>
                                    @endif
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Category/Type <span class="text-danger">*</span></label>
                                 
                                  <select name="category_id" id="category_select"  required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                      <option value="">--- Select Category ---</option>
                                          @forelse($instrumentCategories as $instrumentcategory)
                                              <option value="{{ $instrumentcategory->id }}">{{ $instrumentcategory->name }}</option>
                                          @empty
                                              <option >No PI found</option>
                                          @endforelse
                                  </select>
                                  @if ($errors->has('first_name'))
                                        <span class="text-red-500">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Location (Lab) <span class="text-danger">*</span></label>
                                  <select name="lab_id" id="lab_select"   required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                      <option value="">--- Select Lab ---</option>
                                          @forelse($labs as $lab)
                                             
                                              <option value="{{$lab->id }}">{{ $lab->name }}</option>
                                          @empty
                                              <option >No PI found</option>
                                          @endforelse
                                  </select>

                                  @if ($errors->has('lab_id'))
                                        <span class="text-red-500">{{ $errors->first('lab_id') }}</span>
                                    @endif 
                                   <!-- <select name="lab_id" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                      <option value="">Select Lab</option>
                                      <option value="1">Lab 1</option>

                                  </select> -->
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Operating Status <span class="text-danger">*</span></label>
                                  <select name="operating_status" required  value="{{ old('operating_status') }}" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                      <option value="working">Working</option>
                                      <option value="under maintainance">Under Maintainance</option>
                                      <option value="out of order">Out of Order</option>

                                  </select>
                                  @if ($errors->has('operating_status'))
                                        <span class="text-red-500">{{ $errors->first('operating_status') }}</span>
                                    @endif
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Per Hour Cost <span class="text-danger">*</span></label>
                                  <input type="number" name="perhourcost" required placeholder="Per hour cost" value="{{ old('perhourcost') }}" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                  @if ($errors->has('perhourcost'))
                                        <span class="text-red-500">{{ $errors->first('perhourcost') }}</span>
                                    @endif
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Minimum Booking Duration <span class="text-danger">*</span></label>
                                  <input type="number" name="minimumbookingduration" value="{{ old('minimumbookingduration') }}"  required placeholder="Duration(Hours)" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                  @if ($errors->has('minimumbookingduration'))
                                        <span class="text-red-500">{{ $errors->first('minimumbookingduration') }}</span>
                                    @endif
                                </div>
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Maximum Booking Duration <span class="text-danger">*</span></label>
                                  <input type="number" name="maximum_booking_duration"  value="{{ old('maximum_booking_duration') }}" required placeholder="Duration(Hours)" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                  @if ($errors->has('maximum_booking_duration'))
                                        <span class="text-red-500">{{ $errors->first('maximum_booking_duration') }}</span>
                                    @endif
                                </div>
                              
                                <div class="w-full flex flex-col gap-1">
                                  <label class="font-semibold text-primary">Description</label>
                                  <textarea name="description" rows="2" value="{{ old('description') }}" placeholder="Instrument description" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                                  @if ($errors->has('description'))
                                        <span class="text-red-500">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>


                               </div>
                               <div class="w-full xl:col-span-4 bg-primary/10 px-4 py-2 font-semibold text-primary">
                                Purchase Information
                               </div>
                               <div class="w-full grid xl:grid-cols-4 gap-2 p-4 ">
                                    <div class="w-full flex flex-col gap-1">
                                      <label class="font-semibold text-primary">Manufacturer Name <span class="text-danger">*</span></label>
                                      <input type="text" name="manufacturer_name" value="{{ old('manufacturer_name') }}" required placeholder="Manufacturer name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                      @if ($errors->has('manufacturer_name'))
                                        <span class="text-red-500">{{ $errors->first('manufacturer_name') }}</span>
                                    @endif
                                    </div>
                                    <div class="w-full flex flex-col gap-1">
                                      <label class="font-semibold text-primary">Vendor Name <span class="text-danger">*</span></label>
                                      <input type="text" name="vendor_name" value="{{ old('vendor_name') }}"  required placeholder="Vendor name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                      @if ($errors->has('vendor_name'))
                                        <span class="text-red-500">{{ $errors->first('vendor_name') }}</span>
                                    @endif
                                    </div>
                                    <div class="w-full flex flex-col gap-1">
                                      <label class="font-semibold text-primary">Purchase Order Number</label>
                                      <input type="text" name="po_number"  value="{{ old('po_number') }}" placeholder="PO number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                      @if ($errors->has('po_number'))
                                        <span class="text-red-500">{{ $errors->first('po_number') }}</span>
                                    @endif
                                    </div>
                                    <div class="w-full flex flex-col gap-1">
                                      <label class="font-semibold text-primary">Purchase Date</label>
                                      <input type="date" name="purchase_date"  value="{{ old('purchase_date') }}" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                      @if ($errors->has('purchase_date'))
                                        <span class="text-red-500">{{ $errors->first('purchase_date') }}</span>
                                    @endif
                                    </div>
                                    <div class="w-full flex flex-col gap-1">
                                      <label class="font-semibold text-primary">Cost</label>
                                      <input type="number" name="cost" placeholder="Cost"  value="{{ old('cost') }}"  class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                      @if ($errors->has('cost'))
                                        <span class="text-red-500">{{ $errors->first('cost') }}</span>
                                    @endif
                                    </div>
                                    <div class="w-full flex flex-col gap-1">
                                      <label class="font-semibold text-primary">Funding Source</label>
                                      <input type="text" name="funding_source"  value="{{ old('funding_source') }}" placeholder="Funding source" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                      @if ($errors->has('funding_source'))
                                        <span class="text-red-500">{{ $errors->first('funding_source') }}</span>
                                    @endif
                                    </div>
                                </div>
                                <div class="w-full xl:col-span-4 bg-primary/10 px-4 py-2 font-semibold text-primary">
                                  Service Engineer Information
                                 </div>
                                 <div class="w-full grid xl:grid-cols-4 gap-2 p-4 ">
                                      <div class="w-full flex flex-col gap-1">
                                        <label class="font-semibold text-primary">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="engineer_name"  value="{{ old('engineer_name') }}"  required placeholder="Engineer name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                        @if ($errors->has('engineer_name'))
                                        <span class="text-red-500">{{ $errors->first('engineer_name') }}</span>
                                    @endif
                                      </div>
                                      <div class="w-full flex flex-col gap-1">
                                        <label class="font-semibold text-primary">Phone</label>
                                        <input type="tel" name="engineer_phone"  value="{{ old('engineer_phone') }}"  placeholder="Phone number" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                        @if ($errors->has('engineer_phone'))
                                        <span class="text-red-500">{{ $errors->first('engineer_phone') }}</span>
                                    @endif
                                      </div>
                                      <div class="w-full flex flex-col gap-1">
                                        <label class="font-semibold text-primary">Email</label>
                                        <input type="email" name="engineer_email" value="{{ old('engineer_email') }}"  placeholder="Email address" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                        @if ($errors->has('engineer_email'))
                                        <span class="text-red-500">{{ $errors->first('engineer_email') }}</span>
                                    @endif
                                      </div>
                                      <div class="w-full flex flex-col gap-1">
                                        <label class="font-semibold text-primary">Company</label>
                                        <input type="text" name="engineer_company" placeholder="Company name" value="{{ old('engineer_company') }}" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                        @if ($errors->has('engineer_company'))
                                        <span class="text-red-500">{{ $errors->first('engineer_company') }}</span>
                                    @endif
                                      </div>
                                      <div class="w-full xl:col-span-2 flex flex-col gap-1">
                                        <label class="font-semibold text-primary">Address</label>
                                        <textarea name="engineer_address" placeholder="Address" value="{{ old('engineer_address') }}" rows="2" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                                        @if ($errors->has('engineer_address'))
                                        <span class="text-red-500">{{ $errors->first('engineer_address') }}</span>
                                    @endif
                                      </div>
                                  </div>

                                  <div class="w-full xl:col-span-4 bg-primary/10 px-4 py-2 font-semibold text-primary">
                                    Dates & Warranty Information
                                   </div>
                                   <div class="w-full grid xl:grid-cols-4 gap-2 p-4 ">
                                        <div class="w-full flex flex-col gap-1">
                                          <label class="font-semibold text-primary">Manufacturing Date</label>
                                          <input type="date" name="manufacturing_date" value="{{ old('manufacturing_date') }}" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                          @if ($errors->has('manufacturing_date'))
                                        <span class="text-red-500">{{ $errors->first('manufacturing_date') }}</span>
                                    @endif
                                        </div>
                                        <div class="w-full flex flex-col gap-1">
                                          <label class="font-semibold text-primary">Installation Date</label>
                                          <input type="date" name="installation_date" value="{{ old('installation_date') }}" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                          @if ($errors->has('installation_date'))
                                        <span class="text-red-500">{{ $errors->first('installation_date') }}</span>
                                    @endif
                                        </div>
                                        <div class="w-full flex flex-col gap-1">
                                          <label class="font-semibold text-primary">Warranty Period (months)</label>
                                          <input type="number" name="warranty_period"  value="{{ old('warranty_period') }}"  placeholder="Warranty period" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                          @if ($errors->has('warranty_period'))
                                        <span class="text-red-500">{{ $errors->first('warranty_period') }}</span>
                                    @endif
                                        </div>
                                        <div class="w-full flex flex-col gap-1">
                                          <label class="font-semibold text-primary">Next Service Due Date</label>
                                          <input type="date" name="next_service_date"  value="{{ old('next_service_date') }}" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                          @if ($errors->has('next_service_date'))
                                        <span class="text-red-500">{{ $errors->first('next_service_date') }}</span>
                                    @endif
                                        </div>
                                    </div>

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
                                          
                                                @if ($errors->has('instrument_photos'))
                                                <span class="text-red-500">{{ $errors->first('instrument_photos') }}</span>
                                                 @endif
                                              </div>

                                            <!-- Other File Inputs -->
                                            <div class="w-full flex flex-col gap-1">
                                                <label class="font-semibold text-primary">Operation Manual</label>
                                                <input type="file" name="operation_manual" value="{{ old('operation_manual') }}" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                                @if ($errors->has('operation_manual'))
                                        <span class="text-red-500">{{ $errors->first('operation_manual') }}</span>
                                    @endif
                                              </div>
                                            <div class="w-full flex flex-col gap-1">
                                                <label class="font-semibold text-primary">Service Manual</label>
                                                <input type="file" name="service_manual" value="{{ old('service_manual') }}" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                                @if ($errors->has('service_manual'))
                                        <span class="text-red-500">{{ $errors->first('service_manual') }}</span>
                                    @endif
                                              </div>
                                            <div class="w-full flex flex-col gap-1">
                                                <label class="font-semibold text-primary">Additional Documents</label>
                                                <input type="file" name="additional_documents" value="{{ old('additional_documents') }}" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                                @if ($errors->has('additional_documents'))
                                        <span class="text-red-500">{{ $errors->first('additional_documents') }}</span>
                                    @endif
                                              </div>
                                            <div class="w-full flex flex-col gap-1">
                                                <label class="font-semibold text-primary">Video Links</label>
                                                <input type="text" name="video_links" value="{{ old('video_links') }}" placeholder="Video links" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                                            </div>
                                        </div>





                               <div class="w-full flex justify-end px-4 pb-4 gap-2">
                                     <button type="submit" class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Create Instrument</button>
                               </div>
                           </form>
                       </div>
          
                  </div>

                  <!-- jQuery (Required for Select2) -->
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

              <!-- Select2 JS -->
              <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

              <script>
                  $(document).ready(function() {
                      $('#category_select').select2({
                          placeholder: "--- Select Category ---",
                          allowClear: true
                      });

                      $('#lab_select').select2({
                          placeholder: "--- Select Lab ---",
                          allowClear: true
                      });
                  });

                  //expend images

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