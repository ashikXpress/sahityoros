<?php

namespace App\Http\Controllers;

use App\Mail\UserVerified;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('showHome','showUser','createUser','userVerify');
    }

    public function userVerify($token,Request $request){
        $check=User::where('token',$token)->first();
        if ($check!=null){
            if($check->verified!=true){
                User::where('token',$token)->update([
                    'verified'=>true,
                ]);
                $request->session()->flash('success','Your e-mail is verified,please wait until your account approve');
                return redirect()->route('showUserLogin');
            }else{
                $request->session()->flash('error','You are already verified');
                return redirect()->route('showUserLogin');
            }

        }else{
            $request->session()->flash('error','Sorry your email cannot be identified');
            return redirect()->route('showUserLogin');
        }

    }




    public function showHome(){

        $data=[];
       $data['posts']=Post::orderBy('id','desc')->where('status','approve')->paginate(10);
        return view('user.home',$data);
    }

    public function showUser(){
        if(!Auth::user()){
            return view('user.create_user');
        }else{
            return redirect()->route('showHome');
        }

    }
    public function createUser(Request $request){
        if(!Auth::user()){
            $this->validate($request,[
                'name'=>'required|min:3|max:30',
                'nick_name'=>'required|min:3|max:30',
                'mobile_number_1'=>'required|min:2|max:30',
                'mobile_number_2'=>'required|min:2|max:30',
                'father_name'=>'required|min:2|max:30',
                'mother_name'=>'required|min:2|max:30',
                'house_no'=>'required|min:2|max:30',
                'road_no'=>'required|min:2|max:30',
                'village'=>'required|min:2|max:30',
                'post_office'=>'required|min:2|max:30',
                'post_code'=>'required|min:2|max:30',
                'thana'=>'required|min:2|max:30',
                'district'=>'required|min:2|max:30',
                'photo'=>'required|mimes:jpeg,jpg,png,gif|min:1|max:2000',
                'email'=>'required|email|unique:users|min:2|max:50',
                'facebook_url'=>'required|min:2|max:255',
                'password'=>'required|min:6|max:50',
                'retype_password'=>'required|same:password|min:6|max:50',
            ]);

            $uploadObject = $request->file('photo');
            $filename = $uploadObject->getFilename() . str_random(30);
            $file_ext = $uploadObject->getClientOriginalExtension();

            if ($uploadObject->move(public_path('users-gallery'), $filename . '.' . $file_ext)) {
                $photo_file = $filename . '.' . $file_ext;

            } else {
                return $uploadObject->getErrorMessage();


            }
            $token=str_random(80);

            $result=User::create([
                'name'=>$request->name,
                'nick_name'=>$request->nick_name,
                'mobile_number_1'=>$request->mobile_number_1,
                'mobile_number_2'=>$request->mobile_number_2,
                'father_name'=>$request->father_name,
                'mother_name'=>$request->mother_name,
                'house_no'=>$request->house_no,
                'road_no'=>$request->road_no,
                'village'=>$request->village,
                'post_office'=>$request->post_office,
                'post_code'=>$request->post_code,
                'thana'=>$request->thana,
                'facebook_url'=>$request->facebook_url,
                'district'=>$request->district,
                'photo'=>'users-gallery/'.$photo_file,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'token'=>$token,

            ]);

            if ($result){

                Mail::to($request->input('email'))->send(new UserVerified($token,$request->name));


                $request->session()->flash('success','user create successfully,please check your mail and verify');

                return redirect()->back();

            }else{
                $request->session()->flash('error','user create failed');

                return redirect()->back();
            }


        }else{
            return redirect()->route('showHome');
        }

    }



    public function UserProfile(){
        $data=[];
        $data['user']=Auth::user();

        return view('user.user_profile',$data);
    }

    public function editUser($id){
        $course_id = Crypt::decrypt($id);
        if (auth()->user()->id==$course_id){
            $data=[];

            $data['singleUser']=User::where('id',$course_id)->first();
            return view('user.update_user',$data);
        }else{
            return redirect()->back();
        }

    }
    public function updateUser(Request $request,$id){
        $dcrypt=Crypt::decrypt($id);
        $this->validate($request,[
            'name'=>'required|min:3|max:30',
            'nick_name'=>'required|min:3|max:30',
            'mobile_number_1'=>'required|min:2|max:30',
            'mobile_number_2'=>'required|min:2|max:30',
            'father_name'=>'required|min:2|max:30',
            'mother_name'=>'required|min:2|max:30',
            'house_no'=>'required|min:2|max:30',
            'road_no'=>'required|min:2|max:30',
            'village'=>'required|min:2|max:30',
            'post_office'=>'required|min:2|max:30',
            'post_code'=>'required|min:2|max:30',
            'thana'=>'required|min:2|max:30',
            'district'=>'required|min:2|max:30',
            'photo'=>'nullable|mimes:jpeg,jpg,png,gif|min:1|max:2000',
            'email'=>'required|email|min:2|max:50',
            'facebook_url'=>'required|min:2|max:255',
            'password'=>'required|min:6|max:50',
            'retype_password'=>'required|same:password|min:6|max:50',
        ]);

        User::where('id',$dcrypt)->update([
            'name'=>$request->name,
            'nick_name'=>$request->nick_name,
            'mobile_number_1'=>$request->mobile_number_1,
            'mobile_number_2'=>$request->mobile_number_2,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'house_no'=>$request->house_no,
            'road_no'=>$request->road_no,
            'village'=>$request->village,
            'post_office'=>$request->post_office,
            'post_code'=>$request->post_code,
            'thana'=>$request->thana,
            'facebook_url'=>$request->facebook_url,
            'district'=>$request->district,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);


      $request->session()->flash('success','Your data update Successfully');
        return redirect()->back();
     }

     public function updateUserPhoto($id,Request $request){
        $dcrypt_id=Crypt::decrypt($id);
        $this->validate($request,[
            'photo'=>'required|mimes:jpeg,jpg,png,gif|min:1|max:2000',
        ]);

         $uploadObject = $request->file('photo');
         $filename = $uploadObject->getFilename() . str_random(30);
         $file_ext = $uploadObject->getClientOriginalExtension();

         if ($uploadObject->move(public_path('users-gallery'), $filename . '.' . $file_ext)) {
             $photo_file = $filename . '.' . $file_ext;

         } else {
             return $uploadObject->getErrorMessage();


         }
         $objPhoto=User::where('id',$dcrypt_id)->first();
         $delPhoto=$objPhoto->photo;
         unlink($delPhoto);

        User::where('id',$dcrypt_id)->update([
            'photo'=>'users-gallery/'.$photo_file,
        ]);
         $request->session()->flash('success','Profile photo update succefully');
         return redirect()->back();
     }
}
