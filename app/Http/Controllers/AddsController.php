<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AddsController extends Controller
{
        public function __construct()
    {
        $this->middleware('admin');
    }
    public function formLeftAdds(){
        $data=[];
        $data['leftAdds']=DB::table('leftadds')->orderBy('id','desc')->paginate(2);
        return view('adds.left.create_left_adds',$data);
    }

    public function createLeftAdds(Request $request){
        $this->validate($request,[
            'adds_links'=>'nullable|max:255',
            'adds_image'=>'required|mimes:jpeg,jpg,png,gif|min:1|max:5000',
        ]);
        $data=[];
        $data['adds_links']=$request->adds_links;

        $uploadObject = $request->file('adds_image');
        $filename = $uploadObject->getFilename() . str_random(30);
        $file_ext = $uploadObject->getClientOriginalExtension();

        if ($uploadObject->move(public_path('adds-gallery'), $filename . '.' . $file_ext)) {
            $photo_file = $filename . '.' . $file_ext;

        } else {
            return $uploadObject->getErrorMessage();


        }
        $data['adds_image']='adds-gallery/'.$photo_file;

        $result=DB::table('leftadds')
            ->insert($data);

        if ($result){
            $request->session()->flash('success','Adds image insert successfully');
        }else{
            $request->session()->flash('error','Adds image insert failed');
        }

        return redirect()->back();
    }

    public function formRightAdds(){
        $data=[];
        $data['rightAdds']=DB::table('rightadds')->orderBy('id','desc')->paginate(2);
        return view('adds.right.create_right_adds',$data);
    }
    public function createRightAdds(Request $request){
        $this->validate($request,[
            'adds_links'=>'max:255',
            'adds_image'=>'required|mimes:jpeg,jpg,png,gif|min:1|max:5000',
        ]);

        $data=[];
        $data['adds_links']=$request->adds_links;

        $uploadObject = $request->file('adds_image');
        $filename = $uploadObject->getFilename() . str_random(30);
        $file_ext = $uploadObject->getClientOriginalExtension();

        if ($uploadObject->move(public_path('adds-gallery'), $filename . '.' . $file_ext)) {
            $photo_file = $filename . '.' . $file_ext;

        } else {
            return $uploadObject->getErrorMessage();


        }
        $data['adds_image']='adds-gallery/'.$photo_file;

        $result=DB::table('rightadds')
            ->insert($data);

        if ($result){
            $request->session()->flash('success','Adds image insert successfully');
        }else{
            $request->session()->flash('error','Adds image insert failed');
        }

        return redirect()->back();
    }

public function leftAddsUnpublished($id){
    $dcrypt_id=Crypt::decrypt($id);
    $data=[];
    $data['status']='pending';
    DB::table('leftadds')
        ->where('id',$dcrypt_id)
        ->update($data);
    return redirect()->back();
}

    public function leftAddsPublished($id){
        $dcrypt_id=Crypt::decrypt($id);
        $data=[];
        $data['status']='published';
        DB::table('leftadds')
            ->where('id',$dcrypt_id)
            ->update($data);
        return redirect()->back();
    }

    public function leftAddsDelete($id){
        $dcrypt_id=Crypt::decrypt($id);
        $photoDelete=DB::table('leftadds')
            ->where('id',$dcrypt_id)->first();
        $file=$photoDelete->adds_image;

        DB::table('leftadds')
            ->where('id',$dcrypt_id)
            ->delete();
        unlink($file);
    return redirect()->back();
}


    public function rightAddsUnpublished($id){
        $dcrypt_id=Crypt::decrypt($id);
        $data=[];
        $data['status']='pending';
        DB::table('rightadds')
            ->where('id',$dcrypt_id)
            ->update($data);
        return redirect()->back();
    }

    public function rightAddsPublished($id){
        $dcrypt_id=Crypt::decrypt($id);
        $data=[];
        $data['status']='published';
        DB::table('rightadds')
            ->where('id',$dcrypt_id)
            ->update($data);
        return redirect()->back();
    }

    public function rightAddsDelete($id){
        $dcrypt_id=Crypt::decrypt($id);
        $photoDelete=DB::table('rightadds')
            ->where('id',$dcrypt_id)->first();
        $file=$photoDelete->adds_image;

        DB::table('rightadds')
            ->where('id',$dcrypt_id)
            ->delete();
        unlink($file);
        return redirect()->back();
    }
  public function leftAddsEdit($id){
      $dcrypt_id=Crypt::decrypt($id);
        $data=[];
        $data['singleLeftAdds']=DB::table('leftadds')->where('id',$dcrypt_id)->first();
        return view('adds.left.update_left_adds',$data);
  }
  public function leftAddsUpdate($id,Request $request){
      $dcrypt_id=Crypt::decrypt($id);
      $this->validate($request,[
          'adds_links'=>'max:255',
          'adds_image'=>'required|mimes:jpeg,jpg,png,gif|min:1|max:5000',
      ]);
      $imgObj=DB::table('leftadds')->where('id',$dcrypt_id)->first();
      $fileDel=$imgObj->adds_image;
      unlink($fileDel);

      $uploadObject = $request->file('adds_image');
      $filename = $uploadObject->getFilename() . str_random(30);
      $file_ext = $uploadObject->getClientOriginalExtension();

      if ($uploadObject->move(public_path('adds-gallery'), $filename . '.' . $file_ext)) {
          $photo_file = $filename . '.' . $file_ext;

      } else {
          return $uploadObject->getErrorMessage();


      }

      DB::table('leftadds')->where('id',$dcrypt_id)->update([
          'adds_links'=>$request->adds_links,
          'adds_image'=>'adds-gallery/'.$photo_file
      ]);

      return redirect()->route('formLeftAdds');

  }



    public function rightAddsEdit($id){
      $dcrypt_id=Crypt::decrypt($id);
        $data=[];
        $data['singleRightAdds']=DB::table('rightadds')->where('id',$dcrypt_id)->first();
        return view('adds.right.update_right_adds',$data);
    }

    public function rightAddsUpdate($id,Request $request){
        $dcrypt_id=Crypt::decrypt($id);
        $this->validate($request,[
            'adds_links'=>'max:255',
            'adds_image'=>'required|mimes:jpeg,jpg,png,gif|min:1|max:5000',
        ]);

        $imgObj=DB::table('rightadds')->where('id',$dcrypt_id)->first();
        $fileDel=$imgObj->adds_image;
        unlink($fileDel);

        $uploadObject = $request->file('adds_image');
        $filename = $uploadObject->getFilename() . str_random(30);
        $file_ext = $uploadObject->getClientOriginalExtension();

        if ($uploadObject->move(public_path('adds-gallery'), $filename . '.' . $file_ext)) {
            $photo_file = $filename . '.' . $file_ext;

        } else {
            return $uploadObject->getErrorMessage();


        }

        DB::table('rightadds')->where('id',$dcrypt_id)->update([
            'adds_links'=>$request->adds_links,
            'adds_image'=>'adds-gallery/'.$photo_file
        ]);

        return redirect()->route('formRightAdds');

    }


}
