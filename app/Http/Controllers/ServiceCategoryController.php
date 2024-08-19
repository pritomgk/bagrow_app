<?php

namespace App\Http\Controllers;

use App\Models\Service_category;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{

    public function sercats(){

        $sercats = Service_category::orderBy("sercat_id","desc")->get();

        return view('admin_view.common.sercats', compact('sercats'));

    }

    public function add_sercat(){


        return view('admin_view.common.add_sercat');

    }

    public function add_sercat_info(Request $request){


        $image_name = null;

        if (!empty($request->image)) {

            $request->validate([
                "title"=> "required",
                "image"=> "required|max:7240",
            ]);

            $name = $request->title;
            $image_name = $name.'_image_'.date("Y_m_d_h_i_sa").'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/uploads/image/'), $image_name);


        }

        $sercat = new Service_category();

        $sercat->title = $request->title;
        $sercat->description = $request->description;
        $sercat->image = $image_name;
        $sercat->save();

        return redirect()->back()->with('success','Service Category Saved..!');

    }

    public function update_sercat($sercat_id){

        $sercat = Service_category::find($sercat_id);

        return view('admin_view.common.update_sercat', compact('sercat'));

    }

    public function update_sercat_info(Request $request){

        $sercat = Service_category::find($request->sercat_id);

        if (!empty($request->image)) {

            $request->validate([
                "title"=> "required",
                "image"=> "required|max:7240",
            ]);

            $name = $request->title;
            $image_name = $name.'_image_'.date("Y_m_d_h_i_sa").'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/uploads/image/'), $image_name);

            if (!empty($sercat->image)) {

                if (file_exists(public_path('storage/uploads/image/'.$sercat->image))) {
                    unlink(public_path('storage/uploads/image/'.$sercat->image));
                }
            }

            $sercat->image = $image_name;

        }

        $sercat->title = $request->title;
        $sercat->description = $request->description;
        $sercat->update();

        return redirect()->back()->with('success','Service Category Updated..!');

    }

    public function delete_sercat($sercat_id){

        $sercat = Service_category::find($sercat_id);

        if (!empty($sercat->image)) {

            if (file_exists(public_path('storage/uploads/image/'.$sercat->image))) {
                unlink(public_path('storage/uploads/image/'.$sercat->image));
            }

        }


        $sercat->delete();

        return redirect()->back()->with('error','Service Category Deleted..!');


    }


}



