<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
    
    

    // ======= index page =======
    public function index(){
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }

    // ============ store brand ========= 
    public function store(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:brands,brand_name'
        ]);
        
       
        Brand::insert([
            'brand_name' => $request->brand_name,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Brand added');
    }

    // =============== edit data  ========== 
    public function edit($brand_id){
        $brand = Brand::find($brand_id);
        return view('admin.brand.edit',compact('brand'));
    }

    public function update(Request $request){
        $request->validate([
            'brand_name' => 'required'
        ]);
        $brand_id = $request->id;
       
        Brand::find($brand_id)->update([
            'brand_name' => $request->brand_name,
            'updated_at' => Carbon::now()
        ]);

        return Redirect('admin/brand')->with('success','Brand Updated');
    }

    
    // Delete Brand 
    public function Delete($brand_id){
        Brand::find($brand_id)->delete();
        return Redirect()->back()->with('delete','Brand Deleted Success');
    }


    // status inactive 
    public function Inactive($brand_id){
        Brand::find($brand_id)->update(['status' => 0]);
        return Redirect()->back()->with('Catupdated','Brand inactive');
    }

    
    // status active 
    public function Active($brand_id){
        Brand::find($brand_id)->update(['status' => 1]);
        return Redirect()->back()->with('Catupdated','Brand Activated');
    }

}
