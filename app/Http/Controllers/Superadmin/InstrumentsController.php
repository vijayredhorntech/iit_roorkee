<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InstrumentsCategory;
use App\Models\Lab;
use App\Models\Instrument;
use App\Models\InstrumentDocument;
use App\Models\PurchaseInformation;
use App\Models\ServiceEngineerInformation;
use App\Models\WarrantyInformation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\InstrumentAccessory;

class InstrumentsController extends Controller
{




    /***Create Instrument Category ******/
    public function hs_create_instrumentcategory()
    {
      
    
        return view('superadmin.pages.Instruments.createInstrumentCategory'); 
    }
    

    /*****Store Instrument Category *********/

    public function hs_store_categories(Request $request){
        
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_description' => 'nullable|string',
        ]);

        // Store data in the database
        $instrumentcategory=new InstrumentsCategory(); 
        $instrumentcategory->name=$request->category_name;
        $instrumentcategory->description=$request->category_description;
        $instrumentcategory->status=true;
        $instrumentcategory->save(); 

        // Redirect or return response
        return redirect()->back()->with('success', 'Category added successfully!');
    }


/********Get Index for Categorylist *********/
     public function hs_instrument_categorieslist()
            {
                $all_instrumentscategory = InstrumentsCategory::paginate(10);

                return view('superadmin.pages.Instruments.instrumentCategoryList', [
                    'all_category' => $all_instrumentscategory
                ]);
            }



    /***Create Instrument Category ******/
    public function hs_instrumentlist()
    {
      

        $instruments=Instrument::with('purchaseInformation',
        'instrumentDocument',
        'serviceengineerInformation',
        'warrantyInformation')->paginate(10); 
     
        return view('superadmin.pages.Instruments.instrumentsList',[
            'instruments'=>$instruments
        ]); 
    }


   /***Create Instrument Category ******/
    public function hs_create_Instrument(){
        
        $instrumentCategories = InstrumentsCategory::where('status', 1)->get(); 
        $labs = Lab::where('status', 'active')->get(); 
        // dd($labs);
        return view('superadmin.pages.Instruments.createInstrument', [
            'instrumentCategories' => $instrumentCategories,
            'labs' => $labs
        ]); 
    }


    /********Store instrument *********/

public function hs_Instrumentstore(Request $request)
{
    // Validate Request
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'model_number' => 'required|string|max:255',
        'serial_number' => 'required|string|max:255',
        'asset_id' => 'nullable|string|max:255',
        'category_id' => 'nullable|exists:instruments_categories,id',
        'lab_id' => 'nullable|exists:labs,id',
        'description' => 'nullable|string',
        
        // Purchase Information
        'manufacturer_name' => 'required|string|max:255',
        'po_number' => 'required|string|max:255',
        'purchase_date' => 'required|date',
        'cost' => 'required|numeric|min:0',
        'funding_source' => 'required|string|max:255',

        // Service Engineer Information
        'engineer_name' => 'required|string|max:255',
        'engineer_phone' => 'required|string|max:20',
        'engineer_email' => 'required|email|max:255',
        'engineer_company' => 'nullable|string|max:255',
        'engineer_address' => 'nullable|string|max:500',

        // Warranty Information
        'manufacturing_date' => 'required|date',
        'installation_date' => 'required|date',
        'warranty_period' => 'required|integer|min:1',
        'next_service_date' => 'required|date|after_or_equal:installation_date',

        // Documents & Files
        'video_links' => 'nullable|string',
        'instrument_photos.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        'operation_manual' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
        'service_manual' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
        'additional_documents' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
    ]);


    DB::beginTransaction();
    try {

    // File Uploads
    $instrumentPhotos = [];
    if ($request->hasFile('instrument_photos')) {
        foreach ($request->file('instrument_photos') as $photo) {
            $instrumentPhotos[] = $this->uploadFile($photo, 'instruments/images', $request->name);
        }
    }

    $operation_manual = $request->hasFile('operation_manual') ? $this->uploadFile($request->file('operation_manual'), 'operation_manual', $request->name) : null;
    $service_manual = $request->hasFile('service_manual') ? $this->uploadFile($request->file('service_manual'), 'service_manual', $request->name) : null;
    $additional_documents = $request->hasFile('additional_documents') ? $this->uploadFile($request->file('additional_documents'), 'additional_documents', $request->name) : null;

    // Save Instrument
    $instrument = new Instrument();
    $instrument->name = $request->name;
    $instrument->model_number = $request->model_number;
    $instrument->serial_number = $request->serial_number;
    $instrument->asset_id = $request->asset_id;
    $instrument->category_type = $request->category_id;
    $instrument->lab_id = $request->lab_id;
    $instrument->operation_status = $request->operating_status;
    $instrument->per_hour_cost = $request->perhourcost;
    $instrument->minimum_booking_duration = $request->minimumbookingduration;
    $instrument->maximum_booking_duration = $request->maximum_booking_duration;
    $instrument->description = $request->description;
    $instrument->save();

    // Save Purchase Information
    $purchase = new PurchaseInformation();
    $purchase->instrument_id = $instrument->id;
    $purchase->manufacture_name = $request->manufacturer_name;
    $purchase->vendor_name = $request->serial_number; // Verify if this is correct
    $purchase->purchase_order_number = $request->po_number;
    $purchase->purchase_date = $request->purchase_date;
    $purchase->cost = $request->cost;
    $purchase->funding_source = $request->funding_source;
    $purchase->save();

    // Save Service Engineer Information
    $serviceEngineer = new ServiceEngineerInformation();
    $serviceEngineer->instrument_id = $instrument->id;
    $serviceEngineer->service_engineer_name = $request->engineer_name;
    $serviceEngineer->service_engineerphone_number = $request->engineer_phone;
    $serviceEngineer->service_engineeremail = $request->engineer_email;
    $serviceEngineer->company = $request->engineer_company;
    $serviceEngineer->address = $request->engineer_address;
    $serviceEngineer->save();

    // Save Warranty Information
    $warranty = new WarrantyInformation();
    $warranty->instrument_id = $instrument->id;
    $warranty->manufacturing_date = $request->manufacturing_date;
    $warranty->installation_date = $request->installation_date;
    $warranty->warranty_period_months = $request->warranty_period;
    $warranty->next_service_due_date = $request->next_service_date;
    $warranty->save();

    // Save Instrument Documents
    $instrumentDoc = new InstrumentDocument();
    $instrumentDoc->instrument_id = $instrument->id; // Fixed incorrect assignment
    $instrumentDoc->instrument_photos = json_encode($instrumentPhotos);
    $instrumentDoc->operation_manual = $operation_manual;
    $instrumentDoc->service_manual = $service_manual;
    $instrumentDoc->additional_documents = $additional_documents;
    $instrumentDoc->video_links = $request->video_links;
    $instrumentDoc->save();
    DB::commit();
    return redirect()->route('superadmin.instrument_list')->with('success', 'Instrument added successfully!');
}catch (\Exception $e) {
    DB::rollBack(); // ❌ Rollback if any error occurs
    return response()->json(['error' => 'Something went wrong', 'details' => $e->getMessage()], 500);
}
}





/**
 * Handles file uploads efficiently.
 */
private function uploadFile($file, $folder, $name)
{
    $filename = Str::slug($name) . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    $destinationPath = public_path("images/$folder/");

    // Ensure directory exists
    if (!File::exists($destinationPath)) {
        File::makeDirectory($destinationPath, 0755, true, true);
    }

    // Move file and return the stored path
    $file->move($destinationPath, $filename);
    return "images/$folder/$filename";
}



/*******View Instrument by id *********/
public function hs_view_instrument($id){
    $instruments=Instrument::with('purchaseInformation',
        'instrumentDocument',
        'serviceengineerInformation',
        'labInformation',
        'instrumentsCategory',
        'warrantyInformation')->where('id',$id)->first(); 
      
    //  dd($instruments);
        return view('superadmin.pages.Instruments.viewInstrument',[
            'instrument'=>$instruments
        ]); 
}

/*********Add accessories *********/
public function hs_add_accessories($id){


    $instrument=Instrument::where('id',$id)->first(); 
    return view('superadmin.pages.Instruments.addAcceossries',['instrument'=>$instrument]); 
}


public function hs_accessoriesstore(Request $request){

    $validator = Validator::make($request->all(), [
        'instrument_id' => 'required|integer',
        'accessory_type' => 'required|string|max:255',
        'accessory_name' => 'required|string|max:255',
        'accessory_modelnumber' => 'required|string|max:255',
        'accessory_serialnumber' => 'required|string|max:255',
        'accessory_description' => 'nullable|string',
        'accessory_quantity' => 'required|integer|min:1',
        'accessory_status' => 'required|in:working,not-working,repair',
        'purchase_date' => 'required|date',
        'warrentyperiod' => 'required|integer|min:0',
        'accessories_photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $accessorie=new InstrumentAccessory(); 
    $accessorie->instrument_id=$request->accessory_name;
    $accessorie->accessoryType=$request->accessory_name;
    $accessorie->name=$request->accessory_name;
    $accessorie->modelNumber=$request->accessory_name;
    $accessorie->serialNumber=$request->accessory_name;
    $accessorie->purpose=$request->accessory_name;
    $accessorie->quantity=$request->accessory_name;
    $accessorie->status=$request->accessory_name;
    $accessorie->purchase_date=$request->accessory_name;
    $accessorie->warranty_period=$request->accessory_name;
    $accessorie->manual=$request->accessory_name;
    $accessorie->instrument_id=$request->accessory_name;
    $accessorie->save();


}
}
