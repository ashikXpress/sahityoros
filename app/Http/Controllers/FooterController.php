<?php

namespace App\Http\Controllers;

use App\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class FooterController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function createFooterForm(){
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            $data=[];
            $data['footers']=Footer::orderBy('id','desc')->paginate(10);
            return view('admin.footer.create_footer',$data);
        }else{
            return redirect()->route('showDashboard');
        }


    }
    public function createFooter(Request $request){
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            $this->validate($request,[
                'address_info'=>"required|min:1|max:400",
                'contact_info'=>"required|min:1|max:400",
            ]);
            Footer::create([
                'address_info'=>$request->address_info,
                'contact_info'=>$request->contact_info,
            ]);
            $request->session()->flash('success','Footer text create Successfully');
            return redirect()->back();
        }else{
            return redirect()->route('showDashboard');
        }

    }

    public function footerPublished($id){
        $dcrypt_id=Crypt::decrypt($id);
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            Footer::where('status','published')->update([
                'status'=>'pending'
            ]);
            Footer::where('id',$dcrypt_id)->update([
                'status'=>'published'
            ]);
            return redirect()->back();
        }else{
            return redirect()->route('showDashboard');
        }

    }

    public function footerDelete($id){
        $dcrypt_id=Crypt::decrypt($id);
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            Footer::where('id',$dcrypt_id)->delete();
            return redirect()->back();
        }else{
            return redirect()->route('showDashboard');
        }


    }
    public function footerEdit($id){
        $dcrypt_id=Crypt::decrypt($id);
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            $data=[];
            $data['singleFooter']=Footer::where('id',$dcrypt_id)->first();

            return view('admin.footer.edit_footer',$data);
        }else{
            return redirect()->route('showDashboard');
        }

    }

    public function footerUpdate($id,Request $request){
        $dcrypt_id=Crypt::decrypt($id);
        $chekSuper=Auth::guard('admin')->user()->admin_role;
        if ($chekSuper=='Super Admin'){
            $this->validate($request,[
                'address_info'=>"required|min:1|max:400",
                'contact_info'=>"required|min:1|max:400",
            ]);
            Footer::where('id',$dcrypt_id)->update([
                'address_info'=>$request->address_info,
                'contact_info'=>$request->contact_info,
            ]);
            $request->session()->flash('success','Footer text create Successfully');
            return redirect()->back();
        }else{
            return redirect()->route('showDashboard');
        }

    }
}
