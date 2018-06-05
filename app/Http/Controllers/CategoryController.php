<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
 public function showCategoryForm(){
     $data=[];
     $data['categories']=Category::paginate(3);
     return view('admin.select_month.selected_month',$data);
 }
 public function createMonthCategory(Request $request){
     $this->validate($request,[
         'month_category'=>'required|min:2|max:100'
     ]);

     Category::create([
         'month_category'=>$request->month_category,
     ]);
     $request->session()->flash('success','Created a category');
     return redirect()->back();

 }
public function categorySelected($id){
     $dcrypt_id=Crypt::decrypt($id);

     Category::where('select_status','selected')->update([
         'select_status'=>'unselected'
     ]);

     Category::where('id',$dcrypt_id)->update([
         'select_status'=>'selected'
     ]);
     return redirect()->back();

}
public function categoryDelete($id){
    $dcrypt_id=Crypt::decrypt($id);
    Category::where('id',$dcrypt_id)->delete();
    return redirect()->back();
}

    public function categoryEdit($id){
        $dcrypt_id=Crypt::decrypt($id);
        $data=[];
        $data['categoryEdit']=Category::where('id',$dcrypt_id)->first();
       return view('admin.select_month.edit_selected_month',$data);
    }
    public function updateMonthCategory(Request $request,$id){
        $dcrypt_id=Crypt::decrypt($id);
        $this->validate($request,[
            'month_category'=>'required|min:2|max:100'
        ]);

        Category::where('id',$dcrypt_id)->update([
            'month_category'=>$request->month_category,
        ]);
        $request->session()->flash('success','Update a category');
        return redirect()->back();

    }

}
