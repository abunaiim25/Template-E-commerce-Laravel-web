<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Main;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        $main = Main::first();
        return view('admin.main',compact('main'));
    }



    public function update(Request $request)
    {
        //error checking --it's mean when some field data missing , then see error
        $this->validate($request, [
            'email' => 'email|required',
            'phone1' => 'required|max:11',
            'phone2' => 'required|max:11', 
            'address' => 'required'
        ]);

        //data send database
        $main = Main::first();
        $main->email = $request->email;
        $main->phone1 = $request->phone1;
        $main->phone2 = $request->phone2;
        $main->address = $request->address;

        //one image added or replace one iamge
        if($request->file('font_img')){
            $img_file = $request->file('font_img');
            //bc_img
            $img_file->storeAs('public/img/','font_img.' . $img_file->getClientOriginalExtension());
            //replace image by new image
            $main->font_img = 'storage/img/font_img.' . $img_file->getClientOriginalExtension();
        }


        if($request->file('second_font_img')){
            $img_file = $request->file('second_font_img');
            //bc_img
            $img_file->storeAs('public/img/','second_font_img.' . $img_file->getClientOriginalExtension());
            //replace image by new image
            $main->font_img = 'storage/img/second_font_img.' . $img_file->getClientOriginalExtension();
        }

        

        $main->save();

        return redirect('/admin/main')->with('status', "Main Page data has been updated successfully");
    }
}
