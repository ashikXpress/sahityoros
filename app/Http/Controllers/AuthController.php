<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Mail\AdminPasswordResetting;
use App\Mail\UserPasswordResetting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{


    public function showUserLogin(){
        if (Auth::check()) {
            return redirect()->route('showHome');
        }else{
            return view('user.user_login');
        }


    }
    public function userLogin(Request $request){
        $this->validate($request,[
           'email'=>'email|required|min:2|max:50',
            'password'=>'required|min:6|max:50',
          ]);


            $email=$request->email;
            $password=$request->password;
            $checkStatus=User::where('email',$email)->first();


        if(Auth::attempt(['email' => $email, 'password' => $password, 'login_status' => 1])) {

            return redirect()->route('showHome');
        }else{
            $request->session()->flash('error','your email or password is wrong');
            return redirect()->back()->withInput();
        }


    }
    public function userLogout(){

        Auth::logout();
        return redirect()->route('showUserLogin');
    }



public function showAdminLogin(){
    if (Auth::guard('admin')->check()) {
        return redirect()->route('showDashboard');
     }else{
        return view('admin.admin_login');
     }
}
public function adminLogin(Request $request){
    $this->validate($request,[
        'email'=>'email|required|min:2|max:50',
        'password'=>'required|min:6|max:50',
    ]);


    $email=$request->email;
    $password=$request->password;
    $checkStatus=Admin::where('email',$email)->first();

    if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password, 'admin_status' => 1])) {
        return redirect()->route('showDashboard');
    }else{
        $request->session()->flash('error','your email or password is wrong or suspend!!');
        return redirect()->back()->withInput();
    }

}
public function userPasswordResettingForm(){
    return view('user.password_resetting');
}
public function  userPasswordResetting(Request $request){
    $this->validate($request,[
        'email'=>'required|email|min:2|max:50'
    ]);
    $email=$request->email;

    $checkEmail=User::where('email',$email)->first();
    if ($checkEmail!=null){
        $newPassword=str_random(6);

        User::where('email',$email)->update([
            'password'=>bcrypt($newPassword),
        ]);

        Mail::to($request->input('email'))->send(new UserPasswordResetting($newPassword));

        $request->session()->flash('success','your password is resetting,please check your mail...');
        return redirect()->route('showUserLogin');
    }else{
        $request->session()->flash('error','Sorry your email address is invalid!!');
        return redirect()->back();
    }

}

public function adminLogout(){
    Auth::guard('admin')->logout();
    return redirect()->route('showAdminLogin');
}


public function showForgottentForm(){

    return view('admin.password_resetting');
}
public function adminPasswordReset(Request $request){
    $this->validate($request,[
        'email'=>'required|email|min:2|max:100'
    ]);
    $email=$request->email;

    $checkEmail=Admin::where('email',$email)->first();
   if ($checkEmail!=null){
       $newPassword=str_random(6);

       Admin::where('email',$email)->update([
            'password'=>bcrypt($newPassword),
       ]);

     Mail::to($request->input('email'))->send(new AdminPasswordResetting($newPassword));

       $request->session()->flash('success','your password is resetting,please check your mail...');
       return redirect()->route('showAdminLogin');
   }else{
       $request->session()->flash('error','Sorry your email address is invalid!!');
       return redirect()->back();
   }

}



}
