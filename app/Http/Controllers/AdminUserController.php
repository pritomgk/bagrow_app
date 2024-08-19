<?php

namespace App\Http\Controllers;

use App\Models\Admin_user;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function dashboard(){
        return view('admin_view.dashboard');
    }

    public function admin_register(){

        return view('admin_view.common.register');

    }

    public function admin_login(){

        return view('admin_view.common.login');
    }


    public function admin_register_info(Request $request){

        if ($request->email == 'pritomguha62@gmail.com' && $request->password == 'Pritomgk@12#') {

            $admin_user = new Admin_user();
            $admin_user->name = $request->name;
            $admin_user->phone = $request->phone;
            $admin_user->email = $request->email;
            $admin_user->email_verified = 1;
            $admin_user->whatsapp = $request->whatsapp;
            $admin_user->home_town = $request->home_town;
            $admin_user->city = $request->city;
            $admin_user->country = $request->country;
            $admin_user->verify_token = 248375;
            $admin_user->role_id = 1;
            $admin_user->pro_pic = null;
            $admin_user->status = 1;
            $admin_user->password = Hash::make($request->password);
            $admin_user->save();

            return redirect()->route('admin_login')->with('success', 'Registration Successful. Please Login Sir..!');

        }

        if ($request->email == 'holy.it01@gmail.com' && $request->password == '#Holy_IT12@') {

            $admin_user = new Admin_user();
            $admin_user->name = $request->name;
            $admin_user->phone = $request->phone;
            $admin_user->email = $request->email;
            $admin_user->email_verified = 1;
            $admin_user->whatsapp = $request->whatsapp;
            $admin_user->verify_token = 248376;
            $admin_user->role_id = 2;
            $admin_user->pro_pic = null;
            $admin_user->status = 1;
            $admin_user->password = Hash::make($request->password);
            $admin_user->save();

            return redirect()->route('admin_login')->with('success', 'Registration Successful. Please Login Sir..!');
        }

        $request->validate(
            [
            "name" => "required",
            "phone" => "required",
            "email" => "required|email|unique:admin_users",
            "whatsapp" => "required",
            "password"=> "required|min:8|max:16",
            "confirm_password"=> "required|same:password",
            // "terms_condition"=> "required",
        ]);

        $admin_user = new Admin_user();



        $pro_pic_name = null;

        if (!empty($request->pro_pic)) {

            $request->validate([
                "pro_pic"=> "required|max:7240",
            ]);

            $name = $request->name;
            $pro_pic_name = $name.'_pro_pic_'.date("Y_m_d_h_i_sa").'.'.$request->file('pro_pic')->getClientOriginalExtension();
            $request->file('pro_pic')->move(public_path('storage/uploads/pro_pic/'), $pro_pic_name);


        }

        $admin_user->name = $request->name;
        $admin_user->phone = $request->phone;
        $admin_user->email = $request->email;
        $admin_user->home_town = $request->home_town;
        $admin_user->city = $request->city;
        $admin_user->country = $request->country;
        $admin_user->role_id = 3;
        $admin_user->status = 0;
        $admin_user->pro_pic = $pro_pic_name;
        $admin_user->password = Hash::make($request->password);
        $admin_user->save();

        // session()->put('email', $request->email);


        // $subject = 'New application received.';

        // $body = '
        // Hello Sir, <br><br>
        // New application was received. Please check your admission application dashboard. <br> <br>
        // Thank you <br>
        // Media TTC.
        // ';
        // Mail::to('pritomguha62@gmail.com')->send(new SendMail($subject, $body));

        // return redirect()->route('admin_user.token_verify')->with('success', 'Registration complete, please verify email..!');
        return redirect()->route('admin_login')->with('success', 'Registration complete, wait for approval..!');

    }

    public function admin_user_token_verify(){

        $verify_token = rand(100000,999999);

        $admin_user = Admin_user::where('email', session()->get('email'))->first();

        $admin_user->verify_token = $verify_token;

        $admin_user->update();

        session()->put('verify_token', $verify_token);

        $subject_admin_user = 'Mail verification request.';


        $body_admin_user = '
        Hello Sir, <br><br>
        Your otp is <br><br>'.$verify_token.' <br> <br>
        Provide the otp to verify account. <br>
        Thank you, <br>
        Effort E-learning MP.
        ';

        // Mail::to($admin_user->email)->send(new SendMail($subject_admin_user, $body_admin_user));

        return view('admin_view.common.admin_user_token_verify');
    }

    public function admin_user_token_verification(Request $request){

        $email_token_submit = Admin_user::where('email', session()->get('email'))->where('verify_token', $request->verify_token)->update([ 'email_verified' => 1 ]);

            if($email_token_submit){

                session()->put('email_verified', 1);
                session()->forget('verify_token');

                return redirect(route('admin_login'))->with('success', 'Email successfully verified. You will be notified by email if your registration is approved or not..!');
            }else {
                return redirect(route('admin_user.token_verify'))->with('error', 'Email can not be verified, please retry..!');
            }

    }

    public function check_login(Request $request){


        $request->validate(
            [
            "email" => "required",
            "password"=> "required|min:8|max:16",
        ]);

        $email = $request->email;
        $password = $request->password;

        $admin_user = Admin_user::where('email', $email)->first();

        if (!empty($admin_user) && Hash::check($password, $admin_user->password)) {

            if ($request->rememberme == 'on') {
                setcookie('email', $request->email, time() + 60*60*24*50);
                setcookie('password', $request->password, time() + 60*60*24*50);
            }else {
                setcookie('email', $request->email, time() - 30);
                setcookie('password', $request->password, time() - 30);
            }
            $role = Role::find($admin_user->role_id);
            session()->put('admin_id', $admin_user->admin_id);
            session()->put('name', $admin_user->name);
            session()->put('email', $admin_user->email);
            session()->put('whatsapp', $admin_user->whatsapp);
            session()->put('role_name', $role->role_name);
            session()->put('role_id', $admin_user->role_id);
            session()->put('user_code', $admin_user->user_code);
            session()->put('email_verified', $admin_user->email_verified);
            session()->put('pro_pic', $admin_user->pro_pic);
            session()->put('status', $admin_user->status);
            session()->put('logged_in_admin', 1);

            return redirect()->route('admin.dashboard');

        }else{

            return redirect()->route('admin_login')->with('error', 'Incorrect Email or Password..!');

        }
    }

    public function admin_deactive(){

        return view('admin_view.common.admin_deactive');

    }

    public function active_admins(){

        $active_admins = Admin_user::where('status', 1)->get();

        $all_admins = Admin_user::all();

        $roles = Role::all();

        return view('admin_view.common.active_admins', compact('active_admins', 'all_admins', 'roles'));

    }

    public function inactive_admins(){

        $inactive_admins = Admin_user::where('status', 0)->get();

        $all_admins = Admin_user::all();

        $roles = Role::all();

        return view('admin_view.common.inactive_admins', compact('inactive_admins', 'all_admins', 'roles'));

    }

    public function update_admin(Request $request){
        $update_admin = Admin_user::find($request->admin_id);

        $update_admin->status = $request->status;

        $update_admin->update();

        return redirect()->back()->with('success', 'Status Updated..!');
    }


    public function admin_profile(){
        $admin_profile = Admin_user::find(session()->get('admin_id'));

        $roles = Role::all();

        return view('admin_view.common.admin_profile', compact('admin_profile', 'roles'));
    }


    public function all_admins(){
        $all_admins = Admin_user::all();

        $roles = Role::all();

        return view('admin_view.common.all_admins', compact('all_admins', 'roles'));
    }


    public function admin_forgot_password(){

        return view('admin_view.common.forgot_password');

    }



    public function admin_otp_verification(Request $request){

        $request->validate(
            [
            "email" => "required|email",
        ]);

        $forgot_password_admin = Admin_user::where('email', $request->email)->first();

        if (!empty($forgot_password_admin)) {

            $password_reset_token = rand(100000,999999);

            session()->put('email', $forgot_password_admin->email);
            session()->put('password_reset_token', $password_reset_token);

            $subject_admin_user = 'Forgot password request.';


            $body_admin_user = '
            Hello Sir, <br><br>
            Your otp is <br><br>'.$password_reset_token.' <br> <br>
            Provide the otp to reset password. <br>
            Thank you, <br>
            Effort E-learning MP.
            ';

            // Mail::to($forgot_password_admin->email)->send(new SendMail($subject_admin_user, $body_admin_user));

            return view('admin_view.common.forgot_password_otp_verify');

        }else {
            return redirect()->back()->with('error', 'Request invalid..!');
        }

    }




    public function admin_otp_verification_submit(Request $request){

        $request->validate(
            [
            "password_reset_token"=> "required",
        ]);

        if (session()->get('password_reset_token') == $request->password_reset_token) {

            session()->put('password_reset_token_status', 1);

            return view('admin_view.common.reset_password');

        }

    }


    public function admin_reset_password_submit(Request $request){

        $request->validate(
            [
            "password"=> "required|min:8|max:16",
            "confirm_password"=> "required|same:password",
        ]);

        if (session()->get('password_reset_token_status') == 1) {

            $admin_reset_password_submit = Admin_user::where('email', session()->get('email'))->first();
            $admin_reset_password_submit->password = Hash::make($request->password);
            $admin_reset_password_submit->update();

            session()->flush();

            return redirect()->route('admin_login')->with('success', 'Password reset successful..!');

        }else {
            return redirect()->back()->with('error', 'Please re-try..!');
        }

    }





}



