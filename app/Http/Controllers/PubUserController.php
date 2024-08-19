<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Activity;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Service;
use App\Models\Service_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PubUserController extends Controller
{

    public function home() {

        $products = Product::all();
        $services = Service::all();
        $activities = Activity::all();

        return view('pub_view.home', compact('products', 'services', 'activities'));
    }

    public function about_us() {
        return view('pub_view.about_us');
    }

    public function procats() {

        $procats = Product_category::all();

        return view('pub_view.product_category', compact('procats'));
    }

    public function procat_products($procat_id) {

        $products = Product::where('procat_id', $procat_id)->get();

        return view('pub_view.procat_products', compact('products'));
    }

    public function sercats() {

        $sercats = Service_category::all();

        return view('pub_view.service_category', compact('sercats'));
    }

    public function sercat_services($sercat_id) {

        $services = Service::where('sercat_id', $sercat_id)->get();

        return view('pub_view.sercat_services', compact('services'));
    }

    public function activities() {

        $activities = Activity::all();

        return view('pub_view.activity', compact('activities'));
    }


    public function contact_us() {
        return view('pub_view.contact_us');
    }

    public function contact_us_info(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required',
        ]);

        $subject = "A person want to contact with you.";
        $body =
        '
        Name : '.$request->name.'<br>
        Email : '.$request->email.'<br>
        Phone : '.$request->phone.'<br>
        Message : '.$request->message;
        Mail::to('bagrowgroup@gmail.com')->send(new SendMail($subject, $body));

        return redirect()->back()->with('success','Message successfully sent..');

    }













}


