<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\UnaryPlus;

class Post extends Model
{
  protected $guarded=[];

  public function user(){
      return $this->belongsTo(User::class,'user_id');
  }

}
