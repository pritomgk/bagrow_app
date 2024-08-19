<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function products(){

        $products = Product::orderBy("product_id","desc")->get();

        $procats = Product_category::orderBy("procat_id","desc")->get();

        return view('admin_view.common.products', compact('products', 'procats'));

    }

    public function add_product(){

        $procats = Product_category::orderBy('procat_id','desc')->get();

        return view('admin_view.common.add_product', compact('procats'));

    }

    public function add_product_info(Request $request){


        $image_name = null;

        if (!empty($request->image)) {

            $request->validate([
                "title"=> "required",
                "procat_id"=> "required",
                "image"=> "required|max:7240",
            ]);

            $name = $request->title;
            $image_name = $name.'_image_'.date("Y_m_d_h_i_sa").'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/uploads/image/'), $image_name);


        }

        $product = new Product();

        $product->title = $request->title;
        $product->procat_id = $request->procat_id;
        $product->description = $request->description;
        $product->image = $image_name;
        $product->save();

        return redirect()->back()->with('success','Product Saved..!');

    }

    public function update_product($product_id){

        $procats = Product_category::orderBy('procat_id','desc')->get();
        $product = Product::find($product_id);

        return view('admin_view.common.update_product', compact('product', 'procats'));

    }

    public function update_product_info(Request $request){

        $product = Product::find($request->product_id);

        if (!empty($request->image)) {

            $request->validate([
                "title"=> "required",
                "procat_id"=> "required",
                "image"=> "required|max:7240",
            ]);

            $name = $request->title;
            $image_name = $name.'_image_'.date("Y_m_d_h_i_sa").'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/uploads/image/'), $image_name);

            if (!empty($product->image)) {

                if (file_exists(public_path('storage/uploads/image/'.$product->image))) {
                    unlink(public_path('storage/uploads/image/'.$product->image));
                }
            }

            $product->image = $image_name;

        }

        $product->title = $request->title;
        $product->procat_id = $request->procat_id;
        $product->description = $request->description;
        $product->update();

        return redirect()->back()->with('success','Product Updated..!');

    }

    public function delete_product($product_id){

        $product = Product::find($product_id);

        if (!empty($product->image)) {

            if (file_exists(public_path('storage/uploads/image/'.$product->image))) {
                unlink(public_path('storage/uploads/image/'.$product->image));
            }

        }

        $product->delete();

        return redirect()->back()->with('error','Product Deleted..!');


    }


}


