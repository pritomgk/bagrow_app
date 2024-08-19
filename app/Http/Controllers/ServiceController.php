<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Service_category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function services(){

        $services = Service::orderBy("service_id","desc")->get();

        $sercats = Service_category::orderBy("sercat_id","desc")->get();

        return view('admin_view.common.services', compact('services', 'sercats'));

    }

    public function add_service(){

        $sercats = Service_category::orderBy('sercat_id','desc')->get();

        return view('admin_view.common.add_service', compact('sercats'));

    }

    public function add_service_info(Request $request){


        $image_name = null;

        if (!empty($request->image)) {

            $request->validate([
                "title"=> "required",
                "sercat_id"=> "required",
                "image"=> "required|max:7240",
            ]);

            $name = $request->title;
            $image_name = $name.'_image_'.date("Y_m_d_h_i_sa").'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/uploads/image/'), $image_name);


        }

        $service = new Service();

        $service->title = $request->title;
        $service->sercat_id = $request->sercat_id;
        $service->description = $request->description;
        $service->image = $image_name;
        $service->save();

        return redirect()->back()->with('success','Service Saved..!');

    }

    public function update_service($service_id){

        $sercats = Service_category::orderBy('sercat_id','desc')->get();
        $service = Service::find($service_id);

        return view('admin_view.common.update_service', compact('service', 'sercats'));

    }

    public function update_service_info(Request $request){

        $service = Service::find($request->service_id);

        if (!empty($request->image)) {

            $request->validate([
                "title"=> "required",
                "sercat_id"=> "required",
                "image"=> "required|max:7240",
            ]);

            $name = $request->title;
            $image_name = $name.'_image_'.date("Y_m_d_h_i_sa").'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/uploads/image/'), $image_name);

            if (!empty($service->image)) {

                if (file_exists(public_path('storage/uploads/image/'.$service->image))) {
                    unlink(public_path('storage/uploads/image/'.$service->image));
                }
            }

            $service->image = $image_name;

        }

        $service->title = $request->title;
        $service->sercat_id = $request->sercat_id;
        $service->description = $request->description;
        $service->update();

        return redirect()->back()->with('success','Service Updated..!');

    }

    public function delete_service($service_id){

        $service = Service::find($service_id);

        if (!empty($service->image)) {

            if (file_exists(public_path('storage/uploads/image/'.$service->image))) {
                unlink(public_path('storage/uploads/image/'.$service->image));
            }

        }

        $service->delete();

        return redirect()->back()->with('error','Service Deleted..!');


    }


}


