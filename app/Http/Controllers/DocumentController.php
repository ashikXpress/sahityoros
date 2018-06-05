<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDocumentForm(){
        return view('document.create_document');
    }
    public function createMonthWiseDoc(Request $request){
        $this->validate($request,[
            'title'=>'required|min:10|max:255',
            'doc_type'=>'required|min:1|max:255',
            'file'=>'required|mimes:doc,docx||min:1|max:9000',
        ]);
        $uploadObject = $request->file('file');
        $filename = $uploadObject->getFilename() . str_random(30);
        $file_ext = $uploadObject->getClientOriginalExtension();

        if ($uploadObject->move(public_path('doc-gallery'), $filename . '.' . $file_ext)) {
            $doc_file = $filename . '.' . $file_ext;

        } else {
            return $uploadObject->getErrorMessage();


        }



        Document::create([
            'user_id'=>auth()->user()->id,
            'title'=>$request->title,
            'doc_type'=>$request->doc_type,
            'month_name'=>$request->month_name,
            'file'=>'doc-gallery/'.$doc_file,
        ]);
        $request->session()->flash('success','Upload a Month wise Doc/Docx');
        return redirect()->back();
    }


}
