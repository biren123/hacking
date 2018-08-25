<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $fillable=[
        'category_id',
        'photo_id',
        'title',
        'body'
        ];




    public function user(){
        return $this->belongsTo('App\user');
    }

    public function photo(){
        return $this->belongsTo('App\photo');
    }

}



