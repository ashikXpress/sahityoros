<?php

namespace App\Http\Controllers;

use App\Manuscript;
use Illuminate\Http\Request;

class ManuscriptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function formManuscript(){
        return view('manuscript.create_manuscript');
    }
    public function createManuscript(Request $request){
        $this->validate($request,[
            'title'=>'required|min:10|max:255',
            'file'=>'required|mimes:doc,docx||min:1|max:9000',
        ]);

        $uploadObject = $request->file('file');
        $filename = $uploadObject->getFilename() . str_random(30);
        $file_ext = $uploadObject->getClientOriginalExtension();

        if ($uploadObject->move(public_path('manuscript-gallery'), $filename . '.' . $file_ext)) {
            $photo_file = $filename . '.' . $file_ext;

        } else {
            return $uploadObject->getErrorMessage();


        }

       $result=Manuscript::create([
           'user_id'=>auth()->user()->id,
            'title'=>$request->title,
            'file'=>'manuscript-gallery/'.$photo_file,
        ]);

        if ($result){

            $request->session()->flash('success','Upload a manuscript doc/docx successfully');

            return redirect()->back();

        }else{
            $request->session()->flash('error','Upload a manuscript doc/docx failed');

            return redirect()->back();
        }


    }
}
