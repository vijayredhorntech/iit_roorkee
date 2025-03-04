<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lab;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class LabController extends Controller
{
    //

    public function hs_labcreate(){

        $pi = User::with('pi')->where('type', 'pi')->get(); 
        return view('superadmin.pages.Labs.createLab',['pilist' => $pi]);
    }


    /****** Lab create ******/
    public function hs_labstore(Request $request)
    {
        $validatedData = $request->validate([
            'lab_name'            => 'required|string|max:255',
            'department'          => 'required|string|max:255',
            'building'            => 'required|string|max:255',
            'floor'               => 'required|string|max:255',
            'room_number'         => 'required|string|max:50',
            'lab_type'            => 'required|string', // Restrict values
            'lab_manager'         => 'required|exists:users,id', // Assuming lab managers are stored in users table
            'contact_number'      => 'required|string', // Example format: 8/580984998
            'working_hours'       => 'required|string|max:50',
            'max_capacity'        => 'required|integer|min:1|max:500', // Adjust max as needed
            'description'         => 'nullable|string|max:1000',
            'safety_guidelines'   => 'nullable|string|max:1000',
            'special_requirements'=> 'nullable|string|max:1000',
            
        ]);
    
        // Handle single image upload

       
        $lab_images = [];
    if ($request->hasFile('lab_photos')) {
        foreach ($request->file('lab_photos') as $file) {
            $imageName = Str::slug($request->lab_name) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/labs/images/');

            // Ensure directory exists
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            // Move file and store path
            $file->move($destinationPath, $imageName);
            $lab_images[] = 'images/labs/images/' . $imageName;
        }
    }
    
        // Save lab data
        $lab = new Lab();
        $lab->name                = $request->lab_name;
        $lab->department          = $request->department;
        $lab->building            = $request->building;
        $lab->floor               = $request->floor;
        $lab->room_number         = $request->room_number;
        $lab->lab_type            = $request->lab_type;
        $lab->lab_manager         = $request->lab_manager;
        $lab->contact_number      = $request->contact_number;
        $lab->working_hours       = $request->working_hours;
        $lab->maximum_capacity    = $request->max_capacity;
        $lab->description         = $request->description;
        $lab->safety_guidelines   = $request->safety_guidelines;
        $lab->special_requirements= $request->special_requirements;
        $lab->lab_photos          = json_encode($lab_images);; // Save only one image
      
        $lab->save();
    
        return redirect()->route('superadmin.lab_list')->with('success', 'Lab created successfully!');
    }


    public function hs_lablist(){

        $lebs=Lab::with('manager_info')->paginate(10);

        
        return view('superadmin.pages.Labs.labList',['lebs'=>$lebs]);
    }
    
}
