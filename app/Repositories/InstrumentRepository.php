<?php

namespace App\Repositories;

use App\Models\Instrument;
use App\Contracts\InstrumentRepositoryInterface;
use App\Models\PurchaseInformation;
use App\Models\ServiceEngineerInformation;
use App\Models\WarrantyInformation;
use App\Models\InstrumentDocument;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class InstrumentRepository implements InstrumentRepositoryInterface
{
    public function all()
    {
        return Instrument::all();
    }

    public function find($id)
    {
        return Instrument::findOrFail($id);
    }

    public function createInstrument(array $data)
    {
        // dd($data); 
        // private function saveData(Instrument $instrument, PurchaseInformation $purchase, ServiceEngineerInformation $serviceEngineer,WarrantyInformation $warranty,InstrumentDocument $instrumentDoc,  array $data)
        return $this->saveData(new Instrument(), new PurchaseInformation(),new ServiceEngineerInformation(),new WarrantyInformation(),new InstrumentDocument(), $data);  
    }


    public function update($id, array $data)
    {

        $instrument = Instrument::where('id',$request['instrument_id'])->first();

        return $this->saveData(new Instrument(), new PurchaseInformation(),new ServiceEngineerInformation(),new WarrantyInformation(),new InstrumentDocument(), $data);  
   
        $instrument = $this->find($id);

        if ($instrument) {
            // dd($data); 
        DB::beginTransaction();

        try {
            // File Uploads
            $instrumentPhotos = [];
            if (!empty($data['instrument_photos'])) {
                foreach ($data['instrument_photos'] as $photo) {
                    $instrumentPhotos[] = $this->uploadFile($photo, 'instruments/images', $data['name']);
                }
            }

            $operation_manual = !empty($data['operation_manual']) ? $this->uploadFile($data['operation_manual'], 'operation_manual', $data['name']) : null;
            $service_manual = !empty($data['service_manual']) ? $this->uploadFile($data['service_manual'], 'service_manual', $data['name']) : null;
            $additional_documents = !empty($data['additional_documents']) ? $this->uploadFile($data['additional_documents'], 'additional_documents', $data['name']) : null;

            // Create Instrument
            $instrument = new Instrument();
            $instrument->name = $data['name'] ?? null;
            $instrument->model_number = $data['model_number'] ?? null;
            $instrument->serial_number = $data['serial_number'] ?? null;
            $instrument->asset_id = $data['asset_id'] ?? null;
            $instrument->category_type = $data['category_id'] ?? null;
            $instrument->lab_id = $data['lab_id'] ?? null;
            $instrument->operation_status = $data['operating_status'] ?? null;
            $instrument->per_hour_cost = $data['perhourcost'] ?? null;
            $instrument->minimum_booking_duration = $data['minimumbookingduration'] ?? null;
            $instrument->maximum_booking_duration = $data['maximum_booking_duration'] ?? null;
            $instrument->description = $data['description'] ?? null;
            $instrument->save();

            // Create Purchase Information
            $purchase = new PurchaseInformation();
            $purchase->instrument_id = $instrument->id;
            $purchase->manufacture_name = $data['manufacturer_name'] ?? null;
            $purchase->vendor_name = $data['vendor_name'] ?? null;
            $purchase->purchase_order_number = $data['po_number'] ?? null;
            $purchase->purchase_date = $data['purchase_date'] ?? null;
            $purchase->cost = $data['cost'] ?? null;
            $purchase->funding_source = $data['funding_source'] ?? null;
            $purchase->save();

            // Create Service Engineer Information
            $serviceEngineer = new ServiceEngineerInformation();
            $serviceEngineer->instrument_id = $instrument->id;
            $serviceEngineer->service_engineer_name = $data['engineer_name'] ?? null;
            $serviceEngineer->service_engineerphone_number = $data['engineer_phone'] ?? null;
            $serviceEngineer->service_engineeremail = $data['engineer_email'] ?? null;
            $serviceEngineer->company = $data['engineer_company'] ?? null;
            $serviceEngineer->address = $data['engineer_address'] ?? null;
            $serviceEngineer->save();

            // Create Warranty Information
            $warranty = new WarrantyInformation();
            $warranty->instrument_id = $instrument->id;
            $warranty->manufacturing_date = $data['manufacturing_date'] ?? null;
            $warranty->installation_date = $data['installation_date'] ?? null;
            $warranty->warranty_period_months = $data['warranty_period'] ?? null;
            $warranty->next_service_due_date = $data['next_service_date'] ?? null;
            $warranty->save();

            // Create Instrument Documents
            $instrumentDoc = new InstrumentDocument();
            $instrumentDoc->instrument_id = $instrument->id;
            $instrumentDoc->instrument_photos = json_encode($instrumentPhotos);
            $instrumentDoc->operation_manual = $operation_manual;
            $instrumentDoc->service_manual = $service_manual;
            $instrumentDoc->additional_documents = $additional_documents;
            $instrumentDoc->video_links = $data['video_links'] ?? null;
            $instrumentDoc->save();

            DB::commit();
            return $instrument;
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong', 'details' => $e->getMessage()], 500);
        }
        }

        return response()->json(['error' => 'Instrument not found'], 404);
    }

    public function delete($id)
    {
        $instrument = $this->find($id);

        if ($instrument) {
            return $instrument->delete();
        }

        return response()->json(['error' => 'Instrument not found'], 404);
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


  /**
     * Save User & PI Metadata
     */
    private function saveData(Instrument $instrument, PurchaseInformation $purchase, ServiceEngineerInformation $serviceEngineer,WarrantyInformation $warranty,InstrumentDocument $instrumentDoc,  array $data)
    {
        // dd($data); 
        DB::beginTransaction();

        try {
            // File Uploads
            $instrumentPhotos = [];
            if (!empty($data['instrument_photos'])) {
                foreach ($data['instrument_photos'] as $photo) {
                    $instrumentPhotos[] = $this->uploadFile($photo, 'instruments/images', $data['name']);
                }
            }

            $operation_manual = !empty($data['operation_manual']) ? $this->uploadFile($data['operation_manual'], 'operation_manual', $data['name']) : null;
            $service_manual = !empty($data['service_manual']) ? $this->uploadFile($data['service_manual'], 'service_manual', $data['name']) : null;
            $additional_documents = !empty($data['additional_documents']) ? $this->uploadFile($data['additional_documents'], 'additional_documents', $data['name']) : null;

            // Create Instrument
            // $instrument = new Instrument();
            $instrument->name = $data['name'] ?? null;
            $instrument->model_number = $data['model_number'] ?? null;
            $instrument->serial_number = $data['serial_number'] ?? null;
            $instrument->asset_id = $data['asset_id'] ?? null;
            $instrument->category_type = $data['category_id'] ?? null;
            $instrument->lab_id = $data['lab_id'] ?? null;
            $instrument->operation_status = $data['operating_status'] ?? null;
            $instrument->per_hour_cost = $data['perhourcost'] ?? null;
            $instrument->minimum_booking_duration = $data['minimumbookingduration'] ?? null;
            $instrument->maximum_booking_duration = $data['maximum_booking_duration'] ?? null;
            $instrument->description = $data['description'] ?? null;
            $instrument->save();

            // Create Purchase Information
            // $purchase = new PurchaseInformation();
            $purchase->instrument_id = $instrument->id;
            $purchase->manufacture_name = $data['manufacturer_name'] ?? null;
            $purchase->vendor_name = $data['vendor_name'] ?? null;
            $purchase->purchase_order_number = $data['po_number'] ?? null;
            $purchase->purchase_date = $data['purchase_date'] ?? null;
            $purchase->cost = $data['cost'] ?? null;
            $purchase->funding_source = $data['funding_source'] ?? null;
            $purchase->save();

            // Create Service Engineer Information
            // $serviceEngineer = new ServiceEngineerInformation();
            $serviceEngineer->instrument_id = $instrument->id;
            $serviceEngineer->service_engineer_name = $data['engineer_name'] ?? null;
            $serviceEngineer->service_engineerphone_number = $data['engineer_phone'] ?? null;
            $serviceEngineer->service_engineeremail = $data['engineer_email'] ?? null;
            $serviceEngineer->company = $data['engineer_company'] ?? null;
            $serviceEngineer->address = $data['engineer_address'] ?? null;
            $serviceEngineer->save();

            // Create Warranty Information
            // $warranty = new WarrantyInformation();
            $warranty->instrument_id = $instrument->id;
            $warranty->manufacturing_date = $data['manufacturing_date'] ?? null;
            $warranty->installation_date = $data['installation_date'] ?? null;
            $warranty->warranty_period_months = $data['warranty_period'] ?? null;
            $warranty->next_service_due_date = $data['next_service_date'] ?? null;
            $warranty->save();

            // Create Instrument Documents
            // $instrumentDoc = new InstrumentDocument();
            $instrumentDoc->instrument_id = $instrument->id;
            $instrumentDoc->instrument_photos = json_encode($instrumentPhotos);
            $instrumentDoc->operation_manual = $operation_manual;
            $instrumentDoc->service_manual = $service_manual;
            $instrumentDoc->additional_documents = $additional_documents;
            $instrumentDoc->video_links = $data['video_links'] ?? null;
            $instrumentDoc->save();

            DB::commit();
            return $instrument;
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong', 'details' => $e->getMessage()], 500);
        }
    }


}
