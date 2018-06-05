<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Document;
use App\Footer;
use App\Mail\AdminAddedMail;
use App\Mail\AdminUpdateMail;
use App\Mail\UserApprove;
use App\Manuscript;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');



     }



    public function showDashboard(){
        $data=[];
        $data['admin']=Auth::guard('admin')->user();
        $data['admins']=Admin::paginate(10);
        return view('admin.dashboard',$data);
    }

    public function showAdmin(){
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){

            return view('admin.create_admin');
        }else{
            return redirect()->route('showDashboard');
        }


    }
    public function createAdmin(Request $request){
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            $this->validate($request,[
                'name'=>'required|min:3|max:30',
                'email'=>'email|required|unique:admins|min:2|max:50',
                'mobile_number'=>'required|min:3|max:30',
                ]);

            $password=str_random(6);

                 $result=Admin::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'mobile_number'=>$request->mobile_number,
                    'password'=>bcrypt($password),

                ]);
                Mail::to($request->input('email'))->send(new AdminAddedMail($password,$request->email,$request->name));

                if ($result){
                    $request->session()->flash('success','admin create successfully');
                    return redirect()->back();
                }else{
                    $request->session()->flash('error','admin create successfully');
                    return redirect()->back();
                }


        }else{
            return redirect()->route('showDashboard');
        }


    }
public function adminPasswordChange($id){
        $dcrypt_id=Crypt::decrypt($id);
        $data=[];
        $data['adminPassword']=Admin::where('id',$dcrypt_id)->first();

        return view('admin.update_admin_password',$data);
}
public function updateAdminPassword($id,Request $request){
    $this->validate($request,[
        'old_password'=>'required|min:6|max:50',
        'password'=>'required|min:6|max:50',
        'retype_password'=>'required|same:password|min:6|max:50',
    ]);
    $dcrypt_id=Crypt::decrypt($id);

    $adminObj=Admin::where('id',$dcrypt_id)->first();
    $hashedPassword=$adminObj->password;
    $oldPassword=$request->old_password;

    if(Hash::check($oldPassword, $hashedPassword))
    {
        Admin::where('id',$dcrypt_id)->update([
            'password'=>bcrypt($request->password),
        ]);
        $request->session()->flash('success','Password change successfully');
        return redirect()->back();
    }else{
        $request->session()->flash('error','Your old password is incorrect !!');
        return redirect()->back();
    }



}

    public function editAdmin($id,Request $request){
        $dcryipt_id = Crypt::decrypt($id);
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            $data=[];
            $data['singleAdmin']=Admin::where('id',$dcryipt_id)->first();

            return view('admin.update_admin',$data);
        }else{
            return redirect()->route('showDashboard');
        }


    }
    public function updateAdmin($id,Request $request){
        $dcrypt_id=Crypt::decrypt($id);


         $this->validate($request,[
            'name'=>'required|min:3|max:30',
            'email'=>'email|required|min:2|max:50',
            'mobile_number'=>'required|min:3|max:30',
         ]);
    $chAdmin=Auth::guard('admin')->user()->admin_role;
    if ($chAdmin=='Super Admin'){

     $chadmin=Admin::where('id',$dcrypt_id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile_number'=>$request->mobile_number,
         ]);
        Mail::to($request->input('email'))->send(new AdminUpdateMail($request->name,$request->email,$request->mobile_number));

    $request->session()->flash('success','admin update successfully');
        return redirect()->back();
    }
        return redirect()->route('showDashboard');
    }

    public function approveAdmin($id){
        $dcrypt_id=Crypt::decrypt($id);
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            $admin_status=1;
            Admin::where('id',$dcrypt_id)->update([
                'admin_status' => $admin_status
            ]);
            return redirect()->back();

        }else{
            return redirect()->route('showDashboard');
        }

    }
    public function suspendAdmin($id){
        $dcrypt_id=Crypt::decrypt($id);
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            $admin_status=0;
            Admin::where('id',$dcrypt_id)->update([
                'admin_status' => $admin_status
            ]);
            return redirect()->back();
        }else{
            return redirect()->route('showDashboard');
        }


    }


    public function deleteAdmin($id,Request $request)
    {
        $dcrypt_id=Crypt::decrypt($id);

        $chekSuper = Auth::guard('admin')->user()->admin_role;
        if ($chekSuper == 'Super Admin') {
            $currentAdmin = Auth::guard('admin')->user()->id;

           if ($currentAdmin == $dcrypt_id) {
                $request->session()->flash('error', 'Never this action applicable,you could not delete your own login data !!!');
                return redirect()->back();
            } else {

                Admin::where('id', $dcrypt_id)->delete();
            }

            return redirect()->back();
        } else {
            return redirect()->route('showDashboard');
        }

    }




    //post list in admin panel

    public function postList(){
        $data=[];
        $data['posts']=Post::orderBy('id','desc')->paginate(1);
        return view('admin.modify_user_post.user_post_list',$data);

    }


    public function postApprove($id){
        $dcrypt_id=Crypt::decrypt($id);
        $status='approve';
        Post::where('id',$dcrypt_id)->update([
            'status'=>$status
        ]);
        return redirect()->back();
    }
    public function postPending($id){
        $dcrypt_id=Crypt::decrypt($id);
        $status='pending';
        Post::where('id',$dcrypt_id)->update([
            'status'=>$status
        ]);
        return redirect()->back();
    }
    public function postDelete($id){
        $dcrypt_id=Crypt::decrypt($id);
        $delete_status=0;
        Post::where('id',$dcrypt_id)->delete();
        return redirect()->back();
    }
//user list in admin panel
public function showUserList(){

        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            $data=[];
            $data['users']=User::orderBy('id','desc')->where('verified',true)->paginate(5);
            return view('admin.modify_user_list.show_user_list',$data);
        }else{
            return redirect()->route('showDashboard');
        }

}
public function userApprove($id){
    $dcryipt_id = Crypt::decrypt($id);
    $chekSuper=Auth::guard('admin')->user()->admin_role;
    if ($chekSuper=='Super Admin') {
        $login_status = 1;
        User::where('id', $dcryipt_id)->update([
            'login_status' => $login_status
        ]);
       $userObj=User::where('id',$dcryipt_id)->first();

        Mail::to($userObj->email)->send(new UserApprove($userObj));

        return redirect()->back();
    }else{
        return redirect()->route('showDashboard');
    }
}
    public function userSuspend($id){
        $dcryipt_id = Crypt::decrypt($id);
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            $login_status=0;
            User::where('id',$dcryipt_id)->update([
                'login_status' => $login_status
            ]);
            return redirect()->back();
        }else{
            return redirect()->route('showDashboard');
        }


    }
    public function userDelete($id){
        $dcryipt_id = Crypt::decrypt($id);
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            $delete_status=0;
            $login_status=0;
            User::where('id',$dcryipt_id)->update([
                'delete_status' => $delete_status,
                'login_status' => $login_status,
            ]);
            return redirect()->back();
        }else{
            return redirect()->route('showDashboard');
        }


    }
    public function userRecycle ($id){
        $dcryipt_id = Crypt::decrypt($id);
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            $delete_status=1;
            $login_status=1;
            User::where('id',$dcryipt_id)->update([
                'delete_status' => $delete_status,
                'login_status' => $login_status,
            ]);
            return redirect()->back();
        }else{
            return redirect()->route('showDashboard');
        }


    }

    //manuscriptList list in admin panel
    public function manuscriptList(){
        $data=[];
        $data['manuscripts']=Manuscript::orderBy('id','desc')->paginate(1);
        return view('admin.modify_user_manuscript.user_manuscript_list',$data);

    }
    public function manuscriptDelete($id){
        $dcrypt_id=Crypt::decrypt($id);
        $docfile=Manuscript::where('id',$dcrypt_id)->first();
        $docDelete=$docfile->file;
        Manuscript::where('id',$dcrypt_id)->delete();
        unlink($docDelete);
        return redirect()->back();

    }

    //document in admin panel

    public function documentShow(){
        $data=[];
        $data['documents']=Document::orderBy('id','desc')->paginate(1);
        return view('admin.modify_document_list.document_list',$data);
    }
    public function monthWiseDocDelete($id){
        $dcrypt_id=Crypt::decrypt($id);
        $docFile=Document::where('id',$dcrypt_id)->first();
        $docDeletePath=$docFile->file;
        Document::where('id',$dcrypt_id)->delete();
        unlink($docDeletePath);
        return redirect()->back();
    }


}
