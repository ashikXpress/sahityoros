<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function createComment(Request $request){
       $this->validate($request,[
           'comments'=>'required|min:2|max:1024'
       ]);
       Comment::create([
           'user_id'=>auth()->user()->id,
           'comments'=>$request->comments,
           'post_id'=>$request->post_id,

       ]);
       return redirect()->back();
   }
}
