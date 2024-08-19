<?php

namespace App\Http\Controllers;

use App\Models\Product_category;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{

    public function procats(){

        $procats = Product_category::orderBy("procat_id","desc")->get();

        return view('admin_view.common.procats', compact('procats'));

    }

    public function add_procat(){


        return view('admin_view.common.add_procat');

    }

    public function add_procat_info(Request $request){


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

        $procat = new Product_category();

        $procat->title = $request->title;
        $procat->description = $request->description;
        $procat->image = $image_name;
        $procat->save();

        return redirect()->back()->with('success','Product Category Saved..!');

    }

    public function update_procat($procat_id){

        $procat = Product_category::find($procat_id);

        return view('admin_view.common.update_procat', compact('procat'));

    }

    public function update_procat_info(Request $request){

        $procat = Product_category::find($request->procat_id);

        if (!empty($request->image)) {

            $request->validate([
                "title"=> "required",
                "image"=> "required|max:7240",
            ]);

            $name = $request->title;
            $image_name = $name.'_image_'.date("Y_m_d_h_i_sa").'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/uploads/image/'), $image_name);

            if (!empty($procat->image)) {

                if (file_exists(public_path('storage/uploads/image/'.$procat->image))) {
                    unlink(public_path('storage/uploads/image/'.$procat->image));
                }
            }

            $procat->image = $image_name;

        }

        $procat->title = $request->title;
        $procat->description = $request->description;
        $procat->update();

        return redirect()->back()->with('success','Product Category Updated..!');

    }

    public function delete_procat($procat_id){

        $procat = Product_category::find($procat_id);

        if (!empty($procat->image)) {

            if (file_exists(public_path('storage/uploads/image/'.$procat->image))) {
                unlink(public_path('storage/uploads/image/'.$procat->image));
            }

        }


        $procat->delete();

        return redirect()->back()->with('error','Product Category Deleted..!');


    }



}



