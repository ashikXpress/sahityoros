<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('detailsPost');
    }





   public function formPost(){
       return view('user_post.create_post');
   }
   public function createPost(Request $request){
       $this->validate($request,[
           'title'=>'required|min:10|max:255',
           'body'=>'required|min:10|max:10000',
       ]);

    $result=Post::create([
        'user_id'=>auth()->user()->id,
        'title'=>$request->title,
        'body'=>$request->body,
    ]);

       if ($result){

           $request->session()->flash('success','create a post successfully');

           return redirect()->back();

       }else{
           $request->session()->flash('error','create a post failed');

           return redirect()->back();
       }

   }

   public function detailsPost($id){
       $course_id = Crypt::decrypt($id);
       $data=[];
           $data['post']=Post::where('id',$course_id)->first();
           $data['allComments']=Comment::orderBy('id','desc')->get();
           return view('user_post.details_user_post',$data);

   }





}
