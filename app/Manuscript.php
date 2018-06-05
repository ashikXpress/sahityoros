<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manuscript extends Model
{
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
