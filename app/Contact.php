<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['group_id','name','company','email','mobile','address','photo'];
    public function group(){
      return $this->belongsTo('App\Group');
    }

    protected $uploads = '/images/profile_photo/';
    public function getPhotoAttribute($img){
        return $this->uploads.$img;
    }
}
