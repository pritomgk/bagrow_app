<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function activities(){

        $activities = Activity::orderBy("activity_id","desc")->get();

        return view('admin_view.common.activities', compact('activities'));

    }

    public function add_activity(){

        return view('admin_view.common.add_activity');

    }

    public function add_activity_info(Request $request){


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

        $activity = new Activity();

        $activity->title = $request->title;
        $activity->description = $request->description;
        $activity->image = $image_name;
        $activity->save();

        return redirect()->back()->with('success','Activity Saved..!');

    }

    public function update_activity($activity_id){

        $activity = Activity::find($activity_id);

        return view('admin_view.common.update_activity', compact('activity'));

    }

    public function update_activity_info(Request $request){

        $activity = Activity::find($request->activity_id);

        if (!empty($request->image)) {

            $request->validate([
                "title"=> "required",
                "image"=> "required|max:7240",
            ]);

            $name = $request->title;
            $image_name = $name.'_image_'.date("Y_m_d_h_i_sa").'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/uploads/image/'), $image_name);

            if (!empty($activity->image)) {

                if (file_exists(public_path('storage/uploads/image/'.$activity->image))) {
                    unlink(public_path('storage/uploads/image/'.$activity->image));
                }
            }

            $activity->image = $image_name;

        }

        $activity->title = $request->title;
        $activity->description = $request->description;
        $activity->update();

        return redirect()->back()->with('success','Activity Updated..!');

    }

    public function delete_activity($activity_id){

        $activity = Activity::find($activity_id);

        if (!empty($activity->image)) {

            if (file_exists(public_path('storage/uploads/image/'.$activity->image))) {
                unlink(public_path('storage/uploads/image/'.$activity->image));
            }

        }

        $activity->delete();

        return redirect()->back()->with('error','Activity Deleted..!');


    }


}

