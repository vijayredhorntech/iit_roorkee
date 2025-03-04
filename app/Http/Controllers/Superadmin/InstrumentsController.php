<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InstrumentsCategory;



class InstrumentsController extends Controller
{

    /***Create Instrument Category ******/
    public function hs_create_instrumentcategory(){

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

    
}
